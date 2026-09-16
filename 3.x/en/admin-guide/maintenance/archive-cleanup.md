# Archive Cleanup

Over time, Chamilo accumulates temporary files in its cache and archive directories. Regular cleanup prevents disk space issues.

## What Can Be Cleaned

* **Temporary upload files** — Files generated during export, import, and other operations, plus stale legacy frontend build files
* **Symfony application cache** — Compiled container, cached configuration, and routing data. This is *not* covered by the administration panel action below — see [From the Command Line](#from-the-command-line).
* **Session data** — Expired PHP session files
* **Log files** — Old log files that are no longer needed

## Performing Cleanup

### From the Administration Panel

Navigate to **System > Clean temporary files** in the administration panel (see [System Tools](../system/system-tools.md#clean-temporary-files)). It reports how many temporary files exist and how much space they use, then lets you purge everything or only files older than a chosen age, with a dry-run preview. It also clears stale legacy build files and regenerates compiled CSS assets.

This action deliberately excludes Symfony's own cache directories (`var/cache/dev`, `var/cache/prod`, `var/cache/test`, and cache pools), so it will not make a `.env` or `config/` change take effect — use the command line for that.

### From the Command Line

For more control, and to actually clear the Symfony application cache, use Symfony console commands:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Tips

* **Schedule regular cleanups** — Set up a weekly or monthly cron job to clear temporary files
* **Monitor disk usage** — Keep an eye on the `var/` directory size, as it grows with cache and log files
* **Be careful with logs** — Before deleting log files, check if they contain information you might need for troubleshooting
