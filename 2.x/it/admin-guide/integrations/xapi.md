# xAPI

**xAPI** (Experience API, noto anche come Tin Can API) è uno standard per monitorare le esperienze di apprendimento. Chamilo può sia generare che consumare dichiarazioni xAPI.

## Cosa fa xAPI

xAPI traccia le attività di apprendimento come **dichiarazioni** nel formato: "Attore ha eseguito Verbo su Oggetto". Ad esempio:

* "Jane ha completato il Modulo 1"
* "John ha ottenuto l'85% nell'Esame Finale"
* "Maria ha guardato il Video Introduttivo"

Queste dichiarazioni vengono archiviate in un **Learning Record Store (LRS)**, fornendo un registro completo delle attività di apprendimento.

## Configurazione

1. Nelle impostazioni della piattaforma, configura l'**endpoint LRS**:
   * **URL LRS** — L'indirizzo del tuo Learning Record Store
   * **Autenticazione LRS** — Credenziali per inviare dati al LRS
2. Abilita il monitoraggio xAPI per le attività desiderate

## Cosa traccia Chamilo tramite xAPI

Chamilo può generare dichiarazioni xAPI per:

* Accesso e completamento dei corsi
* Tentativi e punteggi degli esercizi
* Progressi negli elementi del percorso di apprendimento
* Elementi del portfolio

Altri strumenti (come Documenti e Forum) non vengono attualmente emessi come eventi xAPI dal plugin.

## Casi d'uso

* **Monitoraggio multipiattaforma** — Traccia le attività di apprendimento su più strumenti e piattaforme in un unico LRS
* **Analisi avanzate** — Utilizza strumenti di analisi LRS per generare approfondimenti che vanno oltre i rapporti integrati di Chamilo
* **Rapporti di conformità** — Genera tracce di audit del completamento della formazione per requisiti normativi