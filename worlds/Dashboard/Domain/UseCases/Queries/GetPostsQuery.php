<?php

namespace Worlds\Dashboard\Domain\UseCases\Queries;

use Worlds\Dashboard\Domain\Adapters\Repositories\IPostsRepository;
use Worlds\Dashboard\Domain\ValueObjects\PaginatedCollection;
use Worlds\Dashboard\Domain\ValueObjects\PaginationRequest;

final readonly class GetPostsQuery
{
    public function __construct(
        private IPostsRepository $postsRepository
    ) {
    }

    public function get(PaginationRequest $paginationRequest = new PaginationRequest): PaginatedCollection
    {
        return $this->postsRepository->getPosts($paginationRequest);
    }
}