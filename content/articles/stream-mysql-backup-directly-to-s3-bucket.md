---
title: Stream MySQL backup directly to S3 bucket
slug: stream-mysql-backup-directly-to-s3-bucket
published_at: 2022-08-24
---

## Offsite backup location

When creating backups for your database it is recommended to save the backups to an offsite storage facility. This way when you crash or delete the wrong files on your server, you'll always have the backups in place on another filesystem.

And if this is the case, then you'll probably want to know how to stream the backup directly to the external location! Because saving the file locally first would be very inefficient and also consumes a lot of diskspace.

So a simple `mysqldump` to save to local disk won't do it anymore. Let's have a look!

## How to stream the backup directly to S3

First we start the backup using `mysqldump`, I have some preferred parameters on there, but you can change this to your own preferences.

Then we pipe the data directly to `gzip` to compress the data first, we use the highest (`9`) compression to keep storage costs low as possible.

After compressing we pipe it through `pv` to make sure we don't hit any bandwidth limits, we use here a limit of 1MB (`1m`) per second. In case you want faster uploads you should increase this.

After that we can safely stream the data to S3 using the `s3cmd` command line tool, which can be installed very easily using `apt`. We use the `--acl-private` option to make sure the backup can never be accessed publicly.

```bash
# Credentials
DATABASE="Your database name here"
PASSWORD="Your database password here"
BACKUP_PATH="File path for saving on the S3 bucket here"

# Backup command
mysqldump --password=$PASSWORD --add-drop-table --column-statistics=0 --extended-insert --no-tablespaces --single-transaction --skip-comments $DATABASE |
gzip -9 |
pv -L 1m -q |
s3cmd --acl-private put - s3://$BACKUP_PATH;
```
