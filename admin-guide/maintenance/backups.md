# Backups

Regular backups are essential for protecting your Chamilo data. This page covers what to back up and how.

## What to Back Up

### 1. Database

The Chamilo database contains all platform data: users, courses, tracking, grades, messages, and settings. This is the most critical component to back up.

**How to back up:**

```bash
mysqldump -u username -p chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

For PostgreSQL:

```bash
pg_dump -U username chamilo_database > chamilo_backup_$(date +%Y%m%d).sql
```

### 2. Files

Chamilo stores uploaded files (documents, images, SCORM packages) in the filesystem. The key directories to back up:

* `var/upload/` — Uploaded files and resources
* `var/courses/` — Course-specific files (legacy)
* `public/plugin/` — Plugin files

If you use cloud storage (S3, Azure Blob), ensure your cloud provider's backup/versioning is enabled.

### 3. Configuration

* `.env.local` — Your environment configuration
* `config/` — Any custom configuration files

## Backup Schedule

| Component | Recommended frequency |
|-----------|---------------------|
| Database | Daily |
| Files | Daily or weekly (depending on upload activity) |
| Configuration | After any configuration change |

## Restoration

To restore from a backup:

1. Restore the database from the SQL dump
2. Restore the file directories
3. Restore the configuration files
4. Clear the Symfony cache: `php bin/console cache:clear`

## Tips

* **Automate backups** — Use cron jobs to run backups automatically
* **Store off-site** — Keep backup copies on a separate server or cloud storage
* **Test restoration** — Periodically test that you can restore from a backup successfully
* **Document your process** — Keep written instructions for the restoration process so anyone on the team can perform it
