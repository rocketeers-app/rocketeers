---
title: 'Zero downtime deployments using PHP-FPM and nginx'
slug: zero-downtime-php-deployments
category: Hosting
intro: 'Let me show you how you can deploy your PHP website or web applications without any downtime, using separate releases so you can rollback to a previous release quickly.'
published_at: 2024-03-13T00:00:00+00:00
created_at: null
updated_at: 2024-10-08T13:02:01+00:00

---
## Deploying with zero downtime

Of course you want to deploy your PHP applications without any interruptions for your visitors and users. But somehow, this isn't as simple as it reads. The combination of PHP (FPM), Nginx and separate release folders make this task a little more complex that we would like. That's the bad news, the good news is we have a great way to solve these issues.

## Why separate releases are important

Why is it important to have separate releases? While deploying a new release, you still want to have the current release up and running. This can only be achieved by not overwriting the old release with the new release. Otherwise your active release will have downtime while updating and replacing the files from your fresh deploymnet.

This is also the only way we can make sure you can always instantly rollback to a previous deployment, when it's clear that there are problems with the just released version. By using a symlink, we can achieve multiple releases and point to one specific release.

## What are common issues at achieving zero downtime deployments

The most common issue regarding zero downtime deployments is the moment of switching from the current to the next version, this could require reloading the Nginx and PHP FPM processes and so you get challenged to keep your uptime.

So reloading these services should be avoided and that is the tricky part. But we've figured the ultimate way to omit reloading and to keep your application and active users safe!

## The deployment process

### Creating a release structure

First we need to create a top folder `/releases` where all releases can be found and a new release using a date format. I like to format `Y-m-d-HMS` which translates to `Year-Month-Day-HourMinuteSeconds` and for example `2024-10-08-144122`. This makes sure you can always distinguish a release folder from the time it was created and it orders them from old to new automatically.

```bash
NEW_RELEASE_DIRECTORY=$(date +"%Y-%m-%d-%H%M%S")

mkdir -p /releases # create `releases` folder
mkdir $NEW_RELEASE_DIRECTORY # create a folder for the new release
```

We put the new release directory inside a variable because we need the same directory multiple times in the next steps, and we don't want to have a new timestamp every time we need it.

Also we define that we have an 'active' release folder, that's in `/releases/current`. Where `current` is a symlink (`ln -s`) to the active release folder.

### Pulling code from the git repository

Then we clone the code from the git repository. In this step it's important to not pull in anymore then we need for a new release. This means no additional history, because this will only take in extra space and makes the downloading of all data take longer and therefore slows down your deployment time.

```git clone --depth 1 --branch main --single-branch git@github.com:rocketeers-app/rocketeers.git $NEW_RELEASE_DIRECTORY```

### Install the application

This step contains al the commands you need to install your application. Using [Laravel](/laravel) this will mean installing dependencies using Composer and possibly npm but also running migrations and clearing caches.

Here is an example Laravel deployment script for a Filament app:

```bash
php composer install \
    --no-ansi \
    --no-dev \
    --no-interaction \
    --no-progress \
    --optimize-autoloader \
    --prefer-dist

# Run database migrations
php artisan migrate

# Terminate Horizon
php artisan horizon:terminate

# Clear caches
php artisan cache:clear

# Clear expired password reset tokens
php artisan auth:clear-resets

# Cache views
php artisan view:cache

# Cache routes
php artisan route:cache

# Link new storage folder
php artisan storage:link

# Optimize filament assets
php artisan filament:assets

# Cache Filament components and icons
php artisan filament:optimize

npm install
npx vite build
```

### Activate the new release

Now the critically and most significant step of the deployment process: activating the new release WITHOUT causing downtime!

First we enter the releases folder:

```bash
cd /releases
```

Then we create a new symlink called `deployment` inside:

```bash
ln -s ./releases/$NEW_RELEASE_DIRECTORY deployment
```

Now, to switch from the previous release (dynamically pointed by `releases/current`) to the new release folder, we overwrite the active `current` symlink with the newly created `deployment` symlink:

```bash
mv -Tf deployment current
```

And this makes all the difference, because this creates and overwrites a new symlink PHP-FPM and nginx will detect the change without the need of reloading!

### After deployment tasks

Sometimes it's needed to execute some optimization tasks, on a server with not a lot of diskspace, you could remove all `.git` folders to create some space:


```bash
# Remove .git folders from root and vendor files\
rm -Rf ./.git
find vendor -type d -name '.git' -exec rm -rf {} +

### That's it!

Now we have successfully deployed a PHP application without reloading anything and with zero downtime.