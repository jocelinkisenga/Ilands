<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\AI\TaxAdvisoryService;
use League\CommonMark\CommonMarkConverter;
use App\Models\Chat;
use Illuminate\Support\Str;

class AiChatBot extends Component
{
    use WithFileUploads;

    public bool $isLoading = false;
    public string $prompt = '';
    public array $messages = [];
    public $document = null; 
    
    private int $maxHistory = 20; // Augmenté car contextualisé par Chat unique maintenant
    private int $maxPromptLength = 500;
    public ?array $documentPreview = null;
    public ?int $chatId = null;


    // Écouteur pour changer de chat depuis une barre latérale par exemple
    protected $listeners = ['loadChat'];

    public function mount($chatId = null): void
    {
    
    
        if ($chatId) {
            $this->loadChat($chatId);
        } else {
            $this->initNewChat();
        }
    }

    public function loadChat(int $chatId): void
    {
        if (!auth()->check()) {
            return;
        }

        // Vérification de sécurité pour s'assurer que le chat appartient à l'utilisateur
        $chat = auth()->user()->chats()->find($chatId);

        if (!$chat) {
            $this->initNewChat();
            return;
        }

        $this->chatId = $chat->id;
        
        $this->messages = $chat->messages()
            ->oldest() // Changé en oldest pour récupérer l'ordre chronologique direct
            ->limit($this->maxHistory)
            ->get()
            ->map(fn ($message) => [
                'role' => $message->role,
                'content' => $message->message,
                'file_name' => $message->file_name,
                'file_path' => $message->file_path,
                'file_type' => $message->file_type,
            ])
            ->toArray();

        if (empty($this->messages)) {
            $this->setDefaultWelcomeMessage();
        }
    }

    public function initNewChat(): void
    {
        $this->chatId = null;
        $this->messages = [];
        $this->setDefaultWelcomeMessage();
    }

    private function setDefaultWelcomeMessage(): void
    {
        $this->messages[] = [
            'role' => 'assistant',
            'content' => 'Hello 👋 I am ILANDS AI assistant. How can I help you today?',
            'file_name' => null,
            'file_path' => null,
            'file_type' => null,
        ];
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

            // 1. Initialisation automatique du Chat en BDD s'il s'agit du premier message d'une nouvelle session
            if (auth()->check() && !$this->chatId) {
                $title = !empty($userMessage) ? Str::limit($userMessage, 40) : 'New Document Analysis';
                $newChat = auth()->user()->chats()->create([
                    'title' => $title
                ]);
                $this->chatId = $newChat->id;
                
                // Optionnel : Notifier un composant de liste latérale (sidebar) pour se rafraîchir
                $this->dispatch('chat-created', chatId: $this->chatId);
            }

            // 2. Persistance physique du fichier
            if ($this->document) {
                $originalName = $this->document->getClientOriginalName();
                $mimeType = $this->document->getMimeType();
                $storedFilePath = $this->document->store(path: 'ai_documents', options: 'local');
            }

            // 3. On clone l'historique existant AVANT d'ajouter le nouveau message en local
            $historyBeforeSending = $this->messages;

            // 4. Sauvegarde immédiate en BDD (liée au chatId) et mise à jour de l'UI
            $this->storeUserMessage($userMessage, $storedFilePath, $originalName, $mimeType);
            $this->dispatch('message-sent');

            // 5. Appel du service avec l'historique propre et le nouveau document explicite
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

            // 6. Sauvegarde de la réponse de l'assistant (liée au chatId)
            $this->storeAssistantMessage($assistantMessage);

            // 7. Reset de l'état de l'input et du fichier uploadé
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

        // Insertion rigoureuse incluant l'identifiant du Chat lié
        auth()->user()->chatMessages()->create([
            'chatId'   => $this->chatId,
            'role'      => $role,
            'message'   => $content,
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
