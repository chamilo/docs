# Server Requirements

Before installing Chamilo 2.0, verify that your server meets the following requirements.

## Software Requirements

### PHP

| Requirement | Minimum | Recommended |
|-------------|---------|-------------|
| **PHP version** | 8.2 | 8.3 or later |

### Required PHP Extensions

| Extension | Purpose |
|-----------|---------|
| **intl** | Internationalization (date, number, and string formatting) |
| **gd** | Image processing (thumbnails, CAPTCHA) |
| **curl** | HTTP requests (API integrations, external services) |
| **zip** | Handling ZIP archives (SCORM packages, bulk imports/exports) |
| **mbstring** | Multibyte string handling (UTF-8 support) |
| **xml** | XML parsing (SCORM, RSS, SOAP) |
| **json** | JSON encoding/decoding |
| **openssl** | Cryptographic operations (HTTPS, password hashing, tokens) |
| **fileinfo** | MIME type detection for uploaded files |
| **pdo_mysql** or **pdo_pgsql** | Database connectivity (install the one matching your database) |
| **opcache** | Opcode caching (strongly recommended for performance) |
| **apcu** | User-level caching (recommended) |
| **xapian** | Full-text search (optional, only if you use search) |

### Database

| Database | Minimum Version |
|----------|----------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |
| **PostgreSQL** | 13 |

MySQL or MariaDB is the most common choice and the most thoroughly tested.

### Web Server

| Server | Notes |
|--------|-------|
| **Apache** | Requires `mod_rewrite` enabled. Chamilo ships with an `.htaccess` file for URL rewriting. |
| **Nginx** | Requires manual configuration for URL rewriting. See the Symfony Nginx documentation for a reference configuration. |

### Build Tools

| Tool | Purpose |
|------|---------|
| **Composer** | PHP dependency management. Required to install Chamilo's PHP libraries. |
| **Node.js** (18+) | JavaScript runtime. Required to build frontend assets. |
| **npm** | JavaScript package manager. Installed with Node.js. |

## Hardware Requirements

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **RAM** | 2 GB | 4 GB or more |
| **CPU** | 1 core | 2+ cores |
| **Disk space** | 1 GB (application only) | 20+ GB (including uploaded content) |
| **Disk type** | HDD | SSD (significantly improves database and cache performance) |

These are baseline figures. Actual requirements depend on the number of concurrent users and the volume of content hosted.

## Operating System

| OS | Notes |
|----|-------|
| **Linux** | Recommended. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+, or equivalent. |
| **Windows** | Possible but not recommended for production. Use WSL2 for development. |
| **macOS** | Development only. |

## Network Requirements

* A domain name pointing to your server.
* An SSL/TLS certificate for HTTPS (Let's Encrypt provides free certificates).
* Outbound SMTP access if sending emails directly (or use a third-party email service).
* Port 443 (HTTPS) and optionally port 80 (HTTP, for redirect to HTTPS).

## Checking Requirements

After placing the Chamilo source on your server, you can check requirements with the Symfony console:

```bash
php bin/console chamilo:requirements
```

Or check PHP configuration directly:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Use PHP-FPM** with Apache or Nginx for better performance than mod_php.
* **Separate your database** onto a dedicated server for platforms expecting more than 500 concurrent users.
* **Use SSD storage** -- Database-heavy applications like Chamilo benefit significantly from fast disk I/O.
