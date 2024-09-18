---
title: How to get top processes with highest memory usage
slug: top-processes-memory
category: Hosting
intro: This command shows you which processes are eating all of your server memory.
published_at: 2022-08-12
---

Run this command to show the top 10 processes that are using the most memory (RAM) on your server:

```bash
ps -eo cmd,%mem --sort=-%mem | head -n 11
```
