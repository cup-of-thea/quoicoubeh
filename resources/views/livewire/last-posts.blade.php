<div>
    <h2
        class="px-6 text-xl font-light tracking-tight text-paynes-gray md:text-2xl lg:px-0 dark:text-alice-blue"
    >
        Articles les + récents
    </h2>

    <div
        class="grid gap-4 gap-y-4 px-6 pt-6 md:grid-cols-2 md:grid-rows-2 md:space-y-0 lg:grid-cols-1 lg:grid-rows-4 lg:px-0 xl:grid-cols-2 xl:grid-rows-2"
    >
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
