<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

require 'redirects.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('subscribe', SubscribeController::class);
Route::get('sitemap.xml', SitemapController::class);

Route::get('features', [FeatureController::class, 'index'])->name('feature.index');
Route::get('features/{feature}', [FeatureController::class, 'show'])->name('feature.show')->where('feature', '.*');

Route::feeds();

Route::get('{slug?}', ArticleController::class)->name('knowledge')->where('slug', '.*');
