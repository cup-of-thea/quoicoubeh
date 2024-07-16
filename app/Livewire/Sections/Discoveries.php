<?php

namespace App\Livewire\Sections;

use App\Domain\UseCase\Queries\Categories\DiscoveriesQuery;
use App\Domain\ValueObjects\PostIndexCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Discoveries extends Component
{
    private DiscoveriesQuery $discoveriesQuery;

    public function boot(DiscoveriesQuery $query): void
    {
        $this->discoveriesQuery = $query;
    }

    #[Computed]
    public function posts(): PostIndexCollection
    {
        return $this->discoveriesQuery->get();
    }
}