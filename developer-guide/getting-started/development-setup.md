# Development Setup

## Prerequisites

* PHP 8.2+ with extensions: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js and npm (or Yarn — the project uses Yarn 4; see `package.json` for the exact pinned version)
* MySQL 5.7+ or MariaDB 10.11+
* Git

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Configure Environment

The repository ships `.env.dist` as a reference. Create an empty `.env` file that the web installer will populate — keeping it empty ensures upgrades never overwrite your local configuration:

```bash
touch .env
```

Then make `.env` and `config/` writable by the web server so the installer can write your local configuration:

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. Install Frontend Dependencies and Build

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. Start the Development Server

```bash
symfony server:start
```

Or use Apache/Nginx pointing to the `public/` directory.

### 6. Set Up the Database

Run the web-based installation wizard by navigating to your Chamilo URL in a browser.

### 7. Generate JWT Keys

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. Secure your system

The `.env` file and `config/` directory only need to be writeable for the time of the installation. Secure them afterwards:

```bash
sudo chown -R root: .env config/
```

The `var/` directory needs to remain writeable by the web server.


## Build Commands

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Build frontend for development |
| `yarn encore dev --watch` | Build and watch for changes |
| `yarn encore production` | Build optimized for production |
| `php bin/console cache:clear` | Clear Symfony cache |

## Development Tips

* Set `APP_ENV=dev` and `APP_DEBUG=1` in `.env` for detailed error messages
* The Symfony debug toolbar appears at the bottom of pages in development mode
* API documentation is available at `/api` when `APP_ENABLE_API_ENTRYPOINT=1`
* Use `yarn encore dev --watch` to automatically rebuild frontend changes
