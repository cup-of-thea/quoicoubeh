<?php

namespace App\Livewire;

use App\Domain\UseCases\Queries\GetTagsQuery;
use App\Domain\ValueObjects\TagsCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Tags extends Component
{
    use HasToggle;

    private GetTagsQuery $query;

    public function boot(GetTagsQuery $query): void
    {
        $this->query = $query;
    }

    #[Computed]
    public function tags(): TagsCollection
    {
        return $this->query->get();
    }
}
