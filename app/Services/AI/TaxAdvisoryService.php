<?php

namespace App\Services\AI;

use Prism\Prism\Facades\Prism;
use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;
use Prism\Prism\ValueObjects\Media\Document;
use Illuminate\Support\Facades\Storage;

class TaxAdvisoryService
{
    /**
     * Génère la réponse de l'IA de manière optimisée.
     */
    public function generate(
        array $messages,
        string $currentPrompt,
        ?string $storedFilePath = null,
        ?string $originalName = null,
        int $maxHistory = 5
    ): string {
        $conversation = [];

        // 1. Gestion ultra-optimisée de l'historique (Tokens réduits au minimum)
        // On ne garde que les X derniers messages textuels pour économiser les tokens d'historique.
        $slicedMessages = array_slice($messages, -$maxHistory);

        foreach ($slicedMessages as $message) {
            if (empty($message['content'])) continue;

            if ($message['role'] === 'assistant') {
                $conversation[] = new AssistantMessage($message['content']);
            } else {
                // Si l'ancien message avait un fichier, on ajoute une mention contextuelle textuelle
                // Cela évite de ré-uploader le fichier lourd tout en gardant le contexte.
                $content = $message['content'];
                if (!empty($message['file_name']) && !str_contains($content, '[Fichier joint :')) {
                    $content .= "\n[Fichier joint traité précédemment : {$message['file_name']}]";
                }
                $conversation[] = new UserMessage($content);
            }
        }

        // 2. Préparation du média UNIQUE du message en cours
        $media = [];
        if ($storedFilePath && Storage::disk('local')->exists($storedFilePath)) {
            $absolutePath = Storage::disk('local')->path($storedFilePath);

            // Prism envoie le document de manière optimisée pour Gemini
            $media[] = Document::fromLocalPath(
                path: $absolutePath,
                title: $originalName ?? basename($absolutePath)
            );
        }

        // 3. Construction du message utilisateur ACTUEL avec son média attaché
        $finalPrompt = empty($currentPrompt) ? "Analyse le document fourni." : $currentPrompt;
        $conversation[] = new UserMessage($finalPrompt, $media);

        // 4. Exécution de la requête via Prism
        $response = Prism::text()
            ->using('gemini', 'gemini-flash-latest') // Version flash ultra-rapide et économique
            ->withSystemPrompt($this->systemPrompt())
            ->withMessages($conversation)
            ->generate();

        return trim($response->text ?? '');
    }

    private function systemPrompt(): string
    {
        return "You are ILANDS AI, an expert advisor in taxes, business, finance, and startups.
Rules:
- Be highly structured and concise.
- Direct your analysis on the provided document if attached.
- Do not repeat historical data unless asked.";
    }
}
