# Cestini di riciclo per esercizi e percorsi di apprendimento

Chamilo 3.1 può archiviare i tentativi di esercizio eliminati e i dati di tracciamento dei percorsi di apprendimento, in modo che i docenti autorizzati possano ripristinarli, nel rispetto dei controlli di conservazione e di accesso configurati. I cestini di riciclo proteggono i dati di tracciamento; non sostituiscono i backup del database.

## Ripristinare un tentativo di esercizio

1. Aprire la pagina **Reporting** dell'esercizio interessato, con il corso o la sessione corretti selezionati.
2. Selezionare **Recycle bin** per visualizzare i tentativi archiviati.
3. Individuare il discente e il tentativo da recuperare.
4. Selezionare **Restore**, confermare e aggiornare il report per verificare risposte e punteggi.

È necessario disporre dell'autorizzazione a gestire i risultati degli esercizi. Il ripristino può essere bloccato quando l'esercizio è bloccato dal Gradebook o quando la piattaforma limita l'accesso dei docenti ai risultati.

## Ripristinare l'avanzamento di un percorso di apprendimento

1. Aprire la schermata di reporting del percorso di apprendimento pertinente per il corso/sessione previsti.
2. Aprire il relativo **Recycle bin**.
3. Selezionare l'avanzamento archiviato del discente e **Restore**.
4. Verificare l'avanzamento della lezione ripristinato e i tentativi di esercizio associati.

Quando un tentativo di esercizio fa parte di un archivio di percorso di apprendimento in sospeso, ripristinare prima l'archivio del percorso di apprendimento. Il ripristino individuale è deliberatamente bloccato per evitare un avanzamento incoerente.

## Conservazione e pulizia (amministratori)

L'impostazione `tracking.recycle_bin_retention_hours` controlla per quanto tempo gli archivi restano idonei al recupero. Il valore predefinito iniziale è di **30 giorni** (720 ore). Le installazioni esistenti devono sincronizzare la nuova impostazione tramite la migrazione di upsert delle impostazioni del progetto prima di attendersi che l'interfaccia di amministrazione la visualizzi.

Anteprima di una pulizia senza eliminare nulla:

```bash
php bin/console chamilo:recycle-bin:purge
```

L'eliminazione permanente richiede un'opzione esplicita:

```bash
php bin/console chamilo:recycle-bin:purge --execute
```

Il comando supporta `--hours` (override della conservazione), `--scan-limit`, `--after-lp-id` e `--after-exercise-id` per un'elaborazione controllata. Pianificarlo solo dopo aver verificato la politica di conservazione e le disposizioni di backup. Non esiste **alcuna pianificazione implicita di eliminazione automatica** solo perché la funzionalità è abilitata.

Vedere [Esercizi](exercises.md) e [Percorsi di apprendimento](../adding-content/learning-paths.md). Implementazione: [PR #9383](https://github.com/chamilo/chamilo-lms/pull/9383).