<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\View\View;

readonly class GetSingleTagController
{
    public function __invoke(string $slug): View
    {
        return view('pages.tag', ['tag' => Tag::findBySlug($slug)]);
    }
}
