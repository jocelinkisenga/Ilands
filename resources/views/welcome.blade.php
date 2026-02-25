<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaxAI | Optimisation Fiscale Intelligente</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-50 text-slate-800 scroll-smooth">

<!-- ================= NAVBAR ================= -->
<header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-2xl font-bold text-emerald-600">
            TaxAI
        </h1>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
            <a href="#about" class="hover:text-emerald-600 transition">À propos</a>
            <a href="#features" class="hover:text-emerald-600 transition">Solutions</a>
            <a href="#faq" class="hover:text-emerald-600 transition">FAQ</a>
            <a href="#contact" class="hover:text-emerald-600 transition">Contact</a>
            <a href="{{ route('login') }}" class="text-slate-600 hover:text-emerald-600 transition">Connexion</a>
        </nav>

        <a href="/register"
           class="hidden md:inline-block bg-emerald-600 text-white px-5 py-2 rounded-xl hover:bg-emerald-700 transition shadow-md">
            Commencer
        </a>

    </div>
</header>

<!-- ================= HERO ================= -->
<section class="relative bg-gradient-to-br from-emerald-50 via-white to-emerald-100">
    <div class="max-w-7xl mx-auto px-6 py-24 grid md:grid-cols-2 gap-16 items-center">

        <div>
            <h2 class="text-5xl font-bold leading-tight text-slate-900">
                La fiscalité simplifiée par
                <span class="text-emerald-600">l'intelligence artificielle</span>
            </h2>

            <p class="mt-6 text-lg text-slate-600">
                Analyse avancée, recommandations personnalisées
                et rapports sécurisés en quelques minutes.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="/register"
                   class="bg-emerald-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-emerald-700 transition shadow-lg">
                    Commencer maintenant
                </a>

                <a href="#features"
                   class="border border-emerald-600 text-emerald-600 px-8 py-4 rounded-xl font-semibold hover:bg-emerald-50 transition">
                    Découvrir
                </a>
            </div>
        </div>

        <!-- Hero Image Card -->
        <div class="relative">
            <div class="bg-white rounded-3xl shadow-2xl p-8">
                <img src="https://images.unsplash.com/photo-1554224155-1696413565d3"
                     class="rounded-2xl mb-6"
                     alt="Financial Analysis">

                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span>Optimisation estimée</span>
                        <span class="text-emerald-600 font-semibold">-$4,820</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Rapport IA</span>
                        <span class="text-emerald-600 font-semibold">Disponible</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold text-slate-900">
            À propos de TaxAI
        </h3>

        <p class="mt-6 text-lg text-slate-600 leading-relaxed">
            TaxAI combine expertise fiscale et intelligence artificielle
            pour offrir une plateforme moderne, sécurisée et fiable.
            Notre mission : rendre l’optimisation fiscale accessible à tous.
        </p>

    </div>
</section>

<!-- ================= FEATURES ================= -->
<section id="features" class="py-24 bg-emerald-50">
    <div class="max-w-7xl mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold text-slate-900">
            Pourquoi choisir TaxAI ?
        </h3>

        <div class="mt-16 grid md:grid-cols-3 gap-10">

            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
                <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40"
                     class="rounded-2xl mb-6"
                     alt="">
                <h4 class="text-xl font-semibold">Analyse intelligente</h4>
                <p class="mt-4 text-slate-600 text-sm">
                    Détection automatique des opportunités fiscales.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216"
                     class="rounded-2xl mb-6"
                     alt="">
                <h4 class="text-xl font-semibold">Rapports détaillés</h4>
                <p class="mt-4 text-slate-600 text-sm">
                    Téléchargez des rapports professionnels prêts à partager.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">
                <img src="https://images.unsplash.com/photo-1556155092-8707de31f9c4"
                     class="rounded-2xl mb-6"
                     alt="">
                <h4 class="text-xl font-semibold">Sécurité renforcée</h4>
                <p class="mt-4 text-slate-600 text-sm">
                    Données chiffrées et hébergement sécurisé.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= FAQ ================= -->
<section id="faq" class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <h3 class="text-4xl font-bold text-center mb-16">
            Questions Fréquemment Posées
        </h3>

        <div class="space-y-6">

            <details class="group bg-slate-50 p-6 rounded-2xl shadow-sm">
                <summary class="cursor-pointer font-semibold text-lg">
                    Mes données sont-elles sécurisées ?
                </summary>
                <p class="mt-4 text-slate-600 text-sm">
                    Oui, toutes les données sont chiffrées et stockées
                    de manière sécurisée.
                </p>
            </details>

            <details class="group bg-slate-50 p-6 rounded-2xl shadow-sm">
                <summary class="cursor-pointer font-semibold text-lg">
                    Comment fonctionne l’analyse IA ?
                </summary>
                <p class="mt-4 text-slate-600 text-sm">
                    Nous utilisons des modèles avancés pour analyser vos données fiscales.
                </p>
            </details>

            <details class="group bg-slate-50 p-6 rounded-2xl shadow-sm">
                <summary class="cursor-pointer font-semibold text-lg">
                    Puis-je télécharger mon rapport ?
                </summary>
                <p class="mt-4 text-slate-600 text-sm">
                    Oui, un rapport PDF détaillé est généré après l’analyse.
                </p>
            </details>

        </div>
    </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="py-24 bg-emerald-600 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">

        <h3 class="text-4xl font-bold">
            Contactez-nous
        </h3>

        <p class="mt-6 text-emerald-100">
            Une question ? Notre équipe est disponible pour vous aider.
        </p>

        <a href="mailto:support@taxai.com"
           class="mt-8 inline-block bg-white text-emerald-600 px-8 py-4 rounded-xl font-semibold hover:bg-slate-100 transition shadow-lg">
            Envoyer un message
        </a>

    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-slate-900 text-slate-400 py-12 text-center text-sm">
    © {{ date('Y') }} TaxAI — Tous droits réservés.
</footer>

</body>
</html>