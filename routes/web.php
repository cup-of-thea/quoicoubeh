<?php

use App\Http\Controllers\GetRandomPostController;
use App\Http\Controllers\GetSingleCategoryController;
use App\Http\Controllers\GetSinglePostController;
use App\Http\Controllers\GetSingleSeriesController;
use App\Http\Controllers\GetSingleTagController;
use App\Http\Controllers\GetSingleYearController;
use App\Services\Notion;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/blog', fn() => view('pages.blog'));

Route::get('/posts/{slug}', GetSinglePostController::class);

Route::get('/categories/{slug}', GetSingleCategoryController::class);

Route::get('/tags/{slug}', GetSingleTagController::class);

Route::get('/archives/{year}', GetSingleYearController::class);

Route::get('/series/{slug}', GetSingleSeriesController::class);

Route::get('/random', GetRandomPostController::class);

Route::get('/streams', function (Notion $notion) {
    return view('pages.notion', [
        'streams' => $notion->getStreams(),
    ]);
});