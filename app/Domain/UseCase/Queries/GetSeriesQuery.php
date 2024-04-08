<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\SeriesCollection;

class GetSeriesQuery
{
    public function __construct(private readonly ITaxonomiesRepository $repository)
    {
    }

    public function get(): SeriesCollection
    {
        return $this->repository->getSeries();
    }
}
