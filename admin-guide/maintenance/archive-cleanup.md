# Pulizia dell'Archivio

Nel tempo, Chamilo accumula file temporanei nelle sue directory di cache e archivio. Una pulizia regolare previene problemi di spazio su disco.

## Cosa Può Essere Pulito

* **Cache di Symfony** — Modelli compilati, configurazione in cache e dati di instradamento
* **File temporanei** — File generati durante l'esportazione, l'importazione e altre operazioni
* **Dati di sessione** — File di sessione PHP scaduti
* **File di log** — Vecchi file di log che non sono più necessari

## Esecuzione della Pulizia

### Dal Pannello di Amministrazione

Naviga su **Pulizia dell'archivio** nel pannello di amministrazione. Fai clic sul pulsante di pulizia per rimuovere i file temporanei.

### Dalla Riga di Comando

Per un maggiore controllo, utilizza i comandi della console di Symfony:

```bash
# Cancella la cache di Symfony
php bin/console cache:clear

# Cancella solo la cache di produzione
php bin/console cache:clear --env=prod
```

## Suggerimenti

* **Pianifica pulizie regolari** — Imposta un lavoro cron settimanale o mensile per cancellare i file temporanei
* **Monitora l'uso del disco** — Tieni d'occhio la dimensione della directory `var/`, poiché cresce con i file di cache e di log
* **Fai attenzione ai log** — Prima di eliminare i file di log, verifica se contengono informazioni che potrebbero essere utili per la risoluzione dei problemi