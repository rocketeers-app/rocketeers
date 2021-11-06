<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('subscribe', SubscribeController::class);

Route::get('posts', [PostController::class, 'index']);
Route::get('{post}', [PostController::class, 'show'])->where('post', '.*');
