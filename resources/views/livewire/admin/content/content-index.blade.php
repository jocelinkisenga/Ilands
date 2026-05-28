<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Gestion des contenus</h1>
        <a href="/admin/content/create" class="px-5 py-3 rounded-xl bg-black hover:bg-gray-800 text-white transition">
            + Ajouter un contenu
        </a>
    </div>

    <div class="flex gap-4 p-4 border border-gray-200 dark:border-gray-800 rounded-xl bg-white dark:bg-gray-900">
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Rechercher par titre..." class="flex-1 border-gray-200 rounded-lg dark:bg-gray-800">
        <select wire:model.live="filterType" class="border-gray-200 rounded-lg dark:bg-gray-800">
            <option value="">Tous types</option>
            <option value="video">Vidéo</option>
            <option value="blog">Blog</option>
        </select>
    </div>

    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 dark:bg-gray-800/50">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Contenu</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Type / Accès</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500">Statut</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-gray-500 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                @foreach($contents as $content)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition">
                    <td class="px-6 py-4 flex items-center gap-4">
                        @if($content->thumbnail)
                            <img src="{{ asset('storage/' . $content->thumbnail) }}" class="w-12 h-12 rounded-lg object-cover">
                        @endif
                        <span class="font-medium text-gray-900 dark:text-white">{{ $content->title }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="text-xs font-mono text-gray-500">{{ strtoupper($content->type) }}</span>
                            <span class="text-xs text-emerald-600 font-bold">{{ strtoupper($content->access_level) }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-[10px] uppercase font-bold rounded-full 
                            {{ $content->status === 'published' ? 'bg-black text-white' : 'bg-gray-200 text-gray-600' }}">
                            {{ $content->status }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                            <button wire:click="togglePublish({{ $content->id }})"
                                    class="text-xs font-bold px-3 py-1.5 rounded-lg border {{ $content->status === 'published' ? 'bg-white border-gray-200' : 'bg-black text-white border-black' }}">
                                {{ $content->status === 'published' ? 'Désactiver' : 'Publier' }}
                            </button>
                            <a href="admin/content/edit/ {{$content}}" class="px-3 py-1.5 text-xs text-gray-500 hover:text-black">Éditer</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4 border-t border-gray-200 dark:border-gray-800">
            {{ $contents->links() }}
        </div>
    </div>
</div>
