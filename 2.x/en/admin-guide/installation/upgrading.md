# Upgrading

Note: On this page, we use 2.0.0 as a strict version number and 2.x to identify all versions that start with the number 2 (2.0.0, 2.0.1, 2.1.0, etc)

The upgrade process from 1.11.x to 2.x is described in your `public/documentation/installation_guide.html` file, inside your Chamilo code.
The information here is largely redundant. You can see it online at `https://campus.chamilo.net/documentation/installation_guide.html`.
Although we have made extensive tests on similar migrations, because some of the settings of 1.11.x were not yet supported in 2.0.0, we recommend waiting for version 2.1 before upgrading a 1.11.x system, or to be professionally accompanied by [official Chamilo providers](https://chamilo.org/providers) in this endeavour.

## Upgrading from 1.11.x to 2.x

Upgrading from Chamilo 1.11.x to 2.x is a **major migration**, not a simple update. Chamilo 2.0 was rebuilt on the Symfony framework with a restructured database schema, new API, and different file organization. Plan this migration carefully and try it out on a test environment before rolling out in production.

### Before You Begin

1. **Read the release notes** for Chamilo 2.x to understand what has changed, what is new, and what features from 1.11.x may not yet be available.
2. **Back up everything**:
   - Full database dump (`mysqldump` or equivalent).
   - All files in the Chamilo 1.11.x installation directory, especially `app/upload/`, `app/courses/`, and `main/`.
   - Your `configuration.php` file.
3. **Test on a staging server first.** Never run the migration directly on your production server.
4. **Verify server requirements.** Chamilo 2.x has different requirements than 1.11.x (notably, PHP 8.2+). See [Server Requirements](server-requirements.md).

### What May Require Manual Attention

| Area | Notes |
|------|-------|
| **Custom plugins** | 1.11.x plugins are not compatible with 2.x. They must be rewritten or replaced, which has been partially done in 2.0 and should be complete by 2.1 for official plugins. |
| **Custom themes** | 1.11.x themes do not work in 2.x. Recreate your branding using the 2.x theming system. |
| **Custom database modifications** | Any direct database modifications outside of Chamilo may not be migrated. |
| **SCORM packages** | SCORM content should migrate, but test packages individually to verify playback. |
| **External integrations** | Any integrations using the 1.11.x API or web services need to be updated to use the 2.x REST-only API using [API Platform](https://github.com/api-platform/api-platform). |

## Updating Chamilo 2.0.x

Minor updates within the 2.0 branch are more straightforward.

### Update Process

#### Using a package

1. **Back up** the database and files.

2. **Download the latest 2.0.x version** from [chamilo.org](https://chamilo.org/download):

3. **Expand locally**

For example (adapt to the downloaded version)
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Copy the files over your existing Chamilo installation**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Run database migrations:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Clear the cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Change permissions**

Adapt to your web server user:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verify** that the platform loads correctly and spot-check key functionality.

#### Using Git

If you installed Chamilo using Git, you can follow these instructions instead.

1. **Back up** the database and files.

2. **Pull the latest code** (or download the new release):
   ```bash
   git pull origin 2.0
   ```

3. **Update PHP dependencies:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Update JavaScript dependencies and rebuild assets:**
   ```bash
   yarn install && yarn build
   ```

5. **Run database migrations:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Clear the cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Change permissions**

Adapt to your web server user:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verify** that the platform loads correctly and spot-check key functionality.

### Automating Updates

For organizations that manage multiple Chamilo instances, consider scripting the update process:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 2.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Tips

* **Always back up before upgrading.** Database migrations are not reversible through the Chamilo interface.
* **Test on staging first** -- especially for the 1.11.x to 2.0 migration, which involves significant data transformation.
* **Schedule upgrades during maintenance windows** when users are not actively using the platform.
* **Subscribe to GitHub releases** on [Github](https://github.com/chamilo/chamilo-lms/releases) using the bell icon to be notified of new versions and security patches.
* **Web updates** are not yet provided in Chamilo 2.0, but this is an ongoing project we hope to be releasing soon.
