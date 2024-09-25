---
title: 'How to rename a MySQL database'
slug: rename-mysql-database
category: Databases
intro: "Unlike renaming a table, you can't rename a database in MySQL sadly enough. So there is no SQL query you can execute to achieve this. However, it is possible with a workaround."
published_at: 2024-09-24T00:00:00+00:00
created_at: 2024-09-24T18:34:57+00:00
updated_at: 2024-09-25T07:47:45+00:00

---
The most important step: To get going with this, first [create a full backup of your MySQL database](/backup-mysql-databases-single-file) to make sure you don't loose any data!

## Create a newly named database

This step involves creating the database you want to rename the old database to:

```sql
CREATE DATABASE `NEW_DATABASE_NAME`;
```

## Dump & import

Dump and import the old database into your new database:

```bash
mysqldump -u USERNAME -p OLD_DATABASE_NAME | mysql -u USERNAME -p NEW_DATABASE_NAME
```

## Drop the old database

If your really sure, you can (with the backup on hand) remove the old database safely:

```sql
DROP DATABASE `OLD_DATABASE_NAME`
```