<header class="pointer-events-none relative z-50 flex flex-none flex-col">
    <div class="order-last mt-[calc(theme(spacing.16)-theme(spacing.3))]"></div>
    <div class="top-0 z-10 h-16 pt-6">
        <div class="top-[var(--header-top,theme(spacing.6))] w-full sm:px-8">
            <div class="mx-auto w-full max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <div class="relative flex gap-4">
                            <div class="flex flex-1"></div>
                            <div
                                class="flex flex-1 justify-end md:justify-center"
                            >
                                <div
                                    class="pointer-events-auto md:hidden"
                                    data-headlessui-state=""
                                >
                                    <button
                                        class="group flex items-center rounded-full bg-white/90 px-4 py-2 text-sm font-medium text-zinc-800 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10 dark:hover:ring-white/20"
                                        type="button"
                                        wire:click="showMenu"
                                    >
                                        Menu
                                        <x-ri-arrow-down-s-line
                                            class="h-6 w-6 text-zinc-500 dark:text-zinc-400"
                                        />
                                    </button>
                                    @if ($show)
                                        <div
                                            class="fixed inset-0 z-50 bg-zinc-800/40 backdrop-blur-sm duration-150 data-[closed]:opacity-0 data-[enter]:ease-out data-[leave]:ease-in dark:bg-black/80"
                                            wire:click="hideMenu"
                                        ></div>
                                        <div
                                            class="fixed inset-x-4 top-8 z-50 origin-top rounded-3xl bg-white p-8 ring-1 ring-zinc-900/5 duration-150 data-[closed]:scale-95 data-[closed]:opacity-0 data-[enter]:ease-out data-[leave]:ease-in dark:bg-zinc-900 dark:ring-zinc-800"
                                            id="headlessui-popover-panel-:Rrmiqja:"
                                            tabindex="-1"
                                            data-headlessui-state="open"
                                            data-open=""
                                            style="--button-width: 88.671875px"
                                        >
                                            <div
                                                class="flex flex-row-reverse items-center justify-between"
                                            >
                                                <button
                                                    aria-label="Close menu"
                                                    class="-m-1 p-1"
                                                    type="button"
                                                    wire:click="hideMenu"
                                                >
                                                    <x-ri-close-line
                                                        class="h-6 w-6 text-zinc-500 dark:text-zinc-400"
                                                    />
                                                </button>
                                                <h2
                                                    class="text-sm font-medium text-zinc-600 dark:text-zinc-400"
                                                >
                                                    Navigation
                                                </h2>
                                            </div>
                                            <nav class="mt-6">
                                                <ul
                                                    class="-my-2 divide-y divide-zinc-100 text-base text-zinc-800 dark:divide-zinc-100/5 dark:text-zinc-300"
                                                >
                                                    @foreach ($links as $link)
                                                        <li>
                                                            <a
                                                                href="{{ $link["url"] }}"
                                                                class="flex items-center gap-x-4 py-2"
                                                            >
                                                                <x-dynamic-component
                                                                    component="{{ $link['icon'] }}"
                                                                    class="h-5 w-5 shrink-0"
                                                                />
                                                                <span>
                                                                    {!! $link["title"] !!}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </nav>
                                        </div>
                                    @endif
                                </div>
                                <div
                                    hidden=""
                                    style="
                                        position: fixed;
                                        top: 1px;
                                        left: 1px;
                                        width: 1px;
                                        height: 0;
                                        padding: 0;
                                        margin: -1px;
                                        overflow: hidden;
                                        clip: rect(0, 0, 0, 0);
                                        white-space: nowrap;
                                        border-width: 0;
                                        display: none;
                                    "
                                ></div>
                                <nav
                                    class="pointer-events-auto hidden md:block"
                                >
                                    <ul
                                        class="flex rounded-full bg-white/90 px-3 text-sm font-medium text-zinc-800 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10"
                                    >
                                        @foreach ($links as $link)
                                            <li>
                                                <a
                                                    href="{{ $link["url"] }}"
                                                    class="relative flex items-center gap-x-2 px-3 py-2 font-light transition hover:text-sky-magenta dark:hover:text-rajah-orange"
                                                >
                                                    <x-dynamic-component
                                                        component="{{ $link['icon'] }}"
                                                        class="h-5 w-5 shrink-0"
                                                    />
                                                    <span>
                                                        {!! $link["title"] !!}
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            <div class="flex justify-end md:flex-1">
                                <div class="pointer-events-auto">
                                    <livewire:theme-selector />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
