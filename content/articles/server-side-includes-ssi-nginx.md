---
title: Server Side Includes (SSI) in Nginx
slug: server-side-includes-ssi-nginx
category: Nginx
intro: Server Side Includes can be a very handy feature when dealing with caching or including (dynamic) files into static files. Here's how to use it and configure Nginx to enable the power of SSI.
published_at: 2023-12-07
---

## What are Server Side Includes (SSI)

Server Side Includes (SSI) is a simple scripting language used on web servers to include content dynamically in web pages. SSI directives are embedded within HTML pages and are processed by the web server before the page is sent to the client's browser. The server executes the directives and includes the specified content in the final HTML document that is delivered to the user.

SSI is typically used for tasks such as:

1. Including Content: You can include the content of one file into another. This is useful for creating reusable components or headers and footers that appear on multiple pages.

```html
<!--#include virtual="/path/to/header.html" -->
```

2. Date and Time Stamps: You can insert the current date and time into your web pages.

```html
<!--#echo var="DATE_LOCAL" -->
```

3. Conditional Statements: SSI supports simple conditional statements, allowing you to include or exclude content based on certain conditions.

```html
<!--#if expr="${QUERY_STRING} = 1" -->
Content for query string 1.
<!--#else -->
Content for other cases.
<!--#endif -->
```

4. Variable Setting and Displaying: You can set variables and display their values.

```html
<!--#set var="pageTitle" value="My Page" -->
<title><!--#echo var="pageTitle" --></title>
```

To use SSI, your web server needs to be configured to recognize and process SSI directives. The file extension ".shtml" is often associated with SSI-enabled files, but the configuration can vary depending on the server software being used (e.g., Apache, Nginx). Make sure that the server administrator has enabled SSI processing for the desired file extensions.

## When can SSI be useful?

While including files into another file is a typical task for dynamic scripting languages, there are some situations that SSI is comes in handy. The following situations suit SSI very well:

1. Hosting environment where scripting languages poses a security problem
2. The hosting can't be configured for executing server side scripting
3. When the file that needs to have includes is a static (HTML) file
4. The server resources are limited; SSI is very performant at high traffic
5. It is straightforward, lightweight and makes HTML a little bit dynamic
6. You have no excuses anymore for an outdated copyright year number in the footer

## How to enable SSI in Nginx

### Add nginx apt repository

```bash
echo "deb http://nginx.org/packages/ubuntu/ $(lsb_release -sc) nginx
deb-src http://nginx.org/packages/ubuntu/ $(lsb_release -sc) nginx" > /etc/apt/sources.list.d/nginx.list
sudo curl -L https://nginx.org/keys/nginx_signing.key | sudo apt-key add -
sudo apt-get update
```

### Install nginx using nginx-full

```bash
sudo apt install -y nginx-full
```

### Configure SSI

Add in the location block that needs to use SSI, the following rule:

```bash
location / {
    ...
    ssi on;
    ...
}
```

### Reload Nginx service

Reload the Nginx service to apply the configuration changes without downtime:

```bash
sudo service nginx reload
```
