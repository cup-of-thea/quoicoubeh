<div class="generic-component">
    <p class="text-base leading-relaxed text-zinc-600 dark:text-zinc-400">
        Séries
    </p>
    <div class="h-4"></div>
    <nav class="flex flex-wrap gap-4" aria-label="Tabs">
        <div
            wire:click="selectShow(null)"
            class="{{ $selectedShow === null ? "bg-gray-100 text-gray-700" : "text-gray-500 hover:text-gray-700" }} flex cursor-pointer items-center rounded-md px-3 py-2 text-sm font-medium"
        >
            Derniers épisodes
        </div>
        @foreach ($this->shows as $show)
            <div
                wire:click="selectShow('{{ $show->slug }}')"
                class="{{ $selectedShow === $show->slug ? "bg-gray-100 text-gray-700" : "text-gray-500 hover:text-gray-700" }} flex cursor-pointer items-center rounded-md px-3 py-2 text-sm font-medium"
            >
                {{ $show->title }}
                <span
                    class="ml-3 hidden rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-900 md:inline-block"
                >
                    {{ $show->posts_count }}
                </span>
            </div>
        @endforeach
    </nav>
    <div class="h-16"></div>
    <div
        class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40"
    >
        <div class="flex max-w-3xl flex-col space-y-16">
            @foreach ($this->posts as $k => $post)
                <x-small-post-item :post="$post" :k="$k" />
            @endforeach
        </div>
    </div>
</div>
