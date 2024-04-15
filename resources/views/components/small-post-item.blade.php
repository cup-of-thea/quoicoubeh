@php use Ramsey\Uuid\Guid\Guid; @endphp
@props(['post'])

<article {{ $attributes->merge(['class' => 'flex flex-col items-start justify-between bg-white dark:bg-black shadow rounded']) }}>
    <div class="px-8 py-4 w-full">
        <div class="flex flex-col w-full text-xs gap-y-2">
            <div>
                @if($post->category)
                    <a href="/categories/{{ $post->category->slug }}">
                        <x-badge :title="$post->category->title"/>
                    </a>
                @endif
            </div>
        </div>
        <div class="group relative">
            <h3 class="mt-3 font-semibold leading-6 text-paynes-gray dark:text-alice-blue group-hover:underline">
                <a href="/posts/{{ $post->slug }}">
                    <span class="absolute inset-0"></span>
                    {{ $post->title }}
                </a>
            </h3>
            <p class="mt-5 line-clamp-5 text-paynes-gray dark:text-alice-blue text-xs">
                {{ $post->description }}
            </p>
        </div>
    </div>
    @if($post->episode)
        <div class="border-t w-full"></div>
        <div class="px-8 w-full py-4 text-paynes-gray dark:text-alice-blue">
            <div class="w-full text-xs gap-x-2">
                <span>{{ $post->episode->series }}</span>
                <span> - </span>
                <span>Épisode {{ $post->episode->episodeNumber }}</span>
            </div>
        </div>
    @endif
    @if($post->review)
        <div class="border-t w-full"></div>
        <div class="px-8 w-full py-4 text-paynes-gray dark:text-alice-blue">
            <div class="w-full text-xs gap-x-2">
                <span>Revue</span>
                <span> - </span>
                <span>{{ $post->review->authors }}</span>
            </div>
        </div>
    @endif
    <div class="w-full">
        <div class="border-t w-full"></div>
        <div class="px-8 w-full py-4 text-paynes-gray dark:text-alice-blue">
            <div class="flex flex-col gap-y-2 text-xs text-gray-500">
                <div class="flex items-center gap-x-2">
                    <x-ri-calendar-schedule-line class="h-4 w-4"/>
                    <time datetime="{{ $post->date->format('Y-m-d') }}">
                        {{ $post->date->isoFormat('LL') }}
                    </time>
                </div>
                <div class="flex items-center gap-x-2">
                    <x-ri-time-line class="h-4 w-4"/>
                    <span>{{ $post->reading->getReadingTime() }}</span>
                    <x-ri-eye-line class="h-4 w-4"/>
                    <span>{{ $post->reading->getReadingCount() }}</span>
                    <livewire:likes wire:key="{{ Guid::uuid4() }}" :postId="$post->postId"/>
                </div>
            </div>
        </div>
    </div>
</article>
