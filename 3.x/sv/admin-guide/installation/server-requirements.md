# Serverkrav

Innan du installerar Chamilo 3.0, kontrollera att servern uppfyller följande krav.

## Programvarukrav

### PHP

| Krav | Minimum | Rekommenderat |
|-------------|---------|-------------|
| **PHP-version** | 8.3 | 8.5 |

### Obligatoriska PHP-tillägg

| Tillägg | Syfte |
|-----------|---------|
| **bcmath** | Matematik med godtycklig precision |
| **ctype** | Kontroll av teckentyper |
| **curl** | HTTP-förfrågningar (API-integrationer, externa tjänster) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-parsning och DOM-hantering (SCORM, RSS, SOAP, LTI) |
| **exif** | Läsa bildmetadata (t.ex. automatisk orientering av uppladdade foton) |
| **fileinfo** | MIME-typdetektering för uppladdade filer |
| **gd** | Bildbehandling (miniatyrer, CAPTCHA) |
| **iconv** | Teckenuppsättningskonvertering |
| **intl** | Internationalisering (formatering av datum, tal och strängar) |
| **json** | JSON-kodning/avkodning |
| **ldap** | LDAP-anslutning. Även om du troligen inte använder LDAP kräver Chamilo det |
| **mbstring** | Hantering av multibyte-strängar (UTF-8-stöd) |
| **openssl** | Kryptografiska operationer (HTTPS, lösenordshashning, JWT-token) |
| **pdo**, plus **pdo_mysql** eller **pdo_pgsql** | Databasanslutning (installera drivrutinen som matchar din databas) |
| **soap** | Hantering av SOAP-webbtjänster |
| **zip** | Hantering av ZIP-arkiv (SCORM-paket, massimport/export) |
| **zlib** | Komprimering som används internt av flera beroenden |
| **apcu** | Cachning på användarnivå (rekommenderas, kontrolleras men tvingas inte av installationsprogrammet) |
| **opcache** | Opcode-cachning (starkt rekommenderat för prestanda, kontrolleras men tvingas inte av installationsprogrammet) |
| **xapian** | Fulltextsökning (valfritt, endast om du använder sökning) |

### Databas

| Databas | Minsta version | Rekommenderat |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 eller högre |
| **MySQL** | 5.7 | 8.0 eller högre |

MariaDB-versioner äldre än 10.2.2 (och MySQL-versioner äldre än 5.7) kräver att stöd för stora index/prefix aktiveras manuellt i serverkonfigurationen innan Chamilo installeras.

### Webbserver

| Server | Anteckningar |
|--------|-------|
| **Apache** | Kräver att `mod_rewrite` (samt `ssl`, `headers`, `expires`) är aktiverat. Chamilo levereras med ett exempel på vhost i `public/main/install/apache.dist.conf`. |
| **Nginx** | Kräver manuell konfiguration för URL-omskrivning — Chamilo levereras inte med någon exempelkonfiguration för Nginx. Se Symfony Nginx-dokumentationen för en referenskonfiguration. |

### Byggverktyg

| Verktyg | Syfte |
|------|---------|
| **Composer** (^2.8) | PHP-beroendehantering. Krävs för att installera Chamilos PHP-bibliotek. |
| **Node.js** (20+ LTS) | JavaScript-runtime. Krävs för att bygga frontend-tillgångar. |
| **Yarn** (^4, via Corepack) | JavaScript-pakethanterare som används för att bygga frontend-tillgångar (`yarn install`, `yarn encore production`). |

## Hårdvarukrav

| Resurs | Minimum | Rekommenderat |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB eller mer (att bygga frontend-tillgångar från källkod kräver minst 4 GB i sig) |
| **CPU** | 2 vCPU:er | 2+ kärnor |
| **Diskutrymme** | 4 GB (endast applikationen) | 20+ GB (inklusive uppladdat innehåll); att bygga från källkod kräver ~10 GB ledigt under bygget |
| **Disktyp** | HDD | SSD (förbättrar databas- och cacheprestanda avsevärt) |

Detta är basvärden från Chamilos egen installationsguide. De faktiska kraven beror på antalet samtidiga användare och mängden innehåll som lagras.

## Operativsystem

| OS | Anteckningar |
|----|-------|
| **Linux** | Rekommenderas. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ eller motsvarande. |
| **Windows** | Möjligt men inte grundligt testat. Använd WSL2 för utveckling. |
| **macOS** | Endast utveckling / otestat. |

## Nätverkskrav

* Ett domännamn som pekar mot din server.
* Ett SSL/TLS-certifikat för HTTPS (Let's Encrypt tillhandahåller kostnadsfria certifikat).
* Utgående SMTP-åtkomst om e-post skickas direkt (eller använd en tredjepartstjänst för e-post).
* Port 443 (HTTPS) och valfritt port 80 (HTTP, för omdirigering till HTTPS).

## Kontrollera kraven

När du har placerat Chamilo-källkoden på servern kan du kontrollera PHP-konfigurationen direkt:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Använd PHP-FPM** med Apache eller Nginx för bättre prestanda än mod_php.
* **Separera databasen** till en dedikerad server för plattformar som förväntar sig mer än 500 samtidiga användare.
* **Använd SSD-lagring** -- Databasintensiva applikationer som Chamilo gynnas avsevärt av snabb disk-I/O.