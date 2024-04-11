<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ThemeSelector extends Component
{
    public string $theme;

    public function boot(): void
    {
        $ip = request()->ip();
        $this->theme = Cache::get("theme:$ip", 'light');
    }

    public function toggle(): void
    {
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';

        $ip = request()->ip();
        Cache::put("theme:$ip", $this->theme, now()->addDays(60));
        $this->dispatch('theme-changed', $this->theme);
    }
}
