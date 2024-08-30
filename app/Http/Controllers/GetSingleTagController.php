<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Queries\GetSingleTagQuery;
use App\Domain\UseCases\Queries\Posts\GetPostsFromTagQuery;
use Illuminate\Contracts\View\View;

readonly class GetSingleTagController
{
    public function __construct(
        private GetSingleTagQuery $query,
        private GetPostsFromTagQuery $postsFromTagQuery
    ) {
    }

    public function __invoke(string $slug): View
    {
        $tag = $this->query->get($slug);

        return view('pages.tag', [
            'tag' => $tag,
            'posts' => $this->postsFromTagQuery->get($tag->id),
        ]);
    }
}
