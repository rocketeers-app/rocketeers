---
title: Logging in Laravel
slug: logging-in-laravel
category: Laravel
intro: When you have an web app running, it is important to know what it does and how it's going. To get more insight into this, using the extensive logging features of Laravel is key.
published_at: 2022-11-16
---

## When you need logging

When developing an application, you most likely want to understand what your code actually does. When your coding it is not always possible to understand what the outcome will be without testing it or logging the output to a certain place. By dispatching and processing jobs on a queue on the background, using scheduled commands (cronjobs) and other techniques the need for logging what the code does will be higher than working on a fairly simple app.

## How does logging work in Laravel

Laravel uses the widely used Monolog package under the hood for all its logging capabilities. This logging solution in PHP is very extensive and flexible and Laravel has integrated it very well inside their framework.

By using a comprehensive config for logging, you can combine multiple log streams in Laravel. This makes it easy to output to different locations and keeps the logging posibilities very flexible.

Laravel makes this possible by using the terminology of channels. Channels are meant to provide multiple types of logging out of the box and using the `stack` driver you can configure multiple channels at the same time. So your application can log into multiple locations at once.

## Configuration

The default configuration is a great example of how this works. Here are three different channels defined, a `syslog`, `slack` and `stack` driver. Where the last driver is a special one, because this can combine multiple channels (in this case `syslog` and `slack` together) at once:

```php
'channels' => [
    'stack' => [
        'driver' => 'stack',
        'channels' => ['syslog', 'slack'],
    ],

    'syslog' => [
        'driver' => 'syslog',
        'level' => 'debug',
    ],

    'slack' => [
        'driver' => 'slack',
        'url' => env('LOG_SLACK_WEBHOOK_URL'),
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'critical',
    ],
],
```

## Extensible

Anything is possible for logging in your Laravel application. You can [even write your own driver fairly easy](https://laravel.com/docs/9.x/logging#creating-custom-channels-via-factories) by writing a custom logger.

## Writing log statements

When you want to write log statements to one or more channels, you can use the `Log` facade or the `logger()` helper inside your Laravel app. This makes it really easy to output any message you want to the configured log channels:

```php
use Illuminate\Support\Facades\Log;

Log::debug($message); // logger()->debug($message);
```

## Using different log levels

When logging messages, it is a best practice to define the correct level the message is intended for. For example, it could be handy to use `info` for only informational purposes. To follow along the execution of your code for example. But when you want to log critical errors to your log files, than it's best to also use the `critical()` method for this use case. Here are the methods and functions of every level that is available in Laravel:

```php
use Illuminate\Support\Facades\Log;

Log::emergency($message); // logger()->emergency($message);
Log::alert($message); // logger()->alert($message);
Log::critical($message); // logger()->critical($message);
Log::error($message); // logger()->error($message);
Log::warning($message); // logger()->warning($message);
Log::notice($message); // logger()->notice($message);
Log::info($message); // logger()->info($message);
Log::debug($message); // logger()->debug($message);
```
