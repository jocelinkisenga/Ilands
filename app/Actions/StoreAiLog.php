<?php 
namespace App\Actions; 
use App\Models\AiLogs;
class StoreAiLog {
public function handler (int $chatId, $usage) {
   AiLogs::create([
   'user_id' => auth()->user()->id,
   'chat_id' => $chatId,
   'tokens_used' => ($usage->promptTokens ?? 0) + ($usage->completionTokens ?? 0)
   ]);
}
}