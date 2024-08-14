<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

readonly class GetStreamsController
{
    public function __invoke(): View
    {
        return view('pages.streams');
    }
}
