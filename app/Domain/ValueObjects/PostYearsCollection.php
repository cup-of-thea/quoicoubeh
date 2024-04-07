<?php

namespace App\Domain\ValueObjects;

use Illuminate\Support\Collection;
use Livewire\Wireable;

class PostYearsCollection extends Collection implements Wireable
{
    public function __construct(PostYear ...$items)
    {
        parent::__construct($items);
    }

    public function toLivewire(): array
    {
        return $this->map(fn(PostYear $postYear) => $postYear->toLivewire())->toArray();
    }

    public static function fromLivewire($value): PostYearsCollection
    {
        return new self(...collect($value)->map(fn($item) => PostYear::fromLivewire($item)));
    }

}
