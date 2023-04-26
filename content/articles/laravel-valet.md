---
title: Laravel Valet
slug: laravel-valet
category: Laravel
intro: For Mac users Laravel Valet is an execellent tool to develop your Laravel apps locally.
published_at: 2023-04-26
---

## What is Laravel Valet?

Laravel Valet is a tool that makes developing locally more enjoyable, because it makes your Mac instantly ready for development on your local computer. It's a minimalist tool, that uses Homebrew to install everything you need and get started quickly.

Laravel Valet uses Nginx, DnsMasq and PHP binaries to make it easy to develop using PHP and being able to switch to different PHP versions.

## Not only for Laravel apps

Despite its name, Laravel Valet is not only for developing Laravel apps. Valet supports out of the box the following types of projects to run locally on your computer.

-   Laravel
-   Bedrock
-   CakePHP 3
-   ConcreteCMS
-   Contao
-   Craft
-   Drupal
-   ExpressionEngine
-   Jigsaw
-   Joomla
-   Katana
-   Kirby
-   Magento
-   OctoberCMS
-   Sculpin
-   Slim
-   Statamic
-   Static HTML
-   Symfony
-   WordPress
-   Zend

## How to install Laravel Valet

First ensure Homebrew is up to date with the latest software packages:

```bash
brew update
```

Then, install PHP using:

```bash
brew install php
```

Make sure that `~/.composer/vendor/bin` is in your system's PATH, so that after composer is installed, you can install Laravel Valet as a global package:

```bash
composer global require laravel/valet
```

At last, install Valet using the `install` command:

```bash
valet install
```

After that, you can use any \*.test domain to use locally on your projects.

## Using different PHP versions

Install different PHP versions you need for you local repositories, you can install additional PHP version using:

```bash
brew install php@8.3
```

Replace the version number with the version you want to install. After that you can tell Laravel Valet to use this PHP version for your project or as a new default PHP version for all sites.

To use PHP 8.3 for all sites:

```bash
valet use php@8.3 # use --force when this is not enough
```

Or only for a specific site:

```bash
valet isolate php@8.3 # execute this inside the correct ~/Sites/[site] folder
```

You can also set a specific version for Laravel Valet to use, when using the `valet use` (without a PHP version) command. The PHP version can be determined from a `.valetrc` file in the root of the project:

`php=php@8.3`

After adding this file, you can execute `valet use` to always use the specified PHP version with Laravel Valet.
