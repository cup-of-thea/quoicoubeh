<div class="generic-component">
    <h3 class="text-xl">Streams</h3>
    <p
        class="mt-6 text-base leading-relaxed text-zinc-600 dark:text-zinc-400"
    >
        Les streams sont sur mon Twitch ! Viens me retrouver lors de mes
        prochains streams ici :
        <a
            href="{{ config("domain.streams_link") }}"
            class="text-pink-500 hover:underline"
        >
            @thea_cake
        </a>
    </p>
    <div class="h-6"></div>
    <div class="flow-root">
        <ul role="list" class="-mb-8">
            @if ($finishedStreams->count())
                <li>
                    <div class="relative pb-4 pt-8">
                        <span
                            class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200 dark:text-white dark:ring-gray-800"
                        >
                            <svg
                                class="h-1.5 w-1.5 fill-zinc-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            Streams récents
                        </span>
                    </div>
                </li>
            @endif

            @foreach ($finishedStreams as $stream)
                <li>
                    <div class="relative pb-8">
                        <span
                            class="absolute left-6 top-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                        ></span>
                        <div class="relative flex items-start space-x-6">
                            <div class="relative">
                                <img
                                    class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white dark:ring-rich-black"
                                    src="{{ $stream->stored_image }}"
                                    alt="{{ $stream->image_alt }}"
                                />
                            </div>
                            <div class="min-w-0 flex-1 opacity-50">
                                <div>
                                    <div class="text-sm">
                                        <p
                                            class="font-medium text-gray-900 dark:text-gray-100"
                                        >
                                            {{ $stream->title }}
                                        </p>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">
                                        {{ $stream->date }}
                                    </p>
                                </div>
                                @if ($stream->image_author && $stream->image_author_link)
                                    <div
                                        class="mt-2 text-sm text-gray-700 dark:text-gray-300"
                                    >
                                        Auteur·ice de l'image :
                                        <a
                                            class="text-murrey underline dark:text-pink-500"
                                            href="{{ $stream->image_author_link }}"
                                        >
                                            {{ $stream->image_author }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

            @foreach ($currentStream as $stream)
                <li>
                    <div class="relative pb-4 pt-8">
                        <a
                            href="{{ config("domain.streams_link") }}"
                            class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200 hover:bg-pink-500 hover:text-white dark:text-white dark:ring-gray-800"
                        >
                            <svg
                                class="h-1.5 w-1.5 fill-pink-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            En stream ! Viens me voir !
                        </a>
                    </div>
                </li>

                <li>
                    <div class="relative pb-8">
                        <span
                            class="absolute left-6 top-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                        ></span>
                        <div class="relative flex items-start space-x-6">
                            <div class="relative">
                                <img
                                    class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white dark:ring-rich-black"
                                    src="{{ $stream->stored_image }}"
                                    alt="{{ $stream->image_alt }}"
                                />
                            </div>
                            <div class="min-w-0 flex-1">
                                <div>
                                    <div class="text-sm">
                                        <a
                                            href="{{ config("domain.streams_link") }}"
                                            class="space-y-4 font-medium text-gray-900 hover:underline dark:text-gray-100"
                                        >
                                            {{ $stream->title }}
                                        </a>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">
                                        {{ $stream->date }}
                                    </p>
                                </div>
                                @if ($stream->image_author && $stream->image_author_link)
                                    <div
                                        class="mt-2 text-sm text-gray-700 dark:text-gray-300"
                                    >
                                        Auteur·ice de l'image :
                                        <a
                                            class="text-murrey underline dark:text-pink-500"
                                            href="{{ $stream->image_author_link }}"
                                        >
                                            {{ $stream->image_author }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach

            @if ($upcomingStreams->count())
                <li>
                    <div class="relative pb-4 pt-8">
                        <span
                            class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200 dark:text-white dark:ring-gray-800"
                        >
                            <svg
                                class="h-1.5 w-1.5 fill-zinc-500"
                                viewBox="0 0 6 6"
                                aria-hidden="true"
                            >
                                <circle cx="3" cy="3" r="3" />
                            </svg>
                            Streams prévus
                        </span>
                    </div>
                </li>
            @endif

            @foreach ($upcomingStreams as $stream)
                <li>
                    <div class="relative pb-8">
                        <span
                            class="absolute left-6 top-5 -ml-px h-full w-0.5 bg-gray-200"
                            aria-hidden="true"
                        ></span>
                        <div class="relative flex items-start space-x-6">
                            <div class="relative">
                                <img
                                    class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white dark:ring-rich-black"
                                    src="{{ $stream->stored_image }}"
                                    alt="{{ $stream->image_alt }}"
                                />
                            </div>
                            <div class="min-w-0 flex-1 opacity-50">
                                <div>
                                    <div class="text-sm">
                                        <p
                                            class="font-medium text-gray-900 dark:text-gray-100"
                                        >
                                            {{ $stream->title }}
                                        </p>
                                    </div>
                                    <p class="mt-0.5 text-sm text-gray-500">
                                        {{ $stream->date }}
                                    </p>
                                </div>
                                @if ($stream->image_author && $stream->image_author_link)
                                    <div
                                        class="mt-2 text-sm text-gray-700 dark:text-gray-300"
                                    >
                                        Auteur·ice de l'image :
                                        <a
                                            class="text-murrey underline dark:text-pink-500"
                                            href="{{ $stream->image_author_link }}"
                                        >
                                            {{ $stream->image_author }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
