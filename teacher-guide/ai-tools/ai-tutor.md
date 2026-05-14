# Tutor AI

Il Tutor AI è un chatbot integrato in Chamilo con cui gli studenti possono interagire per porre domande relative al corso. Fornisce risposte immediate e contestualizzate, supportate da un modello linguistico di grandi dimensioni.

## Come Funziona

Quando il Tutor AI è abilitato per un corso, gli studenti vedono un'interfaccia di chat dove possono:

* **Porre domande** sui contenuti del corso
* **Ottenere spiegazioni** dei concetti trattati nel corso
* **Ricevere orientamento** senza dover aspettare la risposta dell'insegnante

Il Tutor AI utilizza il contesto del corso per fornire risposte pertinenti. È progettato per integrare il tuo insegnamento, non per sostituirlo.

## Abilitazione del Tutor AI

Il Tutor AI richiede due livelli di configurazione:

1. **Livello piattaforma** — L'amministratore deve abilitare gli assistenti AI e configurare almeno un fornitore di AI (vedi [Configurazione AI](../../admin-guide/integrations/ai-configuration.md))
2. **Livello corso** — Il Tutor AI deve essere abilitato nelle impostazioni del corso (un semplice interruttore on/off). Il fornitore utilizzato per la chat è quello configurato dall'amministratore.

## L'Interfaccia di Chat

![L'interfaccia di chat del Tutor AI che mostra una conversazione tra uno studente e l'AI](/.gitbook/assets/ai-tutor-chat.png)

Il Tutor AI appare come un **pannello di chat ancorato** all'interno del corso. Gli studenti possono:

* Digitare messaggi e ricevere risposte generate dall'AI
* Visualizzare la cronologia delle loro conversazioni
* Reimpostare la conversazione per iniziare da capo

L'interfaccia di chat mostra lo scambio tra lo studente e l'AI in un formato di messaggistica familiare.

## Comportamenti Importanti

* **Solo contesto del corso** — Il Tutor AI è disponibile solo all'interno di un corso, non sulla piattaforma generale
* **Disabilitato durante gli esami** — Il Tutor AI viene automaticamente disabilitato quando uno studente sta svolgendo un esercizio, per prevenire imbrogli
* **Conversazione per studente** — Ogni studente ha una propria conversazione privata con il Tutor AI, e il contesto del prompt include solo i messaggi più recenti
* **Fallback del fornitore** — Se il fornitore configurato non funziona, Chamilo passa a un altro fornitore disponibile per garantire il funzionamento della chat

## Come Insegnante

Dovresti essere consapevole che:

* Il Tutor AI potrebbe non fornire sempre risposte perfette — incoraggia gli studenti a verificare le informazioni importanti
* Puoi monitorare l'uso del Tutor AI attraverso il tracciamento della piattaforma
* Il Tutor AI è un complemento al tuo insegnamento, non un sostituto. Usalo insieme a forum, annunci e messaggistica diretta per un supporto completo agli studenti.

## Consigli

* **Stabilisci aspettative** — Comunica agli studenti all'inizio del corso che è disponibile un Tutor AI e spiega come utilizzarlo in modo appropriato
* **Incoraggia il pensiero critico** — Ricorda agli studenti di valutare criticamente le risposte generate dall'AI
* **Usalo per domande frequenti** — Il Tutor AI è particolarmente utile per gestire domande comuni che altrimenti dovresti rispondere ripetutamente