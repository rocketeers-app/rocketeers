---
title: How to extract certificate from PFX file
slug: how-to-extract-certificate-from-pfx-file
published_at: 2022-08-10
---

For this we need the `openssl` command line tool. Using the following command you can extract the certificate from a PFX file:

`openssl pkcs12 -in pfx-pfile.pfx -nokeys -out certificate-file.pem`
