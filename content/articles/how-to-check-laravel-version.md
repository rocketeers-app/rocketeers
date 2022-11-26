---
title: How to check Laravel version of your app
slug: how-to-check-laravel-version-of-your-app
category: Laravel
intro: Know exactly which Laravel version your app has installed.
published_at: 2022-11-16
---

## Command Line using Artisan

If you want to know the exact version of your Laravel app, the easiest and fastest option is using the command line:

```bash
php artisan --version

# Example output: Laravel Framework 9.33.0
```

## Command Line using Composer

It's also possible to determine the Laravel version using Composer, because Laravel is (or should be) installed using this package manager. Piping the JSON formatted output of Composer to `jq` makes the value directly accessible:

```bash
composer show laravel/framework --format json | jq '.versions'

# Example output: ["v9.33.0"]
```

## Using the `app()` helper

Within the application code, you can use the `app()` helper to discover the current Laravel version:

```php
echo app()->version();

// Example output: 9.33.0
```

Using the helper, you could show the Laravel version in a Blade template to expose it in a development environment or when a admin needs to have some debug info:

```php
{{ app()->version() }}
```
