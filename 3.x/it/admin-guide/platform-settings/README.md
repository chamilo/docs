# Impostazioni della piattaforma

Chamilo dispone di un ampio sistema di configurazione con impostazioni organizzate in categorie. L'insieme completo delle categorie riportato di seguito rispecchia la pagina **Impostazioni di configurazione** nel pannello di amministrazione — e il file `SettingsCurrentFixtures.php` nel codice sorgente, che è la fonte di verità per i nomi delle variabili, i titoli e le descrizioni.

Accedere alle impostazioni della piattaforma dal pannello di amministrazione facendo clic su **Impostazioni di configurazione**.

![La pagina delle impostazioni della piattaforma che mostra le categorie di configurazione organizzate per area funzionale](../../.gitbook/assets/admin-settings-categories.png)

## Tutte le categorie

Ci sono **39 categorie di configurazione** in totale, elencate in ordine alfabetico di seguito. Il numero dopo ciascun collegamento è il conteggio delle impostazioni in quella categoria.

### A livello di piattaforma

* **[Identità dell'amministratore](admin-settings.md)** (12) — Identità e dati di contatto dell'amministratore della piattaforma.
* **[Piattaforma](platform-settings.md)** (29) — Identità a livello di piattaforma, fuso orario, politica di registrazione, utenti online, flag di prestazioni.
* **[Visualizzazione](display-settings.md)** (24) — Layout della homepage, gravatar, menu, comportamento del branding.
* **[Editor](editor-settings.md)** (26) — Barre degli strumenti dell'editor di testo avanzato (TinyMCE), plugin, assistenti IA.
* **[Lingue](language-settings.md)** (12) — Lingue disponibili, lingua predefinita, fallback.
* **[Posta](mail-settings.md)** (18) — Layout della posta in uscita, identità del mittente, firma.
* **[Flussi di lavoro](workflows-settings.md)** (23) — Interruttori di flusso di lavoro trasversali (creazione dei corsi, convalida dell'iscrizione…).

### Autenticazione, sicurezza e privacy

* **[Sicurezza](security-settings.md)** (31) — Protezione dell'accesso, politica delle password, header, 2FA, IDS.
* **[Registrazione](registration-settings.md)** (20) — Politica di auto-registrazione e reindirizzamenti post-registrazione.
* **[Privacy](privacy-settings.md)** (6) — Consenso, esportazione dei dati, richieste di cancellazione dell'account.
* **[CAS](cas-settings.md)** (7) — Configurazione CAS legacy ereditata dalla versione 1.x.

### Ciclo di vita di corsi e sessioni

* **[Corso](course-settings.md)** (45) — Valori predefiniti e politiche che si applicano ai corsi a livello di piattaforma.
* **[Sessioni](session-settings.md)** (68) — Ciclo di vita delle sessioni, finestre di accesso dei tutor, visibilità.
* **[Catalogo dei corsi](catalog-settings.md)** (13) — Comportamento del catalogo pubblico dei corsi.
* **[Profilo](profile-settings.md)** (29) — Quali campi compaiono nel profilo utente.

### Strumenti del corso

* **[Agenda](agenda-settings.md)** (11)
* **[Annunci](announcement-settings.md)** (9)
* **[Compiti (Work)](work-settings.md)** (12)
* **[Presenze](attendance-settings.md)** (4)
* **[Chat](chat-settings.md)** (5)
* **[Documenti](document-settings.md)** (29)
* **[Dropbox](dropbox-settings.md)** (8)
* **[Esercizi (Test)](exercise-settings.md)** (63)
* **[Forum](forum-settings.md)** (9)
* **[Glossario](glossary-settings.md)** (3)
* **[Gruppi](group-settings.md)** (3)
* **[Percorsi di apprendimento](lp-settings.md)** (51)
* **[Sondaggi](survey-settings.md)** (12)

### Valutazione e riconoscimento

* **[Gradebook (Valutazioni)](gradebook-settings.md)** (34) — Visualizzazione dei punteggi, decimali, soglie dei certificati.
* **[Certificati](certificate-settings.md)** (9) — Valori predefiniti applicati quando un discente ottiene un certificato.
* **[Competenze](skill-settings.md)** (13) — Albero delle competenze, regole di assegnazione, integrazione nel profilo.
* **[Tracciamento](tracking-settings.md)** (10) — Cosa viene registrato, quali report sono esposti.

### Comunicazione e community

* **[Messaggistica](message-settings.md)** (7)
* **[Rete sociale](social-settings.md)** (7)

### IA

* **[Assistenti IA](ai-helpers-settings.md)** (13) — Provider per tipo di attività (testo, immagine, video, tutor, valutazione).

### Operazioni e integrazione

* **[Cron Jobs](crons-settings.md)** (3)
* **[Ricerca](search-settings.md)** (3) — Configurazione della ricerca full-text Xapian.
* **[Ticket](ticket-settings.md)** (7) — Sistema di helpdesk.
* **[Web Services](webservice-settings.md)** (7) — Endpoint SOAP/REST legacy.

## Come funzionano le impostazioni

* Le impostazioni sono memorizzate nel database (tabella `settings`) e gestite tramite l'interfaccia web
* Alcune impostazioni sono **bloccate per URL** nelle installazioni multi-URL (il loro valore si applica a tutta la piattaforma e non può essere sovrascritto per URL - vedere le colonne `access_url_locked` e `access_url_changeable` nella tabella `settings`); altre (la maggior parte) possono essere sovrascritte per access URL
* Le modifiche hanno effetto immediato (non è richiesto il riavvio del server), sebbene la sessione utente possa mantenerne alcune in memoria. Se le modifiche non si riflettono immediatamente, effettuare il logout e il login per svuotare la sessione.
* Alcune impostazioni hanno dipendenze — modificarne una può influire sul comportamento di altre
* I nomi delle variabili mostrati in ciascuna pagina (ad es. `2fa_enable`) corrispondono alla riga nella tabella `settings` del database (colonna `variable`) e alle chiavi usate negli override (`config/settings_overrides.yaml`) ove applicabile.

Per ulteriori informazioni, consultare [Configurations](https://github.com/chamilo/chamilo-lms/wiki/Configurations) sul nostro wiki.

## Consigli

* **Documentate le impostazioni** — Tenete un registro delle impostazioni non predefinite e del motivo per cui le avete modificate
* **Modificate una cosa alla volta** — In fase di risoluzione dei problemi, cambiate un’impostazione alla volta in modo da poterne identificare l’effetto
* **Provate in un ambiente di staging** — Per modifiche significative alle impostazioni, effettuate prima i test su un server di staging