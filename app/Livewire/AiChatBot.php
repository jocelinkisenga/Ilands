<?php

namespace App\Livewire;

use Livewire\Component;
use Gemini\Laravel\Facades\Gemini;
use Livewire\Attributes\Validate;

class AiChatBot extends Component
{




    public string $prompt = '';

    public array $messages = [];

    public function sendMessage()
    {
        dd("okay");
        //$this->validate();

        // Ajouter le message utilisateur à l'historique
        $this->messages[] = ['role' => 'user', 'content' => $this->prompt];
        
        $userPrompt = $this->prompt;
        $this->prompt = ''; 

        
        $messageIndex = count($this->messages);
        $this->messages[$messageIndex] = ['role' => 'ai', 'content' => ''];

        // Streaming vers le navigateur via Livewire
        $stream = Gemini::generativeModel(model: 'gemini-2.0-flash')
            ->streamGenerateContent($userPrompt);

        foreach ($stream as $response) {
            $chunk = $response->text();
            $this->messages[$messageIndex]['content'] .= $chunk;
            
            // On "pousse" le changement vers le front-end à chaque fragment
            $this->stream(
                to: "ai-response-{$messageIndex}",
                content: $chunk,
                replace: false
            );
        }
    }

        public function render()
    {
        return view('livewire.ai-chat-bot');
    }



}

