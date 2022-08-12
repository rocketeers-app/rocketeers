---
title: How to extract private key from PFX file
slug: how-to-extract-private-key-from-pfx-file
date: 2022-08-10
---

For this we need the `openssl` command line tool. Using the following command you can extract the private key from a PFX file:

`openssl pkcs12 -in pfx-file.pfx -nocerts -out private-key-file.pem -nodes`
