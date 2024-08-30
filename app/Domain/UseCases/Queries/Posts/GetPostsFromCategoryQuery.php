<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\CategoryId;
use App\Domain\ValueObjects\PostIndexCollection;

class GetPostsFromCategoryQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(CategoryId $categoryId): PostIndexCollection
    {
        return $this->postsRepository->getPostsFromCategory($categoryId);
    }
}
