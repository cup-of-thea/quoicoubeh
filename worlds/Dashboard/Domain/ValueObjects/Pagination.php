<?php

namespace Worlds\Dashboard\Domain\ValueObjects;

final readonly class Pagination
{
    public function __construct(
        public int $perPage = 25,
        public int $page = 1,
        public int $total = 0,
        public int $lastPage = 0,
    ) {
    }
}