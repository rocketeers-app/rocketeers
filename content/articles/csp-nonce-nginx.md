---
title: Configure Content Security Policy with nonce using Nginx
slug: content-security-policy
category: Nginx
intro: How to configure Content Security Policy (CSP) with secure and easy to configure nonces in Nginx.
published_at: 2024-01-21
---

## What is a Content Security Policy (CSP)

A Content Security Policy (CSP) is an added layer of security that helps to detect and mitigate certain types of attacks, including Cross Site Scripting (XSS) and data injection attacks. These attacks are used for everything from data theft to site defacement or distribution of malware.

In simple terms, CSP is a list of approved sources for the types of resources that can be loaded on a page. For example, you can specify that images may only come from a certain domain, or that scripts may only come from another domain. When a browser requests a page, it will only load or run scripts/resources from the approved domains.

## What is a nonce

A nonce is a random string that is generated for each request. It is used to uniquely identify a request and is often used to prevent CSRF attacks. The nonce can be attached to the tags of scripts and stylesheets, to make sure only these tags are allowed to be parsed by the browser.

## Where to define CSP on

On multiple levels you can define your CSP configuration, you can define it on the server, on the application level or heck, even on the client side in your HTML. But the problem with defining CSP on client side, is that full static caching is not possible anymore.

The choice where to put your CSP configuration is based mostly on the situation you need it for. When you want every request secured the same way and have a lot of static content you need to cache, the server level is the place to define CSP. Because when requests aren't always touching the application layer, it is really the only place you can configure CSP. But when you have a lot of dynamics and need to define CSP flexibly, the application level is more convienent.

When it's about performance, the server level is unbeaten. Especially someone like me who is a big fan of static caching, the server level is the way to go.

## Requirements

We need a server with Nginx installed and the sub_filter module enabled. The sub_filter module is used to replace the nonce placeholder with the generated nonce.

How to check if the sub_filter module is enabled:

```bash
nginx -V 2>&1 | tr ' ' '\n' | grep -qi 'http_sub_module' && echo "installed" || echo "not installed"
```

If the module is present, the ouput of the command above will be `installed`.

## Configuring Nginx

### We need a nonce

A nonce should be a lenghty random string and therefore unique for each request. In Nginx we could create a variable containing a unique random string, but this ends up installing extensions to be able to do so. So instead we use the SSL session ID as a nonce. This is a unique string for each request and is already available in Nginx. Fortunately the session ID contains only characters that are allowed in a nonce.

```bash
set $cspNonce $ssl_session_id;
```

### Injecting the nonce into the response

Now we have a nonce, we need to inject it into the responses that Nginx serves:

```bash
sub_filter_once off;
sub_filter_types *;
sub_filter NGINX_CSP_NONCE $cspNonce;
```

Here we use `NGINX_CSP_NONCE` as the placeholder for the nonce. This placeholder can be used in the output of your application, and as long it goes through Nginx, it will be replaced with a fresh and unique nonce:

```html
<script nonce="NGINX_CSP_NONCE">
/**
 * Your inline script
 */
</script>
```

### Sending the nonce with the CSP headers

Now to apply the nonce to the CSP headers sent by Nginx to the client, we can use the `add_header` directive:

```bash
add_header Content-Security-Policy "default-src 'self'; script-src 'self' 'nonce-$cspNonce'; style-src 'self' 'nonce-$cspNonce' always";
```

This CSP policy indicates that every source should come from the same domain as the page itself. The scripts and stylesheets should also contain the nonce that was generated for this request, to verify that only scripts and styles are loaded that are meant to load.

That's it, now you have a CSP policy that is unique for each request and is compatible with full static caching. There are a lot more options to configure CSP, but this is the basic setup. More rules can be found at [Content Security Policy (CSP) Quick Reference Guide](https://content-security-policy.com/).
