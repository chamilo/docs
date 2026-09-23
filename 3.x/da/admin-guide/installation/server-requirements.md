# Serverkrav

Før du installerer Chamilo 3.0 skal du kontrollere, at din server opfylder følgende krav.

## Softwarekrav

### PHP

| Krav | Minimum | Anbefalet |
|-------------|---------|-------------|
| **PHP-version** | 8.3 | 8.5 |

### Påkrævede PHP-udvidelser

| Udvidelse | Formål |
|-----------|---------|
| **bcmath** | Matematik med vilkårlig præcision |
| **ctype** | Kontrol af tegntyper |
| **curl** | HTTP-forespørgsler (API-integrationer, eksterne tjenester) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-parsing og DOM-håndtering (SCORM, RSS, SOAP, LTI) |
| **exif** | Læsning af billedmetadata (f.eks. automatisk orientering af uploadede fotos) |
| **fileinfo** | MIME-typedetektering for uploadede filer |
| **gd** | Billedbehandling (miniaturer, CAPTCHA) |
| **iconv** | Konvertering af tegnsæt |
| **intl** | Internationalisering (formatering af dato, tal og strenge) |
| **json** | JSON-kodning/afkodning |
| **ldap** | LDAP-connector. Selvom du sandsynligvis ikke bruger LDAP, kræver Chamilo den |
| **mbstring** | Håndtering af multibyte-strenge (UTF-8-understøttelse) |
| **openssl** | Kryptografiske operationer (HTTPS, password-hashing, JWT-tokens) |
| **pdo**, plus **pdo_mysql** eller **pdo_pgsql** | Databaseforbindelse (installer den driver, der matcher din database) |
| **soap** | Håndtering af SOAP-webtjenester |
| **zip** | Håndtering af ZIP-arkiver (SCORM-pakker, masseimport/-eksport) |
| **zlib** | Komprimering, der bruges internt af flere afhængigheder |
| **apcu** | Caching på brugerniveau (anbefalet, tjekkes men håndhæves ikke af installationsprogrammet) |
| **opcache** | Opcode-caching (stærkt anbefalet af hensyn til ydeevne, tjekkes men håndhæves ikke af installationsprogrammet) |
| **xapian** | Fuldtekstsøgning (valgfri, kun hvis du bruger søgning) |

### Database

| Database | Minimumversion | Anbefalet |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 eller nyere |
| **MySQL** | 5.7 | 8.0 eller nyere |

MariaDB-versioner ældre end 10.2.2 (og MySQL-versioner ældre end 5.7) kræver, at understøttelse af store indekser/præfikser aktiveres manuelt i serverkonfigurationen, før Chamilo installeres.

### Webserver

| Server | Bemærkninger |
|--------|-------|
| **Apache** | Kræver at `mod_rewrite` (samt `ssl`, `headers`, `expires`) er aktiveret. Chamilo medleverer et eksempel på vhost i `public/main/install/apache.dist.conf`. |
| **Nginx** | Kræver manuel konfiguration til URL-omskrivning — Chamilo medleverer ikke en eksempelkonfiguration til Nginx. Se Symfony Nginx-dokumentationen for en referencekonfiguration. |

### Byggeværktøjer

| Værktøj | Formål |
|------|---------|
| **Composer** (^2.8) | PHP-afhængighedsstyring. Påkrævet for at installere Chamilos PHP-biblioteker. |
| **Node.js** (20+ LTS) | JavaScript-runtime. Påkrævet for at bygge frontend-assets. |
| **Yarn** (^4, via Corepack) | JavaScript-pakkehåndtering, der bruges til at bygge frontend-assets (`yarn install`, `yarn encore production`). |

## Hardwarekrav

| Ressource | Minimum | Anbefalet |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB eller mere (bygning af frontend-assets fra kildekode kræver i sig selv mindst 4 GB) |
| **CPU** | 2 vCPU'er | 2+ kerner |
| **Diskplads** | 4 GB (kun applikationen) | 20+ GB (inklusive uploadet indhold); bygning fra kildekode kræver ca. 10 GB ledig plads under bygningen |
| **Disktype** | HDD | SSD (forbedrer database- og cache-ydeevne betydeligt) |

Disse er basistal fra Chamilos egen installationsvejledning. De faktiske krav afhænger af antallet af samtidige brugere og mængden af hostet indhold.

## Operativsystem

| OS | Bemærkninger |
|----|-------|
| **Linux** | Anbefalet. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ eller tilsvarende. |
| **Windows** | Muligt, men ikke grundigt testet. Brug WSL2 til udvikling. |
| **macOS** | Kun til udvikling / utestet. |

## Netværkskrav

* Et domænenavn, der peger på din server.
* Et SSL/TLS-certifikat til HTTPS (Let's Encrypt stiller gratis certifikater til rådighed).
* Udgående SMTP-adgang, hvis e-mails sendes direkte (eller brug en tredjeparts e-mailtjeneste).
* Port 443 (HTTPS) og eventuelt port 80 (HTTP, til omdirigering til HTTPS).

## Kontrol af krav

Når Chamilo-kildekoden er placeret på din server, kan du kontrollere din PHP-konfiguration direkte:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Brug PHP-FPM** med Apache eller Nginx for bedre ydeevne end mod_php.
* **Adskil din database** på en dedikeret server til platforme, der forventer mere end 500 samtidige brugere.
* **Brug SSD-lager** -- Databaseintensive applikationer som Chamilo har betydelig gavn af hurtig disk-I/O.