<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class SeriesId implements Wireable
{
    private function __construct(public int $value) {
    }

    public static function from(int $value): SeriesId {
        return new self($value);
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->value
        ];
    }

    public static function fromLivewire($value): SeriesId
    {
        return SeriesId::from($value['id']);
    }
}
