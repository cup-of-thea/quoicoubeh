<?php

namespace App\Domain\ValueObjects;

use Carbon\Carbon;

readonly class StreamMoment
{
    public function __construct(
        public ?string $cover,
        public ?string $coverReference,
        public string $icon,
        public string $title,
        public string $category,
        public string $color,
        public Carbon $date,
        public Featuring $featuring
    ) {
    }

    public static function from(
        ?string $cover,
        ?string $coverReference,
        string $icon,
        string $title,
        string $category,
        string $color,
        Carbon $date,
        Featuring $featuring
    ): StreamMoment {
        return new self(
            cover: $cover,
            coverReference: $coverReference,
            icon: $icon,
            title: $title,
            category: $category,
            color: $color,
            date: $date,
            featuring: $featuring
        );
    }
}