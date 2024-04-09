<div class="text-center lg:text-left">
    <div class="relative inline-block">
            <img class="h-32 w-32 rounded-full shadow" src="{{ $avatarUrl }}" alt="Avatar">
            <div class="absolute shadow bottom-0 right-0 block text-lg h-10 w-10 rounded-full bg-white flex items-center justify-center">
                🖥️
            </div>
    </div>
    <div class="mt-4">
        <h2 class="text-xl font-bold text-raspberry mb-4">{{ $name }}</h2>

        <p class="text-sm">
            Je suis Thea, sans accent, mais avec beaucoup d'amour. Ici, je partage une partie de ma vie pro et perso, ce que j'aime, ce que j'ai besoin et envie de partager, ce qui m'émeut et ce qui me fait vibrer.
        </p>
        <div class="h-2"></div>

        <p class="text-sm">
            Développeuse · Affiliée Twitch · Autrice de contenus · Féministe Intersectionnelle & Lesbienne et fière de l'être 🌸
        </p>
        <div class="h-2"></div>
    </div>

    <ul role="list" class="mt-6 flex justify-center lg:justify-start gap-6 flex-wrap">
        @foreach($links as $link)
            <li>
                <a href="{{ $link['url'] }}" class="hover:text-moonstone">
                    <span class="sr-only">{{ $link['title'] }}</span>
                    <x-dynamic-component component="{{ $link['icon'] }}" class="sm:h-5 sm:w-5 h-6 w-6" />
                </a>
            </li>
        @endforeach
    </ul>


</div>
