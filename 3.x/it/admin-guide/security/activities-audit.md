# Audit delle attività

Il report Audit delle attività consente di consultare le attività amministrative e di piattaforma più rilevanti, filtrate per tipo di evento. Si tratta dello stesso report di base precedentemente accessibile da **Tracking > Administrative activity auditing**; ora è collegato anche direttamente dal blocco Security, poiché è principalmente uno strumento di sicurezza e di accountability.

## Accesso all'Audit delle attività

Dal pannello di amministrazione, fare clic su **Security > Activities audit**.

## Cosa mostra

![La pagina Audit delle attività che elenca le categorie di tipi di evento come Course, Session, User, Social, Message, Resource, Wiki e Other, ciascuna espandibile nei singoli tipi di evento](../../.gitbook/assets/admin-security-activities-audit.png)

Gli eventi sono raggruppati in categorie:

* **Course** — Creazione, eliminazione e modifiche alle impostazioni dei corsi
* **Session** — Creazione, eliminazione e modifiche alle iscrizioni di sessioni e categorie di sessioni
* **User** — Creazione e eliminazione di account, aggiornamenti delle password, modifiche ai campi e altro
* **Social** — Creazione, eliminazione e modifiche all'appartenenza dei gruppi social
* **Message** — Modifiche e cancellazioni dei dati dei messaggi
* **Resource** — Creazione ed eliminazione di risorse e collegamenti alle risorse
* **Wiki** — Visualizzazioni delle pagine wiki
* **Other** — Tutto il resto, inclusa l'attività dei plugin, il blocco del gradebook, le eliminazioni dei tentativi di esercizio, i tentativi di login forzato e le modifiche alle impostazioni a livello di piattaforma

Fare clic su un chip di tipo di evento (ad esempio **Attempted Forced Login**) per filtrare il report fino a una tabella di voci corrispondenti. È inoltre possibile cercare direttamente per parola chiave utilizzando il campo **Search** sopra l'elenco dei tipi di evento.

## Casi d'uso

* Indagare chi ha eliminato un corso, una sessione o un account utente, e quando
* Confermare se una specifica modifica amministrativa (un aggiornamento delle impostazioni, un'installazione di plugin) è stata effettuata da un amministratore previsto
* Dare seguito agli eventi **Attempted Forced Login** insieme al report [Login Attempts](login-attempts.md)