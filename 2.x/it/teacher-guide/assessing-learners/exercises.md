# Esercizi

Lo strumento degli esercizi (chiamato anche "test") consente di creare quiz ed esami con correzione automatica. Chamilo supporta un'ampia varietà di tipi di domande, dalle semplici scelte multiple alle domande interattive con hotspot.

## Creazione di un Esercizio

1. Apri lo strumento **Esercizi** <img src="/.gitbook/assets/icons/mdi-order-bool-ascending-variant.svg" alt="Esercizi" data-size="line"> dalla homepage del corso
2. Fai clic su **Nuovo esercizio**
3. Inserisci un **titolo** e una **descrizione** opzionale
4. Configura le impostazioni dell'esercizio (vedi sotto)
5. Salva, quindi aggiungi le domande

## Impostazioni dell'Esercizio

![Il pannello delle impostazioni dell'esercizio con opzioni per la visualizzazione, il tempo, i tentativi e il feedback](/.gitbook/assets/exercise-settings.png)

### Visualizzazione e Navigazione

| Impostazione | Opzioni | Descrizione |
|--------------|---------|-------------|
| **Layout delle domande** | Tutte su una pagina / Una per pagina | Mostra tutte le domande contemporaneamente o una alla volta |
| **Nascondi i titoli delle domande** | Sì / No | Se mostrare o meno i titoli delle domande agli studenti |
| **Mostra pulsante precedente** | Sì / No | Consenti agli studenti di tornare alle domande precedenti |
| **Impedisci la navigazione all'indietro** | Sì / No | Obbliga gli studenti a rispondere in ordine senza tornare indietro |

### Tempo e Disponibilità

| Impostazione | Descrizione |
|--------------|-------------|
| **Limite di tempo** | Tempo massimo (in minuti) per completare l'esercizio. Un timer a countdown viene mostrato allo studente |
| **Data di inizio** | Quando l'esercizio diventa disponibile per gli studenti |
| **Data di fine** | Quando l'esercizio non è più disponibile |

### Tentativi e Punteggio

| Impostazione | Descrizione |
|--------------|-------------|
| **Numero massimo di tentativi** | Quante volte uno studente può sostenere l'esercizio (0 = illimitato) |
| **Percentuale di superamento** | Punteggio minimo per superare (ad esempio, 70%). Gli studenti che non raggiungono questa soglia vedono un messaggio di fallimento |
| **Propagazione del punteggio negativo** | Se i punti negativi su singole domande riducono il punteggio totale sotto zero |

### Feedback

| Impostazione | Opzioni |
|--------------|---------|
| **Alla fine** | Mostra i risultati e le risposte corrette dopo che lo studente invia l'esercizio |
| **Immediato** | Mostra il feedback dopo ogni domanda (utile per esercizi di apprendimento) |
| **Modalità esame** | Non mostrare alcun feedback o risultato |

### Visualizzazione dei Risultati

Controlla cosa vedono gli studenti dopo aver completato l'esercizio:

* Mostra punteggio e risposte attese
* Mostra solo il punteggio
* Mostra punteggio con suddivisione per categoria
* Mostra classifica rispetto agli altri studenti
* Mostra solo all'ultimo tentativo
* Mostra visualizzazione con grafico radar

### Messaggi di Completamento

* **Messaggio di successo** — Testo personalizzato mostrato quando lo studente supera l'esercizio
* **Messaggio di fallimento** — Testo personalizzato mostrato quando lo studente non raggiunge la percentuale di superamento

### Randomizzazione delle Domande

| Impostazione | Descrizione |
|--------------|-------------|
| **Ordine casuale delle domande** | Mescola l'ordine delle domande per ogni tentativo |
| **Risposte casuali** | Mescola le opzioni di risposta all'interno di ogni domanda |
| **Casuale per categoria** | Seleziona domande casuali da ogni categoria di domande |

Puoi anche configurare strategie di selezione avanzate che combinano categorie e randomizzazione.

## Tipi di Domande

![Panoramica dei tipi di domande disponibili nell'interfaccia di creazione degli esercizi](/.gitbook/assets/exercise-question-types.png)

Chamilo offre un ricco insieme di tipi di domande organizzati in diverse categorie:

### Scelta Singola

* **Scelta multipla (risposta singola)** — Lo studente seleziona una risposta corretta da un elenco di opzioni
* **Risposta singola con immagini** — Come sopra, ma le opzioni di risposta sono visualizzate come immagini

### Scelta Multipla

* **Risposta multipla** — Lo studente seleziona una o più risposte corrette
* **Risposta multipla (menu a tendina)** — Le opzioni di risposta sono presentate come menu a tendina
* **Vero/Falso** — Una serie di affermazioni che lo studente deve indicare come vere o false
* **Vero/Falso con grado di certezza** — Vero/falso con un ulteriore livello di confidenza, che consente una valutazione più sfumata

### Completa gli Spazi Vuoti

* **Completa gli spazi vuoti** — Lo studente completa le parole mancanti in un testo. Definisci gli spazi vuoti e le risposte accettate durante la creazione della domanda.

### Abbinamento

* **Abbinamento** — Lo studente collega elementi di due colonne
* **Abbinamento (trascinabile)** — Stesso concetto, ma con un'interfaccia drag-and-drop
* **Trascinabile** — Trascina gli elementi nelle posizioni corrette

### Risposta Aperta

* **Risposta libera (saggio)** — Lo studente scrive una risposta testuale. Richiede correzione manuale (o correzione assistita da AI se configurata)
* **Espressione orale** — Lo studente registra una risposta audio utilizzando il microfono
* **Carica risposta** — Lo studente carica un file come risposta

### Hotspot

* **Hotspot** — Lo studente fa clic su aree specifiche di un'immagine per rispondere
* **Delimitazione hotspot** — Lo studente disegna i contorni di aree su un'immagine

### Calcolato

* **Risposta calcolata** — Domande numeriche con una formula e un intervallo di tolleranza. Utile per corsi di matematica e scienze.

---
### Speciale

* **Comprensione della lettura** — Test basati sulla lettura di un passaggio
* **Annotazione** — L'insegnante carica un'immagine e lo studente la annota
* **Risposta in documento Office** — Quando il plugin OnlyOffice è abilitato, lo studente risponde alla domanda modificando un documento Office incorporato (Word, Excel, PowerPoint). La loro risposta viene salvata come file separato nell'esercizio, in modo da poter essere rivista insieme al resto del loro tentativo.

## Aggiungere Domande a un Esercizio

1. Apri l'esercizio e clicca su **Aggiungi una domanda**
2. Seleziona il tipo di domanda
3. Inserisci il **testo della domanda** (supporta testo ricco con immagini e formattazione)
4. Definisci le **risposte** e il loro punteggio:
   * Per ogni opzione di risposta, specifica se è corretta e quanti punti vale
   * Puoi assegnare punti negativi alle risposte errate per scoraggiare le supposizioni
5. Facoltativamente, aggiungi un **feedback** — spiegazioni mostrate allo studente dopo aver risposto
6. Imposta il **livello di difficoltà** e la **categoria** (utile per la selezione casuale e i report)
7. Salva

## Categorie di Domande

Puoi organizzare le domande in categorie (ad esempio, "Modulo 1", "Vocabolario", "Avanzato"). Le categorie sono utili per:

* Organizzare grandi banche di domande
* Abilitare la selezione casuale per categoria (ad esempio, "5 domande dal Modulo 1, 3 dal Modulo 2")
* Visualizzare i punteggi suddivisi per categoria nei report

## Riutilizzo delle Domande

Le domande possono essere riutilizzate in diversi esercizi all'interno dello stesso corso. Quando aggiungi una domanda, puoi scegliere di crearne una nuova o selezionare una domanda esistente dalla banca delle domande.

## Importazione di Esercizi

Chamilo supporta l'importazione di esercizi da formati esterni:

* **IMS QTI / Common Cartridge** — Il formato standard per i quiz di e-learning
* **Formato Moodle** — Importa quiz da esportazioni Moodle

Per importare, cerca l'opzione **Importa** nello strumento esercizi e carica il tuo file.

## Suggerimenti

* **Mescola i tipi di domande** — Combina domande a scelta multipla, a completamento e a risposta aperta per una valutazione completa
* **Usa le categorie** — Organizza le domande per argomento per abilitare la selezione casuale mirata
* **Imposta una percentuale di superamento** — Dai agli studenti un obiettivo chiaro e collegala alla generazione di certificati tramite il Gradebook
* **Usa feedback immediato per la pratica** — Crea esercizi di pratica non valutati con feedback immediato per aiutare gli studenti a imparare dai propri errori
* **Randomizza per garantire integrità** — Abilita l'ordine casuale delle domande e delle risposte per ridurre la possibilità di copiare