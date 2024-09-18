<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->prepend(
        //     \Vormkracht10\MinifyHtml\Middleware\MinifyHtml::class,
        //     \Vormkracht10\LaravelStatic\Middleware\StaticResponse::class
        // );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
