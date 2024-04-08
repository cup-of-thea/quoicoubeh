<nav class="flex flex-1 flex-col" aria-label="Sidebar">
    <div class="cursor-pointer flex gap-x-2 items-center text-paynes-gray dark:text-alice-blue mb-2" wire:click="toggle">
        @if($show)
            <x-ri-arrow-up-s-line class="h-4 w-4"/>
        @else
            <x-ri-arrow-down-s-line class="h-4 w-4"/>
        @endif
        <x-ri-price-tag-3-line class="h-4 w-4" />
        <div class="text-xs font-semibold leading-6">
            Tags
        </div>
    </div>

    <ul role="list" class="gap-2 flex flex-wrap {{ $show ?: 'hidden' }}">
        @foreach($this->tags as $tag)
            <li>
                <a href="/tags/{{ $tag->slug }}">
                    <span class="inline-flex items-center rounded-md bg-paynes-gray/10 dark:bg-alice-blue/10 px-2 py-1 text-xs font-medium text-paynes-gray dark:text-alice-blue ring-1 ring-inset ring-paynes-gray/10 dark:ring-alice-blue/10">
                        #{{ $tag->title }} {{ $tag->count }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
