# Repair and Conversion Commands

> **Breaking change.** The maintenance commands below used to write to the database as soon as they were run. They are now **read-only (dry-run) by default** and only write when `--apply` is given, following the model of `chamilo:migration:repair-quiz-relations-from-legacy`.

| Command | Notes |
|---------|-------|
| `chamilo:migration:repair-group-forums-without-item-property` | |
| `chamilo:migration:repair-forum-posts-without-item-property` | |
| `chamilo:migration:repair-quiz-questions-without-resource-node` | |
| `chamilo:migration:repair-gradebook-structure` | |
| `chamilo:migration:repair-translatehtml-language-blocks` | |
| `chamilo:migration:repair-legacy-certificate-history` | |
| `app:multi-url:convert` | no `--expected-count` (single all-or-nothing operation) |

## What Changed for Administrators

1. Run the command without options: it reports what it would do, writes nothing, and prints the exact
   `--apply --expected-count=N` line to use.
2. To write, run it again with `--apply --expected-count=N`, where N is the number reported by the read-only run.
   If the number of rows that would be changed differs from N (the data changed in between), the command refuses
   and writes nothing.
3. `--dry-run` is still accepted (it is now the default and does nothing); combining it with `--apply` is an error.
4. Scripts and cron jobs that ran these commands without arguments and relied on them writing must now pass
   `--apply --expected-count=N`. Exit codes are unchanged (0 success, 1 failure, 2 invalid usage).

Example:

```bash
php bin/console chamilo:migration:repair-translatehtml-language-blocks
# ... "To write, re-run with --apply --expected-count=12"
php bin/console chamilo:migration:repair-translatehtml-language-blocks --apply --expected-count=12
```

```bash
php bin/console app:multi-url:convert "https://admin.example.com/"          # plan only
php bin/console app:multi-url:convert "https://admin.example.com/" --apply  # convert
```

## New Command: `app:repair-user-tag-counters`

Recalculates the usage counter (`tag.count`) of tags from the relation rows that use them (user tags, extra field
tags, portfolio tags). Older versions let the counters drift. Same model: run it without options to list the drifted
tags and get the `--apply --expected-count=N` line, then run that line to write. No migration is involved: run it
when you want the counters resynchronised.
