<x-guest-layout>

<div x-data="app()" x-init="init()" class="min-h-screen bg-[#F6F9FF] text-slate-900 dark:bg-[#060D1F] dark:text-slate-100 font-sans antialiased transition-colors duration-300">

    <!-- ================= HERO ================= -->
    <section class="relative overflow-hidden">
        <!-- Fond discret : grille + halo bleu -->
        <div aria-hidden="true" class="pointer-events-none absolute inset-0">
            <div class="absolute inset-0 opacity-[0.5] dark:opacity-[0.35]"
                 style="background-image:linear-gradient(to right,rgba(37,99,235,.08) 1px,transparent 1px),linear-gradient(to bottom,rgba(37,99,235,.08) 1px,transparent 1px);background-size:48px 48px;-webkit-mask-image:radial-gradient(ellipse 70% 60% at 50% 30%,#000 30%,transparent 100%);mask-image:radial-gradient(ellipse 70% 60% at 50% 30%,#000 30%,transparent 100%);"></div>
            <div class="absolute -top-40 right-[-10%] h-[520px] w-[520px] rounded-full bg-blue-500/20 blur-3xl dark:bg-blue-600/25"></div>
        </div>

        <div class="relative mx-auto grid max-w-7xl items-center gap-14 px-6 py-16 lg:grid-cols-[1.05fr_1fr] lg:gap-16 lg:py-24">

            <!-- Texte -->
            <div class="flex flex-col space-y-8">
                <h1 class="text-4xl font-extrabold leading-[1.08] tracking-tight text-[#0A1B3D] dark:text-white sm:text-5xl lg:text-[3.4rem]">
                    You earned it. Let's help you keep more of it.
                </h1>

                <p class="max-w-xl text-lg leading-relaxed text-slate-600 dark:text-slate-300 lg:text-xl">
                    Tax guidance for freelancers, gig workers and expats. We spot the deductions you'd otherwise miss and explain them in plain English, with no CPA bill attached. Plans start at $9.
                </p>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('tax-screener') }}"
                       class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-8 py-4 font-semibold text-white shadow-lg shadow-blue-600/25 transition hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 dark:bg-blue-500 dark:hover:bg-blue-400 dark:focus-visible:ring-offset-[#060D1F]">
                        Check my deductions, it's free
                    </a>
                    <a href="/pricing"
                       class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white/60 px-8 py-4 font-semibold text-[#0A1B3D] transition hover:border-blue-400 hover:bg-white focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 dark:border-white/15 dark:bg-white/5 dark:text-white dark:hover:bg-white/10">
                        See pricing
                    </a>
                </div>

                <!-- Réassurance -->
                <ul class="grid gap-3 pt-2 text-sm font-medium text-slate-600 dark:text-slate-300 sm:grid-cols-3">
                    <li class="flex items-center gap-2.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
                        </span>
                        Reviewed by IRS Enrolled Agents
                    </li>
                    <li class="flex items-center gap-2.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                        </span>
                        EU tax advisors on board
                    </li>
                    <li class="flex items-center gap-2.5">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        </span>
                        Your data stays yours (GDPR)
                    </li>
                </ul>
            </div>

            <!-- Carte interactive : "Which one sounds like you?" -->
            <div x-data="deductionFinder()" class="relative">
                <div aria-hidden="true" class="absolute -inset-3 rounded-[2rem] bg-gradient-to-br from-blue-500/25 via-sky-400/10 to-transparent blur-2xl"></div>

                <div class="relative overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-blue-900/10 dark:border-white/10 dark:bg-[#0C1730] dark:shadow-black/40">

                    <div class="border-b border-slate-100 p-5 dark:border-white/10">
                        <p class="text-sm font-semibold text-[#0A1B3D] dark:text-white">Which one sounds like you?</p>
                        <div class="mt-3 grid grid-cols-2 gap-2" role="tablist" aria-label="Choose your situation">
                            <template x-for="p in profiles" :key="p.id">
                                <button type="button" role="tab" :aria-selected="active === p.id" @click="select(p.id)"
                                        class="flex items-center gap-2 rounded-xl border px-3 py-2.5 text-left text-sm font-medium transition focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500"
                                        :class="active === p.id
                                            ? 'border-blue-600 bg-blue-600 text-white shadow-md shadow-blue-600/20 dark:border-blue-400 dark:bg-blue-500'
                                            : 'border-slate-200 bg-slate-50 text-slate-700 hover:border-blue-300 dark:border-white/10 dark:bg-white/5 dark:text-slate-300 dark:hover:border-blue-400/50'">
                                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" x-html="icons[p.icon]"></svg>
                                    <span x-text="p.label"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <div class="p-5">
                        <p class="mb-3 text-sm text-slate-500 dark:text-slate-400">Expenses people like you often forget to claim:</p>
                        <ul class="space-y-2.5" role="tabpanel">
                            <template x-for="item in current.items" :key="current.id + item.name">
                                <li class="flex items-center justify-between rounded-xl bg-slate-50 px-4 py-3 dark:bg-white/5">
                                    <span class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" x-html="icons[item.icon]"></svg>
                                        </span>
                                        <span class="text-sm font-medium text-slate-800 dark:text-slate-100" x-text="item.name"></span>
                                    </span>
                                    <span class="text-sm font-semibold tabular-nums text-slate-900 dark:text-white" x-text="'$' + item.amount.toLocaleString('en-US')"></span>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div class="flex items-end justify-between gap-4 bg-gradient-to-r from-[#0A1B3D] to-blue-700 px-5 py-5 text-white">
                        <div>
                            <p class="text-sm text-blue-100">Potential deductions per year</p>
                            <p class="text-4xl font-extrabold tabular-nums" x-text="'$' + Math.round(shown).toLocaleString('en-US')" aria-live="polite"></p>
                        </div>
                        <p class="max-w-[9.5rem] text-right text-xs leading-snug text-blue-200">Example based on typical expenses. Your report uses your real numbers.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= COMMENT ÇA MARCHE ================= -->
    <section class="mx-auto max-w-7xl px-6 py-16 lg:py-24">
        <div class="max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-[#0A1B3D] dark:text-white sm:text-4xl">From "where do I even start?" to a clear plan in three steps</h2>
            <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">No tax jargon, no endless forms. Just answer like you would to a friend who happens to know taxes.</p>
        </div>

        <ol class="mt-12 grid gap-6 md:grid-cols-3">
            <li class="relative rounded-2xl border border-slate-200 bg-white p-7 dark:border-white/10 dark:bg-[#0C1730]">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white dark:bg-blue-500">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="8" height="4" x="8" y="2" rx="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/></svg>
                </span>
                <h3 class="mt-5 text-xl font-semibold text-[#0A1B3D] dark:text-white">1. Tell us how you work</h3>
                <p class="mt-2 leading-relaxed text-slate-600 dark:text-slate-400">Where you live, how you earn, what you spend on the job. It takes about two minutes, and it's free.</p>
            </li>
            <li class="relative rounded-2xl border border-slate-200 bg-white p-7 dark:border-white/10 dark:bg-[#0C1730]">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white dark:bg-blue-500">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="m9 15 2 2 4-4"/></svg>
                </span>
                <h3 class="mt-5 text-xl font-semibold text-[#0A1B3D] dark:text-white">2. Get your personal report</h3>
                <p class="mt-2 leading-relaxed text-slate-600 dark:text-slate-400">See which deductions apply to you, why they apply, and what to keep as proof, all written so you can actually follow it.</p>
            </li>
            <li class="relative rounded-2xl border border-slate-200 bg-white p-7 dark:border-white/10 dark:bg-[#0C1730]">
                <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white dark:bg-blue-500">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
                </span>
                <h3 class="mt-5 text-xl font-semibold text-[#0A1B3D] dark:text-white">3. Ask anything, anytime</h3>
                <p class="mt-2 leading-relaxed text-slate-600 dark:text-slate-400">Not sure if your coworking pass counts? Ask ILANDS AI and get a straight answer, day or night.</p>
            </li>
        </ol>
    </section>

    <!-- ================= APERÇU DU TABLEAU DE BORD ================= -->
    <section class="mx-auto max-w-7xl px-6 pb-16 lg:pb-24">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div>
                <h2 class="text-3xl font-bold tracking-tight text-[#0A1B3D] dark:text-white sm:text-4xl">Everything about your taxes, in one calm place</h2>
                <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">Your deductions, your documents and your questions live together, so tax season stops feeling like a scavenger hunt.</p>

                <ul class="mt-8 space-y-5">
                    <li class="flex gap-4">
                        <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                        </span>
                        <p class="text-slate-700 dark:text-slate-300"><span class="font-semibold text-[#0A1B3D] dark:text-white">Built for your situation.</span> US gig income, EU rules, or both at once when you live between countries.</p>
                    </li>
                    <li class="flex gap-4">
                        <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                        </span>
                        <p class="text-slate-700 dark:text-slate-300"><span class="font-semibold text-[#0A1B3D] dark:text-white">Explained, not just listed.</span> Every suggestion comes with the "why", so you can trust it and defend it.</p>
                    </li>
                    <li class="flex gap-4">
                        <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-100 text-blue-700 dark:bg-blue-500/15 dark:text-blue-300">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                        </span>
                        <p class="text-slate-700 dark:text-slate-300"><span class="font-semibold text-[#0A1B3D] dark:text-white">Priced for real people.</span> Pay a fraction of what a CPA charges, and only for what you need.</p>
                    </li>
                </ul>

                <a href="{{ route('tax-screener') }}"
                   class="mt-9 inline-flex items-center justify-center rounded-xl bg-blue-600 px-7 py-3.5 font-semibold text-white transition hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 dark:bg-blue-500 dark:hover:bg-blue-400 dark:focus-visible:ring-offset-[#060D1F]">
                    Start with the free check
                </a>
            </div>

            <!-- Cadre "navigateur" autour de la capture -->
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-2xl shadow-blue-900/10 dark:border-white/10 dark:bg-[#0C1730] dark:shadow-black/40">
                <div class="flex items-center gap-1.5 border-b border-slate-100 px-4 py-3 dark:border-white/10" aria-hidden="true">
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300 dark:bg-white/20"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300 dark:bg-white/20"></span>
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-300 dark:bg-white/20"></span>
                </div>
                <img src="{{ asset('Dashboard-Ilands-Solutions.png') }}" alt="The ILANDS SOLUTIONS dashboard showing your deductions and report" class="w-full object-cover" loading="lazy">
            </div>
        </div>
    </section>

    <!-- ================= TARIFS ================= -->
    @include("components.pricing")

    <!-- ================= APPEL FINAL ================= -->
    <section class="mx-auto max-w-7xl px-6 py-16 lg:py-24">
        <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#0A1B3D] via-[#0F2A6B] to-blue-700 px-8 py-14 text-center text-white sm:px-16">
            <div aria-hidden="true" class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-sky-400/20 blur-3xl"></div>
            <h2 class="relative mx-auto max-w-2xl text-3xl font-bold tracking-tight sm:text-4xl">Two minutes today could save you real money this year</h2>
            <p class="relative mx-auto mt-4 max-w-xl text-lg text-blue-100">Find out what you can claim. It's free, and you don't need to create an account to start.</p>
            <a href="{{ route('tax-screener') }}"
               class="relative mt-8 inline-flex items-center justify-center rounded-xl bg-white px-8 py-4 font-semibold text-[#0A1B3D] shadow-lg transition hover:bg-blue-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-blue-800">
                Check my deductions
            </a>
            <p class="relative mt-6 text-xs text-blue-200">Educational guidance only. It doesn't replace advice from a licensed tax professional.</p>
        </div>
    </section>

</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('deductionFinder', () => ({
            active: 'drivers',
            shown: 0,
            frame: null,

            icons: {
                car: '<path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/>',
                phone: '<rect width="14" height="20" x="5" y="2" rx="2"/><path d="M12 18h.01"/>',
                shield: '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
                laptop: '<path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/>',
                home: '<path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>',
                globe: '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
                camera: '<path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3z"/><circle cx="12" cy="13" r="3"/>',
                file: '<path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/>',
                plane: '<path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"/>'
            },

            profiles: [
                { id: 'drivers', label: 'Rideshare & delivery', icon: 'car', items: [
                    { name: 'Vehicle mileage', icon: 'car', amount: 3150 },
                    { name: 'Phone & data plan', icon: 'phone', amount: 420 },
                    { name: 'Insurance & platform fees', icon: 'shield', amount: 780 }
                ]},
                { id: 'freelancers', label: 'Freelance designer', icon: 'laptop', items: [
                    { name: 'Software & subscriptions', icon: 'laptop', amount: 1240 },
                    { name: 'Home office space', icon: 'home', amount: 1650 },
                    { name: 'Health insurance', icon: 'shield', amount: 2100 }
                ]},
                { id: 'expats', label: 'Remote worker abroad', icon: 'globe', items: [
                    { name: 'Foreign earned income exclusion', icon: 'globe', amount: 5200 },
                    { name: 'Coworking pass', icon: 'home', amount: 960 },
                    { name: 'Work travel', icon: 'plane', amount: 1380 }
                ]},
                { id: 'creators', label: 'Content creator', icon: 'camera', items: [
                    { name: 'Camera & audio gear', icon: 'camera', amount: 1890 },
                    { name: 'Editing tools', icon: 'laptop', amount: 540 },
                    { name: 'Accounting & legal', icon: 'file', amount: 690 }
                ]}
            ],

            get current() {
                return this.profiles.find(p => p.id === this.active);
            },

            get total() {
                return this.current.items.reduce((sum, i) => sum + i.amount, 0);
            },

            init() {
                this.animate(this.total);
            },

            select(id) {
                this.active = id;
                this.animate(this.total);
            },

            animate(target) {
                cancelAnimationFrame(this.frame);
                const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                if (reduce) { this.shown = target; return; }

                const from = this.shown;
                const start = performance.now();
                const duration = 700;

                const step = (now) => {
                    const t = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - t, 3);
                    this.shown = from + (target - from) * eased;
                    if (t < 1) this.frame = requestAnimationFrame(step);
                };
                this.frame = requestAnimationFrame(step);
            }
        }));
    });
</script>

</x-guest-layout>