---
title: How to optimize server performance
slug: how-to-optimize-server-performance
published_at: 2022-08-16
updated_at: 2022-08-17
---

**This article will be continuously updated with new content.**

## Disable unnecessary and unused PHP versions (FPM pools)

When running PHP applications or websites it's a common mistake to keep unused PHP versions running on your server. Mostly this happens when you upgrade the default PHP server version or add a new PHP version to run your application on. In the background these processes do not much harm, but they always will be occupying precious server memory.

[Disable unnecessary and unused PHP versions (FPM pools)](/disable-unnecessary-and-unused-php-versions-php-fpm-pools)

## Make sure enough diskspace is available

When a server does not have enough (a few GB's) of diskspace available, it cannot run within optimal conditions. Because of this, as a treshold make sure there is more than 20% available of the total diskspace capacity. To make sure we have enough diskspace available, there are some commands that can help you with this.

[Reclaim diskspace on Ubuntu server](/reclaim-diskspace-on-ubuntu-server)

## Add Swap Space to your server

To increase performance you need to make sure your server has enough memory to make sure it can execute every task. While swap space is slower than usual RAM memory, it is recommended to add at least some (1-2GB) swap space to keep the server running optimal in every situation.

[Learn how to add Swap Space to Ubuntu servers](/how-to-add-swap-space-on-ubuntu-servers)
