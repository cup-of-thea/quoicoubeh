<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostYearsCollection;

readonly class GetPostYearsQuery
{

    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(): PostYearsCollection
    {
        return $this->postsRepository->getYears();
    }
}
