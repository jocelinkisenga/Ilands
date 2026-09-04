{{-- CONTENEUR PRINCIPAL DE CHAT - UI Premium & Minimaliste --}}
<div
 x-data="{
    prompt: '',
    autoScroll() {
        this.$nextTick(() => {
            const container = this.$refs.messagesContainer;
            container.scrollTop = container.scrollHeight;
        });
    }
    {{-- bg-white dark:bg-[#212121] --}}
 }"
 x-init="autoScroll()"
 @message-sent.window="autoScroll(); prompt = ''"
 class="relative flex flex-col h-[calc(100vh-40px)] w-full max-w-5xl mx-auto overflow-hidden bg-white dark:bg-gray-900   rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800/60 font-sans antialiased"
>

 {{-- HEADER ÉPURÉ --}}
 <div class="flex-none px-4 py-3 md:px-6 md:py-4 bg-white/80 dark:bg-[#212121]/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800/60 z-20 sticky top-0">
  <div class="flex items-center justify-between max-w-3xl mx-auto">
   <div class="flex items-center gap-3">
    <div class="relative flex items-center justify-center w-8 h-8 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900">
     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
      <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
     </svg>
    </div>
    <div class="flex flex-col">
     <h2 class="text-sm font-semibold text-gray-900 dark:text-gray-100 tracking-tight">ILANDS AI</h2>
    </div>
   </div>
   
   {{-- Boutons d'action rapides intégrés au header pour désencombrer l'écran --}}
   <div class="flex items-center gap-2">
    <button wire:click="generateReport" class="p-2 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" title="Generate Report">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
    </button>
    <a href="{{route('chat')}}" class="p-2 text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-100 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800" title="New Chat">
     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
    </a>
   </div>
  </div>
 </div>

 {{-- CORPS DU CHAT --}}
 <div
  x-ref="messagesContainer"
  class="flex-1 overflow-y-auto scroll-smooth pb-32"
 >
  <div class="max-w-3xl mx-auto w-full px-4 md:px-6 py-8 flex flex-col gap-8">
   
   {{-- EMPTY STATE --}}
   @if(count($messages) === 0)
   <div class="flex flex-col items-center justify-center pt-12 md:pt-20 text-center animate-fade-in">
    <div class="w-16 h-16 rounded-full bg-gray-50 dark:bg-gray-800 flex items-center justify-center border border-gray-100 dark:border-gray-700/50 mb-6 shadow-sm">
     <span class="text-2xl">✨</span>
    </div>
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">
     How can I help you today?
    </h2>
    <p class="text-sm text-gray-500 dark:text-gray-400 max-w-md mx-auto mb-8">
     Ask questions about taxes, business, finance, entrepreneurship, documents, or anything related to your platform.
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 w-full max-w-2xl">
     <button wire:click="$set('prompt', 'Help me optimize my taxes')" class="text-left p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#2A2A2A] hover:bg-gray-50 dark:hover:bg-[#333333] transition-colors group">
      <p class="font-medium text-gray-900 dark:text-gray-100 text-sm group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">Tax Optimization</p>
      <p class="text-xs text-gray-500 mt-1">Get intelligent tax suggestions</p>
     </button>
     <button wire:click="$set('prompt', 'Generate a professional business report')" class="text-left p-4 rounded-xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-[#2A2A2A] hover:bg-gray-50 dark:hover:bg-[#333333] transition-colors group">
      <p class="font-medium text-gray-900 dark:text-gray-100 text-sm group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">Business Reports</p>
      <p class="text-xs text-gray-500 mt-1">Generate analytics & reports</p>
     </button>
    </div>
   </div>
   @endif

   {{-- MESSAGES --}}
   @foreach($messages as $index => $msg)
   <div wire:key="message-{{ $index }}" class="flex w-full {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
    
    {{-- IA MESSAGE (Style ChatGPT/Claude : Pas de bulle, fond transparent, icône à gauche) --}}
    @if($msg['role'] !== 'user')
    <div class="flex gap-4 w-full max-w-3xl">
     <div class="w-8 h-8 shrink-0 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 flex items-center justify-center mt-1">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5z" clip-rule="evenodd" /></svg>
     </div>
     <div class="flex-1 min-w-0 prose prose-slate dark:prose-invert max-w-none text-[15px] leading-relaxed text-gray-800 dark:text-gray-200 break-words mt-1">
      {!! $this->markdown($msg['content']) !!}
     </div>
    </div>
    @endif

    {{-- USER MESSAGE (Bulle subtile et douce) --}}
    @if($msg['role'] === 'user')
    <div class="max-w-[80%] bg-gray-100 dark:bg-[#2F2F2F] text-gray-900 dark:text-gray-100 px-5 py-3.5 rounded-3xl rounded-tr-sm text-[15px] leading-relaxed break-words">
     {!! $this->markdown($msg['content']) !!}
    </div>
    @endif
   </div>
   @endforeach

   {{-- TOKEN ERROR --}}
   @if($tokenError === true)
   <div class="w-full max-w-2xl mx-auto bg-emerald-50 dark:bg-emerald-900/10 rounded-2xl border border-emerald-100 dark:border-emerald-800/30 p-6 sm:p-8 mt-4">
    <div class="flex flex-col items-center text-center">
     <div class="w-12 h-12 rounded-full bg-emerald-100 dark:bg-emerald-800/50 flex items-center justify-center mb-4 text-emerald-600 dark:text-emerald-400">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
     </div>
     <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Limit Reached</h3>
     <p class="text-sm text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">Upgrade your plan to unlock unlimited AI functionalities and remove all restrictions.</p>
     
     @if(auth()->user()->plan == "free")
     <a href="/price" class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-xl transition-colors w-full sm:w-auto">
      Subscribe to a plan
     </a>
     @else
     <a href="{{ route('subscription.upgrade') }}" class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-xl transition-colors w-full sm:w-auto">
      Upgrade your plan
     </a>
     @endif
    </div>
   </div>
   @endif

   {{-- LOADING STATE (Style discret) --}}
   <div wire:loading.flex wire:target="sendMessage" class="flex gap-4 w-full max-w-3xl">
    <div class="w-8 h-8 shrink-0 rounded-full bg-gray-900 dark:bg-white text-white dark:text-gray-900 flex items-center justify-center mt-1">
     <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
    </div>
    <div class="flex items-center h-10">
     <span class="text-sm text-gray-500 dark:text-gray-400 font-medium animate-pulse">Thinking...</span>
    </div>
   </div>
  </div>
 </div>

 {{-- ZONE DE SAISIE CENTRÉE (Flottante en bas) --}}
 <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-white via-white dark:from-[#212121] dark:via-[#212121] to-transparent pt-6 pb-4 px-4">
  <div class="max-w-3xl mx-auto"
   x-data="{
    resizeTextarea() {
     $refs.textarea.style.height = '48px';
     $refs.textarea.style.height = Math.min($refs.textarea.scrollHeight, 200) + 'px';
    },
    resetTextarea() {
     $refs.textarea.style.height = '48px';
    }
   }"
   @message-sent.window="resetTextarea()"
  >
   {{-- DOCUMENT PREVIEW --}}
   @if($documentPreview)
   <div class="w-fit max-w-sm flex items-center gap-3 p-2 mb-3 rounded-xl bg-white dark:bg-[#2F2F2F] border border-gray-200 dark:border-gray-700 shadow-sm">
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
   <div class="relative flex items-end w-full rounded-2xl bg-gray-50 dark:bg-[#2F2F2F] border border-gray-200 dark:border-gray-700/80 focus-within:border-gray-300 dark:focus-within:border-gray-600 focus-within:ring-2 focus-within:ring-gray-100 dark:focus-within:ring-gray-800 shadow-sm transition-all duration-200">
    
    {{-- BOUTON ATTACHEMENT --}}
    <label class="shrink-0 flex items-center justify-center w-12 h-12 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 cursor-pointer transition">
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
     class="flex-1 max-h-[200px] min-h-[48px] py-3.5 px-0 bg-transparent border-0 focus:ring-0 text-[15px] text-gray-900 dark:text-gray-100 placeholder:text-gray-500 resize-none overflow-y-auto"
    ></textarea>

    {{-- BOUTON ENVOYER --}}
    <div class="shrink-0 flex items-center justify-center w-12 h-12 pr-2">
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

   {{-- FOOTER / DISCLAIMER LÉGAL & COMPTEUR --}}
   <div class="flex items-center justify-between mt-2 px-2">
    <p class="text-[11px] text-gray-400 dark:text-gray-500 font-medium">
      <span class="flex h-1.5 w-1.5 rounded-full bg-red-500 animate-pulse"></span> Educational guidance only. 
    </p>
    <span class="text-[10px] font-medium" :class="prompt.length > 4900 ? 'text-red-500' : 'text-gray-400 dark:text-gray-500'">
     <span x-text="prompt.length">0</span>/5000
    </span>
   </div>

  </div>
 </div>
</div>