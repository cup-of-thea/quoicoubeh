<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Worlds\Dashboard\Domain\UseCases\Queries\GetPosts;
use Worlds\Dashboard\Domain\ValueObjects\Pagination;

class Posts extends Component
{
    #[Url(keep: true)]
    public int $page = 1;

    public Pagination $pagination;
    private GetPosts $getPosts;

    public function boot(GetPosts $getPosts): void
    {
        $this->getPosts = $getPosts;
        $this->pagination = new Pagination(page: $this->page);
    }

    #[Computed]
    public function posts(): Collection
    {
        return $this->getPosts->get($this->pagination);
    }

    #[Computed]
    public function nextPage(): void
    {
        $this->page = $this->page + 1;
    }

    #[Computed]
    public function previousPage(): void
    {
        $this->page = $this->page > 0 ? $this->page : $this->page - 1;
    }
}
