<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    #[Url(as: 'category')]
    public string $selectedCategory = 'all';

    public function render(): View
    {
        return view('livewire.posts', [
            'posts' => Post::query()
                ->whereHas(
                    'category',
                    fn($query) => $this->selectedCategory !== 'all'
                        ? $query->where('slug', $this->selectedCategory)
                        : $query
                )
                ->latest('date')
                ->paginate(10),
            'categories' => Cache::remember(
                'categories',
                86400,
                fn() => Category::withCount('posts')->orderBy('posts_count', 'desc')->get()
            ),

        ]);
    }

    public function selectCategory(string $category): void
    {
        $this->selectedCategory = $category;
        $this->resetPage();
    }

    public function resetCategory(): void
    {
        $this->selectedCategory = 'all';
        $this->resetPage();
    }
}
