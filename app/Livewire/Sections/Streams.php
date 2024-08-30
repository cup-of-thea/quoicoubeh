<?php

namespace App\Livewire\Sections;

use App\Domain\UseCases\Queries\Streams\GetStreamsQuery;
use App\Domain\ValueObjects\StreamCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Streams extends Component
{
    private readonly GetStreamsQuery $query;

    public function boot(GetStreamsQuery $query): void
    {
        $this->query = $query;
    }

    #[Computed]
    public function streams(): StreamCollection
    {
        return $this->query->execute();
    }
}
