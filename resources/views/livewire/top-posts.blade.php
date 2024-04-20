<div>
    <h2
        class="text-3xl font-bold tracking-tight text-paynes-gray md:text-4xl dark:text-alice-blue"
    >
        Tops
    </h2>

    <nav class="mt-4 flex space-x-4" aria-label="Tabs">
        @foreach ($this->options as $k => $option)
            @if ($selected === $k)
                <a
                    href="#"
                    wire:click.prevent="select('{{ $k }}')"
                    class="rounded-md bg-raspberry px-3 py-2 text-sm font-medium text-alice-blue"
                    aria-current="page"
                >
                    {{ $option["title"] }}
                </a>
            @else
                <a
                    href="#"
                    wire:click.prevent="select('{{ $k }}')"
                    class="rounded-md px-3 py-2 text-sm font-medium text-paynes-gray hover:bg-raspberry/20 dark:text-alice-blue"
                >
                    {{ $option["title"] }}
                </a>
            @endif
        @endforeach
    </nav>

    <div
        class="grid grid-flow-col grid-cols-1 grid-rows-4 gap-4 gap-y-4 px-6 pt-6 md:grid-cols-2 md:grid-rows-2 md:space-y-0 lg:grid-cols-1 lg:grid-rows-4 xl:grid-cols-2 xl:grid-rows-2"
    >
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
