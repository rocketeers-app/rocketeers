---
title: Disabling cookies in Laravel
slug: disabling-cookies-in-laravel
published_at: 2022-09-05
---

When you have a Laravel project that doesn't need cookies in any way, it's great to know how to completely prevent the usage of cookies. It makes your application cookieless and stateless. In Laravel they are send down the line by default and you may not need them or don't want them (in case of GDPR compliance for example).

## When Laravel needs cookies

Laravel uses cookies by default to attach the session to the same visitor and to keep a CSRF-token for sending forms to your application. Because most applications will need to use cookies for authentication and/or cross site request forgery (CSRF) protection.

> If you don't have authentication or forms on your website, than you don't need cookies and you can safely disable setting these cookies by Laravel.

## How to prevent Laravel from using cookies

To disable cookies the usage of cookies in Laravel, we need to make changes to the middleware stack that is setup by default. By default every visitor starts a new session and also has a unique CSRF token.

To prevent this, we need to shift a few middlewares to a different middleware group. This is done in the code below, where we moved the middlewares to the new `cookies` group and removed them from `web`.

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'api' => [
        // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],

    'cookies' => [
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ],
];
```

## Only use cookies when you really need them

When adding routes that do need authentication or have forms, you can now easily attach the `cookies` middleware group conditionally to these routes, to enable the necessary cookies:

```php
Route::middleware('cookies')->group(function () {
    Route::get('login', [LoginController::class, 'form']);
    Route::post('login', [LoginController::class, 'login']);
});
```

In situations where you cannot use a route group because of packages or other restrictions, you can also enable them conditionally using the `boot()` method on the `AppServiceProvider` and push them to the default `web` middleware group based on a URL pattern:

```php
public function boot()
{
    // Only add cookies for requests within Laravel Nova
    if(request()->is('nova/*')) {
        $this->app['router']->pushMiddlewareToGroup('web', \Illuminate\Session\Middleware\StartSession::class);
        $this->app['router']->pushMiddlewareToGroup('web', \Illuminate\View\Middleware\ShareErrorsFromSession::class);
        $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\VerifyCsrfToken::class);
    }
}
```
