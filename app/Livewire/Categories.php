<?php

namespace App\Livewire;

use App\Domain\UseCase\Queries\GetCategoriesQuery;
use App\Domain\ValueObjects\CategoriesCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Categories extends Component
{
    use HasToggle;

    private GetCategoriesQuery $categoriesQuery;

    public function boot(GetCategoriesQuery $categoriesQuery): void
    {
        $this->categoriesQuery = $categoriesQuery;
    }

    #[Computed]
    public function categories(): CategoriesCollection
    {
        return $this->categoriesQuery->get();
    }
}
