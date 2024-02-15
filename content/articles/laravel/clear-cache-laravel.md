---
title: How to clear cache in Laravel
slug: clear-cache-laravel
category: Laravel
intro: Laravel uses caching for a lot of parts of the framework, here's how you can clear all of them.
published_at: 2024-02-15
---

## How to clear all caches at once

To clear all caches at once, Laravel has a specific optimize command that can clear every major cache in the application. This includes the configured cache driver, the events, views, route, config and bootstrap files:

```bash
php artisan optimize:clear
```

## Application cache

Laravel has versatile cache functionalities baked in the framework. It can handle multiple cache stores like file based, using a database (MySQL, PotgreSQL, SQLite, Redis) or specific software like memcached.

Using the command line you can clear the default configured cache with:

```php
php artisan cache:clear
```

But you can also define another store that's not the default, but is configurred and used within your app:

```php
php artisan cache:clear file # other stores are: apc, array, database, file, memcached, redis, dynamodb, octane
```

Clearing the cache within application code is possible using:

```php
use Illuminate\Support\Facades\Cache;

Cache::flush(); # clear default cache
Cache::store('memcached')->flush(); # clear cache for 'memcached' store
```

## Framework cache

Laravel has multiple ways to improve its performance by caching framework specific functionality. Here are all caches Laravel uses to bootstrap the framework as quickly as possible:

### Config cache

Using `php artisan config:cache` during deployments, Laravel can optimize config files and make them as static as possble to quickly load the config on each request. This also means you cannot update config dynamically anymore using the helper `config([])`. You can clear the config cache using:

```php
php artisan config:clear
```

### Events cache

Using `php artisan events:cache` when deploying, Laravel can collect all event files upfront, which makes loading of a lot of scatered events inside your application much faster.

```php
php artisan events:clear
```

### Routes cache

To further optimize performance, you can use `php artisan routes:cache` to deploy your Laravel app with an optimized routes cache. This collects all registered routes and creates a static cache to match every route as fast as possible.

Clearing the routes cache:

```php
php artisan routes:clear
```

### Views cache

Laravel compiles the Blade syntax to PHP code when executing the views for rendering it in your application. This cache is stored in `storage/framework/views` and contains all Blade views compiled to PHP files.

Clearing this cache can be done with:

```php
php artisan views:clear
```

## Use Laravel without cache

## Array or null cache driver

To really have no cache at all, you can configure `array` or `null` as cache driver. So this means you have no store at all, only during the runtime of a request the cache will work. After each request the cache will be empty again.

```bash
CACHE_DRIVER=null # or "array"
```
