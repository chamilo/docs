# Teknologistakk

Følgende beskriver teknologistakken for Chamilo 3.0. Alle versjoner som er oppgitt her vil sannsynligvis endre seg etter hvert som nye versjoner av Chamilo utgis. Versjonsnumre bruker [Composers versjonsnotasjon](https://getcomposer.org/doc/articles/versions.md), som setter regler for å tillate en viss fleksibilitet rundt versjoner.

Inkludert hierarkiske avhengigheter bruker Chamilo flere hundre fri programvare-biblioteker. Denne listen omfatter kun de vi bruker mest, og som sannsynligvis vil påvirke arbeidet til en Chamilo-utvikler hver uke eller så. Vi er takknemlige overfor alle andre utviklere av fri programvare der ute som gjør arbeidet vårt enklere, mer vedlikeholdbart og mer sikkert.

## Backend

| Teknologi | Versjon | Formål |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Kjøretid |
| Symfony | 7.4.* | Rammeverk |
| Doctrine ORM | ^3.3 | Databaseabstraksjon |
| API Platform | ^4.2 | REST API-rammeverk |
| oneup/flysystem-bundle | ~4.0 | Filagringabstraksjon |
| vich/uploader-bundle | ^2.8 | Håndtering av filopplasting |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine-utvidelser (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT-autentisering |
| nelmio/cors-bundle | ^2.2 | CORS-headere |
| mpdf/mpdf | ~8.0 | PDF-generering |
| phpoffice/phpspreadsheet | ~1.16 | Excel-/regnearkhåndtering |
| firebase/php-jwt | ^7.0 | Håndtering av JWT-token |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton-integrasjon |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3-implementasjon |

## Frontend

| Teknologi | Versjon | Formål |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI-rammeverk |
| PrimeVue | ^4.5 | Komponentbibliotek |
| Pinia | ^3.0 | Tilstandshåndtering |
| Vue Router | ^5.1 | Klientsideruting |
| Vue I18n | ^11.4 | Internasjonalisering |
| Axios | ^1.16 | HTTP-klient |
| TinyMCE | ^5.10 | Riktekstredigerer |
| Chart.js | ^4.5 | Diagrammer og visualiseringer |
| FullCalendar | ^6.1 | Kalenderkomponent |
| Uppy | ^4.5 | Filopplastingswidget |

## Byggeverktøy

| Teknologi | Versjon | Formål |
|-----------|---------|---------|
| Composer | ^2.8 | PHP-avhengighetsbehandler |
| Webpack | ^5.107 | Modulbundler |
| Symfony Webpack Encore | ^5.3 | Webpack-wrapper for Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS-rammeverk |
| Sass | ^1.100 | CSS-preprocessor |
| TypeScript | ^5.9 | Typesikker JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Kodeformatering |

## Ikoner

| Bibliotek | Versjon | Bruk |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS-klasser `mdi mdi-*`) |

## Database

Chamilo støtter:

* MySQL 5.7+
* MariaDB 10.11.2+

## Skylagring

Via Flysystem-adaptere:

* Lokalt filsystem (standard)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)