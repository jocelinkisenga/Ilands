<div class="space-y-6">
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-2xl overflow-hidden">
       <div class="flex gap-4 mb-6">
    <select wire:model.live="filterStatus" class="rounded-lg border-gray-200 text-sm">
        <option value="">Tous les abonnements</option>
        <option value="active">Actifs</option>
        <option value="canceled">Annulés</option>
    </select>
</div>

<table class="w-full text-left">
    <tbody class="divide-y divide-gray-200">
        @foreach($users as $user)
        <tr class="hover:bg-gray-50 transition">
            <td class="px-6 py-4">
                <div class="font-bold text-gray-900">{{ $user->name }}</div>
                <div class="text-xs text-gray-400 font-mono">{{ $user->email }}</div>
            </td>
            <td class="px-6 py-4">
                <span class="text-xs font-semibold uppercase">{{ $user->role }}</span>
            </td>
            <td>
             <span class="px-2 py-1 rounded-md text-[10px] uppercase font-bold 
    {{ $user->stripe_status === 'active' ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' }}">
    {{ $user->stripe_status ?? 'Sans abonnement' }}
</span>

            </td>
            <td class="px-6 py-4 text-right">
                <div class="flex justify-end gap-3">
                    <button class="text-xs text-black font-bold hover:underline">Détails</button>
                    <button wire:confirm="Suspendre cet utilisateur ?" class="text-xs text-red-600 hover:underline">Suspendre</button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    </div>
</div>
