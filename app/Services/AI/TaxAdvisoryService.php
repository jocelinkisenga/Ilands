<?php

namespace App\Services\AI;

use Prism\Prism\Facades\Prism;
use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;
use Prism\Prism\ValueObjects\Media\Document;
use Illuminate\Support\Facades\Storage;
use App\Actions\StoreAiLog;
class TaxAdvisoryService
{
  public function __construct(public StoreAiLog $storeAiLog)
  {
  }
  /**
   * Génère la réponse de l'IA de manière optimisée.
   */
  public function generate(
    array $messages,
    string $currentPrompt,
    ?int $chatId,
    ?string $storedFilePath = null,
    ?string $originalName = null,
    int $maxHistory = 5
  ): string {
    $conversation = [];

    // 1. Gestion ultra-optimisée de l'historique (Tokens réduits au minimum)
    // On ne garde que les X derniers messages textuels pour économiser les tokens d'historique.
    $slicedMessages = array_slice($messages, -$maxHistory);

    foreach ($slicedMessages as $message) {
      if (empty($message["content"])) {
        continue;
      }

      if ($message["role"] === "assistant") {
        $conversation[] = new AssistantMessage($message["content"]);
      } else {
        // Si l'ancien message avait un fichier, on ajoute une mention contextuelle textuelle
        // Cela évite de ré-uploader le fichier lourd tout en gardant le contexte.
        $content = $message["content"];
        if (
          !empty($message["file_name"]) &&
          !str_contains($content, "[Fichier joint :")
        ) {
          $content .= "\n[Fichier joint traité précédemment : {$message["file_name"]}]";
        }
        $conversation[] = new UserMessage($content);
      }
    }

    // 2. Préparation du média UNIQUE du message en cours
    $media = [];
    if ($storedFilePath && Storage::disk("local")->exists($storedFilePath)) {
      $absolutePath = Storage::disk("local")->path($storedFilePath);

      // Prism envoie le document de manière optimisée pour Gemini
      $media[] = Document::fromLocalPath(
        path: $absolutePath,
        title: $originalName ?? basename($absolutePath)
      );
    }

    // 3. Construction du message utilisateur ACTUEL avec son média attaché
    $finalPrompt = empty($currentPrompt)
      ? "Analyse le document fourni."
      : $currentPrompt;
    $conversation[] = new UserMessage($finalPrompt, $media);

    // 4. Exécution de la requête via Prism
    $response = Prism::text()
      ->using("gemini", "gemini-flash-latest") // Version flash ultra-rapide et économique
      ->withSystemPrompt($this->systemPrompt())
      ->withMessages($conversation)
      ->generate();

    $context = trim($response->text ?? "");
    if (empty($context)) {
      throw new \Exception(
        "L'API Gemini a retourné une réponse vide pour le rapport."
      );
    }

    $usage = $response->usage;
    $this->storeAiLog->handler($chatId, $usage);
    return $context;
  }

  private function systemPrompt(): string
  {
    return "
You are ILANDS AI, an  educational assistant for U.S. taxation and personal finance.
you help to understand the concept of Estimated Taxes.

Estimated taxes are paid in four installments throughout the year:

April 15 (For income earned Jan 1 – March 31)
June 15 (For income earned April 1 – May 31)
September 15 (For income earned June 1 – Aug 31)
January 15 of the following year (For income earned Sept 1 – Dec 31)
What happens if you don't pay?
If you do not pay enough tax throughout the year, either through withholding or estimated payments, you may be charged an underpayment penalty by the IRS, even if you are due a refund when you finally file.

If your situation involves business entity returns, complex investments, or you are unsure how to calculate your specific liability, I recommend our $19 Priority CPA/EA Match to get professional eyes on your specific numbers.

For ongoing support, ILANDS Solutions Premium is available for $9/month (cancel anytime). This includes unlimited AI chat questions, priority email support, and access to all 100+ educational videos and tax documents.

Self-employed individuals (Freelancers, independent contractors, and gig workers).
Business owners (Sole proprietors, partners, and S-corporation shareholders).
Investors receiving significant interest, dividends, or capital gains.
Landlords collecting rental income.

Educational purposes only. Do not provide tax, legal, accounting, or financial advice. Do not prepare, complete, review, or file tax returns, determine filing positions, or act as the IRS, a CPA, attorney, or tax professional.

Explain concepts, IRS terminology, forms (1040, W-2, 1099, Schedule C, etc.), self-employment tax, deductions, credits, estimated taxes, and financial literacy in a general educational way.

Always:

- Be accurate, neutral, and professional.
- Use clear sections and concise explanations.
- State assumptions and uncertainties when information is missing.
- Use official U.S. tax terminology.
- Recommend consulting a qualified tax professional or the IRS for personalized or filing-related questions.

Never present your responses as professional advice.
Disclaimer: This information is for educational guidance only and does not constitute tax, legal, or accounting advice.
";
  }
}
