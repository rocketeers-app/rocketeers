---
title: Error in the HTTP2 framing layer
slug: error-in-the-http2-framing-layer
category: Errors
intro: Once in a while I got this error when connecting to an external service on servers running Ubuntu 18.x or 20.x. After some research I got this flaky bug resolved!
published_at: 2023-09-04
---

## Root cause of the error

We have a lot of servers running on [Digitalocean](https://m.do.co/c/0801ad4bd810) that sends email using an email service provider like Postmark or Mailgun. And once in every 4-5 emails that were send, I got this error message stating the error "Error in the HTTP2 framing layer" following the URL of the API it was connecting to.

At first I thought the problem was on the API service I was using, because of a drop in the SSL connection or something.

But after some research online, it wasn't a third party problem. But a problem on the server itself, and specifically a bug in the version of `curl` available in the APT repositories of Ubuntu.

## Solution

The solution was to upgrade `curl` to the newest possible version. Because this new version is not offered through APT, we need to do it manually.

## How to upgrade curl manually

Here's to install the latest `curl` version (v8.2.1) at the time of writing this article.

```bash
# Remove installed curl version
apt remove curl -y
apt purge curl -y

# Install libs and compile tooling
apt-get update
apt-get install -y libssl-dev autoconf libtool makez

# Download new curl version, unzip, configure and compile build
cd /usr/local/src
wget https://curl.haxx.se/download/curl-8.2.1.zip
unzip curl-8.2.1.zip
cd /usr/local/src/curl-8.2.1
autoreconf -fi
./configure --with-ssl
make
make install

# Install curl globally
mv /usr/local/src/curl-8.2.1/src/.libs/curl /usr/local/bin/curl
sudo ldconfig
```

When done, make sure you restart the services using `curl` on the server so it will use this new version.
