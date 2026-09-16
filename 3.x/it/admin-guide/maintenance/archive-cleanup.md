# Pulizia dell'archivio

Nel tempo, Chamilo accumula file temporanei nelle directory di cache e di archivio. Una pulizia regolare previene problemi di spazio su disco.

## Cosa si può pulire

* **File di upload temporanei** — File generati durante esportazione, importazione e altre operazioni, più i file di build obsoleti del frontend legacy
* **Cache dell'applicazione Symfony** — Container compilato, configurazione in cache e dati di routing. Questo *non* è coperto dall'azione del pannello di amministrazione descritta di seguito — vedere [Dalla riga di comando](#from-the-command-line).
* **Dati di sessione** — File di sessione PHP scaduti
* **File di log** — Vecchi file di log che non sono più necessari

## Esecuzione della pulizia

### Dal pannello di amministrazione

Andare su **Sistema > Pulisci i file temporanei** nel pannello di amministrazione (vedere [Strumenti di sistema](../system/system-tools.md#clean-temporary-files)). Riporta quanti file temporanei esistono e quanto spazio occupano, quindi consente di eliminare tutto oppure solo i file più vecchi di un'età scelta, con un'anteprima in dry-run. Cancella inoltre i file di build legacy obsoleti e rigenera gli asset CSS compilati.

Questa azione esclude deliberatamente le directory di cache di Symfony (`var/cache/dev`, `var/cache/prod`, `var/cache/test` e i pool di cache), quindi non farà sì che una modifica a `.env` o a `config/` abbia effetto — per questo usare la riga di comando.

### Dalla riga di comando

Per un controllo maggiore, e per svuotare effettivamente la cache dell'applicazione Symfony, usare i comandi della console Symfony:

```bash
# Clear the Symfony cache
php bin/console cache:clear

# Clear only the production cache
php bin/console cache:clear --env=prod
```

## Consigli

* **Pianificare pulizie regolari** — Impostare un cron job settimanale o mensile per cancellare i file temporanei
* **Monitorare l'uso del disco** — Tenere d'occhio la dimensione della directory `var/`, poiché cresce con i file di cache e di log
* **Prestare attenzione ai log** — Prima di eliminare i file di log, verificare se contengono informazioni che potrebbero servire per la risoluzione dei problemi