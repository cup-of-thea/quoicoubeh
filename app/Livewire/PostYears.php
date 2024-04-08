<?php

namespace App\Livewire;

use App\Domain\UseCase\Queries\GetPostYearsQuery;
use App\Domain\ValueObjects\PostYearsCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class PostYears extends Component
{
    use HasToggle;
    private GetPostYearsQuery $postYearsQuery;


    public function boot(GetPostYearsQuery $postYearsQuery): void
    {
        $this->postYearsQuery = $postYearsQuery;
    }

    #[Computed]
    public function years(): PostYearsCollection
    {
        return $this->postYearsQuery->get();
    }

}
