<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class Review implements Wireable
{
    public function __construct(
        public string $authors,
    )
    {
    }

    public static function from(string $authors): Review
    {
        return new self(authors: $authors);
    }

    public function toLivewire(): array
    {
        return ['authors' => $this->authors];
    }

    public static function fromLivewire($value): Review
    {
        return new self(authors: $value['authors']);
    }
}
