<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

readonly class GetSinglePostController
{
    public function __invoke(string $slug): View
    {
        $post = Cache::remember("posts:$slug", 86400, fn() => Post::where('slug', $slug)->firstOrFail());

        if ($post) {
            $ip = request()->ip();
            if (!Cache::has("reading:$slug:$ip")) {
                Cache::put("reading:$slug:$ip", true, 86400);
                $post->meta->increment('reading_count');
            }
        }

        return view('pages.post', ['post' => $post]);
    }
}
