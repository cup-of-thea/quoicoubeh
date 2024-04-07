<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\SingleTag;

readonly class GetSingleTagQuery
{
    public function __construct(private ITaxonomiesRepository $repository)
    {
    }

    public function get(string $slug): SingleTag
    {
        return $this->repository->getSingleTag($slug);
    }
}
