---
title: Export MySQL database using command line
slug: export-database-mysql-command-line
category: Databases
intro: Exporting a MySQL database is a task you will need very often when working with databases.
published_at: 2022-08-30
---

The best option to export a MySQL database as quick as possible is using the command line. You can even get fancy using compression, additional parameters to customize the export format and stream directly to an external location to save it somewhere else than your local disk.

## MySQL dump command

In the most minimal way, you can dump a MySQL database using `mysqldump` and the `--add-drop-table` parameter. Using this parameter makes it more easy to importing the file on an existing database. Without it, you will get errors when the table already exists on the destination database.

```bash
mysqldump --user=[username] --password=[password] --add-drop-table [database]
```

## Compress the backup file

When exporting the database to a backup file, it is most likely you want to compress the file to a smaller file size when saving or distributing it to another destination.

To compress the file, we can use good old `gzip`. The `-9` parameter can be lowered to `-1` make the export go faster, but the exported file larger.

```bash
mysqldump --user=[username] --password=[password] --add-drop-table [database] | gzip -9
```

## Optimize the exported file

To optimize the exported file a little bit further, we can use several parameters that make the import process smoother and remove some fluf that's not needed in the final export.

In the order of the command below, we:

-   Drop tables before creating them (`--add-drop-table`)
-   Use table locking to improve import speed (`--add-locks`)
-   Remove unneeded column statistics (`--column-statistics=0`)
-   Insert all data using one insert statement per table (`--extended-insert`)
-   Prevent acces denied errors by not using tablespaces (`--no-tablespaces`)
-   Within a single transaction to prevent an inconsistent state of the database before importing (`--single-transaction`)
-   Remove comments by skipping them in the output (`--skip-comments`)
-   Define the charset used in the export (`--set-charset`)
-   Read large tables without needing enough RAM to fit the full table in memory (`--quick`)

```bash
mysqldump --user=[username] --password=[password] --add-drop-table --add-locks --column-statistics=0 --extended-insert --no-tablespaces --single-transaction --skip-comments --set-charset --quick [database] | gzip -9
```

## Dump MySQL database to external storage

When creating backups it's desirable to save it somewhere else, because a backup file on the same disk as the database can be a single point of failure. In case your storage disk is damaged, the database and backup file are gone.

[Read how to stream MySQL back-up directly to S3 bucket](/stream-mysql-backup-directly-to-s3-bucket)
