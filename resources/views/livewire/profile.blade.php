<div class="generic-component">
    <div class="relative flex items-center gap-x-4">
        <img
            class="h-16 w-16 rounded-full"
            src="{{ $avatarUrl }}"
            alt="Avatar"
        />
        <h2 class="text-2xl">{{ $name }} · {{ $pronouns }}</h2>
    </div>
    <p class="mt-6 text-base font-thin leading-relaxed text-zinc-600 dark:text-zinc-400">
        {!! $bio !!}
    </p>

    <ul
        role="list"
        class="flex gap-4 mt-6 flex-wrap"
    >
        @foreach ($links as $link)
            <li>
                <a
                    href="{{ $link["url"] }}"
                    class="group flex items-center justify-center rounded-lg hover:text-sky-magenta md:justify-start dark:text-powder/80"
                >
                    <span class="sr-only">{{ $link["title"] }}</span>
                    <x-dynamic-component
                        component="{{ $link['icon'] }}"
                        class="h-6 w-6 fill-zinc-500 transition group-hover:fill-zinc-600 dark:fill-zinc-400 dark:group-hover:fill-zinc-300"
                    />
                </a>
            </li>
        @endforeach
    </ul>
</div>
