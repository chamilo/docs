# Controllo versione

Il Controllo versione indica se l'installazione di Chamilo è aggiornata e — se si aderisce — registra la piattaforma presso il progetto Chamilo in modo che possa essere conteggiata nelle statistiche di utilizzo aggregate.

## Due livelli di controllo

**Non registrato (stato predefinito):** Chamilo tenta comunque di contattare `version.chamilo.org` per confrontare la versione installata con l'ultima release, utilizzando nient'altro che la richiesta stessa — non vengono inviati dettagli sulla piattaforma. Il blocco mostra un modulo di registrazione che spiega cosa aggiunge la registrazione, più un pulsante **"Abilita controllo versione"** e una casella **"Nascondi il campus dall'elenco delle piattaforme pubbliche"**.

**Registrato:** Fare clic su "Abilita controllo versione" modifica soltanto due impostazioni locali — di per sé non invia nulla. Da quel momento, ogni volta che questo blocco della dashboard viene caricato, la piattaforma invia una richiesta a `version.chamilo.org` che include:

| Dati inviati | Scopo dichiarato |
|-----------|-----------------|
| URL e nome del sito della piattaforma | Identifica quale portale sta effettuando il check-in |
| E-mail di contatto dell'amministratore | Esplicitamente affinché il team Chamilo possa raggiungere gli amministratori in caso di problemi di sicurezza critici |
| Versione installata | Per determinare se si è aggiornati |
| Conteggio di corsi, utenti, utenti attivi e sessioni | Aggregati in statistiche non personali su `stats.chamilo.org` |
| Nome dell'organizzazione e lingua dell'interfaccia | Solo aggregazione demografica |
| Nome dell'amministratore | Inviato, sebbene il suo scopo non sia chiaramente documentato nel codice stesso |
| Indirizzo IP del server | Utilizzato per approssimare la posizione della piattaforma su una mappa globale delle installazioni |
| Flag "Non elencare il campus", packager e un ID univoco dell'istanza | Controlla se si compare nella directory pubblica e identifica i check-in ripetuti dalla stessa installazione |

Se si lascia deselezionata **"Nascondi il campus dall'elenco delle piattaforme pubbliche"**, la piattaforma compare anche nell'elenco pubblico della community all'indirizzo `version.chamilo.org/community.php`.

## Accesso al Controllo versione

Questo blocco compare direttamente sulla dashboard di amministrazione — non esiste una pagina separata da visitare.

## Conviene abilitarlo?

Si tratta di un'adesione esplicita e il compromesso è chiaro: in cambio della condivisione dei dettagli sopra indicati, si riceve un avviso automatico quando è disponibile una nuova versione (comprese le patch di sicurezza) e si contribuisce alle statistiche pubbliche di adozione di Chamilo. Se si preferisce non condividere alcun dettaglio sulla piattaforma, è sufficiente non fare clic su "Abilita controllo versione" — il controllo di base sullo stato di aggiornamento viene comunque eseguito senza registrazione. Se si desidera l'avviso di aggiornamento ma non l'elenco pubblico, registrarsi e selezionare "Nascondi il campus dall'elenco delle piattaforme pubbliche".