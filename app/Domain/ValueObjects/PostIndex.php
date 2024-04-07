<?php

namespace App\Domain\ValueObjects;

use Carbon\Carbon;
use Livewire\Wireable;

readonly class PostIndex implements Wireable
{
    public function __construct(
        public PostId $postId,
        public string $title,
        public string $slug,
        public ?string $description,
        public Carbon $date,
        public ?PostItemCategory $category,
        public Reading $reading
    ) {
    }
    public function toLivewire(): array
    {
        return [
            'id' => $this->postId->toLivewire(),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'date' => $this->date->toDateString(),
            'reading' => $this->reading->toLivewire(),
        ];
    }

    public static function fromLivewire($value): PostIndex
    {
        return new self(
            postId: PostId::from($value['id']),
            title: $value['title'],
            slug: $value['slug'],
            description: $value['description'],
            date: Carbon::parse($value['date']),
            category: PostItemCategory::fromLivewire($value['category']),
            reading: Reading::fromLivewire($value['reading']),
        );
    }
}
