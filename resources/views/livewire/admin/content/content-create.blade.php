<div>
<div class="max-w-4xl mx-auto">

    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-800 p-6">

        <h1 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
            Create Content
        </h1>

        <div class="space-y-6">

            <div>
                <label class="block mb-2 text-sm font-medium">
                    Title
                </label>

                <input
                    type="text"
                    wire:model="title"
                    class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800"
                >
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">
                    Type
                </label>

                <select
                    wire:model="type"
                    class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800"
                >
                    <option value="blog">Blog</option>
                    <option value="video">Video</option>
                    <option value="document">Document</option>
                    <option value="pack">Pack</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">
                    Access Level
                </label>

                <select
                    wire:model="access_level"
                    class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800"
                >
                    <option value="free">Free</option>
                    <option value="pro">Pro</option>
                    <option value="premium">Premium</option>
                </select>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">
                    Excerpt
                </label>

                <textarea
                    wire:model="excerpt"
                    rows="3"
                    class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800"
                ></textarea>
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium">
                    Content
                </label>

                <textarea
                    wire:model="content"
                    rows="10"
                    class="w-full rounded-xl border-gray-300 dark:border-gray-700 dark:bg-gray-800"
                ></textarea>
            </div>
            <div>

    <label class="block mb-2 text-sm font-medium">
        Thumbnail
    </label>

    <input
        type="file"
        wire:model="thumbnail"
        class="w-full"
    >

    @if ($thumbnail)

        <img
            src="{{ $thumbnail->temporaryUrl() }}"
            class="mt-4 h-40 rounded-xl object-cover"
        >

    @endif

</div>
<div>

    <label class="block mb-2 text-sm font-medium">
        PDF Document
    </label>

    <input
        type="file"
        wire:model="document"
        class="w-full"
    >

</div>

            <button
                wire:click="save"
                class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-medium"
            >
                Publish Content
            </button>

        </div>

    </div>

</div>
