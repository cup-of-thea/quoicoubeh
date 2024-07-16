<x-layout>
    <div class="generic-component">
        <h2 class="generic-title">{{ $category->title }}</h2>

        @if (config("metadata.categories.{$category->slug}"))
            <p class="mt-6 font-light">
                {{ config("metadata.categories.{$category->slug}") }}
            </p>
        @endif

        <div class="generic-grid">
            @foreach ($posts as $post)
                <x-small-post-item :post="$post" />
            @endforeach
        </div>
    </div>
</x-layout>
