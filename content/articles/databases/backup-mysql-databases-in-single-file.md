---
title: Backup MySQL databases in single file
slug: backup-mysql-databases-in-single-file
category: Databases
intro: How to dump existing MySQL databases on a server in a single file.
published_at: 2023-01-12
---

## MySQL backup bash script

A clear and simple bash script to export all MySQL databases on your server into separate `.SQL` files.

With inline comments, this is the bash script to export all databases into separate files:

```bash
# MySQL username & password
USER=""
PASSWORD=""

# MySQL dump options
OPTIONS="--add-drop-table --extended-insert --single-transaction --skip-comments"

mysqldump --user="$USER" --password="$PASSWORD" $OPTIONS --all-databases > ./databases.sql
```

## How to use

You can use this by copying the script, save it in an `backup.sh` file and then execute `chmod +x ./backup.sh` to give the file execution permissions.

Execute the script with `./backup.sh`.
