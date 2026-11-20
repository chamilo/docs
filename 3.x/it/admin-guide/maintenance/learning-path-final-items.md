# Completare gli elementi finali bloccati dei percorsi di apprendimento

L'ultimo passaggio di un percorso di apprendimento — la pagina «Congratulazioni» che contiene i blocchi del certificato e delle competenze — risulta completato solo quando un discente lo apre effettivamente. Un discente che termina ogni altro passaggio ma non prosegue fino a quell'ultima pagina resta bloccato per sempre appena sotto il 100% e, poiché l'idoneità al certificato di conseguimento (e l'assegnazione delle competenze) dipende dal raggiungimento del 100% nel percorso di apprendimento, non riceve mai un certificato o una competenza che ha altrimenti conseguito.

```bash
php bin/console chamilo:learning-path:complete-final-items [options]
```

Per ogni percorso di apprendimento della piattaforma il cui ultimo passaggio è di tipo **Final item**, il comando verifica ciascun discente con un tentativo in corso (inferiore al 100%) che ha completato ogni altro passaggio, in ogni corso e in ogni sessione che riutilizza il percorso di apprendimento. In tal caso, completa l'elemento finale esattamente come se il discente lo avesse aperto personalmente: registra la stessa visualizzazione dell'elemento, esegue lo stesso ricalcolo dell'avanzamento e attiva la stessa generazione del certificato e la stessa assegnazione delle competenze che produrrebbe una visita reale.

Come `chamilo:gradebook:process-achievement-certificates` (vedere
[Certificati di conseguimento](achievement-certificates.md)), opera in lotti delimitati, supporta un'esecuzione di prova e può essere ripreso in modo sicuro se interrotto: un discente il cui elemento finale è già completato non viene mai toccato di nuovo in un'esecuzione successiva.

## Opzioni

| Option                 | Purpose                                                                                                            |
| ----------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `--dry-run`             | Valuta e segnala senza completare nulla. Eseguire sempre questa opzione per prima.                                |
| `--sender-id=<id>`      | ID di un amministratore attivo della piattaforma, usato come creatore della risorsa quando il completamento di un elemento finale attiva la generazione del certificato o l'assegnazione delle competenze. Obbligatorio per un'esecuzione reale (non di prova). |
| `--limit=<n>`           | Numero massimo di elementi finali completati (o, in dry-run, segnalati) in una singola esecuzione. `0` = illimitato. Predefinito `500`. |
| `--scan-limit=<n>`      | Numero massimo di record di avanzamento dei discenti analizzati in una singola esecuzione, su tutti i percorsi di apprendimento. `0` = illimitato. Predefinito `5000`. |
| `--batch-size=<n>`      | Record di avanzamento dei discenti caricati per lotto di database, all'interno di un singolo percorso di apprendimento. Predefinito `50`. |
| `--lp-batch-size=<n>`   | Percorsi di apprendimento caricati per lotto di database. Predefinito `50`.                                        |
| `--after-lp-id=<id>`    | Riprende l'analisi dopo questo ID di percorso di apprendimento.                                                    |

## Esempi

Eseguire prima una prova sull'intera piattaforma, per vedere chi verrebbe completato:

```bash
php bin/console chamilo:learning-path:complete-final-items --dry-run
```

Esecuzione reale, con l'amministratore di ID 1 come creatore della risorsa:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1
```

Riprendere un'esecuzione interrotta dopo il percorso di apprendimento 480:

```bash
php bin/console chamilo:learning-path:complete-final-items --sender-id=1 --after-lp-id=480
```

## Codici di uscita

Il comando termina con uno stato di errore se almeno un elemento finale non è stato effettivamente completato durante un'esecuzione reale: la tabella di riepilogo indica il percorso di apprendimento, il discente e il motivo; il registro dell'applicazione contiene l'eccezione completa. Un discente correttamente escluso (elemento finale già completato, oppure un altro passaggio ancora incompleto) non costituisce un errore e non provoca mai un codice di uscita di errore.

## Punteggio del Gradebook dopo il completamento

Il punteggio mostrato per un percorso di apprendimento nella tabella del Gradebook non viene mai memorizzato: viene calcolato in tempo reale a partire dall'avanzamento corrente del discente ogni volta che la pagina viene caricata, quindi riflette immediatamente il 100%, senza alcun passaggio aggiuntivo.

Il **certificato** di un discente, se ne esisteva già uno prima del raggiungimento del 100% (con un punteggio precedente, più basso, incorporato), aggiorna il punteggio memorizzato e l'HTML visualizzato solo se la rigenerazione del certificato riesce quando questo comando completa l'elemento finale — la stessa chiamata che attiverebbe una visita reale. Se la generazione del certificato fallisce per qualsiasi motivo (vedere
[Certificati di conseguimento](achievement-certificates.md) per le cause comuni, ad esempio i permessi di archiviazione dei file), l'avanzamento del discente raggiunge comunque correttamente il 100% e la tabella del Gradebook continua a mostrarlo: solo il certificato resta con il vecchio punteggio e, poiché il comando non riesamina mai un discente già al 100%, non riproverà in un'esecuzione successiva. Rigenerare manualmente quel certificato (l'azione **Genera** nell'elenco dei certificati) una volta risolto il problema sottostante.

`--sender-id` esiste specificamente per evitare una causa comune di tale errore: completare un elemento finale al di fuori di una richiesta reale non fornisce un utente autenticato da registrare come creatore della risorsa del certificato e, in sua assenza, la generazione fallisce del tutto.