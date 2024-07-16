<?php

namespace App\Domain\ValueObjects;

final readonly class SingleCategory
{
    private function __construct(
        public CategoryId $id,
        public string $title,
        public string $slug,
    ) {
    }

    public static function from(CategoryId $categoryId, string $title, string $slug): SingleCategory
    {
        return new self(
            id: $categoryId,
            title: $title,
            slug: $slug,
        );
    }
}
