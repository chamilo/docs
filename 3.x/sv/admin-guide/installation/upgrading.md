# Uppgradering

Obs: På den här sidan använder vi 3.0.0 som ett strikt versionsnummer och 3.x för att identifiera alla versioner som börjar med siffran 3 (3.0.0, 3.0.1, 3.1.0 osv.). Samma konvention gäller för 2.x.

Uppgraderingsprocessen från 1.11.x beskrivs också i filen `public/documentation/installation_guide.html` i din Chamilo-kod.
Informationen här är till stor del överflödig. Du kan se den online på `https://campus.chamilo.net/documentation/installation_guide.html`.

**Uppgradera till 3.0, inte till 2.x.** Version 3.0 är den aktuella utgåvan, och vissa inställningar i 1.11.x hade ännu ingen motsvarighet i 2.0.0. Ett 1.11.x-system går därför rakt till 3.0. Vi har testat liknande migreringar omfattande, men varje plattform bär på sin egen historik: prova först i en testmiljö och överväg professionellt stöd från [officiella Chamilo-leverantörer](https://chamilo.org/providers) i detta arbete.

## Uppgradering från 1.11.x till 3.0

Uppgradering från Chamilo 1.11.x till 3.0 är en **större migrering**, inte en enkel uppdatering. Chamilo 2.0 byggdes om på Symfony-ramverket med ett omstrukturerat databasschema, nytt API och en annan filorganisation, och 3.0 fortsätter den linjen. Planera migreringen noggrant och prova den i en testmiljö innan du rullar ut den i produktion.

### Innan du börjar

1. **Läs versionsanteckningarna** för Chamilo 3.x för att förstå vad som har ändrats, vad som är nytt och vilka funktioner från 1.11.x som kanske ännu inte är tillgängliga.
2. **Säkerhetskopiera allt**:
   - Fullständig databasdump (`mysqldump` eller motsvarande).
   - Alla filer i installationskatalogen för Chamilo 1.11.x, särskilt `app/upload/`, `app/courses/` och `main/`.
   - Din `configuration.php`-fil.
3. **Testa först på en staging-server.** Kör aldrig migreringen direkt på produktionsservern.
4. **Kontrollera serverkraven.** Chamilo 3.x har andra krav än 1.11.x (framför allt PHP 8.3 eller senare — installationsprogrammet avvisar allt äldre). Se [Serverkrav](server-requirements.md).
5. **Ta bort tabellen `version` från 1.11.x-databasen.** Det här steget är obligatoriskt. Chamilo 2.x och senare lagrar Doctrine-migreringshistoriken i en tabell med det namnet, med andra kolumner. Om du lämnar 1.11.x-tabellen kvar stoppas uppgraderingen omedelbart. Tabellen behövs inte för att Chamilo 1.11.x ska fungera.
6. **Packa upp den nya koden i en ny katalog.** 1.11.x-filerna ligger kvar där de är. Installationsprogrammet läser dem som källa för dina kurser och uppladdningar och skriver resultatet till det nya trädet.

### Köra uppgraderingen

Du kan köra uppgraderingen via webbguiden eller via kommandoraden.

#### Webbguide

1. Peka `DocumentRoot` för din virtuella värd mot underkatalogen `public/` i det nya trädet.
2. Öppna din URL. Guiden startar eftersom det nya trädet ännu inte har någon `.env`-fil.
3. På steg 2 väljer du uppgraderingsalternativet och anger rotsökvägen till din 1.11.x-installation.
4. Följ guiden till slutet.

#### Kommandorad

Sätt `UPDATE_PATH` till roten för din 1.11.x-installation och kör sedan migreringarna:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Höj `memory_limit` och `max_execution_time` först. Migreringen läser varje kursfil, så den behöver betydligt mer än standardvärdena.

#### Hur lång tid det tar

Tiden beror på storleken på din databas och dina kursfiler. Som en referenspunkt tog en 1.11.28-plattform med 238 tabeller, 11 kurser, 63 användare och 1489 kursfiler **6 minuter** och 1,7 GB minne och körde 393 migreringar. En stor produktionsplattform tar timmar. Planera ett underhållsfönster och läs [Chamilo-forumet](https://chamilo.org) eller kontakta en [officiell leverantör](https://chamilo.org/providers) innan du kör det i produktion.

### Vad som kan kräva manuell uppmärksamhet

| Område | Anteckningar |
|------|-------|
| **Anpassade plugins** | Plugins för 1.11.x fungerar inte i 2.x eller 3.x. De måste skrivas om eller ersättas. De officiella har porterats successivt sedan 2.0 — kontrollera pluginlistan för din version för att se vilka som är tillgängliga. |
| **Anpassade teman** | Teman för 1.11.x fungerar inte i 2.x eller 3.x. Återskapa din varumärkesprofil med tematsystemet i 3.x. |
| **Anpassade databasändringar** | Direkta databasändringar utanför Chamilo kanske inte migreras. |
| **SCORM-paket** | SCORM-innehåll bör migreras, men testa paketen individuellt för att verifiera uppspelningen. |
| **Externa integrationer** | Integrationer som använder 1.11.x-API:et eller webbtjänster måste uppdateras för att använda det REST-only-API som 2.x har via [API Platform](https://github.com/api-platform/api-platform). |

## Uppgradering från 2.x till 3.0

Den här uppgraderingen behåller din befintliga katalog och din befintliga databas. Du kopierar den nya koden över det gamla trädet och kör sedan migreringarna, antingen via webbguiden eller via kommandoraden.

### Fyll i migreringshistoriken först

Chamilo installerar databasschemat direkt från entitetsdefinitionerna, så en installation som skapats av installationsprogrammet har det slutliga schemat men en **tom migreringshistorik**. Installationer som skapats före Chamilo 3.0 fick aldrig den historiken. Två saker beror på den:

* `doctrine:migrations:migrate` avgör vad som ska köras utifrån den. Med en tom historik försöker den spela upp varje migrering från början mot ett schema som redan är aktuellt.
* Webbinstallationsprogrammet avgör utifrån den om en uppgradering väntar. Med en tom historik avvisar det begäran, eftersom ingenting visar att en uppgradering ska göras.

Fyll därför i den en gång, och följ ordningen nedan.

> **Varning: fyll i historiken innan du kopierar den nya koden.** Kommandona markerar varje migrering som den **deployade** koden bär som redan körd. Om du kör dem efter att du kopierat 3.0-koden markerar de även 3.0-migreringarna, och din uppgradering körs aldrig.

Med din nuvarande version fortfarande på plats, kör:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Det första kommandot skapar historiktabellen. Det andra markerar migreringarna för din nuvarande version. `doctrine:migrations:version` misslyckas på egen hand om tabellen inte finns ännu, så hoppa inte över det första.

Kontrollera resultatet:

```bash
php bin/console doctrine:migrations:status
```

`Executed` måste vara lika med `Available`, och `New` måste vara 0. Kopiera nu 3.0-koden.

### Kör uppgraderingen

Kopiera den nya koden, och öppna sedan antingen din URL och följ guiden, eller kör migreringarna från kommandoraden:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Webbguiden öppnas endast medan migreringar väntar. När uppgraderingen är klar svarar den åter `409 Conflict`, vilket är det som skyddar den: guiden har ingen egen inloggning.

## Uppdatera Chamilo 3.0.x

Mindre uppdateringar inom 3.0-grenen är mer rakt på sak.

### Uppdateringsprocess

#### Med ett paket

1. **Säkerhetskopiera** databasen och filerna.

2. **Ladda ner den senaste 3.0.x-versionen** från [chamilo.org](https://chamilo.org/download):

3. **Packa upp lokalt**

Till exempel (anpassa till den nedladdade versionen)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopiera filerna över din befintliga Chamilo-installation**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Kör databas-migreringar:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Rensa cachen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ändra behörigheter**

Anpassa till din webbserveranvändare:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifiera** att plattformen laddas korrekt och stickprovskontrollera viktig funktionalitet.

#### Med Git

Om du installerade Chamilo med Git kan du följa dessa instruktioner i stället.

1. **Säkerhetskopiera** databasen och filerna.

2. **Hämta den senaste koden** (eller ladda ner den nya utgåvan):
   ```bash
   git pull origin 3.0
   ```

3. **Uppdatera PHP-beroenden:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Uppdatera JavaScript-beroenden och bygg om tillgångar:**
   ```bash
   yarn install && yarn build
   ```

5. **Kör databas-migreringar:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Rensa cachen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Ändra behörigheter**

Anpassa till din webbserveranvändare:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Verifiera** att plattformen laddas korrekt och stickprovskontrollera viktig funktionalitet.

### Automatisera uppdateringar

För organisationer som hanterar flera Chamilo-instanser, överväg att skripta uppdateringsprocessen:

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

* **Säkerhetskopiera alltid innan uppgradering.** Databasmigreringar kan inte ångras via Chamilo-gränssnittet.
* **Testa först i en staging-miljö** -- särskilt för migreringen från 1.11.x till 3.0, som innebär betydande datatransformering.
* **Planera uppgraderingar under underhållsfönster** när användarna inte aktivt använder plattformen.
* **Prenumerera på GitHub-releaser** på [Github](https://github.com/chamilo/chamilo-lms/releases) med klockikonen för att bli meddelad om nya versioner och säkerhetspatchar.
* **Om guiden svarar `Chamilo is already installed`** har den inte hittat någon väntande migrering. Kör `php bin/console doctrine:migrations:status` för att kontrollera. Om `Executed` är 0 på en plattform som fungerar har migreringshistoriken aldrig seedats — se [Seed the migration history first](#seed-the-migration-history-first).
* **Automatisk nedladdning av nya versioner** tillhandahålls ännu inte i Chamilo 3.0, men detta är ett pågående projekt som vi hoppas kunna släppa inom kort. Själva uppgraderingen körs redan från webbguiden.