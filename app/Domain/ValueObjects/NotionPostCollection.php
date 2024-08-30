<?php

namespace App\Domain\ValueObjects;

use App\Domain\ValueObjects\Notion\NotionPost;
use Illuminate\Support\Collection;

final readonly class NotionPostCollection
{
    /** @var Collection<NotionPost> $posts */
    public function __construct(public Collection $posts)
    {
    }

    public function categories(): Collection
    {
        return dd($this->posts);
    }
}