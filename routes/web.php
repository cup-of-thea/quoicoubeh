<?php

use App\Http\Controllers\GetRandomPostController;
use App\Http\Controllers\GetSingleCategoryController;
use App\Http\Controllers\GetSinglePostController;
use App\Http\Controllers\GetSingleSeriesController;
use App\Http\Controllers\GetSingleTagController;
use App\Http\Controllers\GetSingleYearController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/blog', fn() => view('pages.blog'));

Route::get('/posts/{slug}', GetSinglePostController::class);

Route::get('/categories/{slug}', GetSingleCategoryController::class);

Route::get('/tags/{slug}', GetSingleTagController::class);

Route::get('/archives/{year}', GetSingleYearController::class);

Route::get('/series/{slug}', GetSingleSeriesController::class);

Route::get('/random', GetRandomPostController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/dashboard.php';

require __DIR__ . '/auth.php';
