<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\ValueObjects\PostIndexCollection;
use App\Domain\ValueObjects\TagId;

class GetPostsFromTagQuery
{
    public function __construct(private IPostsRepository $postsRepository)
    {
    }

    public function get(TagId $tagId): PostIndexCollection
    {
        return $this->postsRepository->getPostsFromTag($tagId);
    }
}
