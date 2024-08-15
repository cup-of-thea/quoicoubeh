<?php

namespace App\Http\Controllers;

use App\Domain\UseCases\Queries\Posts\GetRandomPostSlugQuery;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

readonly class GetRandomPostController
{
    public function __construct(private GetRandomPostSlugQuery $getRandomPostSlugQuery)
    {
    }

    public function __invoke(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return redirect("/posts/{$this->getRandomPostSlugQuery->get()}");
    }
}
