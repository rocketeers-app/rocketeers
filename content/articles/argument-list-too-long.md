---
title: 'Argument list too long (Bash: /bin/rm)'
slug: argument-list-too-long
category: 'Command Line'
intro: null
published_at: 2022-10-20T00:00:00+00:00
created_at: null
updated_at: 2024-09-18T15:39:53+00:00

---
## The error and problem

Sometimes you can encounter this error when executing a `rm ./directory/*` inside a directory to clean it up:

```bash
$ bash: /bin/rm: Argument list too long
```

## Why this happens

This is because of the `ARGS_MAX` setting in your operating systems config, which defines the maximum argument size a command can accept. The solution is to not use a wildcard in your command:

```bash
rm ./directory
```

But the downside to this, is that you're now deleting the directory as well. And most of the times you don't want this. Because then you need to recreate the directory again and you have to take in account of the persmissions the directory previously had.

## The solution

The solution is to use the `find` command, which can perform actions directly inside a directory and only on the files. This way you don't need to use a wildcard (which would introduce the same problem):

```bash
find ./directory -type f -delete
```

You can even make it more specific to only delete certain files, in this example to only delete log files:

```bash
find ./directory -name '*.log' -type f -delete
```