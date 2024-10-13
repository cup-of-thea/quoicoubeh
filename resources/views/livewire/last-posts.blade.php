<div class="generic-component">
    <h2 class="generic-title">Derniers articles</h2>

    <div class="mt-16 sm:mt-20">
        <div class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40">
            <div class="flex max-w-3xl flex-col space-y-16">
                @foreach ($this->posts as $k => $post)
                    <article class="grid grid-cols-4 gap-4">
                        <div class="mt-1 md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500">
                            <img class="w-32 h-32 rounded-2xl object-cover" src="{{ $post->getImage() }}" alt="{{ $post->alt }}">
                            <div class="h-3"></div>
                        </div>
                        <div class="md:col-span-3 group relative flex flex-col items-start">
                            <h2 class="text-lg font-medium tracking-tight text-zinc-800 dark:text-zinc-100">
                                <div class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl dark:bg-zinc-800/50"></div>
                                <a href="/posts/{{ $post->slug }}">
                                    <span class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                                    <span class="relative z-10">{{ $post->title }}</span>
                                </a>
                            </h2>
                            <time class="mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 z-10" datetime="{{ $post->date->format('Y-m-d') }}">
                                {{ $post->date->isoFormat('LL') }}
                            </time>
                            <p class="relative z-10 mt-2 text-base font-thin leading-relaxed text-zinc-600 dark:text-zinc-400">
                                {{ $post->description }}
                            </p>
                            <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-base font-medium text-sky-magenta">
                                Lire l'article
                                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="ml-1 h-4 w-4 stroke-current"><path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </div>
                        </div>
                    </article>
                @endforeach

            </div>
        </div>
    </div>
</div>
