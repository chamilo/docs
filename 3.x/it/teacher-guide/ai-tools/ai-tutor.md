# Tutor IA

Il Tutor IA è un chatbot integrato in Chamilo con cui gli studenti possono interagire per ottenere risposte istantanee generate dall'intelligenza artificiale. Funziona in due contesti, con un'attenzione diversa in ciascuno:

* **All'interno di un corso** — il Tutor IA è incentrato su quel corso: risponde alle domande sul suo contenuto, spiega i concetti trattati e guida gli studenti nel materiale.
* **Al di fuori di un corso** (sulla piattaforma generale) — il Tutor IA gestisce invece domande generiche sull'uso della piattaforma, ad esempio come trovare qualcosa o utilizzare una funzionalità, piuttosto che il contenuto del corso.

## Come funziona

Quando il Tutor IA è abilitato per un corso, gli studenti vedono un'interfaccia di chat in cui possono:

* **Porre domande** sul contenuto del corso
* **Ottenere spiegazioni** dei concetti trattati nel corso
* **Ricevere orientamento** senza aspettare la risposta del docente

All'interno di un corso, il Tutor IA utilizza il contesto di quel corso per fornire risposte pertinenti. È progettato per integrare il vostro insegnamento, non per sostituirlo.

## Abilitazione del Tutor IA

Il Tutor IA richiede due livelli di configurazione:

1. **Livello piattaforma** — L'amministratore deve abilitare gli assistenti IA e configurare almeno un provider IA (vedere [Configurazione IA](../../admin-guide/integrations/ai-configuration.md))
2. **Livello corso** — Il Tutor IA deve essere abilitato nelle impostazioni del corso (un semplice interruttore on/off). Il provider utilizzato per la chat è quello configurato dall'amministratore.

## L'interfaccia di chat

![L'interfaccia di chat del Tutor IA che mostra una conversazione tra uno studente e l'IA](/.gitbook/assets/ai-tutor-chat.png)

Il Tutor IA compare come un **pannello di chat ancorato** all'interno del corso. Gli studenti possono:

* Digitare messaggi e ricevere risposte generate dall'IA
* Visualizzare la cronologia della conversazione
* Reimpostare la conversazione per ricominciare da capo

L'interfaccia di chat mostra lo scambio tra lo studente e l'IA in un formato di messaggistica familiare.

## Comportamento importante

* **Limitato al contesto in cui viene aperto** — All'interno di un corso, il Tutor IA risponde solo su quel corso; se aperto al di fuori di qualsiasi corso, passa invece alle domande generali sull'uso della piattaforma. La modalità a livello di piattaforma (fuori dal corso) è un interruttore separato che l'amministratore controlla in modo indipendente da quello per corso.
* **Disabilitato durante gli esami** — Il Tutor IA viene disabilitato automaticamente quando uno studente sta svolgendo un esercizio, per prevenire imbrogli
* **Conversazione per studente** — Ogni studente ha una propria conversazione privata con il Tutor IA e il contesto del prompt include solo i messaggi più recenti
* **Failover del provider** — Se il provider configurato non funziona, Chamilo passa a un altro provider disponibile in modo che la chat continui a funzionare

## Come docente

Dovreste tenere presente che:

* Il Tutor IA potrebbe non fornire sempre risposte perfette — incoraggiate gli studenti a verificare le informazioni importanti
* Potete rivedere l'utilizzo del Tutor IA tramite il tracciamento della piattaforma
* Il Tutor IA è un complemento al vostro insegnamento, non un sostituto. Utilizzatelo insieme a forum, annunci e messaggistica diretta per un supporto completo agli studenti.

## Consigli

* **Definire le aspettative** — Informate gli studenti all'inizio del corso che è disponibile un Tutor IA e spiegate come usarlo in modo appropriato
* **Incoraggiare il pensiero critico** — Ricordate agli studenti di ragionare in modo critico sulle risposte generate dall'IA
* **Usarlo per le domande frequenti** — Il Tutor IA è particolarmente utile per gestire le domande comuni a cui altrimenti rispondereste ripetutamente