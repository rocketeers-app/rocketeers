---
title: How to install Composer packages locally
slug: install-composer-packages-locally
published_at: 2023-11-18
category: Command Line
---

## Developing Composer packages locally

During development I regularly need to install Composer packages from a Git repository on my local machine. When your developing a Composer package, you usually want to see the changes you've made to a package directly when using or testing it on a PHP project.

This can be done using the symlink feature, where Composer is instructed to symlink the repository from your local drive. This also means you have to make sure the package is in the same folder as the PHP project your installing the package to.

Sometimes I need to do this multiple times a day. Because it is a little anoying to do this every time manually, while also tending to forget the JSON structure that's needed. That's why I put in the effort to create a sweet Bash function (or alias) for this.

## What does it do

The bash function handles some common situations gracefully:

-   It prevents exection in the wrong directory (a folder without composer.json)
-   It removes the current vendor folder and composer.lock file to prevent conflicted packages when installing the local package
-   It returns the changes on files done by the alias back to its prior state, so you won't commit the wrong composer.json or composer.lock file by accident

Bottom line, it takes the pain away of setting it all up manually!

## The bash function

The function checks for an existing composer.json, leverages the composer binary to change the configuration of the composer.json, removes the current vendor and composer.lock to discard any conflicting situations, requires the package to install it using the configured symlink and finally removes the changes made from the Git repository like it's never been changed. But by still keeping the `vendor` folder in tact, the package will be symlinked locally.

```bash
package() {

    if [[ ! -f "composer.json" ]]; then
        echo "composer.json not found"
        exit 1
    fi

    VENDOR="${2:-vormkracht10}"

    composer config repositories.$1 '{"type": "path", "url": "../'$1'", "options": {"symlink": true}}' --file composer.json

    rm -Rf ./vendor
    rm -Rf ./composer.lock

    composer require $VENDOR/$1 @dev

    git checkout -- composer.json
    git checkout -- composer.lock
}
```

## Usage

You can use the Bash function in two ways:

You can change the `vormkracht10` string to the vendor or organization of your preference. When you're needing packages mostly from this vendor, it keeps the command nice and short:

```bash
package [package-name] # e.g. package laravel-ok
```

If you do need to overwrite the vendor, you can do this by setting the second parameter to a custom vendor:

```bash
package [package-name] [vendor] # e.g. package laravel-ok vormkracht10
```
