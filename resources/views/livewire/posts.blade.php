<div class="px-6 py-16 xl:py-32">
    <h2 class="generic-title">Le blog</h2>
    <p class="generic-subtitle">
        Je poste sur mes lectures, l’inclusion et ma transidentité ☕️
    </p>
    <div class="generic-grid grid-rows-10 md:grid-rows-5">
        @foreach ($this->posts as $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
