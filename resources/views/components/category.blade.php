@props([
    "post",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Catégorie
    </div>
    <div class="post-side-section-content">
        <a class="underline" href="/categories/{{ $post->category->slug }}">
            {{ $post->category->title }}
            ({{ $post->category->posts_count }})
        </a>
    </div>
</section>
