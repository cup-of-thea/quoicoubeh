<?php

namespace App\Domain\UseCases\Queries\Categories;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\CategoriesCollection;

readonly class GetCategoriesQuery
{
    public function __construct(private ITaxonomiesRepository $categoriesRepository)
    {
    }

    public function get(): CategoriesCollection
    {
        return $this->categoriesRepository->getCategories();
    }
}
