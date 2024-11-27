---
title: 'Use nginx try_files to make your site static'
slug: nginx-try-files
category: Nginx
intro: 'The `try_files` directive in nginx is incredibly powerful and useful when you want to make your dynamic website more performant. Learn how to leverage this to make your website fully static.'
published_at: '2024-11-18T00:00:00+00:00'
created_at: '2024-11-18T11:03:02+00:00'
updated_at: null

---
## How `try_files` works
This directive makes use of a fallback system. The first (of possibly multiple) file paths that exists, will be used for the incoming HTTP request.

So, for example you can set it to:

```bash
try_files index1.html index2.php
```

If `index1.html` exists, it is served by nginx. If it does not exist, it will serve using the second file `index2.php`.

## How to use `try_files` for static or cached content

As you already saw in the previous example, it is easy to put a static file in front of a dynamic file. But the only problem here is that in this case always `index.html` will be served.

You can solve this by making the first entry dynamic using variables in nginx. Requests have multiple variables that are dynamic based on the specific request the web server is receiving.

Some of these are:

```bash
$request_method # (e.g. GET/HEAD/POST/PUT/DELETE)
$scheme # http or https
$host # domain
$uri # path
$query_string # query string (e.g. `?a=b`)
```

You can find all variables on the [official nginx website](https://nginx.org/en/docs/http/ngx_http_core_module.html).

Using these variables, you can make a unique file location for each request. So this could be:

```
/cache/$host/$http_method/$uri?$query_string.html
```

This creates a path that points to the `cache` folder (relative to the document root) and inside this folder you have a custom path.

### $host
In this example it begins with a `$host` folder, this is needed when you host multiple domains from the same virtual host.

### $request_method
Then it creates a folder based on the $http_method (like GET or POST) and this is because of the simple reason we don't want to cache other requests than `GET`. So when creating the files, we only create a `/GET/` path inside this folder.

### $uri
After that we have the `$uri` which can contain slashes and therefore creates folders, while the last segment is the file. So `https://rocketee.rs/category/nginx/try_files` would create the path `category/nginx` and the file `try_files`.

#### $query_string
Not necessary, but could be useful is adding the `$query_string` variable. This makes the request unique per different query string that is used. If the content on your webpages is not affected by query strings, you could remove it and have the same cache file respond to it.

## Configuring `try_files`

Now putting this together, we got this configuration rule for `try_files`:

```bash
try_files /cache/$host/$http_method/$uri?$query_string.html index.php
```

This checks first the cache path and if it does not exist it executes index.php. So when this happens, you can use the dynamic response of index.php to create a cached file.

## Creating the cache file using PHP

In simple plain PHP this would look like this:

```php
$response = '...'; // HTML response to cache

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);
$query = parse_url($uri, PHP_URL_QUERY);

file_put_contents(
    filename: "/cache/{$_SERVER['HTT_HOST']}/{$_SERVER['REQUEST_METHOD']}/{$path}?{$query}.html",
    data: $response,
);
```

This way you can have a completely dynamic website, that still leverages the fastest cache available (static files).