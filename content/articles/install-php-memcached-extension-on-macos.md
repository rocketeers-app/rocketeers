---
title: Install PHP memcached extension on macOS
slug: install-php-memcached-extension-on-macos
published_at: 2023-03-17
category: Development
---

## Install using Homebrew and PECL

If you have PHP installed using [Homebrew](https://brew.sh), you previously could also install PHP extensions using `brew` itself. But things have changed, and you need to use `pecl` to install additional extensions.

When you need to install `memcached`, you need to install this including the dependencies `zlib` and `libmemcached`:

```bash
brew install memcached libmemcached zlib
```

Then you can initiate the install via `pecl`:

```bash
pecl install memcached
```

This will ask multiple questions, where you will only need to answer the question about the path of zlib:

```bash
zlib directory [no] :
```

This path depends on the processor of your Mac, there's a difference between Apple silicon machines on Mac Intel. The path is per type of machine:

## ZLIB path

```bash
# On Apple Silicon
/opt/homebrew/opt/zlib

# On Mac Intel
/usr/local/opt/zlib
```

When given this path, the `pecl` install should complete successfully.
