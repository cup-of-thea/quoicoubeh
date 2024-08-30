<?php

namespace App\Domain\UseCases\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\SingleSeries;

class GetSingleSeriesQuery
{
    public function __construct(private ITaxonomiesRepository $repository)
    {
    }

    public function get(string $slug): SingleSeries
    {
        return $this->repository->getSingleSeries($slug);
    }
}
