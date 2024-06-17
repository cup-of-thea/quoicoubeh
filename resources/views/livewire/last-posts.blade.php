<div class="px-6">
    <h2
        class="text-xl tracking-tight text-rich-black md:text-2xl lg:px-0 dark:text-powder"
    >
        Articles les + récents
    </h2>

    <div
        class="grid grid-cols-2 grid-rows-8 gap-6 pt-6 md:grid-cols-4 xl:grid-cols-4"
    >
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
