# Procedura guidata di installazione

Chamilo 3.0 include una procedura guidata di installazione basata sul web che vi accompagna nella configurazione iniziale. La procedura si avvia automaticamente al primo accesso alla piattaforma.

## Prima di iniziare

Assicuratevi che siano soddisfatti i seguenti prerequisiti:

1. Il server soddisfa tutti i [requisiti del server](server-requirements.md).
2. Avete scaricato una versione pacchettizzata (zip o tar.gz) di Chamilo.
3. Il server web è configurato per servire la directory `public/` come document root.
4. Il file `.env` esiste ed è vuoto (la procedura guidata vi accompagnerà nella configurazione del database).

## Passo 1: Lingua di installazione

![Procedura guidata di installazione Passo 1 — selezione della lingua](/.gitbook/assets/install-step1-language.png)

Il primo passo consente di selezionare la lingua del processo di installazione. Scegliete la lingua preferita dal menu a discesa.

Se Chamilo rileva un'installazione esistente (per un aggiornamento), visualizzerà lo stato della migrazione e proporrà un percorso di aggiornamento invece di un'installazione da zero.

## Passo 2: Verifica dei requisiti

![Procedura guidata di installazione Passo 2 — verifica dei requisiti con versione PHP, estensioni e permessi delle directory](/.gitbook/assets/install-step2-requirements.png)

La procedura guidata verifica l'ambiente del server:

* La **versione PHP** è 8.3, 8.4 o 8.5
* Le **estensioni PHP richieste** sono installate (intl, gd, curl, zip, mbstring, xml, ecc.)
* Le **impostazioni PHP consigliate** — `date.timezone` è configurato, limiti di upload/memoria adeguati
* I **permessi di directory e file** — `var/`, `config/` e `public/upload/` sono scrivibili dal server web

Se uno o più requisiti non sono soddisfatti, la procedura visualizza avvisi o errori. Risolveteli prima di proseguire.

## Passo 3: Licenza

![Procedura guidata di installazione Passo 3 — accettazione della licenza](/.gitbook/assets/install-step3-license.png)

Questo passo mostra la licenza GNU/GPLv3. È necessario selezionare la casella **"Accetto"** per proseguire.

Facoltativamente, potete espandere la sezione **Informazioni di contatto** per fornire i dati della vostra organizzazione (nome, e-mail, azienda, Paese). Si tratta di un'indicazione volontaria che aiuta la comunità Chamilo a comprendere chi utilizza la piattaforma, ma ci consentirà anche di contattarvi *molto raramente* in merito a eventi che si svolgono vicino a voi.

## Passo 4: Impostazioni del database

![Procedura guidata di installazione Passo 4 — configurazione della connessione al database](/.gitbook/assets/install-step4-database.png)

Inserite i dettagli di connessione al database:

| Campo | Descrizione |
|-------|-------------|
| **Host del database** | Il nome host o l'IP del server di database (ad es. `localhost` o `127.0.0.1`) |
| **Porta del database** | Predefinita: 3306 per MySQL/MariaDB |
| **Nome del database** | Il nome del database da utilizzare (solo caratteri alfanumerici e underscore) |
| **Utente del database** | Un utente del database con privilegi completi sul database specificato |
| **Password del database** | La password dell'utente del database |

Fate clic su **Verifica connessione al database** per eseguire il test. La procedura non consentirà di proseguire finché la connessione non avrà esito positivo. Se il database esiste già, viene visualizzato un avviso.

## Passo 5: Impostazioni di configurazione

![Procedura guidata di installazione Passo 5 — account amministratore, impostazioni del portale e configurazione e-mail](/.gitbook/assets/install-step5-config.png)

Questo passo combina la creazione dell'account amministratore, le impostazioni del portale e la configurazione e-mail.

### Account amministratore

| Campo | Descrizione |
|-------|-------------|
| **Login** | Il nome utente dell'amministratore |
| **Password** | Scegliete una password robusta — questo account ha accesso completo alla piattaforma |
| **Nome** | Il nome dell'amministratore |
| **Cognome** | Il cognome dell'amministratore |
| **E-mail** | Utilizzata per le notifiche di sistema e il ripristino della password |
| **Telefono** | Numero di contatto facoltativo |

Questi dati dell'amministratore verranno utilizzati da Chamilo anche per compilare i recapiti di supporto: assicuratevi quindi di riconfigurarli nelle impostazioni al termine dell'installazione.

### Impostazioni del portale

| Campo | Descrizione |
|-------|-------------|
| **Lingua** | La lingua predefinita dell'interfaccia |
| **Nome del portale** | Il nome della piattaforma (ad es. "LMS della mia organizzazione") |
| **Nome breve dell'azienda** | Il nome abbreviato della vostra organizzazione |
| **URL dell'azienda** | Il sito web della vostra organizzazione |
| **Metodo di cifratura** | Algoritmo di hashing delle password — si consiglia **bcrypt** |
| **Consenti auto-registrazione** | Sì / No / Dopo approvazione |
| **Consenti auto-registrazione come formatore** | Sì / No |

### Configurazione e-mail

La sezione delle impostazioni e-mail consente di configurare il trasporto della posta (SMTP, Amazon SES, Mailjet, ecc.) e di verificare la consegna dei messaggi. Per i dettagli, consultate [Configurazione e-mail](email-configuration.md).

Tutte queste impostazioni possono essere modificate in seguito dal pannello di amministrazione.

## Passo 6: Ultimo controllo prima dell'installazione

![Installazione guidata Passo 6 — riepilogo di tutte le impostazioni prima dell'installazione](/.gitbook/assets/install-step6-review.png)

Questo passo mostra un riepilogo di tutto ciò che è stato inserito, per la revisione:

* Credenziali dell'amministratore (la password è nascosta per impostazione predefinita — fare clic sull'icona dell'occhio per visualizzarla)
* Impostazioni del portale
* Dettagli di connessione al database

Controllare con attenzione, quindi fare clic su **Install Chamilo** per eseguire l'installazione. La procedura guidata crea tutte le tabelle del database, popola i dati iniziali e configura la piattaforma.

## Passo 7: Installazione completata

![Installazione guidata Passo 7 — completamento con consigli di sicurezza e collegamento al portale](/.gitbook/assets/install-step7-complete.png)

Dopo il completamento corretto dell'installazione, la procedura guidata mostra:

* **Consigli per iniziare** — Suggerisce di creare il primo corso per esplorare la piattaforma (come amministratore, è necessario farlo dal pannello di amministrazione)
* **Raccomandazioni di sicurezza**:
  * Impostare la directory `config/` in sola lettura (`chmod 0555`)
  * Eliminare la directory `public/main/install/`
* Un **collegamento al portale** per accedere con le credenziali di amministratore appena create

## Post-installazione

Dopo aver completato la procedura guidata:

* **Rimuovere o limitare l'accesso all'installer** -- La procedura guidata non deve essere accessibile dopo l'installazione. Chamilo in genere la blocca automaticamente, ma verificare che, visitando di nuovo l'URL di installazione, si venga reindirizzati alla pagina di accesso.
* **Configurare l'invio delle e-mail** -- Vedere [Configurazione e-mail](email-configuration.md).
* **Impostare i backup** -- Prima di aggiungere contenuti, configurare backup automatici del database e dei file (Chamilo non fornisce una soluzione per questo, ma copiare la cartella var/ e il database sono i 2 elementi più importanti).
* **Rivedere le impostazioni di sicurezza** -- Vedere [Impostazioni di sicurezza](../platform-settings/security-settings.md).

## Risoluzione dei problemi

| Problema | Soluzione |
|---------|----------|
| Pagina vuota all'URL di installazione | Controllare i log degli errori PHP. Impostare temporaneamente `APP_ENV=dev` in .env per visualizzare gli errori nel browser. |
| Connessione al database non riuscita | Verificare le credenziali, confermare che il database esista, controllare che il server del database consenta le connessioni dall'host del server web. |
| Errori di permesso negato | Assicurarsi che `var/` sia scrivibile dall'utente del server web. |
| Asset non caricati (nessun CSS/JS) | Eseguire `yarn install && yarn build` per compilare gli asset del frontend. |