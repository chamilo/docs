# Opgradering

Bemærk: På denne side bruger vi 3.0.0 som et strengt versionsnummer og 3.x til at identificere alle versioner, der starter med tallet 3 (3.0.0, 3.0.1, 3.1.0 osv.). Den samme konvention gælder for 2.x.

Opgraderingsprocessen fra 1.11.x er også beskrevet i din fil `public/documentation/installation_guide.html` inde i din Chamilo-kode.
Oplysningerne her er i vid udstrækning redundante. Du kan se dem online på `https://campus.chamilo.net/documentation/installation_guide.html`.

**Opgrader til 3.0, ikke til 2.x.** Version 3.0 er den aktuelle udgivelse, og nogle indstillinger fra 1.11.x havde endnu ikke et ækvivalent i 2.0.0. Et 1.11.x-system går derfor direkte til 3.0. Vi har testet lignende migreringer omfattende, men hver platform har sin egen historik: prøv det først i et testmiljø, og overvej at blive professionelt ledsaget af [officielle Chamilo-udbydere](https://chamilo.org/providers) i dette arbejde.

## Opgradering fra 1.11.x til 3.0

Opgradering fra Chamilo 1.11.x til 3.0 er en **større migrering**, ikke en simpel opdatering. Chamilo 2.0 blev genopbygget på Symfony-frameworket med et omstruktureret databaseskema, nyt API og en anden filorganisering, og 3.0 fortsætter den linje. Planlæg denne migrering omhyggeligt, og prøv den i et testmiljø, før du ruller den ud i produktion.

### Før du begynder

1. **Læs udgivelsesnoterne** for Chamilo 3.x for at forstå, hvad der er ændret, hvad der er nyt, og hvilke funktioner fra 1.11.x der muligvis endnu ikke er tilgængelige.
2. **Sikkerhedskopier alt**:
   - Fuld databasedump (`mysqldump` eller tilsvarende).
   - Alle filer i installationsmappen til Chamilo 1.11.x, især `app/upload/`, `app/courses/` og `main/`.
   - Din fil `configuration.php`.
3. **Test først på en staging-server.** Kør aldrig migreringen direkte på din produktionsserver.
4. **Kontrollér serverkravene.** Chamilo 3.x har andre krav end 1.11.x (navnlig PHP 8.3 eller nyere — installationsprogrammet afviser alt ældre). Se [Serverkrav](server-requirements.md).
5. **Slet tabellen `version` fra 1.11.x-databasen.** Dette trin er obligatorisk. Chamilo 2.x og senere gemmer Doctrine-migreringshistorikken i en tabel med det navn, med andre kolonner. Hvis du lader 1.11.x-tabellen blive stående, stopper opgraderingen med det samme. Tabellen er ikke nødvendig for, at Chamilo 1.11.x kan fungere.
6. **Udpak den nye kode i en ny mappe.** 1.11.x-filerne bliver, hvor de er. Installationsprogrammet læser dem som kilden til dine kurser og uploads og skriver resultatet ind i det nye træ.

### Kørsel af opgraderingen

Du kan køre opgraderingen via webguiden eller via kommandolinjen.

#### Webguide

1. Peg `DocumentRoot` for din virtuelle vært til undermappen `public/` i det nye træ.
2. Åbn din URL. Guiden starter, fordi det nye træ endnu ikke har en `.env`-fil.
3. På trin 2 skal du vælge opgraderingsindstillingen og angive rodstien til din 1.11.x-installation.
4. Følg guiden til ende.

#### Kommandolinje

Sæt `UPDATE_PATH` til roden af din 1.11.x-installation, og kør derefter migreringerne:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Hæv først `memory_limit` og `max_execution_time`. Migreringen læser hver kursusfil, så den har brug for langt mere end standardværdierne.

#### Hvor lang tid det tager

Varigheden følger størrelsen af din database og dine kursusfiler. Som et referencepunkt tog en 1.11.28-platform med 238 tabeller, 11 kurser, 63 brugere og 1489 kursusfiler **6 minutter** og 1,7 GB hukommelse og kørte 393 migreringer. En stor produktionsplatform tager timer. Planlæg et vedligeholdelsesvindue, og læs [Chamilo-forummet](https://chamilo.org) eller kontakt en [officiel udbyder](https://chamilo.org/providers), før du kører det i produktion.

### Hvad der kan kræve manuel opmærksomhed

| Område | Bemærkninger |
|------|-------|
| **Tilpassede plugins** | 1.11.x-plugins virker ikke i 2.x eller 3.x. De skal omskrives eller erstattes. De officielle er blevet porteret løbende siden 2.0 — tjek pluginlisten for din version for at se, hvilke der er tilgængelige. |
| **Tilpassede temaer** | 1.11.x-temaer virker ikke i 2.x eller 3.x. Genskab dit brand ved hjælp af 3.x-temasystemet. |
| **Tilpassede databaseændringer** | Eventuelle direkte databaseændringer uden for Chamilo migreres muligvis ikke. |
| **SCORM-pakker** | SCORM-indhold bør migrere, men test pakkerne individuelt for at verificere afspilning. |
| **Eksterne integrationer** | Eventuelle integrationer, der bruger 1.11.x-API'et eller webtjenester, skal opdateres til at bruge det REST-only API i 2.x ved hjælp af [API Platform](https://github.com/api-platform/api-platform). |

## Opgradering fra 2.x til 3.0

Denne opgradering beholder din eksisterende mappe og din eksisterende database. Du kopierer den nye kode over det gamle træ og kører derefter migreringerne, enten via webguiden eller via kommandolinjen.

### Seed migration history først

Chamilo installerer databaseskemaet direkte fra entitetsdefinitionerne, så en installation oprettet af installeren indeholder det endelige skema, men en **tom migration history**. Installationer oprettet før Chamilo 3.0 fik aldrig den history. To ting afhænger af den:

* `doctrine:migrations:migrate` beslutter, hvad der skal køres, ud fra den. Med en tom history forsøger den at afspille hver migration fra begyndelsen over et skema, der allerede er aktuelt.
* Webinstalleren beslutter ud fra den, om en opgradering afventer. Med en tom history afviser den anmodningen, fordi intet beviser, at en opgradering er nødvendig.

Så seed den én gang, og overhold rækkefølgen nedenfor.

> **Advarsel: seed history, før du kopierer den nye kode.** Kommandoerne markerer hver migration, som den **udrullede** kode indeholder, som allerede udført. Hvis du kører dem, efter at du har kopieret 3.0-koden, markerer de også 3.0-migrationerne, og din opgradering kører aldrig.

Med din aktuelle version stadig på plads skal du køre:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Den første kommando opretter history-tabellen. Den anden markerer migrationerne for din aktuelle version. `doctrine:migrations:version` fejler i sig selv, hvis tabellen endnu ikke findes, så spring ikke den første over.

Kontrollér resultatet:

```bash
php bin/console doctrine:migrations:status
```

`Executed` skal være lig med `Available`, og `New` skal være 0. Kopiér nu 3.0-koden.

### Kør opgraderingen

Kopiér den nye kode, og åbn derefter enten din URL og følg guiden, eller kør migrationerne fra kommandolinjen:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Webguiden åbner kun, mens migrationer afventer. Når opgraderingen er færdig, svarer den igen `409 Conflict`, hvilket er det, der beskytter den: guiden har ikke sit eget login.

## Opdatering af Chamilo 3.0.x

Mindre opdateringer inden for 3.0-grenen er mere ligetil.

### Opdateringsproces

#### Brug af en pakke

1. **Sikkerhedskopier** databasen og filerne.

2. **Download den seneste 3.0.x-version** fra [chamilo.org](https://chamilo.org/download):

3. **Udpak lokalt**

For eksempel (tilpas til den downloadede version)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopiér filerne over din eksisterende Chamilo-installation**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Kør databasemigrationer:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Ryd cachen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ændr tilladelser**

Tilpas til din webserverbruger:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Kontrollér**, at platformen indlæses korrekt, og stikprøvekontrollér vigtig funktionalitet.

#### Brug af Git

Hvis du installerede Chamilo med Git, kan du i stedet følge disse instruktioner.

1. **Sikkerhedskopier** databasen og filerne.

2. **Hent den seneste kode** (eller download den nye udgivelse):
   ```bash
   git pull origin 3.0
   ```

3. **Opdater PHP-afhængigheder:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Opdater JavaScript-afhængigheder og genopbyg assets:**
   ```bash
   yarn install && yarn build
   ```

5. **Kør databasemigrationer:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Ryd cachen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ændr tilladelser**

Tilpas til din webserverbruger:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Kontrollér**, at platformen indlæses korrekt, og stikprøvekontrollér vigtig funktionalitet.

### Automatisering af opdateringer

For organisationer, der administrerer flere Chamilo-instanser, kan du overveje at scriptet opdateringsprocessen:

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

* **Tag altid backup før opgradering.** Databasemigrationer kan ikke fortrydes via Chamilo-grænsefladen.
* **Test først på staging** -- især ved migrationen fra 1.11.x til 3.0, som indebærer betydelig datatransformation.
* **Planlæg opgraderinger i vedligeholdelsesvinduer**, når brugerne ikke aktivt anvender platformen.
* **Abonnér på GitHub-udgivelser** på [Github](https://github.com/chamilo/chamilo-lms/releases) via klokkeikonet for at blive underrettet om nye versioner og sikkerhedsopdateringer.
* **Hvis guiden svarer `Chamilo is already installed`**, fandt den ingen afventende migration. Kør `php bin/console doctrine:migrations:status` for at kontrollere. Hvis `Executed` er 0 på en platform, der virker, er migrationshistorikken aldrig blevet seedet — se [Seed migrationshistorikken først](#seed-the-migration-history-first).
* **Automatisk download af nye versioner** tilbydes endnu ikke i Chamilo 3.0, men det er et igangværende projekt, som vi håber at udgive snart. Selve opgraderingen kører allerede fra webguiden.