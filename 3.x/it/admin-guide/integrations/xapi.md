# xAPI

**xAPI** (Experience API, nota anche come Tin Can API) è uno standard per il tracciamento delle esperienze di apprendimento. Chamilo può sia generare sia consumare statement xAPI.

## Cosa fa xAPI

xAPI traccia le attività di apprendimento come **statement** nel formato: "Actor did Verb on Object." Ad esempio:

* "Jane completed Module 1"
* "John scored 85% on the Final Exam"
* "Maria watched the Introduction Video"

Questi statement vengono memorizzati in un **Learning Record Store (LRS)**, fornendo una registrazione completa dell'attività di apprendimento.

## Configurazione

1. Nelle impostazioni della piattaforma, configurare l'**endpoint LRS**:
   * **LRS URL** — L'indirizzo del Learning Record Store
   * **LRS authentication** — Credenziali per l'invio dei dati all'LRS
2. Abilitare il tracciamento xAPI per le attività desiderate

## Cosa Chamilo traccia tramite xAPI

Chamilo può generare statement xAPI per:

* Accesso e completamento dei corsi
* Tentativi ed esercizi e punteggi
* Avanzamento degli elementi del percorso di apprendimento
* Elementi del portfolio

Altri strumenti (come Documents e Forums) non vengono attualmente emessi come eventi xAPI dal plugin.

## Casi d'uso

* **Tracciamento cross-platform** — Tracciare l'attività di apprendimento su più strumenti e piattaforme in un unico LRS
* **Analisi avanzate** — Utilizzare gli strumenti di analisi dell'LRS per generare insight che vanno oltre i report integrati di Chamilo
* **Reportistica di conformità** — Generare tracce di audit del completamento della formazione per i requisiti normativi