<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class PostItemCategory implements Wireable
{
    public function __construct(
        public CategoryId $categoryId,
        public string     $title,
        public string     $slug,
    )
    {
    }

    public static function from(
        int    $category_id,
        string $category_title,
        string $category_slug): PostItemCategory
    {
        return new self(
            categoryId: CategoryId::from($category_id),
            title: $category_title,
            slug: $category_slug,
        );
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->categoryId->value,
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }

    public static function fromLivewire($value): PostItemCategory
    {
        return new self(
            categoryId: CategoryId::from($value['id']),
            title: $value['title'],
            slug: $value['slug'],
        );
    }
}
