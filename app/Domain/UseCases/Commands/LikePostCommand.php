<?php

namespace App\Domain\UseCases\Commands;

use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\ValueObjects\PostId;

readonly class LikePostCommand
{

    public function __construct(private ILikePostsRepository $repository)
    {
    }

    public function like(PostId $postId): void
    {
        $this->repository->like($postId, request()->ip());
    }

    public function unlike(PostId $postId): void
    {
        $this->repository->unlike($postId, request()->ip());
    }
}
