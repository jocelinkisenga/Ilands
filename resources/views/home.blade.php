<x-guest-layout>

<div x-data="app()" x-init="init()" class="bg-white dark:bg-[#0B0F19] min-h-screen text-slate-900 dark:text-white transition-colors duration-300 font-sans">

    <!-- ================= HERO ================= -->
    <section class="relative pt-15 pb-15 lg:pt-15 lg:pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left Content -->
            <div class="flex flex-col space-y-8">
                <h1 class="text-5xl lg:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.1]">
                    Maximize Your Tax Deductions
                    <span class="text-blue-500 block mt-2">Without Expensive CPA.</span>
                </h1>

                <p class="text-lg lg:text-xl text-slate-600 dark:text-slate-400 max-w-xl leading-relaxed">
                    AI-Powered Tax Advisory for Gig Workers & Expats — From $9. Get personalized guidance that helps you keep more of what you earn.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <a href="{{ route('tax-screener') }}" 
                       class="inline-flex justify-center items-center bg-blue-600 hover:bg-emerald-600 text-white font-semibold px-8 py-4 rounded-xl transition duration-200 shadow-sm hover:shadow-md">
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
                
    
            </div>

        </div>
    </section>

    @include("components.pricing")

</div>


</x-guest-layout>