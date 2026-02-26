

<!-- ================= NAVBAR ================= -->
<header class="fixed w-full top-0 z-50 backdrop-blur-xl bg-white/70 dark:bg-slate-900/70 border-b border-slate-200 dark:border-slate-700">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-emerald-500">Ilands</h1>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
            <a href="#features" class="hover:text-emerald-500">Solutions</a>
            <a href="#pricing" class="hover:text-emerald-500">Tarifs</a>
            <a href="#faq" class="hover:text-emerald-500">FAQ</a>
            <a href="#contact" class="hover:text-emerald-500">Contact</a>
            <a href="{{ route('login') }}" class="hover:text-emerald-500">Connexion</a>
        </nav>

        <div class="flex items-center gap-4">
            <button @click="darkMode = !darkMode"
                    class="text-sm px-3 py-1 rounded-lg border border-slate-300 dark:border-slate-600">
                🌙
            </button>

            <a href="{{route('pricing')}}"
               class="hidden md:inline-block bg-emerald-600 text-white px-5 py-2 rounded-xl hover:bg-emerald-700 transition shadow-md">
                Commencer
            </a>
        </div>
    </div>
</header>