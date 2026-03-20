# Configuration

Chamilo 2.0 uses environment variables and Symfony configuration files for its core settings. This page covers the key configuration files and variables.

## Environment Variables (.env.local)

The primary configuration file is `.env.local` in the Chamilo root directory. This file contains environment-specific settings that should not be committed to version control.

A default `.env` file ships with Chamilo and contains documented defaults. Create `.env.local` to override values for your environment.

### Key Variables

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | The application environment. Use `prod` for production, `dev` for development. | `prod` |
| `APP_SECRET` | A random string used for CSRF tokens, cookie signing, and other cryptographic operations. Generate a unique value for each installation. | `a1b2c3d4e5f6...` |
| `APP_URL` | The base URL of your platform. Used for generating links in emails and API responses. | `https://lms.example.com` |
| `DATABASE_URL` | The database connection string. | See below. |
| `MAILER_DSN` | Email transport configuration. | See [Email Configuration](email-configuration.md). |

### DATABASE_URL Format

The `DATABASE_URL` follows the standard DSN format:

```bash
# MySQL / MariaDB
DATABASE_URL="mysql://username:password@127.0.0.1:3306/chamilo?serverVersion=8.0"

# PostgreSQL
DATABASE_URL="postgresql://username:password@127.0.0.1:5432/chamilo?serverVersion=13"
```

Replace `username`, `password`, and `chamilo` with your actual database credentials and name. The `serverVersion` parameter helps Doctrine optimize queries for your database version.

### Generating APP_SECRET

Generate a secure random string for `APP_SECRET`:

```bash
php -r "echo bin2hex(random_bytes(16));"
```

Use a unique value for each installation. Never reuse the default value from `.env`.

## Symfony Configuration (config/ Directory)

Symfony-level configuration lives in the `config/` directory. These YAML files control framework behavior, service definitions, and package-specific settings.

### Key Configuration Files

| File | Purpose |
|------|---------|
| `config/packages/doctrine.yaml` | Database and ORM configuration. |
| `config/packages/security.yaml` | Authentication, firewalls, access control, and role hierarchies. |
| `config/packages/cache.yaml` | Cache adapter configuration (filesystem, APCu, Redis). |
| `config/packages/mailer.yaml` | Email transport settings. |
| `config/packages/framework.yaml` | General Symfony framework settings (session, CSRF, router). |
| `config/packages/twig.yaml` | Template engine configuration. |
| `config/services.yaml` | Application service definitions and dependency injection. |

### Environment-Specific Overrides

Symfony supports per-environment configuration. Files in `config/packages/prod/` override the defaults when `APP_ENV=prod`, and `config/packages/dev/` overrides when `APP_ENV=dev`.

For example, `config/packages/prod/monolog.yaml` typically configures less verbose logging than the development equivalent.

## File Permissions

Ensure the following directories are writable by the web server user:

| Directory | Purpose |
|-----------|---------|
| `var/cache/` | Symfony compiled cache |
| `var/log/` | Application log files |
| `var/upload/` | User-uploaded files (if using local storage) |
| `public/upload/` | Publicly accessible uploaded assets |

Set permissions appropriately:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/ public/upload/
chmod -R 775 var/ public/upload/
```

## Common Configuration Tasks

### Switch to Production Mode

```bash
# In .env.local
APP_ENV=prod
APP_DEBUG=0
```

Then clear and warm the cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Configure Trusted Proxies

If Chamilo runs behind a reverse proxy or load balancer, configure trusted proxies so that HTTPS detection and client IP resolution work correctly:

```yaml
# config/packages/framework.yaml
framework:
    trusted_proxies: '127.0.0.1,PROXY_IP'
    trusted_headers: ['x-forwarded-for', 'x-forwarded-proto']
```

### Configure Session Storage

By default, sessions are stored on the filesystem. For multi-server deployments, configure Redis or database-backed sessions:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Never edit `.env` directly** -- Always use `.env.local` for your overrides. The `.env` file may be overwritten during upgrades.
* **Keep `APP_DEBUG=0` in production** -- Debug mode exposes sensitive information in error pages.
* **Back up `.env.local`** separately from the codebase since it contains credentials and is excluded from version control.
