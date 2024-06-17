<div>
    <div class="px-6 py-16 xl:py-32">
        <h2 class="text-3xl font-bold tracking-tight dark:text-powder sm:text-4xl">Articles</h2>
        <p class="mt-2 text-lg leading-8 dark:text-powder">
            Je poste sur mes lectures, l’inclusion et ma transidentité ☕️
        </p>
        <div class="grid grid-cols-2 grid-rows-8 gap-6 pt-6 md:grid-cols-4 xl:grid-cols-4">
            @foreach($this->posts as $post)
                <x-small-post-item :post="$post"/>
            @endforeach
        </div>
    </div>
</div>
