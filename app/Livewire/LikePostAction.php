<?php

namespace App\Livewire;

use App\Domain\UseCases\Commands\LikePostCommand;
use App\Domain\UseCases\Queries\Posts\LikedPostQuery;
use App\Domain\ValueObjects\PostId;
use Livewire\Component;

class LikePostAction extends Component
{
    public PostId $postId;
    public bool $isLiked;
    public int $likesCount;
    private LikePostCommand $likePostCommand;
    private LikedPostQuery $likedPostQuery;

    public function boot(
        LikePostCommand $likePostCommand,
        LikedPostQuery $likedPostQuery
    ): void {
        $this->likePostCommand = $likePostCommand;
        $this->likedPostQuery = $likedPostQuery;
    }

    public function mount(): void
    {
        $this->isLiked = $this->likedPostQuery->isLiked($this->postId);
        $this->likesCount = $this->likedPostQuery->likesCount($this->postId);
    }

    public function toggleLike(): void
    {
        if ($this->isLiked) {
            $this->unlike();
        } else {
            $this->like();
        }
    }

    public function like(): void
    {
        $this->likePostCommand->like($this->postId);
        $this->isLiked = true;
        $this->likesCount++;
    }

    public function unlike(): void
    {
        $this->likePostCommand->unlike($this->postId);
        $this->isLiked = false;
        $this->likesCount--;
    }
}
