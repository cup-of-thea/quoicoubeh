@props([
    "alt",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Alt de l'image
    </div>
    <div class="post-side-section-content">
        <p>
            {{ $alt }}
        </p>
    </div>
</section>
