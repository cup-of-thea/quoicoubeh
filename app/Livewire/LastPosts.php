<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LastPosts extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Post::mostRecentGeneralPosts()->get();
    }
}
