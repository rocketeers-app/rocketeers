---
title: 'Improving PHP performance'
slug: php-performance
category: Hosting
intro: 'The performance and speed of PHP can be improved in different ways. Find out the multiple pathways to better performance.'
published_at: '2024-10-10T00:00:00+00:00'
created_at: '2024-10-10T15:10:22+00:00'
updated_at: '2024-11-21T00:00:00+00:00'

---
## Enable OPcache

Using the OPcache PHP extension is one of the most significant (and easy) things you can do to improve PHP performance. When a PHP script runs, the server translates the script into a form the computer can understand (called "opcode") every time someone visits the website. This process takes time. With the OPcache extension enabled thee translated version (opcode) is stored in memory, so the server doesn’t have to re-translate the script every time. Instead, it reuses the stored version, making the website load faster.

```
# Install OPcache extension (change PHP version accordingly)
sudo apt install php8.4-opache

# Enable it in php.ini
opcache.enable = 1
opcache.enable_cli = 1
opcache.max_accelerated_files = 50000
opcache.interned_strings_buffer = 64
opcache.memory_consumption = 256
opcache.save_comments = 1
opcache.validate_timestamps = 1
```

If you change `opcache.validate_timestamps` to `0` you can improve performance even more because OPcache does not need to check the file for modifications everytime. But then you will need to make sure you reload the PHP process every time you make changes in your code.

## Enable OPcache JIT compiler

After enabling OPcache, you should also consider enabling the [OPcache JIT compiler](/php-8-opcache-jit). It enhances performance by translating frequently executed PHP code into machine code at runtime, meaning running even more efficient on your server.

Enable JIT by adding these lines to the OPcache config:

```
opcache.jit=on
opcache.jit_buffer_size=128M
```