<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class Series implements Wireable
{
    private function __construct(
        public SeriesId $id,
        public string   $title,
        public string   $slug,
        public int      $count,
    ) {
    }

    public static function from(SeriesId $id, string $title, string $slug, int $count): Series
    {
        return new self(
            id: $id,
            title: $title,
            slug: $slug,
            count: $count,
        );
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->id->toLivewire(),
            'title' => $this->title,
            'slug' => $this->slug,
            'count' => $this->count,
        ];
    }
    public static function fromLivewire($value): Series
    {
        return new self(
            id: SeriesId::fromLivewire($value['id']),
            title: $value['title'],
            slug: $value['slug'],
            count: $value['count'],
        );
    }
}
