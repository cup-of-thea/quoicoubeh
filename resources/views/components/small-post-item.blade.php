@php
    use Ramsey\Uuid\Guid\Guid;
@endphp

@props([
    "post",
])

<article {{ $attributes->merge(["class" => "small-post"]) }}>
    <div class="w-full grow px-4 py-2">
        <div class="group relative">
            <h3
                class="small-post-title group-hover:underline dark:text-alice-blue"
            >
                <a href="/posts/{{ $post->slug }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p
                class="mt-5 line-clamp-5 text-xs text-paynes-gray dark:text-alice-blue"
            >
                {{ $post->description }}
            </p>
        </div>
    </div>
    @if ($post->episode || $post->category)
        <div class="w-full border-t"></div>
        <div
            class="flex w-full items-center gap-x-2 px-4 py-2 text-paynes-gray dark:text-alice-blue"
        >
            @if ($post->category)
                <div>
                    <a href="/categories/{{ $post->category->slug }}">
                        <x-badge :title="$post->category->title" />
                    </a>
                </div>
            @endif

            @if ($post->episode)
                <div class="w-full gap-x-2 text-xs">
                    <span>{{ $post->episode->series }}</span>
                    <span>-</span>
                    <span>Épisode {{ $post->episode->episodeNumber }}</span>
                </div>
            @endif
        </div>
    @endif

    @if ($post->review)
        <div class="w-full border-t"></div>
        <div class="w-full px-8 py-4 text-paynes-gray dark:text-alice-blue">
            <div class="w-full gap-x-2 text-xs">
                <span>Revue</span>
                <span>-</span>
                <span>{{ $post->review->authors }}</span>
            </div>
        </div>
    @endif

    <div class="w-full">
        <div class="w-full border-t"></div>
        <div class="w-full px-8 py-4 text-paynes-gray dark:text-alice-blue">
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
