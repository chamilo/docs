# Controllo della robustezza delle password

Il Controllo della robustezza delle password confronta gli hash delle password memorizzati degli utenti attivi con un elenco breve di password di uso comune (`123456`, `password`, `qwerty123` e simili). Non visualizza né trasmette mai le password stesse — indica soltanto se la password corrente di un utente coincide con uno dei candidati noti come deboli.

## Accesso al Controllo della robustezza delle password

Dal pannello di amministrazione, fare clic su **Sicurezza > Controllo della robustezza delle password**.

## Esecuzione di una scansione

![La pagina Controllo della robustezza delle password, con un campo per gli ID utente da analizzare e un pulsante per avviare la scansione](/.gitbook/assets/admin-security-password-strength.png)

* Lasciare vuoto **ID utente da analizzare** per analizzare tutti gli utenti attivi, oppure inserire un elenco di ID utente separati da virgola per controllare un sottoinsieme
* Fare clic su **Esegui scansione della robustezza delle password**

La scansione viene eseguita in modo asincrono in background, così da non bloccare la pagina, e mostra l’avanzamento in tempo reale (utenti verificati finora, sul totale, e quante password deboli sono state trovate). Poiché ogni password candidata deve essere confrontata con l’hash di ogni utente selezionato, l’analisi di tutti gli utenti su una piattaforma di grandi dimensioni può richiedere del tempo — l’elenco dei candidati è tenuto intenzionalmente breve per limitare questo costo.

## Azioni sui risultati

![I risultati della scansione completata, con l’elenco di un utente segnalato e le colonne Nome, Nome utente e E-mail, e azioni per riga per richiedere un cambio password o forzare un reimpostazione della password](/.gitbook/assets/admin-security-password-strength-results.png)

Al termine della scansione, gli utenti segnalati sono elencati con due azioni disponibili, per singolo utente o come azione di massa per tutti gli utenti selezionati:

* **Richiedi cambio password** (icona busta) — Invia all’utente un’e-mail che gli chiede di cambiare la password
* **Forza reimpostazione password** (icona di reimpostazione) — Invalida immediatamente la password corrente dell’utente e gli invia per e-mail una nuova password

Entrambe le azioni verificano di nuovo gli utenti selezionati rispetto all’elenco delle password deboli prima di agire, così una richiesta obsoleta o manomessa non può essere usata per reimpostare un account che non ha più una password debole.

## Uso consigliato

* Eseguire questa scansione periodicamente, in particolare dopo un’importazione massiva di utenti (gli account importati a volte vengono creati con password predefinite semplici)
* Abbinarla alle impostazioni **Requisiti minimi di sintassi della password** e **Intervallo di rotazione della password** in [Impostazioni di sicurezza](../platform-settings/security-settings.md) per impedire che vengano impostate password deboli in partenza, invece di individuarle soltanto a posteriori