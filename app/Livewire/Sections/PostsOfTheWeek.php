<?php

namespace App\Livewire\Sections;

use App\Domain\UseCases\Queries\Categories\PostsOfTheWeekQuery;
use App\Domain\ValueObjects\PostIndexCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostsOfTheWeek extends Component
{
    private PostsOfTheWeekQuery $postsOfTheWeekQuery;

    public function boot(PostsOfTheWeekQuery $query): void
    {
        $this->postsOfTheWeekQuery = $query;
    }

    #[Computed]
    public function posts(): PostIndexCollection
    {
        return $this->postsOfTheWeekQuery->get();
    }
}
