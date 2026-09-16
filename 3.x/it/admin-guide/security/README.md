# Sicurezza

Il blocco **Sicurezza** nella dashboard di amministrazione raggruppa gli strumenti integrati di monitoraggio della sicurezza e di auditing della piattaforma. È distinto da [Impostazioni di sicurezza](../platform-settings/security-settings.md), che configura la *policy* di sicurezza (regole sulle password, CAPTCHA, intestazioni di sicurezza HTTP e così via) — questo blocco fornisce i *report e gli strumenti* che osservano la piattaforma alla ricerca di attività sospette e modifiche indesiderate.

![Il blocco Sicurezza nella dashboard di amministrazione, che elenca Activities audit, Login attempts, Simple IDS, Password strength checker e File integrity](/.gitbook/assets/admin-security-block.png)

Il blocco è stato introdotto in Chamilo 2.0 con quattro strumenti ed è stato esteso in Chamilo 3.0 con un quinto, **File integrity**.

## Accesso al blocco Sicurezza

Dal pannello di amministrazione, il blocco **Sicurezza** compare accanto agli altri blocchi della dashboard (Utenti, Corsi, Gestione della piattaforma, Sistema e così via). Fare clic su uno dei suoi collegamenti per aprire lo strumento corrispondente.

## Contenuto del blocco

* **[Activities Audit](activities-audit.md)** — Sfogliare gli eventi amministrativi e di piattaforma importanti (modifiche a utenti, corsi, sessioni e altro) per tipo di evento
* **[Login Attempts](login-attempts.md)** — Esaminare i tentativi di accesso falliti e riusciti, con grafici e un registro ricercabile
* **[Simple IDS](simple-ids.md)** — Visualizzare le richieste segnalate dal sistema di rilevamento delle intrusioni integrato e leggero di Chamilo
* **[Password Strength Checker](password-strength-checker.md)** — Analizzare gli utenti attivi alla ricerca di password che coincidono con un elenco di password di uso comune
* **[File Integrity](file-integrity.md)** *(novità in Chamilo 3.0)* — Rilevare aggiunte, modifiche, eliminazioni o cambiamenti di permessi inattesi nei file installati

## Chi può accedervi

Tutti e cinque gli strumenti richiedono l'accesso di **Amministratore del portale**. Le azioni di scansione, pausa e nuova baseline di File integrity richiedono inoltre l'accesso di **Amministratore globale**, e la sospensione degli avvisi o la definizione di una nuova baseline richiede di reinserire la propria password — vedere [File Integrity](file-integrity.md#actions) per i dettagli.