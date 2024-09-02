---
title: How much RAM memory on Ubuntu
slug: how-much-memory-on-ubuntu
category: Hosting
intro: This command for Ubuntu shows you the RAM memory on your server
published_at: 2024-09-02
---

The easiest way to see all installed, used, free and available RAM memory on your Ubuntu server is using the `free` command, we use the `-h` parameter for human readable sizes:

```bash
free -h
```

This outputs for example:

```
              total        used        free      shared  buff/cache   available
Mem:          7.8Gi       4.9Gi       609Mi       7.0Mi       2.3Gi       2.6Gi
Swap:         2.0Gi       253Mi       1.8Gi
```

If you only want one of these specific numbers:

```bash
# Total memory (ex. 7.8Gi)
free -h | awk '/^Mem:/ {print $2}'

# Used memory (ex. 4.9Gi)
free -h | awk '/^Mem:/ {print $3}'

# Free memory (ex. 609Mi)
free -h | awk '/^Mem:/ {print $4}'

# Shared memory (ex. 7.0Mi)
free -h | awk '/^Mem:/ {print $5}'

# Buffers/cache memory (ex. 2.3Gi)
free -h | awk '/^Mem:/ {print $6}'

# Available memory (ex. 2.6Gi)
free -h | awk '/^Mem:/ {print $7}'
```
