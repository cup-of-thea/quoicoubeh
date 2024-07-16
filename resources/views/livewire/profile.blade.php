<div class="text-left">
    <div class="relative inline-block">
        <img
            class="h-32 w-32 rounded-full"
            src="{{ $avatarUrl }}"
            alt="Avatar"
        />
        <div
            class="absolute -right-2 -top-2 flex h-12 w-12 items-center justify-center rounded-full bg-white text-lg shadow"
        >
            🥰
        </div>
    </div>
    <div class="mt-4 text-sm">
        <h2 class="mb-4 text-xl">{{ $name }} · {{ $pronouns }}</h2>

        <ul class="font-light">
            <li>🖥️ Développeuse .Net</li>
            <li>🎮 Affiliée Twitch</li>
            <li>✍️ Autrice de contenus</li>
            <li>
                🌸 🏳️‍🌈 🏳️‍⚧️ Féministe Intersectionnelle & Lesbienne et fière de
                l'être
            </li>
        </ul>
        <div class="h-6"></div>
    </div>

    <ul
        role="list"
        class="grid grid-cols-6 gap-2 md:grid-cols-10 lg:grid-cols-6"
    >
        @foreach ($links as $link)
            <li>
                <a
                    href="{{ $link["url"] }}"
                    class="group flex items-center justify-center rounded-lg p-1 px-2 hover:text-sky-magenta md:justify-start dark:text-powder/80"
                >
                    <span class="sr-only">{{ $link["title"] }}</span>
                    <x-dynamic-component
                        component="{{ $link['icon'] }}"
                        class="h-5 w-5"
                    />
                </a>
            </li>
        @endforeach
    </ul>
</div>
