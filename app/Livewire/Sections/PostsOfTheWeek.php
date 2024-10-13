<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostsOfTheWeek extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Post::mostRecentPostsOfTheWeek()->get();
    }
}
