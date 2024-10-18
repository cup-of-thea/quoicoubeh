<?php

namespace App\Domain\QueryBuilders;

use App\Models\PostLike;
use Illuminate\Database\Eloquent\Builder;

class PostBuilder extends Builder
{
    public function mostRecentGeneralPosts(): self
    {
        return $this
            ->whereDoesntHave(
                'category', fn($query) => $query
                ->where('slug', 'decouvertes')
                ->orWhere('slug', 'les-posts-de-la-semaine')
                ->orWhere('slug', 'fictions')
            )
            ->latest('date')
            ->limit(3);
    }

    public function mostRecentDiscoveries(): self
    {
        return $this
            ->whereHas('category', fn($query) => $query->where('slug', 'decouvertes'))
            ->latest('date')
            ->limit(3);
    }

    public function mostRecentPostsOfTheWeek(): self
    {
        return $this
            ->whereHas('category', fn($query) => $query->where('slug', 'les-posts-de-la-semaine'))
            ->latest('date')
            ->limit(3);
    }

    public function fromLaetitiaSeries(): self
    {
        return $this
            ->whereHas('category', fn($query) => $query->where('slug', 'fictions'))
            ->whereHas('series', fn($query) => $query->where('slug', 'laetitia'))
            ->orderBy('date', 'asc')
            ->limit(3);
    }

    public function mostLikedPosts(): self
    {
        return $this
            ->join('post_meta', 'posts.id', '=', 'post_meta.post_id')
            ->orderBy('post_meta.likes_count', 'desc')
            ->limit(3);
    }

    public function mostReadPosts(): self
    {
        return $this
            ->join('post_meta', 'posts.id', '=', 'post_meta.post_id')
            ->orderBy('post_meta.reading_count', 'desc')
            ->limit(3);
    }

    public function isLikedByCurrentGuest(int $id): bool
    {
        return PostLike::query()
            ->where('post_id', $id)
            ->where('ip', request()->ip())
            ->exists();
    }
}
