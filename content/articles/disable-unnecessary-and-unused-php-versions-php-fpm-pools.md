---
title: Disable unnecessary and unused PHP versions (FPM pools)
slug: disable-unnecessary-and-unused-php-versions-php-fpm-pools
category: Hosting
intro: Hosting your application optimally means you need to take care of the valuable server resources. PHP FPM can keep memory occupied even when not actively used.
published_at: 2022-08-24
---

When running PHP applications it's a common mistake to forget to turn off unused PHP versions. This mostly happens when you install a new PHP version and forget to uninstall or disable the previous PHP versions.

It is no problem to keep multiple PHP versions installed on your server. But it could be a problem to keep it running on your server. Likely this happens when using PHP FPM, which has a default www pool per PHP version that isn't turned off when it's not in use anymore.

So it could be running forerver and keeps precious server memory occupied.

## Stop unused PHP versions (FPM pools)

Stopping the processes for a PHP FPM pool is easy, using this command for your unneeded PHP version (e.g. 7.4):

```bash
sudo service php7.4-fpm stop
```

## Prevent PHP versions from starting on boot

To prevent the PHP version from starting when you reboot your server, disable the service all together:

```bash
sudo systemctl disable php7.4-fpm
```

> Using [Rocketeers](/) you won't have this problem. When changing PHP versions, Rocketeers will detect which sites and applications are running which versions and will disable all unused versions on your server.
