---
title: How to get processes with highest CPU usage
slug: how-to-get-processes-with-highest-cpu-usage
category: Performance
intro: Want to know what's causing your server to slow down or what's keeping all these resources for itself. This command shows you which processes take it all.
published_at: 2022-08-12
---

Run this commando to show top 10 processes that are using the most CPU on your server:

```bash
ps -eo cmd,%cpu --sort=-%cpu | head -n 11
```
