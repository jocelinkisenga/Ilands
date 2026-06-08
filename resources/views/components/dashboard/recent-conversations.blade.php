{{-- Recent Conversations --}}
<section class="mt-10">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                Recent Conversations
            </h3>
            <p class="text-sm text-slate-500 dark:text-slate-400">
                Continue where you left off with ILANDS AI.
            </p>
        </div>

        <button
            class="hidden md:flex items-center gap-2 text-sm font-medium text-slate-600 transition hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">
            View All
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">

        {{-- Conversation 1 --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white p-5 transition-all hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

            <div class="flex items-start justify-between">

                <div class="flex gap-4">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 dark:bg-indigo-500/10 dark:text-indigo-400">
                        🤖
                    </div>

                    <div>
                        <h4
                            class="font-semibold text-slate-900 dark:text-white">
                            Tax Optimization Strategy
                        </h4>

                        <p
                            class="mt-1 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                            Discussing deductions, credits, and filing
                            strategies for a small business owner.
                        </p>
                    </div>
                </div>

                <button
                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                    ⋮
                </button>

            </div>

            <div
                class="mt-5 flex flex-wrap items-center gap-3 text-xs text-slate-500 dark:text-slate-400">

                <span
                    class="rounded-full bg-slate-100 px-3 py-1 dark:bg-slate-800">
                    18 Messages
                </span>

                <span
                    class="rounded-full bg-green-100 px-3 py-1 text-green-700 dark:bg-green-500/10 dark:text-green-400">
                    Active
                </span>

                <span>2 hours ago</span>

            </div>

            <div class="mt-5">
                <button
                    class="flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">
                    Continue Conversation
                    <svg class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- Conversation 2 --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white p-5 transition-all hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

            <div class="flex items-start justify-between">

                <div class="flex gap-4">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400">
                        📄
                    </div>

                    <div>
                        <h4
                            class="font-semibold text-slate-900 dark:text-white">
                            W-2 Filing Questions
                        </h4>

                        <p
                            class="mt-1 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                            Review of employee income reporting and tax
                            obligations.
                        </p>
                    </div>
                </div>

                <button
                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                    ⋮
                </button>

            </div>

            <div
                class="mt-5 flex flex-wrap items-center gap-3 text-xs text-slate-500 dark:text-slate-400">

                <span
                    class="rounded-full bg-slate-100 px-3 py-1 dark:bg-slate-800">
                    7 Messages
                </span>

                <span
                    class="rounded-full bg-amber-100 px-3 py-1 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400">
                    Pending
                </span>

                <span>Yesterday</span>

            </div>

            <div class="mt-5">
                <button
                    class="flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">
                    Continue Conversation
                    <svg class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- Conversation 3 --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white p-5 transition-all hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

            <div class="flex items-start justify-between">

                <div class="flex gap-4">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600 dark:bg-emerald-500/10 dark:text-emerald-400">
                        💰
                    </div>

                    <div>
                        <h4
                            class="font-semibold text-slate-900 dark:text-white">
                            Business Expense Review
                        </h4>

                        <p
                            class="mt-1 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                            Classification of expenses and deduction
                            opportunities.
                        </p>
                    </div>
                </div>

                <button
                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                    ⋮
                </button>

            </div>

            <div
                class="mt-5 flex flex-wrap items-center gap-3 text-xs text-slate-500 dark:text-slate-400">

                <span
                    class="rounded-full bg-slate-100 px-3 py-1 dark:bg-slate-800">
                    24 Messages
                </span>

                <span
                    class="rounded-full bg-green-100 px-3 py-1 text-green-700 dark:bg-green-500/10 dark:text-green-400">
                    Completed
                </span>

                <span>3 days ago</span>

            </div>

            <div class="mt-5">
                <button
                    class="flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">
                    Continue Conversation
                    <svg class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- Conversation 4 --}}
        <div
            class="group rounded-2xl border border-slate-200 bg-white p-5 transition-all hover:-translate-y-1 hover:shadow-lg dark:border-slate-800 dark:bg-slate-900">

            <div class="flex items-start justify-between">

                <div class="flex gap-4">
                    <div
                        class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-purple-50 text-purple-600 dark:bg-purple-500/10 dark:text-purple-400">
                        📊
                    </div>

                    <div>
                        <h4
                            class="font-semibold text-slate-900 dark:text-white">
                            Quarterly Tax Planning
                        </h4>

                        <p
                            class="mt-1 line-clamp-2 text-sm text-slate-500 dark:text-slate-400">
                            Forecasting quarterly payments and cash-flow
                            planning.
                        </p>
                    </div>
                </div>

                <button
                    class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-700 dark:hover:bg-slate-800 dark:hover:text-white">
                    ⋮
                </button>

            </div>

            <div
                class="mt-5 flex flex-wrap items-center gap-3 text-xs text-slate-500 dark:text-slate-400">

                <span
                    class="rounded-full bg-slate-100 px-3 py-1 dark:bg-slate-800">
                    11 Messages
                </span>

                <span
                    class="rounded-full bg-blue-100 px-3 py-1 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400">
                    New Report
                </span>

                <span>1 week ago</span>

            </div>

            <div class="mt-5">
                <button
                    class="flex items-center gap-2 text-sm font-semibold text-indigo-600 transition hover:text-indigo-700 dark:text-indigo-400">
                    Continue Conversation
                    <svg class="h-4 w-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

        </div>

    </div>

    {{-- Mobile View All --}}
    <div class="mt-5 md:hidden">
        <button
            class="w-full rounded-xl border border-slate-200 bg-white py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
            View All Conversations
        </button>
    </div>
</section>