<?php

namespace App\Http\Controllers;

use App\Services\Notion;
use Illuminate\View\View;

readonly class GetStreamsController
{
    public function __construct(private Notion $notion)
    {
    }

    public function __invoke(): View
    {
        return view('pages.notion', [
            'streams' => $this->notion->getStreams(),
        ]);
    }
}
