<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LastPosts extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Cache::remember( 'last-posts', now()->addWeek(), fn() => Post::mostRecentGeneralPosts()->get());
    }
}
