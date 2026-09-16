# Ruoli utente

Chamilo utilizza un sistema di autorizzazioni basato sui ruoli. A ciascun utente viene assegnato un ruolo che determina ciò che può vedere e fare sulla piattaforma.

## Ruoli a livello di piattaforma

Questi ruoli controllano l'accesso alle funzionalità a livello di piattaforma:

| Ruolo |  Descrizione |
|------|------------|
| **Learner (Student)** | Il ruolo predefinito. Può iscriversi ai corsi, accedere ai contenuti didattici, consegnare i compiti e svolgere gli esercizi. |
| **Teacher (Trainer)** | Può creare e gestire i corsi, aggiungere contenuti, valutare gli studenti e visualizzare i report a livello di corso. |
| **Sessions Administrator** | Può creare e gestire le sessioni (ossia pacchetti di corsi basati sul tempo), iscrivere gli utenti alle sessioni e assegnare i tutor. Non può accedere alle impostazioni generali della piattaforma. |
| **Human Resources Manager (HRM)** | Può visualizzare i dati di tracciamento e di reportistica per gli utenti assegnati. Utilizzato per i supervisori che devono monitorare la formazione dei dipendenti ma non gestire i contenuti né la piattaforma. |
| **Portal Administrator** | Accesso completo a tutte le funzionalità di amministrazione della piattaforma. Può gestire utenti, corsi, sessioni, plugin e tutte le impostazioni. |
| **Global Administrator** | Come il Portal Administrator, ma con accesso a tutti gli URL di accesso in una configurazione multi-URL (ossia multi-tenant) — oppure, se registrato su un URL non root, limitato al ramo di quell'URL. Vedere [Subtree Administrators](../multi-url/access-urls.md#subtree-administrators). |
| **Anonymous** | Un ruolo speciale per i visitatori che non hanno effettuato l'accesso. Può accedere ai corsi e ai contenuti pubblici, se abilitati. |

## Ruoli a livello di corso

All'interno di un corso, gli utenti hanno ruoli specifici:

| Ruolo | Descrizione |
|------|-------------|
| **Student** | Ruolo predefinito del corso. Può accedere ai contenuti, svolgere gli esercizi, consegnare i compiti. |
| **Course assistant** | Dispone di autorizzazioni di gestione limitate all'interno del corso. Può contribuire a gestire i contenuti e moderare i forum. |
| **Teacher** | Controllo completo sul corso: gestione di contenuti, strumenti, impostazioni e iscrizioni. |

## Ruoli a livello di sessione

All'interno di una sessione esistono ruoli aggiuntivi:

| Ruolo | Descrizione |
|------|-------------|
| **Session tutor** | Supervisiona tutti i corsi all'interno di una sessione. Può visualizzare il tracciamento su tutti i corsi della sessione. |
| **Course tutor** | Insegna un corso specifico all'interno di una sessione. Può gestire i contenuti e tracciare gli studenti per quel corso in quella sessione. |

Nota: questo ruolo era denominato "coach" nelle versioni di Chamilo precedenti alla 3.0. A partire da Chamilo 3.0, "coach" è stato sostituito da "tutor" ovunque nell'interfaccia e nella documentazione della piattaforma — un tutor è una persona che accompagna gli studenti in un corso, non un coach personale. I nomi delle impostazioni sottostanti in `Configuration settings` contengono ancora "coach" per compatibilità con le versioni precedenti (ad esempio `add_users_by_coach`), ma le relative etichette ora recitano "tutor".

## Assegnazione dei ruoli

Quando si crea o si modifica un account utente nel pannello di amministrazione, si seleziona il relativo ruolo a livello di piattaforma. I ruoli di corso e di sessione vengono assegnati al momento dell'iscrizione degli utenti ai corsi o alle sessioni.

## Gerarchia dei ruoli

I ruoli con privilegi più elevati ereditano le capacità dei ruoli con privilegi inferiori:

* Un amministratore può fare tutto ciò che può fare un docente
* Un docente può fare tutto ciò che può fare uno studente
* I ruoli a livello di sessione (tutor) forniscono capacità aggiuntive solo all'interno della sessione assegnata

## Consigli

* **Applicare il principio del privilegio minimo** — Assegnare agli utenti il ruolo minimo di cui hanno bisogno per svolgere i propri compiti
* **Utilizzare i Sessions Administrator per la gestione delegata** — Se si dispone di personale che deve gestire le sessioni formative ma non l'intera piattaforma, assegnare il ruolo Sessions Administrator invece dell'accesso da amministratore completo
* **Utilizzare l'HRM per i supervisori** — I Human Resources Manager possono monitorare i progressi formativi senza avere accesso alla modifica dei corsi o delle impostazioni della piattaforma
* **Creazione di ruoli** — Chamilo 3.x dispone della struttura interna pronta per la creazione di nuovi ruoli, ma la funzionalità necessita di ulteriori test per un rilascio su larga scala. Può essere abilitata tramite i [Official providers of Chamilo](https://chamilo.org/providers).