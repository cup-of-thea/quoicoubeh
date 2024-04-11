<?php

namespace App\Adapters;

use App\Adapters\Repositories\LikePostsRepository;
use App\Adapters\Repositories\TaxonomiesRepository;
use App\Adapters\Repositories\PostsRepository;
use App\Domain\Adapters\Repositories\ILikePostsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\Adapters\Repositories\IPostsRepository;
use Illuminate\Support\ServiceProvider;

class InfrastructureServiceProvider extends ServiceProvider
{
    public array $bindings = [
        IPostsRepository::class => PostsRepository::class,
        ITaxonomiesRepository::class => TaxonomiesRepository::class,
        ILikePostsRepository::class => LikePostsRepository::class,
    ];
}
