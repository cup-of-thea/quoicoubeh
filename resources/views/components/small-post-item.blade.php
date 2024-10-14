@props([
    "post",
])

<article class="group relative grid grid-cols-4 gap-4">
    <div
        class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl dark:bg-zinc-800/50"
    ></div>
    <div
        class="relative z-10 col-span-4 mt-1 pt-6 text-sm text-zinc-400 dark:text-zinc-500"
    >
        <x-ri-git-commit-fill
            class="absolute -left-9 -top-2.5 h-6 w-6 rotate-90 transform fill-murrey"
        />
        <div class="-mt-8 flex items-start gap-4">
            <time
                class="z-10 text-sm text-zinc-400 dark:text-zinc-500"
                datetime="{{ $post->date->format("Y-m-d") }}"
            >
                <span class="sr-only">Publié le</span>
                {{ $post->date->isoFormat("LL") }}
            </time>
            <div>
                <p>{{ $post->category->title }}</p>
                @if ($post->tags->isNotEmpty())
                    <div class="flex flex-wrap gap-4">
                        @foreach ($post->tags as $tag)
                            <p>#{{ $tag->title }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div
        class="relative z-10 col-span-4 text-sm text-zinc-400 md:col-span-1 dark:text-zinc-500"
    >
        <img
            class="h-28 w-28 rounded-2xl object-cover"
            src="{{ $post->image }}"
            alt="{{ $post->alt }}"
        />
    </div>
    <div class="col-span-4 flex flex-col items-start md:col-span-3">
        <h2
            class="text-lg font-medium tracking-tight text-zinc-800 dark:text-zinc-100"
        >
            <a href="/posts/{{ $post->slug }}">
                <span
                    class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"
                ></span>
                <span class="relative z-10">{{ $post->title }}</span>
            </a>
        </h2>
        @if ($post->episode)
            <p
                class="relative z-10 flex items-center gap-2 text-sm font-thin text-zinc-600 dark:text-zinc-400"
            >
                <x-ri-guide-line class="h-5 w-5" />
                {{ $post->episode->series->title }} - épisode
                {{ $post->episode->episode_number }}
            </p>
        @endif

        <p
            class="relative z-10 mt-2 text-base font-thin leading-relaxed text-zinc-600 dark:text-zinc-400"
        >
            {{ $post->description }}
        </p>
        <div
            aria-hidden="true"
            class="relative z-10 mt-4 flex items-center text-base font-medium text-sky-magenta"
        >
            Lire l'article
            <x-ri-arrow-right-s-line class="ml-1 h-4 w-4 fill-current" />
        </div>
    </div>
</article>
