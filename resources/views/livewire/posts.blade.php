<div>
    <div class="px-6 py-16 xl:py-32">
        <h2 class="text-3xl font-bold tracking-tight text-paynes-gray dark:text-alice-blue sm:text-4xl">Articles</h2>
        <p class="mt-2 text-lg leading-8 text-paynes-gray dark:text-alice-blue">
            Je poste sur mes lectures, l’inclusion et ma transidentité ☕️
        </p>
        <div class="mt-6 space-y-12 pt-6">
            @foreach($this->posts as $post)
                <x-post-item :post="$post"/>
            @endforeach
        </div>
    </div>
</div>
