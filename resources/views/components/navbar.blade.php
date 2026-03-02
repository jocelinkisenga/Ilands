<nav x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 w-full bg-white/80 dark:bg-black/80 backdrop-blur-md border-b border-slate-200 dark:border-white/10 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center gap-2">
                    <span class="text-xl font-black tracking-tighter uppercase text-slate-900 dark:text-white">
                        ILANDS <span class="text-green-600 dark:text-green-500">SOLUTIONS</span>
                    </span>
                </a>
            </div>

            <div class="hidden lg:flex items-center space-x-6">
 
                <a href="/services" class="text-xs font-bold uppercase tracking-widest hover:text-green-600 dark:hover:text-green-500 transition">Services</a>
                <a href="/about" class="text-xs font-bold uppercase tracking-widest hover:text-green-600 dark:hover:text-green-500 transition">About Us</a>
                <a href="/contact" class="text-xs font-bold uppercase tracking-widest hover:text-green-600 dark:hover:text-green-500 transition">Contact</a>
                
                <div class="h-6 w-[1px] bg-slate-200 dark:bg-white/10 mx-2"></div>

                @auth
                    <a href="/dashboard" class="text-xs font-bold uppercase tracking-widest text-green-600 dark:text-green-500 transition">My Account</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-xs font-bold uppercase tracking-widest text-red-500 hover:text-red-400 transition">Logout</button>
                    </form>
                @else
                    <a href="/login" class="text-xs font-bold uppercase tracking-widest hover:text-green-600 dark:hover:text-green-500 transition">Login</a>
                    <a href="/tax-screener" class="bg-green-600 dark:bg-green-500 text-white px-5 py-2.5 rounded-xl font-bold text-xs uppercase tracking-widest hover:brightness-110 transition shadow-lg">
                        Get your free tax screener
                    </a>
                @endauth

                <button onclick="document.documentElement.classList.toggle('dark')" class="ml-4 p-2 rounded-lg bg-slate-100 dark:bg-white/10 text-slate-600 dark:text-white transition">
                    <span class="dark:hidden text-base">🌙</span>
                    <span class="hidden dark:inline text-base">☀️</span>
                </button>
            </div>

            <div class="lg:hidden flex items-center gap-3">
                <button onclick="document.documentElement.classList.toggle('dark')" class="p-2 rounded-lg bg-slate-100 dark:bg-white/10">
                    <span class="dark:hidden">🌙</span>
                    <span class="hidden dark:inline">☀️</span>
                </button>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-900 dark:text-white p-2">
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-white dark:bg-black border-b border-slate-200 dark:border-white/10 px-6 pt-2 pb-8 space-y-4 shadow-2xl"
         style="display: none;">
        
        <a href="/" class="block text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white py-3 border-b border-slate-100 dark:border-white/5">Simulation</a>
        <a href="/services" class="block text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white py-3 border-b border-slate-100 dark:border-white/5">Services</a>
        <a href="/about" class="block text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white py-3 border-b border-slate-100 dark:border-white/5">About Us</a>
        <a href="/contact" class="block text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white py-3 border-b border-slate-100 dark:border-white/5">Contact</a>
        
        <div class="pt-4 space-y-4">
            @auth
                <a href="/dashboard" class="block text-sm font-bold uppercase tracking-widest text-green-600 py-2">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left text-sm font-bold uppercase tracking-widest text-red-500 py-2">Logout</button>
                </form>
            @else
                <a href="/login" class="block text-sm font-bold uppercase tracking-widest text-slate-900 dark:text-white py-2">Login</a>
                <a href="/tax-screener" class="block bg-green-600 dark:bg-green-500 text-white px-6 py-4 rounded-xl font-bold text-center text-xs uppercase tracking-widest shadow-lg shadow-green-900/20">
                    Get your free tax screener
                </a>
            @endauth
        </div>
    </div>
</nav>