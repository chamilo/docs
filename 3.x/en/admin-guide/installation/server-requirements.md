# Server Requirements

Before installing Chamilo 3.0, verify that your server meets the following requirements.

## Software Requirements

### PHP

| Requirement | Minimum | Recommended |
|-------------|---------|-------------|
| **PHP version** | 8.3 | 8.5 |

### Required PHP Extensions

| Extension | Purpose |
|-----------|---------|
| **bcmath** | Arbitrary-precision math |
| **ctype** | Character type checking |
| **curl** | HTTP requests (API integrations, external services) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML parsing and DOM handling (SCORM, RSS, SOAP, LTI) |
| **exif** | Reading image metadata (e.g. auto-orienting uploaded photos) |
| **fileinfo** | MIME type detection for uploaded files |
| **gd** | Image processing (thumbnails, CAPTCHA) |
| **iconv** | Character set conversion |
| **intl** | Internationalization (date, number, and string formatting) |
| **json** | JSON encoding/decoding |
| **ldap** | LDAP connector. Although you will probably not use LDAP, Chamilo requires it |
| **mbstring** | Multibyte string handling (UTF-8 support) |
| **openssl** | Cryptographic operations (HTTPS, password hashing, JWT tokens) |
| **pdo**, plus **pdo_mysql** or **pdo_pgsql** | Database connectivity (install the driver matching your database) |
| **soap** | SOAP web service handling |
| **zip** | Handling ZIP archives (SCORM packages, bulk imports/exports) |
| **zlib** | Compression used internally by several dependencies |
| **apcu** | User-level caching (recommended, checked but not enforced by the installer) |
| **opcache** | Opcode caching (strongly recommended for performance, checked but not enforced by the installer) |
| **xapian** | Full-text search (optional, only if you use search) |

### Database

| Database | Minimum Version | Recommended |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 or higher |
| **MySQL** | 5.7 | 8.0 or higher |

MariaDB versions older than 10.2.2 (and MySQL versions older than 5.7) need large index/prefix support enabled manually in the server configuration before installing Chamilo.

### Web Server

| Server | Notes |
|--------|-------|
| **Apache** | Requires `mod_rewrite` (and `ssl`, `headers`, `expires`) enabled. Chamilo ships a sample vhost at `public/main/install/apache.dist.conf`. |
| **Nginx** | Requires manual configuration for URL rewriting — Chamilo does not ship a sample Nginx config. See the Symfony Nginx documentation for a reference configuration. |

### Build Tools

| Tool | Purpose |
|------|---------|
| **Composer** (^2.8) | PHP dependency management. Required to install Chamilo's PHP libraries. |
| **Node.js** (20+ LTS) | JavaScript runtime. Required to build frontend assets. |
| **Yarn** (^4, via Corepack) | JavaScript package manager used to build frontend assets (`yarn install`, `yarn encore production`). |

## Hardware Requirements

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB or more (building frontend assets from source needs at least 4 GB on its own) |
| **CPU** | 2 vCPUs | 2+ cores |
| **Disk space** | 4 GB (application only) | 20+ GB (including uploaded content); building from source needs ~10 GB free during the build |
| **Disk type** | HDD | SSD (significantly improves database and cache performance) |

These are baseline figures from Chamilo's own installation guide. Actual requirements depend on the number of concurrent users and the volume of content hosted.

## Operating System

| OS | Notes |
|----|-------|
| **Linux** | Recommended. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+, or equivalent. |
| **Windows** | Possible but not thoroughly tested. Use WSL2 for development. |
| **macOS** | Development only / untested. |

## Network Requirements

* A domain name pointing to your server.
* An SSL/TLS certificate for HTTPS (Let's Encrypt provides free certificates).
* Outbound SMTP access if sending emails directly (or use a third-party email service).
* Port 443 (HTTPS) and optionally port 80 (HTTP, for redirect to HTTPS).

## Checking Requirements

After placing the Chamilo source on your server, you can check your PHP configuration directly:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Use PHP-FPM** with Apache or Nginx for better performance than mod_php.
* **Separate your database** onto a dedicated server for platforms expecting more than 500 concurrent users.
* **Use SSD storage** -- Database-heavy applications like Chamilo benefit significantly from fast disk I/O.
