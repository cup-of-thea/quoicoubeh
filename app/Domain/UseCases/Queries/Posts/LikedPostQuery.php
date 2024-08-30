<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\ValueObjects\PostId;

readonly class LikedPostQuery
{
    public function __construct(private ILikePostsRepository $repository)
    {
    }

    public function isLiked(PostId $postId): bool
    {
        return $this->repository->isLiked($postId, request()->ip());
    }

    public function likesCount(PostId $postId): int
    {
        return $this->repository->likesCount($postId);
    }
}
