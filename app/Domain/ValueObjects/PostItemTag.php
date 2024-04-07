<?php

namespace App\Domain\ValueObjects;

class PostItemTag
{
    private function __construct(
        public TagId $id,
        public string $title,
        public string $slug,
    ) {
    }

    public static function from(TagId $id, string $title, string $slug): PostItemTag
    {
        return new self(
            id: $id,
            title: $title,
            slug: $slug,
        );
    }

    public function toLivewire(): array
    {
        return [
            'id' => $this->id->toLivewire(),
            'title' => $this->title,
            'slug' => $this->slug,
        ];
    }
    public static function fromLivewire($value): PostItemTag
    {
        return new self(
            id: TagId::fromLivewire($value['id']),
            title: $value['title'],
            slug: $value['slug'],
        );
    }
}
