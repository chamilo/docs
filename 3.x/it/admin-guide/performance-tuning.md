# Ottimizzazione delle prestazioni

Le impostazioni di prestazioni aiutano a ottimizzare Chamilo per tempi di caricamento delle pagine più rapidi e un migliore utilizzo delle risorse, in particolare su piattaforme con molti utenti concorrenti.

> **Riferimento aggiuntivo**: l'installazione di Chamilo include una guida di ottimizzazione estesa. Aprire `/documentation/optimization.html` in un browser (ad es. `https://your-chamilo-site/documentation/optimization.html`) per raccomandazioni a livello di server specifiche per la propria versione.

## Cache Symfony

Chamilo 3.0 è basato su Symfony, che utilizza una cache compilata per routing, dependency injection e template. La gestione di questa cache è essenziale per le prestazioni.

### Svuotamento della cache

Dopo modifiche di configurazione, deployment o aggiornamenti, svuotare la cache Symfony:

```bash
# Clear cache for the current environment
php bin/console cache:clear

# For production environments specifically
php bin/console cache:clear --env=prod
```

In produzione, assicurarsi sempre che `APP_ENV=prod` sia impostato nel file `.env.local`. L'ambiente di sviluppo (`APP_ENV=dev`) include un notevole overhead di debug e non deve mai essere usato in produzione.

### Cache warmup

Dopo lo svuotamento della cache, eseguirne il warmup per precompilare template e configurazione:

```bash
php bin/console cache:warmup --env=prod
```

## Strategie di caching

| Strategia | Descrizione |
|----------|-------------|
| **OPcache** | Cache degli opcode integrata in PHP. Assicurarsi che sia abilitata in `php.ini` con memoria adeguata (`opcache.memory_consumption=256`). Si tratta dell'ottimizzazione delle prestazioni con il maggiore impatto. |
| **APCu** | Cache in-memory chiave-valore usata da Symfony per memorizzare i metadati. Installare l'estensione PHP APCu e configurarla nella configurazione della cache Symfony. |
| **Redis / Memcached** | Per piattaforme ad alto traffico, configurare un backend di cache esterno. Impostare l'adapter di cache in `config/packages/cache.yaml`. |

### Impostazioni OPcache consigliate

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Set to 0 in production for best performance
opcache.revalidate_freq=0
```

Quando `validate_timestamps` è impostato a 0, è necessario svuotare OPcache dopo il deployment di nuovo codice (riavviare PHP-FPM o chiamare `opcache_reset()`).

## Lazy loading

| Impostazione | Descrizione |
|---------|-------------|
| **Lazy-load delle immagini** | Abilita l'attributo `loading="lazy"` sulle immagini in modo che le immagini fuori schermo si carichino solo quando scorrono in vista. Riduce il tempo di caricamento iniziale della pagina. |
| **Caricamento JavaScript differito** | Carica i file JavaScript non critici in modo asincrono per evitare di bloccare il rendering della pagina. |

## CDN (Content Delivery Network)

Per piattaforme che servono utenti in più regioni geografiche, una CDN può migliorare in modo significativo i tempi di caricamento delle risorse statiche (CSS, JavaScript, immagini).

Per configurare una CDN:

1. Impostare una distribuzione CDN (ad es. CloudFront, Cloudflare o un altro provider) che punti al server Chamilo.
2. Configurare l'URL di base delle risorse nell'ambiente o nella configurazione Symfony in modo che le risorse statiche siano servite tramite la CDN.
3. Impostare header di cache appropriati per i file statici (scadenza lunga per le risorse versionate).

## Ottimizzazione del database

| Azione | Descrizione |
|--------|-------------|
| **Usare il connection pooling del database** | Per piattaforme ad alta concorrenza, configurare il connection pooling per ridurre l'overhead della creazione delle connessioni al database. |
| **Ottimizzare le query** | Chamilo include indici di database per le query comuni. Eseguire periodicamente `ANALYZE TABLE` su MySQL/MariaDB per mantenere aggiornate le statistiche del query planner. |
| **Server di database dedicato** | Per installazioni di grandi dimensioni, eseguire il database su un server dedicato anziché condividere le risorse con il web server. |

## Configurazione del web server

| Ottimizzazione | Descrizione |
|--------------|-------------|
| **Abilitare la compressione gzip/brotli** | Comprimere le risposte HTML, CSS e JavaScript. La maggior parte dei web server lo supporta nativamente. |
| **Caching dei file statici** | Impostare header `Cache-Control` e `Expires` lunghi per le risorse statiche. |
| **Tuning di PHP-FPM** | Regolare `pm.max_children`, `pm.start_servers` e `pm.max_requests` in base alla RAM disponibile e alla concorrenza attesa. |
| **HTTP/2** | Abilitare HTTP/2 nel web server per connessioni multiplexate e compressione degli header. |

## Consigli

* **OPcache è il singolo guadagno più grande** -- Assicurarsi che sia abilitato e dimensionato correttamente prima di perseguire altre ottimizzazioni.
* **Non eseguire mai la produzione con `APP_ENV=dev`** -- La toolbar di debug e il profiler aggiungono un overhead significativo a ogni richiesta.
* **Monitorare prima di ottimizzare** -- Usare strumenti come New Relic, Blackfire o il profiler integrato di Symfony (in modalità dev) per identificare i colli di bottiglia reali invece di procedere per tentativi.
* **Eseguire il warmup della cache dopo ogni deployment** per evitare che il primo utente incontri una richiesta lenta non in cache.