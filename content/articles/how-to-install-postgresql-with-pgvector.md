---
title: How to install PostgreSQL with pgvector on Ubuntu 22
slug: how-to-install-postgresql-with-pgvector-on-ubuntu-22
category: Databases
intro: Turn PostgreSQL in a vector database using the pgvector extension on Ubuntu 22.
published_at: 2023-12-02
---

We assume you already have provisioned a Ubuntu 22.x server, ready to get going.

## Install PostgreSQL

If you haven't already installed PostgreSQL on your server, execute these commands to install it from the official repository:

```bash
sudo apt install -y postgresql-common
sudo /usr/share/postgresql-common/pgdg/apt.postgresql.org.sh
```

## Install pgvector

When PostgreSQL (version 15) is installed, run the following command:

```bash
sudo apt install postgresql-15-pgvector
```

## Enable the pgvector extension

The last step to turn PostgreSQL in a vector database, run the following query as the postgres user:

```bash
sudo -u postgres psql # run as postgres user
CREATE EXTENSION vector; # create the vector extension
```

## Optional: Start PostgreSQL automatically

Configure PostgreSQL to start automatically after booting your server:

```bash
sudo systemctl enable postgresql
sudo service postgresql start
```
