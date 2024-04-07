<div>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Articles</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">
                    Je poste sur mes lectures, l’inclusion et ma transidentité ☕️
                </p>
                <div class="mt-6 space-y-12 pt-6">
                    @foreach($this->posts as $post)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
