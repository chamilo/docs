# Tech Stack

## Backend

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 8.2+ | Runtime |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Database abstraction |
| API Platform | ^3.0 | REST API framework |
| lexik/jwt-authentication-bundle | ^2.20 | JWT authentication |
| oneup/flysystem-bundle | ~4.0 | File storage abstraction |
| vich/uploader-bundle | ^2.8 | File upload handling |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine extensions (tree, timestampable, sluggable) |
| nelmio/cors-bundle | ^2.2 | CORS headers |
| mpdf/mpdf | ~8.0 | PDF generation |
| phpoffice/phpspreadsheet | ~1.16 | Excel/spreadsheet handling |
| firebase/php-jwt | ^7.0 | JWT token handling |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton integration |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 implementation |

## Frontend

| Technology | Version | Purpose |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI framework |
| PrimeVue | ^4.5 | Component library |
| Pinia | ^3.0 | State management |
| Vue Router | 5.0 | Client-side routing |
| Vue I18n | 11.3 | Internationalization |
| Axios | ^1.13 | HTTP client |
| TinyMCE | ^5.10 | Rich text editor |
| Chart.js | ^4.5 | Charts and visualizations |
| FullCalendar | ^6.1 | Calendar component |
| Uppy | ^4.5 | File upload widget |
| PrimeFlex | ^4.0 | CSS utility framework |

## Build Tools

| Technology | Version | Purpose |
|-----------|---------|---------|
| Webpack | ^5.105 | Module bundler |
| Symfony Webpack Encore | ^5.3 | Webpack wrapper for Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS framework |
| Sass | ^1.98 | CSS preprocessor |
| TypeScript | ^5.9 | Type-safe JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Code formatting |

## Icons

| Library | Version | Usage |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS classes `mdi mdi-*`) |

## Database

Chamilo supports:

* MySQL 8.0.32+
* MariaDB 10.11.2+
* PostgreSQL 16+
* SQLite (for development/testing)

## Cloud Storage

Via Flysystem adapters:

* Local filesystem (default)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)
