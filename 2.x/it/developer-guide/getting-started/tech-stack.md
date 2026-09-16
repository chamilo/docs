# Stack Tecnologico

Di seguito è descritto lo stack tecnologico di Chamilo 2.0. Tutte le versioni indicate qui sono soggette a modifiche con il rilascio di nuove versioni di Chamilo. I numeri di versione utilizzano la [notazione delle versioni di Composer](https://getcomposer.org/doc/articles/versions.md), che stabilisce regole per consentire una certa flessibilità riguardo alle versioni.

Includendo le dipendenze gerarchiche, Chamilo utilizza diverse centinaia di librerie di software libero. Questo elenco include solo quelle che utilizziamo maggiormente e che probabilmente influenzeranno il lavoro di uno sviluppatore Chamilo ogni settimana circa. Siamo grati a tutti gli altri sviluppatori di software libero che rendono il nostro lavoro più semplice, più manutenibile e più sicuro.

## Backend

| Tecnologia | Versione | Scopo |
|-----------|---------|---------|
| PHP | 8.2+ | Runtime |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Astrazione del database |
| API Platform | ^3.0 | Framework per API REST |
| oneup/flysystem-bundle | ~4.0 | Astrazione per l'archiviazione dei file |
| vich/uploader-bundle | ^2.8 | Gestione del caricamento dei file |
| stof/doctrine-extensions-bundle | ^1.12 | Estensioni Doctrine (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | Autenticazione JWT |
| nelmio/cors-bundle | ^2.2 | Intestazioni CORS |
| mpdf/mpdf | ~8.0 | Generazione PDF |
| phpoffice/phpspreadsheet | ~1.16 | Gestione di fogli di calcolo Excel |
| firebase/php-jwt | ^7.0 | Gestione dei token JWT |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | Integrazione con BigBlueButton |
| packbackbooks/lti-1p3-tool | ^6.4 | Implementazione LTI 1.3 |

## Frontend

| Tecnologia | Versione | Scopo |
|-----------|---------|---------|
| Vue.js | ^3.5 | Framework per l'interfaccia utente |
| PrimeVue | ^4.5 | Libreria di componenti |
| Pinia | ^3.0 | Gestione dello stato |
| Vue Router | 5.0 | Routing lato client |
| Vue I18n | 11.3 | Internazionalizzazione |
| Axios | ^1.13 | Client HTTP |
| TinyMCE | ^5.10 | Editor di testo ricco |
| Chart.js | ^4.5 | Grafici e visualizzazioni |
| FullCalendar | ^6.1 | Componente calendario |
| Uppy | ^4.5 | Widget per il caricamento dei file |
| PrimeFlex | ^4.0 | Framework di utilità CSS |

## Strumenti di Build

| Tecnologia | Versione | Scopo |
|-----------|---------|---------|
| Composer | ^2.8 | Gestore di dipendenze PHP |
| Webpack | ^5.105 | Bundler di moduli |
| Symfony Webpack Encore | ^5.3 | Wrapper di Webpack per Symfony |
| Tailwind CSS | ^3.4 | Framework CSS utility-first |
| Sass | ^1.98 | Preprocessore CSS |
| TypeScript | ^5.9 | JavaScript con tipizzazione |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Formattazione del codice |

## Icone

| Libreria | Versione | Utilizzo |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (classi CSS `mdi mdi-*`) |

## Database

Chamilo supporta:

* MySQL 5.7+
* MariaDB 10.11.2+

## Archiviazione Cloud

Tramite adattatori Flysystem:

* Filesystem locale (predefinito)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)