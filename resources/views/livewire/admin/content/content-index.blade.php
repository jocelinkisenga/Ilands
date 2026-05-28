<div class="space-y-6">

    <div class="flex items-center justify-between">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Content Management
        </h1>

        <a
            href="{{ route('admin.content.create') }}"
            class="px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white"
        >
            Create Content
        </a>

    </div>

    <div class="grid gap-6">

        @foreach($contents as $content)

            <div class="p-6 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">

                <div class="flex items-center justify-between">

                    <div>

                        <div class="flex items-center gap-3 mb-2">

                            <span class="px-2 py-1 text-xs rounded-full bg-blue-500/10 text-blue-500">
                                {{ strtoupper($content->type) }}
                            </span>

                            <span class="px-2 py-1 text-xs rounded-full bg-emerald-500/10 text-emerald-500">
                                {{ strtoupper($content->access_level) }}
                            </span>

                        </div>

                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $content->title }}
                        </h2>

                    </div>
@if($content->thumbnail)

    <img
        src="{{ asset('storage/' . $content->thumbnail) }}"
        class="w-24 h-24 rounded-xl object-cover"
    >

@endif
                    <a
                        href="{{ route('admin.content.edit', $content) }}"
                        class="text-emerald-500 hover:underline"
                    >
                        Edit
                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>