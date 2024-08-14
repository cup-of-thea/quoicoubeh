<?php

namespace App\Livewire\Sections;

use App\Services\NotionService;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Streams extends Component
{
    private readonly NotionService $notion;

    public function boot(NotionService $notion): void
    {
        $this->notion = $notion;
    }

    #[Computed]
    public function streams(): Collection
    {
        return $this->notion->getStreams();
    }
}
