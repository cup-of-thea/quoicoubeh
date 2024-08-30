<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Queries\Categories\GetSingleCategoryQuery;
use App\Domain\UseCases\Queries\Posts\GetPostsFromCategoryQuery;
use Illuminate\Contracts\View\View;

readonly class GetSingleCategoryController
{
    public function __construct(
        private GetSingleCategoryQuery $query,
        private GetPostsFromCategoryQuery $postsFromCategoryQuery
    ) {
    }

    public function __invoke(string $slug): View
    {
        $category = $this->query->get($slug);

        return view('pages.category', [
            'category' => $category,
            'posts' => $this->postsFromCategoryQuery->get($category->id),
        ]);
    }
}
