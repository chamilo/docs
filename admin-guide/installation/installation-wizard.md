# Procedura Guidata di Installazione

Chamilo 2.0 include una procedura guidata di installazione basata sul web che ti accompagna durante la configurazione iniziale. La procedura guidata si avvia automaticamente quando accedi alla piattaforma per la prima volta.

## Prima di Iniziare

Assicurati che siano soddisfatti i seguenti prerequisiti:

1. Il tuo server rispetta tutti i [requisiti di sistema](server-requirements.md).
2. Hai scaricato una versione confezionata (zip o tar.gz) di Chamilo.
3. Il tuo server web è configurato per servire la directory `public/` come root del documento.
4. Il file `.env` esiste ed è vuoto (la procedura guidata ti guiderà nella configurazione del database).

## Passo 1: Lingua di Installazione

![Procedura guidata di installazione Passo 1 — selezione della lingua](/.gitbook/assets/install-step1-language.png)

Il primo passo ti consente di selezionare la lingua per il processo di installazione. Scegli la lingua preferita dal menu a tendina.

Se Chamilo rileva un'installazione esistente (per un aggiornamento), mostrerà lo stato della migrazione e offrirà un percorso di aggiornamento invece di un'installazione da zero.

## Passo 2: Verifica dei Requisiti

![Procedura guidata di installazione Passo 2 — verifica dei requisiti con versione PHP, estensioni e permessi delle directory](/.gitbook/assets/install-step2-requirements.png)

La procedura guidata verifica l'ambiente del tuo server:

* **Versione PHP** è 8.2 o superiore
* **Estensioni PHP richieste** sono installate (intl, gd, curl, zip, mbstring, xml, ecc.)
* **Impostazioni PHP consigliate** — `date.timezone` è configurato, limiti di upload/memoria adeguati
* **Permessi di directory e file** — `var/`, `config/` e `public/upload/` sono scrivibili dal server web

Se alcuni requisiti non sono soddisfatti, la procedura guidata mostrerà avvisi o errori. Risolvi questi problemi prima di procedere.

## Passo 3: Licenza

![Procedura guidata di installazione Passo 3 — accettazione della licenza](/.gitbook/assets/install-step3-license.png)

Questo passo mostra la licenza GNU/GPLv3. Devi spuntare la casella **"Accetto"** per procedere.

Facoltativamente, puoi espandere la sezione **Informazioni di contatto** per fornire dettagli sulla tua organizzazione (nome, email, azienda, paese). Questo è volontario e aiuta la comunità di Chamilo a capire chi utilizza la piattaforma, ma ci permetterà anche di contattarti *molto raramente* riguardo eventi che si svolgono vicino a te.

## Passo 4: Impostazioni del Database

![Procedura guidata di installazione Passo 4 — configurazione della connessione al database](/.gitbook/assets/install-step4-database.png)

Inserisci i dettagli della connessione al database:

| Campo | Descrizione |
|-------|-------------|
| **Host del database** | Il nome host o l'IP del tuo server di database (ad esempio, `localhost` o `127.0.0.1`) |
| **Porta del database** | Predefinita: 3306 per MySQL/MariaDB |
| **Nome del database** | Il nome del database da utilizzare (solo caratteri alfanumerici e underscore) |
| **Utente del database** | Un utente del database con privilegi completi sul database specificato |
| **Password del database** | La password per l'utente del database |

Clicca su **Verifica connessione al database** per testare. La procedura guidata non ti permetterà di procedere finché la connessione non avrà successo. Se il database esiste già, verrà mostrato un avviso.

## Passo 5: Impostazioni di Configurazione

![Procedura guidata di installazione Passo 5 — account amministratore, impostazioni del portale e configurazione email](/.gitbook/assets/install-step5-config.png)

Questo passo combina la creazione dell'account amministratore, le impostazioni del portale e la configurazione email.

### Account Amministratore

| Campo | Descrizione |
|-------|-------------|
| **Login** | Il nome utente dell'amministratore |
| **Password** | Scegli una password forte — questo account ha accesso completo alla piattaforma |
| **Nome** | Il nome dell'amministratore |
| **Cognome** | Il cognome dell'amministratore |
| **Email** | Utilizzata per notifiche di sistema e ripristino password |
| **Telefono** | Numero di contatto opzionale |

Questi dettagli dell'amministratore saranno utilizzati anche da Chamilo per popolare i dettagli di contatto per il supporto, quindi assicurati di riconfigurare queste informazioni nelle impostazioni dopo aver concluso l'installazione.

### Impostazioni del Portale

| Campo | Descrizione |
|-------|-------------|
| **Lingua** | La lingua predefinita dell'interfaccia |
| **Nome del portale** | Il nome della tua piattaforma (ad esempio, "LMS della Mia Organizzazione") |
| **Nome abbreviato dell'azienda** | Il nome abbreviato della tua organizzazione |
| **URL dell'azienda** | Il sito web della tua organizzazione |
| **Metodo di crittografia** | Algoritmo di hashing della password — **bcrypt** è consigliato |
| **Consenti auto-registrazione** | Sì / No / Dopo approvazione |
| **Consenti auto-registrazione come formatore** | Sì / No |

### Configurazione Email

La sezione delle impostazioni email ti consente di configurare il trasporto della posta (SMTP, Amazon SES, Mailjet, ecc.) e testare l'invio di email. Consulta [Configurazione Email](email-configuration.md) per dettagli.

Tutte queste impostazioni possono essere modificate successivamente dal pannello di amministrazione.

---
## Passo 6: Ultimo Controllo Prima dell'Installazione

![Passo 6 del wizard di installazione — revisione di tutte le impostazioni prima dell'installazione](/.gitbook/assets/install-step6-review.png)

Questo passo mostra un riepilogo di tutto ciò che hai inserito per la revisione:

* Credenziali dell'amministratore (la password è nascosta per impostazione predefinita — clicca sull'icona dell'occhio per visualizzarla)
* Impostazioni del portale
* Dettagli della connessione al database

Rivedi attentamente, quindi clicca su **Installa Chamilo** per eseguire l'installazione. Il wizard creerà tutte le tabelle del database, popolerà i dati iniziali e configurerà la piattaforma.

## Passo 7: Installazione Completata

![Passo 7 del wizard di installazione — completamento con consigli sulla sicurezza e link al portale](/.gitbook/assets/install-step7-complete.png)

Dopo che l'installazione è stata completata con successo, il wizard mostra:

* **Consigli per iniziare** — Suggerisce di creare il tuo primo corso per esplorare la piattaforma (come amministratore, devi farlo dal pannello di amministrazione)
* **Raccomandazioni sulla sicurezza**:
  * Rendi la directory `config/` di sola lettura (`chmod 0555`)
  * Elimina la directory `public/main/install/`
* Un **link al tuo portale** per accedere con le credenziali dell'amministratore appena create

## Post-Installazione

Dopo aver completato il wizard:

* **Rimuovi o limita l'accesso al programma di installazione** -- Il wizard non dovrebbe essere accessibile dopo l'installazione. Chamilo di solito lo blocca automaticamente, ma verifica che rivisitando l'URL di installazione si venga reindirizzati alla pagina di login.
* **Configura l'invio delle email** -- Consulta [Configurazione Email](email-configuration.md).
* **Imposta i backup** -- Prima di aggiungere contenuti, configura backup automatici del database e dei file (Chamilo non fornisce una soluzione per questo, ma copiare la cartella var/ e il database sono i 2 elementi più importanti).
* **Rivedi le impostazioni di sicurezza** -- Consulta [Impostazioni di Sicurezza](../platform-settings/security-settings.md).

## Risoluzione dei Problemi

| Problema | Soluzione |
|---------|-----------|
| Pagina vuota all'URL di installazione | Controlla i log degli errori PHP. Cambia temporaneamente in `APP_ENV=dev` nel file .env per visualizzare gli errori nel browser. |
| Connessione al database non riuscita | Verifica le credenziali, conferma che il database esista, controlla che il server del database consenta connessioni dall'host del server web. |
| Errori di permesso negato | Assicurati che `var/` sia scrivibile dall'utente del server web. |
| Asset non caricati (nessun CSS/JS) | Esegui `yarn install && yarn build` per compilare gli asset frontend. |