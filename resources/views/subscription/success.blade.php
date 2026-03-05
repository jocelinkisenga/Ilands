<x-app-layout>
<div class="min-h-screen bg-slate-50 dark:bg-black text-slate-900 dark:text-white flex flex-col items-center justify-center px-6 py-12 transition-colors duration-300">
    
    <div class="max-w-xl w-full text-center">
        
        <div class="relative inline-block mb-8">
            <div class="absolute inset-0 bg-green-500 blur-2xl opacity-20 animate-pulse"></div>
            <div class="relative bg-white dark:bg-white/5 border border-green-500/30 p-6 rounded-full shadow-2xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <h1 class="text-4xl font-black tracking-tight mb-4 uppercase italic">
            Subscription <span class="text-green-600 dark:text-green-500">Confirmed</span>
        </h1>
        
        <p class="text-slate-500 dark:text-slate-400 text-lg mb-10 max-w-md mx-auto">
            Welcome to the <span class="font-bold text-slate-900 dark:text-white">{{ auth()->user()->subscriptions()->first()->type ?? 'Pro' }}</span> tier. Our AI is now ready to analyze your profile.
        </p>

        <div class="bg-white dark:bg-white/5 backdrop-blur-xl border border-slate-200 dark:border-white/10 rounded-3xl p-8 shadow-2xl overflow-hidden relative">
            
            <div class="relative z-10">
                <h3 class="text-sm font-bold uppercase tracking-widest text-green-600 dark:text-green-500 mb-6">Next Step</h3>
                
                <div class="space-y-4 mb-8">
                    <div class="flex items-center gap-4 text-left p-4 bg-slate-50 dark:bg-white/5 rounded-2xl">
                        <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-600 text-white rounded-full font-bold text-xs">1</span>
                        <p class="text-sm font-medium">Full tax profile unlocked</p>
                    </div>
                    <div class="flex items-center gap-4 text-left p-4 bg-slate-50 dark:bg-white/5 rounded-2xl">
                        <span class="flex-shrink-0 w-8 h-8 flex items-center justify-center bg-green-600 text-white rounded-full font-bold text-xs">2</span>
                        <p class="text-sm font-medium">AI Report generation enabled</p>
                    </div>
                </div>

                <a href="{{route('tax-profile')}}" 
                   class="inline-block w-full bg-green-600 hover:bg-green-700 dark:hover:bg-green-500 text-white py-4 rounded-xl font-bold text-lg transition shadow-lg shadow-green-900/20 active:scale-95">
                    Generate My AI Report
                </a>

                <p class="mt-6 text-xs text-slate-400">
                    A receipt has been sent to <span class="text-slate-600 dark:text-slate-200">{{ auth()->user()->email }}</span>. 
                    You can manage your billing in your <a href="{{ route('dashboard') }}" class="underline">Dashboard</a>.
                </p>
            </div>

            <div class="absolute -bottom-10 -right-10 text-slate-100 dark:text-white/5 font-black text-8xl select-none pointer-events-none">
                ILANDS
            </div>
        </div>
    </div>
</div>
</x-app-layout>