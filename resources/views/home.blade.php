@extends('layouts.guest')
@section("content")
<div class="pt-28 gradient-bg">
<!-- ================= HERO ================= -->
<section class="py-6">
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
<section class="py-16 text-center opacity-80">
<div class="max-w-5xl mx-auto  px-6">
    <div class="text-center mb-8">
        <span class="text-[10px] font-black uppercase tracking-[0.3em] text-base-content/40">Trusted by Industry Leaders</span>
        <div class="h-[1px] w-12 bg-primary mx-auto mt-2 opacity-50"></div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center opacity-60">
        
        <div class="flex justify-center grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer group">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-base-300 rounded flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                    <span class="font-bold text-xs text-base-content/40 group-hover:text-blue-600">L1</span>
                </div>
                <span class="font-semibold text-sm tracking-tight text-base-content/50 group-hover:text-base-content">LOGO_ONE</span>
            </div>
        </div>

        <div class="flex justify-center grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer group">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-base-300 rounded flex items-center justify-center group-hover:bg-red-100 transition-colors">
                    <span class="font-bold text-xs text-base-content/40 group-hover:text-red-600">L2</span>
                </div>
                <span class="font-semibold text-sm tracking-tight text-base-content/50 group-hover:text-base-content">LOGO_TWO</span>
            </div>
        </div>

        <div class="flex justify-center grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer group">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-base-300 rounded flex items-center justify-center group-hover:bg-green-100 transition-colors">
                    <span class="font-bold text-xs text-base-content/40 group-hover:text-green-600">L3</span>
                </div>
                <span class="font-semibold text-sm tracking-tight text-base-content/50 group-hover:text-base-content">LOGO_THREE</span>
            </div>
        </div>

        <div class="flex justify-center grayscale hover:grayscale-0 transition-all duration-500 cursor-pointer group">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-base-300 rounded flex items-center justify-center group-hover:bg-yellow-100 transition-colors">
                    <span class="font-bold text-xs text-base-content/40 group-hover:text-yellow-600">L4</span>
                </div>
                <span class="font-semibold text-sm tracking-tight text-base-content/50 group-hover:text-base-content">LOGO_FOUR</span>
            </div>
        </div>

    </div>
</div>
</section>
<section id="pricing" class="py-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-10">
    <div class="card bg-base-100 shadow-xl border border-success">
        <div class="card-body">
            <h2 class="card-title text-success">Standard</h2>
            <div class="flex items-baseline gap-1">
                <span class="text-4xl font-bold">49€</span>
                <span class="text-sm opacity-70">/rapport</span>
            </div>
            <p>Analyse IA ponctuelle avec validation humaine[cite: 17].</p>
            <ul class="py-4 space-y-2">
                <li class="flex items-center gap-2 text-sm">✅ Rapport fiscal complet</li>
                <li class="flex items-center gap-2 text-sm">✅ Stockage S3 sécurisé [cite: 11]</li>
                <li class="flex items-center gap-2 text-sm text-error">❌ Support prioritaire</li>
            </ul>
            <div class="card-actions justify-end">
                <a href="" class="btn btn-success btn-block text-white">
                    Acheter maintenant
                </a>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 shadow-2xl border-2 border-sucess relative">
        <div class="badge badge-success absolute top-4 right-4 text-white">Populaire</div>
        <div class="card-body">
            <h2 class="card-title">Business AI</h2>
            <div class="flex items-baseline gap-1">
                <span class="text-4xl font-bold">199€</span>
                <span class="text-sm opacity-70">/mois</span>
            </div>
            <p>Pour les cabinets avec flux régulier.</p>
            <ul class="py-4 space-y-2">
                <li class="flex items-center gap-2 text-sm font-semibold text-primary">✅ Jusqu'à 10 analyses /mois</li>
                <li class="flex items-center gap-2 text-sm font-semibold text-primary">✅ Dashboard Filament complet [cite: 8]</li>
                <li class="flex items-center gap-2 text-sm">✅ Support expert 24h</li>
            </ul>
            <div class="card-actions justify-end">
                <button class="btn btn-success btn-block text-white">S'abonner via Stripe </button>
            </div>
        </div>
    </div>
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
<div class="flex items-center justify-center min-h-screen bg-base-200/50 p-6">
    
    <div class="card lg:card-side bg-base-100 shadow-xl max-w-5xl w-full border border-base-300 overflow-hidden">
        
        <div class="lg:w-2/5 bg-neutral text-neutral-content p-10 flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-8">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-content" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight">NOM_ENTREPRISE</span>
                </div>

                <h2 class="text-4xl font-extrabold mb-6 leading-tight">Parlons de votre prochain projet.</h2>
                <p class="text-neutral-content/70 mb-8">Nos experts vous répondent sous 24h ouvrées pour analyser vos besoins et vous proposer une solution adaptée.</p>

                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-white/5 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg></div>
                        <div><p class="text-xs uppercase opacity-50 font-bold">Email</p><p class="font-medium text-sm">contact@entreprise.com</p></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-white/5 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg></div>
                        <div><p class="text-xs uppercase opacity-50 font-bold">Siège Social</p><p class="font-medium text-sm">123 Avenue du Business, Paris</p></div>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 mt-12 border-t border-white/10 pt-6">
                <div class="badge badge-outline p-4 hover:bg-primary hover:text-primary-content transition-colors cursor-pointer text-xs font-bold uppercase tracking-widest">LinkedIn</div>
                <div class="badge badge-outline p-4 hover:bg-primary hover:text-primary-content transition-colors cursor-pointer text-xs font-bold uppercase tracking-widest">Twitter</div>
            </div>
        </div>

        <div class="card-body lg:w-3/5 p-10 bg-base-100">
            <h3 class="text-lg font-bold mb-6 flex items-center gap-2 italic">
                <span class="w-8 h-[2px] bg-primary"></span> Formulaire de contact
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label"><span class="label-text font-bold">Nom complet</span></label>
                    <input type="text" class="input input-bordered bg-base-200 border-none focus:ring-2 focus:ring-primary/20" placeholder="Ex: Jean Dupont" />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-bold">Entreprise</span></label>
                    <input type="text" class="input input-bordered bg-base-200 border-none focus:ring-2 focus:ring-primary/20" placeholder="Nom de votre société" />
                </div>
            </div>

            <div class="form-control mt-4">
                <label class="label"><span class="label-text font-bold">Adresse Email</span></label>
                <input type="email" class="input input-bordered bg-base-200 border-none focus:ring-2 focus:ring-primary/20" placeholder="jean@entreprise.com" />
            </div>

            <div class="form-control mt-4">
                <label class="label"><span class="label-text font-bold">Sujet de votre demande</span></label>
                <select class="select select-bordered bg-base-200 border-none focus:ring-2 focus:ring-primary/20">
                    <option disabled selected>Choisissez une option</option>
                    <option>Demande de devis</option>
                    <option>Partenariat</option>
                    <option>Support technique</option>
                </select>
            </div>

            <div class="form-control mt-4">
                <label class="label"><span class="label-text font-bold">Message</span></label>
                <textarea class="textarea textarea-bordered bg-base-200 border-none h-32 focus:ring-2 focus:ring-primary/20" placeholder="Comment pouvons-nous vous aider ?"></textarea>
            </div>

            <div class="mt-8">
                <button class="btn btn-primary btn-block rounded-lg shadow-lg hover:shadow-primary/20 transition-all">
                    Envoyer ma demande
                </button>
                <p class="text-[10px] text-center mt-4 opacity-50 uppercase tracking-tighter">En envoyant ce formulaire, vous acceptez notre politique de confidentialité.</p>
            </div>
        </div>
    </div>
</div>
</section>


</div>
@endsection