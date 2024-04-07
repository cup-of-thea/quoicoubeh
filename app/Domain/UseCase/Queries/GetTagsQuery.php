<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\TagsCollection;

readonly class GetTagsQuery
{
    public function __construct(private ITaxonomiesRepository $repository)
    {
    }

    public function get(): TagsCollection
    {
        return $this->repository->getTags();
    }
}
