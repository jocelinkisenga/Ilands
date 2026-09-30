<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\AI\TaxAdvisoryService;
use League\CommonMark\CommonMarkConverter;
use App\Models\DefaultQuestions;
use Illuminate\Support\Facades\RateLimiter;

class ChatBot extends Component
{
    use WithFileUploads;

    private const GUEST_LIMIT = 10;

    public bool $isLoading = false;
    public string $prompt = '';
    public array $messages = [];
    public $document = null;

    public ?int $chat_id = null;

    private int $maxPromptLength = 500;

    public ?array $documentPreview = null;

    public bool $guestLimitReached = false;
    public $defaultQuestions;

    public function mount(): void
    {
        $this->defaultQuestions = DefaultQuestions::where("is_anabled", true)->get();

        $this->initNewChat();
        $this->guestLimitReached = $this->quotaExhausted();
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
        // 1. Limite atteinte : on s'arrête avant tout appel à l'IA
        if ($this->quotaExhausted()) {
            $this->guestLimitReached = true;
            return;
        }

        $this->prompt = trim($this->prompt);

        if (!$this->validateMessage()) return;

        // 2. Message valide : on consomme une question
        session()->increment('guest_questions');
        RateLimiter::hit($this->guestKey(), 60 * 60 * 24);

        $this->isLoading = true;

        try {
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

            $assistant = $ai->generate($history, $this->prompt, $this->chat_id, $filePath, $fileName);

            $this->addMessage('assistant', $assistant ?: "No response");

            $this->reset(['prompt', 'document', 'documentPreview']);
        } catch (\Throwable $e) {
            $this->handleException($e);
        } finally {
            $this->isLoading = false;
            $this->guestLimitReached = $this->quotaExhausted();
        }
    }

    private function quotaExhausted(): bool
    {
        return session('guest_questions', 0) >= self::GUEST_LIMIT
            || RateLimiter::tooManyAttempts($this->guestKey(), self::GUEST_LIMIT);
    }

    private function guestKey(): string
    {
        return 'guest-chat:' . request()->ip();
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
    }

    private function handleException(\Throwable $e): void
    {
        logger()->error($e->getMessage());

        $msg = strtolower($e->getMessage());

        $error = match (true) {
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
        return view('livewire.chat-bot');
    }
}