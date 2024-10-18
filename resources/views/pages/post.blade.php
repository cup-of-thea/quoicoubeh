<x-layout>
    <div class="px-8 py-8 lg:px-16">
        <div class="mx-auto text-base leading-7 dark:text-powder">
            <h1
                class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl dark:text-powder"
            >
                {{ $post->title }}
            </h1>
            <div
                class="relative z-10 mt-2 flex items-center gap-2 text-sm text-zinc-600"
            >
                <div class="flex items-center gap-1">
                    <x-ri-book-open-line class="h-4 w-4" />
                    {{ $post->meta->reading_count }} lecture·s
                </div>
                <div><p>·</p></div>
                <div class="flex items-center gap-1">
                    <x-ri-hourglass-line class="h-4 w-4" />
                    {{ $post->meta->reading_time }} min
                </div>
                <div><p>·</p></div>
                <div class="flex items-center gap-1">
                    <livewire:like-post-action :post="$post" />
                </div>
            </div>
            <div class="h-4"></div>
            <hr />
            <div class="h-2"></div>
            <div>
                @if ($post->category || $tags->isNotEmpty())
                    <ul role="list" class="flex flex-wrap gap-2">
                        @if ($post->category)
                            <li>
                                <a
                                    href="/categories/{{ $post->category->slug }}"
                                >
                                    <x-badge :title="$post->category->title" />
                                </a>
                            </li>
                        @endif

                        @foreach ($post->tags as $tag)
                            <li>
                                <a href="/tags/{{ $tag->slug }}">
                                    <span
                                        class="inline-flex items-center rounded-md bg-murrey/10 px-2 py-1 text-xs font-medium text-murrey ring-1 ring-inset ring-murrey/10 dark:bg-powder/10 dark:text-powder dark:ring-powder/10"
                                    >
                                        #{{ $tag->title }}
                                        ({{ $tag->posts_count }})
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if ($post->description)
                <p class="mt-6 text-lg leading-8">
                    {{ $post->description }}
                </p>
            @endif

            <img src="{{ $post->image }}" alt="{{ $post->image_alt }}" />

            <div
                class="post-content prose mt-10 max-w-none dark:text-powder/80"
            >
                {!! $post->content !!}
            </div>
        </div>
    </div>

    <livewire:post-like-section :post="$post" />

    <x-kofi />

    <x-slot:scripts>
        <script
            async
            src="https://platform.twitter.com/widgets.js"
            charset="utf-8"
        ></script>
        <script
            async
            src="https://embed.bsky.app/static/embed.js"
            charset="utf-8"
        ></script>
        <script async src="https://www.threads.net/embed.js"></script>
        <script
            type="text/javascript"
            async
            src="https://tenor.com/embed.js"
        ></script>
        <script
            async
            src="https://substack.com/embedjs/embed.js"
            charset="utf-9"
        ></script>
    </x-slot>
</x-layout>
