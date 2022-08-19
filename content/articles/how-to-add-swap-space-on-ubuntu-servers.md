---
title: How to add Swap Space on Ubuntu servers
slug: how-to-add-swap-space-on-ubuntu-servers
published_at: 2022-08-17
---

On servers with not a lot of RAM memory (< 1 GB) it's recommended to add some extra swap space in case a server needs a little bit more memory to keep everything going and to prevent it runs out of memory and can't continue processing requests.

## Choosing how much memory

The first step is to decide how much swap space you want to add to the server. I choose mostly 1 GB or 2GB. In this case, the notiation should be 1G (GB) or 1000M (MB).

```bash
sudo fallocate -l 1G /var/swap.1
```

## Enable swap space

Next step is to setup the swap file correctly and activate the swap space:

```bash
sudo chmod 600 /var/swap.1
sudo /sbin/mkswap /var/swap.1
sudo /sbin/swapon /var/swap.1
```

## Configure swappiness and cache pressure

To configure how fast the system will make use of the swap memory, we can tweak the values of the swappiness and the cache pressure.

The higher the swappiness, the faster it will reach for swap memory. Because we're running servers we would like to decrease the default swappiness (which is 60) of our Ubuntu servers.

Cache pressure defines how fast the system will take the memory back after it has been used. After some research and testing we found that these values work well on most server configurations:

```bash
sudo sysctl -w vm.swappiness=10
echo "vm.swappiness=10" | sudo tee -a /etc/sysctl.conf

sudo sysctl -w vm.vfs_cache_pressure=50
echo "vm.vfs_cache_pressure=50" | sudo tee -a /etc/sysctl.conf
```

### Make the changes permanent

We want to make these changes permanent and keep them also after a server reboots, so we need to execute these commands to make sure they will:

```
echo "/var/swap.1 none swap sw 0 0" | sudo tee -a /etc/fstab
sysctl -p
```
