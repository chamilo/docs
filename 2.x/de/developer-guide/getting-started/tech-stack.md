# Technologie-Stack

Im Folgenden wird der Technologie-Stack für Chamilo 2.0 beschrieben. Alle hier angegebenen Versionen können sich mit der Veröffentlichung neuer Chamilo-Versionen ändern. Die Versionsnummern verwenden die [Versionsnotation von Composer](https://getcomposer.org/doc/articles/versions.md), die Regeln festlegt, um eine gewisse Flexibilität bei den Versionen zu ermöglichen.

Einschließlich hierarchischer Abhängigkeiten verwendet Chamilo mehrere hundert Freie-Software-Bibliotheken. Diese Liste enthält nur diejenigen, die wir am häufigsten nutzen und die wahrscheinlich die Arbeit eines Chamilo-Entwicklers wöchentlich beeinflussen. Wir sind allen anderen Freie-Software-Entwicklern da draußen dankbar, die unsere Arbeit einfacher, wartbarer und sicherer machen.

## Backend

| Technologie | Version | Zweck |
|-----------|---------|---------|
| PHP | 8.2+ | Laufzeitumgebung |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Datenbankabstraktion |
| API Platform | ^3.0 | REST-API-Framework |
| oneup/flysystem-bundle | ~4.0 | Dateispeicherabstraktion |
| vich/uploader-bundle | ^2.8 | Datei-Upload-Verwaltung |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine-Erweiterungen (Baum, Zeitstempel, Sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT-Authentifizierung |
| nelmio/cors-bundle | ^2.2 | CORS-Header |
| mpdf/mpdf | ~8.0 | PDF-Generierung |
| phpoffice/phpspreadsheet | ~1.16 | Excel-/Tabellenkalkulationsverarbeitung |
| firebase/php-jwt | ^7.0 | JWT-Token-Verwaltung |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton-Integration |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3-Implementierung |

## Frontend

| Technologie | Version | Zweck |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI-Framework |
| PrimeVue | ^4.5 | Komponentenbibliothek |
| Pinia | ^3.0 | Zustandsverwaltung |
| Vue Router | 5.0 | Clientseitiges Routing |
| Vue I18n | 11.3 | Internationalisierung |
| Axios | ^1.13 | HTTP-Client |
| TinyMCE | ^5.10 | Rich-Text-Editor |
| Chart.js | ^4.5 | Diagramme und Visualisierungen |
| FullCalendar | ^6.1 | Kalenderkomponente |
| Uppy | ^4.5 | Datei-Upload-Widget |
| PrimeFlex | ^4.0 | CSS-Utility-Framework |

## Build-Tools

| Technologie | Version | Zweck |
|-----------|---------|---------|
| Composer | ^2.8 | PHP-Abhängigkeitsmanager |
| Webpack | ^5.105 | Modul-Bundler |
| Symfony Webpack Encore | ^5.3 | Webpack-Wrapper für Symfony |
| Tailwind CSS | ^3.4 | Utility-First-CSS-Framework |
| Sass | ^1.98 | CSS-Präprozessor |
| TypeScript | ^5.9 | Typensicheres JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Code-Formatierung |

## Icons

| Bibliothek | Version | Verwendung |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS-Klassen `mdi mdi-*`) |

## Datenbank

Chamilo unterstützt:

* MySQL 5.7+
* MariaDB 10.11.2+

## Cloud-Speicher

Über Flysystem-Adapter:

* Lokales Dateisystem (Standard)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)