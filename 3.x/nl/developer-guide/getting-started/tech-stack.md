# Tech Stack

Het volgende beschrijft de tech stack voor Chamilo 3.0. Alle hier vermelde versies zullen waarschijnlijk wijzigen naarmate nieuwe versies van Chamilo worden uitgebracht. Versienummers gebruiken [Composer's versions notation](https://getcomposer.org/doc/articles/versions.md), die regels vastlegt om enige flexibiliteit rond versies toe te staan.

Inclusief hiërarchische afhankelijkheden gebruikt Chamilo enkele honderden Free Software-bibliotheken. Deze lijst bevat alleen de bibliotheken die we het meest gebruiken en die waarschijnlijk wekelijks het werk van een Chamilo-ontwikkelaar beïnvloeden. We zijn dankbaar voor alle andere Free Software-ontwikkelaars die ons werk eenvoudiger, beter onderhoudbaar en veiliger maken.

## Backend

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Runtime |
| Symfony | 7.4.* | Framework |
| Doctrine ORM | ^3.3 | Database-abstractie |
| API Platform | ^4.2 | REST API-framework |
| oneup/flysystem-bundle | ~4.0 | Bestandsopslag-abstractie |
| vich/uploader-bundle | ^2.8 | Afhandeling van bestandsuploads |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine-extensies (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT-authenticatie |
| nelmio/cors-bundle | ^2.2 | CORS-headers |
| mpdf/mpdf | ~8.0 | PDF-generatie |
| phpoffice/phpspreadsheet | ~1.16 | Excel-/spreadsheet-afhandeling |
| firebase/php-jwt | ^7.0 | JWT-tokenafhandeling |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton-integratie |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3-implementatie |

## Frontend

| Technology | Version | Purpose |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI-framework |
| PrimeVue | ^4.5 | Componentenbibliotheek |
| Pinia | ^3.0 | State management |
| Vue Router | ^5.1 | Client-side routing |
| Vue I18n | ^11.4 | Internationalisatie |
| Axios | ^1.16 | HTTP-client |
| TinyMCE | ^5.10 | Rich-text-editor |
| Chart.js | ^4.5 | Grafieken en visualisaties |
| FullCalendar | ^6.1 | Kalendercomponent |
| Uppy | ^4.5 | Widget voor bestandsupload |

## Build Tools

| Technology | Version | Purpose |
|-----------|---------|---------|
| Composer | ^2.8 | PHP-dependency manager |
| Webpack | ^5.107 | Module bundler |
| Symfony Webpack Encore | ^5.3 | Webpack-wrapper voor Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS-framework |
| Sass | ^1.100 | CSS-preprocessor |
| TypeScript | ^5.9 | Type-safe JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Codeopmaak |

## Icons

| Library | Version | Usage |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS-klassen `mdi mdi-*`) |

## Database

Chamilo ondersteunt:

* MySQL 5.7+
* MariaDB 10.11.2+

## Cloud Storage

Via Flysystem-adapters:

* Lokaal bestandssysteem (standaard)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)