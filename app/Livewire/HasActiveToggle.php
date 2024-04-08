<?php

namespace App\Livewire;

trait HasActiveToggle
{
    public bool $show = true;

    public function toggle(): void
    {
        $this->show = !$this->show;
    }
}
