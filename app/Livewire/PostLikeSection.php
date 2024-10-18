<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostLike;
use Livewire\Component;

class PostLikeSection extends Component
{
    public Post $post;

    public bool $isLiked;

    public int $likesCount;

    public function mount(): void
    {
        $this->isLiked = Post::isLikedByCurrentGuest($this->post->id);
        $this->likesCount = $this->post->meta->likes_count;
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
        PostLike::create([
            'post_id' => $this->post->id,
            'ip' => request()->ip(),
        ]);
        $this->post->meta()->increment('likes_count');
        $this->isLiked = true;
        $this->likesCount++;
    }

    public function unlike(): void
    {
        PostLike::query()
            ->where('post_id', $this->post->id)
            ->where('ip', request()->ip())
            ->delete();
        $this->post->meta()->decrement('likes_count');
        $this->isLiked = false;
        $this->likesCount--;
    }
}
