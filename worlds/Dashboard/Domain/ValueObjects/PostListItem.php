<?php

namespace Worlds\Dashboard\Domain\ValueObjects;

use Carbon\Carbon;
use Illuminate\Support\Collection;

readonly class PostListItem
{
    public function __construct(
        public int $id,
        public string $title,
        public Carbon $date,
        public string $category,
        public Collection $tags,
        public int $views,
        public ?string $series = null,
        public ?int $episode = null,
    ) {
    }

    public static function from($post): self
    {
        return new self(
            id: $post->id,
            title: $post->title,
            date: Carbon::parse($post->date),
            category: $post->category,
            tags: $post->tags ? collect($post->tags) : collect(),
            views: $post->views ?? 0,
            series: $post->series,
            episode: $post->episode,
        );
    }
}