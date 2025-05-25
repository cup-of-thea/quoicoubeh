<?php

use App\Http\Controllers\GetRandomPostController;
use App\Http\Controllers\GetSinglePostController;
use App\Http\Controllers\GetSingleSeriesController;
use App\Http\Controllers\GetSingleTagController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/blog', fn() => view('pages.blog'))->name('blog');

Route::get('/shows', fn() => view('pages.shows'))->name('shows');

Route::get('/posts/{slug}', GetSinglePostController::class)->name('posts.show');

Route::get('/categories/{slug}', fn(string $slug) => redirect()->route('blog', ['category' => $slug]));

Route::get('/tags/{slug}', GetSingleTagController::class);

Route::get('/series/{slug}', GetSingleSeriesController::class);

Route::get('/random', GetRandomPostController::class);

Route::get('/projects', fn() => view('pages.projects'));

Route::get('/events', fn() => view('pages.events'));

Route::prefix('/overlays')->group(function () {
    Route::get('/jimqueen/{slug}', fn(string $slug) => view("overlays.jimqueen.$slug"))
        ->name('overlays.jimqueen');
});

Route::feeds();