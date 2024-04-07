<nav class="flex flex-1 flex-col" aria-label="Sidebar">
    <div class="flex gap-x-2 items-center text-gray-400 mb-2">
        <x-ri-price-tag-3-line class="h-4 w-4" />
        <div class="text-xs font-semibold leading-6">
            Tags
        </div>
    </div>

    <ul role="list" class="gap-2 flex flex-wrap">
        @foreach($this->tags as $tag)
            <li>
                <a href="/tags/{{ $tag->slug }}">
                    <span class="inline-flex items-center rounded-md bg-paynes-gray/10 px-2 py-1 text-xs font-medium text-paynes-gray ring-1 ring-inset ring-paynes-gray/10">
                        #{{ $tag->title }} {{ $tag->count }}
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
