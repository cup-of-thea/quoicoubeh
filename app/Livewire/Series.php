<?php

namespace App\Livewire;

use App\Domain\UseCases\Queries\GetSeriesQuery;
use App\Domain\ValueObjects\SeriesCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Series extends Component
{
    use HasToggle;

    private GetSeriesQuery $seriesQuery;

    public function boot(GetSeriesQuery $seriesQuery): void
    {
        $this->seriesQuery = $seriesQuery;
    }

    #[Computed]
    public function series(): SeriesCollection
    {
        return $this->seriesQuery->get();
    }
}
