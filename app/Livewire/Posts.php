<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Posts extends Component
{
    #[Url(as: 'category')]
    public ?string $selectedCategory = null;

    public function selectCategory(?string $category): void
    {
        $this->selectedCategory = $category;
    }

    #[Computed]
    public function categories(): Collection
    {
        return Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->get();
    }

    #[Computed]
    public function posts(): Collection
    {
        return Post::query()
            ->whereHas(
                'category',
                fn ($query) => $this->selectedCategory
                    ? $query->where('slug', $this->selectedCategory)
                    : $query
            )
            ->latest('date')
            ->limit(20)
            ->get();
    }
}
