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
                    <a href="#" 
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
                <img src="hero.jpg?auto=format&fit=crop&w=1200&q=80" alt="Platform Presentation" class="w-full h-full object-cover opacity-70 group-hover:opacity- transition duration-500">
                
    
            </div>

        </div>
    </section>

    <!-- Who it's for -->
            <section class="space-y-8">
                <h2 class="text-3xl font-bold text-center text-blue-600 dark:text-blue-400">Education-First Tax Advisory</h2>
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div class="bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-blue-500/30 rounded-2xl p-6 shadow transition-colors">
                        <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400">01</h3>
                        <h4 class="font-semibold mt-2">Assess</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            We analyze your unique tax situation, income sources, and potential deductions.
                        </p>
                    </div>
                    <div class="bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-blue-500/30 rounded-2xl p-6 shadow transition-colors">
                        <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400">02</h3>
                        <h4 class="font-semibold mt-2">Educate</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            We explain opportunities, requirements, and strategies in plain language.
                        </p>
                    </div>
                    <div class="bg-white/50 dark:bg-gray-900/50 border border-gray-200 dark:border-blue-500/30 rounded-2xl p-6 shadow transition-colors">
                        <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400">03</h3>
                        <h4 class="font-semibold mt-2">Empower</h4>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            You make informed decisions with our expert guidance and ongoing support.
                        </p>
                    </div>
                </div>
            </section>

            <section class="py-16 bg-gray-50 dark:bg-gray-900">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl">Who We Serve</h2>
    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
      We specialize in two underserved communities that need specialized tax guidance.
    </p>

    <div class="mt-12 grid gap-8 grid-cols-1 md:grid-cols-2">
      
      <!-- Gig Economy Workers Card -->
      <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 hover:scale-105 transform transition">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
          <!-- Heroicon: users -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m0-2.13a4 4 0 100-8 4 4 0 000 8zm8 0a4 4 0 100-8 4 4 0 000 8z" />
          </svg>
          Gig Economy Workers
        </h3>
        <ul class="space-y-3 text-gray-600 dark:text-gray-300 text-left">
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Uber, Lyft, DoorDash drivers
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Freelancers and contractors
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Side hustle entrepreneurs
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 dark:text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Etsy sellers and creators
          </li>
          <li class="flex items-center gap-2 font-semibold text-blue-700 dark:text-blue-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-700 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Learn about gig worker deductions
          </li>
        </ul>
      </div>

      <!-- American Expats Card -->
      <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-8 hover:scale-105 transform transition">
        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-3">
          <!-- Heroicon: globe-alt -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0v20m-8-10h16" />
          </svg>
          American Expats
        </h3>
        <ul class="space-y-3 text-gray-600 dark:text-gray-300 text-left">
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            US citizens living abroad
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Digital nomads
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            International professionals
          </li>
          <li class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 dark:text-purple-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Foreign income earners
          </li>
          <li class="flex items-center gap-2 font-semibold text-purple-700 dark:text-purple-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-700 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Learn about expat tax obligations
          </li>
        </ul>
      </div>

    </div>
  </div>
</section>



    @include("components.pricing")

    <section id="faq" class="bg-white  dark:bg-[#0B0F19] text-slate-900 dark:text-white transition-colors duration-300 py-16 sm:py-24">
  <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
    <div class="text-center">
      <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">FAQ</p>
      <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-brand-950 sm:text-4xl dark:text-blue-500">Questions people ask first</h2>
    </div>

    <div class="mt-10 divide-y divide-slate-200 rounded-2xl border border-slate-200">
      <details class="group p-5 sm:p-6" open>
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">Do you prepare and file my tax return?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">No. We're advisory and education. We show you what applies to your situation and what to do about it. You then file with tax software or a preparer of your choice. Many clients tell us it makes that step quicker and cheaper.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">What's an Enrolled Agent?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">An Enrolled Agent (EA) is a tax professional licensed by the U.S. Department of the Treasury. EAs can represent taxpayers before the IRS on any tax matter. It's the same federal authority CPAs have for IRS representation, with a focus on tax.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">Is my information safe?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">Your data travels over encrypted connections and is only used to build your report and run your account. Payments are processed by secured payment systems, so we never see or store your card number. We don't sell your information.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">Does this work if I live outside the U.S.?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">Yes. Everything is online, and expat topics like FEIE, foreign tax credits and foreign account reporting are a core part of what we cover. Premium consultations are by video, so time zones aren't a problem.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">How does the AI assistant fit in?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">It answers general tax questions quickly and points you to the right video or template. It's a first stop, not a replacement for a professional. For anything complex, it will direct you to email support or a consultation.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">Can I cancel my membership?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">Yes. You can manage or cancel your subscription from your account at any time. There are no long-term contracts.</p>
      </details>
      <details class="group p-5 sm:p-6">
        <summary class="flex items-center justify-between gap-4 text-left font-semibold text-brand-950 dark:text-blue-500">What if I'm not happy with my report?<span class="faq-icon text-2xl leading-none text-brand-600" aria-hidden="true">+</span></summary>
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">Email us and we'll make it right, either by fixing the report or issuing a refund. The details are on our Refund Policy page.</p>
      </details>
    </div>
  </div>
</section>

{{-- <section class="bg-slate-50 py-16 sm:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">What clients say</p>
      <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-brand-950 sm:text-4xl">People who finally understood their return</h2>
    </div>
    <div class="mt-12 grid gap-6 md:grid-cols-3">
      <figure class="flex flex-col rounded-2xl bg-white p-7 shadow-card ring-1 ring-slate-200">
        <div class="flex gap-0.5 text-amber-400" aria-label="5 out of 5 stars"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg></div>
        <blockquote class="mt-4 flex-1 text-slate-700">"I drove for two apps for three years and never tracked a single mile properly. The report told me exactly what to keep and how. It paid for itself."</blockquote>
        <figcaption class="mt-5 text-sm"><span class="font-semibold text-brand-950">Marcus T.</span><span class="text-slate-500"> · Rideshare driver, Atlanta</span></figcaption>
      </figure>
      <figure class="flex flex-col rounded-2xl bg-white p-7 shadow-card ring-1 ring-slate-200">
        <div class="flex gap-0.5 text-amber-400" aria-label="5 out of 5 stars"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg></div>
        <blockquote class="mt-4 flex-1 text-slate-700">"I live in Lisbon and the FEIE versus foreign tax credit question had me going in circles. The video call cleared it up in half an hour."</blockquote>
        <figcaption class="mt-5 text-sm"><span class="font-semibold text-brand-950">David R.</span><span class="text-slate-500"> · U.S. remote worker abroad</span></figcaption>
      </figure>
      <figure class="flex flex-col rounded-2xl bg-white p-7 shadow-card ring-1 ring-slate-200">
        <div class="flex gap-0.5 text-amber-400" aria-label="5 out of 5 stars"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg><svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3 6.9 7.5.7-5.7 5 1.7 7.4L12 18l-6.5 4 1.7-7.4-5.7-5L9 8.9z"/></svg></div>
        <blockquote class="mt-4 flex-1 text-slate-700">"The quarterly checklist is what I needed. I used to dread April. Now I know what to set aside each month."</blockquote>
        <figcaption class="mt-5 text-sm"><span class="font-semibold text-brand-950">Priya S.</span><span class="text-slate-500"> · Freelance designer, Austin</span></figcaption>
      </figure>
    </div>
  </div>
</section>
 --}}

</div>


</x-guest-layout>