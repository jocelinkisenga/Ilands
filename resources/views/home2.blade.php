@extends('layouts.guest')

@section('content')
<!-- ================= NAVBAR ================= -->
<header class="fixed w-full z-50 bg-black/70 backdrop-blur-xl border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between h-20">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center border border-emerald-500/30">
                    <span class="text-emerald-400 font-bold text-lg">TA</span>
                </div>
                <span class="text-white font-semibold text-lg tracking-wide">
                    Tax Advisory AI
                </span>
            </div>

            <nav class="hidden md:flex items-center gap-10 text-sm text-white/70">
                <a href="#how" class="hover:text-white transition">How It Works</a>
                <a href="#advisory" class="hover:text-white transition">Advisory</a>
                <a href="#pricing" class="hover:text-white transition">Pricing</a>
                <a href="#faq" class="hover:text-white transition">FAQ</a>
            </nav>

            <div class="hidden md:flex items-center gap-4">
                <a href="/login" class="text-white/70 hover:text-white text-sm">Login</a>
                <a href="/register"
                   class="bg-emerald-500 hover:bg-emerald-600 text-black font-semibold px-6 py-2.5 rounded-xl transition shadow-lg shadow-emerald-500/20">
                    Get Free Assessment
                </a>
            </div>

        </div>
    </div>
</header>

<div class="bg-black text-white">

<!-- ================= HERO ================= -->
<section class="pt-40 pb-28 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 via-transparent to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center relative">

        <div>
            <h1 class="text-4xl md:text-6xl font-bold leading-tight">
                Modern Tax Advisory.
                <span class="text-emerald-400">Enhanced by AI.</span>
            </h1>

            <p class="mt-6 text-lg text-white/70 leading-relaxed">
                Cross-border tax optimization for freelancers, gig workers and expats
                across the US and Europe. Built with licensed professionals and powered
                by advanced AI infrastructure.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4">
                <a href="/register"
                   class="bg-emerald-500 hover:bg-emerald-600 text-black font-semibold px-8 py-4 rounded-2xl transition shadow-xl shadow-emerald-500/20 text-center">
                    Get Your Free Tax Assessment →
                </a>

                <a href="#how"
                   class="border border-white/20 hover:border-white/40 px-8 py-4 rounded-2xl text-white/80 hover:text-white transition text-center">
                    See How It Works
                </a>
            </div>

            <div class="mt-6 text-sm text-white/50">
                Licensed Professionals • GDPR Compliant • Secure Infrastructure
            </div>
        </div>

        <div class="bg-white/5 backdrop-blur-2xl border border-white/10 rounded-3xl p-8 shadow-2xl">
            <h3 class="text-white/80 text-sm uppercase tracking-widest mb-6">Sample Optimization Summary</h3>
            <div class="space-y-4 text-sm">
                <div class="flex justify-between">
                    <span>Estimated Deduction Increase</span>
                    <span class="text-emerald-400 font-bold">$4,820</span>
                </div>
                <div class="flex justify-between">
                    <span>Cross-border adjustment</span>
                    <span class="text-emerald-400 font-bold">Optimized</span>
                </div>
                <div class="flex justify-between">
                    <span>Compliance Risk Score</span>
                    <span class="text-emerald-400 font-bold">Low</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ================= TRUST STRIP ================= -->
<section class="py-16 border-t border-b border-white/5 bg-white/5">
    <div class="max-w-6xl mx-auto px-6 text-center text-white/60 text-sm tracking-wide">
        Built with IRS Enrolled Agents (US) • EU-Certified Tax Advisors • GDPR Compliant
    </div>
</section>

<!-- ================= BENEFITS ================= -->
<section class="py-28">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-16">Professional Advisory. Intelligent Execution.</h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">Save More</h3>
                <p class="text-white/70">
                    Identify deductions specific to freelancers, remote workers and expats
                    often missed by generic software.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">Save Time</h3>
                <p class="text-white/70">
                    Receive a structured tax optimization summary in minutes,
                    not days.
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl hover:border-emerald-400/40 transition">
                <h3 class="text-xl font-semibold mb-4 text-emerald-400">Stay Compliant</h3>
                <p class="text-white/70">
                    Region-aware insights aligned with US and EU regulatory frameworks.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section id="how" class="py-28 bg-white/5">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-16">How It Works</h2>

        <div class="grid md:grid-cols-3 gap-12 text-left">

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">01</div>
                <h3 class="font-semibold text-lg mb-3">Smart Assessment</h3>
                <p class="text-white/70">Answer adaptive questions based on your income type and residency.</p>
            </div>

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">02</div>
                <h3 class="font-semibold text-lg mb-3">AI Optimization Engine</h3>
                <p class="text-white/70">Our AI analyzes deduction patterns and cross-border scenarios.</p>
            </div>

            <div>
                <div class="text-emerald-400 text-3xl font-bold mb-4">03</div>
                <h3 class="font-semibold text-lg mb-3">Professional Summary</h3>
                <p class="text-white/70">Download your structured advisory summary or share with your accountant.</p>
            </div>

        </div>
    </div>
</section>

<!-- ================= PRICING ================= -->
<section id="pricing" class="py-28">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-16">Transparent Pricing</h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white/5 border border-white/10 rounded-3xl p-8">
                <h3 class="text-xl font-semibold mb-4">Starter</h3>
                <p class="text-3xl font-bold mb-6">$9</p>
                <p class="text-white/70 mb-8">Core tax optimization summary.</p>
                <a href="/register" class="block bg-white/10 hover:bg-white/20 rounded-xl py-3 transition">Choose Plan</a>
            </div>

            <div class="bg-emerald-500 text-black rounded-3xl p-8 shadow-xl">
                <h3 class="text-xl font-semibold mb-4">Pro</h3>
                <p class="text-3xl font-bold mb-6">$29</p>
                <p class="mb-8">Advanced deductions + export-ready advisory report.</p>
                <a href="/register" class="block bg-black text-white rounded-xl py-3">Choose Plan</a>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-3xl p-8">
                <h3 class="text-xl font-semibold mb-4">Expert</h3>
                <p class="text-3xl font-bold mb-6">$79</p>
                <p class="text-white/70 mb-8">Includes professional review option.</p>
                <a href="/register" class="block bg-white/10 hover:bg-white/20 rounded-xl py-3 transition">Choose Plan</a>
            </div>

        </div>
    </div>
</section>

<!-- ================= FINAL CTA ================= -->
<section class="py-24 bg-gradient-to-r from-emerald-500 to-emerald-600 text-black text-center">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-6">
            Rebuilding Tax Advisory for the AI Era.
        </h2>
        <a href="/register"
           class="bg-black text-white px-10 py-4 rounded-2xl font-semibold hover:bg-gray-900 transition shadow-xl">
            Start Your Free Assessment →
        </a>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="py-12 border-t border-white/10 text-center text-white/50 text-sm">
    <div class="max-w-6xl mx-auto px-6">
        © {{ date('Y') }} Tax Advisory AI. All rights reserved.
        <div class="mt-4">
            Our platform provides AI-assisted tax optimization insights developed in collaboration
            with licensed professionals. For formal representation, consult a licensed advisor in your jurisdiction.
        </div>
    </div>
</footer>

</div>
@endsection