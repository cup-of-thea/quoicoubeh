<?php

namespace Worlds\Dashboard\Domain\Adapters\Repositories;

use Illuminate\Support\Collection;
use Worlds\Dashboard\Domain\ValueObjects\Pagination;

interface IPostsRepository
{
    public function getPosts(Pagination $pagination): Collection;
}