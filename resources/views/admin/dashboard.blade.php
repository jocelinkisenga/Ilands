@<x-app-layout>
<div class="p-4 sm:p-6 lg:p-8 space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Admin Dashboard
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Overview of your platform activity and performance
            </p>
        </div>

        <div class="flex gap-3">
            <button class="px-4 py-2 text-sm rounded-xl bg-black text-white dark:bg-white dark:text-black">
                Export
            </button>
            <button class="px-4 py-2 text-sm rounded-xl border border-gray-300 dark:border-white/20 text-gray-700 dark:text-white">
                Filters
            </button>
        </div>

    </div>

    {{-- STATS GRID --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Users --}}
        <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">
            <p class="text-sm text-gray-500 dark:text-gray-400">Users</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">1,248</p>
            <p class="text-xs text-green-500 mt-1">+12% this month</p>
        </div>

        {{-- Revenue --}}
        <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">
            <p class="text-sm text-gray-500 dark:text-gray-400">Revenue</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">$8,430</p>
            <p class="text-xs text-green-500 mt-1">+8% this month</p>
        </div>

        {{-- Content --}}
        <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">
            <p class="text-sm text-gray-500 dark:text-gray-400">Contents</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">342</p>
            <p class="text-xs text-red-500 mt-1">-2% this week</p>
        </div>

        {{-- Active Sessions --}}
        <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">
            <p class="text-sm text-gray-500 dark:text-gray-400">Active Sessions</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">87</p>
            <p class="text-xs text-green-500 mt-1">Stable</p>
        </div>

    </div>

    {{-- MAIN GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- CHART AREA --}}
        <div class="lg:col-span-2 p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">

            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                    Traffic Overview
                </h2>
                <span class="text-xs text-gray-500 dark:text-gray-400">Last 30 days</span>
            </div>

            {{-- Placeholder chart --}}
            <div class="h-64 flex items-center justify-center text-gray-400 dark:text-gray-600 border border-dashed border-gray-300 dark:border-white/10 rounded-xl">
                Chart Area (ready for Chart.js / ApexCharts)
            </div>

        </div>

        {{-- ACTIVITY --}}
        <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">

            <h2 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">
                Recent Activity
            </h2>

            <div class="space-y-4">

                <div>
                    <p class="text-sm text-gray-900 dark:text-white">New user registered</p>
                    <p class="text-xs text-gray-500">2 min ago</p>
                </div>

                <div>
                    <p class="text-sm text-gray-900 dark:text-white">New content uploaded</p>
                    <p class="text-xs text-gray-500">15 min ago</p>
                </div>

                <div>
                    <p class="text-sm text-gray-900 dark:text-white">Subscription upgraded</p>
                    <p class="text-xs text-gray-500">1 hour ago</p>
                </div>

            </div>

        </div>

    </div>

    {{-- TABLE SECTION --}}
    <div class="p-5 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-semibold text-gray-900 dark:text-white">
                Latest Users
            </h2>
            <a href="#" class="text-xs text-green-600 dark:text-green-500">View all</a>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">
                <thead class="text-left text-gray-500 dark:text-gray-400">
                    <tr>
                        <th class="py-2">Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-right">Joined</th>
                    </tr>
                </thead>

                <tbody class="text-gray-900 dark:text-white">
                    <tr class="border-t border-gray-100 dark:border-white/10">
                        <td class="py-3">John Doe</td>
                        <td>john@example.com</td>
                        <td><span class="text-green-500 text-xs">Active</span></td>
                        <td class="text-right text-gray-500 text-xs">2 days ago</td>
                    </tr>

                    <tr class="border-t border-gray-100 dark:border-white/10">
                        <td class="py-3">Sarah Lee</td>
                        <td>sarah@example.com</td>
                        <td><span class="text-green-500 text-xs">Active</span></td>
                        <td class="text-right text-gray-500 text-xs">5 days ago</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</div>
</x-app-layout>