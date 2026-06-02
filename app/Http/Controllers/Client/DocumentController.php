<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ChatMessage;
class DocumentController extends Controller
{
    public function index () {
      $documents = auth()->user()->chatMessages()
            ->whereNotNull('file_path') // Uniquement les messages avec un fichier
            ->where('role', 'user')      // Uniquement ceux envoyés par l'utilisateur
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($message) {
                return [
                    'id'             => $message->id,
                    'name'           => $message->file_name,
                    'type'           => $message->file_type,
                    'size'           => $this->formatFileSize($message->file_path),
                    'date'           => $message->created_at->format('d/m/Y H:i'),
                    'context_prompt' => $message->message,
                ];
            });
        return view("pages.documents.documents", compact('documents'));
    }
    
        public function hystory()
    {
        // On récupère les messages. 
        // Si tu as un système d'authentification, tu peux ajouter : ->where('user_id', auth()->id())
        $chats = ChatMessage::latest()->get();

        $formattedChats = $chats->map(function ($chat) {
            return [
                'id'         => $chat->id,
                'role'       => $chat->role,
                'message'    => $chat->message,
                'created_at' => $chat->created_at->format('d/m/Y H:i'),
                'updated_at' => $chat->updated_at->format('d/m/Y H:i'),
            ];
        });
        
        return view('pages.hystory.hystory', [
            'chats' => $formattedChats
        ]);
    }

       /**
     * Calcule et formate de façon propre la taille du fichier stocké sur le disque.
     */
    private function formatFileSize(?string $filePath): string
    {
        if (!$filePath || !\Storage::disk('local')->exists($filePath)) {
            return 'N/A';
        }

        $bytes = \Storage::disk('local')->size($filePath);
        
        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }
        
        return number_format($bytes / 1024, 2) . ' KB';
    }
}
