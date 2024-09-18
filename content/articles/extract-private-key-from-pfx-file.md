---
title: How to extract private key from PFX file
slug: extract-private-key-from-pfx-file
category: Security
intro: Sometimes you receive a PFX file, which is a file that bundles both certificate and private key of a SSL certificate. Here's how to extract the private key.
published_at: 2022-08-10
---

For this we need the `openssl` command line tool. Using the following command you can extract the private key from a PFX file:

```bash
openssl pkcs12 -in pfx-file.pfx -nocerts -out private-key-file.pem -nodes
```
