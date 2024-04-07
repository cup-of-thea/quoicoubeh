<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class PostYear implements Wireable
{
    public function __construct(
        public int $year,
        public int $count,
    )
    {
    }

    public static function from(
        int $year,
        int $count,
    ): PostYear
    {
        return new self(
            year: $year,
            count: $count,
        );
    }

    public function toLivewire(): array
    {
        return [
            'year' => $this->year,
            'count' => $this->count,
        ];
    }

    public static function fromLivewire($value): PostYear
    {
        return new self(
            year: $value['year'],
            count: $value['count'],
        );
    }
}
