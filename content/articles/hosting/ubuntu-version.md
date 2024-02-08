---
title: How to check Ubuntu version
slug: ubuntu-version
category: Hosting
intro: Learn how to quickly get the Ubuntu version you're running using the command line.
published_at: 2024-02-08
---

If you want to know which Ubuntu version your server is running, simply execute the following command using the command line:

```bash
lsb_release -a
```

If you want to get a more specific output, so you only get one of the lines output by the command above. You can use the following parameters, where you'll see that every line has a logical letter corresponding to the label name:

```bash
lsb_release -i # Outputs: "Distributor ID: Ubuntu"
lsb_release -d # Outputs: "Description: Ubuntu 18.04.6 LTS"
lsb_release -r # Outputs: "Release: 18.04"
lsb_release -c # Outputs: "Codename: bionic"
```

If you only want the value and not the label of the output, add a the `s` parameter to the command:

```bash
lsb_release -is # Outputs: "Ubuntu"
lsb_release -ds # Outputs: "Ubuntu 18.04.6 LTS"
lsb_release -rs # Outputs: "18.04"
lsb_release -cs # Outputs: "bionic"
```
