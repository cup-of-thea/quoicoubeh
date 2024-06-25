<x-layout>
    <div class="generic-component">
        <h2 class="generic-title flex items-center gap-x-2">
            <x-ri-netflix-fill class="h-10 w-10" />
            {{ $series->title }}
        </h2>
        <div class="generic-grid">
            @foreach ($posts as $post)
                <x-small-post-item :post="$post" />
            @endforeach
        </div>
    </div>
</x-layout>
