<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationTop extends Component
{
    public bool $show = false;
    public array $links;

    public function showMenu(): void
    {
        $this->show = true;
    }

    public function hideMenu(): void
    {
        $this->show = false;
    }

    public function mount(): void
    {
        $this->links = config('domain.navbar.links');
    }
}
