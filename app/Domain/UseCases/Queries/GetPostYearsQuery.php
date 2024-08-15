<?php

namespace App\Domain\UseCases\Queries;

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
