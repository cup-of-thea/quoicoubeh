<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\Category;
use App\Domain\ValueObjects\SingleCategory;
use App\Domain\ValueObjects\SinglePost;

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
