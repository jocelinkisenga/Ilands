<div class="space-y-6 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Plan Management</h1>
        <a href="/admin/content/create" class="inline-flex justify-center items-center px-5 py-3 rounded-xl bg-black dark:bg-white text-white dark:text-black hover:bg-gray-800 dark:hover:bg-gray-100 text-sm font-semibold transition shadow-sm">
            + Add plan
        </a>
    </div>

    <div class="bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 rounded-2xl overflow-hidden shadow-sm transition-colors duration-200">
       
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-100 dark:border-gray-800 text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500 bg-gray-50/70 dark:bg-gray-800/40">
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Tokens</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                   
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/40 transition duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-semibold text-sm text-gray-900 dark:text-gray-100"></div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end gap-4">
                                <button class="text-xs font-bold text-gray-900 dark:text-gray-100 hover:text-primary dark:hover:text-primary hover:underline transition">edit</button>
                                <button wire:confirm="Suspendre cet utilisateur ?" class="text-xs font-bold text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 hover:underline transition">suspend</button>
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

        <div class="grid grid-cols-1 divide-y divide-gray-100 dark:divide-gray-800 md:hidden">
            
            <div class="p-5 flex flex-col gap-4 bg-white dark:bg-gray-900">
                
                <div class="flex items-start justify-between gap-2">
                    <div class="truncate">
                        <h4 class="font-bold text-base text-gray-900 dark:text-white truncate"></h4>
                        <p class="text-xs text-gray-400 dark:text-gray-500 font-mono truncate mt-0.5"></p>
                    </div>
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-2 py-0.5 rounded">
                        
                    </span>
                </div>



                <div class="flex items-center justify-end gap-3 pt-1">
                    <button class="flex-1 text-center py-2 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 text-xs font-bold text-gray-900 dark:text-gray-100 rounded-xl transition">
                        Détails
                    </button>
                    <button wire:confirm="Suspendre cet utilisateur ?" class="flex-1 text-center py-2 bg-red-50 dark:bg-red-500/10 hover:bg-red-100 dark:hover:bg-red-500/20 text-xs font-bold text-red-600 dark:text-red-400 rounded-xl transition">
                        Suspendre
                    </button>
                </div>

            </div>
            
        </div>

    </div>
</div>
