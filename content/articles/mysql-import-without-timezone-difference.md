---
title: Import MySQL database without timezone difference
slug: mysql-import-without-timezone-difference
category: Databases
intro: When you import a MySQL database from a server to your local computer, you might notice that the dates and times are different. 
published_at: 2024-05-02
---

## Why is that?

This is because there is a timezone difference between your computer (probably in your local time) and the server (probably in UTC as it should), while your timestamp columns don't have a timezone specified.
As it is your personal computer, you want the time to display in your local timezone. But when developing, you should want everything to be in `UTC` timezone to prevent al sorts of problems (like this one!) and to easily
convert and display the correct time(zone) to your users.

## MySQL timezone setting

When you this query in MySQL:

```sql
SELECT @@global.time_zone;
```

You probably get the default value `SYSTEM` returned, this means MySQL uses the timezone your computer is set to.

## How can you fix this?

Before import a database, make sure to change the timezone to `UTC` by running:

```bash
sudo mysql -e "SET GLOBAL time_zone = '+0:00';"
```

While this fixes it for your import, this value is being reset when you restart the MySQL instance. To make this change permanent, change it in `/etc/mysql/my.cnf`:

```bash
sudo nano /etc/mysql/my.cnf # linux
sudo nano /opt/homebrew/etc/my.cnf # macos
```

Add or change under the section `[mysqld]` the value for `default-time-zone`:

```bash
default-time-zone = "+0:00"
```

To make the change active, restart MySQL:

```bash
sudo service mysql restart # linux
brew services restart mysql # macos
```
