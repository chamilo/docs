# Oppgradering

Merk: På denne siden bruker vi 3.0.0 som et strengt versjonsnummer og 3.x for å identifisere alle versjoner som starter med tallet 3 (3.0.0, 3.0.1, 3.1.0 osv.). Den samme konvensjonen gjelder for 2.x.

Oppgraderingsprosessen fra 1.11.x er også beskrevet i filen `public/documentation/installation_guide.html` i Chamilo-koden din.
Informasjonen her er i stor grad redundant. Du kan se den på nett på `https://campus.chamilo.net/documentation/installation_guide.html`.

**Oppgrader til 3.0, ikke til 2.x.** Versjon 3.0 er den gjeldende utgivelsen, og noen innstillinger fra 1.11.x hadde ennå ikke noe tilsvarende i 2.0.0. Et 1.11.x-system går derfor rett til 3.0. Vi har testet lignende migreringer grundig, men hver plattform har sin egen historikk: prøv det først i et testmiljø, og vurder å få profesjonell bistand fra [offisielle Chamilo-leverandører](https://chamilo.org/providers) i dette arbeidet.

## Oppgradering fra 1.11.x til 3.0

Oppgradering fra Chamilo 1.11.x til 3.0 er en **stor migrering**, ikke en enkel oppdatering. Chamilo 2.0 ble gjenoppbygd på Symfony-rammeverket med et omstrukturert databaseskjema, nytt API og en annen filorganisering, og 3.0 fortsetter den linjen. Planlegg denne migreringen nøye og prøv den ut i et testmiljø før du ruller den ut i produksjon.

### Før du begynner

1. **Les utgivelsesnotatene** for Chamilo 3.x for å forstå hva som har endret seg, hva som er nytt, og hvilke funksjoner fra 1.11.x som kanskje ennå ikke er tilgjengelige.
2. **Ta sikkerhetskopi av alt**:
   - Full databasedump (`mysqldump` eller tilsvarende).
   - Alle filer i installasjonskatalogen for Chamilo 1.11.x, særlig `app/upload/`, `app/courses/` og `main/`.
   - Filen `configuration.php`.
3. **Test først på en staging-server.** Kjør aldri migreringen direkte på produksjonsserveren.
4. **Kontroller serverkravene.** Chamilo 3.x har andre krav enn 1.11.x (blant annet PHP 8.3 eller nyere — installasjonsprogrammet avviser alt eldre). Se [Serverkrav](server-requirements.md).
5. **Slett tabellen `version` fra 1.11.x-databasen.** Dette trinnet er obligatorisk. Chamilo 2.x og nyere lagrer Doctrine-migreringshistorikken i en tabell med det navnet, med andre kolonner. Hvis du lar 1.11.x-tabellen stå, stopper oppgraderingen umiddelbart. Tabellen er ikke nødvendig for at Chamilo 1.11.x skal fungere.
6. **Pakk ut den nye koden i en ny katalog.** Filene fra 1.11.x blir der de er. Installasjonsprogrammet leser dem som kilden til kursene og opplastingene dine, og skriver resultatet inn i det nye treet.

### Kjøre oppgraderingen

Du kan kjøre oppgraderingen via veiviseren på nett eller via kommandolinjen.

#### Veiviser på nett

1. Pek `DocumentRoot` for den virtuelle verten mot underkatalogen `public/` i det nye treet.
2. Åpne URL-en din. Veiviseren starter, fordi det nye treet ennå ikke har noen `.env`-fil.
3. På trinn 2 velger du oppgraderingsalternativet og oppgir rotstien til 1.11.x-installasjonen.
4. Følg veiviseren til slutt.

#### Kommandolinje

Sett `UPDATE_PATH` til roten av 1.11.x-installasjonen, og kjør deretter migreringene:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Øk `memory_limit` og `max_execution_time` først. Migreringen leser hver kursfil, så den trenger langt mer enn standardverdiene.

#### Hvor lang tid det tar

Varigheten følger størrelsen på databasen og kursfilene dine. Som ett referansepunkt tok en 1.11.28-plattform med 238 tabeller, 11 kurs, 63 brukere og 1489 kursfiler **6 minutter** og 1,7 GB minne, og kjørte 393 migreringer. En stor produksjonsplattform tar timer. Planlegg et vedlikeholdsvindu, og les [Chamilo-forumet](https://chamilo.org) eller kontakt en [offisiell leverandør](https://chamilo.org/providers) før du kjører det i produksjon.

### Hva som kan kreve manuell oppmerksomhet

| Område | Merknader |
|------|-------|
| **Tilpassede plugins** | Plugins fra 1.11.x fungerer ikke i 2.x eller 3.x. De må skrives om eller erstattes. De offisielle har blitt portert gradvis siden 2.0 — sjekk plugin-listen for versjonen din for å se hvilke som er tilgjengelige. |
| **Tilpassede temaer** | Temaer fra 1.11.x fungerer ikke i 2.x eller 3.x. Gjenskap merkevaren din med temingssystemet i 3.x. |
| **Tilpassede databaseendringer** | Eventuelle direkte databaseendringer utenfor Chamilo blir kanskje ikke migrert. |
| **SCORM-pakker** | SCORM-innhold bør migrere, men test pakkene enkeltvis for å verifisere avspilling. |
| **Eksterne integrasjoner** | Eventuelle integrasjoner som bruker 1.11.x-API-et eller webtjenester må oppdateres til å bruke det REST-only API-et i 2.x ved hjelp av [API Platform](https://github.com/api-platform/api-platform). |

## Oppgradering fra 2.x til 3.0

Denne oppgraderingen beholder den eksisterende katalogen og den eksisterende databasen. Du kopierer den nye koden over det gamle treet, og kjører deretter migreringene, enten via veiviseren på nett eller via kommandolinjen.

### Fyll inn migrasjonshistorikken først

Chamilo installerer databaseskjemaet direkte fra entitetdefinisjonene, så en installasjon opprettet av installasjonsprogrammet har det endelige skjemaet, men en **tom migrasjonshistorikk**. Installasjoner opprettet før Chamilo 3.0 fikk aldri denne historikken. To ting avhenger av den:

* `doctrine:migrations:migrate` avgjør hva som skal kjøres ut fra den. Med tom historikk forsøker den å spille av alle migrasjoner fra starten på et skjema som allerede er oppdatert.
* Nettinstallasjonsprogrammet avgjør ut fra den om en oppgradering venter. Med tom historikk avviser det forespørselen, fordi ingenting beviser at en oppgradering er nødvendig.

Fyll den derfor inn én gang, og følg rekkefølgen nedenfor.

> **Advarsel: fyll inn historikken før du kopierer den nye koden.** Kommandoene merker hver migrasjon som den **utrullede** koden inneholder som allerede utført. Hvis du kjører dem etter at du har kopiert 3.0-koden, merker de også 3.0-migrasjonene, og oppgraderingen din kjører aldri.

Med den gjeldende versjonen fortsatt på plass, kjør:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Den første kommandoen oppretter historikktabellen. Den andre merker migrasjonene for den gjeldende versjonen. `doctrine:migrations:version` feiler alene hvis tabellen ikke finnes ennå, så hopp ikke over den første.

Kontroller resultatet:

```bash
php bin/console doctrine:migrations:status
```

`Executed` må være lik `Available`, og `New` må være 0. Kopier deretter 3.0-koden.

### Kjør oppgraderingen

Kopier den nye koden, og åpne deretter URL-en og følg veiviseren, eller kjør migrasjonene fra kommandolinjen:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Nettveiviseren åpnes bare mens migrasjoner venter. Når oppgraderingen er ferdig, svarer den igjen med `409 Conflict`, som er det som beskytter den: veiviseren har ingen egen innlogging.

## Oppdatering av Chamilo 3.0.x

Mindre oppdateringer innen 3.0-grenen er mer enkle.

### Oppdateringsprosess

#### Ved bruk av en pakke

1. **Ta sikkerhetskopi** av databasen og filene.

2. **Last ned den nyeste 3.0.x-versjonen** fra [chamilo.org](https://chamilo.org/download):

3. **Pakk ut lokalt**

For eksempel (tilpass til den nedlastede versjonen)
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **Kopier filene over den eksisterende Chamilo-installasjonen**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **Kjør databasemigrasjoner:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Tøm hurtigbufferen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Endre rettigheter**

Tilpass til webserverbrukeren din:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Kontroller** at plattformen lastes korrekt, og stikkprøv nøkkel funksjonalitet.

#### Ved bruk av Git

Hvis du installerte Chamilo med Git, kan du følge disse instruksjonene i stedet.

1. **Ta sikkerhetskopi** av databasen og filene.

2. **Hent den nyeste koden** (eller last ned den nye utgivelsen):
   ```bash
   git pull origin 3.0
   ```

3. **Oppdater PHP-avhengigheter:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Oppdater JavaScript-avhengigheter og bygg ressurser på nytt:**
   ```bash
   yarn install && yarn build
   ```

5. **Kjør databasemigrasjoner:**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **Tøm hurtigbufferen:**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **Endre rettigheter**

Tilpass til webserverbrukeren din:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Kontroller** at plattformen lastes korrekt, og stikkprøv nøkkel funksjonalitet.

### Automatisering av oppdateringer

For organisasjoner som administrerer flere Chamilo-instanser, vurder å skripte oppdateringsprosessen:

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

* **Ta alltid sikkerhetskopi før oppgradering.** Databasemigreringer kan ikke reverseres via Chamilo-grensesnittet.
* **Test først i et staging-miljø** -- særlig for migreringen fra 1.11.x til 3.0, som innebærer betydelig datatransformasjon.
* **Planlegg oppgraderinger i vedlikeholdsvinduer** når brukerne ikke aktivt bruker plattformen.
* **Abonner på GitHub-utgivelser** på [Github](https://github.com/chamilo/chamilo-lms/releases) ved å bruke bjelleikonet for å bli varslet om nye versjoner og sikkerhetsoppdateringer.
* **Hvis veiviseren svarer `Chamilo is already installed`**, fant den ingen ventende migrering. Kjør `php bin/console doctrine:migrations:status` for å sjekke. Hvis `Executed` er 0 på en plattform som fungerer, ble migreringshistorikken aldri seedet — se [Seed the migration history first](#seed-the-migration-history-first).
* **Automatisk nedlasting av nye versjoner** tilbys ennå ikke i Chamilo 3.0, men dette er et pågående prosjekt vi håper å lansere snart. Selve oppgraderingen kjører allerede fra veiviseren på nettet.