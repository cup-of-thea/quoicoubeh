<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\PostId;
use App\Domain\ValueObjects\TagsCollection;

readonly class GetPostTagsQuery
{
    public function __construct(private ITaxonomiesRepository $repository)
    {
    }

    public function get(PostId $postId): TagsCollection
    {
        return $this->repository->getPostTags($postId);
    }
}
