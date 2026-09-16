# Serververeisten

Controleer voordat u Chamilo 3.0 installeert of uw server aan de volgende vereisten voldoet.

## Softwarevereisten

### PHP

| Vereiste | Minimum | Aanbevolen |
|-------------|---------|-------------|
| **PHP-versie** | 8.3 | 8.5 |

### Vereiste PHP-extensies

| Extensie | Doel |
|-----------|---------|
| **bcmath** | Rekenen met willekeurige precisie |
| **ctype** | Controle van tekentypen |
| **curl** | HTTP-verzoeken (API-integraties, externe diensten) |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML-parsing en DOM-verwerking (SCORM, RSS, SOAP, LTI) |
| **exif** | Lezen van metagegevens van afbeeldingen (bijv. automatisch oriënteren van geüploade foto's) |
| **fileinfo** | Detectie van MIME-typen voor geüploade bestanden |
| **gd** | Beeldverwerking (miniaturen, CAPTCHA) |
| **iconv** | Conversie van tekensets |
| **intl** | Internationalisering (opmaak van datums, getallen en tekenreeksen) |
| **json** | JSON-codering/decodering |
| **ldap** | LDAP-connector. Hoewel u LDAP waarschijnlijk niet zult gebruiken, vereist Chamilo deze extensie |
| **mbstring** | Verwerking van multibyte-tekenreeksen (UTF-8-ondersteuning) |
| **openssl** | Cryptografische bewerkingen (HTTPS, wachtwoordhashing, JWT-tokens) |
| **pdo**, plus **pdo_mysql** of **pdo_pgsql** | Databaseverbinding (installeer het stuurprogramma dat bij uw database past) |
| **soap** | Verwerking van SOAP-webservices |
| **zip** | Verwerking van ZIP-archieven (SCORM-pakketten, bulkimports/-exports) |
| **zlib** | Compressie die intern door verschillende afhankelijkheden wordt gebruikt |
| **apcu** | Caching op gebruikersniveau (aanbevolen, gecontroleerd maar niet afgedwongen door het installatieprogramma) |
| **opcache** | Opcode-caching (sterk aanbevolen voor prestaties, gecontroleerd maar niet afgedwongen door het installatieprogramma) |
| **xapian** | Volledige-tekstzoekfunctie (optioneel, alleen als u zoeken gebruikt) |

### Database

| Database | Minimumversie | Aanbevolen |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 of hoger |
| **MySQL** | 5.7 | 8.0 of hoger |

MariaDB-versies ouder dan 10.2.2 (en MySQL-versies ouder dan 5.7) vereisen dat ondersteuning voor grote indexen/prefixen handmatig in de serverconfiguratie wordt ingeschakeld voordat u Chamilo installeert.

### Webserver

| Server | Opmerkingen |
|--------|-------|
| **Apache** | Vereist dat `mod_rewrite` (en `ssl`, `headers`, `expires`) is ingeschakeld. Chamilo levert een voorbeeld-vhost mee in `public/main/install/apache.dist.conf`. |
| **Nginx** | Vereist handmatige configuratie voor URL-herschrijving — Chamilo levert geen voorbeeldconfiguratie voor Nginx mee. Raadpleeg de Symfony Nginx-documentatie voor een referentieconfiguratie. |

### Bouwhulpmiddelen

| Hulpmiddel | Doel |
|------|---------|
| **Composer** (^2.8) | Beheer van PHP-afhankelijkheden. Vereist om de PHP-bibliotheken van Chamilo te installeren. |
| **Node.js** (20+ LTS) | JavaScript-runtime. Vereist om frontend-assets te bouwen. |
| **Yarn** (^4, via Corepack) | JavaScript-pakketbeheerder die wordt gebruikt om frontend-assets te bouwen (`yarn install`, `yarn encore production`). |

## Hardwarevereisten

| Resource | Minimum | Aanbevolen |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB of meer (het bouwen van frontend-assets vanuit de bron vereist op zichzelf minstens 4 GB) |
| **CPU** | 2 vCPU's | 2+ kernen |
| **Schijfruimte** | 4 GB (alleen toepassing) | 20+ GB (inclusief geüploade inhoud); bouwen vanuit de bron vereist ~10 GB vrije ruimte tijdens de build |
| **Schijftype** | HDD | SSD (verbetert de prestaties van database en cache aanzienlijk) |

Dit zijn basiscijfers uit de eigen installatiehandleiding van Chamilo. De werkelijke vereisten hangen af van het aantal gelijktijdige gebruikers en het volume van de gehoste inhoud.

## Besturingssysteem

| OS | Opmerkingen |
|----|-------|
| **Linux** | Aanbevolen. Ubuntu 24.04 LTS+, Debian 12+, AlmaLinux 9+ of equivalent. |
| **Windows** | Mogelijk, maar niet grondig getest. Gebruik WSL2 voor ontwikkeling. |
| **macOS** | Alleen voor ontwikkeling / niet getest. |

## Netwerkvereisten

* Een domeinnaam die naar uw server wijst.
* Een SSL/TLS-certificaat voor HTTPS (Let's Encrypt biedt gratis certificaten).
* Uitgaande SMTP-toegang als u e-mails rechtstreeks verstuurt (of gebruik een e-maildienst van derden).
* Poort 443 (HTTPS) en optioneel poort 80 (HTTP, voor omleiding naar HTTPS).

## Vereisten controleren

Nadat u de Chamilo-broncode op uw server hebt geplaatst, kunt u uw PHP-configuratie rechtstreeks controleren:

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## Tips

* **Gebruik PHP-FPM** met Apache of Nginx voor betere prestaties dan mod_php.
* **Plaats uw database op een aparte server** voor platformen die meer dan 500 gelijktijdige gebruikers verwachten.
* **Gebruik SSD-opslag** -- Database-intensieve toepassingen zoals Chamilo profiteren aanzienlijk van snelle schijf-I/O.