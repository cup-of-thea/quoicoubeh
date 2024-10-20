<?php

namespace App\Livewire;

use App\Models\Stream;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Streams extends Component
{
    public function render(): View
    {
        return view('livewire.streams', [
            'finishedStreams' => Stream::finished(2)->get()->reverse(),
            'currentStream' => Stream::current()->get(),
            'upcomingStreams' => Stream::upcoming(5)->get(),
        ]);
    }
}
