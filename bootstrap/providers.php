<?php

use MongoDB\Laravel\MongoDBServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Adapters\InfrastructureServiceProvider::class,
    MongoDBServiceProvider::class,
];
