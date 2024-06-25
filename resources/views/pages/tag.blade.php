<x-layout>
    <div class="generic-component">
        <h2 class="generic-title">#{{ $tag->title }}</h2>
        <div class="generic-grid">
            @foreach ($posts as $post)
                <x-small-post-item :post="$post" />
            @endforeach
        </div>
    </div>
</x-layout>
