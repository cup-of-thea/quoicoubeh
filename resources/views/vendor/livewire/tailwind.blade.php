@php
    if (! isset($scrollTo)) {
        $scrollTo = "body";
    }

    $scrollIntoViewJsSnippet =
        $scrollTo !== false
            ? <<<JS
               (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
            JS
            : "";
@endphp

<div>
    @if ($paginator->hasPages())
        <nav
            role="navigation"
            aria-label="Pagination Navigation"
            class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0"
        >
            <div class="-mt-px flex w-0 flex-1">
                @if ($paginator->onFirstPage())
                    <span
                        aria-disabled="true"
                        aria-label="{{ __("pagination.previous") }}"
                        class="inline-flex items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    >
                        <svg
                            class="mr-3 h-5 w-5 text-gray-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </span>
                @else
                    <div
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="previousPage{{ $paginator->getPageName() == "page" ? "" : "." . $paginator->getPageName() }}.after"
                        aria-label="{{ __("pagination.previous") }}"
                        class="inline-flex cursor-pointer items-center border-t-2 border-transparent pr-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    >
                        <svg
                            class="mr-3 h-5 w-5 text-gray-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M18 10a.75.75 0 0 1-.75.75H4.66l2.1 1.95a.75.75 0 1 1-1.02 1.1l-3.5-3.25a.75.75 0 0 1 0-1.1l3.5-3.25a.75.75 0 1 1 1.02 1.1l-2.1 1.95h12.59A.75.75 0 0 1 18 10Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                @endif
            </div>
            <div class="hidden md:-mt-px md:flex">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span
                            class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500"
                        >
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <span
                                wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}"
                            >
                                @if ($page == $paginator->currentPage())
                                    <div
                                        aria-current="page"
                                        class="inline-flex items-center border-t-2 border-indigo-500 px-4 pt-4 text-sm font-medium text-indigo-600"
                                    >
                                        {{ $page }}
                                    </div>
                                @else
                                    <div
                                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                        class="inline-flex cursor-pointer items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                                        aria-label="{{ __("Go to page :page", ["page" => $page]) }}"
                                    >
                                        {{ $page }}
                                    </div>
                                @endif
                            </span>
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="-mt-px flex w-0 flex-1 justify-end">
                @if ($paginator->hasMorePages())
                    <div
                        aria-label="{{ __("pagination.next") }}"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="nextPage{{ $paginator->getPageName() == "page" ? "" : "." . $paginator->getPageName() }}.after"
                        class="inline-flex cursor-pointer items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    >
                        <svg
                            class="ml-3 h-5 w-5 text-gray-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                @else
                    <div
                        aria-disabled="true"
                        aria-label="{{ __("pagination.next") }}"
                        class="inline-flex items-center border-t-2 border-transparent pl-1 pt-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700"
                    >
                        <svg
                            class="ml-3 h-5 w-5 text-gray-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                            data-slot="icon"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M2 10a.75.75 0 0 1 .75-.75h12.59l-2.1-1.95a.75.75 0 1 1 1.02-1.1l3.5 3.25a.75.75 0 0 1 0 1.1l-3.5 3.25a.75.75 0 1 1-1.02-1.1l2.1-1.95H2.75A.75.75 0 0 1 2 10Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                @endif
            </div>
        </nav>
    @endif
</div>
