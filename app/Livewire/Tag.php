<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Tag extends Component
{
    use WithPagination;

    public \App\Models\Tag $tag;

    public function render(): View
    {
        return view('livewire.tag', [
            'posts' => $this->tag->posts()->latest('date')->paginate(10),
        ]);
    }
}
