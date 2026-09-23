# Prestandajustering

Prestandainställningar hjälper till att optimera Chamilo för snabbare sidladdningar och bättre resursutnyttjande, särskilt på plattformar med många samtidiga användare.

> **Ytterligare referens**: Din Chamilo-installation innehåller en utökad optimeringsguide. Öppna `/documentation/optimization.html` i en webbläsare (t.ex. `https://your-chamilo-site/documentation/optimization.html`) för serverrekommendationer som är specifika för din version.

## Symfony Cache

Chamilo 3.0 är byggt på Symfony, som använder en kompilerad cache för routing, dependency injection och mallar. Att hantera denna cache är avgörande för prestandan.

### Rensa cachen

Efter konfigurationsändringar, driftsättning eller uppgraderingar, rensa Symfony-cachen:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

I produktion ska du alltid se till att `APP_ENV=prod` är inställt i din `.env.local`-fil. Utvecklingsmiljön (`APP_ENV=dev`) inkluderar omfattande felsökningsöverhead och ska aldrig användas i produktion.

### Cache Warmup

Efter att cachen rensats, värm upp den för att förkompilera mallar och konfiguration:

```bash
php bin/console cache:warmup --env=prod
```

## Cachningsstrategier

| Strategi | Beskrivning |
|----------|-------------|
| **OPcache** | PHP:s inbyggda opcode-cache. Se till att den är aktiverad i din `php.ini` med tillräckligt minne (`opcache.memory_consumption=256`). Detta är den enskilt mest effektfulla prestandaoptimeringen. |
| **APCu** | En minnesintern nyckel-värde-cache som används av Symfony för att lagra metadata. Installera PHP-tillägget APCu och konfigurera det i din Symfony-cachekonfiguration. |
| **Redis / Memcached** | För plattformar med hög trafik, konfigurera en extern cache-backend. Ställ in cache-adaptern i `config/packages/cache.yaml`. |

### Rekommenderade OPcache-inställningar

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

När `validate_timestamps` är satt till 0 måste du rensa OPcache efter att ny kod har driftsatts (starta om PHP-FPM eller anropa `opcache_reset()`).

## Lazy Loading

| Inställning | Beskrivning |
|---------|-------------|
| **Lazy-load images** | Aktiverar attributet `loading="lazy"` på bilder så att bilder utanför skärmen bara laddas när de rullas in i vy. Minskar den initiala sidladdningstiden. |
| **Deferred JavaScript loading** | Ladda icke-kritiska JavaScript-filer asynkront för att undvika att blockera sidrendering. |

## CDN (Content Delivery Network)

För plattformar som betjänar användare i flera geografiska regioner kan ett CDN avsevärt förbättra laddningstiderna för statiska tillgångar (CSS, JavaScript, bilder).

Så här konfigurerar du ett CDN:

1. Sätt upp en CDN-distribution (t.ex. CloudFront, Cloudflare eller en annan leverantör) som pekar mot din Chamilo-server.
2. Konfigurera bas-URL:en för tillgångar i din miljö eller Symfony-konfiguration så att statiska tillgångar serveras via CDN:et.
3. Ställ in lämpliga cache-huvuden för statiska filer (lång giltighetstid för versionshanterade tillgångar).

## Databasoptimering

| Åtgärd | Beskrivning |
|--------|-------------|
| **Use database connection pooling** | För plattformar med hög samtidighet, konfigurera anslutningspoolning för att minska overheaden av att etablera databasanslutningar. |
| **Optimize queries** | Chamilo inkluderar databasindex för vanliga frågor. Kör `ANALYZE TABLE` periodiskt på MySQL/MariaDB för att hålla frågeplaneraren statistik aktuell. |
| **Separate database server** | För stora installationer, kör databasen på en dedikerad server i stället för att dela resurser med webbservern. |

## Webbserverkonfiguration

| Optimering | Beskrivning |
|--------------|-------------|
| **Enable gzip/brotli compression** | Komprimera HTML-, CSS- och JavaScript-svar. De flesta webbservrar stöder detta inbyggt. |
| **Static file caching** | Ställ in långa `Cache-Control`- och `Expires`-huvuden för statiska tillgångar. |
| **PHP-FPM tuning** | Justera `pm.max_children`, `pm.start_servers` och `pm.max_requests` baserat på tillgängligt RAM och förväntad samtidighet. |
| **HTTP/2** | Aktivera HTTP/2 i din webbserver för multiplexade anslutningar och header-komprimering. |

## Tips

* **OPcache är den enskilt största vinsten** -- Se till att den är aktiverad och rätt dimensionerad innan du går vidare med andra optimeringar.
* **Kör aldrig produktion med `APP_ENV=dev`** -- Felsökningsverktygsfältet och profilern lägger till betydande overhead på varje begäran.
* **Övervaka innan du justerar** -- Använd verktyg som New Relic, Blackfire eller Symfonys inbyggda profiler (i dev-läge) för att identifiera faktiska flaskhalsar i stället för att gissa.
* **Värm upp cachen efter varje driftsättning** för att undvika att den första användaren träffar en långsam, ocachad begäran.