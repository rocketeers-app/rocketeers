---
title: 'Log bot requests in nginx'
slug: log-bot-requests-nginx
category: Nginx
intro: 'If you want to know when and how often bots visit your website, you can easily track this using the following configuration in Nginx.'
published_at: '2024-11-18T00:00:00+00:00'
created_at: '2024-11-18T11:22:41+00:00'
updated_at: '2024-11-18T00:00:00+00:00'

---
## Detect bots using Nginx

First we need to detect if the current visitor's user agent indicates it is a bot. We can do this with the `map` directive in nginx:

```bash
map $http_user_agent $bot {
    default "";
    "~*googlebot" "google";
    "~*bingbot" "bing";
    "~*slurp" "yahoo";
    "~*duckduckbot" "duckduckgo";
    "~*baiduspider" "baidu";
    "~*yandexbot" "yandex";
    "~*sogou" "sogou";
    "~*exabot" "exabot";
    "~*applebot" "apple";
    "~*twitterbot" "twitter";
}
```

This checks the user agent string for matches for known bot names and then it maps it to a specific name that is set to variable `$bot`.

## Readble log format

To make the entries readable, you can optionally choose to define a specific `log_format` for the bot requests:

```bash
log_format bots "$time_local: $request_method $scheme://$host$request_uri [$status] $bytes_sent @ $request_time ($http_referer)";
```

## Log requests when it's a bot

Now we can log these bot requests by creating a specific `bots.log` file using the `access_log` directive that logs requests only if `$bot` is filled and set the `log_format` to the newly created `bots` format.

```bash
access_log /var/www/logs/bots.log bots if=$bot;
```

## Log files per bot

If you prefer separating the logs per bot, so you can more easily see how many times specifically the Googlebot has come by your website, you can define a variable per bot:

```bash
if ($bot = "google") {
    set $google "1";
}
if ($bot = "bing") {
    set $bing "1";
}
if ($bot = "yahoo") {
    set $yahoo "1";
}
if ($bot = "duckduckgo") {
    set $duckduckgo "1";
}
if ($bot = "baidu") {
    set $baidu "1";
}
if ($bot = "yandex") {
    set $yandex "1";
}
if ($bot = "sogou") {
    set $sogou "1";
}
if ($bot = "exabot") {
    set $exabot "1";
}
if ($bot = "apple") {
    set $apple "1";
}
if ($bot = "twitter") {
    set $twitter "1";
}
```

And therefore setup log files per bot:

```bash
access_log                  /var/www/logs/bots/google.log bots if=$google;
access_log                  /var/www/logs/bots/bing.log bots if=$bing;
access_log                  /var/www/logs/bots/yahoo.log bots if=$yahoo;
access_log                  /var/www/logs/bots/duckduckgo.log bots if=$duckduckgo;
access_log                  /var/www/logs/bots/baidu.log bots if=$baidu;
access_log                  /var/www/logs/bots/yandex.log bots if=$yandex;
access_log                  /var/www/logs/bots/sogou.log bots if=$sogou;
access_log                  /var/www/logs/bots/exabot.log bots if=$exabot;
access_log                  /var/www/logs/bots/apple.log bots if=$apple;
access_log                  /var/www/logs/bots/twitter.log bots if=$twitter;
```