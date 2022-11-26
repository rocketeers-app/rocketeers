---
title: How to run PHP files
slug: how-to-run-php-files
published_at: 2022-11-16
intro: You cannot execute PHP files directly on your computer without any additional tools. You need a (local) webserver that can run the PHP files.
---

## PHP is a Server-side Language

PHP is a language that runs on the server-side, that means it is normally be executed by a (web) server which can return the response that PHP generates. Typically PHP returns HTML, but it can output any type of format or file, like JSON or even images or video. Running it on the server makes PHP also a back-end language.

For comparison a great example of a language that is originally not server-side, is Javascript. This is a client-side language that can be used directly in your browser just like HTML, CSS and the likes. It also means that Javascript, CSS and HTML are front-end languages.

## How to run PHP files locally

When you want to use PHP locally and in the browser, you actually need a web server running locally on your computer. This way you can use PHP the way it is used most of the time: to build a website or web application.

For Windows and macOS users the [XAMPP](https://www.apachefriends.org/) project is still very popular for beginners to easily spin a local web environment to run your PHP application locally using the browser.

For macOS users specifically it is highly recommended to use [Laravel Valet](https://laravel.com/docs/valet). This is an CLI tool that installs all the tools you need locally and run your Laravel applications, but even any other type of website or applications like WordPress or Magento. It is a really powerful tool that works by leveraging the power of [Homebrew](https://brew.sh/).

## Command Line

When you have PHP installed on your computer or server, you can also use it to execute PHP files using the command line. This is handy when you don't need to output anything visual like a HTML design or graphic content like an image or video.

To execute a PHP file you have written, you can run it using this command:

```bash
php -r /path/to/php/file
```

When you just want to execute a short command, you do not need to create a separate file for it, you can just run it directly in the command line using the `-r` parameter:

```bash
php -r "echo time();"
```
