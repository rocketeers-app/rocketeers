---
title: How to get processes with highest CPU usage
slug: how-to-get-processes-with-highest-cpu-usage
created_at: 2022-08-12
---

Run this commando to show top 10 processes that are using the most CPU on your server:

`ps -eo cmd,%cpu --sort=-%cpu | head -n 11`
