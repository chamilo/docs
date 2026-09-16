# Upgraden

Opmerking: Op deze pagina gebruiken we 3.0.0 als strikt versienummer en 3.x om alle versies aan te duiden die beginnen met het cijfer 3 (3.0.0, 3.0.1, 3.1.0, enz.). Dezelfde conventie geldt voor 2.x.

Het upgradeproces vanaf 1.11.x wordt ook beschreven in uw bestand `public/documentation/installation_guide.html`, in uw Chamilo-code.
De informatie hier is grotendeels overbodig. U kunt ze online bekijken op `https://campus.chamilo.net/documentation/installation_guide.html`.

**Upgrade naar 3.0, niet naar 2.x.** Versie 3.0 is de huidige release, en sommige instellingen van 1.11.x hadden nog geen equivalent in 2.0.0. Een 1.11.x-systeem gaat daarom rechtstreeks naar 3.0. We hebben vergelijkbare migraties uitgebreid getest, maar elk platform heeft zijn eigen geschiedenis: probeer het eerst op een testomgeving, en overweeg professionele begeleiding door [officiële Chamilo-providers](https://chamilo.org/providers) bij deze onderneming.

## Upgraden van 1.11.x naar 3.0

Upgraden van Chamilo 1.11.x naar 3.0 is een **grote migratie**, geen eenvoudige update. Chamilo 2.0 is herbouwd op het Symfony-framework met een herstructureerd databaseschema, een nieuwe API en een andere bestandsorganisatie, en 3.0 zet die lijn voort. Plan deze migratie zorgvuldig en probeer ze uit op een testomgeving voordat u ze in productie uitrolt.

### Voordat u begint

1. **Lees de release notes** van Chamilo 3.x om te begrijpen wat er is veranderd, wat nieuw is, en welke functies van 1.11.x mogelijk nog niet beschikbaar zijn.
2. **Maak van alles een back-up**:
   - Volledige databasedump (`mysqldump` of equivalent).
   - Alle bestanden in de installatiemap van Chamilo 1.11.x, vooral `app/upload/`, `app/courses/` en `main/`.
   - Uw bestand `configuration.php`.
3. **Test eerst op een staging-server.** Voer de migratie nooit rechtstreeks uit op uw productieserver.
4. **Controleer de serververeisten.** Chamilo 3.x heeft andere vereisten dan 1.11.x (met name PHP 8.3 of later — de installer weigert alles ouder). Zie [Serververeisten](server-requirements.md).
5. **Verwijder de tabel `version` uit de 1.11.x-database.** Deze stap is verplicht. Chamilo 2.x en later slaan de Doctrine-migratiegeschiedenis op in een tabel met die naam, met andere kolommen. Als u de 1.11.x-tabel laat staan, stopt de upgrade onmiddellijk. De tabel is niet nodig voor het functioneren van Chamilo 1.11.x.
6. **Pak de nieuwe code uit in een nieuwe map.** De 1.11.x-bestanden blijven waar ze zijn. De installer leest ze als bron van uw cursussen en uploads, en schrijft het resultaat naar de nieuwe boomstructuur.

### De upgrade uitvoeren

U kunt de upgrade uitvoeren via de webwizard of via de opdrachtregel.

#### Webwizard

1. Richt de `DocumentRoot` van uw virtual host op de subdirectory `public/` van de nieuwe boomstructuur.
2. Open uw URL. De wizard start, omdat de nieuwe boomstructuur nog geen `.env`-bestand heeft.
3. Selecteer in stap 2 de upgrade-optie en geef het rootpad van uw 1.11.x-installatie op.
4. Volg de wizard tot het einde.

#### Opdrachtregel

Stel `UPDATE_PATH` in op de root van uw 1.11.x-installatie en voer daarna de migraties uit:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Verhoog eerst `memory_limit` en `max_execution_time`. De migratie leest elk cursusbestand, dus ze heeft veel meer nodig dan de standaardwaarden.

#### Hoe lang het duurt

De duur hangt af van de omvang van uw database en van uw cursusbestanden. Als referentiepunt: een 1.11.28-platform met 238 tabellen, 11 cursussen, 63 gebruikers en 1489 cursusbestanden duurde **6 minuten** en 1,7 GB geheugen, en voerde 393 migraties uit. Een groot productieplatform duurt uren. Plan een onderhoudsvenster, en lees het [Chamilo-forum](https://chamilo.org) of neem contact op met een [officiële provider](https://chamilo.org/providers) voordat u het in productie uitvoert.

### Wat mogelijk handmatige aandacht vereist

| Gebied | Opmerkingen |
|------|-------|
| **Aangepaste plugins** | Plugins van 1.11.x werken niet in 2.x of 3.x. Ze moeten herschreven of vervangen worden. De officiële plugins zijn geleidelijk overgezet sinds 2.0 — controleer de pluginlijst van uw versie om te zien welke beschikbaar zijn. |
| **Aangepaste thema's** | Thema's van 1.11.x werken niet in 2.x of 3.x. Maak uw huisstijl opnieuw met het themasysteem van 3.x. |
| **Aangepaste databasewijzigingen** | Eventuele directe databasewijzigingen buiten Chamilo om worden mogelijk niet gemigreerd. |
| **SCORM-pakketten** | SCORM-inhoud zou moeten migreren, maar test pakketten afzonderlijk om het afspelen te verifiëren. |
| **Externe integraties** | Integraties die de 1.11.x-API of webservices gebruiken, moeten worden bijgewerkt om de REST-only API van 2.x te gebruiken via [API Platform](https://github.com/api-platform/api-platform). |

## Upgraden van 2.x naar 3.0

Deze upgrade behoudt uw bestaande map en uw bestaande database. U kopieert de nieuwe code over de oude boomstructuur en voert daarna de migraties uit, via de webwizard of via de opdrachtregel.

### Vul eerst de migratiegeschiedenis

Chamilo installeert het databaseschema rechtstreeks vanuit de entiteitsdefinities, zodat een installatie die door het installatieprogramma is aangemaakt het uiteindelijke schema bevat, maar een **lege migratiegeschiedenis**. Installaties die vóór Chamilo 3.0 zijn aangemaakt, hebben die geschiedenis nooit gekregen. Twee zaken hangen ervan af:

* `doctrine:migrations:migrate` bepaalt daaruit wat er moet worden uitgevoerd. Met een lege geschiedenis probeert het elke migratie vanaf het begin opnieuw uit te voeren over een schema dat al actueel is.
* Het webinstallatieprogramma bepaalt daaruit of er een upgrade in behandeling is. Met een lege geschiedenis weigert het het verzoek, omdat niets aantoont dat een upgrade nodig is.

Vul de geschiedenis dus één keer en respecteer de onderstaande volgorde.

> **Waarschuwing: vul de geschiedenis voordat u de nieuwe code kopieert.** De commando's markeren elke migratie die de **uitgerolde** code bevat als al uitgevoerd. Als u ze uitvoert nadat u de 3.0-code hebt gekopieerd, markeren ze ook de 3.0-migraties, en wordt uw upgrade nooit uitgevoerd.

Met uw huidige versie nog op zijn plaats, voert u uit:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Het eerste commando maakt de geschiedenistabel aan. Het tweede markeert de migraties van uw huidige versie. `doctrine:migrations:version` faalt op zichzelf als de tabel nog niet bestaat, sla het eerste commando dus niet over.

Controleer het resultaat:

```bash
php bin/console doctrine:migrations:status
```

`Executed` moet gelijk zijn aan `Available`, en `New` moet 0 zijn. Kopieer nu de 3.0-code.

### Voer de upgrade uit

Kopieer de nieuwe code en open vervolgens uw URL en volg de wizard, of voer de migraties uit vanaf de opdrachtregel:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

De webwizard opent alleen zolang er migraties in behandeling zijn. Zodra de upgrade is voltooid, antwoordt hij opnieuw met `409 Conflict`, wat hem beschermt: de wizard heeft geen eigen login.

## Chamilo 3.0.x bijwerken

Kleine updates binnen de 3.0-tak zijn eenvoudiger.

### Updateproces

#### Met een pakket

1. **Maak een back-up** van de database en bestanden.

2. **Download de nieuwste 3.0.x-versie** van [chamilo.org](https://chamilo.org/download):

3. **Pak lokaal uit**

Bijvoorbeeld (pas aan op de gedownloade versie)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopieer de bestanden over uw bestaande Chamilo-installatie**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Voer databasemigraties uit:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Wis de cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Wijzig de rechten**

Pas aan op de gebruiker van uw webserver:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en steekproefsgewijs de belangrijkste functionaliteit.

#### Met Git

Als u Chamilo met Git hebt geïnstalleerd, kunt u in plaats daarvan deze instructies volgen.

1. **Maak een back-up** van de database en bestanden.

2. **Haal de nieuwste code op** (of download de nieuwe release):
   ```bash
   git pull origin 3.0
   ```

3. **Werk PHP-afhankelijkheden bij:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Werk JavaScript-afhankelijkheden bij en bouw assets opnieuw:**
   ```bash
   yarn install && yarn build
   ```

5. **Voer databasemigraties uit:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Wis de cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Wijzig de rechten**

Pas aan op de gebruiker van uw webserver:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en steekproefsgewijs de belangrijkste functionaliteit.

### Updates automatiseren

Voor organisaties die meerdere Chamilo-instanties beheren, overweeg het updateproces te scripten:

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## Tips

* **Maak altijd een back-up voordat u upgradet.** Databasemigraties zijn niet omkeerbaar via de Chamilo-interface.
* **Test eerst op staging** -- vooral voor de migratie van 1.11.x naar 3.0, die aanzienlijke gegevenstransformatie met zich meebrengt.
* **Plan upgrades tijdens onderhoudsvensters** wanneer gebruikers het platform niet actief gebruiken.
* **Abonneer u op GitHub-releases** op [Github](https://github.com/chamilo/chamilo-lms/releases) via het belpictogram om op de hoogte te worden gesteld van nieuwe versies en beveiligingspatches.
* **Als de wizard antwoordt met `Chamilo is already installed`**, heeft deze geen openstaande migratie gevonden. Voer `php bin/console doctrine:migrations:status` uit om te controleren. Als `Executed` 0 is op een platform dat werkt, is uw migratiegeschiedenis nooit geseed — zie [Seed eerst de migratiegeschiedenis](#seed-the-migration-history-first).
* **Automatisch downloaden van nieuwe versies** wordt in Chamilo 3.0 nog niet aangeboden, maar dit is een lopend project dat we hopelijk binnenkort uitbrengen. De upgrade zelf draait al vanuit de webwizard.