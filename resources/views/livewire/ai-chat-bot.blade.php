{{-- CONTENEUR PRINCIPAL DE CHAT - Ajout de 'relative' pour positionner les boutons flottants --}}
<div
 x-data="{
 prompt: '', {{-- Ajout pour la logique du compteur --}}
 autoScroll() {
 this.$nextTick(() => {
 const container = this.$refs.messagesContainer;
 container.scrollTop = container.scrollHeight;
 });
 }
 }"
 x-init="autoScroll()"
 @message-sent.window="autoScroll(); prompt = '' {{-- Réinitialiser le compteur Alpine.js --}}"
 class="relative flex flex-col h-[calc(100vh-120px)] w-full overflow-hidden rounded-3xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 shadow-xl"
 >

 {{-- HEADER --}}
{{-- HEADER COMPACT --}}
 <div class="relative shrink-0 overflow-hidden border-b border-gray-200 dark:border-gray-800 shadow-sm z-20">
  <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-900 to-gray-800 dark:from-black dark:via-gray-950 dark:to-gray-950 opacity-95"></div>

  <div class="relative z-10 flex items-center justify-between px-4 md:px-6 py-2 md:py-3">
   <div class="flex items-center gap-3">
    <div class="relative shrink-0">
     <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 backdrop-blur-xl border border-white/20 flex items-center justify-center text-white text-lg shadow-inner">
      ✨
     </div>
     <div class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 md:w-3 md:h-3 bg-gray-400 border-2 border-gray-950 rounded-full animate-pulse dark:bg-gray-200"></div>
    </div>

    <div class="flex-1 min-w-0">
     <h2 class="text-sm md:text-base font-bold text-white tracking-tight leading-tight truncate">
      ILANDS AI Assistant 
      <span class="block md:inline text-[10px] md:text-[11px] text-gray-400 dark:text-gray-500 font-normal md:ml-1 mt-0.5 md:mt-0">
       (for educational guidance only !)
      </span>
     </h2>
    </div>
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

{{-- token error --}}
  @if($tokenError === true)
  <div class="max-w-md mx-auto bg-white dark:bg-gray-900 rounded-3xl shadow-xl border border-emerald-100 dark:border-emerald-900/50 p-8 transition-all duration-300 hover:border-emerald-200 dark:hover:border-emerald-800">
        
        <div class="flex items-start gap-5 mb-6">
            
            <div class="flex-shrink-0 w-16 h-16 rounded-2xl bg-emerald-50 dark:bg-emerald-950/50 flex items-center justify-center border-2 border-emerald-100 dark:border-emerald-900 ring-4 ring-emerald-50/50 dark:ring-emerald-950/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-emerald-600 dark:text-emerald-400" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.007z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex-1">
                <h3 class="text-2xl font-bold text-gray-950 dark:text-white mb-1 leading-tight">Level up you subscription</h3>
                <p class="text-sm text-emerald-700 dark:text-emerald-300 font-medium tracking-wide">Access unlimited functionalities</p>
            </div>
        </div>
        @if(auth()->user()->plan == "free")
        <a href="/price" class="w-full group relative flex items-center justify-center gap-3 px-8 py-4 bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-400 text-white font-bold rounded-2xl shadow-lg shadow-emerald-950/10 dark:shadow-emerald-950/40 transition-all duration-200 ease-out hover:-translate-y-0.5 focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-800 active:scale-[0.98]">
            <span class="text-lg tracking-tight">Subsucribe to one of our plans</span>
            
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
        @else
                <a href="{{ route('subscription.upgrade') }}" class="w-full group relative flex items-center justify-center gap-3 px-8 py-4 bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-500 dark:hover:bg-emerald-400 text-white font-bold rounded-2xl shadow-lg shadow-emerald-950/10 dark:shadow-emerald-950/40 transition-all duration-200 ease-out hover:-translate-y-0.5 focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-800 active:scale-[0.98]">
            <span class="text-lg tracking-tight">Upgrade your plan for more functionalities</span>
            
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
        @endif
        <p class="text-xs text-center text-gray-500 dark:text-gray-500 mt-4">Annulable à tout moment. Votre succès est notre priorité.</p>

    </div>
    @endif

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

 {{-- BOUTONS FLOTTANTS VERTICAUX (Image_2.png) --}}
 <div class="absolute bottom-24 right-4 flex flex-col gap-2 z-20">
  <a href="{{route('chat')}}"
   class="flex items-center gap-2 px-3 py-2 md:px-4 md:py-2.5 rounded-xl bg-white/80 dark:bg-gray-800/80 backdrop-blur-md border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 shadow-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition"
   title="New Chat">
   <span class="text-sm md:text-base">➕</span>
   <span class="text-sm font-medium hidden md:block">New Chat</span>
  </a>

  <button wire:click="generateReport"
   class="flex items-center gap-2 px-3 py-2 md:px-4 md:py-2.5 rounded-xl bg-emerald-50 dark:bg-emerald-900/30 backdrop-blur-md border border-emerald-200 dark:border-emerald-800/50 text-emerald-600 dark:text-emerald-400 shadow-lg hover:bg-emerald-100 dark:hover:bg-emerald-900/50 transition"
   title="Generate Report">
   <span class="text-sm md:text-base">📊</span>
   <span class="text-sm font-medium hidden md:block">Report</span>
  </button>
 </div>

 {{-- ZONE DE SAISIE ÉTENDUE (Image_2.png) --}}
 <div class="shrink-0 border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-2 md:p-3"
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
  {{-- ajout du document previrw ÉTENDU --}}
{{-- ajout du document preview AJUSTÉ --}}
  @if($documentPreview)
  <div class="w-fit max-w-[90%] md:max-w-sm flex items-center gap-3 p-2 mb-2 rounded-xl bg-gray-100 dark:bg-gray-800 border">
   
   {{-- ICON --}}
   <div class="w-10 h-10 shrink-0 flex items-center justify-center rounded-lg bg-gray-200 dark:bg-gray-700">
    📄
   </div>
   
   {{-- INFO (Ajout de min-w-0 pour permettre la troncature) --}}
   <div class="flex-1 min-w-0">
    <p class="text-sm font-medium text-gray-900 dark:text-white truncate" title="{{ $documentPreview['name'] }}">
     {{ $documentPreview['name'] }}
    </p>
    <p class="text-xs text-gray-500 truncate">
     {{ $documentPreview['size'] }} • {{ $documentPreview['type'] }}
    </p>
   </div>
   
   {{-- REMOVE --}}
   <button wire:click="$set('document', null); $set('documentPreview', null)"
    class="shrink-0 text-red-500 text-sm ml-2">
    ✕
   </button>
  </div>
  @endif
  {{-- end documentpreview --}}
  {{-- end documentpreview --}}

  <div class="relative flex flex-col w-full rounded-3xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 transition-shadow focus-within:border-gray-500 focus-within:ring-4 focus-within:ring-gray-500/10 dark:focus-within:border-gray-400 dark:focus-within:ring-gray-400/10">

   <div class="flex items-end gap-2 p-2">

    {{-- BOUTON ATTACHEMENT (Document) --}}
    <label class="shrink-0 flex items-center justify-center w-10 h-10 mb-0.5 rounded-full text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-gray-400 cursor-pointer transition" title="Joindre un document">
     <input type="file" wire:model="document" class="hidden" accept=".pdf,.doc,.docx,.txt,image/*" />
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
     </svg>
    </label>

    {{-- TEXTAREA AVEC LOGIQUE ALPINE.JS ET LIVEWIRE HYBRIDE (Correctif Logique) --}}
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
     x-model="prompt" {{-- Logique Alpine.js pour le compteur en direct --}}
     wire:model.defer="prompt" {{-- État Livewire asynchrone --}}
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

   {{-- COMPTEUR DE CARACTÈRES ALPINE.JS (Correctif Logique) --}}
   <div class="flex justify-end px-4 pb-2">
    <span class="text-[10px] font-medium"
     :class="prompt.length > 4900 ? 'text-red-500' : 'text-gray-400'"
     >
     <span x-text="prompt.length">0</span>/5000
    </span>
   </div>
  </div>
 </div>
</div>