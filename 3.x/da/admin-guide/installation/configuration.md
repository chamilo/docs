# Konfiguration

Chamilo 3.0 bruger miljøvariabler og Symfony-konfigurationsfiler til sine kerneindstillinger. Denne side dækker de vigtigste konfigurationsfiler og -variabler.

## Miljøvariabler (.env)

Den primære konfigurationsfil er `.env` i Chamilo-rodmappen. Denne fil indeholder miljøspecifikke indstillinger, som ikke bør committes til versionsstyring.

En standardfil `.env.dist` medfølger Chamilo og indeholder dokumenterede standardværdier. Opret `.env` (påkrævet for at starte installationen) for at tilsidesætte værdier for dit miljø.

### Vigtige variabler

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | The application environment, at the Symfony level. Use `prod` for production, `dev` for development, 'test' for testing. | `prod` |
| `APP_SECRET` | A random string used for CSRF tokens, cookie signing, and other cryptographic operations. Chamilo generates a unique value for each installation. Don't modify it. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | The database host. Defaults to localhost | `localhost` |
| `DATABASE_PORT` | The database port. Defaults to 3306 for MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | The database name, as given by you to the installation wizard. | See below. |
| `DATABASE_USER` | The database username, as given by you to the installation wizard. | See below. |
| `DATABASE_PASSWORD` | The database user's password, as given by you to the installation wizard. | See below. |
| `TRUSTED_PROXIES` | (Optional) If you are hosting Chamilo behind a reverse proxy, you need to provide the IP(s) of the reverse proxy here for Chamilo to be able to interpret calls and generate responses correctly. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Optional) Exposes the interactive API documentation (Swagger/OpenAPI) at `/api`. Off by default. Requires a cache clear to take effect — see [Enable the API Documentation](#enable-the-api-documentation) below. | `true` |

Andre indstillinger i .env ændres relativt sjældent.

Bemærk, at DATABASE_*-indstillingerne i fremtidige versioner vil blive samlet i én enkelt variabel `DATABASE_URL`.

Konfiguration af e-mailafsendelse præsenteres under installationen, men kan senere ændres i sektionen `Platform settings` i administrationsdashboardet.

## Symfony-konfiguration (mappen config/)

Konfiguration på Symfony-niveau ligger i mappen `config/`. Disse YAML-filer styrer frameworkets adfærd, servicedefinitioner og pakkespecifikke indstillinger.

Hele mappen `config/` medfølger hver Chamilo-pakke og hver opdatering — i modsætning til f.eks. `.env` er den ikke udelukket eller særligt bevaret under en opgradering. **Enhver ændring, der foretages direkte i en fil under `config/` eller `config/packages/`, vil stille blive overskrevet, næste gang du opdaterer Chamilo.** Se [Miljøspecifikke tilsidesættelser](#environment-specific-overrides) nedenfor for den understøttede måde at tilpasse konfigurationen på uden at miste dine ændringer.

Det er ikke hyppigt nødvendigt at ændre disse filer, og ændringer kan gøre din portal ude af drift, så forsøg venligst ikke at ændre dem, hvis du skal sikre systemets tilgængelighed.

### Vigtige konfigurationsfiler

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | Authentication methods configuration. |
| `config/packages/doctrine.yaml` | Database and ORM configuration. |
| `config/packages/security.yaml` | Authentication, firewalls, access control, and role hierarchies. |
| `config/packages/cache.yaml` | Cache adapter configuration (filesystem, APCu, Redis). |
| `config/packages/framework.yaml` | General Symfony framework settings (session, CSRF, router, HTTP caching). |
| `config/packages/twig.yaml` | Template engine configuration. |
| `config/services.yaml` | Application service definitions and dependency injection. |

### Miljøspecifikke tilsidesættelser

Symfony understøtter konfiguration pr. miljø. Filer i `config/packages/prod/` tilsidesætter standarderne, når `APP_ENV=prod`, og `config/packages/dev/` tilsidesætter, når `APP_ENV=dev`.

For eksempel konfigurerer `config/packages/prod/monolog.yaml` typisk mindre udførlig logning end udviklingsækvivalenten.

Chamilo definerer ikke nogen konfiguration i `config/packages/prod/` i selve softwaren, så hvis du vil tilpasse en indstilling fra `config/packages/*.yaml`, **må du ikke redigere basisfilen** — opret en fil med samme navn inde i `config/packages/prod/` (eller `dev/`/`test/`, der matcher det miljø, du vil påvirke), som kun indeholder de nøgler, du vil tilsidesætte, og læg dine ændringer dér i stedet.

Dette er vigtigt, fordi basisfilerne `config/packages/*.yaml` er en del af Chamilo-pakken: hver opdatering leverer dem igen og overskriver, hvad der ligger dér, så redigeringer, der er foretaget direkte i dem, overlever ikke en opgradering. Da Chamilo aldrig leverer noget under `config/packages/prod/` (eller `dev/`/`test/`), er den mappe sikker mod at blive overskrevet af en opdatering og er det understøttede sted at opbevare lokale tilpasninger.

## Filrettigheder

Vi har i 2.0+ gjort en indsats for at sikre, at kun ét katalog behøver rettigheder, og det gælder fortsat i 3.0. Det er kataloget `var/`, og for at undgå komplekse problemer er det tilstrækkeligt at gøre hele mappen skrivbar for webserverens systembruger.

Angiv rettighederne korrekt på Debian-baserede systemer:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Almindelige konfigurationsopgaver

### Skift til produktionsmodus

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Ryd derefter cachen og varm den op:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Aktivér API-dokumentationen

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Ryd derefter cachen, så ændringen træder i kraft:

```bash
php bin/console cache:clear
```

Den interaktive API-dokumentation (Swagger/OpenAPI) er derefter tilgængelig på `/api`. Det er ikke nok at redigere `.env` alene: den opløste værdi er indlejret i Symfony's kompilerede cache, så `/api` fortsætter med at returnere sin tidligere tilstand (aktiveret eller ej), indtil cachen er ryddet. Handlingen **System > Ryd midlertidige filer** i administrationspanelet gør *ikke* dette — se [Systemværktøjer](../system/system-tools.md#clean-temporary-files) for hvorfor — så denne specifikke ændring kræver shell-adgang til at køre `cache:clear`.

### Konfigurér betroede proxyservere

Hvis Chamilo kører bag en reverse proxy eller load balancer, skal du konfigurere betroede proxyservere, så HTTPS-detektion og opløsning af klient-IP fungerer korrekt:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Konfigurér sessionslagring

Som standard gemmes sessioner på filsystemet. Til installationer med flere servere skal du konfigurere Redis- eller databasebaserede sessioner:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Redigér aldrig `.env.dist` direkte** -- Brug altid `.env` til dine tilsidesættelser. Filen `.env.dist` kan blive overskrevet under opgraderinger.
* **Hold `APP_DEBUG=0` i produktion** -- Debug-tilstand afslører følsomme oplysninger på fejlssider.
* **Sikkerhedskopier `.env`** separat fra kodebasen, da den indeholder legitimationsoplysninger og er udelukket fra versionsstyring.