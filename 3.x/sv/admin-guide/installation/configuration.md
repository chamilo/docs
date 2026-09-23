# Konfiguration

Chamilo 3.0 använder miljövariabler och Symfony-konfigurationsfiler för sina kärninställningar. Den här sidan behandlar de viktigaste konfigurationsfilerna och variablerna.

## Miljövariabler (.env)

Den primära konfigurationsfilen är `.env` i Chamilo-rotkatalogen. Filen innehåller miljöspecifika inställningar som inte ska checkas in i versionshanteringen.

En standardfil `.env.dist` medföljer Chamilo och innehåller dokumenterade standardvärden. Skapa `.env` (krävs för att starta installationen) för att åsidosätta värden för din miljö.

### Viktiga variabler

| Variabel | Beskrivning | Exempel |
|----------|-------------|---------|
| `APP_ENV` | Programmiljön på Symfony-nivå. Använd `prod` för produktion, `dev` för utveckling, 'test' för testning. | `prod` |
| `APP_SECRET` | En slumpmässig sträng som används för CSRF-token, cookiesignering och andra kryptografiska operationer. Chamilo genererar ett unikt värde för varje installation. Ändra den inte. | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | Databashost. Standardvärde är localhost | `localhost` |
| `DATABASE_PORT` | Databasport. Standardvärde är 3306 för MySQL/MariaDB | `3306` |
| `DATABASE_NAME` | Databasnamnet, som du angav i installationsguiden. | Se nedan. |
| `DATABASE_USER` | Databasanvändarnamnet, som du angav i installationsguiden. | Se nedan. |
| `DATABASE_PASSWORD` | Databasanvändarens lösenord, som du angav i installationsguiden. | Se nedan. |
| `TRUSTED_PROXIES` | (Valfritt) Om du hostar Chamilo bakom en reverse proxy måste du ange reverse proxyns IP-adress(er) här så att Chamilo kan tolka anrop och generera svar korrekt. | |
| `APP_ENABLE_API_ENTRYPOINT` | (Valfritt) Exponerar den interaktiva API-dokumentationen (Swagger/OpenAPI) på `/api`. Avstängd som standard. Kräver cache-rensning för att träda i kraft — se [Aktivera API-dokumentationen](#enable-the-api-documentation) nedan. | `true` |

Övriga inställningar i .env ändras relativt sällan.

Observera att DATABASE_*-inställningarna i framtida versioner kommer att slås samman till en enda variabel `DATABASE_URL`.

Konfiguration för e-postsändning presenteras under installationen, men kan ändras senare i avsnittet `Platform settings` i administrationspanelen.

## Symfony-konfiguration (katalogen config/)

Konfiguration på Symfony-nivå ligger i katalogen `config/`. Dessa YAML-filer styr ramverkets beteende, tjänstedefinitioner och paketsspecifika inställningar.

Hela katalogen `config/` medföljer varje Chamilo-paket och varje uppdatering — till skillnad från till exempel `.env` undantas eller bevaras den inte särskilt vid en uppgradering. **Varje ändring som görs direkt i en fil under `config/` eller `config/packages/` skrivs tyst över nästa gång du uppdaterar Chamilo.** Se [Miljöspecifika åsidosättningar](#environment-specific-overrides) nedan för det stödda sättet att anpassa konfigurationen utan att förlora dina ändringar.

Det är inte vanligt att behöva ändra dessa filer, och att ändra dem kan göra portalen obrukbar, så försök inte ändra dem om du måste säkerställa systemets tillgänglighet.

### Viktiga konfigurationsfiler

| Fil | Syfte |
|------|---------|
| `config/authentication.yaml` | Konfiguration av autentiseringsmetoder. |
| `config/packages/doctrine.yaml` | Databas- och ORM-konfiguration. |
| `config/packages/security.yaml` | Autentisering, brandväggar, åtkomstkontroll och rollhierarkier. |
| `config/packages/cache.yaml` | Konfiguration av cache-adapter (filsystem, APCu, Redis). |
| `config/packages/framework.yaml` | Allmänna inställningar för Symfony-ramverket (session, CSRF, router, HTTP-cache). |
| `config/packages/twig.yaml` | Konfiguration av mallmotorn. |
| `config/services.yaml` | Definitioner av programtjänster och beroendeinjektion. |

### Miljöspecifika åsidosättningar

Symfony stöder konfiguration per miljö. Filer i `config/packages/prod/` åsidosätter standardvärdena när `APP_ENV=prod`, och `config/packages/dev/` åsidosätter när `APP_ENV=dev`.

Till exempel konfigurerar `config/packages/prod/monolog.yaml` vanligtvis mindre utförlig loggning än motsvarigheten för utveckling.

Chamilo definierar ingen konfiguration i `config/packages/prod/` i själva programvaran, så om du vill anpassa en inställning från `config/packages/*.yaml` ska du **inte redigera basfilen** — skapa en fil med samma namn i `config/packages/prod/` (eller `dev/`/`test/`, beroende på vilken miljö du vill påverka) som endast innehåller de nycklar du vill åsidosätta, och lägg dina ändringar där i stället.

Detta är viktigt eftersom basfilerna `config/packages/*.yaml` är en del av Chamilo-paketet: varje uppdatering levererar dem på nytt och skriver över det som finns där, så ändringar som görs direkt i dem överlever inte en uppgradering. Eftersom Chamilo aldrig levererar något under `config/packages/prod/` (eller `dev/`/`test/`) är den katalogen skyddad mot att skrivas över vid en uppdatering och är den stödda platsen för lokala anpassningar.

## Filbehörigheter

Vi har i 2.0+ arbetat för att endast en katalog ska behöva behörigheter, och detta gäller fortfarande i 3.0. Det är katalogen `var/`, och för att undvika komplicerade problem räcker det att göra hela mappen skrivbar för webbserverns systemanvändare.

Sätt behörigheterna på lämpligt sätt under Debian-baserade system:

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## Vanliga konfigurationsuppgifter

### Växla till produktionsläge

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

Rensa därefter cachen och värm upp den:

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### Aktivera API-dokumentationen

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

Rensa därefter cachen så att ändringen träder i kraft:

```bash
php bin/console cache:clear
```

Den interaktiva API-dokumentationen (Swagger/OpenAPI) finns därefter tillgänglig på `/api`. Att enbart redigera `.env` räcker inte: det resolvade värdet bakas in i Symfonys kompilerade cache, så `/api` fortsätter att returnera sitt tidigare tillstånd (aktiverat eller inte) tills cachen rensas. Åtgärden **System > Rensa temporära filer** i administrationspanelen gör *inte* detta — se [Systemverktyg](../system/system-tools.md#clean-temporary-files) för varför — så den här specifika ändringen kräver skalåtkomst för att köra `cache:clear`.

### Konfigurera betrodda proxyservrar

Om Chamilo körs bakom en omvänd proxy eller lastbalanserare, konfigurera betrodda proxyservrar så att HTTPS-detektering och resolvering av klient-IP fungerar korrekt:

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### Konfigurera sessionslagring

Som standard lagras sessioner på filsystemet. För distributioner med flera servrar, konfigurera Redis- eller databasstödda sessioner:

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## Tips

* **Redigera aldrig `.env.dist` direkt** -- Använd alltid `.env` för dina åsidosättningar. Filen `.env.dist` kan skrivas över vid uppgraderingar.
* **Behåll `APP_DEBUG=0` i produktion** -- Felsökningsläge exponerar känslig information på felsidor.
* **Säkerhetskopiera `.env`** separat från kodbasen eftersom den innehåller autentiseringsuppgifter och är undantagen från versionshantering.