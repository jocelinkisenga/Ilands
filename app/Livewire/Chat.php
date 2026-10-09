<?php

namespace App\Livewire;

use App\Services\ChatService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Chat extends Component
{
    private const GUEST_LIMIT = 5;

    public string $theme;
    public array $messages = [];
    public string $newMessage = '';
    public array $suggestedQuestions = [];

    public bool $isLoading = false;
    public bool $guestLimitReached = false;

    public function mount(string $theme = 'Estimated taxes, Gig Economy Workers, American Expats, period of declarations')
    {
        $this->theme = $theme;

        // Message d'accueil initial de l'IA
        $this->messages[] = [
            'sender' => 'bot',
            'text' => "Hello ! how can I help you with {$this->theme} ?"
        ];

        $this->guestLimitReached = $this->quotaExhausted();

        // Inutile d'appeler l'IA pour des suggestions si le visiteur a déjà atteint sa limite
        if (!$this->guestLimitReached) {
            $this->loadSuggestions();
        }
    }

    // private : non appelable depuis le navigateur, donc impossible de contourner la limite
    private function loadSuggestions(): void
    {
        $this->suggestedQuestions = app(ChatService::class)->getSuggestedQuestions($this->theme);
    }

    public function selectQuestion(string $question)
    {
        $this->newMessage = $question;
        $this->sendMessage(app(ChatService::class));
    }

    public function sendMessage(ChatService $chat)
    {
        // 1. Limite atteinte : on s'arrête avant tout appel à l'IA
        if ($this->quotaExhausted()) {
            $this->guestLimitReached = true;
            return;
        }

        if ($this->isLoading) {
            return;
        }

        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        $userText = trim($this->newMessage);

        // 2. Message valide : on consomme une question (visiteurs non connectés uniquement)
        $this->consumeQuota();

        $this->isLoading = true;

        // Ajouter le message de l'utilisateur
        $this->messages[] = [
            'sender' => 'user',
            'text' => $userText,
        ];

        $this->newMessage = '';

        try {
            $systemPrompt = "you are a virtual expert in the thematic : " . $this->theme;
            $reply = $chat->generateResponse($systemPrompt, $userText);
        } catch (\Throwable $e) {
            logger()->error($e->getMessage());
            $reply = " ⚠️ we have accounted an error try again later.";
        } finally {
            $this->isLoading = false;
            $this->guestLimitReached = $this->quotaExhausted();
        }

        // Ajouter la réponse du bot
        $this->messages[] = [
            'sender' => 'bot',
            'text' => $reply,
        ];
    }

    private function quotaExhausted(): bool
    {
        // Les utilisateurs connectés ne sont pas limités
        if (Auth::check()) {
            return false;
        }

        return session('guest_questions', 0) >= self::GUEST_LIMIT
            || RateLimiter::tooManyAttempts($this->guestKey(), self::GUEST_LIMIT);
    }

    private function consumeQuota(): void
    {
        if (Auth::check()) {
            return;
        }

        session()->increment('guest_questions');
        RateLimiter::hit($this->guestKey(), 60 * 60 * 24);
    }

    private function guestKey(): string
    {
        return 'guest-chat:' . request()->ip();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}