<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (request()->is('nova/*')) {
            $this->app['router']->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\StartSession::class);
            $this->app['router']->pushMiddlewareToGroup('web', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
            $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\VerifyCsrfToken::class);
        }
    }
}
