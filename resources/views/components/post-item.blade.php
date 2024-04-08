@props(['post'])

<article class="flex flex-col items-start justify-between bg-white dark:bg-black shadow rounded">
    <div class="px-8 py-4 w-full">
        <div class="flex items-center justify-between w-full text-xs">
            <div class="flex items-center gap-x-2 text-gray-500">
                <x-ri-calendar-schedule-line class="h-4 w-4" />
                <time datetime="{{ $post->date->format('Y-m-d') }}">
                    {{ $post->date->isoFormat('LL') }}
                </time>
                <div class="w-2"></div>
                <x-ri-time-line class="h-4 w-4" />
                <span>{{ $post->reading->getReadingTime() }}</span>
                <div class="w-2"></div>
                <x-ri-eye-line class="h-4 w-4" />
                <span>{{ $post->reading->getReadingCount() }}</span>
            </div>
            <div>
                @if($post->category)
                    <a href="/categories/{{ $post->category->slug }}">
                        <x-badge :title="$post->category->title" />
                    </a>
                @endif
            </div>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-paynes-gray dark:text-alice-blue group-hover:underline">
                <a href="/posts/{{ $post->slug }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-paynes-gray dark:text-alice-blue text-xs">
                {{ $post->description }}
            </p>
        </div>
    </div>
    @if($post->episode)
        <div class="h-2 border-t w-full"></div>
        <div class="px-8 w-full py-4 text-paynes-gray dark:text-alice-blue">
            <div class="flex items-center w-full justify-between text-sm">
                <div class="flex items-center gap-x-2">
                    <x-ri-netflix-fill class="h-4 w-4 text-raspberry" />
                    <p>{{ $post->episode->series }}</p>
                </div>
                <p>Épisode {{ $post->episode->episodeNumber }}</p>
            </div>
        </div>
    @endif
    @if($post->review)
        <div class="h-2 border-t w-full"></div>
        <div class="px-8 w-full py-4 text-paynes-gray dark:text-alice-blue">
            <div class="flex items-center w-full justify-between text-sm">
                <div class="flex items-center gap-x-2">
                    <x-ri-quill-pen-line class="h-4 w-4" />
                    <p>{{ $post->review->authors }}</p>
                </div>
                <p>Revue</p>
            </div>
        </div>
    @endif
</article>
