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
 <div class="relative overflow-hidden border-b border-gray-200 dark:border-gray-800">

  <div class="absolute inset-0 bg-gradient-to-r from-gray-950 via-gray-900 to-gray-800 dark:from-black dark:via-gray-950 dark:to-gray-950 opacity-95"></div>

  <div class="relative z-10 flex items-center justify-between px-6 py-5">

   <div class="flex items-center gap-4">

    <div class="relative">
     <div class="w-12 h-12 rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 flex items-center justify-center text-white text-xl shadow-lg">
      ✨
     </div>

     <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-gray-400 border-2 border-gray-950 rounded-full animate-pulse dark:bg-gray-200"></div>
    </div>

    <div>
     <h2 class="text-lg font-bold text-white tracking-tight">
      ILANDS AI Assistant
     </h2>

     <p class="text-xs text-gray-400 mt-0.5">
      Powered by Gemini • Online
     </p>
    </div>

   </div>

   <div class="hidden md:flex items-center gap-2">

    <button
     class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 text-white text-sm transition"
     >
     New Chat
    </button>

    <button
     class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 text-white transition flex items-center justify-center"
     >
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

   <div class="w-20 h-20 rounded-3xl bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-800 dark:to-black flex items-center justify-center text-4xl shadow-xl border border-gray-600 dark:border-gray-800">
    🤖
   </div>

   <h2 class="mt-6 text-2xl font-bold text-gray-900 dark:text-white">
    Welcome to ILANDS AI
   </h2>

   <p class="mt-3 text-sm max-w-md text-gray-500 dark:text-gray-400 leading-relaxed">
    Ask questions about taxes, business, finance, entrepreneurship, documents, or anything related to your platform.
   </p>

   <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-3 w-full max-w-2xl">

    <button
     wire:click="$set('prompt', 'Help me optimize my taxes')"
     class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition"
     >
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Tax Optimization
     </p>

     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      Get intelligent tax suggestions
     </p>
    </button>

    <button
     wire:click="$set('prompt', 'Generate a professional business report')"
     class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition"
     >
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Business Reports
     </p>

     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      Generate analytics & reports
     </p>
    </button>

    <button
     wire:click="$set('prompt', 'Create a financial strategy')"
     class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition"
     >
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Financial Strategy
     </p>

     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      AI-powered recommendations
     </p>
    </button>

    <button
     wire:click="$set('prompt', 'How can I grow my startup?')"
     class="text-left p-4 rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50 hover:border-gray-400 dark:hover:border-gray-600 transition"
     >
     <p class="font-semibold text-gray-900 dark:text-white text-sm">
      Startup Growth
     </p>

     <p class="text-xs mt-1 text-gray-500 dark:text-gray-400">
      Growth ideas & execution
     </p>
    </button>

   </div>

  </div>

  @endif

  {{-- MESSAGES --}}
  @foreach($messages as $index => $msg)

  <div
   wire:key="message-{{ $index }}"
   class="flex items-end gap-3 {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}"
   >

   {{-- AI AVATAR --}}
   @if($msg['role'] !== 'user')
   <div class="w-10 h-10 shrink-0 rounded-2xl bg-gradient-to-br from-gray-800 to-gray-950 border border-gray-700 flex items-center justify-center text-white shadow-lg">
    ✨
   </div>
   @endif

   {{-- MESSAGE --}}
   <div class="max-w-[90%] md:max-w-[75%]">

    <div class="
     px-5 py-4 rounded-3xl shadow-sm border

     {{ $msg['role'] === 'user'
     ? 'bg-gray-900 dark:bg-gray-800 text-white border-gray-900 dark:border-gray-700 rounded-br-md'
     : 'bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 border-gray-200 dark:border-gray-800 rounded-bl-md'
     }}
     ">

     {{-- MESSAGE CONTENT --}}
     <div
      id="ai-response-{{ $index }}"
      class="text-sm leading-7 whitespace-pre-line"
      >
      {{ $msg['content'] }}
     </div>

    </div>

    {{-- FOOTER --}}
    <div class="
     mt-2 px-1 flex items-center gap-2 text-[11px]

     {{ $msg['role'] === 'user'
     ? 'justify-end text-gray-400'
     : 'justify-start text-gray-500'
     }}
     ">

     <span>
      {{ $msg['role'] === 'user' ? 'You' : 'ILANDS AI' }}
     </span>

     <span>•</span>

     <span>
      {{ now()->format('H:i') }}
     </span>

    </div>

   </div>

   {{-- USER AVATAR --}}
   @if($msg['role'] === 'user')
   <div class="w-10 h-10 shrink-0 rounded-2xl bg-gray-900 dark:bg-gray-800 border border-gray-700 dark:border-gray-600 text-white flex items-center justify-center shadow-lg font-bold">
    U
   </div>
   @endif

  </div>

  @endforeach

  {{-- LOADING --}}
  <div wire:loading.flex wire:target="sendMessage" class="justify-start items-end gap-3">

   <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-gray-800 to-gray-950 border border-gray-700 flex items-center justify-center text-white shadow-lg">
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

 {{-- INPUT --}}
 <div class="border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-4 md:p-5">

  <div class="relative">

   <textarea
    wire:model.defer="prompt"
wire:keydown.enter.prevent="!$wire.isLoading && $wire.sendMessage()"
maxlength="1000"
    rows="1"
    placeholder="Ask ILANDS AI anything..."
    class="w-full rounded-3xl border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 px-6 py-5 pr-36 text-sm text-gray-900 dark:text-white placeholder:text-gray-400 focus:border-gray-500 focus:ring-4 focus:ring-gray-500/10 dark:focus:border-gray-400 dark:focus:ring-gray-400/10 resize-none transition"
    ></textarea>

   {{-- BOTTOM ACTIONS --}}
   <div class="absolute bottom-4 left-5 flex items-center gap-3">

    <span class="
     text-xs font-medium

     {{ strlen($prompt ?? '') > 900
     ? 'text-red-500'
     : 'text-gray-400'
     }}
     ">
     {{ strlen($prompt ?? '') }}/1000
    </span>

   </div>

   {{-- SEND BUTTON --}}
   <div class="absolute right-4 bottom-4 flex items-center gap-2">

    <button
     type="button"
     class="hidden md:flex items-center justify-center w-11 h-11 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-400 dark:hover:border-gray-500 transition"
     >
     📎
    </button>

    <button
     type="button"
     wire:click="sendMessage"
     wire:loading.attr="disabled"
     class="flex items-center gap-2 px-5 h-11 rounded-2xl bg-gray-900 dark:bg-white hover:bg-gray-800 dark:hover:bg-gray-100 text-white dark:text-gray-900 shadow-md transition disabled:opacity-50"
     >

     <svg
      wire:loading.remove
      xmlns="http://www.w3.org/2000/svg"
      class="h-5 w-5"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      >
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
       d="M14.752 11.168l-9.193-5.106A1 1 0 004 6.94v10.12a1 1 0 001.559.83l9.193-6.106a1 1 0 000-1.664z" />
     </svg>

     <svg
      wire:loading
      class="animate-spin h-5 w-5 text-current"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      >
      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>

      <path class="opacity-75" fill="currentColor"
       d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
      </path>
     </svg>

     <span class="hidden md:inline text-sm font-semibold">
      Send
     </span>

    </button>

   </div>

  </div>

 </div>

</div>
