# Ydelsesoptimering

Ydelsesindstillinger hjælper med at optimere Chamilo til hurtigere sideindlæsning og bedre ressourceudnyttelse, især på platforme med mange samtidige brugere.

> **Yderligere reference**: Din Chamilo-installation indeholder en udvidet optimeringsvejledning. Åbn `/documentation/optimization.html` i en browser (f.eks. `https://your-chamilo-site/documentation/optimization.html`) for serveranbefalinger, der er specifikke for din version.

## Symfony-cache

Chamilo 3.0 er bygget på Symfony, som bruger en kompileret cache til routing, dependency injection og skabeloner. Administration af denne cache er afgørende for ydeevnen.

### Rydning af cachen

Efter konfigurationsændringer, udrulning eller opgraderinger skal du rydde Symfony-cachen:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

I produktion skal du altid sikre, at `APP_ENV=prod` er sat i din `.env.local`-fil. Udviklingsmiljøet (`APP_ENV=dev`) indeholder omfattende debugging-overhead og bør aldrig bruges i produktion.

### Cache-warmup

Efter rydning af cachen skal du varme den op for at forudkompilere skabeloner og konfiguration:

```bash
php bin/console cache:warmup --env=prod
```

## Cachingstrategier

| Strategi | Beskrivelse |
|----------|-------------|
| **OPcache** | PHP's indbyggede opcode-cache. Sørg for, at den er aktiveret i din `php.ini` med tilstrækkelig hukommelse (`opcache.memory_consumption=256`). Dette er den enkeltstående mest virkningsfulde ydelsesoptimering. |
| **APCu** | En in-memory nøgleværdi-cache, som Symfony bruger til at gemme metadata. Installer APCu PHP-udvidelsen, og konfigurer den i din Symfony-cachekonfiguration. |
| **Redis / Memcached** | Til platforme med høj trafik skal du konfigurere en ekstern cache-backend. Angiv cache-adapteren i `config/packages/cache.yaml`. |

### Anbefalede OPcache-indstillinger

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Når `validate_timestamps` er sat til 0, skal du rydde OPcache efter udrulning af ny kode (genstart PHP-FPM eller kald `opcache_reset()`).

## Lazy loading

| Indstilling | Beskrivelse |
|---------|-------------|
| **Lazy-load images** | Aktiverer attributten `loading="lazy"` på billeder, så billeder uden for skærmen først indlæses, når de rulles ind i visningen. Reducerer den indledende sideindlæsningstid. |
| **Deferred JavaScript loading** | Indlæs ikke-kritiske JavaScript-filer asynkront for at undgå at blokere siderendering. |

## CDN (Content Delivery Network)

For platforme, der betjener brugere på tværs af flere geografiske regioner, kan et CDN i væsentlig grad forbedre indlæsningstider for statiske aktiver (CSS, JavaScript, billeder).

Sådan konfigurerer du et CDN:

1. Opret en CDN-distribution (f.eks. CloudFront, Cloudflare eller en anden udbyder), der peger på din Chamilo-server.
2. Konfigurer asset-base-URL'en i dit miljø eller din Symfony-konfiguration, så statiske aktiver serveres via CDN'et.
3. Angiv passende cache-headers for statiske filer (lang udløbstid for versionerede aktiver).

## Databaseoptimering

| Handling | Beskrivelse |
|--------|-------------|
| **Use database connection pooling** | Til platforme med høj samtidighed skal du konfigurere connection pooling for at reducere overhead ved etablering af databaseforbindelser. |
| **Optimize queries** | Chamilo indeholder databaseindekser til almindelige forespørgsler. Kør `ANALYZE TABLE` periodisk på MySQL/MariaDB for at holde query planner-statistikken aktuel. |
| **Separate database server** | Til store installationer skal du køre databasen på en dedikeret server i stedet for at dele ressourcer med webserveren. |

## Webserverkonfiguration

| Optimering | Beskrivelse |
|--------------|-------------|
| **Enable gzip/brotli compression** | Komprimer HTML-, CSS- og JavaScript-svar. De fleste webservere understøtter dette nativt. |
| **Static file caching** | Angiv lange `Cache-Control`- og `Expires`-headers for statiske aktiver. |
| **PHP-FPM tuning** | Juster `pm.max_children`, `pm.start_servers` og `pm.max_requests` ud fra tilgængelig RAM og forventet samtidighed. |
| **HTTP/2** | Aktiver HTTP/2 i din webserver for multiplexede forbindelser og header-komprimering. |

## Tips

* **OPcache er den største enkeltgevinst** -- Sørg for, at den er aktiveret og korrekt dimensioneret, før du går videre med andre optimeringer.
* **Kør aldrig produktion med `APP_ENV=dev`** -- Debug-værktøjslinjen og profileren tilføjer betydelig overhead til hver anmodning.
* **Overvåg før du tuner** -- Brug værktøjer som New Relic, Blackfire eller Symfony's indbyggede profiler (i dev-tilstand) til at identificere faktiske flaskehalse i stedet for at gætte.
* **Varm cachen op efter hver udrulning** for at undgå, at den første bruger rammer en langsom, ikke-cachet anmodning.