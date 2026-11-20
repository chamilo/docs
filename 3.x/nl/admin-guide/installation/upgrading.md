# Upgraden

Opmerking: Op deze pagina gebruiken we 3.0.0 als een strikt versienummer en 3.x om alle versies aan te duiden die met het cijfer 3 beginnen (3.0.0, 3.0.1, 3.1.0, enz.). Dezelfde conventie geldt voor 2.x.

Het upgradeproces vanaf 1.11.x wordt ook beschreven in het bestand `public/documentation/installation_guide.html` in uw Chamilo-code.
De informatie hier is grotendeels redundant. U kunt deze online bekijken op `https://campus.chamilo.net/documentation/installation_guide.html`.

**Upgrade naar 3.0, niet naar 2.x.** Versie 3.0 is de huidige release, en sommige instellingen van 1.11.x hadden in 2.0.0 nog geen equivalent. Een 1.11.x-systeem gaat daarom rechtstreeks naar 3.0. We hebben vergelijkbare migraties uitgebreid getest, maar elk platform heeft zijn eigen geschiedenis: probeer het eerst in een testomgeving en overweeg professionele begeleiding door [officiële Chamilo-providers](https://chamilo.org/providers) bij deze onderneming.

## Upgraden van 1.11.x naar 3.0

Upgraden van Chamilo 1.11.x naar 3.0 is een **grote migratie**, geen eenvoudige update. Chamilo 2.0 is herbouwd op het Symfony-framework met een herstructureerd databaseschema, een nieuwe API en een andere bestandsorganisatie, en 3.0 zet die lijn voort. Plan deze migratie zorgvuldig en probeer deze eerst uit in een testomgeving voordat u deze in productie uitrolt.

### Voordat u begint

1. **Lees de release notes** voor Chamilo 3.x om te begrijpen wat er is veranderd, wat nieuw is en welke functies van 1.11.x mogelijk nog niet beschikbaar zijn.
2. **Maak een back-up van alles**:
   - Volledige databasedump (`mysqldump` of equivalent).
   - Alle bestanden in de installatiemap van Chamilo 1.11.x, in het bijzonder `app/upload/`, `app/courses/` en `main/`.
   - Uw bestand `configuration.php`.
3. **Test eerst op een staging-server.** Voer de migratie nooit rechtstreeks uit op uw productieserver.
4. **Controleer de serververeisten.** Chamilo 3.x heeft andere vereisten dan 1.11.x (met name PHP 8.3 of later — de installer weigert alles wat ouder is). Zie [Serververeisten](server-requirements.md).
5. **Bepaal wat er gebeurt met de tabel `version` van de 1.11.x-database.** Chamilo 2.x en later slaan de Doctrine-migratiegeschiedenis op in een tabel met die naam, met andere kolommen, zodat de twee niet naast elkaar kunnen bestaan. De webwizard regelt dit voor u: deze hernoemt de 1.11.x-tabel naar `version_1_11` voordat de eerste migratie wordt uitgevoerd. De opdrachtregel doet dat niet, dus **verwijder of hernoem die tabel zelf voordat u `doctrine:migrations:migrate` uitvoert**. De tabel is niet nodig om Chamilo 1.11.x te laten werken.
6. **Pak de nieuwe code uit in een nieuwe map.** De 1.11.x-bestanden blijven waar ze zijn. De installer leest ze als bron van uw cursussen en uploads, en schrijft het resultaat naar de nieuwe boomstructuur.
7. **Als u subtalen hebt gebruikt, is niets extra's vereist.** De upgrade converteert ze en schrijft hun termen naar `var/translations/`, waarnaar uw webserver al moet kunnen schrijven. De interface leest ze daarvandaan, zonder herbouw.

### De upgrade uitvoeren

U kunt de upgrade uitvoeren via de webwizard of via de opdrachtregel.

#### Webwizard

1. Wijs de `DocumentRoot` van uw virtual host naar de submap `public/` van de nieuwe boomstructuur.
2. Maak een leeg bestand `UPGRADE_ENABLED` aan in de projectroot, naast `.env` en `composer.json` — zie hieronder.
3. Open uw URL. De wizard start, omdat de nieuwe boomstructuur nog geen bestand `.env` heeft.
4. Selecteer in stap 2 de upgrade-optie en geef het rootpad van uw 1.11.x-installatie op.
5. Volg de wizard tot het einde.

De wizard heeft geen eigen aanmelding, dus een upgrade vereist een autorisatie op de server: dat bestand `UPGRADE_ENABLED`. **Alleen u maakt het aan.** De wizard schrijft het nooit zelf, omdat de hele waarde van het bestand erin ligt dat de aanwezigheid ervan bewijst dat een persoon op de server een beslissing heeft genomen.

Uw nieuwe boomstructuur heeft nog geen `.env`, dus de wizard opent wel zonder het bestand. Hij vraagt erom in de vereistenstap, wanneer u de upgrade kiest en voordat hij om uw database vraagt. Maak het bestand dan aan en ga verder; u hoeft de wizard niet opnieuw te starten.

De installer verwijdert het bestand wanneer de upgrade is voltooid. Als uw projectroot alleen-lezen is, meldt hij dat in plaats daarvan, en verwijdert u het bestand handmatig. Zolang het er is, blijft de installer open, en de beheerpagina meldt het onder de platformgezondheidscontroles.

#### Opdrachtregel

Stel `UPDATE_PATH` in op de root van uw 1.11.x-installatie en voer vervolgens de migraties uit:

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

Verhoog eerst `memory_limit` en `max_execution_time`. De migratie leest elk cursusbestand, dus er is veel meer nodig dan de standaardwaarden.

#### Hoe lang het duurt

De duur hangt af van de omvang van uw database en van uw cursusbestanden. Als referentiepunt: een platform op 1.11.28 met 238 tabellen, 11 cursussen, 63 gebruikers en 1489 cursusbestanden duurde **6 minuten** en gebruikte 1,7 GB geheugen, en voerde 393 migraties uit. Een groot productieplatform duurt uren. Plan een onderhoudsvenster en lees het [Chamilo-forum](https://chamilo.org) of neem contact op met een [officiële aanbieder](https://chamilo.org/providers) voordat u dit op productie uitvoert.

### Wat handmatige aandacht kan vereisen

| Gebied | Opmerkingen |
|------|-------|
| **Aangepaste plugins** | Plugins voor 1.11.x werken niet in 2.x of 3.x. Ze moeten worden herschreven of vervangen. De officiële plugins zijn sinds 2.0 geleidelijk overgezet — raadpleeg de pluginlijst van uw versie om te zien welke beschikbaar zijn. |
| **Aangepaste thema's** | Thema's voor 1.11.x werken niet in 2.x of 3.x. Maak uw huisstijl opnieuw met het themasysteem van 3.x. |
| **Aangepaste databasewijzigingen** | Directe databasewijzigingen buiten Chamilo worden mogelijk niet gemigreerd. |
| **SCORM-pakketten** | SCORM-inhoud zou moeten migreren, maar test pakketten afzonderlijk om de weergave te controleren. |
| **Externe integraties** | Integraties die de API of webservices van 1.11.x gebruiken, moeten worden bijgewerkt naar de REST-only API van 2.x met [API Platform](https://github.com/api-platform/api-platform). |
| **Profielinstellingen** | Controleer na een legacy-upgrade of `changeable_options` en `visible_options` nog steeds de verwachte regels voor bewerkbaarheid en zichtbaarheid van het profiel weerspiegelen. De upgradecode behoudt hun waarden uit de legacy-instellingen in plaats van ze als vermeldingen in `configuration.php` te behandelen ([PR #9161](https://github.com/chamilo/chamilo-lms/pull/9161)). |

### Quiz-vraagrelaties controleren na een legacy-migratie

Als gemigreerde oefeningen vragen lijken te missen, gebruik dan het consolecommando dat is geïntroduceerd in [PR #9157](https://github.com/chamilo/chamilo-lms/pull/9157) om **te controleren voordat u een herstel probeert**. Voer het uit vanuit de applicatieroot van Chamilo tegen een stagingkopie van de gemigreerde database.

Een eerste doorgang onderzoekt alleen de doeldatabase en **wijzigt geen gegevens**:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy
```

Lege quizzen alleen bewijzen niet dat relaties verloren zijn gegaan. Om te vergelijken met de oude Chamilo-gegevens maakt u de legacy-database beschikbaar op **dezelfde databaseserver**, met passende leesrechten, en geeft u de databasenaam op:

```bash
php bin/console chamilo:migration:repair-quiz-relations-from-legacy --source-database=legacy_chamilo_db
```

U kunt beide controles beperken tot bepaalde *doel-quiz-iids* met een herhaalbare optie `--quiz=123`. Zonder `--apply` blijven beide vormen alleen-lezen. De vergelijking rapporteert ontbrekende relaties, getroffen quizzen en mogelijke conflicten of onopgeloste verwijzingen.

**Pas geen herstel toe uitsluitend op basis van een telling van lege quizzen.** Bewaar geverifieerde databaseback-ups en beoordeel de vergeleken bron- en doelgegevens. Een herstel vereist `--source-database`, `--apply`, en zowel `--expected-missing-relations` als `--expected-affected-quizzes` ingesteld op de **exacte aantallen uit de voorafgaande alleen-lezen vergelijking**. Het commando weigert te schrijven als deze aantallen zijn gewijzigd of als getroffen quizzen onveilige conflicten hebben. Pas dit alleen toe nadat u de resultaten op een stagingkopie hebt gevalideerd; herhaal daarna de alleen-lezen controle om te bevestigen dat er geen geverifieerde ontbrekende relaties meer zijn.

## Upgraden van 2.x naar 3.0

Deze upgrade behoudt uw bestaande map en uw bestaande database. U kopieert de nieuwe code over de oude boomstructuur en voert daarna de migraties uit, via de webwizard of via de opdrachtregel.

### Eerst de migratiegeschiedenis initialiseren

Chamilo installeert het databaseschema rechtstreeks vanuit de entiteitsdefinities, zodat een installatie die door het installatieprogramma is aangemaakt het definitieve schema bevat, maar een **lege migratiegeschiedenis**. Installaties die vóór Chamilo 3.0 zijn aangemaakt, hebben die geschiedenis nooit gekregen. Twee zaken hangen ervan af:

* `doctrine:migrations:migrate` bepaalt op basis daarvan wat er moet worden uitgevoerd. Bij een lege geschiedenis probeert het elke migratie vanaf het begin opnieuw af te spelen over een schema dat al actueel is.
* Het webinstallatieprogramma bepaalt op basis daarvan of er een upgrade in behandeling is. Bij een lege geschiedenis weigert het het verzoek, omdat niets aantoont dat een upgrade nodig is.

Initialiseer de geschiedenis dus één keer, en houd de onderstaande volgorde aan.

> **Waarschuwing: initialiseer de geschiedenis voordat u de nieuwe code kopieert.** De opdrachten markeren elke migratie die de **uitgerolde** code bevat als reeds uitgevoerd. Als u ze uitvoert nadat u de 3.0-code hebt gekopieerd, markeren ze ook de 3.0-migraties, en wordt uw upgrade nooit uitgevoerd.

Voer, terwijl uw huidige versie nog aanwezig is, het volgende uit:

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

De eerste opdracht maakt de geschiedenistabel aan. De tweede markeert de migraties van uw huidige versie. `doctrine:migrations:version` mislukt op zichzelf als de tabel nog niet bestaat, dus sla de eerste opdracht niet over.

**Geen shell op uw hosting?** De beheerpagina doet hetzelfde: het item **No migration history: click to fix** van de platformgezondheidscontroles. Het heeft de bovenstaande volgorde niet nodig, omdat het uw schema leest in plaats van de code op schijf: het registreert alleen de migratienaamruimten waarvan uw database aantoont dat ze al aanwezig zijn, en laat de nieuwere in behandeling. U mag de 3.0-code dus eerst kopiëren en de koppeling daarna gebruiken — zie *Als u de 3.0-code al hebt gekopieerd* hieronder.

Controleer het resultaat:

```bash
php bin/console doctrine:migrations:status
```

`Executed` moet gelijk zijn aan `Available`, en `New` moet 0 zijn. Kopieer nu de 3.0-code.

### Als u de 3.0-code al hebt gekopieerd

Twee symptomen identificeren dit geval. De webwizard antwoordt **"Chamilo is already installed"**, hoewel uw platform een 2.x-platform is, en `doctrine:migrations:status` meldt `Executed` 0.

Uw geschiedenis is nog leeg, en de code op schijf is niet langer de code die uw database heeft aangemaakt. Initialiseer de geschiedenis dus **niet** vanaf hier met `--add --all`: dat markeert elke migratie die de uitgerolde code bevat, waardoor de migraties die uw upgrade nog nodig heeft als reeds uitgevoerd worden geregistreerd. Ze worden dan nooit uitgevoerd, en niets waarschuwt u daarna — uw database mist eenvoudigweg de kolommen die ze aanmaken.

Er zijn twee uitwegen, en de eerste vereist geen shell.

**Weg één, vanaf de beheerpagina.** Open de platformgezondheidscontroles en gebruik het item **No migration history: click to fix**. Het leest uw schema, registreert alleen de naamruimten waarvan uw database aantoont dat ze al aanwezig zijn, en laat de nieuwere migraties in behandeling. De melding rapporteert beide aantallen: voor een 2.0.x-database onder de 3.0-code, 347 geregistreerd en 46 nog in behandeling. Voer daarna de upgrade uit zoals hieronder beschreven.

**Weg twee, vanaf een shell.** Initialiseer alles, en verwijder vervolgens uit de geschiedenis de naamruimten die uw vorige versie niet bevatte.

Elke 2.0.x-release, van 2.0.0 tot 2.0.3, bevat dezelfde **344** migraties, allemaal in de naamruimte `V200`. Chamilo 3.0.0 bevat **393**: de naamruimten `V210` en `V300`, plus drie `V200`-migraties. Die drie zijn gedateerde kopieën van migraties die ook in `V210` en `V300` voorkomen, toegevoegd zodat het 1.11.x-pad hun kolommen vroeg aanmaakt, en elk controleert het schema voordat het handelt. Het registreren van de volledige naamruimte `V200` verliest dus niets — hun tweelingen blijven in behandeling en doen het werk.

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

Verwijder vervolgens in uw database de migraties die nog moeten worden uitgevoerd:

```sql
DELETE FROM version WHERE version LIKE '%V210%' OR version LIKE '%V300%';
```

Controleer het resultaat:

```bash
php bin/console doctrine:migrations:status
```

Voor een 2.0.x-bron en Chamilo 3.0.0 moet `Executed` 347 zijn, `Available` 393 en `New` 46. Ga nu verder met de upgrade hieronder.

### De upgrade autoriseren, als u de webwizard gebruikt

Uw platform is al geïnstalleerd, dus de wizard weigert de upgrade totdat u deze op de server autoriseert. De autorisatie is een leeg bestand met de naam `UPGRADE_ENABLED`, in de projectroot, naast `.env` en `composer.json`:

```bash
cd /var/www/chamilo
touch UPGRADE_ENABLED
```

Het komt in de projectroot, niet in `public/`: vanaf daar kan niemand via HTTP vragen of uw platform momenteel openstaat voor een upgrade. Zonder het bestand antwoordt de wizard `No UPGRADE_ENABLED found in the project root`. Het installatieprogramma verwijdert het bestand wanneer de upgrade is voltooid; bij een alleen-lezen projectroot meldt het dat in plaats daarvan, en verwijdert u het bestand handmatig. De opdrachtregel heeft zo'n bestand niet nodig.

### De upgrade uitvoeren

Kopieer de nieuwe code en open vervolgens uw URL en volg de wizard, of voer de migraties uit vanaf de opdrachtregel:

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

De webwizard opent alleen zolang er migraties in behandeling zijn. Zodra de upgrade is voltooid, antwoordt deze opnieuw met `409 Conflict`, wat hem beschermt: de wizard heeft geen eigen aanmelding.

## Chamilo 3.0.x bijwerken

Kleine updates binnen de 3.0-branch verlopen eenvoudiger.

### Updateproces

#### Met een pakket

1. **Maak een back-up** van de database en de bestanden.

2. **Download de nieuwste 3.0.x-versie** van [chamilo.org](https://chamilo.org/download):

3. **Pak lokaal uit**

Bijvoorbeeld (pas aan aan de gedownloade versie)
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

Pas aan aan de gebruiker van uw webserver:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en steekproefsgewijs de belangrijkste functionaliteit.

#### Met Git

Als u Chamilo met Git hebt geïnstalleerd, kunt u in plaats daarvan deze instructies volgen.

1. **Maak een back-up** van de database en de bestanden.

2. **Haal de nieuwste code op** (of download de nieuwe release):
   ```bash
   git pull origin 3.0
   ```

3. **Werk PHP-afhankelijkheden bij:**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **Werk JavaScript-afhankelijkheden bij en bouw de assets opnieuw:**
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

Pas aan aan de gebruiker van uw webserver:
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **Controleer** of het platform correct laadt en steekproefsgewijs de belangrijkste functionaliteit.

### Updates automatiseren

Voor organisaties die meerdere Chamilo-instanties beheren, kunt u overwegen het updateproces te scripten:

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

## Chamilo 3.1: migratie van de cursustaal

In [PR #9176](https://github.com/chamilo/chamilo-lms/pull/9176) zijn cursustalen genormaliseerd van de tekstuele kolom `course.course_language` naar `course.language_id`, die verwijst naar `language.id`. De API en ondersteunde aanroepers blijven de cursustaal als ISO-code beschikbaar stellen. Dit is een wijziging van een databaserelatie, geen nieuwe taalkiezer voor docenten.

Voordat u de betreffende V310-migratie (`Version20261005120000`) uitvoert, controleert u of elke cursustaalcode **exact één** waarde van `language.isocode` overeenkomt. Deze alleen-lezenquery identificeert ontbrekende of dubbelzinnige overeenkomsten zolang de oude kolom nog bestaat:

```sql
SELECT c.course_language, COUNT(DISTINCT l.id) AS language_matches
FROM course c
LEFT JOIN language l ON l.isocode = c.course_language
GROUP BY c.course_language
HAVING COUNT(DISTINCT l.id) <> 1;
```

Een geslaagde preflight retourneert geen rijen. Als er wel rijen worden geretourneerd, controleer en corrigeer de brongegevens zorgvuldig voordat u de migratie uitvoert. De migratie weigert niet-overeenkomende of dubbelzinnige codes en wijst ook een conflicterend gedeeltelijk schema af (`course_language` en `language_id` beide aanwezig). Maak een back-up van de database en test op staging; verwijder de oude kolom niet en schakel deze controles niet handmatig uit.

## Chamilo 3.1: AI Toolbox-registratie bij geüpgradede cursussen

Wanneer AI Toolbox ontbreekt in cursussen die al bestonden vóór een upgrade, controleer of de relevante **V310-migraties** succesvol zijn uitgevoerd. De herstelmigratie `Version20261008113000` zorgt ervoor dat de Toolbox-tool en het resourcetype `toolbox_items` bestaan, en maakt ontbrekende Toolbox-cursustoolvermeldingen **als concepten** aan; ze worden niet automatisch gepubliceerd. Latere verbeteringen aan de migratie richten zich op de betrouwbaarheid en prestaties van de upgrade. Dit is een upgradeherstel, geen vervanging van de normale toolzichtbaarheid en rechten van het platform.

Als de tool nog steeds ontbreekt, controleer de migratiestatus en de Toolbox-configuratie voordat u cursusrecords wijzigt. Voeg **niet** handmatig tool- of resourcekoppelingsrijen in en voer migraties niet herhaaldelijk uit zonder het werkelijke schema en de migratiegeschiedenis te controleren. Zie [PR #9195](https://github.com/chamilo/chamilo-lms/pull/9195) en de vervolg-[PR #9229](https://github.com/chamilo/chamilo-lms/pull/9229).

## Chamilo 3.1: Normalisatie van het verouderde databaseschema

De schemaopschoning van oktober 2026 wijzigt enkele **kolomnamen, typen en relaties** in de database, terwijl velden die nog actief worden gebruikt, behouden blijven. In het bijzonder wordt `course_rel_class.course_code` vervangen door `course_rel_class.c_id` (verwijzend naar `course.id`), en wordt `course_request.category_code` vervangen door `course_request.category_id` (verwijzend naar `course_category.id`). Geselecteerde kolommen `title`, `url` en lange `VARCHAR`-kolommen worden omgezet naar `LONGTEXT`, terwijl andere door Chamilo beheerde `VARCHAR`-velden waar van toepassing worden genormaliseerd naar lengte 255. Kolommen die eigendom zijn van externe pakketten worden bewust afzonderlijk behandeld.

Voor installaties met aangepaste SQL-rapporten, plug-ins of integraties: **controleer hun query's en aannames over het schema** voordat u deze migraties implementeert. De conversies van klas/cursus en cursusaanvraag/categorie weigeren onopgeloste verwijzingen in plaats van ze stilzwijgend te verwerpen. De opschoning verwijdert ook verouderde FOS-groepstabellen nadat van groepen afgeleide gebruikersrollen veilig zijn behouden; incompatibele of ongeldige verouderde groepsgegevens zorgen ervoor dat de migratie stopt voor controle. Verwijder die tabellen niet en herschrijf de koppelingen niet handmatig vooraf.

Deze wijzigingen zijn gedocumenteerd in [PR #9212](https://github.com/chamilo/chamilo-lms/pull/9212) (issue #7445). Maak een back-up van de database en verifieer de upgrade op een stagingkopie, met name als aangepaste code deze verouderde tabellen leest of vaste tekstlengtes verwacht.

## Beveiligingsopmerkingen

### Beveiligingsonderhoud van oktober 2026 op de 3.x-ontwikkelingsbranch

Verschillende beveiligingsoplossingen van **christianbeeznest** zijn tussen **16 en 18 oktober 2026** samengevoegd in de `master`-branch van Chamilo. Dit zijn beveiligingen op codeniveau, **geen nieuwe instellingen**. Een samengevoegde pull request garandeert niet dat de wijziging is opgenomen in een bepaalde getagde release of in een installatie die niet is bijgewerkt. Controleer de release notes of de geïmplementeerde Git-revisie voordat u een implementatie als gepatcht markeert.

De wijzigingen omvatten:

* **HTML-filtering:** robuustere verwijdering van onveilige event-attributen uit door gebruikers aangeleverde HTML ([PR #9247](https://github.com/chamilo/chamilo-lms/pull/9247)).
* **Voortgang van leerpaden en oefenannotaties:** versterkte afhandeling aan de serverzijde van verzoeken over leerpadvoortgang en van toegang tot de geannoteerde pogingsantwoorden van een cursist ([PR #9251](https://github.com/chamilo/chamilo-lms/pull/9251), [PR #9259](https://github.com/chamilo/chamilo-lms/pull/9259)).
* **Links naar sociale profielen en linkcontrole:** striktere URL-validatie en bescherming van de cursuslinkcontrole tegen onveilige wijzigingen in DNS-resolutie ([PR #9263](https://github.com/chamilo/chamilo-lms/pull/9263), [PR #9271](https://github.com/chamilo/chamilo-lms/pull/9271)).
* **CSV-exports:** beperking van de interpretatie van spreadsheetformules in geëxporteerde gegevens, over meerdere verouderde en moderne rapportage-/exportpaden ([PR #9267](https://github.com/chamilo/chamilo-lms/pull/9267)).

**Nadat u code met deze oplossingen hebt geïmplementeerd**, voer een regressiecontrole uit op staging: maak opgemaakte HTML-inhoud aan en geef deze weer; sla een leerpad op en hervat het; verifieer dat cursisten alleen hun eigen geautoriseerde oefenannotaties kunnen lezen; controleer toegestane sociale en cursuslinks; en open representatieve CSV-exports in een spreadsheetprogramma om te bevestigen dat door de gebruiker beheerde tekst niet als formule wordt geïnterpreteerd. Neem waar relevant de rollen docent, cursist en beheerder op. Behoud bestaande authenticatie, toegangscontroles en beperkingen op uitgaand netwerkverkeer. Deze controles helpen regressies op te sporen, maar vervangen geen beveiligingsbeoordeling.

### Voorspelbare wachtwoorden van SSO- en SCIM-gebruikers

Vóór Chamilo 3.0.2 hadden sommige accounts die door een extern identiteitssysteem waren aangemaakt of bijgewerkt een vast, openbaar te raden wachtwoord. Iedereen die de gebruikersnaam kende, kon zich aanmelden via het gewone aanmeldformulier als het account de authenticatiebron `platform` behield.

Chamilo 3.0.2 corrigeert de code. Het wijzigt **niet** wachtwoorden die al bestaan, dus controleer deze accounts nadat u hebt bijgewerkt:

* **SCIM:** gebruikers die zijn aangemaakt via `POST /scim/v2/Users` hebben het wachtwoord `scim`.
* **Azure Entra ID, Facebook, Keycloak:** gebruikers die zich via deze providers hebben aangemeld, kregen hun wachtwoord vervangen door `azure`, `facebook` of `keycloak`. Alleen gebruikers die ook de authenticatiebron `platform` hebben, kunnen deze gebruiken om zich aan te melden.
* **Generieke OAuth2:** gebruikers die door de provider zijn aangemaakt, hebben hun gebruikersnaam als wachtwoord.

Om de blootstelling te dichten:

1. Werk bij naar Chamilo 3.0.2 of later.
2. Ga in **Beheer > Gebruikers** naar elke getroffen gebruiker, bewerk deze en stel een nieuw wachtwoord in. Gebruikers die zich alleen via de identiteitsprovider aanmelden, hoeven dit niet te kennen.
3. Als u SCIM gebruikt, stel dan `auth_source` in `authentication.yaml` in op een andere waarde dan `platform` en wis daarna de cache. Zie [SCIM](../authentication/scim.md). Bestaande gebruikers behouden de authenticatiebronnen die ze al hebben.
4. Vraag gebruikers die zich met een wachtwoord aanmelden om dit te wijzigen.

Nieuwe gebruikers die na de update worden aangemaakt, ontvangen een willekeurig wachtwoord, en een SSO-aanmelding overschrijft niet langer het wachtwoord van een bestaande gebruiker. Gebruikers die een wachtwoord nodig hebben voor het gewone aanmeldformulier, kunnen er een aanvragen via **Wachtwoord vergeten?** op de aanmeldpagina.

## Tips

* **Maak altijd een back-up voordat u een upgrade uitvoert.** Databasemigraties zijn niet omkeerbaar via de Chamilo-interface.
* **Test eerst op een stagingomgeving** -- vooral bij de migratie van 1.11.x naar 3.0, die een aanzienlijke gegevenstransformatie omvat.
* **Plan upgrades tijdens onderhoudsvensters** wanneer gebruikers het platform niet actief gebruiken.
* **Abonneer u op GitHub-releases** op [Github](https://github.com/chamilo/chamilo-lms/releases) via het belpictogram om meldingen te ontvangen over nieuwe versies en beveiligingspatches.
* **Als de wizard antwoordt met `Chamilo is already installed`**, heeft deze geen openstaande migratie gevonden. Voer `php bin/console doctrine:migrations:status` uit om dit te controleren. Als `Executed` 0 is op een platform dat werkt, is uw migratiegeschiedenis nooit geïnitialiseerd — zie [De migratiegeschiedenis eerst initialiseren](#seed-the-migration-history-first).
* **Automatisch downloaden van nieuwe versies** is nog niet beschikbaar in Chamilo 3.0, maar dit is een lopend project dat we hopelijk binnenkort uitbrengen. De upgrade zelf verloopt al via de webwizard.