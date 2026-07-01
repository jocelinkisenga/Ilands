<x-app-layout>
    <div class="min-h-screen bg-slate-50 dark:bg-black text-slate-900 dark:text-white flex flex-col items-center justify-center px-6 py-12 transition-colors duration-300">
        
        <div class="max-w-xl w-full text-center">
            
            <div class="relative inline-block mb-6">
                <div class="absolute inset-0 bg-green-500 blur-2xl opacity-20 animate-pulse"></div>
                <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 p-5 rounded-full shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-3 text-slate-900 dark:text-white">
                Thank you for your subscription!
            </h1>
            
            <p class="text-slate-500 dark:text-slate-400 text-base sm:text-lg mb-8 max-w-md mx-auto">
                Welcome to the <span class="font-semibold text-slate-900 dark:text-white">{{ auth()->user()->subscriptions()->first()->type ?? 'Pro' }}</span> tier. Your account is now fully upgraded and ready.
            </p>

            <div class="bg-white dark:bg-slate-900/50 backdrop-blur-xl border border-slate-200 dark:border-white/10 rounded-2xl p-6 sm:p-8 shadow-xl overflow-hidden relative">
                
                <div class="relative z-10">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-green-600 dark:text-green-500 mb-6">What's Next?</h3>
                    
                    <div class="space-y-3 mb-8">
                        <div class="flex items-center gap-4 text-left p-4 bg-slate-50 dark:bg-white/5 rounded-xl border border-slate-100 dark:border-white/5">
                            <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-green-600/10 text-green-600 dark:text-green-400 rounded-full font-bold text-xs">1</span>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-300">Full tax profile unlocked</p>
                        </div>
                        <div class="flex items-center gap-4 text-left p-4 bg-slate-50 dark:bg-white/5 rounded-xl border border-slate-100 dark:border-white/5">
                            <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center bg-green-600/10 text-green-600 dark:text-green-400 rounded-full font-bold text-xs">2</span>
                            <p class="text-sm font-medium text-slate-700 dark:text-slate-300">AI Report generation enabled</p>
                        </div>
                    </div>

                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center justify-center w-full bg-green-600 hover:bg-green-500 dark:bg-green-500 dark:hover:bg-green-400 text-white py-4 px-6 rounded-xl font-semibold text-base transition-all duration-200 shadow-lg shadow-green-600/20 active:scale-[0.98]">
                        Go to Dashboard
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>

                    <p class="mt-6 text-xs text-slate-400 dark:text-slate-500 leading-relaxed">
                        A receipt has been sent to <span class="font-medium text-slate-600 dark:text-slate-300">{{ auth()->user()->email }}</span>.<br>
                        You can manage your billing details at any time from your settings.
                    </p>
                </div>

                <div class="absolute -bottom-6 -right-6 text-slate-100 dark:text-white/[0.02] font-black text-7xl select-none pointer-events-none tracking-tighter">
                    ILANDS
                </div>
            </div>
        </div>
    </div>
</x-app-layout>