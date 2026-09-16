# Upgrading

Note: On this page, we use 3.0.0 as a strict version number and 3.x to identify all versions that start with the number 3 (3.0.0, 3.0.1, 3.1.0, etc). The same convention applies to 2.x.

The upgrade process from 1.11.x is also described in your `public/documentation/installation_guide.html` file, inside your Chamilo code.
The information here is largely redundant. You can see it online at `https://campus.chamilo.net/documentation/installation_guide.html`.

**Upgrade to 3.0, not to 2.x.** Version 3.0 is the current release, and some 1.11.x settings had no equivalent yet in 2.0.0. A 1.11.x system therefore goes straight to 3.0. We have tested similar migrations extensively, but every platform carries its own history: try it on a test environment first, and consider being professionally accompanied by [official Chamilo providers](https://chamilo.org/providers) in this endeavour.

## Upgrading from 1.11.x to 3.0

Upgrading from Chamilo 1.11.x to 3.0 is a **major migration**, not a simple update. Chamilo 2.0 was rebuilt on the Symfony framework with a restructured database schema, new API, and different file organization, and 3.0 continues that line. Plan this migration carefully and try it out on a test environment before rolling out in production.

### Before You Begin

1. **Read the release notes** for Chamilo 3.x to understand what has changed, what is new, and what features from 1.11.x may not yet be available.
2. **Back up everything**:
   - Full database dump (`mysqldump` or equivalent).
   - All files in the Chamilo 1.11.x installation directory, especially `app/upload/`, `app/courses/`, and `main/`.
   - Your `configuration.php` file.
3. **Test on a staging server first.** Never run the migration directly on your production server.
4. **Verify server requirements.** Chamilo 3.x has different requirements than 1.11.x (notably, PHP 8.3 or later — the installer refuses anything older). See [Server Requirements](server-requirements.md).
5. **Delete the `version` table from the 1.11.x database.** This step is mandatory. Chamilo 2.x and later store the Doctrine migration history in a table of that name, with other columns. If you leave the 1.11.x table in place, the upgrade stops immediately. The table is not necessary for Chamilo 1.11.x to work.
6. **Unpack the new code in a new directory.** The 1.11.x files stay where they are. The installer reads them as the source of your courses and uploads, and writes the result into the new tree.

### Running the Upgrade

You can run the upgrade through the web wizard or through the command line.

#### Web wizard

1. Point the `DocumentRoot` of your virtual host to the `public/` subdirectory of the new tree.
2. Open your URL. The wizard starts, because the new tree has no `.env` file yet.
3. On step 2, select the upgrade option and give the root path of your 1.11.x installation.
4. Follow the wizard to the end.

No `UPGRADE_ENABLED` file is needed here. That file authorises an upgrade of an **installed** platform; a new tree with no `.env` is not one yet.

#### Command line

Set `UPDATE_PATH` to the root of your 1.11.x installation, then run the migrations:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Raise `memory_limit` and `max_execution_time` first. The migration reads every course file, so it needs far more than the defaults.

#### How long it takes

The duration follows the size of your database and of your course files. As one reference point, a 1.11.28 platform with 238 tables, 11 courses, 63 users and 1489 course files took **6 minutes** and 1.7 GB of memory, and ran 393 migrations. A large production platform takes hours. Plan a maintenance window, and read the [Chamilo forum](https://chamilo.org) or contact an [official provider](https://chamilo.org/providers) before you run it on production.

### What May Require Manual Attention

| Area | Notes |
|------|-------|
| **Custom plugins** | 1.11.x plugins do not work in 2.x or 3.x. They must be rewritten or replaced. The official ones have been ported progressively since 2.0 — check the plugin list of your version to see which are available. |
| **Custom themes** | 1.11.x themes do not work in 2.x or 3.x. Recreate your branding using the 3.x theming system. |
| **Custom database modifications** | Any direct database modifications outside of Chamilo may not be migrated. |
| **SCORM packages** | SCORM content should migrate, but test packages individually to verify playback. |
| **External integrations** | Any integrations using the 1.11.x API or web services need to be updated to use the 2.x REST-only API using [API Platform](https://github.com/api-platform/api-platform). |

## Upgrading from 2.x to 3.0

This upgrade keeps your existing directory and your existing database. You copy the new code over the old tree, then run the migrations, either through the web wizard or through the command line.

### Seed the migration history first

Chamilo installs the database schema directly from the entity definitions, so an installation created by the installer holds the final schema but an **empty migration history**. Installations created before Chamilo 3.0 were never given that history. Two things depend on it:

* `doctrine:migrations:migrate` decides what to run from it. With an empty history it tries to replay every migration from the beginning over a schema that is already current.
* The web installer decides from it whether an upgrade is pending. With an empty history it refuses the request, because nothing proves that an upgrade is due.

So seed it once, and observe the order below.

> **Warning: seed the history before you copy the new code.** The commands mark every migration that the **deployed** code carries as already executed. If you run them after you copy the 3.0 code, they also mark the 3.0 migrations, and your upgrade never runs.

With your current version still in place, run:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

The first command creates the history table. The second marks the migrations of your current version. `doctrine:migrations:version` fails on its own if the table does not exist yet, so do not skip the first one.

Check the result:

```bash
php bin/console doctrine:migrations:status
```

`Executed` must equal `Available`, and `New` must be 0. Now copy the 3.0 code.

### Enable the upgrade

The installer has no login of its own, so it refuses to upgrade an installed platform until you authorise it on the server. Create an empty `UPGRADE_ENABLED` file in the project root, next to `.env`:

```bash
cd /var/www/chamilo
touch UPGRADE_ENABLED
```

It goes in the project root, not in `public/`: from there nobody can ask over HTTP whether your platform is currently open for upgrading. Without it the installer answers **"No UPGRADE_ENABLED found in the project root"**.

The installer deletes the file when the upgrade finishes. If your project root is read-only it says so instead, and you delete it by hand — until you do, the installer stays open.

This applies to the **web wizard only**. An upgrade run from the command line needs no flag: whoever has a shell already has full access to the server.

### Run the upgrade

Copy the new code, then either open your URL and follow the wizard, or run the migrations from the command line:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

The web wizard opens only while migrations are pending **and** the flag file is there. Once the upgrade finishes it answers `409 Conflict` again, which is what protects it.

## Updating Chamilo 3.0.x

Minor updates within the 3.0 branch are more straightforward.

### Update Process

#### Using a package

1. **Back up** the database and files.

2. **Download the latest 3.0.x version** from [chamilo.org](https://chamilo.org/download):

3. **Expand locally**

For example (adapt to the downloaded version)
   ```bash
   unzip chamilo-3.0.1.zip
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
   git pull origin 3.0
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
git pull origin 3.0

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
* **Test on staging first** -- especially for the 1.11.x to 3.0 migration, which involves significant data transformation.
* **Schedule upgrades during maintenance windows** when users are not actively using the platform.
* **Subscribe to GitHub releases** on [Github](https://github.com/chamilo/chamilo-lms/releases) using the bell icon to be notified of new versions and security patches.
* **If the wizard answers `Chamilo is already installed`**, it found no pending migration. Run `php bin/console doctrine:migrations:status` to check. If `Executed` is 0 on a platform that works, your migration history was never seeded — see [Seed the migration history first](#seed-the-migration-history-first).
* **Automatic download of new versions** is not yet provided in Chamilo 3.0, but this is an ongoing project we hope to be releasing soon. The upgrade itself already runs from the web wizard.
