<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class Episode implements Wireable
{
    public function __construct(
        public string $series,
        public string $slug,
        public int $episodeNumber,
    )
    {
    }

    public static function from(int $episodeNumber, $seriesTitle, $seriesSlug): Episode
    {
        return new self(
            series: $seriesTitle,
            slug: $seriesSlug,
            episodeNumber: $episodeNumber,
        );
    }

    public function toLivewire(): array
    {
        return [
            'series' => $this->series,
            'slug' => $this->slug,
            'episodeNumber' => $this->episodeNumber,
        ];
    }

    public static function fromLivewire($value): Episode
    {
        return new self(
            series: $value['series'],
            slug: $value['slug'],
            episodeNumber: $value['episodeNumber'],
        );
    }
}
