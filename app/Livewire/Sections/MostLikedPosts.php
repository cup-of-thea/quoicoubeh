<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class MostLikedPosts extends Component
{
    public function render(): View
    {
        return view(
            'livewire.sections.most-liked-posts',
            ['posts' => Cache::remember('most-liked-posts', 4 * 3600, fn() => Post::mostLikedPosts()->get())]
        );
    }
}
