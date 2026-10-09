<div class="fixed bottom-4 right-4 z-50 sm:bottom-6 sm:right-6"
     x-data="{
         open: false,
         showSuggestions: true,
         scrollToBottom(smooth = true) {
             const el = this.$refs.messages;
             if (el) el.scrollTo({ top: el.scrollHeight, behavior: smooth ? 'smooth' : 'auto' });
         }
     }"
     x-init="$watch('open', value => {
         if (value) $nextTick(() => {
             scrollToBottom(false);
             if (window.innerWidth >= 640) $refs.input?.focus();
         });
     })"
     @keydown.escape.window="open = false">

    <!-- Fenêtre de chat -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-4 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 scale-95"
         role="dialog" aria-label="Unstack my taxes - Assistant"
         class="fixed inset-x-3 top-3 bottom-24 flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl dark:border-gray-800 dark:bg-gray-900
                sm:absolute sm:inset-auto sm:bottom-20 sm:right-0 sm:h-[560px] sm:max-h-[calc(100vh-8rem)] sm:w-[390px]"
         style="display: none;">

        <!-- En-tête -->
        <div class="flex items-center justify-between bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-3 text-white">
            <div class="flex min-w-0 items-center gap-3">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-white/15 ring-1 ring-white/25">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 14.25l6-6m-5.25.75h.008v.008H9.75V9zm4.5 5.25h.008v.008h-.008v-.008zM6.75 3h10.5A2.25 2.25 0 0119.5 5.25v15.19a.56.56 0 01-.9.45L16.5 19.5l-2.1 1.39a.56.56 0 01-.62 0L12 19.7l-1.78 1.19a.56.56 0 01-.62 0L7.5 19.5l-2.1 1.39a.56.56 0 01-.9-.45V5.25A2.25 2.25 0 016.75 3z"/>
                    </svg>
                </div>
                <div class="min-w-0 leading-tight">
                    <p class="truncate text-sm font-semibold">Unstack my taxes</p>
                    <p class="mt-0.5 flex items-center gap-1.5 text-xs text-blue-100">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-300 opacity-75"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                        </span>
                        <span>En ligne</span>
                        <span class="truncate opacity-70">· {{ $theme }}</span>
                    </p>
                </div>
            </div>

            <button type="button" @click="open = false" aria-label="Fermer le chat"
                    class="rounded-lg p-1.5 text-blue-100 transition hover:bg-white/15 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white/60">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Avertissement permanent -->
        <div class="flex items-center gap-2 border-b border-amber-200/70 bg-amber-50 px-4 py-1.5 text-xs font-medium text-amber-800 dark:border-amber-500/20 dark:bg-amber-500/10 dark:text-amber-300">
            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.04-.02a.75.75 0 011.06.85l-.7 2.8a.75.75 0 001.07.85l.04-.02M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
            <span>Educational guidance only</span>
            <span class="hidden font-normal opacity-80 sm:inline">— not tax, legal or accounting advice</span>
        </div>

        <!-- Messages -->
        <div x-ref="messages"
             x-init="new MutationObserver(() => scrollToBottom()).observe($el, { childList: true, subtree: true, attributes: true, attributeFilter: ['style'] })"
             class="flex-1 space-y-3 overflow-y-auto bg-gray-50 px-4 py-4 text-sm text-gray-700 dark:bg-black/20 dark:text-gray-300">

            @foreach($messages as $msg)
                @php $isUser = $msg['sender'] === 'user'; @endphp
                <div wire:key="msg-{{ $loop->index }}" class="flex items-end gap-2 {{ $isUser ? 'justify-end' : 'justify-start' }}">
                    @unless($isUser)
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                        </div>
                    @endunless

                    <div class="max-w-[82%] whitespace-pre-line break-words px-3.5 py-2.5 leading-relaxed {{ $isUser
                        ? 'rounded-2xl rounded-br-md bg-blue-600 text-white shadow-sm'
                        : 'rounded-2xl rounded-bl-md border border-gray-200 bg-white text-gray-800 shadow-sm dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100' }}">{{ $msg['text'] }}</div>
                </div>
            @endforeach

            <!-- Indicateur "l'IA écrit..." -->
            <div wire:loading.flex wire:target="sendMessage,selectQuestion" class="items-end gap-2">
                <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z"/></svg>
                </div>
                <div class="flex items-center gap-1 rounded-2xl rounded-bl-md border border-gray-200 bg-white px-3.5 py-3 shadow-sm dark:border-gray-700 dark:bg-gray-800" aria-label="L'IA rédige une réponse">
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400" style="animation-delay: 0ms"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400" style="animation-delay: 150ms"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400" style="animation-delay: 300ms"></span>
                </div>
            </div>
        </div>

        <!-- Suggestions (masquables) -->
        @if(!empty($suggestedQuestions) && !$guestLimitReached)
            <div x-show="showSuggestions"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="border-t border-gray-200 bg-white px-3 pb-2 pt-2 dark:border-gray-800 dark:bg-gray-900">
                <div class="mb-1.5 flex items-center justify-between px-1">
                    <span class="text-[11px] font-semibold uppercase tracking-wide text-gray-400 dark:text-gray-500">Suggestions</span>
                    <button type="button" @click="showSuggestions = false"
                            title="Masquer les suggestions" aria-label="Masquer les suggestions"
                            class="rounded-md p-1 text-gray-400 transition hover:bg-gray-100 hover:text-gray-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:hover:bg-gray-800 dark:hover:text-gray-200">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="flex max-h-28 flex-wrap gap-1.5 overflow-y-auto">
                    @foreach($suggestedQuestions as $question)
                        <button type="button"
                                wire:key="suggestion-{{ $loop->index }}"
                                wire:click="selectQuestion(@js($question))"
                                wire:loading.attr="disabled" wire:target="sendMessage,selectQuestion"
                                class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-left text-xs text-blue-700 transition hover:bg-blue-100 disabled:opacity-50 dark:border-blue-500/20 dark:bg-blue-500/10 dark:text-blue-300 dark:hover:bg-blue-500/20">
                            {{ $question }}
                        </button>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Zone de saisie / limite atteinte -->
        @if($guestLimitReached)
            <!-- Limite atteinte : invitation à créer un compte -->
            <div class="border-t border-gray-200 bg-gradient-to-b from-blue-50/70 to-white p-5 text-center dark:border-gray-800 dark:from-blue-500/10 dark:to-gray-900">
                <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-blue-600 text-white shadow-lg shadow-blue-600/30">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                </div>

                <p class="text-base font-semibold text-gray-900 dark:text-gray-100">You have used all your free questions</p>
                <p class="mx-auto mt-1 max-w-xs text-xs leading-relaxed text-gray-500 dark:text-gray-400">Create an account and continue asking questions.</p>

                <a href="{{ Route::has('register') ? route('register') : url('/register') }}"
                   class="group mt-4 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-blue-600 to-blue-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-blue-600/30 transition hover:from-blue-500 hover:to-blue-400 hover:shadow-blue-500/40 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/40">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"/></svg>
                    <span>Create account</span>
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>

                <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                    Already has account ?
                    <a href="{{ Route::has('login') ? route('login') : url('/login') }}" class="font-medium text-blue-600 hover:underline dark:text-blue-400">Login</a>
                </p>
            </div>
        @else
            <form wire:submit.prevent="sendMessage" class="border-t border-gray-200 bg-white p-3 dark:border-gray-800 dark:bg-gray-900">
                @error('newMessage')
                    <p class="mb-1.5 px-1 text-xs text-red-500">{{ $message }}</p>
                @enderror

                <div class="flex items-center gap-2">
                    @if(!empty($suggestedQuestions))
                        <!-- Ré-afficher les suggestions -->
                        <button type="button" x-show="!showSuggestions" @click="showSuggestions = true"
                                title="Afficher les suggestions" aria-label="Afficher les suggestions"
                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-gray-400 transition hover:bg-gray-100 hover:text-blue-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:hover:bg-gray-800 dark:hover:text-blue-300"
                                style="display: none;">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>
                        </button>
                    @endif

                    <input x-ref="input" type="text" wire:model="newMessage" maxlength="1000" autocomplete="off"
                           placeholder="Posez votre question..."
                           class="min-w-0 flex-1 rounded-full border border-gray-300 bg-gray-50 px-4 py-2.5 text-base text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100 dark:placeholder-gray-500 sm:text-sm">

                    <button type="submit" aria-label="Envoyer"
                            wire:loading.attr="disabled" wire:target="sendMessage,selectQuestion"
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-blue-600 text-white transition hover:bg-blue-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-60 dark:focus-visible:ring-offset-gray-900">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.27 3.13a.75.75 0 011.04-.89l16.5 8.25a.75.75 0 010 1.34l-16.5 8.25a.75.75 0 01-1.04-.89L6 12zm0 0h7.5"/></svg>
                    </button>
                </div>
            </form>
        @endif
    </div>

    <!-- Bouton flottant -->
    <button type="button" @click="open = !open" :aria-expanded="open" aria-label="Ouvrir le chat"
            class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-600 text-white shadow-2xl transition hover:scale-105 hover:bg-blue-500 focus:outline-none focus-visible:ring-4 focus-visible:ring-blue-500/50">
        <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
        <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
    </button>
</div>
