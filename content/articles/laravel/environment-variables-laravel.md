---
title: Environment variables in Laravel
slug: environment-variables-laravel
category: Laravel
intro: A complete list of all available environment variables used in the latest Laravel (version 11).
published_at: 2024-03-13
---

## What is an environment variable

Laravel has a `config` folder that has all config files in one place, to change a configuration you could change the value in the code, or change it inside the `.env` when it has an environment variable as the default value (with a fallback).

## Typically used for secrets

Using the `.env` file has the advantage that every environment (typically local, staging or production) can have its own configuration based on the (yes) environment it runs in.

The advantage of using the config files without the `env()` helper has the advantage that other developers on the same project can't forget to set important configurations to certain required values.

But beware, everything that's a secret, should only be present in the `.env` file and never in your code or version control (like git).

## Don't use `env()` outside the config folder

It's considered a bad practice to use the `env()` helper outside your `config` folder. Always use the `config()` helper instead. Why? Because Laravel has a feature called config caching (using `artisan config:cache`) and when the cache is created, Laravel will not read the `.env` file anymore because it solely relies on the cached configuration inside your `config` folder.

## Keep your `APP_KEY` safe

When using encryption, Laravel relies on the `APP_KEY` environment variable. This variable can be conveniently generated using `artisan key:generate`.

But be careful, already encrypted values rely on the value of this key. When the key is changed, the current encrypted values cannot be decrypted anymore. If you need to change the `APP_KEY`, make sure you'll make use of [gracefully rotating the encryption keys](https://laravel.com/docs/11.x/encryption#gracefully-rotating-encryption-keys).

Save the `APP_KEY` somewhere safe, when it's gone, your encrypted values in for example your database are also gone.

> A common misconception is that the passwords in your user table are also relying on the `APP_KEY`. This is not the case!
> 
> Passwords are hashed values and are never meant to be un-hashed. Validating a password relies on the hashing algorithm (for Laravel bcrypt is the default driver) and the `APP_KEY` is only used for encrypting and decrypting.

To change your Laravel app's configuration per environment, you can use the `.env` file (derived from `.env.example`) included in every Laravel project. But this does not list all possible `env` variables. So here's a complete list with all default environment variables.

## List of all environment variables

```bash
APP_DEBUG
APP_ENV
APP_FAKER_LOCALE
APP_FALLBACK_LOCALE
APP_KEY
APP_LOCALE
APP_MAINTENANCE_DRIVER
APP_MAINTENANCE_STORE
APP_NAME
APP_PREVIOUS_KEYS
APP_TIMEZONE
APP_URL
AUTH_GUARD
AUTH_MODEL
AUTH_PASSWORD_BROKER
AUTH_PASSWORD_RESET_TOKEN_TABLE
AUTH_PASSWORD_TIMEOUT
AWS_ACCESS_KEY_ID
AWS_BUCKET
AWS_DEFAULT_REGION
AWS_ENDPOINT
AWS_SECRET_ACCESS_KEY
AWS_URL
AWS_USE_PATH_STYLE_ENDPOINT
BEANSTALKD_QUEUE
BEANSTALKD_QUEUE_HOST
BEANSTALKD_QUEUE_RETRY_AFTER
CACHE_STORE
DB_CACHE_CONNECTION
DB_CACHE_LOCK_CONNECTION
DB_CACHE_TABLE
DB_CHARSET
DB_COLLATION
DB_CONNECTION
DB_DATABASE
DB_ENCRYPT
DB_FOREIGN_KEYS
DB_HOST
DB_PASSWORD
DB_PORT
DB_QUEUE
DB_QUEUE_CONNECTION
DB_QUEUE_RETRY_AFTER
DB_QUEUE_TABLE
DB_SOCKET
DB_TRUST_SERVER_CERTIFICATE
DB_URL
DB_USERNAME
DYNAMODB_CACHE_TABLE
DYNAMODB_ENDPOINT
FILESYSTEM_DISK
LOG_CHANNEL
LOG_DAILY_DAYS
LOG_DEPRECATIONS_CHANNEL
LOG_DEPRECATIONS_TRACE
LOG_LEVEL
LOG_PAPERTRAIL_HANDLER
LOG_SLACK_EMOJI
LOG_SLACK_USERNAME
LOG_SLACK_WEBHOOK_URL
LOG_STACK
LOG_STDERR_FORMATTER
LOG_SYSLOG_FACILITY
MAIL_EHLO_DOMAIN
MAIL_ENCRYPTION
MAIL_FROM_ADDRESS
MAIL_FROM_NAME
MAIL_HOST
MAIL_LOG_CHANNEL
MAIL_MAILER
MAIL_PASSWORD
MAIL_PORT
MAIL_SENDMAIL_PATH
MAIL_URL
MAIL_USERNAME
MEMCACHED_HOST
MEMCACHED_PERSISTENT_IDMEMCACHED_USERNAMEMEMCACHED_PASSWORD
MEMCACHED_PORT
MYSQL_ATTR_SSL_CA
PAPERTRAIL_PORT
PAPERTRAIL_URL
POSTMARK_MESSAGE_STREAM_ID
POSTMARK_TOKEN
QUEUE_CONNECTION
QUEUE_FAILED_DRIVER
REDIS_CACHE_CONNECTION
REDIS_CACHE_DB
REDIS_CACHE_LOCK_CONNECTION
REDIS_CLIENT
REDIS_CLUSTER
REDIS_DB
REDIS_HOST
REDIS_PASSWORD
REDIS_PORT
REDIS_QUEUE
REDIS_QUEUE_CONNECTION
REDIS_QUEUE_RETRY_AFTER
REDIS_URL
REDIS_USERNAME
SESSION_CONNECTION
SESSION_DOMAIN
SESSION_DRIVER
SESSION_ENCRYPT
SESSION_EXPIRE_ON_CLOSE
SESSION_HTTP_ONLY
SESSION_LIFETIME
SESSION_PARTITIONED_COOKIE
SESSION_PATH
SESSION_SAME_SITE
SESSION_SECURE_COOKIE
SESSION_STORE
SESSION_TABLE
SLACK_BOT_USER_DEFAULT_CHANNEL
SLACK_BOT_USER_OAUTH_TOKEN
SQS_PREFIX
SQS_QUEUE
SQS_SUFFIX
```
