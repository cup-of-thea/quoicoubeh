<?php

namespace App\Livewire;

use App\Domain\UseCases\Queries\Posts\LikedPostQuery;
use App\Domain\ValueObjects\PostId;
use Livewire\Component;

class Likes extends Component
{
    public PostId $postId;
    public bool $isLiked;
    public int $likesCount;
    private LikedPostQuery $likedPostQuery;

    public function boot(LikedPostQuery $likedPostQuery): void
    {
        $this->likedPostQuery = $likedPostQuery;
    }

    public function mount(): void
    {
        $this->isLiked = $this->likedPostQuery->isLiked($this->postId);
        $this->likesCount = $this->likedPostQuery->likesCount($this->postId);
    }
}
