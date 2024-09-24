---
title: 'How to get A+ grade SSL using Cloudflare'
slug: a-grade-ssl-using-cloudflare
category: Security
intro: 'By default Cloudflare configures the security for SSL and HTTPS traffic for maximum connectivity and not for best security. Your using Cloudflare, but you still want to have that A+ grade on SSLLabs.'
published_at: 2024-09-24T00:00:00+00:00
created_at: 2024-09-24T19:10:43+00:00
updated_at: 2024-09-24T19:10:43+00:00
---

Connectivity and security are unexchangeable, by letting more old insecure clients connect, you lower the bar for all clients that connect to your website.'

To keep everything as secure as possible, it is advised to make use of the best new practices and to let go of old and crumbling technology. On the web security is always improving and therefore shifting away from older technologies that just don't make the cut anymore.

To analyze your HTTPS connection for your website, the golden standard for SSL configuration is the [SSL Server Test from SSLLabs](https://globalsign.ssllabs.com). This test gives your security configuration a grade and shows you if there are areas for improvement.

The highest grade is an A+ and to achieve this using Cloudflare, follow these easy steps:

## Getting started

Login to Cloudflare and navigate to the domain which you want to improve the SSL configuration for.

Navigate to the `SSL/TLS` section and then click on the `Edge Certificates` submenu.

## Enable Always Use HTTPS

Enable HTTPS for every visitor by enabling the `Always Use HTTPS` option.

## Enable HSTS

To make sure a browser can't connect using HTTP anymore and go directly into HTTPS mode, choose `Enable HSTS` to configure HTTP Strict Transport Security (HSTS)`.

Acknowledge the notice that once this setting is enabled, you can't easily go back. So if your website or server does still need HTTP (yikes!) for some legacy URL, you have a problem. But the HTTP URL is already a problem on itself.

## Set minimum TLS version to 1.2

Scroll down until you see `Minimum TLS Version` and select `1.2` as the minimum version clients can use to connect to your website. This skips unsecure versions 1.0 and 1.1 of TLS. At some point it should be feasible to add 1.3 as the minimum version, but nowadays there are too many clients still compatible with 1.2 only.

## Make sure to enable `TLS 1.3`

Enable TLS 1.3 by making sure the toggle is switched on, this way the newest version of TLS can be used by all clients.

## Fix legacy HTTP URLs automatically

This one is not necessarily needed for an A+ grade on SSLLabs, but enabling `Automatic HTTPS Rewrites` makes sure your websites does not follow or uses any HTTP references anymore. Everything should be HTTPS, to make sure no mixed content is used on your website.