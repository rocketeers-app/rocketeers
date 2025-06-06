<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPages\DevelopersController;
use App\Http\Controllers\LandingPages\DigitalAgenciesController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscribeController;
use Backstage\Static\Laravel\Middleware\StaticResponse;
use Illuminate\Support\Facades\Route;

require 'redirects.php';

Route::middleware([StaticResponse::class])->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::get('pricing', PricingController::class)->name('pricing');
    Route::get('contact', ContactController::class)->name('contact');
    Route::post('subscribe', SubscribeController::class);
    Route::get('sitemap.xml', SitemapController::class);

    Route::get('developers', DevelopersController::class);
    Route::get('digital-agencies', DigitalAgenciesController::class);

    Route::get('features', [FeatureController::class, 'index'])->name('feature.index');
    Route::get('features/{feature}', [FeatureController::class, 'show'])->name('feature.show')->where('feature', '.*');

    Route::feeds();

    Route::get('{slug?}', ArticleController::class)->name('knowledge')->where('slug', '.*');
});
