<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

readonly class Category implements Wireable
{
    private function __construct(
        public CategoryId $id,
        public string $title,
        public string $slug,
        public int $count,
    ) {
    }

    public static function from(CategoryId $from, string $name, string $slug, int $count): Category
    {
        return new self(
            id: $from,
            title: $name,
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
    public static function fromLivewire($value): Category
    {
        return new self(
            id: CategoryId::fromLivewire($value['id']),
            title: $value['title'],
            slug: $value['slug'],
            count: $value['count'],
        );
    }
}
