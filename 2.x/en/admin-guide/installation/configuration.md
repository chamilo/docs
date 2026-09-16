# Configuration

Chamilo 2.0 uses environment variables and Symfony configuration files for its core settings. This page covers the key configuration files and variables.

## Environment Variables (.env)

The primary configuration file is `.env` in the Chamilo root directory. This file contains environment-specific settings that should not be committed to version control.

A default `.env.dist` file ships with Chamilo and contains documented defaults. Create `.env` (required to start the installation) to override values for your environment.

### Key Variables

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | The application environment, at the Symfony level. Use `prod` for production, `dev` for development, 'test' for testing. | `prod` |
| `APP_SECRET` | A random string used for CSRF tokens, cookie signing, and other cryptographic operations. Chamilo generates a unique value for each installation. Don't modify it. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | The database host. Defaults to localhost | `localhost` |
| `DATABASE_PORT` | The database port. Defaults to 3306 for MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | The database name, as given by you to the installation wizard. | See below. |
| `DATABASE_USER` | The database username, as given by you to the installation wizard. | See below. |
| `DATABASE_PASSWORD` | The database user's password, as given by you to the installation wizard. | See below. |
| `TRUSTED_PROXIES` | (Optional) If you are hosting Chamilo behind a reverse proxy, you need to provide the IP(s) of the reverse proxy here for Chamilo to be able to interpret calls and generate responses correctly. | |

Other settings in .env are relatively rarely modified.

Note that, in future versions, the DATABASE_* settings will be combined into one single `DATABASE_URL` variable.

E-mail sending configuration is presented during installation, but can be modified later on in the `Platform settings` section of the administration dashboard.

## Symfony Configuration (config/ Directory)

Symfony-level configuration lives in the `config/` directory. These YAML files control framework behavior, service definitions, and package-specific settings.

It is not frequent to have to modify those files, and changing them can render your portal inoperative, so please do not attempt to modify those if you must ensure the system's availability.

### Key Configuration Files

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Authentication methods configuration. |
| `config/packages/doctrine.yaml` | Database and ORM configuration. |
| `config/packages/security.yaml` | Authentication, firewalls, access control, and role hierarchies. |
| `config/packages/cache.yaml` | Cache adapter configuration (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | General Symfony framework settings (session, CSRF, router, HTTP caching). |
| `config/packages/twig.yaml` | Template engine configuration. |
| `config/services.yaml` | Application service definitions and dependency injection. |

### Environment-Specific Overrides

Symfony supports per-environment configuration. Files in `config/packages/prod/` override the defaults when `APP_ENV=prod`, and `config/packages/dev/` overrides when `APP_ENV=dev`.

For example, `config/packages/prod/monolog.yaml` typically configures less verbose logging than the development equivalent.

Chamilo does not define any configuration in `config/packages/prod/` in the software itself, so if you want to customize setting from `config/packages/*.yaml`, just create a copy of the yaml file inside that directory and change the settings there.

## File Permissions

We made efforts in 2.0+ to ensure that a single directory needed permissions. This is the `var/` directory, and to avoid complex issues, just setting the whole folder as writeable by the web server system user is enough.

Set permissions appropriately under Debian-based systems:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Common Configuration Tasks

### Switch to Production Mode

```bash
# In .env
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
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
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

* **Never edit `.env.dist` directly** -- Always use `.env` for your overrides. The `.env.dist` file may be overwritten during upgrades.
* **Keep `APP_DEBUG=0` in production** -- Debug mode exposes sensitive information in error pages.
* **Back up `.env`** separately from the codebase since it contains credentials and is excluded from version control.
