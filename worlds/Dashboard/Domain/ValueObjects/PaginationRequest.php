<?php

namespace Worlds\Dashboard\Domain\ValueObjects;

use Livewire\Wireable;

readonly class PaginationRequest implements Wireable
{
    public function __construct(
        public int $perPage = 25,
        public int $page = 1,
    ) {
    }

    public static function fromLivewire($value): self
    {
        return new self(
            perPage: $value['perPage'],
            page: $value['page'],
        );
    }


    public function toLivewire(): array
    {
        return [
            'perPage' => $this->perPage,
            'page' => $this->page,
        ];
    }
}