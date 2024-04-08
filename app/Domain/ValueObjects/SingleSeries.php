<?php

namespace App\Domain\ValueObjects;

class SingleSeries
{
    public function __construct(
        public SeriesId $id,
        public string $title,
        public string $slug,
    )
    {
    }

    public static function from(SeriesId $id, string $title, string $slug): SingleSeries
    {
        return new self($id, $title, $slug);
    }
}
