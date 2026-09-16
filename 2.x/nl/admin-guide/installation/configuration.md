# Configuratie

Chamilo 2.0 maakt gebruik van omgevingsvariabelen en Symfony-configuratiebestanden voor de kerninstellingen. Deze pagina behandelt de belangrijkste configuratiebestanden en variabelen.

## Omgevingsvariabelen (.env)

Het primaire configuratiebestand is `.env` in de hoofdmap van Chamilo. Dit bestand bevat omgevingsspecifieke instellingen die niet in versiebeheer mogen worden opgenomen.

Een standaard `.env.dist`-bestand wordt meegeleverd met Chamilo en bevat gedocumenteerde standaardwaarden. Maak een `.env`-bestand aan (vereist om de installatie te starten) om waarden voor uw omgeving aan te passen.

### Belangrijke variabelen

| Variabele | Beschrijving | Voorbeeld |
|----------|-------------|---------|
| `APP_ENV` | De toepassingsomgeving op Symfony-niveau. Gebruik `prod` voor productie, `dev` voor ontwikkeling, 'test' voor testen. | `prod` |
| `APP_SECRET` | Een willekeurige tekenreeks die wordt gebruikt voor CSRF-tokens, het ondertekenen van cookies en andere cryptografische operaties. Chamilo genereert een unieke waarde voor elke installatie. Wijzig deze niet. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | De databasehost. Standaard ingesteld op localhost. | `localhost` |
| `DATABASE_PORT` | De databasepoort. Standaard ingesteld op 3306 voor MySQL/MariaDB. | `3306` |
| `DATABASE_NAME` | De databasenaam, zoals door u opgegeven in de installatiewizard. | Zie hieronder. |
| `DATABASE_USER` | De databasegebruikersnaam, zoals door u opgegeven in de installatiewizard. | Zie hieronder. |
| `DATABASE_PASSWORD` | Het wachtwoord van de databasegebruiker, zoals door u opgegeven in de installatiewizard. | Zie hieronder. |
| `TRUSTED_PROXIES` | (Optioneel) Als u Chamilo achter een reverse proxy host, moet u hier de IP(s) van de reverse proxy opgeven zodat Chamilo oproepen correct kan interpreteren en antwoorden kan genereren. | |

Andere instellingen in .env worden relatief zelden gewijzigd.

Houd er rekening mee dat in toekomstige versies de DATABASE_*-instellingen zullen worden samengevoegd tot één enkele `DATABASE_URL`-variabele.

De configuratie voor het verzenden van e-mails wordt tijdens de installatie gepresenteerd, maar kan later worden aangepast in de sectie `Platforminstellingen` van het beheerdersdashboard.

## Symfony-configuratie (config/-map)

Symfony-niveau configuratie bevindt zich in de `config/`-map. Deze YAML-bestanden bepalen het gedrag van het framework, servicedefinities en pakket-specifieke instellingen.

Het is niet gebruikelijk om deze bestanden te hoeven wijzigen, en het aanpassen ervan kan uw portaal onbruikbaar maken. Probeer deze dus niet te wijzigen als u de beschikbaarheid van het systeem moet garanderen.

### Belangrijke configuratiebestanden

| Bestand | Doel |
|------|---------|
| `config/authentication.yaml` | Configuratie van authenticatiemethoden. |
| `config/packages/doctrine.yaml` | Database- en ORM-configuratie. |
| `config/packages/security.yaml` | Authenticatie, firewalls, toegangscontrole en rolhiërarchieën. |
| `config/packages/cache.yaml` | Configuratie van cache-adapter (bestandssysteem, APCu, Redis). |
| `config/packages/framework.yaml` | Algemene Symfony-frameworkinstellingen (sessie, CSRF, router, HTTP-caching). |
| `config/packages/twig.yaml` | Configuratie van de sjabloonengine. |
| `config/services.yaml` | Definitie van toepassingsservices en dependency injection. |

### Omgevingsspecifieke overschrijvingen

Symfony ondersteunt configuratie per omgeving. Bestanden in `config/packages/prod/` overschrijven de standaardinstellingen wanneer `APP_ENV=prod`, en `config/packages/dev/` overschrijft deze wanneer `APP_ENV=dev`.

Bijvoorbeeld, `config/packages/prod/monolog.yaml` configureert doorgaans minder uitgebreide logging dan het equivalent voor ontwikkeling.

Chamilo definieert zelf geen configuratie in `config/packages/prod/` in de software, dus als u instellingen uit `config/packages/*.yaml` wilt aanpassen, maak dan een kopie van het yaml-bestand in die map en wijzig daar de instellingen.

## Bestandsrechten

We hebben in 2.0+ moeite gedaan om ervoor te zorgen dat slechts één map rechten nodig heeft. Dit is de `var/`-map, en om complexe problemen te vermijden, is het voldoende om de hele map schrijfbaar te maken voor de systeemgebruiker van de webserver.

Stel de rechten correct in op Debian-gebaseerde systemen:

```bash
# Voor systemen waar de webserver draait als www-data
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

Wis en verwarm vervolgens de cache:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Vertrouwde proxies configureren

Als Chamilo achter een reverse proxy of load balancer draait, configureer dan vertrouwde proxies zodat HTTPS-detectie en client-IP-resolutie correct werken:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Sessieopslag configureren

Standaard worden sessies opgeslagen in het bestandssysteem. Voor implementaties met meerdere servers configureert u sessies die worden ondersteund door Redis of een database:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## Tips

* **Bewerk `.env.dist` nooit rechtstreeks** -- Gebruik altijd `.env` voor uw aanpassingen. Het bestand `.env.dist` kan tijdens upgrades worden overschreven.
* **Houd `APP_DEBUG=0` in productie** -- De debugmodus onthult gevoelige informatie op foutpagina's.
* **Maak een back-up van `.env`** apart van de codebase, aangezien het bestand inloggegevens bevat en is uitgesloten van versiebeheer.