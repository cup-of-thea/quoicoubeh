<?php

namespace App\Domain\UseCases\Queries\Posts;

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
