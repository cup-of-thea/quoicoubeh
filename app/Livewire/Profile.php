<?php

namespace App\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public string $avatarUrl;
    public string $name;
    public string $bio;
    public string $pronouns;
    public array $links;

    public function mount(): void
    {
        $this->avatarUrl = "https://www.gravatar.com/avatar/" . md5(
                strtolower(trim(config('domain.profile.email')))
            ) . "?s=100";
        $this->name = config('domain.profile.name');
        $this->links = config('domain.profile.links');
        $this->pronouns = config('domain.profile.pronouns');
        $this->bio = config('domain.profile.bio');
    }
}
