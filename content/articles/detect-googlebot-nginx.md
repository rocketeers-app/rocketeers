---
title: 'Detect Googlebot visits using nginx'
slug: detect-googlebot-nginx
category: Nginx
intro: 'How to detect when and how often Googlebot visits your website using a few configuration lines in Nginx.'
published_at: '2024-11-18T00:00:00+00:00'
created_at: '2024-11-18T11:30:51+00:00'
updated_at: null

---
## Detecting Googlebot

It's very easy to detect the Googlebut using the user agent in Nginx, here we use the `map` directive to set the variable `$googlebot` to `yes` or keep it empty depending on the given user agent:

```bash
map $http_user_agent $googlebot {
    default "";
    "~*googlebot" "yes";
}
```

## Logging the requests

When `$googlebot` is filled, we want to log the request in a log file. This can be done using the `access_log` directive:

```bash
access_log /var/www/logs/googlebot.log bots if=$googlebot;
```

That's it!

You can read here [how you can log multiple bots](/log-bot-requests-nginx) how to log multiple bots for your virtual host in Nginx.