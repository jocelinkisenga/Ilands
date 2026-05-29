<?php

namespace App\Livewire;

use Livewire\Component;
use Prism\Prism\Facades\Prism;
use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;

class AiChatBot extends Component
{
    public bool $isLoading = false;
    public string $prompt = '';
    public array $messages = [];

    /**
     * Limit chat history to reduce token usage
     */
    private int $maxHistory = 10;

    /**
     * Prevent very long prompts (cost control)
     */
    private int $maxPromptLength = 800;

    public function mount()
    {
        $this->messages = auth()->user()
            ->chatMessages()
            ->latest()
            ->limit($this->maxHistory)
            ->get()
            ->reverse()
            ->map(fn ($message) => [
                'role' => $message->role,
                'content' => $message->message,
            ])
            ->toArray();

        // Default message only if empty
        if (empty($this->messages)) {
            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'Hello 👋 I am ILANDS AI assistant. How can I help you today?',
            ];
        }
    }

    public function sendMessage()
    {
        $this->prompt = trim($this->prompt);

        /*
        |--------------------------------------------------------------------------
        | VALIDATION (COST CONTROL)
        |--------------------------------------------------------------------------
        */

        if ($this->prompt === '') {
            return;
        }

        if (strlen($this->prompt) > $this->maxPromptLength) {

            $this->messages[] = [
                'role' => 'assistant',
                'content' => '⚠️ Message too long. Please shorten your request.',
            ];

            return;
        }

        if ($this->isLoading) {
            return; // prevent double spam clicks
        }

        $this->isLoading = true;

        $userMessage = $this->prompt;

        $this->prompt = '';

        /*
        |--------------------------------------------------------------------------
        | STORE USER MESSAGE
        |--------------------------------------------------------------------------
        */

        $this->addMessage('user', $userMessage);

        $this->dispatch('message-sent');

        try {

            /*
            |--------------------------------------------------------------------------
            | SYSTEM PROMPT (OPTIMIZED = LESS TOKENS)
            |--------------------------------------------------------------------------
            */

            $systemPrompt = "You are ILANDS AI. Be concise, practical, and professional.";

            /*
            |--------------------------------------------------------------------------
            | BUILD REDUCED CONTEXT (IMPORTANT FOR COST)
            |--------------------------------------------------------------------------
            */

            $conversation = [];

            foreach (array_slice($this->messages, -$this->maxHistory) as $message) {

                if (empty($message['content'])) continue;

                $conversation[] = $message['role'] === 'assistant'
                    ? new AssistantMessage($message['content'])
                    : new UserMessage($message['content']);
            }

            /*
            |--------------------------------------------------------------------------
            | GEMINI REQUEST (FLASH MODEL = CHEAPER & STABLE)
            |--------------------------------------------------------------------------
            */

            $response = Prism::text()
                ->using('gemini', 'gemini-flash-latest') // safer & cheaper than latest overload
                ->withSystemPrompt($systemPrompt)
                ->withMessages($conversation)
                ->generate();

            $assistantMessage = trim($response->text ?? '');

            if ($assistantMessage === '') {
                $assistantMessage = "I couldn't generate a response. Try again.";
            }

            /*
            |--------------------------------------------------------------------------
            | STORE AI RESPONSE
            |--------------------------------------------------------------------------
            */

            $this->addMessage('assistant', $assistantMessage);

        } catch (\Exception $e) {

            logger()->error('AI ERROR: ' . $e->getMessage());

            $msg = strtolower($e->getMessage());

            /*
            |--------------------------------------------------------------------------
            | SMART ERROR HANDLING
            |--------------------------------------------------------------------------
            */

            if (str_contains($msg, 'rate limit')) {
                $error = "⚠️ Too many requests. Please wait a moment.";
            } elseif (str_contains($msg, 'overloaded')) {
                $error = "⚠️ AI server is busy. Retry in a few seconds.";
            } else {
                $error = "⚠️ AI temporarily unavailable.";
            }

            $this->addMessage('assistant', $error);
        }

        $this->isLoading = false;

        $this->dispatch('message-sent');
    }

    /**
     * Centralized message handler (clean + reusable)
     */
    private function addMessage(string $role, string $content): void
    {
        $this->messages[] = [
            'role' => $role,
            'content' => $content,
        ];

        if (!auth()->check()) return;

        auth()->user()->chatMessages()->create([
            'role' => $role,
            'message' => $content,
        ]);
    }

    public function render()
    {
        return view('livewire.ai-chat-bot');
    }
}