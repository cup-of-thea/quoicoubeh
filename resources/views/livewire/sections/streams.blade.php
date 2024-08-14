@php
    use App\Domain\ValueObjects\Member;
    use App\Domain\ValueObjects\StreamMoment;
@endphp

<div class="px-6 py-16 xl:py-32">
    <h2 class="generic-title">Planning des streams</h2>
    <p class="generic-subtitle">Viens voir mes prochains streams 📺</p>
    <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
        @php
            /** @var StreamMoment $stream */
        @endphp

        @foreach ($this->streams as $stream)
            <article
                class="@if($stream->date->isPast()) opacity-50 @endif relative isolate flex flex-col gap-8 rounded-2xl lg:flex-row"
            >
                @if ($stream->date->isToday())
                    <div
                        class="absolute -top-5 left-4 z-50 rounded-full bg-scarlet px-3 py-1.5 text-powder"
                    >
                        Aujourd'hui !
                    </div>
                @endif

                <div
                    class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0"
                >
                    <img
                        src="{{ $stream->cover }}"
                        alt=""
                        class="@if($stream->date->isToday()) border border-4 border-scarlet @endif absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover"
                    />
                </div>
                <div>
                    <div class="flex items-center gap-x-4 text-xs">
                        <time
                            datetime="{{ $stream->date->format("Y-m-d H:i") }}"
                            class="text-gray-500 dark:text-gray-100"
                        >
                            {{ $stream->date->format("l j F H:i") }}
                        </time>
                        <p
                            class="relative z-10 flex items-center rounded-full bg-paynes-gray/5 px-3 py-1.5 font-medium text-gray-600 dark:text-gray-300"
                        >
                            <img
                                src="{{ $stream->icon }}"
                                alt=""
                                class="mr-2 h-8 w-8"
                            />
                            {{ $stream->category }}
                        </p>
                    </div>
                    <div class="group relative max-w-xl">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 dark:text-powder"
                        >
                            {{ $stream->title }}
                        </h3>
                        <p class="v mt-5 text-sm leading-6 text-gray-600">
                            @if ($stream->coverReference)
                                <a
                                    href="{{ $stream->coverReference }}"
                                    class="underline"
                                >
                                    Image :
                                    {{ str($stream->coverReference)->after("/")->after("/")->after("/")->before("/art") }}
                                </a>
                            @endif
                        </p>
                    </div>
                    @if ($stream->featuring->count())
                        <div
                            class="mt-6 flex flex-wrap gap-4 border-t border-gray-900/10 pt-6 dark:border-gray-300/10"
                        >
                            @php
                                /** @var Member $member */
                            @endphp

                            @foreach ($stream->featuring as $member)
                                <div class="relative flex items-center gap-x-4">
                                    <img
                                        src="{{ $member->avatar }}"
                                        alt=""
                                        class="h-10 w-10 rounded-full bg-gray-50"
                                    />
                                    <div class="text-sm leading-6">
                                        <p
                                            class="font-semibold text-gray-900 dark:text-powder"
                                        >
                                            <a href="{{ $member->link }}">
                                                <span
                                                    class="absolute inset-0"
                                                ></span>
                                                {{ $member->name }}
                                            </a>
                                        </p>
                                        <p
                                            class="text-gray-600 dark:text-gray-300"
                                        >
                                            {{ str($member->link)->afterLast("/")->prepend("@") }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </article>
        @endforeach

        <!-- More posts... -->
    </div>
</div>
