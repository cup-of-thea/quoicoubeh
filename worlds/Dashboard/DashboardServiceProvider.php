<?php

namespace Worlds\Dashboard;

use Illuminate\Support\ServiceProvider;
use Worlds\Dashboard\Adapters\Repository\PostsRepository;
use Worlds\Dashboard\Domain\Adapters\Repositories\IPostsRepository;

class DashboardServiceProvider extends ServiceProvider
{
    public array $bindings = [
        IPostsRepository::class => PostsRepository::class,
    ];
}