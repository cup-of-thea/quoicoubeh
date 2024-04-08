<?php

namespace App\Domain\UseCase\Queries;

use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\ValueObjects\EpisodesCollection;
use App\Domain\ValueObjects\PostIndexCollection;
use App\Domain\ValueObjects\SeriesId;

readonly class GetSeriesEpisodesQuery
{
    public function __construct(private IPostsRepository $repository)
    {
    }

    public function get(SeriesId $seriesId): PostIndexCollection
    {
        return $this->repository->getSeriesEpisodes($seriesId);
    }
}
