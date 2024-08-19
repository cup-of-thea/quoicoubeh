<div class="generic-component">
    <h2 class="generic-title">Les posts de la semaine ({{ $this->posts->count() }})</h2>
    <p class="mt-6 font-light">
        {{ config("metadata.categories.posts-of-the-week") }}
    </p>
    <div class="generic-grid">
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
