# Serververeisten

Voordat u Chamilo 2.0 installeert, controleer of uw server voldoet aan de volgende vereisten.

## Softwarevereisten

### PHP

| Vereiste | Minimum | Aanbevolen |
|----------|---------|------------|
| **PHP-versie** | 8.2 | 8.3 of hoger |

### Vereiste PHP-extensies

| Extensie | Doel |
|----------|------|
| **curl** | HTTP-verzoeken (API-integraties, externe diensten) |
| **fileinfo** | MIME-type detectie voor geüploade bestanden |
| **gd** | Beeldverwerking (miniaturen, CAPTCHA) |
| **intl** | Internationalisering (datum-, getal- en tekenreeksopmaak) |
| **json** | JSON coderen/decoderen |
| **ldap** | LDAP-connector. Hoewel u waarschijnlijk geen LDAP zult gebruiken, vereist Chamilo dit |
| **mbstring** | Behandeling van multibyte-tekenreeksen (UTF-8 ondersteuning) |
| **openssl** | Cryptografische bewerkingen (HTTPS, wachtwoordhashing, tokens) |
| **pdo_mysql** of **pdo_pgsql** | Databaseconnectiviteit (installeer degene die overeenkomt met uw database) |
| **xml** | XML-parsing (SCORM, RSS, SOAP) |
| **zip** | Behandeling van ZIP-archieven (SCORM-pakketten, bulkimport/export) |
| **apcu** | Gebruikersniveau caching (aanbevolen) |
| **opcache** | Opcode caching (sterk aanbevolen voor prestaties) |
| **xapian** | Volledige tekstzoekfunctie (optioneel, alleen als u zoekfuncties gebruikt) |

### Database

| Database | Minimale versie |
|----------|-----------------|
| **MySQL** | 8.0 |
| **MariaDB** | 10.4 |

### Webserver

| Server | Opmerkingen |
|--------|-------------|
| **Apache** | Vereist dat `mod_rewrite` is ingeschakeld. |
| **Nginx** | Vereist handmatige configuratie voor URL-herschrijving. Zie de Symfony Nginx-documentatie voor een referentieconfiguratie. |

### Bouwtools

| Tool | Doel |
|------|------|
| **Composer** | PHP-afhankelijkheidsbeheer. Vereist om Chamilo's PHP-bibliotheken te installeren. |
| **Node.js** (18+) | JavaScript-runtime. Vereist om frontend-assets te bouwen. |
| **npm** | JavaScript-pakketbeheerder. Geïnstalleerd met Node.js. |

## Hardwarevereisten

| Middel | Minimum | Aanbevolen |
|--------|---------|------------|
| **RAM** | 2 GB | 4 GB of meer |
| **CPU** | 1 kern | 2+ kernen |
| **Schijfruimte** | 2 GB (alleen applicatie) | 20+ GB (inclusief geüploade inhoud) |
| **Schijftype** | HDD | SSD (verbetert database- en cacheprestaties aanzienlijk) |

Dit zijn basiscijfers. De werkelijke vereisten hangen af van het aantal gelijktijdige gebruikers en de hoeveelheid gehoste inhoud.

## Besturingssysteem

| OS | Opmerkingen |
|----|-------------|
| **Linux** | Aanbevolen. Ubuntu 22.04+, Debian 12+, AlmaLinux 9+, of gelijkwaardig. |
| **Windows** | Mogelijk, maar niet grondig getest. Gebruik WSL2 voor ontwikkeling. |
| **macOS** | Alleen voor ontwikkeling / niet getest. |

## Netwerkvereisten

* Een domeinnaam die naar uw server verwijst.
* Een SSL/TLS-certificaat voor HTTPS (Let's Encrypt biedt gratis certificaten).
* Uitgaande SMTP-toegang als u direct e-mails verstuurt (of gebruik een externe e-maildienst).
* Poort 443 (HTTPS) en optioneel poort 80 (HTTP, voor doorverwijzing naar HTTPS).

## Vereisten controleren

Nadat u de Chamilo-broncode op uw server hebt geplaatst, kunt u uw PHP-configuratie direct controleren:

```bash
php -m          # Lijst met geïnstalleerde extensies
php -i          # Volledige PHP-informatie
```

## Tips

* **Gebruik PHP-FPM** met Apache of Nginx voor betere prestaties dan mod_php.
* **Scheid uw database** naar een dedicated server voor platforms die meer dan 500 gelijktijdige gebruikers verwachten.
* **Gebruik SSD-opslag** -- Database-intensieve toepassingen zoals Chamilo profiteren aanzienlijk van snelle schijf-I/O.