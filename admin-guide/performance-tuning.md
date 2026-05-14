# Prestatieoptimalisatie

Prestatie-instellingen helpen Chamilo te optimaliseren voor snellere laadtijden van pagina's en beter gebruik van bronnen, vooral op platforms met veel gelijktijdige gebruikers.

> **Aanvullende referentie**: Uw Chamilo-installatie bevat een uitgebreide optimalisatiegids. Open `/documentation/optimization.html` in een browser (bijv. `https://uw-chamilo-site/documentation/optimization.html`) voor server-specifieke aanbevelingen die horen bij uw versie.

## Symfony Cache

Chamilo 2.0 is gebouwd op Symfony, dat een gecompileerde cache gebruikt voor routing, dependency injection en sjablonen. Het beheren van deze cache is essentieel voor prestaties.

### Cache Leegmaken

Na configuratiewijzigingen, implementatie of upgrades, leeg de Symfony-cache:

```bash
# Cache leegmaken voor de huidige omgeving
php bin/console cache:clear

# Specifiek voor productieomgevingen
php bin/console cache:clear --env=prod
```

Zorg er in productie altijd voor dat `APP_ENV=prod` is ingesteld in uw `.env.local`-bestand. De ontwikkelomgeving (`APP_ENV=dev`) bevat uitgebreide debugging-overhead en mag nooit in productie worden gebruikt.

### Cache Opwarmen

Na het leegmaken van de cache, warm deze op om sjablonen en configuratie vooraf te compileren:

```bash
php bin/console cache:warmup --env=prod
```

## Cachestrategieën

| Strategie | Beschrijving |
|-----------|--------------|
| **OPcache** | PHP's ingebouwde opcode-cache. Zorg ervoor dat deze is ingeschakeld in uw `php.ini` met voldoende geheugen (`opcache.memory_consumption=256`). Dit is de meest impactvolle prestatieoptimalisatie. |
| **APCu** | Een in-memory key-value cache die door Symfony wordt gebruikt voor het opslaan van metadata. Installeer de APCu PHP-extensie en configureer deze in uw Symfony-cacheconfiguratie. |
| **Redis / Memcached** | Voor platforms met veel verkeer, configureer een externe cache-backend. Stel de cache-adapter in in `config/packages/cache.yaml`. |

### Aanbevolen OPcache-instellingen

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Stel in op 0 in productie voor de beste prestaties
opcache.revalidate_freq=0
```

Wanneer `validate_timestamps` is ingesteld op 0, moet u OPcache leegmaken na het implementeren van nieuwe code (start PHP-FPM opnieuw of roep `opcache_reset()` aan).

## Lazy Loading

| Instelling | Beschrijving |
|------------|--------------|
| **Lazy-load afbeeldingen** | Schakelt het attribuut `loading="lazy"` in op afbeeldingen, zodat afbeeldingen buiten het scherm pas worden geladen wanneer ze in beeld worden gescrolld. Vermindert de initiële laadtijd van pagina's. |
| **Uitgestelde JavaScript-lading** | Laad niet-kritieke JavaScript-bestanden asynchroon om het blokkeren van paginarendering te vermijden. |

## CDN (Content Delivery Network)

Voor platforms die gebruikers in meerdere geografische regio's bedienen, kan een CDN de laadtijden voor statische assets (CSS, JavaScript, afbeeldingen) aanzienlijk verbeteren.

Om een CDN te configureren:

1. Stel een CDN-distributie in (bijv. CloudFront, Cloudflare of een andere provider) die verwijst naar uw Chamilo-server.
2. Configureer de basis-URL voor assets in uw omgeving of Symfony-configuratie, zodat statische assets via de CDN worden geserveerd.
3. Stel geschikte cache-headers in voor statische bestanden (lange vervaltijd voor versiebepaalde assets).

## Databaseoptimalisatie

| Actie | Beschrijving |
|-------|--------------|
| **Gebruik databaseverbindingspooling** | Voor platforms met hoge gelijktijdigheid, configureer verbindingspooling om de overhead van het opzetten van databaseverbindingen te verminderen. |
| **Optimaliseer queries** | Chamilo bevat database-indexen voor veelvoorkomende queries. Voer periodiek `ANALYZE TABLE` uit op MySQL/MariaDB om de statistieken van de queryplanner actueel te houden. |
| **Aparte databaseserver** | Voor grote installaties, draai de database op een dedicated server in plaats van middelen te delen met de webserver. |

## Webserverconfiguratie

| Optimalisatie | Beschrijving |
|---------------|--------------|
| **Schakel gzip/brotli-compressie in** | Comprimeer HTML-, CSS- en JavaScript-responsen. De meeste webservers ondersteunen dit standaard. |
| **Statische bestandscache** | Stel lange `Cache-Control`- en `Expires`-headers in voor statische assets. |
| **PHP-FPM-tuning** | Pas `pm.max_children`, `pm.start_servers` en `pm.max_requests` aan op basis van beschikbare RAM en verwachte gelijktijdigheid. |
| **HTTP/2** | Schakel HTTP/2 in op uw webserver voor gemultiplexte verbindingen en headercompressie. |

## Tips

* **OPcache is de grootste winst** -- Zorg ervoor dat deze is ingeschakeld en correct is gedimensioneerd voordat u andere optimalisaties nastreeft.
* **Draai nooit productie met `APP_ENV=dev`** -- De debug-toolbar en profiler voegen aanzienlijke overhead toe aan elk verzoek.
* **Monitor voordat u optimaliseert** -- Gebruik tools zoals New Relic, Blackfire of Symfony's ingebouwde profiler (in dev-modus) om echte knelpunten te identificeren in plaats van te gissen.
* **Warm de cache op na elke implementatie** om te voorkomen dat de eerste gebruiker een trage, niet-gecachete aanvraag treft.