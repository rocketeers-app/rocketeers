---
title: How to measure TTFB (Time To First Byte)
slug: how-to-measure-ttfb-time-to-first-byte
category: Performance
intro: TTFB is one of the most important metrics to measure your website or webapp performance. Because only after the first byte the browser can begin to render it.
published_at: 2022-08-24
---

The performance of a web server is very important for your web application. The first metric that comes to mind when measuring web application performance is the TTFB (Time To First Byte).

This number shows the time it takes for the server to return the first byte in response of a request from a client.

We can easily get the time it takes for the server to process a HTTP request using the following command:

```bash
URL="https://rocketee.rs"

curl -o /dev/null \
    -H 'Cache-Control: no-cache' \
    -s \
    -w "TTFB: %{time_starttransfer}" \
    $URL
```

This command takes care of two important things:

1. Make sure we don't get an earlier cached version of the webpage
2. Only shows the number we're interested in using silent mode and directing output to `/dev/null`
