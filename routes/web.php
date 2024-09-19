<?php

use App\Http\Controllers\GetRandomPostController;
use App\Http\Controllers\GetSingleCategoryController;
use App\Http\Controllers\GetSinglePostController;
use App\Http\Controllers\GetSingleSeriesController;
use App\Http\Controllers\GetSingleTagController;
use App\Http\Controllers\GetSingleYearController;
use App\Http\Controllers\GetStreamsController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'))->name('home');

Route::get('/blog', fn() => view('pages.blog'));

Route::get('/posts/{slug}', GetSinglePostController::class)->name('posts.show');

Route::get('/categories/{slug}', GetSingleCategoryController::class);

Route::get('/tags/{slug}', GetSingleTagController::class);

Route::get('/archives/{year}', GetSingleYearController::class);

Route::get('/series/{slug}', GetSingleSeriesController::class);

Route::get('/random', GetRandomPostController::class);

Route::get('/streams', GetStreamsController::class);

Route::feeds();