<x-app-layout>
 {{-- <x-common.page-breadcrumb pageTitle="List of documents" />
 <div class="space-y-6">

 <x-common.component-card title="Analysed documents">
 <x-tables.basic-tables.basic-tables-two />
 </x-common.component-card>
 </div> --}}


 
 <div class="w-full max-w-7xl mx-auto p-4">

  <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

   <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
    <div>
     <h2 class="text-lg font-semibold text-gray-800">📂 Mes Documents Uploadés</h2>
     <p class="text-xs text-gray-500 mt-1">
      Historique centralisé de tous les fichiers partagés avec l'IA pour traitement et analyses fiscales.
     </p>
    </div>
    <span class="bg-blue-50 text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">
     {{ $documents->count() }} document(s) au total
    </span>
   </div>

   <div class="overflow-x-auto">
    <table class="w-full text-left border-collapse">
     <thead>
      <tr class="bg-gray-50/70 border-b border-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
       <th class="p-4">Nom du document</th>
       <th class="p-4">Taille</th>
       <th class="p-4">Format</th>
       <th class="p-4">Date d'importation</th>
       <th class="p-4 w-1/3">Prompt de contexte</th>
       <th class="p-4 text-center">Traitement</th>
      </tr>
     </thead>
     <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
      @forelse($documents as $doc)
      <tr class="hover:bg-gray-50/50 transition duration-150">
       <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
        <div class="flex items-center space-x-2">
         <span class="text-xl">📄</span>
         <span title="{{ $doc['name'] }}">{{ Str::limit($doc['name'], 30) }}</span>
        </div>
       </td>

       <td class="p-4 whitespace-nowrap text-xs text-gray-500">
        {{ $doc['size'] }}
       </td>

       <td class="p-4 whitespace-nowrap">
        <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs font-mono uppercase">
         {{ last(explode('/', $doc['type'])) }}
        </span>
       </td>

       <td class="p-4 whitespace-nowrap text-xs text-gray-400">
        {{ $doc['date'] }}
       </td>

       <td class="p-4 text-gray-500 italic text-xs truncate max-w-xs" title="{{ $doc['context_prompt'] }}">
        "{{ $doc['context_prompt'] ?: 'Document envoyé sans texte.' }}"
       </td>

       <td class="p-4 text-center whitespace-nowrap">
        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200">
         <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
         Indexé & Traité
        </span>
       </td>
      </tr>
      @empty
      <tr>
       <td colspan="6" class="p-12 text-center text-gray-400">
        <div class="text-4xl mb-3">
         📁
        </div>
        <p class="text-sm font-medium text-gray-600">
         Votre bibliothèque est vide
        </p>
        <p class="text-xs text-gray-400 mt-1">
         Les documents que vous soumettez dans l'onglet Chat s'ajouteront ici automatiquement.
        </p>
       </td>
      </tr>
      @endforelse
     </tbody>
    </table>
   </div>
  </div>
 </div>

</x-app-layout>