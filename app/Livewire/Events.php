<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Events extends Component
{
    public function render(): View
    {
        return view('livewire.events', [
            'finishedEvents' => Event::finished(2)->get()->reverse(),
            'currentEvent' => Event::current()->get(),
            'upcomingEvents' => Event::upcoming(5)->get(),
        ]);
    }
}
