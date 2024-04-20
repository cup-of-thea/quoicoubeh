<?php

namespace App\Livewire;

use App\Domain\DomainService\TopPostsDomainService;
use App\Domain\ValueObjects\PostIndexCollection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class MostLikedPosts extends Component
{
    private TopPostsDomainService $topPostsDomainService;

    public function boot(TopPostsDomainService $topPostsDomainService): void
    {
        $this->topPostsDomainService = $topPostsDomainService;
    }

    #[Computed]
    public function posts(): PostIndexCollection
    {
        return $this->topPostsDomainService->getMostLikedPosts();
    }
}
