---
title: Reclaim diskspace on Ubuntu server
slug: reclaim-diskspace-on-ubuntu-server
published_at: 2022-08-24
---

There are a few ways that make it possible to reclaim diskspace right away on a server. This is very handy when your server is low on diskspace. Let's dive in!

## Shrink log files

Using this command, we can shrink logfiles within a specific size. In this example we shrink all system log files to have a maximum size of 500 MB:

```bash
sudo journalctl --vacuum-size=500M
```

**This article will be updated with more examples in the future**
