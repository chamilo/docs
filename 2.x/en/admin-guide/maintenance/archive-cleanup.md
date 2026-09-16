# Archive Cleanup

Over time, Chamilo accumulates temporary files in its cache and archive directories. Regular cleanup prevents disk space issues.

## What Can Be Cleaned

* **Symfony cache** — Compiled templates, cached configuration, and routing data
* **Temporary files** — Files generated during export, import, and other operations
* **Session data** — Expired PHP session files
* **Log files** — Old log files that are no longer needed

## Performing Cleanup

### From the Administration Panel

Navigate to **Archive cleanup** in the administration panel. Click the cleanup button to remove temporary files.

### From the Command Line

For more control, use Symfony console commands:

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
