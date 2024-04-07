<?php

namespace App\Adapters;

use App\Adapters\Repositories\TaxonomiesRepository;
use App\Adapters\Repositories\PostsRepository;
use App\Adapters\Repositories\TagsRepository;
use App\Domain\Adapters\Repositories\ITaxonomiesRepository;
use App\Domain\Adapters\Repositories\IPostsRepository;
use App\Domain\Adapters\Repositories\ITagsRepository;
use Illuminate\Support\ServiceProvider;

class InfrastructureServiceProvider extends ServiceProvider
{
    public array $bindings = [
        IPostsRepository::class => PostsRepository::class,
        ITaxonomiesRepository::class => TaxonomiesRepository::class,
    ];
}
