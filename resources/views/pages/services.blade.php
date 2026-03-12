<x-guest-layout>
<div class="bg-black text-white min-h-screen">

    <!-- HERO -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-green-600/20 via-black to-black"></div>

        <div class="relative max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold">
                Strategic Advisory Plans
            </h1>
            <p class="mt-6 text-gray-400 max-w-2xl mx-auto text-lg">
                Choose the level of tax intelligence and advisory support
                aligned with your financial complexity and growth ambition.
            </p>
        </div>
    </section>


    <!-- THREE TIER CARDS -->
{{--     <section class="pb-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">

                <!-- STARTER -->
                <div class="bg-white/5 backdrop-blur-xl border border-green-500/10 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-200">Strategic Foundation</h3>
                    <p class="text-gray-400 mt-2 text-sm">For individuals & early-stage founders</p>

                    <div class="mt-8 text-4xl font-bold text-green-500">
                        $XXX
                        <span class="text-sm text-gray-400 font-normal">/ engagement</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-gray-400 text-sm">
                        <li>• Annual tax review</li>
                        <li>• Optimization recommendations</li>
                        <li>• AI risk assessment</li>
                        <li>• Filing coordination</li>
                    </ul>

                    <a href="#" class="mt-10 block text-center py-3 border border-green-500 rounded-lg hover:bg-green-600/10 transition">
                        Get Started
                    </a>
                </div>


                <!-- GROWTH (Highlighted) -->
                <div class="bg-gradient-to-br from-green-600/20 to-black backdrop-blur-xl border border-green-500/30 rounded-2xl p-10 shadow-2xl scale-105">
                    <div class="text-center mb-4">
                        <span class="text-xs bg-green-600 px-3 py-1 rounded-full uppercase tracking-wider">
                            Most Selected
                        </span>
                    </div>

                    <h3 class="text-xl font-semibold text-green-500 text-center">
                        Growth Advisory
                    </h3>

                    <p class="text-gray-300 mt-2 text-sm text-center">
                        For scaling entrepreneurs & structured income
                    </p>

                    <div class="mt-8 text-4xl font-bold text-center">
                        $XXX
                        <span class="text-sm text-gray-400 font-normal">/ quarterly</span>
                    </div>

                    <ul class="mt-8 space-y-3 text-gray-200 text-sm">
                        <li>• Quarterly strategy sessions</li>
                        <li>• Entity structuring review</li>
                        <li>• AI tax modeling simulations</li>
                        <li>• Cash-flow tax forecasting</li>
                        <li>• IRS representation if needed</li>
                    </ul>

                    <a href="#" class="mt-10 block text-center py-3 bg-green-600 hover:bg-green-500 rounded-lg font-semibold transition">
                        Book Strategy Call
                    </a>
                </div>


                <!-- ELITE -->
                <div class="bg-white/5 backdrop-blur-xl border border-green-500/10 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-200">Elite Advisory</h3>
                    <p class="text-gray-400 mt-2 text-sm">High-net-worth & complex structures</p>

                    <div class="mt-8 text-4xl font-bold text-green-500">
                        Custom
                    </div>

                    <ul class="mt-8 space-y-3 text-gray-400 text-sm">
                        <li>• Full tax architecture design</li>
                        <li>• Multi-entity optimization</li>
                        <li>• Cross-border advisory</li>
                        <li>• Dedicated advisory access</li>
                        <li>• Advanced AI analytics integration</li>
                    </ul>

                    <a href="#" class="mt-10 block text-center py-3 border border-green-500 rounded-lg hover:bg-green-600/10 transition">
                        Request Proposal
                    </a>
                </div>

            </div>
        </div>
    </section> --}}
    @include("components.pricing")



    <!-- COMPARISON TABLE -->
    <section class="py-16 border-t border-green-500/10">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16">
                Plan Comparison
            </h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border-collapse">
                    <thead>
                        <tr class="border-b border-green-500/20 text-gray-400">
                            <th class="py-4">Features</th>
                            <th class="py-4 text-center">Foundation</th>
                            <th class="py-4 text-center">Growth</th>
                            <th class="py-4 text-center">Elite</th>
                        </tr>
                    </thead>

                    <tbody class="text-gray-300">

                        <tr class="border-b border-green-500/10">
                            <td class="py-4">Annual Tax Review</td>
                            <td class="text-center">✔</td>
                            <td class="text-center">✔</td>
                            <td class="text-center">✔</td>
                        </tr>

                        <tr class="border-b border-green-500/10">
                            <td class="py-4">Quarterly Strategy Sessions</td>
                            <td class="text-center">—</td>
                            <td class="text-center">✔</td>
                            <td class="text-center">✔</td>
                        </tr>

                        <tr class="border-b border-green-500/10">
                            <td class="py-4">AI Tax Modeling</td>
                            <td class="text-center">Basic</td>
                            <td class="text-center">Advanced</td>
                            <td class="text-center">Enterprise</td>
                        </tr>

                        <tr class="border-b border-green-500/10">
                            <td class="py-4">IRS Representation</td>
                            <td class="text-center">Limited</td>
                            <td class="text-center">Included</td>
                            <td class="text-center">Priority</td>
                        </tr>

                        <tr>
                            <td class="py-4">Dedicated Advisory Access</td>
                            <td class="text-center">—</td>
                            <td class="text-center">—</td>
                            <td class="text-center">✔</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>



    <!-- CTA -->
    <section class="py-24 border-t border-green-500/10 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6">
                Not Sure Which Plan Fits?
            </h2>

            <p class="text-gray-400 mb-8">
                Schedule a strategic assessment and receive a personalized recommendation.
            </p>

            <a href="#" class="px-8 py-4 bg-green-600 hover:bg-green-500 rounded-xl font-semibold text-lg transition shadow-lg">
                Start Assessment
            </a>
        </div>
    </section>

</div>
</x-guest-layout>