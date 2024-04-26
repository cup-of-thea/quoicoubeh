<?php

use Worlds\Dashboard\DashboardServiceProvider;

return [
    App\Adapters\InfrastructureServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\VoltServiceProvider::class,
    MongoDB\Laravel\MongoDBServiceProvider::class,
    DashboardServiceProvider::class,
];
