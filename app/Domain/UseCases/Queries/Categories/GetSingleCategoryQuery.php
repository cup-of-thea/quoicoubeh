<?php

namespace App\Domain\UseCases\Queries\Categories;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\SingleCategory;

readonly class GetSingleCategoryQuery
{
    public function __construct(private ITaxonomiesRepository $repository)
    {
    }

    public function get(string $slug): SingleCategory
    {
        return $this->repository->getSingleCategory($slug);
    }
}
