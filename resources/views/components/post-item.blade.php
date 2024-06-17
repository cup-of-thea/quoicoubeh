@php
    use Ramsey\Uuid\Guid\Guid;
@endphp

@props([
    "post",
])

<article {{ $attributes->merge(["class" => "small-post"]) }}>
    <div class="w-full px-8 py-4">
        <div
            class="flex w-full flex-col gap-y-2 text-xs sm:flex-row sm:items-center sm:justify-between sm:gap-y-0"
        >
            <div class="hidden items-center gap-x-2 text-gray-500 sm:flex">
                <div class="flex items-center gap-x-2">
                    <x-ri-calendar-schedule-line class="h-4 w-4" />
                    <time datetime="{{ $post->date->format("Y-m-d") }}">
                        {{ $post->date->isoFormat("LL") }}
                    </time>
                    <x-ri-time-line class="h-4 w-4" />
                    <span>{{ $post->reading->getReadingTime() }}</span>
                    <x-ri-eye-line class="h-4 w-4" />
                    <span>{{ $post->reading->getReadingCount() }}</span>
                    <livewire:likes wire:ignore :postId="$post->postId" />
                </div>
            </div>
        </div>
        <div class="group relative">
            <h3
                class="small-post-title group-hover:underline sm:text-lg dark:text-powder"
            >
                <a href="/posts/{{ $post->slug }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p
                class="mt-5 line-clamp-5 text-xs text-murrey sm:line-clamp-3 sm:leading-6 dark:text-powder"
            >
                {{ $post->description }}
            </p>
        </div>
    </div>
    @if ($post->episode || $post->category)
        <div class="w-full border-t"></div>
        <div
            class="flex w-full items-center gap-x-2 px-8 py-4 text-murrey dark:text-powder"
        >
            @if ($post->category)
                <div>
                    <a href="/categories/{{ $post->category->slug }}">
                        <x-badge :title="$post->category->title" />
                    </a>
                </div>
            @endif

            @if ($post->episode)
                <div
                    class="hidden w-full text-xs sm:flex sm:items-center sm:justify-between sm:text-sm"
                >
                    <div class="flex items-center gap-x-2">
                        <x-ri-netflix-fill class="h-4 w-4 text-atomic-tangerine" />
                        <p>{{ $post->episode->series }}</p>
                    </div>
                    <p>Épisode {{ $post->episode->episodeNumber }}</p>
                </div>
                <div class="w-full gap-x-2 text-xs sm:hidden">
                    <span>{{ $post->episode->series }}</span>
                    <span>-</span>
                    <span>Épisode {{ $post->episode->episodeNumber }}</span>
                </div>
            @endif
        </div>
    @endif

    @if ($post->review)
        <div class="w-full border-t"></div>
        <div class="w-full px-8 py-4 text-murrey dark:text-powder">
            <div
                class="hidden w-full items-center justify-between text-sm sm:flex"
            >
                <div class="flex items-center gap-x-2">
                    <x-ri-quill-pen-line class="h-4 w-4" />
                    <p>{{ $post->review->authors }}</p>
                </div>
                <p>Revue</p>
            </div>
            <div class="w-full gap-x-2 text-xs sm:hidden">
                <span>Revue</span>
                <span>-</span>
                <span>{{ $post->review->authors }}</span>
            </div>
        </div>
    @endif

    <div class="w-full sm:hidden">
        <div class="w-full border-t"></div>
        <div class="w-full px-8 py-4 text-murrey dark:text-powder">
            <div class="flex flex-col gap-y-2 text-xs text-gray-500">
                <div class="flex items-center gap-x-2">
                    <x-ri-calendar-schedule-line class="h-4 w-4" />
                    <time datetime="{{ $post->date->format("Y-m-d") }}">
                        {{ $post->date->isoFormat("LL") }}
                    </time>
                </div>
                <div class="flex items-center gap-x-2">
                    <x-ri-time-line class="h-4 w-4" />
                    <span>{{ $post->reading->getReadingTime() }}</span>
                    <x-ri-eye-line class="h-4 w-4" />
                    <span>{{ $post->reading->getReadingCount() }}</span>
                    <livewire:likes
                        wire:key="{{ Guid::uuid4() }}"
                        :postId="$post->postId"
                    />
                </div>
            </div>
        </div>
    </div>
</article>
