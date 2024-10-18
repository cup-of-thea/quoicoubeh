<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Episode;
use App\Models\Event;
use App\Models\Post;
use App\Models\PostMeta;
use App\Models\Project;
use App\Models\Series;
use App\Models\Stream;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Category::unguard();
        Episode::unguard();
        Event::unguard();
        PostMeta::unguard();
        Post::unguard();
        Project::unguard();
        Series::unguard();
        Stream::unguard();
        Tag::unguard();
    }
}
