<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\AI\TaxAdvisoryService;
use League\CommonMark\CommonMarkConverter;

class AiChatBot extends Component
{
    use WithFileUploads;

    public bool $isLoading = false;
    public string $prompt = '';
    public array $messages = [];
    public $document = null; 

    private int $maxHistory = 5;
    private int $maxPromptLength = 500; // Laissé large pour les prompts de contexte complexes
    public ?array $documentPreview = null;

    public function mount(): void
    {
        $this->messages = auth()->user()
            ? auth()->user()->chatMessages()
                ->latest()
                ->limit($this->maxHistory)
                ->get()
                ->reverse()
                ->map(fn ($message) => [
                    'role' => $message->role,
                    'content' => $message->message,
                    'file_name' => $message->file_name,
                ])
                ->toArray()
            : [];

        if (empty($this->messages)) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'Hello 👋 I am ILANDS AI assistant. How can I help you today?',
                'file_name' => null,
            ];
        }
    }

    public function sendMessage(TaxAdvisoryService $ai): void
    {
        $this->prompt = trim($this->prompt);

        if (!$this->validateMessage()) {
            return;
        }

        $this->isLoading = true;

        try {
            $userMessage = $this->prompt;
            $storedFilePath = null;
            $originalName = null;
            $mimeType = null;

            // 1. Persistance physique immédiate du fichier
            if ($this->document) {
                $originalName = $this->document->getClientOriginalName();
                $mimeType = $this->document->getMimeType();
                $storedFilePath = $this->document->store(path: 'ai_documents', options: 'local');
            }

            // 2. On clone l'historique existant AVANT d'ajouter le nouveau message en local
            // Cela évite la redondance dans le traitement du service
            $historyBeforeSending = $this->messages;

            // 3. Sauvegarde immédiate en BDD et mise à jour de l'UI pour l'utilisateur
            $this->storeUserMessage($userMessage, $storedFilePath, $originalName, $mimeType);
            $this->dispatch('message-sent');

            // 4. Appel du service avec l'historique propre et le nouveau document explicite
            $assistantMessage = $ai->generate(
                $historyBeforeSending,
                $userMessage,
                $storedFilePath,
                $originalName,
                $this->maxHistory
            );

            if (empty($assistantMessage)) {
                $assistantMessage = "I couldn't generate a response.";
            }

            // 5. Sauvegarde de la réponse de l'assistant
            $this->storeAssistantMessage($assistantMessage);

            // 6. Reset de l'état de l'input et du fichier uploadé
            $this->reset(['prompt', 'document', 'documentPreview']);

        } catch (\Exception $e) {
            $this->handleException($e);
        } finally {
            $this->isLoading = false;
            $this->dispatch('message-sent');
        }
    }

    private function validateMessage(): bool
    {
        if ($this->prompt === '' && !$this->document) {
            return false;
        }

        if (strlen($this->prompt) > $this->maxPromptLength) {
            $this->addMessage('assistant', '⚠️ Message too long.');
            return false;
        }

        return !$this->isLoading;
    }

    private function storeUserMessage(string $message, ?string $filePath = null, ?string $fileName = null, ?string $fileType = null): void
    {
        $this->addMessage('user', $message, $filePath, $fileName, $fileType);
    }

    private function storeAssistantMessage(string $message): void
    {
        $this->addMessage('assistant', $message);
    }

    private function addMessage(string $role, string $content, ?string $filePath = null, ?string $fileName = null, ?string $fileType = null): void
    {
        $this->messages[] = [
            'role' => $role,
            'content' => $content,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
        ];

        if (!auth()->check()) {
            return;
        }

        auth()->user()->chatMessages()->create([
            'role' => $role,
            'message' => $content,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
        ]);
    }

    private function handleException(\Exception $e): void
    {
        logger()->error('AI ERROR: ' . $e->getMessage());
        $message = strtolower($e->getMessage());

        $error = '⚠️ AI temporarily unavailable.';
        if (str_contains($message, 'rate limit')) {
            $error = '⚠️ Too many requests. Please wait a moment.';
        } elseif (str_contains($message, 'overloaded')) {
            $error = '⚠️ AI server is busy. Retry in a few seconds.';
        }

        $this->addMessage('assistant', $error);
    }
    
    public function updatedDocument()
    {
        if (!$this->document) return;

        $this->documentPreview = [
            'name' => $this->document->getClientOriginalName(),
            'size' => round($this->document->getSize() / 1024, 2) . ' KB',
            'type' => $this->document->getMimeType(),
            'isImage' => str_contains($this->document->getMimeType(), 'image'),
        ];
    }

    public function markdown(string $text): string
    {
        try {
            return app(CommonMarkConverter::class)->convert($text)->getContent();
        } catch (\Throwable $e) {
            logger()->warning('Markdown parsing error', ['error' => $e->getMessage()]);
            return e($text);
        }
    }

    public function render()
    {
        return view('livewire.ai-chat-bot');
    }
}
