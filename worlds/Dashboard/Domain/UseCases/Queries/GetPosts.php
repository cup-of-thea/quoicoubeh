<?php

namespace Worlds\Dashboard\Domain\UseCases\Queries;

use Illuminate\Support\Collection;
use Worlds\Dashboard\Domain\Adapters\Repositories\IPostsRepository;
use Worlds\Dashboard\Domain\ValueObjects\Pagination;

readonly class GetPosts
{
    public function __construct(
        private IPostsRepository $postsRepository
    ) {
    }

    public function get(Pagination $pagination = new Pagination): Collection
    {
        return $this->postsRepository->getPosts($pagination)->collect();
    }
}