<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\Tools;
use Filament\Widgets\AccountWidget;

class Dashboard extends \Filament\Pages\Dashboard
{
    public function getWidgets(): array
    {
        return [
            Tools::class,
            AccountWidget::class,
        ];
    }
}