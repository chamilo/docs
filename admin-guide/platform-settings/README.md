# Impostazioni della Piattaforma

Chamilo dispone di un sistema di configurazione esteso con impostazioni organizzate in categorie. L'insieme completo delle categorie riportato di seguito rispecchia la pagina **Impostazioni di configurazione** nel pannello di amministrazione — e il file sottostante `SettingsCurrentFixtures.php` nel codice sorgente, che rappresenta la fonte di verità per i nomi delle variabili, i titoli e le descrizioni.

Accedi alle impostazioni della piattaforma dal pannello di amministrazione cliccando su **Impostazioni di configurazione**.

![La pagina delle impostazioni della piattaforma che mostra le categorie di configurazione organizzate per area funzionale](/.gitbook/assets/admin-settings-categories.png)

## Tutte le categorie

Ci sono in totale **39 categorie di configurazione**, elencate di seguito in ordine alfabetico. Il numero dopo ogni collegamento indica il conteggio delle impostazioni in quella categoria.

### A livello di piattaforma

* **[Identità dell'Amministratore](admin-settings.md)** (12) — Identità e dettagli di contatto dell'amministratore della piattaforma.
* **[Piattaforma](platform-settings.md)** (29) — Identità a livello di piattaforma, fuso orario, politica di registrazione, utenti online, flag di performance.
* **[Visualizzazione](display-settings.md)** (24) — Layout della homepage, gravatar, menu, comportamento del branding.
* **[Editor](editor-settings.md)** (26) — Barre degli strumenti dell'editor di testo ricco (TinyMCE), plugin, assistenti AI.
* **[Lingue](language-settings.md)** (12) — Lingue disponibili, lingua predefinita, fallback.
* **[Posta](mail-settings.md)** (18) — Layout della posta in uscita, identità del mittente, firma.
* **[Flussi di lavoro](workflows-settings.md)** (23) — Interruttori per flussi di lavoro trasversali (creazione di corsi, validazione delle iscrizioni…).

### Autenticazione, sicurezza e privacy

* **[Sicurezza](security-settings.md)** (31) — Protezione del login, politica delle password, intestazioni, 2FA, IDS.
* **[Registrazione](registration-settings.md)** (20) — Politica di auto-registrazione e reindirizzamenti post-registrazione.
* **[Privacy](privacy-settings.md)** (6) — Consenso, esportazione dei dati, richieste di cancellazione dell'account.
* **[CAS](cas-settings.md)** (7) — Configurazione CAS legacy portata avanti dalla versione 1.x.

### Ciclo di vita di corsi e sessioni

* **[Corso](course-settings.md)** (45) — Predefiniti e politiche che si applicano ai corsi a livello di piattaforma.
* **[Sessioni](session-settings.md)** (68) — Ciclo di vita delle sessioni, finestre di accesso per i coach, visibilità.
* **[Catalogo dei Corsi](catalog-settings.md)** (13) — Comportamento del catalogo pubblico dei corsi.
* **[Profilo](profile-settings.md)** (29) — Quali campi appaiono nel profilo utente.

### Strumenti del corso

* **[Agenda](agenda-settings.md)** (11)
* **[Annunci](announcement-settings.md)** (9)
* **[Compiti (Lavori)](work-settings.md)** (12)
* **[Presenze](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documenti](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Esercizi (Test)](exercise-settings.md)** (63)
* **[Forum](forum-settings.md)** (9)
* **[Glossario](glossary-settings.md)** (3)
* **[Gruppi](group-settings.md)** (3)
* **[Percorsi di Apprendimento](lp-settings.md)** (51)
* **[Sondaggi](survey-settings.md)** (12)

### Valutazione e riconoscimento

* **[Registro delle Valutazioni (Valutazioni)](gradebook-settings.md)** (34) — Visualizzazione dei punteggi, decimali, soglie per i certificati.
* **[Certificati](certificate-settings.md)** (9) — Predefiniti applicati quando uno studente ottiene un certificato.
* **[Competenze](skill-settings.md)** (13) — Albero delle competenze, regole di assegnazione, integrazione nel profilo.
* **[Monitoraggio](tracking-settings.md)** (10) — Cosa viene registrato, quali rapporti vengono esposti.

### Comunicazione e comunità

* **[Messaggistica](message-settings.md)** (7)
* **[Rete Sociale](social-settings.md)** (7)

### AI

* **[Assistenti AI](ai-helpers-settings.md)** (13) — Fornitori per tipo di attività (testo, immagine, video, tutor, valutazione).

### Operazioni e integrazione

* **[Cron Jobs](crons-settings.md)** (3)
* **[Ricerca](search-settings.md)** (3) — Configurazione della ricerca full-text Xapian.
* **[Ticket](ticket-settings.md)** (7) — Sistema di helpdesk.
* **[Servizi Web](webservice-settings.md)** (7) — Endpoint SOAP/REST legacy.

## Come funzionano le impostazioni

* Le impostazioni sono memorizzate nel database (tabella `settings`) e gestite tramite l'interfaccia web.
* Alcune impostazioni sono **bloccate per URL** in configurazioni multi-URL (il loro valore si applica a livello di piattaforma e non può essere sovrascritto per URL - vedi le colonne `access_url_locked` e `access_url_changeable` nella tabella `settings`); altre (la maggior parte) possono essere sovrascritte per URL di accesso.
* Le modifiche hanno effetto immediato (non è necessario riavviare il server), anche se la sessione utente potrebbe mantenere alcune di esse in memoria. Se le modifiche non si riflettono immediatamente, effettua il logout e il login per aggiornare la sessione.
* Alcune impostazioni hanno dipendenze — modificarne una potrebbe influire sul comportamento di altre.
* I nomi delle variabili mostrati su ogni pagina (ad esempio `2fa_enable`) corrispondono alla riga nella tabella del database `settings` (colonna `variable`) e alle chiavi utilizzate nelle sovrascritture (`config/settings_overrides.yaml`) dove applicabile.

Per ulteriori informazioni, consulta [Configurazioni](https://github.com/chamilo/chamilo-lms/wiki/Configurations) sul nostro wiki.

---
## Suggerimenti

* **Documenta le tue impostazioni** — Tieni un registro delle impostazioni non predefinite e del motivo per cui le hai modificate
* **Modifica una cosa alla volta** — Durante la risoluzione dei problemi, modifica una sola impostazione alla volta per poter identificare l'effetto
* **Testa in un ambiente di staging** — Per modifiche significative alle impostazioni, testa prima su un server di staging