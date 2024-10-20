<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

readonly class GetSingleCategoryController
{
    public function __invoke(string $slug): View
    {
        $category = Category::findBySlug($slug);

        return view('pages.category', [
            'category' => $category,
            'posts' => $category->posts()->paginate(10),
        ]);
    }
}
