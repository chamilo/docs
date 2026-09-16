# FAQ

Domande frequenti per gli amministratori di Chamilo 3.0.

## Installazione e configurazione

**Q: Quale versione di PHP richiede Chamilo 3.0?**
A: PHP 8.3, 8.4 o 8.5. Vedere [Requisiti del server](../installation/server-requirements.md).

**Q: Posso eseguire Chamilo su un hosting condiviso?**
A: È possibile ma non consigliato. Chamilo 3.0 richiede Composer, Node.js in modalità di sviluppo e accesso alla riga di comando per l'installazione e la manutenzione. Un VPS o un server dedicato offre un'esperienza molto migliore.

**Q: Quale database devo utilizzare?**
A: MySQL 8.0+ o MariaDB 10.4+ sono i più comunemente utilizzati e i meglio testati.

**Q: Posso installare Chamilo senza la riga di comando?**
A: Sì, se si utilizza la versione pacchettizzata (.zip o .tar.gz). In caso contrario, sarà necessaria la riga di comando per installare le dipendenze Composer, compilare gli asset del frontend ed eseguire le migrazioni del database. La procedura guidata basata sul web gestisce la configurazione del database e la configurazione iniziale, ma i passaggi circostanti richiedono l'accesso alla shell in modalità di sviluppo.

## Utenti e autenticazione

**Q: Come reimposto la password di un utente?**
A: Andare su **Amministrazione > Elenco utenti**, trovare l'utente, fare clic su modifica e impostare una nuova password. In alternativa, l'utente può utilizzare il collegamento "Password dimenticata" nella pagina di accesso (se l'email è configurata).

**Q: Posso importare utenti in blocco?**
A: Sì. Andare su **Amministrazione > Importa utenti** e caricare un file CSV o XML con i dati degli utenti. L'importazione supporta la creazione di nuovi utenti e l'aggiornamento di quelli esistenti.

**Q: Come mi integro con LDAP o Active Directory?**
A: Configurare le impostazioni LDAP nella configurazione dell'autenticazione. Vedere [LDAP](../authentication/ldap.md). Gli utenti vengono sincronizzati all'accesso o tramite sincronizzazione pianificata.

**Q: Gli utenti possono appartenere a più sessioni contemporaneamente?**
A: Sì. Gli utenti possono essere iscritti a un numero qualsiasi di sessioni contemporaneamente. Ogni sessione tiene traccia dei progressi in modo indipendente.

## Corsi e contenuti

**Q: Come eseguo il backup di un singolo corso?**
A: All'interno del corso, andare su **Manutenzione > Crea un backup**. Questo genera un archivio scaricabile dei contenuti e delle impostazioni del corso. È possibile ripristinarlo sulla stessa istanza di Chamilo o su un'istanza diversa.

**Q: Posso copiare un corso?**
A: Sì. Utilizzare **Amministrazione > Copia corso** o lo strumento di manutenzione del corso all'interno del corso. È possibile copiare i contenuti tra corsi o creare un nuovo corso a partire da uno esistente.

**Q: Quali versioni di SCORM sono supportate?**
A: Chamilo supporta SCORM 1.2. I pacchetti SCORM vengono importati come percorsi di apprendimento.

**Q: Come limito chi può creare corsi?**
A: Andare su **Amministrazione > Impostazioni di configurazione > Corso** e disattivare **Consenti ai non amministratori (docenti) di creare nuovi corsi** (`allow_users_to_create_courses`). Quando è disattivata, solo gli amministratori possono creare corsi. In alternativa, è possibile impostare un limite al numero di corsi che qualsiasi docente può creare.

## Prestazioni e manutenzione

**Q: La piattaforma è lenta. Cosa devo controllare per primo?**
A: In ordine di impatto: (1) Assicurarsi che `APP_ENV=prod` e `APP_DEBUG=0` in `.env`. (2) Verificare che PHP OPcache sia abilitato. (3) Controllare le prestazioni del database. (4) Vedere [Ottimizzazione delle prestazioni](../platform-settings/performance-tuning.md).

**Q: Come svuoto la cache?**
A: Eseguire `php bin/console cache:clear --env=prod` dalla riga di comando. Non eliminare manualmente la directory `var/cache/` mentre l'applicazione è in esecuzione.

**Q: Quanto spazio su disco necessita Chamilo?**
A: L'applicazione in sé richiede circa 2 GB non compressi. Lo spazio totale dipende dai contenuti caricati (documenti, video, pacchetti SCORM). Monitorare l'utilizzo del disco e pianificare di conseguenza.

**Q: Come configuro i backup automatici?**
A: Vedere [Backup](../maintenance/backups.md). Come minimo, pianificare un dump giornaliero del database e backup regolari a livello di file della directory di upload.

## Email

**Q: Gli utenti non ricevono le email. Cosa devo controllare?**
A: (1) Verificare `MAILER_DSN` in `.env`. (2) Eseguire `php bin/console mailer:test someone@example.com` per il test. (3) Controllare le cartelle spam. (4) Verificare i record DNS SPF/DKIM. Vedere [Configurazione email](../installation/email-configuration.md).

**Q: Posso usare Gmail per inviare email?**
A: Sì, per piattaforme piccole o per lo sviluppo. Utilizzare una password per le app e tenere presente i limiti di invio giornalieri di Gmail (500 email/giorno per gli account normali).

## Sicurezza

**Q: Come forzo HTTPS?**
A: Configurare il server web per reindirizzare HTTP a HTTPS. Inoltre, abilitare l'impostazione "Forza HTTPS" in **Amministrazione > Impostazioni di configurazione > Sicurezza**. Vedere [Impostazioni di sicurezza](../platform-settings/security-settings.md).

**Q: Come blocco gli attacchi brute-force al login?**
A: Configurare il numero massimo di tentativi di accesso e il CAPTCHA nelle impostazioni di sicurezza. Valutare anche l'uso di fail2ban a livello di server per una protezione aggiuntiva.

**Q: Un utente ha dimenticato la password e l'email non funziona. Come lo aiuto?**
A: Come amministratore, modificare direttamente l'account utente e impostare una nuova password. Andare su **Amministrazione > Elenco utenti**, trovare l'account e aggiornare il campo password.

## Aggiornamenti

**D: Posso aggiornare direttamente da Chamilo 2.x a 3.0?**
R: Sì, ma si tratta di una migrazione importante, non di un semplice aggiornamento. Vedere [Aggiornamento](../installation/upgrading.md). Testare sempre prima su un server di staging.

**D: I miei plugin funzioneranno dopo l'aggiornamento a 3.0?**
R: No. I plugin della versione 2.x non sono compatibili con la 3.0 e devono essere riscritti o sostituiti con funzionalità equivalenti della 3.0.