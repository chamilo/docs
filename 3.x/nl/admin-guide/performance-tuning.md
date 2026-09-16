# Prestatie-optimalisatie

Prestatie-instellingen helpen Chamilo te optimaliseren voor snellere paginaladingen en een beter gebruik van resources, vooral op platforms met veel gelijktijdige gebruikers.

> **Aanvullende referentie**: Uw Chamilo-installatie bevat een uitgebreide optimalisatiegids. Open `/documentation/optimization.html` in een browser (bijv. `https://your-chamilo-site/documentation/optimization.html`) voor aanbevelingen op serverniveau die specifiek zijn voor uw versie.

## Symfony-cache

Chamilo 3.0 is gebouwd op Symfony, dat een gecompileerde cache gebruikt voor routing, dependency injection en templates. Het beheren van deze cache is essentieel voor de prestaties.

### De cache legen

Na configuratiewijzigingen, deployment of upgrades, leegt u de Symfony-cache:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

Zorg er in productie altijd voor dat `APP_ENV=prod` is ingesteld in uw `.env.local`-bestand. De ontwikkelomgeving (`APP_ENV=dev`) bevat uitgebreide debugging-overhead en mag nooit in productie worden gebruikt.

### Cache-warmup

Na het legen van de cache, warmt u deze op om templates en configuratie vooraf te compileren:

```bash
php bin/console cache:warmup --env=prod
```

## Cachingstrategieën

| Strategie | Beschrijving |
|----------|-------------|
| **OPcache** | De ingebouwde opcode-cache van PHP. Zorg dat deze is ingeschakeld in uw `php.ini` met voldoende geheugen (`opcache.memory_consumption=256`). Dit is de enkele meest impactvolle prestatie-optimalisatie. |
| **APCu** | Een in-memory key-value-cache die door Symfony wordt gebruikt voor het opslaan van metadata. Installeer de APCu PHP-extensie en configureer deze in uw Symfony-cacheconfiguratie. |
| **Redis / Memcached** | Voor platforms met veel verkeer, configureer een externe cache-backend. Stel de cache-adapter in in `config/packages/cache.yaml`. |

### Aanbevolen OPcache-instellingen

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Wanneer `validate_timestamps` op 0 is gezet, moet u OPcache legen na het deployen van nieuwe code (herstart PHP-FPM of roep `opcache_reset()` aan).

## Lazy loading

| Instelling | Beschrijving |
|---------|-------------|
| **Lazy-load images** | Schakelt het attribuut `loading="lazy"` in op afbeeldingen zodat afbeeldingen buiten het scherm pas laden wanneer ze in beeld scrollen. Vermindert de initiële laadtijd van de pagina. |
| **Deferred JavaScript loading** | Laad niet-kritieke JavaScript-bestanden asynchroon om het renderen van de pagina niet te blokkeren. |

## CDN (Content Delivery Network)

Voor platforms die gebruikers in meerdere geografische regio's bedienen, kan een CDN de laadtijden van statische assets (CSS, JavaScript, afbeeldingen) aanzienlijk verbeteren.

Om een CDN te configureren:

1. Stel een CDN-distributie in (bijv. CloudFront, Cloudflare of een andere provider) die naar uw Chamilo-server wijst.
2. Configureer de asset-basis-URL in uw omgeving of Symfony-configuratie zodat statische assets via het CDN worden geserveerd.
3. Stel passende cache-headers in voor statische bestanden (lange vervaltermijn voor geversioneerde assets).

## Database-optimalisatie

| Actie | Beschrijving |
|--------|-------------|
| **Use database connection pooling** | Voor platforms met hoge concurrency, configureer connection pooling om de overhead van het opzetten van databaseverbindingen te verminderen. |
| **Optimize queries** | Chamilo bevat database-indexen voor veelvoorkomende queries. Voer periodiek `ANALYZE TABLE` uit op MySQL/MariaDB om de statistieken van de query planner actueel te houden. |
| **Separate database server** | Voor grote installaties, draai de database op een dedicated server in plaats van resources te delen met de webserver. |

## Webserverconfiguratie

| Optimalisatie | Beschrijving |
|--------------|-------------|
| **Enable gzip/brotli compression** | Comprimeer HTML-, CSS- en JavaScript-responses. De meeste webservers ondersteunen dit native. |
| **Static file caching** | Stel lange `Cache-Control`- en `Expires`-headers in voor statische assets. |
| **PHP-FPM tuning** | Pas `pm.max_children`, `pm.start_servers` en `pm.max_requests` aan op basis van beschikbaar RAM en verwachte concurrency. |
| **HTTP/2** | Schakel HTTP/2 in op uw webserver voor multiplexed connections en headercompressie. |

## Tips

* **OPcache is de grootste winst** -- Zorg dat deze is ingeschakeld en correct bemeten voordat u andere optimalisaties nastreeft.
* **Draai nooit productie met `APP_ENV=dev`** -- De debug-toolbar en profiler voegen aanzienlijke overhead toe aan elk request.
* **Monitor voordat u tunet** -- Gebruik tools zoals New Relic, Blackfire of de ingebouwde profiler van Symfony (in dev-modus) om daadwerkelijke knelpunten te identificeren in plaats van te gissen.
* **Warm de cache op na elke deployment** om te voorkomen dat de eerste gebruiker een traag, niet-gecached request treft.