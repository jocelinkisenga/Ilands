<?php

namespace App\Services;

use App\Models\TaxProfile;
use App\Models\User;
use App\Models\AiReport;
use Illuminate\Support\Facades\Storage;
use Prism\Prism\Facades\Prism;
use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;
use Prism\Prism\ValueObjects\Media\Document;
use App\Actions\StoreAiLog;
class ReportGenerationService
{
  public function __construct(public StoreAiLog $storeAiLog)
  {
  }
  /**
   * Génère un rapport complet et le sauvegarde en base de données.
   */
  public function generate(
    array $messages,
    int $chatId,
    User $user,
    ?string $documentPath = null,
    ?string $documentName = null
  ): AiReport {
    $conversation = [];

    // 1. Reconstruction de l'historique de manière propre pour Prism
    foreach ($messages as $message) {
      if (empty($message["content"])) {
        continue;
      }

      $conversation[] =
        $message["role"] === "assistant"
          ? new AssistantMessage($message["content"])
          : new UserMessage($message["content"]);
    }

    // 2. Gestion du média (S'il vient juste d'être téléversé)
    $media = [];
    if ($documentPath && Storage::disk("local")->exists($documentPath)) {
      $media[] = Document::fromLocalPath(
        path: Storage::disk("local")->path($documentPath),
        title: $documentName ?? "Uploaded Document"
      );
    }

    // 3. Injection du prompt de déclenchement du rapport avec son média dans l'historique
    $type = $this->detectReportType($messages);
    $finalInstruction =
      "Rédige immédiatement le rapport final basé sur les données de notre session. Génère uniquement le rapport au format Markdown structuré.";

    // Ajout du message utilisateur final qui déclenche la génération
    $conversation[] = new UserMessage($finalInstruction, $media);

    $systemPrompt = $this->buildPrompt(
      $type,
      $this->buildProfileContext($user)
    );

    // 4. Appel à l'API Gemini
    $response = Prism::text()
      ->using("gemini", "gemini-flash-latest")
      ->withSystemPrompt($systemPrompt)
      ->withMessages($conversation)
      ->generate();

    $context = trim($response->text ?? "");

    // Sécurité : Si l'IA n'a rien renvoyé, on ne valide pas un rapport vide
    if (empty($context)) {
      throw new \Exception(
        "L'API Gemini a retourné une réponse vide pour le rapport."
      );
    }
    $usage = $response->usage;
    $this->storeAiLog->handler($chatId, $usage);
    // 5. Persistance en Base de données
    return AiReport::create([
      "user_id" => $user->id,
      "chat_id" => $chatId,
      "title" => ucfirst($type) . " Report",
      "summary" => str($context)
        ->limit(300)
        ->toString(),
      "content" => $context,
      "type" => $type,
      "status" => "completed",
      "source_file" => $documentName,
      "model" => "gemini-flash-latest",
      "meta" => [
        "generated_at" => now()->toIso8601String(),
      ],
    ]);
  }

  private function detectReportType(array $messages): string
  {
    $text = strtolower(
      collect($messages)
        ->pluck("content")
        ->implode(" ")
    );

    if (
      str_contains($text, "tax") ||
      str_contains($text, "irs") ||
      str_contains($text, "1040") ||
      str_contains($text, "1099")
    ) {
      return "tax";
    }
    if (
      str_contains($text, "investment") ||
      str_contains($text, "portfolio") ||
      str_contains($text, "crypto")
    ) {
      return "investment";
    }
    if (str_contains($text, "compliance") || str_contains($text, "audit")) {
      return "compliance";
    }
    if (str_contains($text, "finance") || str_contains($text, "financial")) {
      return "financial";
    }

    return "business";
  }

  private function buildProfileContext(?User $user): string
  {
    if (!$user) {
      return "";
    }
    $profile = TaxProfile::where("user_id", $user->id)->first();
    if (!$profile) {
      return "";
    }

    return "\nUSER TAX PROFILE\nFiling Status: {$profile->filing_status}\nAnnual Income: {$profile->annual_income}\nBusiness Income: {$profile->business_income}\nOther Income: {$profile->other_income}\nDependents: {$profile->depends}\nCrypto Activity: " .
      ($profile->crypto_activity ? "Yes" : "No") .
      "\nCountry: {$profile->country}\nState: {$profile->state}\n";
  }

  private function buildPrompt(
    string $type,
    string $profileContext = ""
  ): string {
    return "You are ILANDS AI Report Generator.

Generate professional educational U.S. tax, finance, and business reports only.

Educational purposes only. Do not provide tax, legal, accounting, or financial advice. Do not prepare tax returns, determine tax liability, or recommend filing positions.

Report Type: {$type}

{$profileContext}

Instructions:

- Analyze available information and relevant chat context.
- Never invent facts or financial figures.
- Clearly state assumptions and uncertainties.
- Use accurate U.S. tax terminology.
- Format output in clean, professional Markdown with headings, tables, and bullet points when appropriate.

Structure:

Executive Summary

Key Findings

Financial Overview

Educational Tax Analysis

Risks & Compliance Considerations

Opportunities

Educational Recommendations

Action Plan

Conclusion";
  }
}
