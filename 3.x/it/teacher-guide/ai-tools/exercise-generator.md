# Generatore di esercizi

Il Generatore di esercizi con IA consente di creare automaticamente domande di quiz tramite l’intelligenza artificiale. Si fornisce un argomento o un contenuto e l’IA genera domande che è possibile rivedere, modificare e aggiungere agli esercizi.

## Accesso al Generatore di esercizi

Il Generatore di esercizi è disponibile durante la creazione o la modifica di un esercizio, a condizione che:

1. Gli assistenti IA siano abilitati a livello di piattaforma
2. Sia configurato almeno un provider di testo IA

Cercare il pulsante o la sezione **Generatore IA** nell’interfaccia di creazione dell’esercizio.

## Come generare le domande

![Il modulo del generatore di esercizi IA con i campi per l’argomento e il numero di domande](/.gitbook/assets/ai-exercise-generator.png)

Il generatore offre due modalità, disponibili come schede:

* **Test da argomento** — Genera domande a partire da una descrizione testuale dell’argomento
* **Test da documento** — Genera domande a partire da un documento del corso (disponibile solo quando è configurato un provider in grado di gestire i documenti). Quando si usa questa modalità, il campo dell’argomento diventa facoltativo e viene trattato come un suggerimento aggiuntivo.

1. Aprire il modulo Generatore IA all’interno di un esercizio e scegliere la modalità
2. Configurare i parametri di generazione:
   * **Titolo del quiz** — Il titolo dell’esercizio risultante
   * **Argomento delle domande** — Descrivere di cosa devono trattare le domande (oppure, in modalità documento, un suggerimento facoltativo)
   * **Numero di domande** — Quante domande generare (massimo 100)
   * **Tipo di domanda** — Attualmente è offerto solo **Risposta multipla**
   * **Provider IA** — Selezionare quale provider IA utilizzare (visualizzato solo quando ne è configurato più di uno)
3. Fare clic su **Genera**
4. L’IA produce un insieme di domande con opzioni di risposta e risposte corrette contrassegnate. Quando è abilitata la disclosure IA, le domande generate sono precedute da **\[AI-assisted\]**.

## Revisione e modifica

![Domande generate dall’IA visualizzate per la revisione, con opzioni per modificare, accettare o rimuovere ciascuna](/.gitbook/assets/ai-exercise-generator-results.png)

Le domande generate sono presentate come **suggerimenti**. Si dovrebbe:

* **Rivedere ogni domanda** per accuratezza e pertinenza
* **Modificare la formulazione** se necessario — adattare domande, opzioni di risposta e feedback
* **Verificare le risposte corrette** — assicurarsi che l’IA abbia identificato le risposte giuste
* **Rimuovere le domande inadatte** — eliminare quelle che non soddisfano i propri standard
* **Regolare il punteggio** — impostare i valori in punti appropriati per ciascuna domanda

Una volta soddisfatti, aggiungere le domande all’esercizio.

Si noti che, nonostante le nostre richieste di formato specifico, alcuni modelli restituiscono titoli di domanda preceduti da un numero. Non si consiglia di lasciare quel numero, perché ostacolerà la mescolanza delle domande nei test con domande selezionate in modo casuale. Inoltre, a volte non si ottengono tante domande quante richieste, quindi è importante verificarlo e, se necessario, generare altre domande o cambiare modello, se se ne ha la possibilità.

## Disclosure dei contenuti generati dall’IA

I contenuti generati dall’IA sono etichettati con un avviso di disclosure, che indica che sono stati creati tramite intelligenza artificiale. Questa trasparenza aiuta gli studenti a comprendere l’origine del materiale.

## Consigli

* **Fornire argomenti specifici** — Quanto più specifica è la descrizione dell’argomento, tanto più pertinenti saranno le domande generate.
* **Rivedere sempre** — I contenuti generati dall’IA possono contenere errori. Non pubblicare mai domande senza averle prima riviste.
* **Usarli come punto di partenza** — Le domande generate fanno risparmiare tempo, non sono un prodotto finito. Modificarle per adattarle al proprio stile didattico e ai contenuti del corso.
* **Mescolare con domande manuali** — Combinare domande generate dall’IA con domande create manualmente per i risultati migliori.
* **Provare provider diversi** — Se sono disponibili più provider IA, provarne di diversi per vedere quale produce le domande migliori per la propria area disciplinare.