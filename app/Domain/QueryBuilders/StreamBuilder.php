<?php

namespace App\Domain\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class StreamBuilder extends Builder
{
    public function onlyPublished(): self
    {
        return $this->whereNotNull('published_at');
    }

    public function finished(int $limit = 5): self
    {
        return $this
            ->where('end', '<', now())
            ->orderBy('end', 'desc')
            ->onlyPublished()
            ->limit($limit);
    }

    public function current(): self
    {
        return $this
            ->where('start', '<', now())
            ->where('end', '>', now())
            ->onlyPublished()
            ->limit(1);
    }

    public function upcoming(int $limit = 5): self
    {
        return $this
            ->where('start', '>', now())
            ->orderBy('start', 'asc')
            ->onlyPublished()
            ->limit($limit);
    }
}
