---
title: 'Enable JIT in PHP 8.x Opcache'
slug: php-8-opcache-jit
category: PHP
intro: 'Using Opcache can greatly improve PHP performance. By enabling Just In Time (JIT) compiling in Opcache you can improve it even more.'
published_at: '2024-11-21T00:00:00+00:00'
created_at: '2024-11-21T10:21:08+00:00'
updated_at: '2024-11-21T10:33:57+00:00'

---
## What is JIT (Just In Time) compiling?

JIT is a compiler optimization feature introduced in PHP 8 and can enable faster execution times for CPU intensive tasks.  It enhances performance by translating frequently executed PHP code into machine code at runtime, allowing it to be executed directly by the CPU instead of being interpreted line-by-line. This results in significant speed improvements!

This is one of those extensions that's a bit confusing to setup, but it's not very dificult if you know how to.

## First: Opcache should be installed

To begin with, we expect to have Opcache installed on your server. This is a PHP extension and on a Ubuntu server you can install it using (change to your current PHP version accordingly):

```bash
sudo apt install php8.4-opcache
```

## How to enable JIT compiling

By default JIT is disabled in Opcache, so you need to enable it manually. Also note that the enabling of Opcache is separate for the PHP (FPM) process and using PHP on the CLI.

JIT can be enabled by setting `opcache.jit_buffer_size` to a value and in general `128M` is a pretty decent value that's enough for most PHP applications. Add this line:

```ini
opcache.jit_buffer_size=128M
```

To your `php.ini` config file or in `/etc/php/8.4/mods-available/opcache.ini`:

```bash
opcache.enabled=1
opcache.jit_buffer_size=128M
```

Now JIT is enabled!

## Optimization level

Next you need to decide a proper `opcache.jit` value that determines what optimizations the JIT compiler will perform. This can be precisely set as a bitmasker using a 4-digit integer "CRTO". More on this in the [PHP docs](https://www.php.net/manual/en/opcache.configuration.php#ini.opcache.jit).

But for typical usage, it's easier to use the following presets that cover most use cases. The following options:

```php
# Completely disabled, cannot be enabled at runtime.
opcache.jit=disable
	
# Disabled, but can be enabled at runtime.
opcache.jit=off
	
# Use tracing JIT. Enabled by default and recommended for most users.
opcache.jit=on # or opcache.jit=tracing

# Use function JIT.
opcache.jit=function
```

For general usage you can choose `on` which is almost the highest setting (1254) to enable almost all optimization levels. This makes the config now:

```bash
opcache.enable=1
opcache.jit=on
opcache.jit_buffer_size=128M
```

## Enable in the CLI

If you also want to optimize CLI usage, you can enable Opcache (and JIT) by adding:

```bash
opcache.enable_cli=1
```