<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostIndexCollection;

class GetPostsFromYearQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(int $year): PostIndexCollection
    {
        return $this->postsRepository->getPostsFromYear($year);
    }
}
