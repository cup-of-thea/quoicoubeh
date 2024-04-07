<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostIndexCollection;

readonly class GetLastPostsQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(): PostIndexCollection
    {
        return $this->postsRepository->getLastPosts();
    }
}
