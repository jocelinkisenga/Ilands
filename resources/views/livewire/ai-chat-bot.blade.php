<div class="flex flex-col h-[500px] w-full max-w-lg mx-auto border rounded-lg bg-white shadow-lg">
    <div class="p-4 border-b bg-blue-600 text-white rounded-t-lg">
        <h3 class="font-bold"> Assistant AI</h3>
    </div>

    <div class="flex-1 bg-white dark:bg-black  overflow-y-auto p-4 space-y-4 bg-gray-50">
        @foreach($messages as $index => $msg)
            <div class="flex {{ $msg['role'] === 'user' ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-[80%] px-4 py-2 rounded-2xl shadow-sm {{ $msg['role'] === 'user' ? 'bg-blue-500 text-white' : 'bg-white text-gray-800 border' }}">
                    <p class="text-sm" id="ai-response-{{ $index }}">
                        {{ $msg['content'] }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="p-4 border-t bg-white dark:bg-black">
        {{-- <form class="relative"> --}}
            <div class="relative">
            <textarea 
                wire:model.live="prompt"
                wire:keydown.enter.prevent="sendMessage"
                maxlength="200"
                placeholder="Ask your question (max 200 car.)..."
                class="w-full p-3 pr-12 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none resize-none text-sm"
                rows="2"
            ></textarea>
            
            <div class="absolute bottom-2 left-3 text-[10px] {{ strlen($prompt ?? '') >= 200 ? 'text-red-500 font-bold' : 'text-gray-400' }}">
               {{ strlen($prompt ?? '') }}/200
            </div>

            <button type="button"
    wire:click="sendMessage"
    wire:loading.attr="disabled"
    class="absolute bottom-2 right-2 p-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 disabled:opacity-50"
    wire:loading.attr="disabled">
                <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
                <svg wire:loading class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
        {{-- </form> --}}
    </div>
</div>