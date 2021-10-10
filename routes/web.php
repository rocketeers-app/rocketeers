<?php

use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);
Route::get('{post}', [PostController::class, 'show'])->where('post', '.*');
