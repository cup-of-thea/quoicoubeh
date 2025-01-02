@props([
    "post",
])

<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Tags
    </div>
    <div class="post-side-section-content">
        <ul role="list" class="flex flex-wrap gap-2">
            @foreach ($post->tags as $tag)
                <li>
                    <a class="post-side-link" href="/tags/{{ $tag->slug }}">
                            #{{ $tag->title }}
                            ({{ $tag->posts_count }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
