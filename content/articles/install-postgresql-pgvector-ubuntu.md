---
title: How to install PostgreSQL with pgvector on Ubuntu
slug: install-postgresql-pgvector-ubuntu
category: Databases
intro: Turn PostgreSQL in a vector database using the pgvector extension on Ubuntu 22.
published_at: 2023-12-02
updated_at: 2025-01-06
---

We assume you already have provisioned a Ubuntu server, ready to get going.

## Install PostgreSQL

If you haven't already installed PostgreSQL on your server, execute these commands to install it from the official repository:

```bash
sudo apt install -y postgresql-common
sudo /usr/share/postgresql-common/pgdg/apt.postgresql.org.sh
```

## Install pgvector

When PostgreSQL is installed, run the following command:

```bash
sudo apt install postgresql-17-pgvector
```

## Enable the pgvector extension

The last step to turn PostgreSQL in a vector database, run the following query as the postgres user:

```bash
sudo -u postgres psql # run as postgres user
```

```sql
CREATE EXTENSION vector; # create the vector extension
```

## Start PostgreSQL automatically (optional)

Configure PostgreSQL to start automatically after booting your server:

```bash
sudo systemctl enable postgresql
sudo service postgresql start
```