# Systeemstatus

De pagina systeemstatus helpt u te controleren of uw Chamilo-server correct is geconfigureerd en mogelijke problemen te identificeren.

## Systeemstatus openen

Klik in het beheerpaneel op **Systeemstatus** (of **Systeeminformatie**).

## Wat het toont

![De pagina systeemstatus met PHP-configuratie, databasestatus, bestandsrechten en serverinformatie](../../.gitbook/assets/admin-system-status.png)

### PHP-configuratie

* **PHP-versie** — Chamilo 3.0 ondersteunt PHP 8.3, 8.4 en 8.5
* **Vereiste extensies** — Controleert of alle benodigde PHP-extensies zijn geïnstalleerd
* **PHP-instellingen** — Verifieert belangrijke PHP-instellingen zoals geheugenlimiet, uploadlimieten en uitvoeringstijd

### Databasestatus

* **Databaseverbinding** — Bevestigt dat de database toegankelijk is
* **Databaseversie** — Toont de versie van de databaseserver

### Bestandsrechten

* **Schrijfbare mappen** — Controleert of Chamilo kan schrijven naar vereiste mappen (cache, uploads, logs)

### Serverinformatie

* **Besturingssysteem** — Gegevens van het server-OS
* **Webserver** — Apache, Nginx of anders
* **Schijfruimte** — Beschikbare opslag

## Aanbevolen controles

Voer deze controles regelmatig uit:

* **Na installatie** — Controleer of aan alle vereisten is voldaan
* **Na upgrades** — Zorg dat PHP-versie en extensies nog compatibel zijn
* **Bij problemen** — Controleer eerst de systeemstatus bij het oplossen van problemen