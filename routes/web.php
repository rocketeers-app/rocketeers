<?php

use App\Actions\GenerateOpenGraphImage;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

require_once 'redirects.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('subscribe', SubscribeController::class);
Route::get('open-graph-image', GenerateOpenGraphImage::class)->name('open-graph-image');
Route::get('sitemap.xml', SitemapController::class);

Route::get('features', [FeatureController::class, 'index'])->name('feature.index');
Route::get('features/{feature}', [FeatureController::class, 'show'])->name('feature.show')->where('feature', '.*');

Route::get('knowledge', [ArticleController::class, 'index'])->name('article.index');

Route::feeds();

Route::get('{article}', [ArticleController::class, 'show'])->name('article.show')->where('article', '.*');
