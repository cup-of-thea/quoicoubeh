<?php

namespace App\Livewire\Sections;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Livewire\Component;

class MostReadPosts extends Component
{
    public function render(): View
    {
        return view(
            'livewire.sections.most-read-posts',
            ['posts' => Cache::remember('most-read-posts', 3 * 3600, fn() => Post::mostReadPosts()->get())]
        );
    }

}
