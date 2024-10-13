<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Discoveries extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Post::mostRecentDiscoveries()->get();
    }
}
