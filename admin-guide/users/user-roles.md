# Ruoli Utente

Chamilo utilizza un sistema di permessi basato sui ruoli. A ogni utente viene assegnato un ruolo che determina ciò che può vedere e fare sulla piattaforma.

## Ruoli a Livello di Piattaforma

Questi ruoli controllano l'accesso alle funzionalità a livello di piattaforma:

| Ruolo | Descrizione |
|------|-------------|
| **Studente (Learner)** | Il ruolo predefinito. Può iscriversi ai corsi, accedere ai contenuti formativi, inviare compiti e sostenere esercizi. |
| **Insegnante (Teacher/Trainer)** | Può creare e gestire corsi, aggiungere contenuti, valutare gli studenti e visualizzare report a livello di corso. |
| **Amministratore delle Sessioni** | Può creare e gestire sessioni (ovvero pacchetti di corsi basati sul tempo), iscrivere utenti alle sessioni e assegnare tutor. Non può accedere alle impostazioni generali della piattaforma. |
| **Responsabile Risorse Umane (HRM)** | Può visualizzare dati di monitoraggio e report per gli utenti assegnati. Utilizzato per supervisori che devono monitorare la formazione dei dipendenti senza gestire contenuti o la piattaforma. |
| **Amministratore del Portale** | Accesso completo a tutte le funzionalità di amministrazione della piattaforma. Può gestire utenti, corsi, sessioni, plugin e tutte le impostazioni. |
| **Amministratore Globale** | Uguale all'Amministratore del Portale, ma con accesso a tutti gli URL di accesso in una configurazione multi-URL (ovvero multi-tenant). |
| **Anonimo** | Un ruolo speciale per i visitatori che non hanno effettuato l'accesso. Può accedere a corsi e contenuti pubblici, se abilitati. |

## Ruoli a Livello di Corso

All'interno di un corso, gli utenti hanno ruoli specifici:

| Ruolo | Descrizione |
|------|-------------|
| **Studente** | Ruolo predefinito del corso. Può accedere ai contenuti, sostenere esercizi e inviare compiti. |
| **Assistente del Corso** | Ha permessi di gestione limitati all'interno del corso. Può aiutare a gestire i contenuti e moderare i forum. |
| **Insegnante** | Controllo completo sul corso: gestione di contenuti, strumenti, impostazioni e iscrizioni. |

## Ruoli a Livello di Sessione

All'interno di una sessione, esistono ruoli aggiuntivi:

| Ruolo | Descrizione |
|------|-------------|
| **Tutor della Sessione** | Supervisiona tutti i corsi all'interno di una sessione. Può visualizzare il monitoraggio di tutti i corsi nella sessione. |
| **Tutor del Corso** | Insegna un corso specifico all'interno di una sessione. Può gestire contenuti e monitorare gli studenti per quel corso in quella sessione. |

Nota: I termini "coach" e "tutor" sono molto simili nel significato e generalmente dipendono dall'organizzazione. In Chamilo 2.0 utilizziamo entrambi i termini in modo intercambiabile, ma nella maggior parte dei casi intendiamo "tutor", una persona che aiuta a imparare dal corso, non un coach personale. Potremmo utilizzare esclusivamente "tutor" in futuro.

## Assegnazione dei Ruoli

Quando si crea o modifica un account utente nel pannello di amministrazione, si seleziona il ruolo a livello di piattaforma. I ruoli di corso e di sessione vengono assegnati quando si iscrivono gli utenti a corsi o sessioni.

## Gerarchia dei Ruoli

I ruoli con privilegi più elevati ereditano le capacità dei ruoli con privilegi inferiori:

* Un amministratore può fare tutto ciò che può fare un insegnante
* Un insegnante può fare tutto ciò che può fare uno studente
* I ruoli a livello di sessione (tutor) forniscono capacità aggiuntive solo all'interno della sessione assegnata

## Suggerimenti

* **Applica il principio del privilegio minimo** — Assegna agli utenti il ruolo minimo necessario per svolgere i loro compiti
* **Utilizza gli Amministratori delle Sessioni per la gestione delegata** — Se hai personale che deve gestire sessioni di formazione ma non l'intera piattaforma, assegna loro il ruolo di Amministratore delle Sessioni invece di un accesso amministrativo completo
* **Utilizza HRM per i supervisori** — I Responsabili delle Risorse Umane possono monitorare i progressi della formazione senza avere accesso per modificare corsi o impostazioni della piattaforma
* **Creazione di ruoli** — Chamilo 2.x ha la struttura interna pronta per la creazione di nuovi ruoli, ma la funzionalità necessita di ulteriori test per un rilascio ampio. Può essere abilitata tramite i [Fornitori ufficiali di Chamilo](https://chamilo.org/providers).