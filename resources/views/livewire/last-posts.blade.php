<div>
    <h2
        class="text-xl font-light tracking-tight text-paynes-gray sm:text-2xl dark:text-alice-blue"
    >
        Derniers articles
    </h2>

    <div
        class="grid-flow-col gap-4 space-y-12 pt-6 sm:grid sm:grid-cols-2 sm:grid-rows-2 sm:space-y-0"
    >
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
