<?php

namespace App\Domain\UseCases\Queries\Posts;

use App\Domain\Adapters\Repositories\IPostsRepository;
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
