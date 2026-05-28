<?php

namespace App\Livewire;

use Livewire\Component;

use Prism\Prism\Facades\Prism;

use Prism\Prism\ValueObjects\Messages\UserMessage;
use Prism\Prism\ValueObjects\Messages\AssistantMessage;

class AiChatBot extends Component
{
    public $prompt = '';

    public $messages = [];

    public function mount()
    {
        $this->messages = auth()->user()
            ->chatMessages()
            ->latest()
            ->limit(20)
            ->get()
            ->reverse()
            ->map(fn ($message) => [
                'role' => $message->role,
                'content' => $message->message,
            ])
            ->toArray();

        if (count($this->messages) === 0) {

            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'Hello 👋 I am ILANDS AI assistant. How can I help you today?',
            ];
        }
    }

    public function sendMessage()
    {
        if (empty(trim($this->prompt))) {
            return;
        }

        $userMessage = trim($this->prompt);

        /*
        |--------------------------------------------------------------------------
        | ADD USER MESSAGE
        |--------------------------------------------------------------------------
        */

        $this->messages[] = [
            'role' => 'user',
            'content' => $userMessage,
        ];

        auth()->user()->chatMessages()->create([
            'role' => 'user',
            'message' => $userMessage,
        ]);

        $this->prompt = '';

        $this->dispatch('message-sent');

        try {

            /*
            |--------------------------------------------------------------------------
            | SYSTEM PROMPT
            |--------------------------------------------------------------------------
            */

            $systemPrompt = "
                You are ILANDS AI assistant.

                You help users with:
                - taxes
                - business
                - finance
                - entrepreneurship
                - startup growth
                - AI assistance

                Keep responses concise, professional and modern.
            ";

            /*
            |--------------------------------------------------------------------------
            | BUILD CONVERSATION
            |--------------------------------------------------------------------------
            */

            $conversation = [];

            foreach ($this->messages as $message) {

                if ($message['role'] === 'assistant') {

                    $conversation[] = new AssistantMessage(
                        $message['content']
                    );

                } else {

                    $conversation[] = new UserMessage(
                        $message['content']
                    );
                }
            }

            /*
            |--------------------------------------------------------------------------
            | GEMINI REQUEST
            |--------------------------------------------------------------------------
            */

            $response = Prism::text()
                ->using('gemini', 'gemini-2.0-flash')
                ->withSystemPrompt($systemPrompt)
                ->withMessages($conversation)
                ->generate();

            $assistantMessage = $response->text;

            /*
            |--------------------------------------------------------------------------
            | ADD AI RESPONSE
            |--------------------------------------------------------------------------
            */

            $this->messages[] = [
                'role' => 'assistant',
                'content' => $assistantMessage,
            ];

            auth()->user()->chatMessages()->create([
                'role' => 'assistant',
                'message' => $assistantMessage,
            ]);

            $this->dispatch('message-sent');

        } catch (\Throwable $e) {

            report($e);

            $this->messages[] = [
                'role' => 'assistant',
                'content' => 'AI service temporarily unavailable.',
            ];
        }
    }

    public function render()
    {
        return view('livewire.ai-chat-bot');
    }
}