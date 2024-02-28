---
title: How to disable CSRF protection in Laravel
slug: disable-csrf-in-laravel
category: Laravel
intro: Sometimes you need to disable the CSRF token verification in Laravel. A common use case is when you want to receive POST webhooks.
published_at: 2022-12-06
---

## What is CSRF?

Cross-Site Request Forgery (CSRF) is a protection mechanism. This security is added and enabled by default in Laravel. CSRF protects your app for requests from outside your application. It uses a random generated token that only your application knows and therefore it can detect if a request is allowed by verifying this token.

## Examples of not needing CSRF

Sometimes you don't need the extra protection or want to do something that makes CSRF verification difficult. In case of receiving webhooks it is sometimes necessary and also when working with incoming API requests for routes that are not defined in the `routes/api.php` and therefore do not use the API middleware group.

I'm not going to argue the best practices here, but I am going to show you how you can disable the CSRF token check in Laravel.

## Finding the CSRF middleware

From Laravel v5.1 you can find the CSRF verification middleware inside `app/Http/Middleware/VerifyCsrfToken.php`. There you find a protected array variable `$except`. This array you can fill in different ways, here are some options:

## Disabling CSRF for every route

You can disable CSRF completely for all routes in your application using the asterisk (\*) wildcard:

```php
protected $except = [
    '*',
];
```

## Disabling CSRF for path using wildcard

Disabling a specific kind of path using a wildcard, is also possible:

```php
protected $except = [
    'webhooks/*',
];
```

## Disabling CSRF for specific paths

In this example only specific non-wildcard paths are defined and exempt from CSRF protection:

```php
protected $except = [
    'webhooks/mailgun',
    'webhooks/postmark',
];
```
