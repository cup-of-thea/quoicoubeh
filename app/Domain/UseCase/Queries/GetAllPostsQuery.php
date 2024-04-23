<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\IPostsRepository;

class GetAllPostsQuery
{
    public function __construct(private readonly IPostsRepository $postsRepository)
    {
        //
    }

    public function execute()
    {
        return $this->postsRepository->all();
    }
}