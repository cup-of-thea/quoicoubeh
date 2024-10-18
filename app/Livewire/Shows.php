<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Shows extends Component
{
    use WithPagination;

    #[Url(as: 'show')]
    public string $selectedShow = 'all';

    public function render(): View
    {
        return view('livewire.shows', [
            'posts' => $this->posts(),
            'shows' => Cache::remember(
                'shows',
                86400,
                fn() => \App\Models\Series::withCount('posts')->orderBy('posts_count', 'desc')->get()
            ),

        ]);
    }

    public function selectShow(string $show): void
    {
        $this->selectedShow = $show;
        $this->resetPage();
    }

    public function resetShow(): void
    {
        $this->selectedShow = 'all';
        $this->resetPage();
    }

    public function posts(): LengthAwarePaginator
    {
        $query = Post::query()
            ->whereHas(
                'series',
                fn($query) => $this->selectedShow !== 'all'
                    ? $query->where('slug', $this->selectedShow)
                    : $query
            );

        if ($this->selectedShow !== 'all') {
            $query->oldest('date');
        } else {
            $query->latest('date');
        }

        return $query->paginate(5);
    }

}
