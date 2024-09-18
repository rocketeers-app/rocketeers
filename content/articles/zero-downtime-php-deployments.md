---
title: Zero downtime PHP deployments
slug: zero-downtime-php-deployments
category: Hosting
intro: Let me show you how you can deploy your PHP website or web applications without any downtime, using separate releases so you can rollback to a previous release quickly. 
published_at: 2024-03-13
---

## Deploying without downtime

Of course you want to deploy your PHP applications without any interruptions for your visitors and users. But somehow, this isn't as simple as it reads. The combination of PHP (FPM), Nginx and separate release folders make this task a little more complex that we would like. That's the bad news, the good news is we have a great way to solve these issues.

## Why separate releases are important

Why is it important to have separate releases? While deploying a new release, you still want to have the current release up and running. This can only be achieved by not overwriting the old release with the new release. Also the only way we can make sure you can rollback a deployment instantly, when it's clear that there are problems with the just released version. By using a symlink, we can achieve multiple releases and point to one specific release.

## What are common issues at achieving zero downtime deployments

The most common issue regarding zero downtime deployments is the moment of switching from the current to the next version, this could require reloading the Nginx and PHP FPM processes and so you get challenged to keep your uptime.

> WORK IN PROGRESS. ARTICLE WILL BE UPDATED IN NEAR FUTURE.
