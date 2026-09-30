{{-- WIDGET CHATBOT FLOTTANT - ILANDS AI --}}
<div
 x-data="{
    open: false,
    prompt: '',
    autoScroll() {
        this.$nextTick(() => {
            const container = this.$refs.messagesContainer;
            if (container) container.scrollTop = container.scrollHeight;
        });
    }
 }"
 x-init="$watch('open', value => { if (value) autoScroll() })"
 @message-sent.window="autoScroll(); prompt = ''"
 @keydown.escape.window="open = false"
 class="font-sans antialiased"
>

 {{-- BOUTON FLOTTANT --}}
 <button
  type="button"
  @click="open = !open"
  class="fixed bottom-5 right-5 z-40 flex items-center justify-center w-14 h-14 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 shadow-lg shadow-black/20 hover:scale-105 active:scale-95 transition-transform duration-200 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700"
  :aria-label="open ? 'Close chat' : 'Open chat'"
  :aria-expanded="open"
 >
  {{-- Icône chat --}}
  <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="w-6 h-6">
   <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
  </svg>
  {{-- Icône fermer --}}
  <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
  </svg>
 </button>

 {{-- FENÊTRE DE CHAT --}}
 <div
  x-show="open"
  x-cloak
  x-transition:enter="transition ease-out duration-200"
  x-transition:enter-start="opacity-0 translate-y-4 scale-95"
  x-transition:enter-end="opacity-100 translate-y-0 scale-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100 translate-y-0 scale-100"
  x-transition:leave-end="opacity-0 translate-y-4 scale-95"
  class="fixed z-50 inset-0 sm:inset-auto sm:bottom-24 sm:right-5 flex flex-col w-full sm:w-[400px] h-full sm:h-[640px] sm:max-h-[calc(100vh-7rem)] origin-bottom-right bg-white dark:bg-gray-900 sm:rounded-2xl shadow-2xl border-0 sm:border border-gray-200 dark:border-gray-800 overflow-hidden"
 >

  {{-- HEADER --}}
  <div class="flex-none flex items-center justify-between px-4 py-3 border-b border-gray-100 dark:border-gray-800">
   <div class="flex items-center gap-3">
    <div class="flex items-center justify-center w-9 h-9 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
      <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
     </svg>
    </div>
    <div class="flex flex-col leading-tight">
     <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 tracking-tight">ILANDS AI</h2>
     <span class="inline-flex items-center gap-1.5 text-[11px] font-medium text-red-500 dark:text-red-400">
      <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
      Educational guidance only
     </span>
    </div>
   </div>

   <button type="button" @click="open = false" class="p-2 text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition" aria-label="Close chat">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
   </button>
  </div>

  {{-- CORPS DU CHAT --}}
  <div x-ref="messagesContainer" class="flex-1 overflow-y-auto scroll-smooth">
   <div class="w-full px-4 py-5 flex flex-col gap-6">

    {{-- EMPTY STATE --}}
    @if(count($messages) === 0)
    <div class="flex flex-col items-center text-center pt-4">
     <div class="w-14 h-14 rounded-full bg-gray-50 dark:bg-gray-800 flex items-center justify-center border border-gray-100 dark:border-gray-700/50 mb-4">
      <span class="text-xl">✨</span>
     </div>
     <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">How can I help you?</h2>
     <p class="text-xs text-gray-500 dark:text-gray-400 max-w-xs mx-auto mb-5">
      Ask questions about taxes, business, finance, entrepreneurship, documents, or anything related to your platform.
     </p>

     <div class="grid grid-cols-1 gap-2 w-full">
      @foreach($defaultQuestions as $question)
      <button wire:click="$set('prompt', '{{$question->message}}')" class="text-left px-3.5 py-3 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#2A2A2A] hover:bg-gray-50 dark:hover:bg-[#333333] transition-colors group">
       <p class="font-medium text-gray-900 dark:text-gray-100 text-[13px] group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">{{$question->message}}</p>
      </button>
      @endforeach
     </div>
    </div>
    @endif

    {{-- MESSAGES --}}
    @foreach($messages as $index => $msg)
    <div wire:key="message-{{ $index }}" class="flex w-full {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">

     {{-- IA MESSAGE --}}
     @if($msg['role'] !== 'user')
     <div class="flex gap-3 w-full">
      <div class="w-7 h-7 shrink-0 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 flex items-center justify-center mt-0.5">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5"><path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5z" clip-rule="evenodd" /></svg>
      </div>
      <div class="flex-1 min-w-0 prose prose-sm prose-slate dark:prose-invert max-w-none text-[14px] leading-relaxed text-gray-800 dark:text-gray-200 break-words">
       {!! $this->markdown($msg['content']) !!}
      </div>
     </div>
     @endif

     {{-- USER MESSAGE --}}
     @if($msg['role'] === 'user')
     <div class="max-w-[85%] bg-gray-100 dark:bg-[#2F2F2F] text-gray-900 dark:text-gray-100 px-4 py-2.5 rounded-2xl rounded-tr-sm text-[14px] leading-relaxed break-words">
      {!! $this->markdown($msg['content']) !!}
     </div>
     @endif
    </div>
    @endforeach

    {{-- TOKEN ERROR --}}
    @if($guestLimitReached == 2)
    <div class="w-full bg-emerald-50 dark:bg-emerald-900/10 rounded-2xl border border-emerald-100 dark:border-emerald-800/30 p-5">
     <div class="flex flex-col items-center text-center">
      <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-800/50 flex items-center justify-center mb-3 text-emerald-600 dark:text-emerald-400">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
      </div>
      <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-1">Limit Reached</h3>
      <p class="text-xs text-gray-600 dark:text-gray-400 mb-4">Upgrade your plan to unlock unlimited AI functionalities and remove all restrictions.</p>

      @if(auth()->user()->plan == "free")
      <a href="/price" class="inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-colors w-full">
       Subscribe to a plan
      </a>
      @else
      <a href="{{ route('subscription.upgrade') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-medium rounded-xl transition-colors w-full">
       Upgrade your plan
      </a>
      @endif
     </div>
    </div>
    @endif

    {{-- LOADING STATE --}}
    <div wire:loading.flex wire:target="sendMessage" class="flex gap-3 w-full">
     <div class="w-7 h-7 shrink-0 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 flex items-center justify-center mt-0.5">
      <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
     </div>
     <div class="flex items-center h-7">
      <span class="text-sm text-gray-500 dark:text-gray-400 font-medium animate-pulse">Thinking...</span>
     </div>
    </div>
   </div>
  </div>

  {{-- ZONE DE SAISIE --}}
  <div
   class="flex-none border-t border-gray-100 dark:border-gray-800 bg-white dark:bg-gray-900 px-3 pt-3 pb-2"
   x-data="{
    resizeTextarea() {
     $refs.textarea.style.height = '44px';
     $refs.textarea.style.height = Math.min($refs.textarea.scrollHeight, 140) + 'px';
    },
    resetTextarea() {
     $refs.textarea.style.height = '44px';
    }
   }"
   @message-sent.window="resetTextarea()"
  >
   {{-- DOCUMENT PREVIEW --}}
   @if($documentPreview)
   <div class="w-fit max-w-full flex items-center gap-3 p-2 mb-2 rounded-xl bg-white dark:bg-[#2F2F2F] border border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="w-8 h-8 shrink-0 flex items-center justify-center rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
    </div>
    <div class="flex-1 min-w-0">
     <p class="text-xs font-medium text-gray-900 dark:text-white truncate">{{ $documentPreview['name'] }}</p>
     <p class="text-[10px] text-gray-500 truncate">{{ $documentPreview['size'] }}</p>
    </div>
    <button wire:click="$set('document', null); $set('documentPreview', null)" class="shrink-0 text-gray-400 hover:text-red-500 p-1">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
    </button>
   </div>
   @endif

   {{-- CHAMP DE SAISIE --}}
   <div class="relative flex items-end w-full rounded-2xl bg-gray-50 dark:bg-[#2F2F2F] border border-gray-200 dark:border-gray-700/80 focus-within:border-gray-300 dark:focus-within:border-gray-600 focus-within:ring-2 focus-within:ring-gray-100 dark:focus-within:ring-gray-800 transition-all duration-200">

    {{-- BOUTON ATTACHEMENT --}}
    <label class="shrink-0 flex items-center justify-center w-11 h-11 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 cursor-pointer transition">
     <input type="file" wire:model="document" class="hidden" accept=".pdf,.doc,.docx,.txt,image/*" />
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
      <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
     </svg>
    </label>

    {{-- TEXTAREA --}}
    <textarea
     x-ref="textarea"
     @input="resizeTextarea()"
     @keydown.enter="if (!$event.shiftKey) { $event.preventDefault(); if (!$wire.isLoading) { $wire.sendMessage(); } }"
     x-model="prompt"
     wire:model.defer="prompt"
     maxlength="5000"
     rows="1"
     placeholder="Message ILANDS AI..."
     class="flex-1 max-h-[140px] min-h-[44px] py-3 px-0 bg-transparent border-0 focus:ring-0 text-[14px] text-gray-900 dark:text-gray-100 placeholder:text-gray-500 resize-none overflow-y-auto"
    ></textarea>

    {{-- BOUTON ENVOYER --}}
    <div class="shrink-0 flex items-center justify-center w-11 h-11 pr-1.5">
     <button
      type="button"
      wire:click="sendMessage"
      wire:loading.attr="disabled"
      class="flex items-center justify-center w-8 h-8 rounded-full bg-black dark:bg-white text-white dark:text-black hover:opacity-80 transition disabled:opacity-50 disabled:cursor-not-allowed"
     >
      <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
       <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
      </svg>
      <svg wire:loading class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
     </button>
    </div>
   </div>

   {{-- FOOTER : DISCLAIMER + COMPTEUR --}}
   <div class="flex items-center justify-between mt-2 px-1">
    <p class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-red-500 dark:text-red-400">
     <span class="h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span>
     Educational guidance only
    </p>
    <span class="text-[10px] font-medium" :class="prompt.length > 4900 ? 'text-red-500' : 'text-gray-400 dark:text-gray-500'">
     <span x-text="prompt.length">0</span>/5000
    </span>
   </div>
  </div>
 </div>
</div>