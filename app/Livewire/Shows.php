<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Shows extends Component
{
    #[Url(as: 'show')]
    public ?string $selectedShow = null;

    public function selectShow(?string $show): void
    {
        $this->selectedShow = $show;
    }

    #[Computed]
    public function shows(): Collection
    {
        return \App\Models\Series::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();
    }

    #[Computed]
    public function posts(): Collection
    {
        $query = Post::query()
            ->whereHas(
                'series',
                fn($query) => $this->selectedShow
                    ? $query->where('slug', $this->selectedShow)
                    : $query
            );

        if ($this->selectedShow) {
            $query->oldest('date')->limit(20);
        } else {
            $query->latest('date')->limit(5);
        }

        return $query->get();
    }

}
