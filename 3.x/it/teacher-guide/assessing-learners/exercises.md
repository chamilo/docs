# Esercizi

Lo strumento Esercizi (chiamato anche «test») consente di creare quiz ed esami con valutazione automatica. Chamilo supporta un’ampia varietà di tipi di domanda, dalla semplice scelta multipla alle domande interattive di tipo hotspot.

## Creazione di un esercizio

1. Aprire lo strumento **Esercizi** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Esercizi" data-size="line"> dalla homepage del corso
2. Fare clic su **Nuovo esercizio**
3. Inserire un **titolo** e, facoltativamente, una **descrizione**
4. Configurare le impostazioni dell’esercizio (vedere di seguito)
5. Salvare, quindi aggiungere le domande

## Impostazioni dell’esercizio

![Il pannello delle impostazioni dell’esercizio con le opzioni per visualizzazione, tempo, tentativi e feedback](/.gitbook/assets/exercise-settings.png)

### Visualizzazione e navigazione

| Impostazione | Opzioni | Descrizione |
|---------|---------|-------------|
| **Disposizione delle domande** | Tutte in una pagina / Una per pagina | Mostra tutte le domande contemporaneamente oppure una alla volta |
| **Nascondi i titoli delle domande** | Sì / No | Se mostrare o meno i titoli delle domande agli studenti |
| **Mostra il pulsante Precedente** | Sì / No | Consente agli studenti di tornare alle domande precedenti |
| **Impedisci la navigazione all’indietro** | Sì / No | Obbliga gli studenti a rispondere in ordine senza tornare indietro |

### Tempo e disponibilità

| Impostazione | Descrizione |
|---------|-------------|
| **Limite di tempo** | Tempo massimo (in minuti) per completare l’esercizio. Allo studente viene mostrato un timer con conto alla rovescia |
| **Data di inizio** | Momento in cui l’esercizio diventa disponibile per gli studenti |
| **Data di fine** | Momento in cui l’esercizio cessa di essere disponibile |

### Tentativi e punteggio

| Impostazione | Descrizione |
|---------|-------------|
| **Tentativi massimi** | Quante volte uno studente può svolgere l’esercizio (0 = illimitati) |
| **Percentuale di superamento** | Il punteggio minimo per superare l’esercizio (ad es. 70%). Gli studenti che non raggiungono questa soglia vedono un messaggio di insuccesso |
| **Propagazione del punteggio negativo** | Se i punti negativi sulle singole domande possono ridurre il punteggio totale sotto lo zero |

### Feedback

| Impostazione | Opzioni |
|---------|---------|
| **Alla fine** | Mostra i risultati e le risposte corrette dopo l’invio da parte dello studente |
| **Immediato** | Mostra il feedback dopo ogni domanda (utile per gli esercizi di apprendimento) |
| **Modalità esame** | Non mostra alcun feedback né risultato |

### Visualizzazione dei risultati

Controlla ciò che gli studenti vedono dopo aver completato l’esercizio:

* Mostra punteggio e risposte attese
* Mostra solo il punteggio
* Mostra il punteggio con suddivisione per categoria
* Mostra la classifica rispetto agli altri studenti
* Mostra solo all’ultimo tentativo
* Mostra la visualizzazione a grafico radar

### Messaggi di completamento

* **Messaggio di successo** — Testo personalizzato mostrato quando lo studente supera l’esercizio
* **Messaggio di insuccesso** — Testo personalizzato mostrato quando lo studente non raggiunge la percentuale di superamento

### Randomizzazione delle domande

| Impostazione | Descrizione |
|---------|-------------|
| **Ordine casuale delle domande** | Mescola l’ordine delle domande a ogni tentativo |
| **Risposte casuali** | Mescola le opzioni di risposta all’interno di ciascuna domanda |
| **Casuale per categoria** | Seleziona domande casuali da ciascuna categoria di domande |

È inoltre possibile configurare strategie di selezione avanzate che combinano categorie e randomizzazione.

## Tipi di domanda

![Panoramica dei tipi di domanda disponibili nell’interfaccia di creazione degli esercizi](/.gitbook/assets/exercise-question-types.png)

Chamilo offre un ricco insieme di tipi di domanda organizzati in diverse categorie:

### Scelta singola

* **Scelta multipla (risposta unica)** — Lo studente seleziona una sola risposta corretta da un elenco di opzioni
* **Risposta unica con immagini** — Come sopra, ma le opzioni di risposta sono visualizzate come immagini

### Scelta multipla

* **Risposta multipla** — Lo studente seleziona una o più risposte corrette
* **Risposta multipla (menu a tendina)** — Le opzioni di risposta sono presentate come menu a tendina
* **Vero/Falso** — Una serie di affermazioni che lo studente indica come vere o false
* **Vero/Falso con grado di certezza** — Vero/falso con un ulteriore livello di confidenza, che consente una valutazione più sfumata

### Completamento

* **Completamento** — Lo studente completa le parole mancanti in un testo. Si definiscono gli spazi vuoti e le risposte accettate in fase di creazione della domanda.

### Associazione

* **Associazione** — Lo studente collega elementi di due colonne
* **Associazione (trascinabile)** — Stesso concetto, ma con un’interfaccia drag-and-drop
* **Trascinabile** — Trascinare gli elementi nelle posizioni corrette

### A risposta aperta

* **Risposta libera (saggio)** — Lo studente scrive una risposta testuale. Richiede valutazione manuale (o valutazione assistita da IA, se configurata)
* **Espressione orale** — Lo studente registra una risposta audio con il microfono
* **Caricamento della risposta** — Lo studente carica un file come risposta

### Hotspot

* **Hotspot** — Lo studente fa clic su aree specifiche di un’immagine per rispondere
* **Delineazione hotspot** — Lo studente traccia i confini intorno ad aree di un’immagine

### Calcolata

* **Risposta calcolata** — Domande numeriche con una formula e un intervallo di tolleranza. Utile per i corsi di matematica e scienze.

### Special

* **Comprensione del testo** — Test basati sulla lettura di un brano
* **Annotazione** — Il docente carica un'immagine e lo studente la annota
* **Risposta in documento Office** — Quando il plugin OnlyOffice è abilitato, lo studente risponde alla domanda modificando un documento Office incorporato (Word, Excel, PowerPoint). La risposta viene salvata come file separato nell'esercizio, così da poterla esaminare insieme al resto del tentativo.

## Aggiungere domande a un esercizio

1. Aprire l'esercizio e fare clic su **Aggiungi una domanda**
2. Selezionare il tipo di domanda
3. Inserire il **testo della domanda** (supporta testo formattato con immagini e formattazione)
4. Definire le **risposte** e il relativo punteggio:
   * Per ogni opzione di risposta, specificare se è corretta e quanti punti vale
   * È possibile assegnare punti negativi alle risposte errate per scoraggiare le risposte a caso
5. Facoltativamente aggiungere un **feedback** — spiegazioni mostrate allo studente dopo aver risposto
6. Impostare il **livello di difficoltà** e la **categoria** (utili per la selezione casuale e i report)
7. Salvare

## Categorie di domande

È possibile organizzare le domande in categorie (ad es. "Modulo 1", "Vocabolario", "Avanzato"). Le categorie sono utili per:

* Organizzare grandi banche di domande
* Abilitare la selezione casuale per categoria (ad es. "5 domande dal Modulo 1, 3 dal Modulo 2")
* Visualizzare i punteggi suddivisi per categoria nei report

## Riutilizzo delle domande

Le domande possono essere riutilizzate tra esercizi all'interno dello stesso corso. Quando si aggiunge una domanda, è possibile creare una nuova domanda o selezionarne una esistente dalla banca delle domande.

## Importazione di esercizi

Chamilo supporta l'importazione di esercizi da formati esterni:

* **IMS QTI / Common Cartridge** — Il formato standard per i quiz e-learning
* **Formato Moodle** — Importazione di quiz da esportazioni Moodle

Per importare, cercare l'opzione **Importa** nello strumento esercizi e caricare il file.

## Consigli

* **Mescolare i tipi di domanda** — Combinare scelta multipla, completamento e domande aperte per una valutazione completa
* **Usare le categorie** — Organizzare le domande per argomento per abilitare una selezione casuale mirata
* **Impostare una percentuale di superamento** — Dare agli studenti un obiettivo chiaro e collegarlo alla generazione dei certificati tramite il Gradebook
* **Usare il feedback immediato per la pratica** — Creare esercizi di pratica non valutati con feedback immediato per aiutare gli studenti a imparare dagli errori
* **Randomizzare per l'integrità** — Abilitare l'ordine casuale delle domande e delle risposte per ridurre la possibilità di copiare