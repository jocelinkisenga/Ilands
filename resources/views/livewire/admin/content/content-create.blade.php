<div class="w-full max-w-4xl mx-auto px-4 sm:px-6 py-8">

    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 p-6 sm:p-8 transition-colors duration-200">

        <div class="mb-8 border-b border-gray-100 dark:border-gray-800 pb-5">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Create Content
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Remplissez les informations ci-dessous pour publier un nouveau contenu.</p>
        </div>

        <div class="space-y-6">

            <!-- Titre -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                    Title
                </label>
                <input
                    type="text"
                    wire:model="title"
                    placeholder="Ex: How to ..."
                    class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors placeholder-gray-400 dark:placeholder-gray-500 px-5 py-3"
                >
            </div>

            <!-- Grille pour Type et Niveau d'accès (Côte à côte sur PC, empilés sur mobile) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Type
                    </label>
                    <select
                        wire:model="type"
                        class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 px-5 py-3 dark:text-gray-100 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors"
                    >
                        <option value="blog">Blog</option>
                        <option value="video">Video</option>
                        <option value="document">Document</option>
                        <option value="pack">Pack</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Access Level
                    </label>
                    <select
                        wire:model="access_level"
                        class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors px-5 py-3"
                    >
                        <option value="free">Free</option>
                        <option value="pro">Pro</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
            </div>

            <!-- Excerpt -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                    Excerpt
                </label>
                <textarea
                    wire:model="excerpt"
                    rows="3"
                    placeholder="Un bref résumé du contenu..."
                    class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors placeholder-gray-400 dark:placeholder-gray-500 resize-none"
                ></textarea>
            </div>

            <!-- Contenu principal -->
            <div>
                <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                    Content
                </label>
                <textarea
                    wire:model="content"
                    rows="8"
                    placeholder="Rédigez votre contenu détaillé ici..."
                    class="w-full rounded-xl border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-colors placeholder-gray-400 dark:placeholder-gray-500"
                ></textarea>
            </div>

            <!-- Grille pour les Fichiers -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 dark:bg-gray-800/40 p-5 rounded-xl border border-gray-100 dark:border-gray-800">
                
                <!-- Thumbnail -->
                <div>
                    <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
                        Thumbnail (Image)
                    </label>
                    <input
                        type="file"
                        wire:model="thumbnail"
                        accept="image/*"
                        class="block w-full text-sm text-gray-500 dark:text-gray-400
                            file:mr-4 file:py-2.5 file:px-4
                            file:rounded-xl file:border-0
                            file:text-sm file:font-bold file:tracking-wide
                            file:bg-emerald-50 file:text-emerald-700
                            hover:file:bg-emerald-100
                            dark:file:bg-emerald-500/10 dark:file:text-emerald-400 dark:hover:file:bg-emerald-500/20
                            transition cursor-pointer"
                    >
                    @if ($thumbnail)
                        <div class="mt-4 relative rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-sm inline-block">
                            <img src="{{ $thumbnail->temporaryUrl() }}" class="h-32 w-auto object-cover">
                        </div>
                    @endif
                </div>

                <!-- PDF Document -->
<div>
    @if($type === 'document')
        <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
            PDF Document
        </label>
        <input
            type="file"
            wire:model="document"
            accept=".pdf"
            class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:tracking-wide file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 transition cursor-pointer"
        >
        @error('document') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror

    @elseif($type === 'video')
        <label class="block mb-2 text-sm font-semibold text-gray-700 dark:text-gray-300">
            Video File (MP4, AVI)
        </label>
        <input
            type="file"
            wire:model="video"
            accept="video/*"
            class="block w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:tracking-wide file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition cursor-pointer"
        >
        <p class="text-xs text-gray-400 mt-2">Taille maximale : 50 Mo.</p>
        @error('video') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        
        <div wire:loading wire:target="video" class="text-sm text-blue-500 mt-2">
            Upload en cours, veuillez patienter...
        </div>
    @else
        <div class="text-sm text-gray-500 dark:text-gray-400 italic py-2">
            Aucun fichier additionnel requis pour ce type de contenu.
        </div>
    @endif
</div>
            </div>

            <!-- Actions (Bouton aligné à droite sur PC, pleine largeur sur Mobile) -->
            <div class="pt-6 mt-6 border-t border-gray-100 dark:border-gray-800 flex justify-end">
                <button
                    wire:click="save"
                    class="w-full sm:w-auto px-8 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 dark:bg-emerald-500 dark:hover:bg-emerald-400 text-white dark:text-gray-900 font-bold tracking-wide shadow-sm transition transform active:scale-95"
                >
                    Publish Content
                </button>
            </div>

        </div>
    </div>
</div>
