---
title: Change casing of file or directory in Git
slug: change-casing-of-file-or-directory-in-git
category: Git
intro: Renaming already commited files or directories only for casing in Git will be ignored and will not show up as a change you can commit.
published_at: 2022-11-29
---

## The problem

Sometimes you encouter the problem that a file or directory does not have the correct case-sensitive name it should have. So you rename the file and change its casing. After this change, Git does not show this and the renaming can't be commited.

So this is not enough:

`mv File.php file.php`

## The reason

Since Git version 1.5.6 there is a setting `core.ignorecase` that defines if casing should be ignored by default or not. To change the default setting to pick up casing changes, you can run inside the project:

```
git config core.ignorecase false
```

Or to disable it completely on your computer, you can set it globally using:

```
git config --global core.ignorecase false
```

## The fix (without changing the config)

To fix this issue without changing any Git configurations: after you execute the `mv` command line from before, you also need to tell git that the filename has changed. This can be done by using:

```
git mv --cached File.php file.php
```
