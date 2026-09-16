# Upgraden

Opmerking: Op deze pagina gebruiken we 2.0.0 als een strikt versienummer en 2.x om alle versies aan te duiden die beginnen met het cijfer 2 (2.0.0, 2.0.1, 2.1.0, enz.)

Het upgradeproces van 1.11.x naar 2.x wordt beschreven in uw `public/documentation/installation_guide.html` bestand, binnen uw Chamilo-code. De informatie hier is grotendeels overbodig. U kunt deze online bekijken op `https://campus.chamilo.net/documentation/installation_guide.html`. Hoewel we uitgebreide tests hebben uitgevoerd op vergelijkbare migraties, raden we aan te wachten op versie 2.1 voordat u een 1.11.x-systeem upgradet, of om professioneel begeleid te worden door [officiële Chamilo-aanbieders](https://chamilo.org/providers) bij deze onderneming, omdat sommige instellingen van 1.11.x nog niet werden ondersteund in 2.0.0.

## Upgraden van 1.11.x naar 2.x

Het upgraden van Chamilo 1.11.x naar 2.x is een **grote migratie**, geen eenvoudige update. Chamilo 2.0 is opnieuw opgebouwd op het Symfony-framework met een herstructureerd databaseschema, een nieuwe API en een andere bestandsorganisatie. Plan deze migratie zorgvuldig en test deze eerst uit in een testomgeving voordat u deze in productie uitrolt.

### Voordat u begint

1. **Lees de release notes** voor Chamilo 2.x om te begrijpen wat er is veranderd, wat nieuw is en welke functies van 1.11.x mogelijk nog niet beschikbaar zijn.
2. **Maak een back-up van alles**:
   - Volledige database-dump (`mysqldump` of equivalent).
   - Alle bestanden in de Chamilo 1.11.x installatiemap, met name `app/upload/`, `app/courses/` en `main/`.
   - Uw `configuration.php` bestand.
3. **Test eerst op een staging-server.** Voer de migratie nooit direct uit op uw productieserver.
4. **Controleer de serververeisten.** Chamilo 2.x heeft andere vereisten dan 1.11.x (met name PHP 8.2+). Zie [Serververeisten](server-requirements.md).

### Wat mogelijk handmatige aandacht vereist

| Gebied | Opmerkingen |
|--------|-------------|
| **Aangepaste plugins** | 1.11.x plugins zijn niet compatibel met 2.x. Ze moeten opnieuw worden geschreven of vervangen, wat gedeeltelijk is gedaan in 2.0 en volledig zou moeten zijn in 2.1 voor officiële plugins. |
| **Aangepaste thema's** | 1.11.x thema's werken niet in 2.x. Maak uw branding opnieuw met het 2.x themasysteem. |
| **Aangepaste databasemodificaties** | Eventuele directe databasemodificaties buiten Chamilo om worden mogelijk niet gemigreerd. |
| **SCORM-pakketten** | SCORM-inhoud zou moeten migreren, maar test pakketten individueel om afspelen te verifiëren. |
| **Externe integraties** | Alle integraties die gebruikmaken van de 1.11.x API of webservices moeten worden bijgewerkt om de 2.x REST-only API te gebruiken via [API Platform](https://github.com/api-platform/api-platform). |

## Chamilo 2.0.x bijwerken

Kleine updates binnen de 2.0-branch zijn eenvoudiger.

### Updateproces

#### Met een pakket

1. **Maak een back-up** van de database en bestanden.

2. **Download de nieuwste 2.0.x-versie** van [chamilo.org](https://chamilo.org/download):

3. **Uitpakken lokaal**

Bijvoorbeeld (pas aan op de gedownloade versie)
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **Kopieer de bestanden naar uw bestaande Chamilo-installatie**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Voer databasemigraties uit:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Leeg de cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Pas rechten aan**

Pas aan op uw webservergebruiker:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en test belangrijke functionaliteiten.

#### Met Git

Als u Chamilo met Git hebt geïnstalleerd, kunt u in plaats daarvan deze instructies volgen.

1. **Maak een back-up** van de database en bestanden.

2. **Haal de nieuwste code op** (of download de nieuwe release):
   ```bash
   git pull origin 2.0
   ```

3. **Werk PHP-afhankelijkheden bij:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Werk JavaScript-afhankelijkheden bij en herbouw assets:**
   ```bash
   yarn install && yarn build
   ```

5. **Voer databasemigraties uit:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Leeg de cache:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Pas rechten aan**

Pas aan op uw webservergebruiker:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en test belangrijke functionaliteiten.

### Updates automatiseren

Voor organisaties die meerdere Chamilo-instanties beheren, overweeg het updateproces te scripten:

```bash
#!/bin/bash
set -e

# Code ophalen
git pull origin 2.0

# Afhankelijkheden
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update voltooid."
```

---
## Tips

* **Maak altijd een back-up voordat u een upgrade uitvoert.** Databasemigraties zijn niet omkeerbaar via de Chamilo-interface.
* **Test eerst op een staging-omgeving** -- vooral voor de migratie van 1.11.x naar 2.0, die aanzienlijke datatransformatie met zich meebrengt.
* **Plan upgrades tijdens onderhoudsvensters** wanneer gebruikers de platform niet actief gebruiken.
* **Abonneer u op GitHub-releases** op [Github](https://github.com/chamilo/chamilo-lms/releases) via het belpictogram om op de hoogte te worden gesteld van nieuwe versies en beveiligingspatches.
* **Webupdates** worden nog niet aangeboden in Chamilo 2.0, maar dit is een lopend project dat we binnenkort hopen uit te brengen.