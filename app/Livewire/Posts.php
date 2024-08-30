<?php

namespace App\Livewire;

use App\Domain\UseCases\Queries\Posts\GetLastPostsQuery;
use App\Domain\ValueObjects\PostIndexCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Posts extends Component
{
    private GetLastPostsQuery $lastPostsQuery;

    public function boot(GetLastPostsQuery $lastPostsQuery): void
    {
        $this->lastPostsQuery = $lastPostsQuery;
    }

    #[Computed]
    public function posts(): PostIndexCollection
    {
        return $this->lastPostsQuery->get();
    }
}
