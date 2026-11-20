# Integrità dei file

*Novità in Chamilo 3.0.*

L'integrità dei file confronta i file installati sul server con una baseline attendibile, per rilevare aggiunte, modifiche, cancellazioni e cambiamenti di permessi non previsti — il tipo di variazione che un'intrusione riuscita, una dipendenza compromessa o una modifica manuale errata lascerebbero dietro di sé.

## Accesso all'integrità dei file

Dal pannello di amministrazione, fare clic su **Sicurezza > Integrità dei file**.

## Cosa mostra

![La pagina Integrità dei file con le informazioni sull'ultima scansione, i riquadri per i file Aggiunti, Modificati, Eliminati e con Permessi modificati, un elenco della Cronologia degli avvisi e le Azioni per avviare una scansione, sospendere gli avvisi o stabilire una nuova baseline](/.gitbook/assets/admin-security-file-integrity.png)

* **Ultima scansione** — Quando è stata eseguita la scansione più recente e quanti file ha controllato
* **Aggiunti / Modificati / Eliminati** — File che differiscono dalla baseline, identificati confrontando i checksum SHA-256 (ogni elenco è limitato a 500 percorsi, con una nota se l'elenco completo è più lungo — vedere il log CEF sotto per l'elenco completo)
* **Permessi modificati** — File i cui permessi differiscono dalla baseline. Su Linux, questo confronta direttamente i bit di modalità POSIX (ad esempio, un file che diventa scrivibile da tutti viene segnalato); su Windows, viene tracciato solo l'attributo di sola lettura, poiché `fileperms()` non riflette i veri ACL NTFS
* **Cronologia degli avvisi** — Un registro duraturo, solo in append, di ogni scansione che ha trovato qualcosa (fino alle ultime 50). A differenza del report sopra, questo elenco non viene mai cancellato da una scansione pulita o da una nuova baseline, quindi gli avvisi passati restano visibili anche dopo che lo scostamento segnalato è stato risolto

Il controllo percorre l'intero albero dei file installati eccetto le directory `var/` e `.git/` — con un'eccezione: `.git/config` viene comunque osservato individualmente, in particolare per intercettare un remote Git reindirizzato silenziosamente verso un server ostile. I collegamenti simbolici non vengono mai seguiti, per evitare loop di attraversamento o l'uscita dalla directory di installazione.

Poiché una scansione completa di un'installazione di grandi dimensioni può richiedere diversi minuti, l'attraversamento è suddiviso in blocchi (una directory di primo livello alla volta) e il suo avanzamento è tracciato in un file di lock — così la pagina può essere ricaricata in sicurezza per verificare i progressi, e una scansione interrotta o terminata non viene mai scambiata per una ancora in esecuzione.

## Azioni

* **Esegui una scansione ora** — Confronta immediatamente l'albero dei file corrente con la baseline
* **Sospendi per 1 ora** — Sospende temporaneamente gli avvisi (ad esempio, mentre si distribuisce un aggiornamento). Richiede di reinserire la propria password. Durante la sospensione, una scansione adotta silenziosamente l'albero corrente come nuova baseline invece di generare avvisi, così la finestra di sospensione si chiude senza avvisi residui. La sospensione massima è di 24 ore
* **Stabilisci una nuova baseline** — Adotta l'albero dei file corrente come nuovo riferimento attendibile. Richiede di reinserire la propria password

Sospendere gli avvisi o stabilire una nuova baseline può nascondere un'intrusione in corso, ed è per questo che entrambe le azioni richiedono di nuovo la password — una sessione di amministrazione dirottata da sola non basta a silenziare il rilevamento mentre i file vengono manomessi.

## Esecuzione da Cron

Gli stessi controlli sono disponibili come comandi della console, pensati per essere pianificati con cron piuttosto che eseguiti dalla pagina di amministrazione secondo una pianificazione:

```bash
# Scan for drift and alert admins if anything changed
0 3 * * * cd /var/www/chamilo/master && php bin/console app:file-integrity:scan

# Generate or regenerate the baseline (run once after install, or after a manual update)
php bin/console app:file-integrity:baseline

# Pause alerting from the command line (prompts for a global administrator's username and password)
php bin/console app:file-integrity:snooze
```

Se è attiva una sospensione, `app:file-integrity:scan` ricalcola silenziosamente la baseline invece di generare avvisi, in linea con il comportamento di una scansione avviata dalla pagina di amministrazione.

## Impostazioni

Un'impostazione correlata si trova in **Impostazioni di configurazione > Sicurezza**:

* **`file_integrity_check_notify_admins`** — Un elenco di indirizzi e-mail da notificare quando viene rilevato uno scostamento; se lasciato vuoto, viene notificato ogni Amministratore globale

## Integrazione SIEM

Ogni scansione scrive inoltre righe di log CEF (Common Event Format) in `var/logs/security/file_integrity.log`, adatte all'ingestione da parte di un SIEM (Wazuh, Splunk, QRadar, ArcSight, Elastic/Filebeat e strumenti analoghi). Ogni riga è contrassegnata da un ID di firma che identifica il tipo di modifica:

| Firma | Significato |
|-----------|---------|
| `FIM-ADDED` | È comparso un nuovo file |
| `FIM-MODIFIED` | Il contenuto di un file è cambiato |
| `FIM-DELETED` | Un file è scomparso |
| `FIM-GITCONFIG` | `.git/config` è cambiato (possibile remote dirottato) |
| `FIM-PERMS` | I permessi di un file sono cambiati |
| `FIM-TRUNCATED` | Il report per una categoria è stato limitato; consultare il log per l'elenco completo |

## Uso consigliato

1. Stabilire una baseline subito dopo l'installazione e di nuovo dopo ogni aggiornamento o distribuzione manuale
2. Pianificare `app:file-integrity:scan` in cron (ad esempio, ogni notte)
3. Prima di una finestra di manutenzione pianificata che modificherà i file (un aggiornamento, una migrazione), usare **Pausa per 1 ora** invece di rimuovere del tutto il job cron
4. Inviare `var/logs/security/file_integrity.log` al sistema di monitoraggio dei log o al SIEM esistente, se ne si dispone di uno