<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public array $links;

    public function mount(): void
    {
        $this->links = config('domain.navbar.links');
    }
}
