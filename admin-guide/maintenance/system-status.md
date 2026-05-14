# Systeemstatus

De systeemstatuspagina helpt u te controleren of uw Chamilo-server correct is geconfigureerd en mogelijke problemen te identificeren.

## Toegang tot Systeemstatus

Klik in het beheerpaneel op **Systeemstatus** (of **Systeeminformatie**).

## Wat Wordt Weergegeven

![De systeemstatuspagina met PHP-configuratie, databasestatus, bestandsrechten en serverinformatie](/.gitbook/assets/admin-system-status.png)

### PHP-Configuratie

* **PHP-versie** — Chamilo 2.0 vereist PHP 8.2 of hoger
* **Vereiste extensies** — Controleert of alle benodigde PHP-extensies zijn geïnstalleerd
* **PHP-instellingen** — Verifieert belangrijke PHP-instellingen zoals geheugenlimiet, uploadlimieten en uitvoeringstijd

### Databasestatus

* **Databaseverbinding** — Bevestigt dat de database toegankelijk is
* **Databaseversie** — Toont de versie van de databaseserver

### Bestandsrechten

* **Schrijfbare mappen** — Controleert of Chamilo kan schrijven naar vereiste mappen (cache, uploads, logs)

### Serverinformatie

* **Besturingssysteem** — Details van het serverbesturingssysteem
* **Webserver** — Apache, Nginx of andere
* **Schijfruimte** — Beschikbare opslagruimte

## Aanbevolen Controles

Voer deze controles regelmatig uit:

* **Na installatie** — Controleer of aan alle vereisten is voldaan
* **Na upgrades** — Zorg ervoor dat de PHP-versie en extensies nog steeds compatibel zijn
* **Bij problemen** — Controleer eerst de systeemstatus bij het oplossen van problemen