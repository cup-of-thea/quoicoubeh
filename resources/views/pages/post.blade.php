<x-layout>
    <div class="p-16 xl:py-32">
        <div class="mx-auto text-base leading-7 dark:text-powder">
            <h1 class="mt-2 text-3xl font-bold tracking-tight dark:text-powder sm:text-4xl">
                {{ $post->title }}
            </h1>
            <div class="mt-4 flex items-center justify-between w-full text-xs text-gray-500">
                <div class="flex items-center gap-x-2">
                    <x-ri-calendar-schedule-line class="h-4 w-4" />
                    <time datetime="{{ $post->date->format('Y-m-d') }}">
                        {{ $post->date->isoFormat('LL') }}
                    </time>
                    <div class="w-2"></div>
                    <x-ri-time-line class="h-4 w-4" />
                    <span>{{ $post->reading->getReadingTime() }}</span>
                    <div class="w-2"></div>
                    <livewire:like-post-action :postId="$post->id" />
                </div>

            </div>
            <div class="h-4"></div>
            <hr>
            <div class="h-2"></div>
            <div>
                @if($post->category || $tags->isNotEmpty())
                    <ul role="list" class="gap-2 flex flex-wrap">
                        @if($post->category)
                            <li>
                                <a href="/categories/{{ $post->category->slug }}">
                                    <x-badge :title="$post->category->title" />
                                </a>
                            </li>
                        @endif
                        @foreach($tags as $tag)
                            <li>
                                <a href="/tags/{{ $tag->slug }}">
                    <span class="inline-flex items-center rounded-md bg-murrey/10 dark:bg-powder/10 px-2 py-1 text-xs font-medium text-murrey dark:text-powder ring-1 ring-inset ring-murrey/10 dark:ring-powder/10">
                                            #{{ $tag->title }}
                                        </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>


            @if($post->description)
                <p class="mt-6 text-lg leading-8">
                    {{ $post->description }}
                </p>
            @endif

            <img src="{{ $post->getImage() }}" alt="{{ $post->getAlt() }}">

            <div class="mt-10 post-content prose max-w-none dark:text-powder/80">
                {!! $post->content !!}
            </div>
        </div>
    </div>

    <x-slot:scripts>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <script async src="https://embed.bsky.app/static/embed.js" charset="utf-8"></script>
        <script async src="https://www.threads.net/embed.js"></script>
    </x-slot>
</x-layout>
