<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Projects extends Component
{
    public function render(): View
    {
        return view('livewire.projects', [
            'projects' => Project::orderBy('order', 'asc')->limit(6)->get()
        ]);
    }
}
