@props([
    "post",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Tags
    </div>
    <div class="post-side-section-content">
        <ul role="list">
            @foreach ($post->tags as $tag)
                <li>
                    <a class="underline" href="/tags/{{ $tag->slug }}">
                            #{{ $tag->title }}
                            ({{ $tag->posts_count }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
