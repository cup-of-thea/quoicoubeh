<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostsOfTheWeek extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Cache::remember('posts-of-the-week', 4 * 3600, fn() => Post::mostRecentPostsOfTheWeek()->get());
    }
}
