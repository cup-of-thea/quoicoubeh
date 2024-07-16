<nav class="flex flex-1 flex-col" aria-label="Sidebar">
    <div
        class="mb-2 flex cursor-pointer items-center gap-x-2 dark:text-powder"
        wire:click="toggle"
    >
        @if ($show)
            <x-ri-arrow-up-s-line class="h-4 w-4" />
        @else
            <x-ri-arrow-down-s-line class="h-4 w-4" />
        @endif
        <x-ri-folder-open-line class="h-4 w-4" />
        <div class="text-xs font-semibold leading-6">Catégories</div>
    </div>

    <ul role="list" class="{{ $show ?: "hidden" }} space-y-1">
        @foreach ($this->categories as $category)
            <li>
                <a
                    href="/categories/{{ $category->slug }}"
                    class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 hover:text-atomic-tangerine dark:text-powder"
                >
                    {{ $category->title }}
                    <span
                        class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-600 ring-1 ring-inset ring-gray-200"
                        aria-hidden="true"
                    >
                        {{ $category->count }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
