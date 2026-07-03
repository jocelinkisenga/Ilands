<x-guest-layout>

<div x-data="app()" x-init="init()" >

<!-- ================= HERO ================= -->
<section class="pt-15 pb-32 relative overflow-hidden">

    <!-- Animated Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/20 via-transparent to-transparent animate-pulse"></div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center relative">

        <div>
            <h1 class="text-4xl md:text-6xl font-bold text-black dark:text-white leading-tight">
                Maximize Your Tax Deductions
                <span class="text-emerald-400"> Without Expensive CPA.</span>
            </h1>

            <p class="mt-6 text-lg text-black dark:text-white/70 leading-relaxed">
                AI-Powered Tax Advisory for Gig Workers & Expats — From $9. Get personalized guidance that helps you keep more of what you earn.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="{{route('tax-screener')}}" 
                        class="bg-emerald-500 snd__button hover:bg-emerald-600 text-black font-semibold px-8 py-4 rounded-2xl shadow-xl shadow-emerald-500/20 transition">
                    Start free
                </a>

                <a href="/pricing"
                   class="border text-black font-bold border-black/60 dark:border-white/20 px-8 py-4 rounded-2xl dark:text-white/80 hover:border-white/40 transition">
                    view pricing
                </a>
            </div>

            <div class="mt-6 text-sm text-black dark:text-white/50">
                IRS Enrolled Agents • EU Tax Advisors • GDPR Compliant
            </div>
        </div>

        <!-- Glass Card -->
        <div class="bg-black text-white backdrop-blur-2xl border-green/10  dark:bg-white/5 dark:backdrop-blur-2xl border dark:border-white/10 rounded-3xl p-8 shadow-2xl">
            <h3 class="text-white/70 text-sm uppercase tracking-widest mb-6">
                Optimization Preview
            </h3>
            <div class="space-y-4 text-sm">
                <div class="flex justify-between">
                    <span>Estimated Savings</span>
                    <span class="text-emerald-400 font-bold">
                        <span x-text="currencySymbol"></span>4,820
                    </span>
                </div>
                <div class="flex justify-between">
                    <span>Cross-border Risk</span>
                    <span class="text-emerald-400 font-bold">Optimized</span>
                </div>
                <div class="flex justify-between">
                    <span>Compliance Score</span>
                    <span class="text-emerald-400 font-bold">Low</span>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ================= TRUST STRIP ================= -->
<section class="py-8 border-t border-b border-white/5 bg-white/5">
    <div class="max-w-6xl mx-auto px-6 text-center text-black dark:text-white/60 text-sm tracking-wide">
        No credit card required. 5 free videos + 10 documents included.
    </div>
</section>



<!-- ================= BENEFITS ================= -->
<section class="py-4">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-emerald-400 mb-16">Professional Advisory. Intelligent Execution.</h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white/5 backdrop-blur-xl border border-emerald-400/50 dark:border-white/10 p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">Expart curated Library</h3>
                <p class="text-black dark:text-white/70">
                    Access videos and documents covering essential tax topics, from deductions to filing strategies.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-emerald-400/50 dark:border-white/10  p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">AI Tax Assistant</h3>
                <p class="text-black dark:text-white/70">
                    Get instant answers to your tax questions with our intelligent chatbot, available 24/7.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-emerald-400/50 dark:border-white/10  p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">Priority Match</h3>
                <p class="text-black dark:text-white/70">
                   Connect with vetted CPAs and Enrolled Agents when you need professional guidance.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section id="how" class="py-16 bg-white/5">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-16 text-emerald-400">How It Works</h2>

        <div class="grid md:grid-cols-3 gap-12 text-left">

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">01</div>
                <h3 class="font-semibold text-lg mb-3 text-emerald-400">Smart Assessment</h3>
                <p class="text-black dark:text-white/70">Answer adaptive questions based on your income type and residency.</p>
            </div>

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">02</div>
                <h3 class="font-semibold text-lg mb-3 text-emerald-400">AI Optimization Engine</h3>
                <p class="text-black dark:text-white/70">Our AI analyzes deduction patterns and cross-border scenarios.</p>
            </div>

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">03</div>
                <h3 class="font-semibold text-lg mb-3 text-emerald-400">Professional Summary</h3>
                <p class="text-black dark:text-white/70">Download your structured advisory summary or share with your accountant.</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= PRICING ================= -->
@include("components.pricing")

<!-- ================= FINAL CTA ================= -->
{{-- <section class="py-24 bg-gradient-to-r from-emerald-500 to-emerald-600 text-black text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-6">
            Rebuilding Tax Advisory for the AI Era.
        </h2>
        <a href="{{route('tax-screener')}}" 
                class="bg-black text-white px-10 py-4 rounded-2xl font-semibold hover:bg-gray-900 transition shadow-xl">
            SGet Your Free Tax Screener →
        </a>
    </div>
</section> --}}
<!-- ================= FOOTER ================= -->


</div>

<!-- ================= ALPINE LOGIC ================= -->
<script>
function app() {
    return {
        mobile:false,
        openAssessment:false,
        income:50000,
        rate:10,
        currency:'USD',
        currencySymbol:'$',
        plans:[
            {name:'Starter',price:9,desc:'Core tax optimization summary.'},
            {name:'Pro',price:29,desc:'Advanced deductions & export-ready report.'},
            {name:'Expert',price:79,desc:'Includes professional review option.'},
        ],
        init(){
            if(navigator.language.includes('en-GB') || navigator.language.includes('fr') || navigator.language.includes('de')){
                this.currency='EUR';
                this.currencySymbol='€';
                this.plans[0].price=9;
                this.plans[1].price=29;
                this.plans[2].price=79;
            }
        },
        calculateSavings(){
            return Math.round(this.income * (this.rate/100));
        }
    }
}
</script>

</x-guest-layout>