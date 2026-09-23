# Percorsi formativi

I percorsi formativi consentono di creare sequenze strutturate di attività di apprendimento. Un percorso formativo guida i discenti attraverso un ordine specifico di documenti, esercizi, collegamenti e altre risorse, con prerequisiti opzionali e tracciamento dei progressi.

Questo strumento è probabilmente lo strumento di corso più utilizzato, perché funge da compositore per molti altri strumenti e può essere di fatto l’***unico*** strumento visibile ai discenti.

## Perché usare i percorsi formativi?

I percorsi formativi sono utili quando si desidera:

* **Controllare l’ordine** di fruizione dei contenuti — assicurarsi che i discenti completino il materiale di base prima di avanzare
* **Tracciare i progressi** — vedere esattamente dove si trova ciascun discente nella sequenza
* **Impostare prerequisiti** — richiedere che i discenti superino un esercizio prima di accedere alla sezione successiva
* **Assegnare il completamento** — collegare il completamento del percorso formativo al registro valutazioni e ai certificati
* **Pacchettizzare i contenuti** — creare moduli di apprendimento autonomi che i discenti possono svolgere al proprio ritmo

## Creare un percorso formativo

1. Aprire lo strumento **Percorsi formativi** <img src="../../.gitbook/assets/icons/mdi-map-marker-path.svg" alt="Percorsi formativi" data-size="line"> dalla homepage del corso
2. Fare clic su **Crea un percorso formativo**
3. Inserire un **titolo** e una descrizione opzionale
4. Salvare — si verrà reindirizzati all’editor del percorso formativo

## L’editor del percorso formativo

![L’editor del percorso formativo con l’albero degli elementi a sinistra e l’anteprima del contenuto a destra](../../.gitbook/assets/learning-path-editor.png)

L’editor ha due aree principali:

* **Pannello sinistro** — L’elenco degli elementi (passi) nel percorso formativo, mostrato come struttura ad albero
* **Pannello destro** — Il contenuto dell’elemento selezionato

### Aggiungere elementi

Fare clic su **Aggiungi un elemento** e scegliere cosa aggiungere:

| Tipo di elemento | Descrizione |
|-----------|-------------|
| **Sezione** | Un’intestazione che raggruppa elementi correlati (come il titolo di un capitolo). Le sezioni non contengono contenuto di per sé. |
| **Documento** | Un file o una pagina web dallo strumento Documenti del corso |
| **Esercizio** | Un quiz o un test dallo strumento Esercizi |
| **Collegamento** | Un URL esterno |
| **Compito** | Una pubblicazione dello studente dallo strumento Compiti |
| **Forum** | Un collegamento a un forum del corso |
| **Sondaggio** | Un collegamento a un sondaggio |
| **Certificato** | Una pagina speciale per attivare la generazione di un certificato di completamento o l’assegnazione di competenze |

### Organizzare gli elementi

* **Trascinare e rilasciare** gli elementi per riordinarli
* **Annidare gli elementi** sotto le sezioni trascinandoli verso destra
* **Eliminare** gli elementi che non servono più

### Impostare i prerequisiti

I prerequisiti assicurano che i discenti completino determinati passi prima di accedervi ad altri:

1. Selezionare un elemento nel percorso formativo
2. Aprire le sue impostazioni dei **prerequisiti**
3. Scegliere quale o quali elementi precedenti devono essere completati per primi
4. Per gli esercizi, è possibile richiedere un **punteggio minimo** (ad es., «Deve ottenere almeno il 70% nel Quiz 1 prima di accedere al Modulo 2»)

## Esperienza del discente

Quando un discente apre un percorso formativo:

* Vede l’elenco degli elementi nel pannello sinistro
* Gli elementi completati sono contrassegnati da un segno di spunta
* Gli elementi con prerequisiti non soddisfatti sono bloccati
* I progressi sono tracciati automaticamente — se un discente esce e torna, riprende da dove si era interrotto
* Una barra di avanzamento mostra la percentuale complessiva di completamento

## Contenuti SCORM

Lo strumento Percorsi formativi di Chamilo può importare pacchetti **SCORM 1.2** — lo standard e-learning più ampiamente utilizzato. Caricare un file ZIP SCORM e Chamilo creerà un percorso formativo a partire da esso, tracciando progressi e punteggi secondo la specifica SCORM.

Per importare un pacchetto SCORM:

1. Nello strumento Percorsi formativi, aprire il menu delle azioni e fare clic su **Carica**
2. Caricare il file ZIP
3. Chamilo scompatta e crea automaticamente il percorso formativo

### Pacchetti CMI5 / xAPI

I pacchetti CMI5 (il successore moderno di SCORM basato su xAPI) sono supportati tramite il plugin **XApi**. Una volta che il plugin è abilitato dall’amministratore, è possibile importare un pacchetto CMI5 e i discenti possono avviarlo dal corso; le loro statement vengono inoltrate al Learning Record Store configurato.

## Autorialità dei contenuti con C-Studio

*Disponibile se l’amministratore ha abilitato il plugin C-Studio.*

C-Studio aggiunge un editor visivo integrato, drag-and-drop, per creare contenuti interattivi direttamente all’interno di un percorso formativo — un’alternativa all’importazione di un pacchetto SCORM quando non si dispone (o non si vuole imparare) di uno strumento di authoring separato come Articulate o iSpring. Si costruisce il contenuto pagina per pagina direttamente in Chamilo, ed è memorizzato e tracciato come qualsiasi altro elemento del percorso formativo.

### Avviare un progetto C-Studio

Quando il plugin è attivo, l'elenco dei Percorsi formativi mostra un pulsante extra accanto al menu delle azioni usuali, contrassegnato da un "+" e da un tooltip "Studio Tools":

![L'elenco dei Percorsi formativi che mostra il pulsante C-Studio "Studio Tools" accanto al menu delle azioni standard](../../.gitbook/assets/cstudio-lp-button.png)

Fare clic per iniziare. Verrà chiesto di creare un nuovo progetto da zero o di importarne uno esistente:

![La schermata iniziale di C-Studio che offre di creare un nuovo progetto o importarne uno esistente](../../.gitbook/assets/cstudio-start-screen.png)

Questa schermata particolare è al momento disponibile solo in francese, indipendentemente dalla lingua della piattaforma o del corso — una limitazione nota della versione del plugin in uso. Assegnare un titolo al progetto e si apre direttamente nell'editor.

### L'editor

![L'editor visivo di C-Studio, che mostra il canvas della pagina, la palette degli strumenti a destra e il pannello del progetto a sinistra](../../.gitbook/assets/cstudio-editor.png)

L'editor è un costruttore visivo pagina per pagina:

* **Pannello sinistro** — le pagine del progetto, con un "+" per aggiungerne altre, e una sezione **Tools** in basso (Clean data, Preview, Colors, Options, Quit)
* **Canvas centrale** — la pagina in costruzione; fare clic su qualsiasi elemento per modificarlo sul posto
* **Pannello destro** — la palette dei componenti, da trascinare sul canvas

La palette copre i blocchi di costruzione di base (colonne, immagini, audio, titoli, testo, pulsanti, schede) nonché diversi tipi di esercizi interattivi: **Drag Drop**, **Fill text**, **Hotspot Img**, **Mark Words**, **Find Words** e **Sort paragraphs**, più un blocco **iframe** per incorporare contenuti esterni e un blocco **Quiz**.

### Lingua

L'interfaccia di C-Studio può impostarsi di default sul francese la prima volta che la si apre, indipendentemente dalla lingua dell'interfaccia di Chamilo o dalla lingua del corso. In tal caso, andare su **File > UI language** e scegliere la propria lingua — l'editor si ricarica immediatamente e ricorda la scelta in seguito.

![Il menu File aperto, che mostra l'opzione "UI language"](../../.gitbook/assets/cstudio-file-menu.png)

### Salvataggio ed esportazione

Usare **File > Save** durante il lavoro. **File > Export...** impacchetta il progetto come file SCORM che si può scaricare, archiviare o riutilizzare altrove tramite **Import...**. **File > Quit** riporta all'elenco dei percorsi formativi, dove il progetto C-Studio compare ora come elemento regolare.

## Impostazioni del Percorso formativo

Configurare il comportamento del percorso formativo:

| Impostazione | Descrizione |
|---------|-------------|
| **Visibility** | Nascondere o mostrare il percorso formativo ai discenti |
| **Prerequisites** | Richiedere il completamento di altri percorsi formativi prima di questo |
| **Auto-launch** | Aprire automaticamente questo percorso formativo quando i discenti accedono al corso |
| **Accumulated SCORM time** | Se accumulare il tempo su più sessioni |

## Collegamento al Gradebook

È possibile includere il completamento del percorso formativo come attività valutata nel Gradebook. Ciò consente ai progressi nel percorso formativo di contribuire al voto complessivo del corso del discente e all'idoneità al certificato.

## Uso dell'IA

Se l'amministratore ha abilitato la generazione di percorsi formativi assistita da IA, si troverà un'opzione di generatore IA nel menu a discesa delle azioni. Fornire all'IA un contesto quanto più preciso si desidera per il percorso formativo, chiedere un numero di pagine e un numero approssimativo di parole per pagina, quindi indicare se si vuole popolarlo con test e avviare. Qualche minuto dopo, si avrà davanti un percorso formativo completo, basato su testo.

Modificare i documenti per generare illustrazioni con ulteriore IA e resterà solo una revisione da fare prima di poterlo condividere con i discenti.

## Consigli

* **Iniziare con una traccia** — Pianificare sezioni e elementi prima di costruire il percorso
* **Usare le sezioni come capitoli** — Raggruppare elementi correlati sotto intestazioni di sezione per chiarezza
* **Impostare prerequisiti per le valutazioni** — Richiedere ai discenti di studiare i contenuti prima di sostenere un quiz
* **Mescolare i tipi di contenuto** — Combinare materiali di lettura, video, esercizi interattivi e risorse esterne per un'esperienza di apprendimento coinvolgente
* **Controllare la vista discente** — Usare la funzione Student View per vivere il percorso formativo come lo vivrebbe un discente
* **Usare SCORM per l'interattività** — Se si ha accesso a strumenti di authoring SCORM (come Articulate, iSpring o simili), creare contenuti interattivi ricchi e importarli in Chamilo. Se l'amministratore ha abilitato il plugin C-Studio, si possono costruire contenuti interattivi simili direttamente in Chamilo — vedere [Content Authoring with C-Studio](#content-authoring-with-c-studio) sopra