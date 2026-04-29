# Development Setup

## Prerequisites

* PHP 8.2+ with extensions: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath
* Composer
* Node.js and npm (or Yarn — the project uses Yarn 4; see `package.json` for the exact pinned version)
* MySQL 8.0+, MariaDB 10.11+, or PostgreSQL 16+
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

Copy the environment template and edit it:

```bash
cp .env.dist .env.local
```

Edit `.env.local` with your database credentials and settings:

```env
DATABASE_URL=mysql://user:password@127.0.0.1:3306/chamilo?serverVersion=8.0
APP_ENV=dev
APP_DEBUG=1
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

### 5. Set Up the Database

Run the web-based installation wizard by navigating to your Chamilo URL in a browser, or use the console:

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### 6. Start the Development Server

```bash
symfony server:start
```

Or use Apache/Nginx pointing to the `public/` directory.

### 7. Generate JWT Keys

```bash
php bin/console lexik:jwt:generate-keypair
```

## Build Commands

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | Build frontend for development |
| `yarn encore dev --watch` | Build and watch for changes |
| `yarn encore production` | Build optimized for production |
| `php bin/console cache:clear` | Clear Symfony cache |

## Development Tips

* Set `APP_ENV=dev` and `APP_DEBUG=1` in `.env.local` for detailed error messages
* The Symfony debug toolbar appears at the bottom of pages in development mode
* API documentation is available at `/api` when `APP_ENABLE_API_ENTRYPOINT=1`
* Use `yarn encore dev --watch` to automatically rebuild frontend changes
