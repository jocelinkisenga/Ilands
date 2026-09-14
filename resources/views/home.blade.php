<x-guest-layout>

<div x-data="app()" x-init="init()" class="bg-white dark:bg-[#0B0F19] min-h-screen text-slate-900 dark:text-white transition-colors duration-300 font-sans">

    <!-- ================= HERO ================= -->
    <section class="relative pt-15 pb-15 lg:pt-15 lg:pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left Content -->
            <div class="flex flex-col space-y-8">
                <h1 class="text-5xl lg:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.1]">
                    Maximize Your Tax Deductions
                    <span class="text-emerald-500 block mt-2">Without Expensive CPA.</span>
                </h1>

                <p class="text-lg lg:text-xl text-slate-600 dark:text-slate-400 max-w-xl leading-relaxed">
                    AI-Powered Tax Advisory for Gig Workers & Expats — From $9. Get personalized guidance that helps you keep more of what you earn.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('tax-screener') }}" 
                       class="inline-flex justify-center items-center bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-8 py-4 rounded-xl transition duration-200 shadow-sm hover:shadow-md">
                        Start free
                    </a>

                    <a href="/pricing"
                       class="inline-flex justify-center items-center border border-slate-300 dark:border-white/20 text-slate-900 dark:text-white font-semibold px-8 py-4 rounded-xl hover:bg-slate-50 dark:hover:bg-white/5 transition duration-200">
                        View pricing
                    </a>
                </div>

                <div class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 font-medium">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>IRS Enrolled Agents • EU Tax Advisors • GDPR Compliant</span>
                </div>
            </div>

            <!-- Right Content: Image / Video Placeholder (Hidden on Mobile) -->
            <div class="hidden lg:block relative w-full aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-white/10 group bg-slate-100 dark:bg-slate-800">
                <!-- Video Thumbnail Image -->
                <img src="Dashboard-Ilands-Solutions.png?auto=format&fit=crop&w=1200&q=80" alt="Platform Presentation" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition duration-500">
                
                <!-- Play Button Overlay -->
{{--                 <div class="absolute inset-0 flex items-center justify-center bg-black/10 group-hover:bg-black/20 transition duration-300 cursor-pointer">
                    <div class="bg-white dark:bg-slate-900 w-20 h-20 rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8 text-emerald-500 ml-1" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                </div> --}}

                <!-- Floating Data Card -->
{{--                 <div class="absolute bottom-6 left-6 right-6 bg-white/95 dark:bg-[#151b2b]/95 backdrop-blur-md border border-slate-200 dark:border-white/10 rounded-xl p-6 shadow-lg">
                    <h3 class="text-slate-400 dark:text-slate-500 text-xs font-bold uppercase tracking-wider mb-4">
                        Optimization Preview
                    </h3>
                    <div class="space-y-3 text-sm font-medium">
                        <div class="flex justify-between items-center text-slate-700 dark:text-slate-200">
                            <span>Estimated Savings</span>
                            <span class="text-emerald-500 dark:text-emerald-400 font-bold text-base">
                                <span x-text="currencySymbol"></span>4,820
                            </span>
                        </div>
                        <div class="flex justify-between items-center text-slate-700 dark:text-slate-200">
                            <span>Cross-border Risk</span>
                            <span class="text-emerald-500 dark:text-emerald-400 font-bold">Optimized</span>
                        </div>
                        <div class="flex justify-between items-center text-slate-700 dark:text-slate-200">
                            <span>Compliance Score</span>
                            <span class="text-emerald-500 dark:text-emerald-400 font-bold">Low</span>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>

{{--     <!-- ================= TRUST STRIP ================= -->
    <section class="py-6 border-y border-slate-200 dark:border-white/5 bg-slate-50 dark:bg-white/[0.02]">
        <div class="max-w-7xl mx-auto px-6 text-center text-slate-600 dark:text-slate-400 text-sm font-medium tracking-wide">
            No credit card required. 5 free videos + 10 documents included.
        </div>
    </section> --}}

    <!-- ================= BENEFITS ================= -->
    <section class="py-24 bg-white dark:bg-[#0B0F19]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white">
                    Professional Advisory. <span class="text-emerald-500">Intelligent Execution.</span>
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-slate-50 dark:bg-[#111827] border border-slate-200 dark:border-white/10 p-8 rounded-2xl hover:border-emerald-500/30 transition duration-300">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Expert Curated Library</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Access videos and documents covering essential tax topics, from deductions to filing strategies.
                    </p>
                </div>

                <div class="bg-slate-50 dark:bg-[#111827] border border-slate-200 dark:border-white/10 p-8 rounded-2xl hover:border-emerald-500/30 transition duration-300">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">AI Tax Assistant</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Get instant answers to your tax questions with our intelligent chatbot, available 24/7.
                    </p>
                </div>

                <div class="bg-slate-50 dark:bg-[#111827] border border-slate-200 dark:border-white/10 p-8 rounded-2xl hover:border-emerald-500/30 transition duration-300">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Priority Match</h3>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        Connect with vetted CPAs and Enrolled Agents when you need professional guidance.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= HOW IT WORKS ================= -->
    <section id="how" class="py-24 border-t border-slate-200 dark:border-white/5 bg-slate-50 dark:bg-[#111827]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white">How It Works</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-12 text-left">
                <div class="relative">
                    <div class="text-emerald-500/20 dark:text-emerald-500/10 text-7xl font-black absolute -top-8 -left-4 z-0">01</div>
                    <div class="relative z-10">
                        <h3 class="font-bold text-xl mb-3 text-slate-900 dark:text-white pt-4">Smart Assessment</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Answer adaptive questions based on your income type and residency.</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="text-emerald-500/20 dark:text-emerald-500/10 text-7xl font-black absolute -top-8 -left-4 z-0">02</div>
                    <div class="relative z-10">
                        <h3 class="font-bold text-xl mb-3 text-slate-900 dark:text-white pt-4">AI Optimization Engine</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Our AI analyzes deduction patterns and cross-border scenarios.</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="text-emerald-500/20 dark:text-emerald-500/10 text-7xl font-black absolute -top-8 -left-4 z-0">03</div>
                    <div class="relative z-10">
                        <h3 class="font-bold text-xl mb-3 text-slate-900 dark:text-white pt-4">Professional Summary</h3>
                        <p class="text-slate-600 dark:text-slate-400 leading-relaxed">Download your structured advisory summary or share with your accountant.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PRODUCT DEMO VIDEO ================= -->
<section class="py-24 bg-white dark:bg-[#0B0F19] border-t border-slate-200 dark:border-white/5">
    <div class="max-w-5xl mx-auto px-6">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white tracking-tight mb-4">
                See How It Works in <span class="text-emerald-500">90 Seconds</span>
            </h2>
            <p class="text-slate-600 dark:text-slate-400 text-lg leading-relaxed">
                Watch how our AI engine analyzes deductions, cross-border scenarios, and builds your custom tax strategy effortlessly.
            </p>
        </div>

        <!-- Video Player Container -->
        <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border border-slate-200 dark:border-white/10 bg-slate-900 group">
            <!-- Thumbnail / Poster Image -->
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1600&q=80" 
                 alt="Platform Video Demonstration" 
                 class="w-full h-full object-cover opacity-85 group-hover:opacity-95 group-hover:scale-105 transition-all duration-700">
            
            <!-- Dark Overlay for Contrast -->
            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition duration-300"></div>

            <!-- Play Button Trigger (Replace or wrap with your modal/lightbox logic if needed) -->
            <div class="absolute inset-0 flex items-center justify-center cursor-pointer">
                <div class="w-20 h-20 bg-white text-slate-900 rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-all duration-300">
                    <svg class="w-8 h-8 ml-1 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
            </div>

            <!-- Optional Video Caption / Badge overlay -->
            <div class="absolute bottom-6 left-6 right-6 flex justify-between items-center text-white/90 text-sm font-medium bg-black/40 backdrop-blur-md px-6 py-3 rounded-xl border border-white/10">
                <span class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    ILANDS Solutions Platform Walkthrough
                </span>
                <span class="text-slate-300">1:30 min</span>
            </div>
        </div>

    </div>
</section>

    <!-- ================= PRICING ================= -->
    @include("components.pricing")

</div>

<!-- ================= ALPINE LOGIC ================= -->
<script>
function app() {
    return {
        mobile: false,
        openAssessment: false,
        income: 50000,
        rate: 10,
        currency: 'USD',
        currencySymbol: '$',
        plans: [
            {name: 'Starter', price: 9, desc: 'Core tax optimization summary.'},
            {name: 'Pro', price: 29, desc: 'Advanced deductions & export-ready report.'},
            {name: 'Expert', price: 79, desc: 'Includes professional review option.'},
        ],
        init() {
            if(navigator.language.includes('en-GB') || navigator.language.includes('fr') || navigator.language.includes('de')){
                this.currency = 'EUR';
                this.currencySymbol = '€';
                this.plans[0].price = 9;
                this.plans[1].price = 29;
                this.plans[2].price = 79;
            }
        },
        calculateSavings() {
            return Math.round(this.income * (this.rate/100));
        }
    }
}
</script>

</x-guest-layout>