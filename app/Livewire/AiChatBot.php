<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\AI\TaxAdvisoryService;
use App\Services\ReportGenerationService;
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

    public ?int $chat_id = null;

    private int $maxHistory = 20;
    private int $maxPromptLength = 500;

    public ?array $documentPreview = null;

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
        $chat = auth()->user()->chats()->find($chatId);

        if (!$chat) {
            $this->initNewChat();
            return;
        }

        $this->chat_id = $chat->id;

        $this->messages = $chat->messages()
            ->oldest()
            ->limit($this->maxHistory)
            ->get()
            ->map(fn ($m) => [
                'role' => $m->role,
                'content' => $m->message,
                'file_name' => $m->file_name,
                'file_path' => $m->file_path,
                'file_type' => $m->file_type,
            ])
            ->toArray();

        if (empty($this->messages)) {
            $this->messages[] = $this->defaultMessage();
        }
    }

    public function initNewChat(): void
    {
        $this->chat_id = null;
        $this->messages = [$this->defaultMessage()];
    }

    private function defaultMessage(): array
    {
        return [
            'role' => 'assistant',
            'content' => 'Hello 👋 I am ILANDS AI assistant.',
            'file_name' => null,
            'file_path' => null,
            'file_type' => null,
        ];
    }

    public function sendMessage(TaxAdvisoryService $ai): void
    {
        $this->prompt = trim($this->prompt);

        if (!$this->validateMessage()) return;

        $this->isLoading = true;

        try {

            // 🔥 CREATE CHAT IF NEEDED
            if (!$this->chat_id) {
                $chat = auth()->user()->chats()->create([
                    'title' => Str::limit($this->prompt ?: 'New chat', 40)
                ]);

                $this->chat_id = $chat->id;
            }

            $filePath = null;
            $fileName = null;
            $fileType = null;

            if ($this->document) {
                $filePath = $this->document->store('ai_documents', 'local');
                $fileName = $this->document->getClientOriginalName();
                $fileType = $this->document->getMimeType();
            }

            $history = $this->messages;

            $this->addMessage('user', $this->prompt, $filePath, $fileName, $fileType);

            $assistant = $ai->generate($history,$this->prompt, $this->chat_id, $filePath, $fileName);

            $this->addMessage('assistant', $assistant ?: "No response");

            $this->reset(['prompt', 'document', 'documentPreview']);

        } catch (\Throwable $e) {
            $this->handleException($e);
        } finally {
            $this->isLoading = false;
        }
    }

    private function validateMessage(): bool
    {
        if ($this->prompt === '' && !$this->document) return false;

        if (strlen($this->prompt) > $this->maxPromptLength) {
            $this->addMessage('assistant', '⚠️ Message too long');
            return false;
        }

        return !$this->isLoading;
    }

    private function addMessage($role, $content, $filePath = null, $fileName = null, $fileType = null): void
    {
        $this->messages[] = [
            'role' => $role,
            'content' => $content,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
        ];

        auth()->user()->chatMessages()->create([
            'chat_id' => $this->chat_id,
            'role' => $role,
            'message' => $content,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_type' => $fileType,
        ]);
    }

    public function generateReport(ReportGenerationService $service): void 
{
    $this->isLoading = true;

    try {
        // 1. Initialisation ou récupération forcée du chat_id
        if (!$this->chat_id) {
            $title = $this->prompt ? \Illuminate\Support\Str::limit(trim($this->prompt), 40) : 'Report Chat';
            
            $chat = auth()->user()->chats()->create([
                'title' => $title
            ]);

            $this->chat_id = $chat->id;
        }

        // 2. Traitement du document actuel s'il y en a un
        $filePath = null;
        $fileName = null;
        $fileType = null;

        if ($this->document) {
            $filePath = $this->document->store('ai_documents', 'local');
            $fileName = $this->document->getClientOriginalName();
            $fileType = $this->document->getMimeType();

            // Optionnel : Ajout visuel dans la conversation
            $this->addMessage('user', "Document joint pour analyse immédiate : {$fileName}", $filePath, $fileName, $fileType);
        }

        // 3. Appel du service avec TOUS les paramètres nécessaires dans le bon ordre ou nommés
        $reportModel = $service->generate(
            messages: $this->messages,
            chatId: $this->chat_id,
            user: auth()->user(),
            documentPath: $filePath,
            documentName: $fileName
        );

        // 4. Extraction du contenu textuel généré depuis l'objet de base de données retourné
        $this->addMessage(
            role: 'assistant',
            content: $reportModel->content // Récupère le texte Markdown stocké avec succès
        );

        // 5. Reset UI
        $this->reset(['prompt', 'document', 'documentPreview']);

    } catch (\Throwable $e) {
        $this->handleException($e);
    } finally {
        $this->isLoading = false;
    }
}




    private function handleException(\Throwable $e): void
    {
        logger()->error($e->getMessage());

        $msg = strtolower($e->getMessage());

        $error = match(true) {
            str_contains($msg, 'rate limit') => '⚠️ Too many requests',
            str_contains($msg, 'overloaded') => '⚠️ AI busy',
            default => '⚠️ AI error'
        };

        $this->addMessage('assistant', $error);
    }

    public function updatedDocument()
    {
        if (!$this->document) return;

        $this->documentPreview = [
            'name' => $this->document->getClientOriginalName(),
            'size' => round($this->document->getSize() / 1024, 2) . ' KB',
            'type' => $this->document->getMimeType(),
        ];
    }

    public function markdown(string $text): string
    {
        return app(CommonMarkConverter::class)->convert($text)->getContent();
    }

    public function render()
    {
        return view('livewire.ai-chat-bot');
    }
}