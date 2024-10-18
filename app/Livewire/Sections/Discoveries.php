<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Discoveries extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Cache::remember('discoveries', 4 * 3600, fn() => Post::mostRecentDiscoveries()->get());
    }
}
