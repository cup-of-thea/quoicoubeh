<?php

namespace Worlds\Dashboard\Domain\ValueObjects;

use Illuminate\Support\Collection;

class PaginatedCollection
{
    public function __construct(
        public Pagination $pagination,
        public Collection $items,
    ) {
    }
}