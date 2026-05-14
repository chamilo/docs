# Ottimizzazione delle Prestazioni

Le impostazioni di prestazione aiutano a ottimizzare Chamilo per caricamenti di pagina più rapidi e un migliore utilizzo delle risorse, specialmente su piattaforme con molti utenti simultanei.

> **Riferimento aggiuntivo**: La tua installazione di Chamilo include una guida estesa all'ottimizzazione. Apri `/documentation/optimization.html` in un browser (ad esempio `https://your-chamilo-site/documentation/optimization.html`) per raccomandazioni a livello di server specifiche per la tua versione.

## Cache di Symfony

Chamilo 2.0 è costruito su Symfony, che utilizza una cache compilata per il routing, l'iniezione delle dipendenze e i template. Gestire questa cache è essenziale per le prestazioni.

### Pulizia della Cache

Dopo modifiche alla configurazione, distribuzioni o aggiornamenti, pulisci la cache di Symfony:

```bash
# Pulisci la cache per l'ambiente corrente
php bin/console cache:clear

# Specificamente per ambienti di produzione
php bin/console cache:clear --env=prod
```

In produzione, assicurati sempre che `APP_ENV=prod` sia impostato nel tuo file `.env.local`. L'ambiente di sviluppo (`APP_ENV=dev`) include un overhead di debug estensivo e non dovrebbe mai essere utilizzato in produzione.

### Riscaldamento della Cache

Dopo aver pulito la cache, riscaldala per pre-compilare i template e la configurazione:

```bash
php bin/console cache:warmup --env=prod
```

## Strategie di Caching

| Strategia | Descrizione |
|----------|-------------|
| **OPcache** | Cache di opcode integrata in PHP. Assicurati che sia abilitata nel tuo `php.ini` con memoria adeguata (`opcache.memory_consumption=256`). Questa è l'ottimizzazione delle prestazioni più impactful. |
| **APCu** | Una cache chiave-valore in memoria utilizzata da Symfony per memorizzare metadati. Installa l'estensione PHP APCu e configurala nella configurazione della cache di Symfony. |
| **Redis / Memcached** | Per piattaforme ad alto traffico, configura un backend di cache esterno. Imposta l'adattatore della cache in `config/packages/cache.yaml`. |

### Impostazioni Consigliate per OPcache

```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.max_accelerated_files=20000
opcache.validate_timestamps=0   ; Imposta a 0 in produzione per le migliori prestazioni
opcache.revalidate_freq=0
```

Quando `validate_timestamps` è impostato a 0, devi pulire OPcache dopo aver distribuito nuovo codice (riavvia PHP-FPM o chiama `opcache_reset()`).

## Caricamento Pigro (Lazy Loading)

| Impostazione | Descrizione |
|---------|-------------|
| **Caricamento pigro delle immagini** | Abilita l'attributo `loading="lazy"` sulle immagini in modo che le immagini fuori schermo vengano caricate solo quando entrano nel campo visivo. Riduce il tempo di caricamento iniziale della pagina. |
| **Caricamento differito di JavaScript** | Carica i file JavaScript non critici in modo asincrono per evitare di bloccare il rendering della pagina. |

## CDN (Content Delivery Network)

Per piattaforme che servono utenti in diverse regioni geografiche, un CDN può migliorare significativamente i tempi di caricamento per le risorse statiche (CSS, JavaScript, immagini).

Per configurare un CDN:

1. Configura una distribuzione CDN (ad esempio, CloudFront, Cloudflare o un altro provider) che punti al tuo server Chamilo.
2. Configura l'URL di base delle risorse nel tuo ambiente o nella configurazione di Symfony in modo che le risorse statiche vengano servite tramite il CDN.
3. Imposta intestazioni di cache appropriate per i file statici (scadenza lunga per risorse versionate).

## Ottimizzazione del Database

| Azione | Descrizione |
|--------|-------------|
| **Utilizza il pooling delle connessioni al database** | Per piattaforme ad alta concorrenza, configura il pooling delle connessioni per ridurre l'overhead di stabilire connessioni al database. |
| **Ottimizza le query** | Chamilo include indici di database per le query comuni. Esegui `ANALYZE TABLE` periodicamente su MySQL/MariaDB per mantenere aggiornate le statistiche del pianificatore di query. |
| **Server di database separato** | Per installazioni di grandi dimensioni, esegui il database su un server dedicato invece di condividere risorse con il server web. |

## Configurazione del Server Web

| Ottimizzazione | Descrizione |
|--------------|-------------|
| **Abilita la compressione gzip/brotli** | Comprimi le risposte HTML, CSS e JavaScript. La maggior parte dei server web supporta questa funzionalità nativamente. |
| **Caching dei file statici** | Imposta intestazioni `Cache-Control` e `Expires` lunghe per le risorse statiche. |
| **Ottimizzazione di PHP-FPM** | Regola `pm.max_children`, `pm.start_servers` e `pm.max_requests` in base alla RAM disponibile e alla concorrenza attesa. |
| **HTTP/2** | Abilita HTTP/2 nel tuo server web per connessioni multiplex e compressione delle intestazioni. |

## Suggerimenti

* **OPcache è il miglioramento più significativo** -- Assicurati che sia abilitato e dimensionato correttamente prima di perseguire altre ottimizzazioni.
* **Non eseguire mai la produzione con `APP_ENV=dev`** -- La barra degli strumenti di debug e il profiler aggiungono un overhead significativo a ogni richiesta.
* **Monitora prima di ottimizzare** -- Usa strumenti come New Relic, Blackfire o il profiler integrato di Symfony (in modalità dev) per identificare i veri colli di bottiglia invece di fare supposizioni.
* **Riscalda la cache dopo ogni distribuzione** per evitare che il primo utente incontri una richiesta lenta non memorizzata nella cache.