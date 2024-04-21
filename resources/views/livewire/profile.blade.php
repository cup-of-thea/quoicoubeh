<div class="bento text-center lg:text-left">
    <div class="relative inline-block">
        <img
            class="h-24 w-24 rounded-3xl"
            src="{{ $avatarUrl }}"
            alt="Avatar"
        />
        <div
            class="absolute -bottom-2 -right-2 flex h-10 w-10 items-center justify-center rounded-full bg-white text-lg shadow"
        >
            🖥️
        </div>
    </div>
    <div class="mt-4">
        <h2 class="mb-4 text-xl font-light text-raspberry">
            {{ $name }} · {{ $pronouns }}
        </h2>

        <ul class="text-sm">
            <li>🖥️ Développeuse .Net</li>
            <li>🎮 Streameuse affiliée Twitch</li>
            <li>📰 Autrice de contenus</li>
            <li>🌸🏳️‍⚧️ Support</li>
        </ul>
        <div class="h-6"></div>
    </div>

    <ul
        role="list"
        class="grid grid-cols-6 gap-2 md:grid-cols-4 lg:grid-cols-1"
    >
        @foreach ($links as $link)
            <li>
                <a
                    href="{{ $link["url"] }}"
                    class="group flex items-center justify-center rounded-lg border border-paynes-gray/20 bg-paynes-gray/10 p-1 px-2 hover:text-moonstone md:justify-start dark:text-alice-blue/80"
                >
                    <span class="sr-only">{{ $link["title"] }}</span>
                    <x-dynamic-component
                        component="{{ $link['icon'] }}"
                        class="h-4 w-4 lg:text-paynes-gray"
                    />
                    <p class="ml-2 hidden text-sm md:block">
                        {{ $link["name"] }}
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</div>
