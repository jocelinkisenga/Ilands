<div
 x-data="{
 autoScroll() {
 this.$nextTick(() => {
 const container = this.$refs.messagesContainer;
 container.scrollTop = container.scrollHeight;
 });
 }
 }"
 x-init="autoScroll()"
 @message-sent.window="autoScroll()"
 class="flex flex-col h-[calc(100vh-120px)] w-full overflow-hidden rounded-3xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-xl"
 >

 {{-- HEADER --}}
 <div class="relative shrink-0 overflow-hidden border-b border-gray-200 dark:border-gray-800">
  <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-900 to-gray-800 dark:from-black dark:via-gray-950 dark:to-gray-950 opacity-95"></div>

  <div class="relative z-10 flex items-center justify-between px-4 md:px-6 py-4 md:py-5">
   <div class="flex items-center gap-4">
    <div class="relative">
     <div class="w-10 h-10 md:w-12 md:h-12 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 flex items-center justify-center text-white text-xl shadow-lg">
      ✨
     </div>
     <div class="absolute -bottom-1 -right-1 w-3 h-3 md:w-4 md:h-4 bg-gray-400 border-2 border-gray-950 rounded-full animate-pulse dark:bg-gray-200"></div>
    </div>

    <div>
     <h2 class="text-base md:text-lg font-bold text-white tracking-tight">
      ILANDS AI Assistant
     </h2>
     <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">
      Powered by Gemini • Online
     </p>
    </div>
   </div>

   <div class="hidden md:flex items-center gap-2">
    <button class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 text-white text-sm transition">
     New Chat
    </button>
    <button class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 text-white transition flex items-center justify-center">
     ⋮
    </button>
   </div>
  </div>
 </div>

 {{-- CHAT BODY --}}
 <div
  x-ref="messagesContainer"
  class="flex-1 overflow-y-auto px-4 md:px-6 py-6 space-y-6 bg-gray-50 dark:bg-gray-950"
  >
  {{-- EMPTY STATE --}}
  @if(count($messages) === 0)
  <div class="h-full flex flex-col items-center justify-center text-center">
   <div class="w-16 h-16 md:w-20 md:h-20 rounded-3xl bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-800 dark:to-black flex items-center justify-center text-3xl md:text-4xl shadow-xl border border-gray-600 dark:border-gray-800">
    🤖
   </div>
   <h2 class="mt-6 text-xl md:text-2xl font-bold text-gray-900 dark:text-white">
    Welcome to ILANDS AI
   </h2>
   <p class="mt-3 text-xs md:text-sm max-w-md text-gray-500 dark:text-gray-400 leading-relaxed">
    Ask questions about taxes, business, finance, entrepreneurship, documents, or anything related to your platform.
   </p>
   <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-3 w-full max-w-2xl">
    <button wire:click="$set('prompt', 'Help me optimize my taxes')" class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition">
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Tax Optimization
     </p>
     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      Get intelligent tax suggestions
     </p>
    </button>
    <button wire:click="$set('prompt', 'Generate a professional business report')" class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition">
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Business Reports
     </p>
     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      Generate analytics & reports
     </p>
    </button>
   </div>
  </div>
  @endif

  {{-- MESSAGES --}}
  @foreach($messages as $index => $msg)
  <div wire:key="message-{{ $index }}" class="flex items-end gap-3 {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
   @if($msg['role'] !== 'user')
   <div class="w-8 h-8 md:w-10 md:h-10 shrink-0 rounded-xl md:rounded-2xl bg-gradient-to-br from-gray-800 to-gray-950 border border-gray-700 flex items-center justify-center text-white shadow-lg text-sm md:text-base">
    ✨
   </div>
   @endif

   <div class="max-w-[90%] md:max-w-[75%]">
    <div class="px-4 py-3 md:px-5 md:py-4 rounded-3xl shadow-sm border {{ $msg['role'] === 'user' ? 'bg-gray-900 dark:bg-gray-800 text-white border-gray-900 dark:border-gray-700 rounded-br-md' : 'bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border-gray-200 dark:border-gray-800 rounded-bl-md' }}">
     <div id="ai-response-{{ $index }}" class="text-sm leading-6 md:leading-7 whitespace-pre-line break-words">
     

      {!! $this->markdown($msg['content']) !!}
     </div>
    </div>

    <div class="mt-2 px-1 flex items-center gap-2 text-[10px] md:text-[11px] {{ $msg['role'] === 'user' ? 'justify-end text-gray-400' : 'justify-start text-gray-500' }}">
     <span>{{ $msg['role'] === 'user' ? 'You' : 'ILANDS AI' }}</span>
     <span>•</span>
     <span>{{ now()->format('H:i') }}</span>
    </div>
   </div>

   @if($msg['role'] === 'user')
   <div class="w-8 h-8 md:w-10 md:h-10 shrink-0 rounded-xl md:rounded-2xl bg-gray-900 dark:bg-gray-800 border border-gray-700 dark:border-gray-600 text-white flex items-center justify-center shadow-lg font-bold text-sm md:text-base">
    U
   </div>
   @endif
  </div>
  @endforeach

  {{-- LOADING --}}
  <div wire:loading.flex wire:target="sendMessage" class="justify-start items-end gap-3">
   <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl md:rounded-2xl bg-gradient-to-br from-gray-800 to-gray-950 border border-gray-700 flex items-center justify-center text-white shadow-lg">
    ✨
   </div>
   <div class="px-5 py-4 rounded-3xl rounded-bl-md bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 shadow-sm">
    <div class="flex items-center gap-2">
     <span class="w-2 h-2 bg-gray-600 dark:bg-gray-400 rounded-full animate-bounce"></span>
     <span class="w-2 h-2 bg-gray-600 dark:bg-gray-400 rounded-full animate-bounce [animation-delay:0.2s]"></span>
     <span class="w-2 h-2 bg-gray-600 dark:bg-gray-400 rounded-full animate-bounce [animation-delay:0.4s]"></span>
    </div>
   </div>
  </div>
 </div>

 {{-- INPUT CORRIGÉ AVEC UPLOAD DE FICHIER --}}

 {{-- ajout du document previrw ---}}
 @if($documentPreview)
 <div class="flex items-center gap-3 p-2 mb-2 rounded-xl bg-gray-100 dark:bg-gray-800 border">

  {{-- ICON --}}
  <div class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-gray-700">
   📄
  </div>

  {{-- INFO --}}
  <div class="flex-1">
   <p class="text-sm font-medium text-gray-900 dark:text-white">
    {{ $documentPreview['name'] }}
   </p>

   <p class="text-xs text-gray-500">
    {{ $documentPreview['size'] }} • {{ $documentPreview['type'] }}
   </p>
  </div>

  {{-- REMOVE --}}
  <button wire:click="$set('document', null); $set('documentPreview', null)"
   class="text-red-500 text-sm">
   ✕
  </button>
 </div>
 @endif
 {{-- end documentpreview --}}
 <div class="shrink-0 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-3 md:p-5"
  x-data="{
  resizeTextarea() {
  $refs.textarea.style.height = '44px';
  $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px';
  },
  resetTextarea() {
  $refs.textarea.style.height = '44px';
  }
  }"
  @message-sent.window="resetTextarea()"
  >
  <div class="relative flex flex-col w-full rounded-3xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 transition-shadow focus-within:border-gray-500 focus-within:ring-4 focus-within:ring-gray-500/10 dark:focus-within:border-gray-400 dark:focus-within:ring-gray-400/10">

   <div class="flex items-end gap-2 p-2">

    {{-- BOUTON ATTACHEMENT (Document) --}}
    <label class="shrink-0 flex items-center justify-center w-10 h-10 mb-0.5 rounded-full text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-gray-400 cursor-pointer transition" title="Joindre un document">
     <input type="file" wire:model="document" class="hidden" accept=".pdf,.doc,.docx,.txt,image/*" />
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
     <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
    </svg>
   </label>

   {{-- TEXTAREA --}}
   <textarea
    x-ref="textarea"
    @input="resizeTextarea()"
    @keydown.enter="
    if (!$event.shiftKey) {
    $event.preventDefault();
    if (!$wire.isLoading) {
    $wire.sendMessage();
    }
    }
    "
    wire:model.defer="prompt"
    maxlength="5000"
    rows="1"
    placeholder="Ask ILANDS AI anything..."
    class="flex-1 max-h-[35vh] min-h-[44px] py-3 px-2 bg-transparent border-0 focus:ring-0 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 resize-none overflow-y-auto"
    ></textarea>

   {{-- BOUTON ENVOYER --}}
   <button
    type="button"
    wire:click="sendMessage"
    wire:loading.attr="disabled"
    class="shrink-0 flex items-center justify-center w-10 h-10 mb-0.5 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 hover:bg-gray-800 dark:hover:bg-gray-100 shadow-sm transition disabled:opacity-50"
    >
    <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
    </svg>

    <svg wire:loading class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
     <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
     <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
    </svg>
   </button>
  </div>

  {{-- COMPTEUR DE CARACTÈRES --}}
  <div class="flex justify-end px-4 pb-2">
   <span class="text-[10px] font-medium {{ strlen($prompt ?? '') > 4900 ? 'text-red-500' : 'text-gray-400' }}">
    {{ strlen($prompt ?? '') }}/5000
   </span>
  </div>
 </div>
</div>
</div>