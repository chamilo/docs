# Configuratie

Chamilo 3.0 gebruikt omgevingsvariabelen en Symfony-configuratiebestanden voor de kerninstellingen. Deze pagina behandelt de belangrijkste configuratiebestanden en variabelen.

## Omgevingsvariabelen (.env)

Het primaire configuratiebestand is `.env` in de hoofdmap van Chamilo. Dit bestand bevat omgevingsspecifieke instellingen die niet aan versiebeheer mogen worden toegevoegd.

Een standaardbestand `.env.dist` wordt meegeleverd met Chamilo en bevat gedocumenteerde standaardwaarden. Maak `.env` aan (vereist om de installatie te starten) om waarden voor uw omgeving te overschrijven.

### Belangrijke variabelen

| Variabele | Beschrijving | Voorbeeld |
|----------|-------------|---------|
| `APP_ENV` | De applicatieomgeving, op Symfony-niveau. Gebruik `prod` voor productie, `dev` voor ontwikkeling en 'test' voor testen. | `prod` |
| `APP_SECRET` | Een willekeurige tekenreeks die wordt gebruikt voor CSRF-tokens, het ondertekenen van cookies en andere cryptografische bewerkingen. Chamilo genereert een unieke waarde voor elke installatie. Wijzig deze niet. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | De databasehost. Standaard localhost | `localhost` |
| `DATABASE_PORT` | De databasepoort. Standaard 3306 voor MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | De databasenaam, zoals door u opgegeven aan de installatiewizard. | Zie hieronder. |
| `DATABASE_USER` | De databasegebruikersnaam, zoals door u opgegeven aan de installatiewizard. | Zie hieronder. |
| `DATABASE_PASSWORD` | Het wachtwoord van de databasegebruiker, zoals door u opgegeven aan de installatiewizard. | Zie hieronder. |
| `TRUSTED_PROXIES` | (Optioneel) Als u Chamilo achter een reverse proxy host, moet u hier het IP-adres (of de IP-adressen) van de reverse proxy opgeven, zodat Chamilo aanroepen correct kan interpreteren en antwoorden kan genereren. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optioneel) Maakt de interactieve API-documentatie (Swagger/OpenAPI) beschikbaar op `/api`. Standaard uitgeschakeld. Vereist het legen van de cache om van kracht te worden — zie [De API-documentatie inschakelen](#enable-the-api-documentation) hieronder. | `true` |

Andere instellingen in .env worden relatief zelden gewijzigd.

Merk op dat in toekomstige versies de DATABASE_*-instellingen worden samengevoegd tot één enkele variabele `DATABASE_URL`.

De configuratie voor het verzenden van e-mail wordt tijdens de installatie gepresenteerd, maar kan later worden gewijzigd in de sectie `Platform settings` van het beheerdersdashboard.

## Symfony-configuratie (map config/)

Configuratie op Symfony-niveau bevindt zich in de map `config/`. Deze YAML-bestanden bepalen het gedrag van het framework, servicedefinities en pakketspecifieke instellingen.

De volledige map `config/` wordt meegeleverd met elk Chamilo-pakket en elke update — in tegenstelling tot bijvoorbeeld `.env` wordt deze niet uitgesloten of speciaal behouden tijdens een upgrade. **Elke wijziging die rechtstreeks in een bestand onder `config/` of `config/packages/` wordt aangebracht, wordt stilzwijgend overschreven de volgende keer dat u Chamilo bijwerkt.** Zie [Omgevingsspecifieke overschrijvingen](#environment-specific-overrides) hieronder voor de ondersteunde manier om de configuratie aan te passen zonder uw wijzigingen te verliezen.

Het komt niet vaak voor dat u deze bestanden moet wijzigen, en het wijzigen ervan kan uw portaal onbruikbaar maken. Probeer ze daarom niet te wijzigen als u de beschikbaarheid van het systeem moet waarborgen.

### Belangrijke configuratiebestanden

| Bestand | Doel |
|------|---------|
| `config/authentication.yaml` | Configuratie van authenticatiemethoden. |
| `config/packages/doctrine.yaml` | Configuratie van database en ORM. |
| `config/packages/security.yaml` | Authenticatie, firewalls, toegangscontrole en rolhiërarchieën. |
| `config/packages/cache.yaml` | Configuratie van de cacheadapter (bestandssysteem, APCu, Redis). |
| `config/packages/framework.yaml` | Algemene Symfony-frameworkinstellingen (sessie, CSRF, router, HTTP-caching). |
| `config/packages/twig.yaml` | Configuratie van de template-engine. |
| `config/services.yaml` | Definities van applicatieservices en dependency injection. |

### Omgevingsspecifieke overschrijvingen

Symfony ondersteunt configuratie per omgeving. Bestanden in `config/packages/prod/` overschrijven de standaardwaarden wanneer `APP_ENV=prod`, en `config/packages/dev/` overschrijft wanneer `APP_ENV=dev`.

Zo configureert `config/packages/prod/monolog.yaml` doorgaans minder uitgebreide logging dan het equivalent voor ontwikkeling.

Chamilo definieert in de software zelf geen configuratie in `config/packages/prod/`. Als u een instelling uit `config/packages/*.yaml` wilt aanpassen, **bewerk dan niet het basisbestand** — maak een bestand met dezelfde naam aan in `config/packages/prod/` (of `dev/`/`test/`, overeenkomstig de omgeving die u wilt beïnvloeden) met alleen de sleutels die u wilt overschrijven, en plaats uw wijzigingen daar.

Dit is van belang omdat de basisbestanden `config/packages/*.yaml` deel uitmaken van het Chamilo-pakket: elke update levert ze opnieuw mee en overschrijft wat daar staat, zodat rechtstreekse bewerkingen een upgrade niet overleven. Omdat Chamilo nooit iets onder `config/packages/prod/` (of `dev/`/`test/`) mee levert, wordt die map niet overschreven door een update en is dit de ondersteunde plaats om lokale aanpassingen te bewaren.

## Bestandsrechten

We hebben in 2.0+ inspanningen geleverd om ervoor te zorgen dat slechts één map rechten nodig heeft, en dit blijft gelden in 3.0. Dit is de map `var/`, en om complexe problemen te vermijden volstaat het om de hele map schrijfbaar te maken voor de systeemgebruiker van de webserver.

Stel de rechten correct in op Debian-gebaseerde systemen:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Veelvoorkomende configuratietaken

### Overschakelen naar productiemodus

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Wis vervolgens de cache en warm deze op:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### De API-documentatie inschakelen

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Wis vervolgens de cache zodat de wijziging van kracht wordt:

```bash
php bin/console cache:clear
```

De interactieve API-documentatie (Swagger/OpenAPI) is daarna beschikbaar op `/api`. Alleen `.env` bewerken is niet voldoende: de opgeloste waarde wordt vastgelegd in de gecompileerde cache van Symfony, waardoor `/api` de vorige status blijft teruggeven (ingeschakeld of niet) totdat de cache is gewist. De actie **Systeem > Tijdelijke bestanden opschonen** in het beheerpaneel doet dit *niet* — zie [Systeemhulpmiddelen](../system/system-tools.md#clean-temporary-files) voor de reden — dus deze specifieke wijziging vereist shelltoegang om `cache:clear` uit te voeren.

### Vertrouwde proxy's configureren

Als Chamilo achter een reverse proxy of load balancer draait, configureer dan vertrouwde proxy's zodat HTTPS-detectie en de resolutie van het client-IP-adres correct werken:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Sessieopslag configureren

Chamilo gebruikt standaard de native PHP-sessiehandler (doorgaans opslag op het bestandssysteem, afhankelijk van de PHP-configuratie). Voor implementaties waarbij meerdere applicatieservers één database delen, kan Chamilo PHP-sessies in plaats daarvan opslaan in de tabel `php_session`. Deze databasegestuurde optie is hersteld in [Chamilo LMS PR #9146](https://github.com/chamilo/chamilo-lms/pull/9146).

Controleer voordat u deze optie inschakelt of de databasetabel `php_session` bestaat. Deze wordt aangemaakt door de migratie `V310` `Version20260928234500` (of door het schema bij een nieuwe installatie). Controleer eerst de migratiestatus en de tabel in een stagingomgeving; schakel databaseopslag niet in voor een database zonder die tabel.

Stel het volgende in in `.env` van de implementatie of in de equivalente omgevingsconfiguratie:

```dotenv
SESSION_STORED_IN_DB=true
```

Laat `SESSION_STORED_IN_DB` ongedefinieerd of stel deze in op `false` om de native PHP-sessiehandler te behouden. De Symfony-configuratie selecteert al `Chamilo\CoreBundle\Session\ConfigurableSessionHandler`, die delegeert naar de juiste backend. **Vervang `framework.session.handler_id` niet door een niet-geverifieerde Redis-DSN**: dit zou de Chamilo-configuratie omzeilen en is niet de gedocumenteerde schakelaar voor databasesessies.

Bouw na het wijzigen van de omgevingsinstelling de applicatiecache van Symfony opnieuw op of wis deze volgens uw implementatieprocedure, en test aanmelden, navigatie en afmelden. Plan de wijziging tijdens een onderhoudsvenster: bestaande sessiegegevens worden niet overgedragen tussen de native PHP-opslag en de database, waardoor gebruikers zich mogelijk opnieuw moeten aanmelden. Neem `php_session`, wanneer deze optie is ingeschakeld, op in de planning voor databaseback-ups en bewaartermijnen.

## Tips

* **Bewerk `.env.dist` nooit rechtstreeks** -- Gebruik altijd `.env` voor uw overschrijvingen. Het bestand `.env.dist` kan tijdens upgrades worden overschreven.
* **Houd `APP_DEBUG=0` in productie** -- De debugmodus legt gevoelige informatie bloot op foutpagina's.
* **Maak een back-up van `.env`** apart van de codebase, omdat dit bestand referenties bevat en is uitgesloten van versiebeheer.