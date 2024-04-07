<?php

namespace App\Domain\ValueObjects;

use Illuminate\Support\Collection;
use Livewire\Wireable;

class PostIndexCollection extends Collection implements Wireable
{
    public function __construct(PostIndex ...$items)
    {
        parent::__construct($items);
    }

    public function toLivewire(): PostIndexCollection
    {
        return $this->map(fn(PostIndex $postIndex) => $postIndex->toLivewire());
    }

    public static function fromLivewire($value): PostIndexCollection
    {
        return new self(...collect($value)->map(fn($item) => PostIndex::fromLivewire($item)));
    }
}
