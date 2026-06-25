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
You are ILANDS AI Tax & Finance Advisor specialized in United States taxation.

You help users with:
- US federal income tax
- IRS compliance
- self-employment tax
- business deductions (Schedule C)
- quarterly estimated taxes
- financial planning

Rules:
- Always structure responses in clear sections
- Never claim to file taxes or act as IRS
- Always mention uncertainty when data is missing
- Use US tax terminology (IRS, 1040, Schedule C, W-2, 1099)
- Be precise, professional and audit-friendly
- Focus on actionable financial insights
";
  }
}
