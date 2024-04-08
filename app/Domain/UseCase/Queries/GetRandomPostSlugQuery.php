<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\IPostsRepository;

readonly class GetRandomPostSlugQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(): string
    {
        return $this->postsRepository->getRandomPostSlug();
    }
}
