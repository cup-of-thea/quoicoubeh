<div class="text-left">
    <div class="relative inline-block">
        <img
            class="h-24 w-24 rounded-full"
            src="{{ $avatarUrl }}"
            alt="Avatar"
        />
        <div
            class="absolute -top-2 -right-2 flex h-10 w-10 items-center justify-center rounded-full bg-white text-lg shadow"
        >
            🎶
        </div>
    </div>
    <div class="mt-4">
        <h2 class="mb-4 text-xl text-scarlet dark:text-atomic-tangerine">
            {{ $name }} · {{ $pronouns }}
        </h2>

        <ul class="font-light">
            🖥️ Développeuse .Net · 🎮 Affiliée Twitch · ✍️ Autrice de contenus ·  🌸 🏳️‍🌈 🏳️‍⚧️ Féministe Intersectionnelle & Lesbienne et fière de l'être

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
