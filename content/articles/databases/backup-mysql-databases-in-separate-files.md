---
title: Backup MySQL databases in separate files
slug: backup-mysql-databases-in-separate-files
category: Databases
intro: How to dump existing MySQL databases on a server in separate backup files.
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

# Skip exporting these databases, separated by "|"
SKIP="Database|mysql|sys|information_schema|performance_schema"

# Get all databases on server
DATABASES=`
    echo "SHOW DATABASES;" |
    mysql --user="$USER" --password="$PASSWORD" |
    grep -v -E "^(${SKIP})$"
`

# Loop through databases
for DATABASE in $DATABASES
do
    # Export database into separate file
    mysqldump \
        --user="$USER" \
        --password="$PASSWORD" \
        $OPTIONS \
        "$DATABASE" \
        > ./$DATABASE.sql
done
```

## How to use

You can use this by copying the script, save it in an `backup.sh` file and then execute `chmod +x ./backup.sh` to give the file execution permissions.

Execute the script with `./backup.sh`.
