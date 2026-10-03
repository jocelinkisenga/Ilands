{{--
    LIVE CHAT – ILANDS
    Même logique et mêmes variables que le chat IA :
    $messages, $defaultQuestions, $tokenError, $documentPreview, $prompt, $document
    Actions Livewire : sendMessage(), generateReport() (optionnelle)
    Variables optionnelles (valeurs par défaut incluses) : $agentName, $isOnline, $msg['created_at']
--}}
@php
    $agentName = $agentName ?? 'ILANDS Support';
    $isOnline  = $isOnline ?? true;
@endphp
<div >
<div
    x-data="{
        prompt: '',
        autoScroll(force = false) {
            this.$nextTick(() => {
                const c = this.$refs.messagesContainer;
                const nearBottom = c.scrollHeight - c.scrollTop - c.clientHeight < 160;
                if (force || nearBottom) c.scrollTop = c.scrollHeight;
            });
        }
    }"
    x-init="
        autoScroll(true);
        new MutationObserver(() => autoScroll()).observe($refs.thread, { childList: true, subtree: true });
    "
    @message-sent.window="autoScroll(true)"
    class="relative  mx-auto flex h-[calc(100dvh-40px)] w-full max-w-5xl flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white font-sans antialiased shadow-sm dark:border-gray-800/60 dark:bg-gray-900"
>

    {{-- HEADER --}}
    <header class="sticky top-0 z-20 flex-none border-b border-gray-100 bg-white/80 px-4 py-3 backdrop-blur-md dark:border-gray-800/60 dark:bg-gray-900/80 md:px-6 md:py-4">
        <div class="mx-auto flex max-w-3xl items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="relative">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-900 text-sm font-semibold text-white dark:bg-white dark:text-gray-900">
                        {{ mb_strtoupper(mb_substr($agentName, 0, 1)) }}
                    </div>
                    <span class="absolute -bottom-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-white dark:border-gray-900 {{ $isOnline ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                </div>
                <div class="flex flex-col leading-tight">
                    <h2 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-gray-100">{{ $agentName }}</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        {{ $isOnline ? 'Online · usually replies in a few minutes' : 'Offline · we will reply as soon as possible' }}
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-1">
                <button wire:click="generateReport" title="Generate report"
                    class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" /></svg>
                </button>
                <a href="{{ route('chat') }}" title="New chat"
                    class="rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
                </a>
            </div>
        </div>
    </header>

    {{-- CONVERSATION --}}
    <div x-ref="messagesContainer" class="flex-1 overflow-y-auto scroll-smooth pb-36">
        <div x-ref="thread" class="mx-auto flex w-full max-w-3xl flex-col gap-4 px-4 py-6 md:px-6 md:py-8">

            {{-- EMPTY STATE --}}
            {{-- @if (count($messages) === 0) --}}
                <div class="flex flex-col items-center pt-8 text-center md:pt-16">
                    <div class="mb-5 flex h-16 w-16 items-center justify-center rounded-full border border-gray-100 bg-gray-50 text-2xl shadow-sm dark:border-gray-700/50 dark:bg-gray-800">💬</div>
                    <h2 class="mb-2 text-2xl font-semibold text-gray-900 dark:text-white">How can help you today?</h2>
                    {{-- <p class="mx-auto mb-8 max-w-md text-sm text-gray-500 dark:text-gray-400">                    </p> --}}

                    <div class="grid w-full max-w-2xl grid-cols-1 gap-3 md:grid-cols-2">
                        @foreach ($defaultQuestions as $question)
                            <button type="button" wire:click="$set('prompt', @js($question->message))"
                                class="group rounded-xl border border-gray-200 bg-white p-4 text-left transition-colors hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700/60">
                                <p class="text-sm font-medium text-gray-900 transition-colors group-hover:text-emerald-600 dark:text-gray-100 dark:group-hover:text-emerald-400">{{ $question->message }}</p>
                            </button>
                        @endforeach
                    </div>
                </div>
            {{-- @endif --}}

            {{-- MESSAGES --}}
            @foreach ($messages as $index => $msg)
                @php
                    $isUser = $msg['role'] === 'user';
                    $time = isset($msg['created_at']) ? \Carbon\Carbon::parse($msg['created_at'])->format('H:i') : null;
                @endphp

                <div wire:key="message-{{ $index }}" class="flex w-full items-end gap-2.5 {{ $isUser ? 'justify-end' : 'justify-start' }}">

                    {{-- Agent avatar --}}
                    @unless ($isUser)
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-900 text-xs font-semibold text-white dark:bg-white dark:text-gray-900">
                            {{ mb_strtoupper(mb_substr($agentName, 0, 1)) }}
                        </div>
                    @endunless

                    <div class="flex max-w-[82%] flex-col {{ $isUser ? 'items-end' : 'items-start' }} md:max-w-[75%]">
                        @if ($isUser)
                            {{-- Texte échappé : le message d'un visiteur n'est jamais rendu en HTML brut --}}
                            <div class="whitespace-pre-wrap break-words rounded-3xl rounded-br-md bg-gray-900 px-4 py-3 text-[15px] leading-relaxed text-white dark:bg-white dark:text-gray-900">{{ $msg['content'] }}</div>
                        @else
                            <div class="prose prose-slate max-w-none break-words rounded-3xl rounded-bl-md bg-gray-100 px-4 py-3 text-[15px] leading-relaxed text-gray-800 dark:prose-invert dark:bg-gray-800 dark:text-gray-200">
                                {!! $this->markdown($msg['content']) !!}
                            </div>
                        @endif

                        @if ($time)
                            <span class="mt-1 px-1 text-[11px] text-gray-400 dark:text-gray-500">{{ $time }}</span>
                        @endif
                    </div>
                </div>
            @endforeach

            {{-- LIMIT REACHED --}}
            @if ($tokenError === true)
                <div class="mx-auto mt-4 w-full max-w-2xl rounded-2xl border border-emerald-100 bg-emerald-50 p-6 dark:border-emerald-800/30 dark:bg-emerald-900/10 sm:p-8">
                    <div class="flex flex-col items-center text-center">
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-600 dark:bg-emerald-800/50 dark:text-emerald-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Limit reached</h3>
                        <p class="mx-auto mb-6 max-w-md text-sm text-gray-600 dark:text-gray-400">Upgrade your plan to keep chatting with our team and remove all restrictions.</p>

                        @if (auth()->user()->plan == 'free')
                            <a href="/price" class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition-colors hover:bg-emerald-700 sm:w-auto">Subscribe to a plan</a>
                        @else
                            <a href="{{ route('subscription.upgrade') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-emerald-600 px-6 py-3 font-medium text-white transition-colors hover:bg-emerald-700 sm:w-auto">Upgrade your plan</a>
                        @endif
                    </div>
                </div>
            @endif

            {{-- TYPING INDICATOR --}}
            <div wire:loading.flex wire:target="sendMessage" class="items-end gap-2.5">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gray-900 text-xs font-semibold text-white dark:bg-white dark:text-gray-900">
                    {{ mb_strtoupper(mb_substr($agentName, 0, 1)) }}
                </div>
                <div class="flex items-center gap-1 rounded-3xl rounded-bl-md bg-gray-100 px-4 py-4 dark:bg-gray-800" aria-label="Typing">
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400 [animation-delay:-0.3s]"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400 [animation-delay:-0.15s]"></span>
                    <span class="h-1.5 w-1.5 animate-bounce rounded-full bg-gray-400"></span>
                </div>
            </div>
        </div>
    </div>

    {{-- COMPOSER --}}
    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-white via-white to-transparent px-4 pb-4 pt-6 dark:from-gray-900 dark:via-gray-900"
         style="padding-bottom: max(1rem, env(safe-area-inset-bottom))">
        <div class="mx-auto max-w-3xl"
            x-data="{
                resizeTextarea() {
                    $refs.textarea.style.height = '48px';
                    $refs.textarea.style.height = Math.min($refs.textarea.scrollHeight, 200) + 'px';
                },
                resetTextarea() { $refs.textarea.style.height = '48px'; }
            }"
            @message-sent.window="resetTextarea()"
            x-effect="prompt; $nextTick(() => resizeTextarea())"
        >
            {{-- DOCUMENT PREVIEW --}}
            @if ($documentPreview)
                <div class="mb-3 flex w-fit max-w-sm items-center gap-3 rounded-xl border border-gray-200 bg-white p-2 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-600 dark:bg-blue-900/20 dark:text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" /></svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-xs font-medium text-gray-900 dark:text-white">{{ $documentPreview['name'] }}</p>
                        <p class="truncate text-[10px] text-gray-500">{{ $documentPreview['size'] }}</p>
                    </div>
                    <button type="button" wire:click="$set('document', null); $set('documentPreview', null)" aria-label="Remove file"
                        class="shrink-0 p-1 text-gray-400 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
            @endif

            {{-- INPUT --}}
            <div class="relative flex w-full items-end rounded-2xl border border-gray-200 bg-gray-50 shadow-sm transition-all duration-200 focus-within:border-gray-300 focus-within:ring-2 focus-within:ring-gray-100 dark:border-gray-700/80 dark:bg-gray-800 dark:focus-within:border-gray-600 dark:focus-within:ring-gray-800">

                {{-- Attachment --}}
                <label class="flex h-12 w-12 shrink-0 cursor-pointer items-center justify-center text-gray-400 transition hover:text-gray-600 dark:hover:text-gray-300" title="Attach a file">
                    <input type="file" wire:model="document" class="hidden" accept=".pdf,.doc,.docx,.txt,image/*" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" /></svg>
                </label>

                {{-- Textarea : Entrée envoie, Maj+Entrée = nouvelle ligne --}}
                <textarea
                    x-ref="textarea"
                    x-model="prompt"
     wire:model.defer="prompt"
                    @input="resizeTextarea()"
                    @keydown.enter="if (!$event.shiftKey) { $event.preventDefault(); $wire.sendMessage(); }"
                    maxlength="5000"
                    rows="1"
                    placeholder="Write your message…"
                    class="max-h-[200px] min-h-[48px] flex-1 resize-none overflow-y-auto border-0 bg-transparent px-0 py-3.5 text-[15px] text-gray-900 placeholder:text-gray-500 focus:ring-0 dark:text-gray-100"
                ></textarea>

                {{-- Send --}}
                <div class="flex h-12 w-12 shrink-0 items-center justify-center pr-2">
                    <button type="button" wire:click="sendMessage" wire:loading.attr="disabled" aria-label="Send message"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-black text-white transition hover:opacity-80 disabled:cursor-not-allowed disabled:opacity-50 dark:bg-white dark:text-black">
                        <svg wire:loading.remove wire:target="sendMessage" xmlns="http://www.w3.org/2000/svg" class="ml-0.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" /></svg>
                        <svg wire:loading wire:target="sendMessage" class="h-4 w-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>
                    </button>
                </div>
            </div>

            {{-- FOOTER --}}
            <div class="mt-2 flex items-center justify-between px-2">
                <p class="flex items-center gap-1.5 text-[11px] font-medium text-gray-400 dark:text-gray-500">
                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span> Educational guidance only.
                </p>
                <span class="text-[10px] font-medium" :class="prompt.length > 4900 ? 'text-red-500' : 'text-gray-400 dark:text-gray-500'">
                    <span x-text="prompt.length">0</span>/5000
                </span>
            </div>
        </div>
    </div>
</div>
</div>