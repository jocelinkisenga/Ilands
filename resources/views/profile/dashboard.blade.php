<x-app-layout>
<div class="min-h-screen bg-slate-50 p-6 text-slate-900 transition-colors duration-300 dark:bg-slate-950 dark:text-slate-100 md:p-12">
  <div class="mx-auto max-w-6xl">
    <header class="mb-8">
      <h1 class="text-3xl font-bold tracking-tight">Welcome back!</h1>
      <p class="mt-1 text-slate-500 dark:text-slate-400">Continue your tax education journey.</p>
    </header>

    <section class="mb-12 flex flex-col items-center justify-between gap-6 rounded-2xl bg-slate-900 p-8 text-white dark:bg-slate-900/50 dark:ring-1 dark:ring-slate-800 md:flex-row">
      <div class="flex items-center gap-4">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-800">
          <svg class="h-6 w-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
        </div>
        <div>
          <h2 class="text-xl font-semibold">Unlock Full Access</h2>
          <p class="text-slate-400">Get unlimited videos, documents, and AI chat for just $9/month.</p>
        </div>
      </div>
      <button class="group flex items-center gap-2 rounded-lg bg-white px-6 py-3 font-semibold text-slate-900 transition-all hover:bg-slate-100 active:scale-95">
        Upgrade Now
        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
      </button>
    </section>

    {{-- charts --}}
    <div
    class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
        <div class="w-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Statistics
            </h3>
            <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
                Target you’ve set for each month
            </p>
        </div>

        <div class="flex items-start w-full gap-3 sm:justify-end">
            <div x-data="{ selected: 'overview' }"
                class="inline-flex w-fit items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900">

                @php
                    $options = [
                        ['value' => 'overview', 'label' => 'Overview'],
                        ['value' => 'sales', 'label' => 'Sales'],
                        ['value' => 'revenue', 'label' => 'Revenue'],
                    ];
                @endphp

                @foreach ($options as $option)
                    <button @click="selected = '{{ $option['value'] }}'"
                        :class="selected === '{{ $option['value'] }}' ?
                            'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                            'text-gray-500 dark:text-gray-400'"
                        class="px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 dark:hover:text-white">
                        {{ $option['label'] }}
                    </button>
                @endforeach
            </div>

            <div x-data="{
                init() {
                    flatpickr(this.$refs.datepicker, {
                        mode: 'range',
                        static: true,
                        monthSelectorType: 'static',
                        dateFormat: 'M j',
                        defaultDate: [new Date(Date.now() - 6 * 24 * 60 * 60 * 1000), new Date()],
                        prevArrow: '<svg class=\'stroke-current\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M15.25 6L9 12.25L15.25 18.5\' stroke=\'\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/></svg>',
                        nextArrow: '<svg class=\'stroke-current\' width=\'24\' height=\'24\' viewBox=\'0 0 24 24\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'><path d=\'M8.75 19L15 12.75L8.75 6.5\' stroke=\'\' stroke-width=\'1.5\' stroke-linecap=\'round\' stroke-linejoin=\'round\'/></svg>',
                        onReady: (selectedDates, dateStr, instance) => {
                            instance.element.value = dateStr.replace('to', '-');
                            const customClass = instance.element.getAttribute('data-class');
                            if (instance.calendarContainer) {
                                instance.calendarContainer.classList.add(customClass);
                            }
                        },
                        onChange: (selectedDates, dateStr, instance) => {
                            instance.element.value = dateStr.replace('to', '-');
                        },
                    })
                }
            }" class="relative max-w-40">
                <input x-ref="datepicker" class="h-10 w-full max-w-11 rounded-lg border border-gray-200 bg-white py-2.5 pl-[34px] pr-4 text-theme-sm font-medium text-gray-700 shadow-theme-xs focus:outline-hidden focus:ring-0 focus-visible:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 xl:max-w-fit xl:pl-11" placeholder="Select dates" data-class="flatpickr-right" readonly="readonly" />
                <div class="absolute inset-0 right-auto flex items-center pointer-events-none left-4">
                    <svg class="fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66683 1.54199C7.08104 1.54199 7.41683 1.87778 7.41683 2.29199V3.00033H12.5835V2.29199C12.5835 1.87778 12.9193 1.54199 13.3335 1.54199C13.7477 1.54199 14.0835 1.87778 14.0835 2.29199V3.00033L15.4168 3.00033C16.5214 3.00033 17.4168 3.89576 17.4168 5.00033V7.50033V15.8337C17.4168 16.9382 16.5214 17.8337 15.4168 17.8337H4.5835C3.47893 17.8337 2.5835 16.9382 2.5835 15.8337V7.50033V5.00033C2.5835 3.89576 3.47893 3.00033 4.5835 3.00033L5.91683 3.00033V2.29199C5.91683 1.87778 6.25262 1.54199 6.66683 1.54199ZM6.66683 4.50033H4.5835C4.30735 4.50033 4.0835 4.72418 4.0835 5.00033V6.75033H15.9168V5.00033C15.9168 4.72418 15.693 4.50033 15.4168 4.50033H13.3335H6.66683ZM15.9168 8.25033H4.0835V15.8337C4.0835 16.1098 4.30735 16.3337 4.5835 16.3337H15.4168C15.693 16.3337 15.9168 16.1098 15.9168 15.8337V8.25033Z" fill="" />
                    </svg>
                </div>
            </div>

        </div>
    </div>
    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="chartThree" class="-ml-4 min-w-[700px] pl-2 xl:min-w-full"></div>
    </div>
</div>


    {{-- end charts --}}

    <section class="mb-12 py-10">
      <div class="mb-6 flex items-center gap-2">
        <span class="text-xl">🎯</span>
        <h3 class="text-lg font-bold">Start Here</h3>
      </div>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="group cursor-pointer rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
          <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-500 dark:bg-red-500/10">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="text-xs font-bold tracking-wider text-slate-400 uppercase">Start Here Video</span>
          </div>
          <h4 class="mb-4 text-lg font-bold leading-tight">Whats New in 2026 (Part 2) - TurboTax Tax Tips Podcast</h4>
          <span class="text-sm text-slate-400">2 min</span>
        </div>

        <div class="group cursor-pointer rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
          <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-500 dark:bg-blue-500/10">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <span class="text-xs font-bold tracking-wider text-slate-400 uppercase">Checklist</span>
          </div>
          <h4 class="mb-4 text-lg font-bold leading-tight">Profit or Loss From Business (Sole Proprietorship)</h4>
          <span class="text-sm text-slate-400 font-medium">PDF</span>
        </div>

        <div class="group cursor-pointer rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md dark:border-slate-800 dark:bg-slate-900">
          <div class="mb-4 flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-500 dark:bg-emerald-500/10">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <span class="text-xs font-bold tracking-wider text-slate-400 uppercase">AI Assistant</span>
          </div>
          <h4 class="mb-2 text-lg font-bold">Ask this first...</h4>
          <p class="text-sm text-slate-500 dark:text-slate-400 italic">"I'm filing a W-2 return. What are the most common credits..."</p>
        </div>
      </div>
    </section>

    <section class="grid grid-cols-1 gap-6 md:grid-cols-3">
      <div class="flex flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white py-10 text-center dark:border-slate-800 dark:bg-slate-900">
        <span class="mb-1 text-4xl font-black">2/5</span>
        <span class="text-sm text-slate-500 dark:text-slate-400">Free videos used</span>
      </div>
      <div class="flex flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white py-10 text-center dark:border-slate-800 dark:bg-slate-900">
        <span class="mb-1 text-4xl font-black">4/10</span>
        <span class="text-sm text-slate-500 dark:text-slate-400">Free docs used</span>
      </div>
      <div class="flex flex-col items-center justify-center rounded-2xl border border-slate-200 bg-white py-10 text-center dark:border-slate-800 dark:bg-slate-900">
        <span class="mb-1 text-4xl font-black">3/5</span>
        <span class="text-sm text-slate-500 dark:text-slate-400">AI questions today</span>
      </div>
    </section>
  </div>
</div>
</x-app-layout>