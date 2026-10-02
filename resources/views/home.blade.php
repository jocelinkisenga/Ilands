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
<section id="who" class="bg-white  dark:bg-[#0B0F19] text-slate-900 dark:text-white  py-16 sm:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-semibold uppercase tracking-wider text-brand-600">Who it's for</p>
      <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-brand-950 sm:text-4xl dark:text-blue-500">Two groups of people the big tax companies overlook</h2>
    </div>

    <div class="mt-12 grid gap-6 lg:grid-cols-2">
      <div class="rounded-2xl bg-white p-8 shadow-card ring-1 ring-slate-200">
        <h3 class="text-2xl font-bold text-brand-950">Gig workers and freelancers</h3>
        <p class="mt-2 text-slate-600">Driving for Uber or Lyft, delivering for DoorDash, freelancing on the side. You get a 1099 and a tax bill nobody warned you about.</p>
        <ul class="mt-6 space-y-3 text-slate-700">
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-600"></span>Which expenses you can actually deduct, and how to prove them</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-600"></span>How mileage tracking works and which method to pick</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-600"></span>Quarterly estimated payments, without the guesswork</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-600"></span>Self-employment tax and what to set aside from each payout</li>
        </ul>
      </div>

      <div class="rounded-2xl bg-brand-900 p-8 text-white shadow-card">
        <h3 class="text-2xl font-bold">Americans living abroad</h3>
        <p class="mt-2 text-brand-100">You still file a U.S. return from overseas, and the rules are different. FEIE, foreign tax credit, FBAR. We help you sort out which ones apply.</p>
        <ul class="mt-6 space-y-3 text-brand-50">
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-300"></span>Foreign Earned Income Exclusion vs. Foreign Tax Credit, explained</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-300"></span>Which forms you may need to file, and by when</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-300"></span>Foreign account reporting requirements, in plain language</li>
          <li class="flex gap-3"><span class="mt-1.5 h-2 w-2 flex-none rounded-full bg-brand-300"></span>Video consultations that work across time zones</li>
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
        <p class="mt-3 leading-relaxed text-slate-600 dark:text-slate-400">Your data travels over encrypted connections and is only used to build your report and run your account. Payments are processed by Stripe, so we never see or store your card number. We don't sell your information.</p>
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