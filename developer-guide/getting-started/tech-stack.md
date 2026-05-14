# Technologie Stack

Hieronder wordt de technologie stack voor Chamilo 2.0 beschreven. Alle vermelde versies kunnen veranderen naarmate nieuwe versies van Chamilo worden uitgebracht. Versienummers maken gebruik van [Composer's versienotatie](https://getcomposer.org/doc/articles/versions.md), die regels vastlegt om enige flexibiliteit rond versies toe te staan.

Inclusief hiërarchische afhankelijkheden maakt Chamilo gebruik van enkele honderden vrije softwarebibliotheken. Deze lijst bevat alleen de bibliotheken die we het meest gebruiken en die waarschijnlijk wekelijks invloed hebben op het werk van een Chamilo-ontwikkelaar. We zijn dankbaar aan alle andere vrije software-ontwikkelaars die ons werk gemakkelijker, beter onderhoudbaar en veiliger maken.

## Backend

| Technologie | Versie | Doel |
|-----------|---------|---------|
| PHP | 8.2+ | Runtime |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Database-abstractie |
| API Platform | ^3.0 | REST API-framework |
| oneup/flysystem-bundle | ~4.0 | Bestandsopslag-abstractie |
| vich/uploader-bundle | ^2.8 | Afhandeling van bestandsuploads |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine-uitbreidingen (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT-authenticatie |
| nelmio/cors-bundle | ^2.2 | CORS-headers |
| mpdf/mpdf | ~8.0 | PDF-generatie |
| phpoffice/phpspreadsheet | ~1.16 | Excel/spreadsheet-verwerking |
| firebase/php-jwt | ^7.0 | JWT-tokenverwerking |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton-integratie |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3-implementatie |

## Frontend

| Technologie | Versie | Doel |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI-framework |
| PrimeVue | ^4.5 | Componentbibliotheek |
| Pinia | ^3.0 | Staatbeheer |
| Vue Router | 5.0 | Client-side routing |
| Vue I18n | 11.3 | Internationalisering |
| Axios | ^1.13 | HTTP-client |
| TinyMCE | ^5.10 | Rich text editor |
| Chart.js | ^4.5 | Grafieken en visualisaties |
| FullCalendar | ^6.1 | Kalendercomponent |
| Uppy | ^4.5 | Bestandsupload-widget |
| PrimeFlex | ^4.0 | CSS-utility-framework |

## Bouwtools

| Technologie | Versie | Doel |
|-----------|---------|---------|
| Composer | ^2.8 | PHP-afhankelijkheidsbeheer |
| Webpack | ^5.105 | Modulebundler |
| Symfony Webpack Encore | ^5.3 | Webpack-wrapper voor Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS-framework |
| Sass | ^1.98 | CSS-preprocessor |
| TypeScript | ^5.9 | Type-veilig JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Code-opmaak |

## Iconen

| Bibliotheek | Versie | Gebruik |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS-klassen `mdi mdi-*`) |

## Database

Chamilo ondersteunt:

* MySQL 5.7+
* MariaDB 10.11.2+

## Cloudopslag

Via Flysystem-adapters:

* Lokaal bestandssysteem (standaard)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)