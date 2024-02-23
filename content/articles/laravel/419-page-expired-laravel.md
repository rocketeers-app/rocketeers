---
title: How to fix 419 Page Expired error in Laravel
slug: 419-page-expired-laravel
category: Laravel
intro: When working with Laravel you will encounter this error from time to time. Here's how you can fix this error.
published_at: 2024-02-23
---

## Why is the page expired?

Laravel uses Cross-Site Request Forgery (CSRF) as a protection mechanism, that protects your app from external HTTP requests to your application.

Requests from the outside cannot always be trusted, because they can try to mingle with the data and sessions of your users.

CSRF works by generating a unique and randomly generated token that only your application knows and therefore it can detect if a request is allowed by verifying this token. The token expires automatically to make sure it cannot be retrieved and used again and again.

## When does this happen

A page expired error can happen when you've forgotten to send the randomly generated CSRF token along with a "POST", "PUT", "PATCH", or "DELETE" request.

This typically happens when making an AJAX request or when submitting a form.

## How to fix the error

When submitting a form, always add a hidden input named `_token` with the value set to `csrf_token()`. More easily you can use the `@csrf` Blade directive which is a shortcut to output this hidden input.

If you're performing an AJAX request, then it's because you've forgotten to add the `X-CSRF-TOKEN` header to the request.

You can add this header automatically to every AJAX request when using the popular [Axios](https://axios-http.com) Javascript HTTP library:

```javascript
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
```

Or when using jQuery:

```javascript
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
```

Another option - depending on your use case - is to [disable the verification of the CSRF token](/how-to-disable-csrf-in-laravel) for all or specific routes in your application.

In case of stateless requests like API or webhooks this makes sense and is the use of API tokens or signed routes more suitable.
