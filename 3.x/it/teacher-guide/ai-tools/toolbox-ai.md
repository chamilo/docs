# Cassetta degli attrezzi IA

La **Cassetta degli attrezzi IA** è uno strumento del corso che genera applicazioni educative interattive a partire dalle istruzioni di un docente. Chamilo impacchetta ogni applicazione generata come **SCORM 1.2**, in modo che i progressi, il punteggio e i dati di ripresa dell'apprendente siano tracciati dalla piattaforma.

> L'amministratore deve abilitare sia `ai_helpers.enable_ai_helpers` sia `ai_helpers.toolbox` in **Amministrazione > Impostazioni di configurazione > Assistenti IA**, e deve essere configurato almeno un fornitore di IA testuale.

## Creazione di un'applicazione interattiva

1. Aprire **Cassetta degli attrezzi IA** nel corso.
2. Fare clic su **Crea**.
3. Inserire un **Titolo** e, facoltativamente, una **Descrizione**.
4. In **Cosa deve fare l'applicazione?**, descrivere l'attività completa desiderata. Includere l'obiettivo di apprendimento, le regole, i livelli, il punteggio e ciò che deve accadere quando l'apprendente termina.
5. Scegliere il **fornitore di IA** quando ne è disponibile più di uno.
6. Fare clic su **Genera**.

La prima generazione viene memorizzata come **versione 1**. Inizia come bozza, così è possibile visualizzarla in anteprima prima di renderla visibile agli apprendenti.

## Miglioramento e versionamento

Aprire le **Impostazioni** di un'applicazione per gestirla. È possibile:

* visualizzare in anteprima o scaricare l'applicazione corrente;
* usare **Migliora con l'IA** per descrivere una modifica e generare una nuova versione;
* consultare la **Cronologia delle versioni**;
* visualizzare in anteprima, scaricare o ripristinare una versione precedente;
* pubblicare o nascondere l'applicazione;
* aprire **Reportistica** per esaminare il tracciamento degli apprendenti.

La generazione di un miglioramento non elimina le versioni precedenti. Il ripristino di una versione precedente rende di nuovo corrente quella versione.

## Aggiunta di un'applicazione a un percorso di apprendimento

Nel [costruttore di percorsi di apprendimento](../adding-content/learning-paths.md), i docenti possono selezionare un'applicazione generata dalla Cassetta degli attrezzi IA come risorsa. L'applicazione deve avere una versione generata, ma non è necessario che sia pubblicata prima che il docente la aggiunga al percorso di apprendimento. Un'applicazione non pubblicata non è comunque disponibile per gli apprendenti finché non viene pubblicata.

Quando un docente autorizzato apre il contenuto della Cassetta degli attrezzi in **modalità Anteprima**, Chamilo visualizza **“I progressi e il punteggio non vengono salvati in modalità anteprima.”** Testare l'attività in questo modo non crea tracciamento degli apprendenti né aggiorna un punteggio. Usare l'esperienza normale dell'apprendente per verificare i progressi e i punteggi SCORM dopo la pubblicazione.

## Validazione della generazione e risoluzione dei problemi

Dopo la generazione tramite IA, Chamilo verifica il codice sorgente dell'applicazione generata prima di rendere disponibile una versione. Ciò include controlli di sintassi o struttura JavaScript e restrizioni sulle API del browser non sicure. Se la validazione non riesce, Chamilo chiede al fornitore di IA di **riparare il risultato una sola volta**; se anche la versione riparata non supera la validazione, la generazione si interrompe con un errore. Una validazione riuscita non sostituisce la verifica delle regole di apprendimento dell'attività, dell'accessibilità e del punteggio SCORM prima della pubblicazione.

Se la generazione segnala **HTTP 504**, il server web o il gateway ha smesso di attendere la richiesta. Questo è diverso da un timeout imposto dal fornitore di IA testuale. L'errore può includere il tempo approssimativo trascorso; provare una richiesta di attività più semplice e chiedere all'amministratore di controllare i timeout del gateway, di PHP/server web e del fornitore. Un timeout del fornitore o un errore di limite di frequenza richiede invece di controllare il modello configurato e le impostazioni del fornitore. Non presumere che l'applicazione sia stata salvata correttamente dopo un errore.

Questi miglioramenti di validazione e diagnostica sono stati introdotti nella [PR #9198](https://github.com/chamilo/chamilo-lms/pull/9198).

## Esperienza dell'apprendente

Gli apprendenti vedono solo le applicazioni che sono state pubblicate. Dalla Cassetta degli attrezzi possono aprire un'applicazione, riprendere dal loro ultimo stato SCORM e vedere i propri **Progressi** e il **Punteggio**. Quando è consentito un nuovo tentativo, **Riprova** avvia un tentativo nuovo.

Le applicazioni della Cassetta degli attrezzi vengono eseguite all'interno del runtime del percorso di apprendimento in un iframe limitato e riportano il proprio stato SCORM a Chamilo. Sono gestite dalla Cassetta degli attrezzi anziché dall'elenco normale dei percorsi di apprendimento.

I client MCP autorizzati possono inoltre creare o aggiornare le applicazioni della Cassetta degli attrezzi quando sono abilitate le stesse impostazioni della Cassetta degli attrezzi IA.