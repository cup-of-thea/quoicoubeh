<?php

return [
    App\Adapters\InfrastructureServiceProvider::class,
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    MongoDB\Laravel\MongoDBServiceProvider::class,
];
