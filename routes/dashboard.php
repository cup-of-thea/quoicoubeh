<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
    Route::view('dashboard/posts', 'dashboard.posts')
        ->name('dashboard.posts');
});