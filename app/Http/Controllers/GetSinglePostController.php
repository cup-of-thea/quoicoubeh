<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

readonly class GetSinglePostController
{
    public function __invoke(string $slug): View
    {
        return view('pages.post', ['post' => Post::where('slug', $slug)->firstOrFail()]);
    }
}
