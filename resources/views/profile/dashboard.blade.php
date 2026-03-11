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

    <section class="mb-12">
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