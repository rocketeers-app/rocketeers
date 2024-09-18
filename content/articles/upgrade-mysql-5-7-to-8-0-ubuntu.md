---
title: How to upgrade MySQL 5.7 to 8.0 on Ubuntu
slug: upgrade-mysql-5-7-to-8-0-ubuntu
category: Databases
intro: Learn how to safely upgrade your database server from MySQL 5.7 to MySQL 8.0 on Ubuntu.
published_at: 2023-01-12
---

### Backup existing databases (don't skip)

Don't skip this part, it can save you a lot of trouble when something goes wrong!

[Backup the databases in separate files](/backup-mysql-databases-in-separate-files) or choose to [backup your databases in a single file](/backup-mysql-databases-except-system-databases-in-single-file). Possibly the latter is easier when needing to import the backup and importing it all at once.

### Remove current MySQL version

```bash
sudo apt purge mysql-*
```

### Install essential packages and add apt key

```bash
sudo apt install -y dirmngr # essential package for adding apt key
sudo apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 467B942D3A79BD29
```

### Add MySQL 8.0 repository source

```bash
echo "deb http://repo.mysql.com/apt/ubuntu $(lsb_release -sc) mysql-8.0" | sudo tee /etc/apt/sources.list.d/mysql-8.0.list
```

### Update apt repositories & install MySQL 8.0

```bash
sudo apt-get update
sudo apt-get install -y mysql-server mysql-client
```

### Check if MySQL 8.0 is installed

When everything goes well, you're done. MySQL version 8.0 is installed. You can verify this by checking the status of the MySQL daemon and the MySQL version:

```
sudo service mysql status
```

This should output that MySQL is `active (running)`. To make sure you're on the new version, check the MySQL version:

```bash
sudo mysql --version
```

Should show something like:

```
mysql  Ver 8.0.31 for Linux on x86_64 (MySQL Community Server - GPL)
```

### Help! MySQL doesn't start anymore

Check the error logs of MySQL to find the cause, most of the times it provides a clear message and it's probably because of some deprecated configuration inside in one of the `/etc/mysql` config files.

An example of an error message I have got in the past. Removing `NO_AUTO_CREATE_USER` from the `sql_mode` fixed the issue:

```
2023-01-12T09:21:12.834467Z 0 [ERROR] [MY-000077] [Server] /usr/sbin/mysqld: Error while setting value 'NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' to 'sql_mode'.
```
