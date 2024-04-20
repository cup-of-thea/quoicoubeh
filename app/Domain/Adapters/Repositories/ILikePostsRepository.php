<?php

namespace App\Domain\Adapters\Repositories;

use App\Domain\ValueObjects\PostId;
use Illuminate\Support\Collection;

interface ILikePostsRepository
{
    public function like(PostId $postId, ?string $ip): void;

    public function unlike(PostId $postId, ?string $ip): void;

    public function isLiked(PostId $postId, ?string $ip);

    public function likesCount(PostId $postId);

    public function getMostLikedPostIds(): Collection;
}
