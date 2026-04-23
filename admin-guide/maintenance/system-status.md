# System Status

The system status page helps you verify that your Chamilo server is correctly configured and identify potential issues.

## Accessing System Status

From the administration panel, click **System status** (or **System information**).

## What It Shows

![The system status page showing PHP configuration, database status, file permissions, and server information](/.gitbook/assets/admin-system-status.png)

### PHP Configuration

* **PHP version** — Chamilo 2.0 requires PHP 8.2 or higher
* **Required extensions** — Checks that all necessary PHP extensions are installed
* **PHP settings** — Verifies important PHP settings like memory limit, upload limits, and execution time

### Database Status

* **Database connection** — Confirms the database is accessible
* **Database version** — Shows the database server version

### File Permissions

* **Writable directories** — Checks that Chamilo can write to required directories (cache, uploads, logs)

### Server Information

* **Operating system** — Server OS details
* **Web server** — Apache, Nginx, or other
* **Disk space** — Available storage

## Recommended Checks

Perform these checks regularly:

* **After installation** — Verify all requirements are met
* **After upgrades** — Ensure PHP version and extensions are still compatible
* **When issues arise** — Check system status first when troubleshooting problems
