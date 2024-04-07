@props(['post'])

<article class="flex flex-col items-start justify-between bg-white shadow rounded p-4">
    <div class="flex items-center justify-between w-full text-xs">
        <div class="flex items-center gap-x-2">
            <x-ri-calendar-schedule-line class="h-4 w-4" />
            <time datetime="{{ $post->date->format('Y-m-d') }}" class="text-gray-500">
                {{ $post->date->isoFormat('LL') }}
            </time>
            <div class="w-2"></div>
            <x-ri-time-line class="h-4 w-4" />
            <span class="text-gray-500">
                                        {{ $post->reading->getReadingTime() }}
                                    </span>
            <div class="w-2"></div>
            <x-ri-eye-line class="h-4 w-4" />
            <span class="text-gray-500">
                                        {{ $post->reading->getReadingCount() }}
                                    </span>
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
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="/posts/{{ $post->slug }}">
                <span class="absolute inset-0"></span>
                {{ $post->title }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
            {{ $post->description }}
        </p>
    </div>
</article>
