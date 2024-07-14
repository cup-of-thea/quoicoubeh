<?php

namespace App\Domain\ValueObjects;

use Carbon\Carbon;

readonly final class SinglePost
{
    public function __construct(
        public PostId $id,
        public string $title,
        public string $slug,
        public ?string $description,
        public string $content,
        public Carbon $date,
        public Reading $reading,
        public ?PostItemCategory $category,
        public ?string $image,
        public ?string $alt,
    )
    {
    }

    public function getImage(): string
    {
        return $this->image
            ? str($this->image)->startsWith('/')
                ? $this->image
                : "/$this->image"
            : '/covers/trans-pride.webp';
    }

    public function getAlt(): string
    {
        return $this->alt ?: 'couverture de base du site où on voir le drapeau trans';
    }
}
