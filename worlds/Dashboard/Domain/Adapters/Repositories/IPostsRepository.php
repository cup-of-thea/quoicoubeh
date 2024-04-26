<?php

namespace Worlds\Dashboard\Domain\Adapters\Repositories;

use Worlds\Dashboard\Domain\ValueObjects\PaginatedCollection;
use Worlds\Dashboard\Domain\ValueObjects\PaginationRequest;

interface IPostsRepository
{
    public function getPosts(PaginationRequest $paginationRequest): PaginatedCollection;
}