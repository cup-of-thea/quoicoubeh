<?php

namespace App\Domain\ValueObjects;

use Livewire\Wireable;

class Tag implements Wireable
{
    private function __construct(
        public TagId $id,
        public string $title,
        public string $slug,
        public int $count,
    ) {
    }

    public static function from(TagId $from, string $name, string $slug, int $count): Tag
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
    public static function fromLivewire($value): Tag
    {
        return new self(
            id: TagId::fromLivewire($value['id']),
            title: $value['title'],
            slug: $value['slug'],
            count: $value['count'],
        );
    }
}
