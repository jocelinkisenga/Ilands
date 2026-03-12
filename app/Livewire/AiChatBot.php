<?php

namespace App\Livewire;

use Livewire\Component;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Log;

class AiChatBot extends Component
{
    public string $prompt = '';

    public array $messages = [];

    public bool $isStreaming = false;

    public function sendMessage(): void
    {
        // Prevent duplicate requests
        if ($this->isStreaming) {
            return;
        }

        // Trim prompt
        $this->prompt = trim($this->prompt);

        // Prevent empty messages
        if ($this->prompt === '') {
            return;
        }

        // Limit characters (avoid abuse)
        if (strlen($this->prompt) > 200) {
            $this->prompt = substr($this->prompt, 0, 200);
        }

        $this->isStreaming = true;

        try {

            // Save user message
            $this->messages[] = [
                'role' => 'user',
                'content' => $this->prompt
            ];

            $userPrompt = $this->prompt;

            // Reset input
            $this->prompt = '';

            // Create AI message placeholder
            $messageIndex = count($this->messages);

            $this->messages[$messageIndex] = [
                'role' => 'ai',
                'content' => ''
            ];

            // Gemini streaming
            $stream = Gemini::generativeModel(
                model: 'gemini-2.0-flash'
            )->streamGenerateContent($userPrompt);

            foreach ($stream as $response) {

                $chunk = $response->text();

                if (!$chunk) {
                    continue;
                }

                $this->messages[$messageIndex]['content'] .= $chunk;

                // Stream chunk to frontend
                $this->stream(
                    to: "ai-response-{$messageIndex}",
                    content: $chunk,
                    replace: false
                );
            }

        } catch (\Throwable $e) {

            Log::error('Gemini Error', [
                'message' => $e->getMessage()
            ]);

            $this->messages[] = [
                'role' => 'ai',
                'content' => '⚠️ AI service is currently unavailable. Please try again later.'
            ];

        } finally {

            $this->isStreaming = false;
        }
    }

    public function render()
    {
        return view('livewire.ai-chat-bot');
    }
}