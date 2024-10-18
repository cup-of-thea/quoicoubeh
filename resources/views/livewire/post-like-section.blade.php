<div class="px-8 py-8 lg:px-16">
    <div class="mx-auto max-w-2xl text-center">
        @if ($isLiked)
            <p
                class="mx-auto max-w-xl leading-8 text-gray-600 dark:text-powder/80"
            >
                Hey, tu as liké ce post ! Merci beaucoup, ça me fait super
                plaisir 🥰
            </p>
        @else
            <p
                class="mx-auto max-w-xl leading-8 text-gray-600 dark:text-powder/80"
            >
                Merci d'avoir lu jusqu'ici, si cet article t'a plu, n'hésite pas
                à le partager et à liker 👇
            </p>
        @endif

        <div class="mt-4 flex items-center justify-center gap-x-6 text-lg">
            <div
                wire:click="toggleLike"
                class="{{ $isLiked ? "text-atomic-tangerine" : "" }} flex cursor-pointer items-center gap-x-2"
            >
                @if ($isLiked)
                    <x-ri-hearts-fill class="h-6 w-6" />
                    <p>{{ $likesCount }}</p>
                @else
                    <x-ri-hearts-line class="h-6 w-6" />
                    <p>{{ $likesCount }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
