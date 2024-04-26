<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Worlds\Dashboard\Domain\UseCases\Queries\GetPostsPaginationQuery;
use Worlds\Dashboard\Domain\UseCases\Queries\GetPostsQuery;
use Worlds\Dashboard\Domain\ValueObjects\Pagination;
use Worlds\Dashboard\Domain\ValueObjects\PaginationInformation;
use Worlds\Dashboard\Domain\ValueObjects\PaginationRequest;

class Posts extends Component
{
    #[Url(keep: true)]
    public int $page = 1;

    public PaginationRequest $paginationRequest;
    private GetPostsQuery $getPostsQuery;

    public function boot(GetPostsQuery $getPostsQuery,): void
    {
        $this->getPostsQuery = $getPostsQuery;
        $this->paginationRequest = new PaginationRequest(page: $this->page);
    }

    #[Computed]
    public function posts(): Collection
    {
        return $this->getPostsQuery->get($this->paginationRequest)->items;
    }

    #[Computed]
    public function pagination(): Pagination
    {
        return $this->getPostsQuery->get($this->paginationRequest)->pagination;
    }

    public function nextPage(): void
    {
        $this->page = $this->page == $this->pagination()->lastPage ? $this->page : $this->page + 1;
        $this->paginationRequest = new PaginationRequest(page: $this->page);
    }

    public function previousPage(): void
    {
        $this->page = $this->page == 1 ? $this->page : $this->page - 1;
        $this->paginationRequest = new PaginationRequest(page: $this->page);
    }

    public function goToPage(int $page): void
    {
        $this->page = $page;
        $this->paginationRequest = new PaginationRequest(page: $this->page);
    }

    public function isCurrentPage(int $page): bool
    {
        return $this->page === $page;
    }
}
