<?php

namespace App\Livewire;

use App\Domain\DomainService\TopPostsDomainService;
use App\Domain\ValueObjects\PostIndexCollection;
use InvalidArgumentException;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TopPosts extends Component
{
    public string $key;
    public string $selected = TopPostsSelect::MOST_READ->value;
    private TopPostsDomainService $topPostsDomainService;

    public function boot(TopPostsDomainService $topPostsDomainService): void
    {
        $this->topPostsDomainService = $topPostsDomainService;
    }

    public function select(string $selected): void
    {
        $this->selected = $selected;
    }

    #[Computed]
    public function posts(): PostIndexCollection
    {
        return match ($this->selected) {
            TopPostsSelect::MOST_READ->value => $this->topPostsDomainService->getMostReadPosts(),
            TopPostsSelect::MOST_LIKED->value => $this->topPostsDomainService->getMostLikedPosts(),
            default => throw new InvalidArgumentException('Invalid selected value'),
        };
    }

    #[Computed]
    public function options(): array
    {
        return [
            TopPostsSelect::MOST_READ->value => [
                'title' => 'Les + lus',
                'icon' => 'fas fa-eye',
            ],
            TopPostsSelect::MOST_LIKED->value => [
                'title' => 'Les + aimés',
                'icon' => 'fas fa-heart',
            ],
        ];
    }
}

enum TopPostsSelect: string
{
    case MOST_READ = 'most-read';
    case MOST_LIKED = 'most-liked';
}