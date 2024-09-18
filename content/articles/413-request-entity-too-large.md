---
title: '413 Request Entity Too Large in Nginx'
slug: 413-request-entity-too-large
category: Errors
intro: 'When uploading files you can encounter this error, which is caused by a limit in the Nginx configuration.'
published_at: 2024-01-22T00:00:00+00:00
created_at: null
updated_at: 2024-09-18T15:35:52+00:00

---
## About error 413

The error with response code 413 shows up as "Request Entity Too Large" in the error logs of Nginx and "Payload Too Large" in the developer console of your browser. Other ways of telling you about this same error could be "Content Too Large" or "Requested content-length of ... is larger than the configured limit of ...".

## Why do I see this error

This error happens when the uploaded file is larger than the configured maximum body size in Nginx. Therefore the solution is to increase this limit.

## Solution

By increasing the `client_max_body_size` in Nginx, we can make sure the uploaded files are accepted. This can be done in the `nginx.conf` file, or in the `sites-available` configuration file of your website:

```bash
client_max_body_size 100M;
```

You can set the limit using these units:

```bash
ms	# milliseconds
s	# seconds
m	# minutes
h	# hours
d	# days
w	# weeks
M	# months, 30 days
y   # years, 365 days
```