# Teknologiapino

Seuraavassa kuvataan Chamilo 3.0:n teknologiapino. Kaikki tässä ilmoitetut versiot todennäköisesti muuttuvat uusien Chamilo-versioiden julkaisun myötä. Versionumerot käyttävät [Composerin versiomerkintää](https://getcomposer.org/doc/articles/versions.md), joka asettaa säännöt jonkinasteiselle joustavuudelle versioiden ympärillä.

Hierarkkiset riippuvuudet mukaan lukien Chamilo käyttää useita satoja vapaan ohjelmiston kirjastoja. Tämä luettelo sisältää vain ne, joita käytämme eniten ja jotka todennäköisesti vaikuttavat Chamilo-kehittäjän työhön noin viikoittain. Olemme kiitollisia kaikille muille vapaan ohjelmiston kehittäjille, jotka tekevät työstämme helpompaa, ylläpidettävämpää ja turvallisempaa.

## Backend

| Teknologia | Versio | Tarkoitus |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Ajoympäristö |
| Symfony | 7.4.* | Kehys |
| Doctrine ORM | ^3.3 | Tietokanta-abstraktio |
| API Platform | ^4.2 | REST API -kehys |
| oneup/flysystem-bundle | ~4.0 | Tiedostotallennuksen abstraktio |
| vich/uploader-bundle | ^2.8 | Tiedostojen latauksen käsittely |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine-laajennukset (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT-todennus |
| nelmio/cors-bundle | ^2.2 | CORS-otsakkeet |
| mpdf/mpdf | ~8.0 | PDF-generointi |
| phpoffice/phpspreadsheet | ~1.16 | Excel-/laskentataulukoiden käsittely |
| firebase/php-jwt | ^7.0 | JWT-tunnusten käsittely |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton-integraatio |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 -toteutus |

## Frontend

| Teknologia | Versio | Tarkoitus |
|-----------|---------|---------|
| Vue.js | ^3.5 | Käyttöliittymäkehys |
| PrimeVue | ^4.5 | Komponenttikirjasto |
| Pinia | ^3.0 | Tilanhallinta |
| Vue Router | ^5.1 | Asiakaspuolen reititys |
| Vue I18n | ^11.4 | Kansainvälistäminen |
| Axios | ^1.16 | HTTP-asiakas |
| TinyMCE | ^5.10 | Rikas tekstieditori |
| Chart.js | ^4.5 | Kaaviot ja visualisoinnit |
| FullCalendar | ^6.1 | Kalenterikomponentti |
| Uppy | ^4.5 | Tiedostonlatauswidget |

## Rakennustyökalut

| Teknologia | Versio | Tarkoitus |
|-----------|---------|---------|
| Composer | ^2.8 | PHP-riippuvuuksien hallinta |
| Webpack | ^5.107 | Moduulipaketoija |
| Symfony Webpack Encore | ^5.3 | Webpack-kääre Symfonyä varten |
| Tailwind CSS | ^3.4 | Utility-first-CSS-kehys |
| Sass | ^1.100 | CSS-esikäsittelijä |
| TypeScript | ^5.9 | Tyyppiturvallinen JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Koodin muotoilu |

## Kuvakkeet

| Kirjasto | Versio | Käyttö |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS-luokat `mdi mdi-*`) |

## Tietokanta

Chamilo tukee:

* MySQL 5.7+
* MariaDB 10.11.2+

## Pilvitallennus

Flysystem-sovittimien kautta:

* Paikallinen tiedostojärjestelmä (oletus)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)