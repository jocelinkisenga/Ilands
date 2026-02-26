<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxAI | Intelligence Fiscale Nouvelle Génération</title>
    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>

<body x-data="{ darkMode: window.matchMedia('(prefers-color-scheme: dark)').matches }"
      :class="darkMode ? 'dark bg-slate-900 text-white' : 'bg-slate-50 text-slate-800'"
      class="transition duration-500">

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

            <a href="{{route('subscribe')}}"
               class="hidden md:inline-block bg-emerald-600 text-white px-5 py-2 rounded-xl hover:bg-emerald-700 transition shadow-md">
                Commencer
            </a>
        </div>
    </div>
</header>

<div class="pt-28 gradient-bg">

<!-- ================= HERO ================= -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">

        <div>
            <h2 class="text-5xl font-bold leading-tight">
                Optimisez votre fiscalité avec
                <span class="text-emerald-500">l'IA avancée</span>
            </h2>

            <p class="mt-6 text-lg opacity-80">
                Rapports intelligents, sécurisés et professionnels
                générés en quelques minutes.
            </p>

            <div class="mt-10 flex gap-4">
                <a href="/register"
                   class="bg-emerald-600 text-white px-8 py-4 rounded-2xl font-semibold hover:bg-emerald-700 transition shadow-xl">
                    Commencer gratuitement
                </a>

                <a href="#features"
                   class="glass px-8 py-4 rounded-2xl font-semibold">
                    Voir comment
                </a>
            </div>
        </div>

        <div class="glass p-8 rounded-3xl shadow-2xl transform hover:scale-105 transition duration-500">
            <img src="https://images.unsplash.com/photo-1554224154-26032ffc0d07"
                 class="rounded-2xl mb-6 shadow-md"
                 alt="">
            <div class="flex justify-between text-sm">
                <span>Optimisation estimée</span>
                <span class="text-emerald-500 font-bold">-$5,230</span>
            </div>
        </div>

    </div>
</section>

<!-- ================= LOGOS ================= -->
<section class="py-16 text-center opacity-70">
    <p class="text-sm mb-6">Ils nous font confiance</p>
    <div class="flex flex-wrap justify-center gap-10 text-lg font-semibold">
        <span>FinCorp</span>
        <span>TaxGroup</span>
        <span>LegalPro</span>
        <span>StartFinance</span>
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section id="features" class="py-24">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h3 class="text-4xl font-bold mb-16">Solutions puissantes</h3>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="glass p-8 rounded-3xl hover:shadow-2xl transition">
                <h4 class="text-xl font-semibold mb-4">Analyse IA</h4>
                <p class="text-sm opacity-80">Détection avancée des opportunités fiscales.</p>
            </div>

            <div class="glass p-8 rounded-3xl hover:shadow-2xl transition">
                <h4 class="text-xl font-semibold mb-4">Rapports PDF</h4>
                <p class="text-sm opacity-80">Professionnels, détaillés et téléchargeables.</p>
            </div>

            <div class="glass p-8 rounded-3xl hover:shadow-2xl transition">
                <h4 class="text-xl font-semibold mb-4">Sécurité</h4>
                <p class="text-sm opacity-80">Chiffrement et stockage sécurisé.</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="py-24 bg-emerald-50 dark:bg-slate-800">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h3 class="text-4xl font-bold mb-16">Ce que disent nos clients</h3>

        <div class="grid md:grid-cols-2 gap-10">
            <div class="glass p-8 rounded-3xl">
                <p>"Un outil incroyable qui nous a permis d'économiser des milliers d'euros."</p>
                <p class="mt-4 font-semibold">— CEO Startup</p>
            </div>

            <div class="glass p-8 rounded-3xl">
                <p>"Simple, sécurisé et ultra efficace."</p>
                <p class="mt-4 font-semibold">— Entrepreneur</p>
            </div>
        </div>
    </div>
</section>

<!-- ================= FAQ ================= -->
<section id="faq" class="py-24">
    <div class="max-w-4xl mx-auto px-6">
        <h3 class="text-4xl font-bold text-center mb-16">FAQ</h3>

        <div x-data="{ selected:null }" class="space-y-6">
            <div class="glass p-6 rounded-2xl">
                <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="w-full text-left font-semibold">
                    Mes données sont-elles sécurisées ?
                </button>
                <div x-show="selected == 1" class="mt-4 text-sm opacity-80">
                    Oui, chiffrement complet et stockage sécurisé.
                </div>
            </div>

            <div class="glass p-6 rounded-2xl">
                <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="w-full text-left font-semibold">
                    Combien de temps pour un rapport ?
                </button>
                <div x-show="selected == 2" class="mt-4 text-sm opacity-80">
                    Moins de 2 minutes en moyenne.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="py-24 text-center">
    <div class="max-w-3xl mx-auto px-6 glass p-12 rounded-3xl shadow-xl">
        <h3 class="text-3xl font-bold">Contactez-nous</h3>
        <p class="mt-4 opacity-80">Une question ? Notre équipe vous répond rapidement.</p>

        <a href="mailto:support@taxai.com"
           class="mt-8 inline-block bg-emerald-600 text-white px-8 py-4 rounded-2xl hover:bg-emerald-700 transition">
            Envoyer un message
        </a>
    </div>
</section>

<footer class="text-center text-sm opacity-60 py-10">
    © {{ date('Y') }} TaxAI — Tous droits réservés.
</footer>

</div>
</body>
</html>