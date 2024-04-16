<div>
    <div class="px-6 py-16 xl:py-32">
        <h2 class="text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">
            Tops
        </h2>

        <nav class="mt-4 flex space-x-4" aria-label="Tabs">
            @foreach($this->options as $k => $option)
                @if($selected === $k)
                    <a href="#"
                       wire:click.prevent="select('{{ $k }}')"
                       class="bg-raspberry text-alice-blue rounded-md px-3 py-2 text-sm font-medium"
                       aria-current="page">
                        {{ $option['title'] }}
                    </a>
                @else
                    <a href="#"
                       wire:click.prevent="select('{{ $k }}')"
                       class="text-paynes-gray dark:text-alice-blue hover:bg-raspberry/20 rounded-md px-3 py-2 text-sm font-medium">
                        {{ $option['title'] }}
                    </a>
                @endif
            @endforeach
        </nav>

        <div class="mt-6 space-y-12 sm:space-y-0 sm:grid sm:grid-rows-2 sm:grid-cols-2 grid-flow-col gap-4 pt-6">
            @foreach($this->posts as $k => $post)
                <x-small-post-item :post="$post"/>
            @endforeach
        </div>

    </div>
</div>
