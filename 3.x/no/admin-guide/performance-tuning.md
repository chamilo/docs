# Ytelsesjustering

Ytelsesinnstillinger hjelper med å optimalisere Chamilo for raskere sidelasting og bedre ressursutnyttelse, særlig på plattformer med mange samtidige brukere.

> **Tilleggsreferanse**: Chamilo-installasjonen din inkluderer en utvidet optimaliseringsveiledning. Åpne `/documentation/optimization.html` i en nettleser (f.eks. `https://your-chamilo-site/documentation/optimization.html`) for anbefalinger på servernivå som er spesifikke for din versjon.

## Symfony Cache

Chamilo 3.0 er bygget på Symfony, som bruker en kompilert cache for ruting, avhengighetsinjeksjon og maler. Å administrere denne cachen er avgjørende for ytelsen.

### Tømme cachen

Etter konfigurasjonsendringer, utrulling eller oppgraderinger, tøm Symfony-cachen:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

I produksjon må du alltid sørge for at `APP_ENV=prod` er satt i `.env.local`-filen din. Utviklingsmiljøet (`APP_ENV=dev`) inkluderer omfattende feilsøkingskostnader og skal aldri brukes i produksjon.

### Cache-oppvarming

Etter at cachen er tømt, varm den opp for å forhåndskompilere maler og konfigurasjon:

```bash
php bin/console cache:warmup --env=prod
```

## Bufrestrategier

| Strategi | Beskrivelse |
|----------|-------------|
| **OPcache** | PHPs innebygde opcode-cache. Sørg for at den er aktivert i `php.ini` med tilstrekkelig minne (`opcache.memory_consumption=256`). Dette er den enkeltstående mest virkningsfulle ytelsesoptimaliseringen. |
| **APCu** | En nøkkel-verdi-cache i minnet som brukes av Symfony til å lagre metadata. Installer APCu PHP-utvidelsen og konfigurer den i Symfony-cachekonfigurasjonen. |
| **Redis / Memcached** | For plattformer med høy trafikk, konfigurer en ekstern cache-backend. Sett cache-adapteren i `config/packages/cache.yaml`. |

### Anbefalte OPcache-innstillinger

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Når `validate_timestamps` er satt til 0, må du tømme OPcache etter utrulling av ny kode (start PHP-FPM på nytt eller kall `opcache_reset()`).

## Lazy loading

| Innstilling | Beskrivelse |
|---------|-------------|
| **Lazy-load images** | Aktiverer attributtet `loading="lazy"` på bilder slik at bilder utenfor skjermen lastes først når de rulles inn i visningen. Reduserer innledende sidelastingstid. |
| **Deferred JavaScript loading** | Last ikke-kritiske JavaScript-filer asynkront for å unngå å blokkere siderendering. |

## CDN (Content Delivery Network)

For plattformer som betjener brukere i flere geografiske regioner kan et CDN betydelig forbedre lastetidene for statiske ressurser (CSS, JavaScript, bilder).

Slik konfigurerer du et CDN:

1. Sett opp en CDN-distribusjon (f.eks. CloudFront, Cloudflare eller en annen leverandør) som peker mot Chamilo-serveren din.
2. Konfigurer grunn-URL-en for ressurser i miljøet eller Symfony-konfigurasjonen slik at statiske ressurser serveres via CDN-et.
3. Sett passende cache-headere for statiske filer (lang utløpstid for versjonerte ressurser).

## Databaseoptimalisering

| Handling | Beskrivelse |
|--------|-------------|
| **Use database connection pooling** | For plattformer med høy samtidighet, konfigurer tilkoblingspooling for å redusere overhead ved etablering av databasetilkoblinger. |
| **Optimize queries** | Chamilo inkluderer databaseindekser for vanlige spørringer. Kjør `ANALYZE TABLE` periodisk på MySQL/MariaDB for å holde spørringsplanleggerens statistikk oppdatert. |
| **Separate database server** | For store installasjoner, kjør databasen på en dedikert server i stedet for å dele ressurser med webserveren. |

## Webserverkonfigurasjon

| Optimalisering | Beskrivelse |
|--------------|-------------|
| **Enable gzip/brotli compression** | Komprimer HTML-, CSS- og JavaScript-svar. De fleste webservere støtter dette innebygd. |
| **Static file caching** | Sett lange `Cache-Control`- og `Expires`-headere for statiske ressurser. |
| **PHP-FPM tuning** | Juster `pm.max_children`, `pm.start_servers` og `pm.max_requests` basert på tilgjengelig RAM og forventet samtidighet. |
| **HTTP/2** | Aktiver HTTP/2 i webserveren for multipleksede tilkoblinger og header-komprimering. |

## Tips

* **OPcache er den desidert største gevinsten** -- Sørg for at den er aktivert og riktig dimensjonert før du går videre med andre optimaliseringer.
* **Kjør aldri produksjon med `APP_ENV=dev`** -- Feilsøkingsverktøylinjen og profileren legger betydelig overhead på hver forespørsel.
* **Overvåk før du justerer** -- Bruk verktøy som New Relic, Blackfire eller Symfonys innebygde profiler (i dev-modus) for å identifisere faktiske flaskehalser i stedet for å gjette.
* **Varm opp cachen etter hver utrulling** for å unngå at den første brukeren treffer en treg, ubufret forespørsel.