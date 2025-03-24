<?php

namespace App\Domain\QueryBuilders;

use App\Models\PostLike;
use Illuminate\Database\Eloquent\Builder;

class PostBuilder extends Builder
{
    public function published(): self
    {
        return $this->where('status', 'published');
    }

    public function notGuest(): self
    {
        return $this->withCount('authors')->having('authors_count', '<', 1);
    }

    public function guests(): self
    {
        return $this->withCount('authors')->having('authors_count', '>=', 1);
    }

    public function mostRecentGeneralPosts(): self
    {
        return $this
            ->published()
            ->notGuest()
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
            ->published()
            ->whereHas('category', fn($query) => $query->where('slug', 'decouvertes'))
            ->latest('date')
            ->limit(3);
    }

    public function mostRecentPostsOfTheWeek(): self
    {
        return $this
            ->published()
            ->whereHas('category', fn($query) => $query->where('slug', 'les-posts-de-la-semaine'))
            ->latest('date')
            ->limit(3);
    }

    public function fromLaetitiaSeries(): self
    {
        return $this
            ->published()
            ->whereHas('category', fn($query) => $query->where('slug', 'fictions'))
            ->whereHas('series', fn($query) => $query->where('slug', 'laetitia'))
            ->orderBy('date', 'asc')
            ->limit(3);
    }

    public function mostLikedPosts(): self
    {
        return $this
            ->published()
            ->join('post_meta', 'posts.id', '=', 'post_meta.post_id')
            ->orderBy('post_meta.likes_count', 'desc')
            ->limit(3);
    }

    public function mostReadPosts(): self
    {
        return $this
            ->published()
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

    public function fromGuests(): self
    {
        return $this
            ->published()
            ->guests()
            ->latest('date')
            ->limit(1);
    }
}
