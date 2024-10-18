<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Projects extends Component
{
    #[Computed]
    public function projects(): Collection
    {
        return Project::all();
    }
}
