@props([
    "post",
])

<article class="grid grid-cols-4 gap-4 group relative">
    <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl dark:bg-zinc-800/50"></div>
    <div class="col-span-4 mt-1 pt-6 relative z-10 text-sm text-zinc-400 dark:text-zinc-500">
        <x-ri-git-commit-fill class="w-6 h-6 fill-murrey absolute -left-9 -top-2.5 transform rotate-90" />
        <div class="flex items-center -mt-8 gap-4">
            <time class="text-sm text-zinc-400 dark:text-zinc-500 z-10" datetime="{{ $post->date->format('Y-m-d') }}">
                <span class="sr-only">Publié le</span> {{ $post->date->isoFormat('LL') }}
            </time>
            <p>{{ $post->category->title }}</p>
            @foreach($post->tags as $tag)
                <p>#{{ $tag->title }}</p>
            @endforeach
        </div>
    </div>
    <div class="col-span-4 md:col-span-1 relative z-10 text-sm text-zinc-400 dark:text-zinc-500">
        <img class="w-28 h-28 rounded-2xl object-cover" src="{{ $post->image }}" alt="{{ $post->alt }}">
    </div>
    <div class="col-span-4 md:col-span-3 flex flex-col items-start">
        <h2 class="text-lg font-medium tracking-tight text-zinc-800 dark:text-zinc-100">
            <a href="/posts/{{ $post->slug }}">
                <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                <span class="relative z-10">{{ $post->title }}</span>
            </a>
        </h2>
        <p class="relative z-10 mt-2 text-base font-thin leading-relaxed text-zinc-600 dark:text-zinc-400">
            {{ $post->description }}
        </p>
        <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-base font-medium text-sky-magenta">
            Lire l'article
            <x-ri-arrow-right-s-line class="ml-1 h-4 w-4 fill-current" />
        </div>
    </div>
</article>

