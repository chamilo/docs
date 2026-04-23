# Upgrading

This page covers upgrading to Chamilo 2.0 and keeping your 2.0 installation up to date.

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

### Migration Process

1. **Install Chamilo 2.0** on a clean server or directory alongside your existing 1.11.x installation. Follow the standard [Installation Wizard](installation-wizard.md) to set up a fresh 2.0 instance.

2. **Run the migration tool.** Chamilo provides a migration command that reads data from your 1.11.x database and imports it into the 2.0 schema:

   ```bash
   php bin/console chamilo:migrate --source-database=chamilo_old
   ```

   The migration tool handles:
   - User accounts and profiles
   - Course structures and content
   - Session definitions and enrollments
   - Exercise questions and results
   - Tracking data and gradebook scores
   - Forum posts and wiki content

3. **Migrate files.** Upload files from your 1.11.x installation need to be moved and reorganized for the 2.0 file structure. The migration command handles the file mapping, but the source files must be accessible.

4. **Verify the migration.** After the migration completes:
   - Log in as an administrator and check user counts.
   - Open several courses and verify content is present.
   - Check tracking data for a sample of learners.
   - Test exercises and learning paths.

5. **Rebuild assets.**
   ```bash
   npm install && npm run build
   php bin/console cache:clear --env=prod
   ```

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
   git pull origin main
   ```

3. **Update PHP dependencies:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Update JavaScript dependencies and rebuild assets:**
   ```bash
   npm install && npm run build
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
git pull origin main

# Dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

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
