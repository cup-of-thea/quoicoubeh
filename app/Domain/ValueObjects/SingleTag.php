<?php

namespace App\Domain\ValueObjects;

class SingleTag
{
    private function __construct(
        public TagId $id,
        public string $title,
        public string $slug,
    ) {
    }

    public static function from(TagId $id, string $title, string $slug): SingleTag
    {
        return new self($id, $title, $slug,);
    }
}
