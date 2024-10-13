<?php

namespace App\Domain\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class PostBuilder extends Builder
{
    public function mostRecentGeneralPosts(): self
    {
        return $this
            ->whereDoesntHave(
            'category', fn ($query) => $query
                ->where('slug', 'decouvertes')
                ->orWhere('slug', 'les-posts-de-la-semaine')
                ->orWhere('slug', 'fictions')
        )
            ->latest('date')
            ->limit(5);
    }

    public function mostRecentDiscoveries(): self
    {
        return $this
            ->whereHas('category', fn ($query) => $query ->where('slug', 'decouvertes'))
            ->latest('date')
            ->limit(5);
    }

    public function mostRecentPostsOfTheWeek(): self
    {
        return $this
            ->whereHas('category', fn ($query) => $query ->where('slug', 'les-posts-de-la-semaine'))
            ->latest('date')
            ->limit(5);
    }

    public function fromLaetitiaSeries(): self
    {
        return $this
            ->whereHas('category', fn ($query) => $query ->where('slug', 'fictions'))
            ->whereHas('series', fn ($query) => $query ->where('slug', 'laetitia'))
            ->orderBy('date', 'asc')
            ->limit(5);
    }
}
