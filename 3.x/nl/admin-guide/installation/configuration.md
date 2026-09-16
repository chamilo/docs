# Configuratie

Chamilo 3.0 gebruikt omgevingsvariabelen en Symfony-configuratiebestanden voor de kerninstellingen. Deze pagina behandelt de belangrijkste configuratiebestanden en -variabelen.

## Omgevingsvariabelen (.env)

Het primaire configuratiebestand is `.env` in de hoofdmap van Chamilo. Dit bestand bevat omgevingsspecifieke instellingen die niet in versiebeheer mogen worden opgenomen.

Er wordt een standaardbestand `.env.dist` meegeleverd met Chamilo, met gedocumenteerde standaardwaarden. Maak `.env` aan (vereist om de installatie te starten) om waarden voor uw omgeving te overschrijven.

### Belangrijke variabelen

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | De applicatieomgeving, op Symfony-niveau. Gebruik `prod` voor productie, `dev` voor ontwikkeling, 'test' voor testen. | `prod` |
| `APP_SECRET` | Een willekeurige tekenreeks die wordt gebruikt voor CSRF-tokens, het ondertekenen van cookies en andere cryptografische bewerkingen. Chamilo genereert een unieke waarde voor elke installatie. Wijzig deze niet. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | De databasehost. Standaard localhost | `localhost` |
| `DATABASE_PORT` | De databasepoort. Standaard 3306 voor MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | De databasenaam, zoals u die in de installatiewizard hebt opgegeven. | Zie hieronder. |
| `DATABASE_USER` | De databasegebruikersnaam, zoals u die in de installatiewizard hebt opgegeven. | Zie hieronder. |
| `DATABASE_PASSWORD` | Het wachtwoord van de databasegebruiker, zoals u dat in de installatiewizard hebt opgegeven. | Zie hieronder. |
| `TRUSTED_PROXIES` | (Optioneel) Als u Chamilo achter een reverse proxy host, moet u hier het/de IP-adres(sen) van de reverse proxy opgeven, zodat Chamilo aanroepen kan interpreteren en antwoorden correct kan genereren. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optioneel) Stelt de interactieve API-documentatie (Swagger/OpenAPI) beschikbaar op `/api`. Standaard uitgeschakeld. Vereist het legen van de cache om van kracht te worden — zie [De API-documentatie inschakelen](#enable-the-api-documentation) hieronder. | `true` |

Andere instellingen in .env worden relatief zelden gewijzigd.

Merk op dat in toekomstige versies de DATABASE_*-instellingen worden samengevoegd tot één enkele variabele `DATABASE_URL`.

De configuratie voor het verzenden van e-mail wordt tijdens de installatie gepresenteerd, maar kan later worden gewijzigd in de sectie `Platform settings` van het beheerdersdashboard.

## Symfony-configuratie (map config/)

Configuratie op Symfony-niveau bevindt zich in de map `config/`. Deze YAML-bestanden sturen het gedrag van het framework, servicedefinities en pakketspecifieke instellingen.

De volledige map `config/` wordt meegeleverd bij elk Chamilo-pakket en elke update — in tegenstelling tot bijvoorbeeld `.env` wordt deze tijdens een upgrade niet uitgesloten of speciaal bewaard. **Elke wijziging die rechtstreeks in een bestand onder `config/` of `config/packages/` wordt aangebracht, wordt stilzwijgend overschreven de volgende keer dat u Chamilo bijwerkt.** Zie [Omgevingsspecifieke overschrijvingen](#environment-specific-overrides) hieronder voor de ondersteunde manier om configuratie aan te passen zonder uw wijzigingen te verliezen.

Het is niet vaak nodig die bestanden te wijzigen, en het wijzigen ervan kan uw portal onbruikbaar maken. Probeer ze daarom niet te wijzigen als u de beschikbaarheid van het systeem moet waarborgen.

### Belangrijke configuratiebestanden

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Configuratie van authenticatiemethoden. |
| `config/packages/doctrine.yaml` | Database- en ORM-configuratie. |
| `config/packages/security.yaml` | Authenticatie, firewalls, toegangscontrole en rolhiërarchieën. |
| `config/packages/cache.yaml` | Configuratie van de cache-adapter (bestandssysteem, APCu, Redis). |
| `config/packages/framework.yaml` | Algemene instellingen van het Symfony-framework (sessie, CSRF, router, HTTP-caching). |
| `config/packages/twig.yaml` | Configuratie van de template-engine. |
| `config/services.yaml` | Servicedefinities van de applicatie en dependency injection. |

### Omgevingsspecifieke overschrijvingen

Symfony ondersteunt configuratie per omgeving. Bestanden in `config/packages/prod/` overschrijven de standaardwaarden wanneer `APP_ENV=prod`, en `config/packages/dev/` overschrijft wanneer `APP_ENV=dev`.

Bijvoorbeeld configureert `config/packages/prod/monolog.yaml` doorgaans minder uitgebreide logging dan het equivalent voor ontwikkeling.

Chamilo definieert zelf geen configuratie in `config/packages/prod/` in de software, dus als u een instelling uit `config/packages/*.yaml` wilt aanpassen, **bewerk dan niet het basisbestand** — maak een bestand met dezelfde naam in `config/packages/prod/` (of `dev/`/`test/`, passend bij de omgeving die u wilt beïnvloeden) dat alleen de sleutels bevat die u wilt overschrijven, en plaats uw wijzigingen daar.

Dit is van belang omdat de basisbestanden `config/packages/*.yaml` deel uitmaken van het Chamilo-pakket: elke update levert ze opnieuw en overschrijft wat er staat, zodat rechtstreekse bewerkingen een upgrade niet overleven. Omdat Chamilo nooit iets onder `config/packages/prod/` (of `dev/`/`test/`) meelevert, is die map veilig tegen overschrijven bij een update en is het de ondersteunde plaats om lokale aanpassingen te bewaren.

## Bestandsrechten

We hebben in 2.0+ inspanningen geleverd om ervoor te zorgen dat slechts één map rechten nodig heeft, en dat blijft zo in 3.0. Dit is de map `var/`, en om complexe problemen te vermijden volstaat het om de hele map schrijfbaar te maken voor de systeemgebruiker van de webserver.

Stel de rechten passend in op Debian-gebaseerde systemen:

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

Wis daarna de cache en warm deze op:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### De API-documentatie inschakelen

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Wis daarna de cache zodat de wijziging van kracht wordt:

```bash
php bin/console cache:clear
```

De interactieve API-documentatie (Swagger/OpenAPI) is vervolgens beschikbaar op `/api`. Alleen `.env` bewerken is niet voldoende: de opgeloste waarde wordt ingebakken in de gecompileerde cache van Symfony, zodat `/api` de vorige staat blijft teruggeven (ingeschakeld of niet) totdat de cache is gewist. De actie **Systeem > Tijdelijke bestanden opschonen** in het beheerpaneel doet dit *niet* — zie [Systeemhulpmiddelen](../system/system-tools.md#clean-temporary-files) voor de reden — dus deze specifieke wijziging vereist shelltoegang om `cache:clear` uit te voeren.

### Vertrouwde proxies configureren

Als Chamilo achter een reverse proxy of load balancer draait, configureer dan vertrouwde proxies zodat HTTPS-detectie en het bepalen van het client-IP correct werken:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Sessieopslag configureren

Standaard worden sessies op het bestandssysteem opgeslagen. Voor implementaties met meerdere servers configureert u sessies op basis van Redis of de database:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Bewerk `.env.dist` nooit rechtstreeks** -- Gebruik altijd `.env` voor uw overrides. Het bestand `.env.dist` kan tijdens upgrades worden overschreven.
* **Houd `APP_DEBUG=0` in productie** -- De debugmodus toont gevoelige informatie op foutpagina's.
* **Maak een aparte back-up van `.env`** los van de codebase, omdat het inloggegevens bevat en is uitgesloten van versiebeheer.