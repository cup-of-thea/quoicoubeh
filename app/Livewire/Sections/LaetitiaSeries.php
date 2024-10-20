<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LaetitiaSeries extends Component
{
    #[Computed]
    public function posts()
    {
        return Cache::remember('laetitia-series-posts', 4 * 3600, fn() => Post::fromLaetitiaSeries()->get());
    }
}
