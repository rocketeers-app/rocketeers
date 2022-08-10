<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscribeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;

Route::get('/', [HomeController::class, 'index']);
Route::post('subscribe', SubscribeController::class);

Route::get('sitemap.xml', function () {
    return Sitemap::create()
        ->add(Post::all());
});

Route::get('posts', [PostController::class, 'index'])->name('post.index');
Route::get('{post}', [PostController::class, 'show'])->name('post.show')->where('post', '.*');
