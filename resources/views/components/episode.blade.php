<section {{ $attributes->merge(["class" => "post-side-section"]) }}>
    <div class="post-side-section-title">
        Série
    </div>
    <div class="post-side-section-content">
        {{ $episode->series->title }} - Épisode {{ $episode->episode_number }}
        @if($episode->previous())
        <a class="flex items-center underline" href="{{ route('posts.show', $episode->previous()->post) }}">
            <p class="sr-only">Épisode précédent</p>
            <x-iconoir-skip-prev />
            {{ $episode->previous()->post->title }}
        </a>
        @endif
        @if($episode->next())
            <a class="flex items-center underline" href="{{ route('posts.show', $episode->next()->post) }}">
                <p class="sr-only">Épisode suivant</p>
                <x-iconoir-skip-next />
                {{ $episode->next()->post->title }}
            </a>
        @endif
    </div>
</section>
