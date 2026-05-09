# Upgrading

The upgrade process from 1.11.x to 2.0 is described in your `public/documentation/installation_guide.html` file, inside your Chamilo code.
The information here is largely redundant. You can see it online at `https://campus.chamilo.net/documentation/installation_guide.html`.

## Upgrading from 1.11.x to 2.0

Upgrading from Chamilo 1.11.x to 2.0 is a **major migration**, not a simple update. Chamilo 2.0 was rebuilt on the Symfony framework with a restructured database schema, new API, and different file organization. Plan this migration carefully.

### Before You Begin

1. **Read the release notes** for Chamilo 2.0 to understand what has changed, what is new, and what features from 1.11.x may not yet be available.
2. **Back up everything**:
   - Full database dump (`mysqldump` or equivalent).
   - All files in the Chamilo 1.11.x installation directory, especially `app/upload/`, `app/courses/`, and `main/`.
   - Your `configuration.php` file.
3. **Test on a staging server first.** Never run the migration directly on your production server.
4. **Verify server requirements.** Chamilo 2.0 has different requirements than 1.11.x. See [Server Requirements](server-requirements.md).

### What May Require Manual Attention

| Area | Notes |
|------|-------|
| **Custom plugins** | 1.11.x plugins are not compatible with 2.0. They must be rewritten or replaced. |
| **Custom themes** | 1.11.x themes do not work in 2.0. Recreate your branding using the 2.0 theming system. |
| **Custom database modifications** | Any direct database modifications outside of Chamilo may not be migrated. |
| **SCORM packages** | SCORM content should migrate, but test packages individually to verify playback. |
| **External integrations** | Any integrations using the 1.11.x API or web services need to be updated to use the 2.0 REST API. |

## Updating Chamilo 2.0.x

Minor updates within the 2.0 branch are more straightforward.

### Update Process

1. **Back up** the database and files.

2. **Pull the latest code** (or download the new release):
   ```bash
   git pull origin master
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

7. **Verify** that the platform loads correctly and spot-check key functionality.

### Automating Updates

For organizations that manage multiple Chamilo instances, consider scripting the update process:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin master

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
* **Subscribe to the Chamilo mailing list or GitHub releases** to be notified of new versions and security patches.
