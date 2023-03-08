---
title: Creating an encrypted cookie value in Laravel
slug: creating-an-encrypted-cookie-value-in-laravel
category: Laravel
intro:
published_at: 2023-03-08
---

Laravel can encrypt cookies automatically using the `\App\Http\Middleware\EncryptCookies::class` middleware. It's so easy, you don't have to think about it when adding your cookies to the response.

But when you want to hit your own application with a request that needs a certain cookie, you can't simply add the cookie to the HTTP request and you also cannot encrypt it using the `encrypt()` helper. This is because cookies need a different treatment when creating the exact encrypted cookie value.

When digging in the source of Laravel we found the following code and we wrapped it up in a helper, because we have a specific use case for an application that needs to perform HTTP requests to itself, with some encrypted cookies.

Here we go, this helper can be added to any file your keeping your little helpers in:

```php
if (! function_exists('encrypted_cookie_value')) {
    function encrypted_cookie_value(string $name, string $value): string
    {
        return app(Illuminate\Encryption\Encrypter::class)->encrypt(
            CookieValuePrefix::create($name, $encrypter->getKey()).$value,
            false
        );
    }
}
```
