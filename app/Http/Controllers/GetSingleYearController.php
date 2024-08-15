<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Queries\Posts\GetPostsFromYearQuery;
use Illuminate\Contracts\View\View;

readonly class GetSingleYearController
{
    public function __construct(
        private GetPostsFromYearQuery $postsFromYearQuery
    ) {
    }

    public function __invoke(int $year): View
    {
        return view('pages.year', [
            'year' => $year,
            'posts' => $this->postsFromYearQuery->get($year),
        ]);
    }
}
