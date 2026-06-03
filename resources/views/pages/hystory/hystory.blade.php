<x-app-layout>
 <div class="w-full p-4 sm:p-6 lg:p-8 bg-gray-50 dark:bg-gray-900 min-h-screen">
  <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden">

   <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white m-0">
     conversations hystory
    </h3>
   </div>

   <div class="p-0 sm:p-6">
    @if(count($chats) > 0)
    <div class="overflow-x-auto">
     <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-left align-middle">
      <thead class="bg-gray-50 dark:bg-gray-700">
       <tr>
        <th scope="col" class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider"># ID</th>
        <th scope="col" class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Title</th>
        <th scope="col" class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">last update</th>

       </tr>
       <th scope="col" class="px-6 py-3 text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>

      </tr>
     </thead>
     <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
      @foreach($chats as $chat)
      <tr class="even:bg-gray-50 dark:even:bg-gray-700/50 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
       <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
        {{ $chat->id }}
       </td>

       <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300 max-w-xs truncate">
        {{$chat->title}}
       </td>
       <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        {{ $chat->updated_at}}
       </td>
       <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
        <a href="{{ route('chat', ['chatId' => $chat->id]) }}">
         ouvrir
         </a>
         </td>
        </tr>
        @endforeach
       </tbody>
      </table>
     </div>
     @else
     <div class="m-6 sm:m-0 rounded-md bg-blue-50 dark:bg-blue-900/50 p-4 border border-blue-200 dark:border-blue-800">
      <div class="flex justify-center">
       <p class="text-sm font-medium text-blue-800 dark:text-blue-300 text-center">
        Aucun message n'a été trouvé dans l'historique.
       </p>
      </div>
     </div>
     @endif
    </div>
   </div>
  </div>
 </x-app-layout>