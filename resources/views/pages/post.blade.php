<x-layout>
    <div class="px-6 py-32 lg:px-8">
        <div class="mx-auto max-w-3xl text-base leading-7 text-paynes-gray dark:text-alice-blue">
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">
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
                    <span class="inline-flex items-center rounded-md bg-paynes-gray/10 dark:bg-alice-blue/10 px-2 py-1 text-xs font-medium text-paynes-gray dark:text-alice-blue ring-1 ring-inset ring-paynes-gray/10 dark:ring-alice-blue/10">
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
            <div class="mt-10 post-content">
                {!! $post->content !!}
            </div>
        </div>
    </div>

</x-layout>
