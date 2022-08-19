---
title: How to use different PHP versions with Laravel Valet
slug: how-to-use-different-php-versions-with-laravel-valet
published_at: 2022-08-19
---

While Rocketeers app will allow you to use different PHP versions on your webservers, it previously was very difficult to use different PHP versions on your local machine using Laravel Valet.

Since june 2022 Laravel Valet got a very nice upgrade in using different PHP versions and easily switch between them when working concurrently on different projects.

## Isolate a PHP version per project

The first command that's new is `valet isolate` this command can be used to isolate a project using one specific PHP version. After that the Nginx server that Valet installs on your Mac knows which PHP version to use for your project.

For example the command for a project locked into using only PHP 8.1 is:

```bash
valet isolate php@8.1
```

## Use the specific PHP version even in your command line

Valet provides the ease of use to map local folders to hostnames in the browser and run them locally in the browser, using the correct PHP version. When using PHP from the command line, it is also possible to automatically let your Terminal know which PHP version to use when you run commands from the base path of your project.

For this specific use case Valet offers an `valet php` command. This command aliases the PHP version within the folder of your project to the isolated PHP version.

## Use aliases for the ultimate DX

To further optimize the DX you can make yourself even more comfortable. Include this alias in your `~/.zshrc` or `~/.bashrc` and you can keep using `php` to execute commands using the correct PHP version in your CLI:

```bash
alias php="valet php"
```

In order to run also Composer on the same PHP version, set also an alias up with absolute path to Composer to keep using it like `composer require ...`:

```bash
alias composer="php /usr/local/bin/composer"
```
