<?php

use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'index']);
Route::get('posts', [PostController::class, 'index']);
Route::get('{post}', [PostController::class, 'show'])->where('post', '.*');
