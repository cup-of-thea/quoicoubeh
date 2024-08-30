<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Queries\GetSingleSeriesQuery;
use App\Domain\UseCases\Queries\Posts\GetSeriesEpisodesQuery;
use Illuminate\Contracts\View\View;

readonly class GetSingleSeriesController
{
    public function __construct(
        private GetSingleSeriesQuery $getSingleSeriesQuery,
        private GetSeriesEpisodesQuery $getSeriesEpisodesQuery,
    ) {
    }

    public function __invoke(string $slug): View
    {
        $series = $this->getSingleSeriesQuery->get($slug);
        return view('pages.series', [
            'series' => $series,
            'posts' => $this->getSeriesEpisodesQuery->get($series->id),
        ]);
    }
}
