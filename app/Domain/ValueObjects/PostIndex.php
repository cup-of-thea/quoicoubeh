<?php

namespace App\Domain\ValueObjects;

use Carbon\Carbon;
use Livewire\Wireable;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

readonly class PostIndex implements Wireable, Feedable
{
    public function __construct(
        public PostId $postId,
        public string $title,
        public string $slug,
        public ?string $description,
        public Carbon $date,
        public ?PostItemCategory $category,
        public ?Episode $episode,
        public Reading $reading,
        public ?Review $review,
        public ?string $image,
        public ?string $alt,
        public Dimensions $dimensions,
    ) {
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
            episode: Episode::fromLivewire($value['episode']),
            reading: Reading::fromLivewire($value['reading']),
            review: Review::fromLivewire($value['review']),
            image: $value['image'],
            alt: $value['alt'],
            dimensions: Dimensions::from($value['rows'], $value['cols'])
        );
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
            'image' => $this->image,
            'alt' => $this->alt,
            'dimensions' => $this->dimensions->toLivewire(),
        ];
    }

    public function getImage(): string
    {
        return $this->image
            ? str($this->image)->startsWith('/')
                ? $this->image
                : "/$this->image"
            : '/covers/trans-pride.webp';
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->postId->value)
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->date)
            ->link(route('posts.show', $this->slug))
            ->authorName('Thea Cake')
            ->category($this->category?->title)
            ->image(route('home') . $this->getImage());
    }
}
