---
title: How to get processes with highest memory usage
slug: how-to-get-processes-with-highest-memory-usage
published_at: 2022-08-12
---

Run this command to show the top 10 processes that are using the most memory (RAM) on your server:

`ps -eo cmd,%mem --sort=-%mem | head -n 11`
