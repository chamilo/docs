# Percorsi di Apprendimento

I percorsi di apprendimento consentono di creare sequenze strutturate di attività di apprendimento. Un percorso di apprendimento guida i tuoi studenti attraverso un ordine specifico di documenti, esercizi, link e altre risorse, con prerequisiti opzionali e monitoraggio dei progressi.

Questo strumento è probabilmente il più utilizzato tra gli strumenti del corso, poiché funge da compositore per molti altri strumenti e può essere l'***unico*** strumento visibile agli studenti.

## Perché Utilizzare i Percorsi di Apprendimento?

I percorsi di apprendimento sono utili quando desideri:

* **Controllare l'ordine** di fruizione dei contenuti — assicurarti che gli studenti completino il materiale di base prima di procedere
* **Monitorare i progressi** — vedere esattamente dove si trova ogni studente nella sequenza
* **Impostare prerequisiti** — richiedere agli studenti di superare un esercizio prima di accedere alla sezione successiva
* **Riconoscere il completamento** — collegare il completamento del percorso di apprendimento al registro dei voti e ai certificati
* **Raggruppare contenuti** — creare moduli di apprendimento autonomi che gli studenti possono completare al proprio ritmo

## Creare un Percorso di Apprendimento

1. Apri lo strumento **Percorsi di apprendimento** <img src="/.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Percorsi di apprendimento" data-size="line"> dalla homepage del corso
2. Fai clic su **Crea un percorso di apprendimento**
3. Inserisci un **titolo** e una descrizione opzionale
4. Salva — verrai indirizzato all'editor del percorso di apprendimento

## L'Editor del Percorso di Apprendimento

![L'editor del percorso di apprendimento con l'albero degli elementi a sinistra e l'anteprima del contenuto a destra](/.gitbook/assets/learning-path-editor.png)

L'editor ha due aree principali:

* **Pannello di sinistra** — L'elenco degli elementi (passaggi) nel percorso di apprendimento, mostrato come una struttura ad albero
* **Pannello di destra** — Il contenuto dell'elemento selezionato

### Aggiungere Elementi

Fai clic su **Aggiungi un elemento** e scegli cosa aggiungere:

| Tipo di elemento | Descrizione |
|------------------|-------------|
| **Sezione** | Un'intestazione che raggruppa elementi correlati (come il titolo di un capitolo). Le sezioni non contengono contenuti propri. |
| **Documento** | Un file o una pagina web dallo strumento Documenti del corso |
| **Esercizio** | Un quiz o un test dallo strumento Esercizi |
| **Link** | Un URL esterno |
| **Compito** | Una pubblicazione dello studente dallo strumento Compiti |
| **Forum** | Un link a un forum del corso |
| **Sondaggio** | Un link a un sondaggio |
| **Certificato** | Una pagina speciale per attivare la generazione di un certificato di completamento o l'assegnazione di competenze |

### Organizzare gli Elementi

* **Trascina e rilascia** gli elementi per riordinarli
* **Annida gli elementi** sotto le sezioni trascinandoli a destra
* **Elimina** gli elementi che non ti servono più

### Impostare i Prerequisiti

I prerequisiti assicurano che gli studenti completino determinati passaggi prima di accedere ad altri:

1. Seleziona un elemento nel percorso di apprendimento
2. Apri le impostazioni dei **prerequisiti**
3. Scegli quali elementi precedenti devono essere completati per primi
4. Per gli esercizi, puoi richiedere un **punteggio minimo** (ad esempio, "Deve ottenere almeno il 70% nel Quiz 1 prima di accedere al Modulo 2")

## Esperienza dello Studente

Quando uno studente apre un percorso di apprendimento:

* Vede l'elenco degli elementi nel pannello di sinistra
* Gli elementi completati sono contrassegnati con un segno di spunta
* Gli elementi con prerequisiti non soddisfatti sono bloccati
* I progressi vengono monitorati automaticamente — se uno studente esce e torna, riprende da dove aveva lasciato
* Una barra di avanzamento mostra la percentuale di completamento complessiva

## Contenuti SCORM

Lo strumento dei percorsi di apprendimento di Chamilo può importare pacchetti **SCORM 1.2** — lo standard di e-learning più utilizzato. Carica un file ZIP SCORM e Chamilo creerà un percorso di apprendimento da esso, monitorando progressi e punteggi secondo le specifiche SCORM.

Per importare un pacchetto SCORM:

1. Nello strumento Percorsi di apprendimento, apri il menu delle azioni e fai clic su **Carica**
2. Carica il file ZIP
3. Chamilo decomprime e crea automaticamente il percorso di apprendimento

### Pacchetti CMI5 / xAPI

I pacchetti CMI5 (il moderno successore di SCORM basato su xAPI) sono supportati tramite il plugin **XApi**. Una volta che il plugin è stato abilitato dall'amministratore, puoi importare un pacchetto CMI5 e gli studenti possono avviarlo dal corso; le loro dichiarazioni vengono inoltrate al Learning Record Store configurato.

## Impostazioni del Percorso di Apprendimento

Configura il comportamento del percorso di apprendimento:

| Impostazione | Descrizione |
|--------------|-------------|
| **Visibilità** | Nascondi o mostra il percorso di apprendimento agli studenti |
| **Prerequisiti** | Richiedi il completamento di altri percorsi di apprendimento prima di questo |
| **Avvio automatico** | Apri automaticamente questo percorso di apprendimento quando gli studenti entrano nel corso |
| **Tempo SCORM accumulato** | Se accumulare il tempo su più sessioni |

## Collegamento al Registro dei Voti

Puoi includere il completamento del percorso di apprendimento come attività valutata nel Registro dei Voti. Questo consente ai progressi nel percorso di apprendimento di contribuire al voto complessivo del corso dello studente e all'idoneità al certificato.

---
## Utilizzo dell'IA

Se l'amministratore ha abilitato la generazione di percorsi di apprendimento assistita dall'IA, troverai un'opzione di generatore IA nel menu a tendina delle azioni. Fornisci all'IA un contesto il più preciso possibile per il tuo percorso di apprendimento, specifica il numero di pagine desiderate e un numero approssimativo di parole per pagina, quindi indica se vuoi che venga popolato con test e avviato. Dopo pochi minuti, avrai a disposizione un percorso di apprendimento completo basato su testo.

Modifica i documenti per generare illustrazioni con ulteriore assistenza dell'IA e ti basterà fare una revisione prima di poterlo condividere con i tuoi studenti.

## Suggerimenti

* **Inizia con una struttura** — Pianifica le sezioni e gli elementi prima di costruire il percorso
* **Usa le sezioni come capitoli** — Raggruppa gli elementi correlati sotto intestazioni di sezione per maggiore chiarezza
* **Imposta prerequisiti per le valutazioni** — Richiedi agli studenti di studiare il contenuto prima di sostenere un quiz
* **Mescola tipi di contenuto** — Combina materiali di lettura, video, esercizi interattivi e risorse esterne per un'esperienza di apprendimento coinvolgente
* **Verifica la visualizzazione dello studente** — Utilizza la funzione Vista Studente per sperimentare il percorso di apprendimento come farebbe uno studente
* **Usa SCORM per l'interattività** — Se hai accesso a strumenti di creazione SCORM (come Articulate, iSpring o simili), crea contenuti interattivi ricchi e importali in Chamilo