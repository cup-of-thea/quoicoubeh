<?php

namespace App\Livewire;

trait HasToggle
{
    public bool $show = false;

    public function toggle(): void
    {
        $this->show = !$this->show;
    }
}
