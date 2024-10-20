<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;

class Tools extends Widget
{
    protected static string $view = 'filament.widgets.tools';

    public function flushCache(): void
    {
        Cache::flush();
    }
}
