<div>
    <x-pagination-controls />

    <ul role="list" class="divide-y divide-gray-100">
        @foreach ($this->posts as $post)
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-light leading-6 text-gray-900">
                            {{ $post->title }}
                        </p>
                        @if ($post->series and $post->episode)
                            <p
                                class="mt-1 truncate text-xs leading-5 text-gray-500"
                            >
                                {{ $post->series }} - Episode
                                {{ $post->episode }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">
                        {{ $post->category }} /
                        {{ $post->tags->implode(fn ($item) => "#$item", " ") }}
                    </p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        <time datetime="2023-01-23T13:23Z">
                            {{ $post->date->isoFormat("Do MMMM YYYY") }} -
                            {{ $post->views }} lecture(s)
                        </time>
                    </p>
                </div>
            </li>
        @endforeach
    </ul>

    <x-pagination-controls />
</div>
