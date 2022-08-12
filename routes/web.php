<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('subscribe', SubscribeController::class);
Route::get('sitemap.xml', SitemapController::class);

Route::redirect('posts', 'knowledge', 301);

Route::get('features', [FeatureController::class, 'index'])->name('feature.index');
Route::get('features/{feature}', [FeatureController::class, 'show'])->name('feature.show')->where('feature', '.*');

Route::get('knowledge', [ArticleController::class, 'index'])->name('article.index');
Route::get('{article}', [ArticleController::class, 'show'])->name('article.show')->where('article', '.*');
