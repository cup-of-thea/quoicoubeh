<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class LaetitiaSeries extends Component
{
    #[Computed]
    public function posts()
    {
        return Post::fromLaetitiaSeries()
            ->get();
    }
}
