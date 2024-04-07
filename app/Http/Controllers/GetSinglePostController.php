<?php

namespace App\Http\Controllers;

use App\Domain\UseCase\Queries\GetPostTagsQuery;
use App\Domain\UseCase\Queries\GetSinglePostQuery;
use Illuminate\Contracts\View\View;

readonly class GetSinglePostController
{
    public function __construct(
        private GetSinglePostQuery $query,
        private GetPostTagsQuery $tagsQuery,
    )
    {
    }

    public function __invoke(string $slug): View
    {
        $post = $this->query->get($slug);

        return view('pages.post', [
            'post' => $post,
            'tags' => $this->tagsQuery->get($post->id),
        ]);
    }
}
