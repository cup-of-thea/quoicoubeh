<div class="generic-component">
    <h2 class="generic-title">Derniers posts</h2>
    <div class="generic-grid">
        @foreach ($this->posts as $k => $post)
            <x-small-post-item :post="$post" />
        @endforeach
    </div>
</div>
