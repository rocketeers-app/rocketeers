---
title: Removing tracked files in Git that should have been ignored
slug: removing-tracked-files-in-git-that-should-have-been-ignored
category: Git
intro: Removing files that has been committed earlier in your repository is something you encouter once in a while. Read here how you can do this.
published_at: 2022-09-27
---

## The problem

Anybody that has been using Git for a longer period of time, stumbles every now and then on this pesky little problem: tracked files in your Git repository that should have been ignored from te start. But now they are added, Git can't seem to "forget" about them.

I know I have faced this one a bunch of times! And here's how you can fix this issue and make you feel all clean and happy about your repository again.

## Delete and forget unwanted committed files

In this example we have the common situation where you've forgot to add `.DS_Store` to your global or repositories `.gitignore` file on your Mac (for Windows users there is a different but evenly annoying `Thumbs.db` that gets created now and then).

```bash
find . -name .DS_Store -print0 | xargs -0 git rm -f --ignore-unmatch
```

What does this command do?

1. First it deletes every file that matches `.DS_Store`;
2. Then it pipes these files to the `git rm` command that makes sure Git doesn't keep tracking these files.

Without removing the traces of these files in Git, the `.DS_Store` files that were tracked will eventually pop up again in your working copy.
