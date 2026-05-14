# FAQ

Domande frequenti per gli amministratori di Chamilo 2.0.

## Installazione e Configurazione

**D: Quale versione di PHP è richiesta per Chamilo 2.0?**  
R: PHP 8.2 o superiore. Si consiglia PHP 8.3. Consulta [Requisiti del Server](../installation/server-requirements.md).

**D: Posso eseguire Chamilo su un hosting condiviso?**  
R: È possibile, ma non consigliato. Chamilo 2.0 richiede Composer, Node.js in modalità sviluppo e accesso alla riga di comando per l'installazione e la manutenzione. Un VPS o un server dedicato offre un'esperienza molto migliore.

**D: Quale database dovrei utilizzare?**  
R: MySQL 8.0+ o MariaDB 10.4+ sono i più comunemente usati e meglio testati.

**D: Posso installare Chamilo senza usare la riga di comando?**  
R: Sì, se utilizzi la versione confezionata (.zip o .tar.gz). Altrimenti, avrai bisogno della riga di comando per installare le dipendenze di Composer, costruire gli asset frontend ed eseguire le migrazioni del database. Il wizard basato sul web gestisce la configurazione del database e l'impostazione iniziale, ma i passaggi circostanti richiedono accesso alla shell in modalità sviluppo.

## Utenti e Autenticazione

**D: Come posso reimpostare la password di un utente?**  
R: Vai su **Amministrazione > Elenco utenti**, trova l'utente, clicca su modifica e imposta una nuova password. In alternativa, l'utente può utilizzare il link "Password dimenticata" nella pagina di accesso (se l'email è configurata).

**D: Posso importare utenti in massa?**  
R: Sì. Vai su **Amministrazione > Importa utenti** e carica un file CSV o XML con i dati degli utenti. L'importazione supporta la creazione di nuovi utenti e l'aggiornamento di quelli esistenti.

**D: Come posso integrare con LDAP o Active Directory?**  
R: Configura le impostazioni LDAP nella configurazione dell'autenticazione. Consulta [LDAP](../authentication/ldap.md). Gli utenti vengono sincronizzati al momento del login o tramite una sincronizzazione programmata.

**D: Gli utenti possono appartenere a più sessioni contemporaneamente?**  
R: Sì. Gli utenti possono essere iscritti a qualsiasi numero di sessioni contemporaneamente. Ogni sessione tiene traccia dei progressi in modo indipendente.

## Corsi e Contenuti

**D: Come posso fare il backup di un singolo corso?**  
R: All'interno del corso, vai su **Manutenzione > Crea un backup**. Questo genera un archivio scaricabile del contenuto e delle impostazioni del corso. Puoi ripristinarlo sulla stessa istanza di Chamilo o su un'altra.

**D: Posso copiare un corso?**  
R: Sì. Usa **Amministrazione > Copia corso** o lo strumento di manutenzione del corso all'interno del corso stesso. Puoi copiare contenuti tra corsi o creare un nuovo corso da uno esistente.

**D: Quali versioni di SCORM sono supportate?**  
R: Chamilo supporta SCORM 1.2. I pacchetti SCORM vengono importati come percorsi di apprendimento.

**D: Come posso limitare chi può creare corsi?**  
R: Vai su **Amministrazione > Impostazioni di configurazione > Corso** e disabilita **Consenti ai non amministratori (docenti) di creare nuovi corsi** (`allow_users_to_create_courses`). Quando disabilitato, solo gli amministratori possono creare corsi. In alternativa, puoi impostare un limite al numero di corsi che un docente può creare.

## Prestazioni e Manutenzione

**D: La piattaforma è lenta. Cosa dovrei controllare per primo?**  
R: In ordine di impatto: (1) Assicurati che `APP_ENV=prod` e `APP_DEBUG=0` in `.env`. (2) Verifica che PHP OPcache sia abilitato. (3) Controlla le prestazioni del database. (4) Consulta [Ottimizzazione delle Prestazioni](../platform-settings/performance-tuning.md).

**D: Come posso svuotare la cache?**  
R: Esegui `php bin/console cache:clear --env=prod` dalla riga di comando. Non eliminare manualmente la directory `var/cache/` mentre l'applicazione è in esecuzione.

**D: Quanto spazio su disco richiede Chamilo?**  
R: L'applicazione stessa richiede circa 2 GB decompressi. Lo spazio totale dipende dai contenuti caricati (documenti, video, pacchetti SCORM). Monitora l'uso del disco e pianifica di conseguenza.

**D: Come posso configurare backup automatici?**  
R: Consulta [Backup](../maintenance/backups.md). Come minimo, programma un dump giornaliero del database e backup regolari a livello di file della directory di upload.

## Email

**D: Gli utenti non ricevono email. Cosa dovrei controllare?**  
R: (1) Verifica `MAILER_DSN` in `.env`. (2) Esegui `php bin/console mailer:test someone@example.com` per testare. (3) Controlla le cartelle spam. (4) Verifica i record DNS SPF/DKIM. Consulta [Configurazione Email](../installation/email-configuration.md).

**D: Posso usare Gmail per inviare email?**  
R: Sì, per piattaforme piccole o in sviluppo. Usa una Password App e tieni presente i limiti di invio giornalieri di Gmail (500 email/giorno per account regolari).

## Sicurezza

**D: Come posso forzare HTTPS?**  
R: Configura il tuo server web per reindirizzare HTTP a HTTPS. Inoltre, abilita l'impostazione "Forza HTTPS" in **Amministrazione > Impostazioni di configurazione > Sicurezza**. Consulta [Impostazioni di Sicurezza](../platform-settings/security-settings.md).

**D: Come posso bloccare attacchi di forza bruta al login?**  
R: Configura il numero massimo di tentativi di accesso e il CAPTCHA nelle impostazioni di sicurezza. Considera anche l'uso di fail2ban a livello di server per una protezione aggiuntiva.

**D: Un utente ha dimenticato la password e l'email non funziona. Come posso aiutarlo?**  
R: Come amministratore, modifica direttamente l'account dell'utente e imposta una nuova password. Vai su **Amministrazione > Elenco utenti**, trova l'account e aggiorna il campo della password.

---
## Aggiornamenti

**D: Posso aggiornare direttamente da Chamilo 1.11.x a 2.0?**  
R: Sì, ma si tratta di una migrazione importante, non di un semplice aggiornamento. Consulta la sezione [Aggiornamento](../installation/upgrading.md). Esegui sempre un test su un server di staging prima di procedere.

**D: I miei plugin funzioneranno dopo l'aggiornamento a 2.0?**  
R: No. I plugin di 1.11.x non sono compatibili con la versione 2.0 e devono essere riscritti o sostituiti con funzionalità equivalenti della versione 2.0.