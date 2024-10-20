<?php

namespace App\Domain\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class EventBuilder extends Builder
{
    public function finished(int $limit = 5): self
    {
        return $this
            ->where('end', '<', now())
            ->orderBy('end', 'desc')
            ->limit($limit);
    }

    public function current(): self
    {
        return $this
            ->where('start', '<', now())
            ->where('end', '>', now())
            ->limit(1);
    }

    public function upcoming(int $limit = 5): self
    {
        return $this
            ->where('start', '>', now())
            ->orderBy('start', 'asc')
            ->limit($limit);
    }
}
