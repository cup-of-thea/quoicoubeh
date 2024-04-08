<nav class="flex flex-1 flex-col" aria-label="Sidebar">
    <div class="cursor-pointer flex gap-x-2 items-center text-paynes-gray dark:text-alice-blue mb-2" wire:click="toggle">
        @if($show)
            <x-ri-arrow-up-s-line class="h-4 w-4"/>
        @else
            <x-ri-arrow-down-s-line class="h-4 w-4"/>
        @endif
        <x-ri-netflix-fill class="h-4 w-4"/>
        <div class="text-xs font-semibold leading-6">
            Séries
        </div>
    </div>

    <ul role="list" class="space-y-1 {{ $show ?: 'hidden' }}">
        @foreach($this->series as $series)
            <li>
                <a href="/series/{{ $series->slug }}"
                   class="text-paynes-gray dark:text-alice-blue hover:text-raspberry group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                    {{ $series->title }}
                    <span
                        class="ml-auto w-9 min-w-max whitespace-nowrap rounded-full bg-white px-2.5 py-0.5 text-center text-xs font-medium leading-5 text-gray-600 ring-1 ring-inset ring-gray-200"
                        aria-hidden="true">{{ $series->count }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>

