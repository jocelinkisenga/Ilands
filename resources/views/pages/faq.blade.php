@extends('layouts.guest')

@section('content')

<div class="bg-black text-white min-h-screen">

    <!-- HERO -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-black to-black"></div>

        <div class="relative max-w-5xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">
                Frequently Asked Questions
            </h1>
            <p class="mt-6 text-gray-400 text-lg max-w-2xl mx-auto">
                Transparency builds trust. Below are answers to the most common
                questions regarding our advisory model, credentials, and policies.
            </p>
        </div>
    </section>



    <!-- FAQ SECTION -->
    <section class="pb-24">
        <div class="max-w-4xl mx-auto px-6 space-y-6">

            <!-- 1 Credentials -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    Is Shabani a licensed tax professional?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    Yes. Shabani is a federally licensed Enrolled Agent (EA) authorized
                    by the U.S. Treasury to represent taxpayers before the IRS.
                    This credential grants unlimited representation rights for individuals
                    and businesses.
                </p>
            </div>


            <!-- 2 Security -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    How is my financial data secured?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    We apply enterprise-level security standards, encrypted document exchange,
                    limited access protocols, and secure storage practices.
                    Client data is never sold, shared, or used for marketing purposes.
                </p>
            </div>


            <!-- 3 Advisory vs Prep -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    What is the difference between tax advisory and tax preparation?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    Tax preparation focuses on filing historical returns.
                    Advisory focuses on forward-looking strategy, entity structuring,
                    optimization planning, and risk mitigation before filing season.
                    Our model prioritizes long-term tax efficiency rather than reactive compliance.
                </p>
            </div>


            <!-- 4 AI -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    How is artificial intelligence used in your advisory process?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    AI tools are used to enhance scenario modeling, detect optimization
                    opportunities, and simulate tax outcomes under different structures.
                    Final decisions and recommendations are always reviewed by a licensed professional.
                </p>
            </div>


            <!-- 5 Refund Policy -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    What is your refund or engagement policy?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    Advisory engagements involve time-based strategic analysis.
                    Once advisory services have commenced, fees are generally non-refundable.
                    If you are uncertain, we recommend beginning with a strategic consultation
                    before committing to a full engagement.
                </p>
            </div>


            <!-- 6 Who This Is For -->
            <div class="bg-white/5 backdrop-blur-xl border border-green-500/20 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-green-500 mb-4">
                    Who is this advisory service best suited for?
                </h3>
                <p class="text-gray-300 leading-relaxed">
                    Our services are designed for entrepreneurs, professionals,
                    investors, and businesses seeking proactive tax planning.
                    If you are only seeking the lowest-cost filing option,
                    traditional preparation services may be more appropriate.
                </p>
            </div>

        </div>
    </section>



    <!-- TRUST REINFORCEMENT SECTION -->
    <section class="py-20 border-t border-green-500/10 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6">
                Still Have Questions?
            </h2>

            <p class="text-gray-400 mb-8">
                Book a confidential strategic consultation and receive
                personalized clarity before making any commitment.
            </p>

            <a href="#" class="px-8 py-4 bg-green-600 hover:bg-green-500 rounded-xl font-semibold text-lg transition shadow-lg">
                Schedule Consultation
            </a>
        </div>
    </section>

</div>

@endsection