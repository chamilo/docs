# Konfigurasjon

Chamilo 3.0 bruker miljøvariabler og Symfony-konfigurasjonsfiler for kjerneinnstillingene. Denne siden dekker de viktigste konfigurasjonsfilene og -variablene.

## Miljøvariabler (.env)

Den primære konfigurasjonsfilen er `.env` i Chamilo-rotkatalogen. Denne filen inneholder miljøspesifikke innstillinger som ikke skal sjekkes inn i versjonskontroll.

En standard `.env.dist`-fil følger med Chamilo og inneholder dokumenterte standardverdier. Opprett `.env` (påkrevd for å starte installasjonen) for å overstyre verdier for ditt miljø.

### Viktige variabler

| Variabel | Beskrivelse | Eksempel |
|----------|-------------|---------|
| `APP_ENV` | Applikasjonsmiljøet, på Symfony-nivå. Bruk `prod` for produksjon, `dev` for utvikling, 'test' for testing. | `prod` |
| `APP_SECRET` | En tilfeldig streng som brukes til CSRF-tokens, signering av informasjonskapsler og andre kryptografiske operasjoner. Chamilo genererer en unik verdi for hver installasjon. Ikke endre den. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Databaseverten. Standard er localhost | `localhost` |
| `DATABASE_PORT` | Databaseporten. Standard er 3306 for MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Databasenavnet, slik du oppga det i installasjonsveiviseren. | Se nedenfor. |
| `DATABASE_USER` | Databasebrukernavnet, slik du oppga det i installasjonsveiviseren. | Se nedenfor. |
| `DATABASE_PASSWORD` | Databasebrukerens passord, slik du oppga det i installasjonsveiviseren. | Se nedenfor. |
| `TRUSTED_PROXIES` | (Valgfritt) Hvis du hoster Chamilo bak en reversproxy, må du oppgi IP-adressen(e) til reversproxyen her for at Chamilo skal kunne tolke kall og generere svar korrekt. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Valgfritt) Eksponerer den interaktive API-dokumentasjonen (Swagger/OpenAPI) på `/api`. Av som standard. Krever tømming av hurtigbuffer for å tre i kraft — se [Aktiver API-dokumentasjonen](#enable-the-api-documentation) nedenfor. | `true` |

Andre innstillinger i .env endres relativt sjelden.

Merk at DATABASE_*-innstillingene i fremtidige versjoner vil bli slått sammen til én enkelt `DATABASE_URL`-variabel.

Konfigurasjon for sending av e-post presenteres under installasjonen, men kan endres senere i delen `Plattforminnstillinger` på administrasjonspanelet.

## Symfony-konfigurasjon (config/-katalogen)

Konfigurasjon på Symfony-nivå ligger i `config/`-katalogen. Disse YAML-filene styrer rammeverksatferd, tjenestedefinisjoner og pakkespesifikke innstillinger.

Hele `config/`-katalogen følger med hver Chamilo-pakke og hver oppdatering — i motsetning til for eksempel `.env` er den ikke ekskludert eller bevart spesielt under en oppgradering. **Enhver endring som gjøres direkte i en fil under `config/` eller `config/packages/` vil bli overskrevet uten varsel neste gang du oppdaterer Chamilo.** Se [Miljøspesifikke overstyringer](#environment-specific-overrides) nedenfor for den støttede måten å tilpasse konfigurasjon uten å miste endringene.

Det er ikke vanlig å måtte endre disse filene, og å endre dem kan gjøre portalen din ubrukelig, så ikke forsøk å endre dem hvis du må sikre systemets tilgjengelighet.

### Viktige konfigurasjonsfiler

| Fil | Formål |
|------|---------|
| `config/authentication.yaml` | Konfigurasjon av autentiseringsmetoder. |
| `config/packages/doctrine.yaml` | Database- og ORM-konfigurasjon. |
| `config/packages/security.yaml` | Autentisering, brannmurer, tilgangskontroll og rollehierarkier. |
| `config/packages/cache.yaml` | Konfigurasjon av hurtigbufferadapter (filsystem, APCu, Redis). |
| `config/packages/framework.yaml` | Generelle Symfony-rammeverksinnstillinger (økt, CSRF, ruter, HTTP-hurtigbufring). |
| `config/packages/twig.yaml` | Konfigurasjon av malmotoren. |
| `config/services.yaml` | Definisjoner av applikasjonstjenester og avhengighetsinjeksjon. |

### Miljøspesifikke overstyringer

Symfony støtter konfigurasjon per miljø. Filer i `config/packages/prod/` overstyrer standardverdiene når `APP_ENV=prod`, og `config/packages/dev/` overstyrer når `APP_ENV=dev`.

For eksempel konfigurerer `config/packages/prod/monolog.yaml` vanligvis mindre utførlig logging enn utviklingsmotstykket.

Chamilo definerer ingen konfigurasjon i `config/packages/prod/` i selve programvaren, så hvis du vil tilpasse en innstilling fra `config/packages/*.yaml`, **må du ikke redigere basisfilen** — opprett en fil med samme navn inne i `config/packages/prod/` (eller `dev/`/`test/`, avhengig av miljøet du vil påvirke) som kun inneholder nøklene du vil overstyre, og legg endringene der i stedet.

Dette er viktig fordi basisfilene `config/packages/*.yaml` er en del av Chamilo-pakken: hver oppdatering leverer dem på nytt og overskriver det som ligger der, så redigeringer gjort direkte i dem overlever ikke en oppgradering. Siden Chamilo aldri leverer noe under `config/packages/prod/` (eller `dev/`/`test/`), er den katalogen trygg mot å bli overskrevet av en oppdatering og er det støttede stedet å oppbevare lokale tilpasninger.

## Filrettigheter

Vi har i 2.0+ lagt inn innsats for å sørge for at kun én katalog trenger rettigheter, og dette gjelder fortsatt i 3.0. Dette er katalogen `var/`, og for å unngå komplekse problemer er det tilstrekkelig å sette hele mappen som skrivbar for systembrukeren til webserveren.

Sett rettighetene riktig på Debian-baserte systemer:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Vanlige konfigurasjonsoppgaver

### Bytt til produksjonsmodus

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Tøm deretter og varm opp hurtigbufferen:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Aktiver API-dokumentasjonen

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Tøm deretter hurtigbufferen slik at endringen trer i kraft:

```bash
php bin/console cache:clear
```

Den interaktive API-dokumentasjonen (Swagger/OpenAPI) er deretter tilgjengelig på `/api`. Å redigere `.env` alene er ikke nok: den oppløste verdien er bakt inn i Symfonys kompilerte hurtigbuffer, så `/api` fortsetter å returnere sin forrige tilstand (aktivert eller ikke) inntil hurtigbufferen tømmes. Handlingen **System > Clean temporary files** i administrasjonspanelet gjør *ikke* dette — se [Systemverktøy](../system/system-tools.md#clean-temporary-files) for hvorfor — så denne spesifikke endringen krever skalltilgang for å kjøre `cache:clear`.

### Konfigurer pålitelige proxyer

Hvis Chamilo kjører bak en reversproxy eller lastbalanser, konfigurer pålitelige proxyer slik at HTTPS-deteksjon og oppløsning av klient-IP fungerer korrekt:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Konfigurer øktlagring

Som standard lagres økter på filsystemet. For fler-server-installasjoner, konfigurer Redis- eller databasebaserte økter:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Rediger aldri `.env.dist` direkte** -- Bruk alltid `.env` for dine overstyringer. Filen `.env.dist` kan bli overskrevet under oppgraderinger.
* **Behold `APP_DEBUG=0` i produksjon** -- Feilsøkingsmodus eksponerer sensitiv informasjon på feilsider.
* **Ta sikkerhetskopi av `.env`** separat fra kodebasen, siden den inneholder påloggingsinformasjon og er utelatt fra versjonskontroll.