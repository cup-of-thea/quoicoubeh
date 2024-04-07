<?php

use App\Http\Controllers\GetSingleCategoryController;
use App\Http\Controllers\GetSinglePostController;
use App\Http\Controllers\GetSingleTagController;
use App\Http\Controllers\GetSingleYearController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/posts/{slug}', GetSinglePostController::class);

Route::get('/categories/{slug}', GetSingleCategoryController::class);

Route::get('/tags/{slug}', GetSingleTagController::class);

Route::get('/archives/{year}', GetSingleYearController::class);
