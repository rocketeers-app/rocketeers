---
title: Importing database in MySQL using command line
slug: importing-database-in-mysql-using-command-line
published_at: 2022-08-30
---

Importing a MySQL database can be done in several ways, using a desktop app or even using the legendary phpMyAdmin!

But the most effective and fast way to import a (large) SQL file remains - as always - using the command line interface (CLI).

Using the command below you can import large SQL files in the least amount of time:

```bash
mysql -u [username] -p [database] < import.sql
```

Replace `[username]`, `[database]` and `import.sql` with the correct values in your setup.