# Serverkrav

Før du installerer Chamilo 3.0, må du kontrollere at serveren oppfyller følgende krav.

## Programvarekrav

### PHP

| Krav | Minimum | Anbefalt |
|-------------|---------|-------------|
| **PHP-versjon** | 8.3 | 8.5 |

### Påkrevde PHP-utvidelser

| Utvidelse | Formål |
|-----------|---------|
| **bcmath** | Matematikk med vilkårlig presisjon |
| **ctype** | Kontroll av tegntyper |
| **curl** | HTTP-forespørsler (API-integrasjoner, eksterne tjenester) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-parsing og DOM-håndtering (SCORM, RSS, SOAP, LTI) |
| **exif** | Lesing av bildemetadata (f.eks. automatisk orientering av opplastede bilder) |
| **fileinfo** | MIME-typedeteksjon for opplastede filer |
| **gd** | Bildebehandling (miniatyrbilder, CAPTCHA) |
| **iconv** | Konvertering av tegnsett |
| **intl** | Internasjonalisering (formatering av dato, tall og strenger) |
| **json** | JSON-koding/dekoding |
| **ldap** | LDAP-kobling. Selv om du sannsynligvis ikke bruker LDAP, krever Chamilo den |
| **mbstring** | Håndtering av multibyte-strenger (UTF-8-støtte) |
| **openssl** | Kryptografiske operasjoner (HTTPS, passordhashing, JWT-token) |
| **pdo**, pluss **pdo_mysql** eller **pdo_pgsql** | Databasetilkobling (installer driveren som matcher databasen din) |
| **soap** | Håndtering av SOAP-webtjenester |
| **zip** | Håndtering av ZIP-arkiver (SCORM-pakker, masseimport/eksport) |
| **zlib** | Komprimering som brukes internt av flere avhengigheter |
| **apcu** | Hurtigbuffer på brukernivå (anbefalt, sjekkes men håndheves ikke av installasjonsprogrammet) |
| **opcache** | Opcode-hurtigbuffer (sterkt anbefalt for ytelse, sjekkes men håndheves ikke av installasjonsprogrammet) |
| **xapian** | Fulltekstsøk (valgfritt, kun hvis du bruker søk) |

### Database

| Database | Minimumsversjon | Anbefalt |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 eller nyere |
| **MySQL** | 5.7 | 8.0 eller nyere |

MariaDB-versjoner eldre enn 10.2.2 (og MySQL-versjoner eldre enn 5.7) krever at støtte for store indekser/prefikser aktiveres manuelt i serverkonfigurasjonen før Chamilo installeres.

### Webserver

| Server | Merknader |
|--------|-------|
| **Apache** | Krever at `mod_rewrite` (og `ssl`, `headers`, `expires`) er aktivert. Chamilo leveres med et eksempel på vhost i `public/main/install/apache.dist.conf`. |
| **Nginx** | Krever manuell konfigurasjon for URL-omskriving — Chamilo leveres ikke med et eksempel på Nginx-konfigurasjon. Se Symfony Nginx-dokumentasjonen for en referansekonfigurasjon. |

### Byggeverktøy

| Verktøy | Formål |
|------|---------|
| **Composer** (^2.8) | PHP-avhengighetsstyring. Påkrevd for å installere Chamilos PHP-biblioteker. |
| **Node.js** (20+ LTS) | JavaScript-kjøretid. Påkrevd for å bygge frontend-ressurser. |
| **Yarn** (^4, via Corepack) | JavaScript-pakkebehandler som brukes til å bygge frontend-ressurser (`yarn install`, `yarn encore production`). |

## Maskinvarekrav

| Ressurs | Minimum | Anbefalt |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB eller mer (bygging av frontend-ressurser fra kildekode krever minst 4 GB alene) |
| **CPU** | 2 vCPU-er | 2+ kjerner |
| **Diskplass** | 4 GB (kun applikasjon) | 20+ GB (inkludert opplastet innhold); bygging fra kildekode krever ~10 GB ledig under byggingen |
| **Disktype** | HDD | SSD (forbedrer database- og hurtigbufferytelse betydelig) |

Dette er basistall fra Chamilos egen installasjonsveiledning. Faktiske krav avhenger av antall samtidige brukere og mengden innhold som hostes.

## Operativsystem

| OS | Merknader |
|----|-------|
| **Linux** | Anbefalt. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ eller tilsvarende. |
| **Windows** | Mulig, men ikke grundig testet. Bruk WSL2 til utvikling. |
| **macOS** | Kun utvikling / utestet. |

## Nettverkskrav

* Et domenenavn som peker til serveren din.
* Et SSL/TLS-sertifikat for HTTPS (Let's Encrypt tilbyr gratis sertifikater).
* Utgående SMTP-tilgang hvis e-post sendes direkte (eller bruk en tredjeparts e-posttjeneste).
* Port 443 (HTTPS) og eventuelt port 80 (HTTP, for omdirigering til HTTPS).

## Kontroll av krav

Etter at du har plassert Chamilo-kildekoden på serveren, kan du sjekke PHP-konfigurasjonen direkte:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Bruk PHP-FPM** med Apache eller Nginx for bedre ytelse enn mod_php.
* **Skill ut databasen** til en dedikert server for plattformer som forventer mer enn 500 samtidige brukere.
* **Bruk SSD-lagring** -- Databaseintensive applikasjoner som Chamilo drar betydelig nytte av rask disk-I/O.