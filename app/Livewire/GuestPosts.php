<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

class GuestPosts extends Component
{
    #[Computed]
    public function posts(): Collection
    {
        return Cache::remember('guest-posts', now()->addMonths(3), fn() => Post::fromGuests()->get());
    }
}
