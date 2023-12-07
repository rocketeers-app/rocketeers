---
title: Backup MySQL databases except system databases in a single file
slug: backup-mysql-databases-except-system-databases-in-single-file
category: Databases
intro: How to dump all MySQL databases on a server in a single file with the exception of certain (system) databases.
published_at: 2023-01-12
---

## MySQL backup bash script

A clear and simple bash script to export all MySQL databases on your server into a single backup file, excluding databases you don't want to backup.

With inline comments, this is the bash script to export all databases into a single file with exception of certain databases:

```bash
# MySQL username & password
USER=""
PASSWORD=""

# MySQL dump options
OPTIONS="--add-drop-table --extended-insert --single-transaction --skip-comments"

# Skip exporting these databases, separated by "|"
SKIP="Database|mysql|sys|information_schema|performance_schema"

# Get all databases on server, except the skipped ones
DATABASES=`
    echo "SHOW DATABASES;" |
    mysql --user="$USER" --password="$PASSWORD" |
    grep -v -E "^(${SKIP})$" |
    tr '\n' ' '
`

# Export database into a single file
mysqldump \
    --user="$USER" \
    --password="$PASSWORD" \
    $OPTIONS \
    --databases $DATABASES \
    > ./databases.sql
```

## How to use

You can use this by copying the script, save it in an `backup.sh` file and then execute `chmod +x ./backup.sh` to give the file execution permissions.

Execute the script with `./backup.sh`.
