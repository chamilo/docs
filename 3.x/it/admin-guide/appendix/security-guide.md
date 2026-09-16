# Guida alla sicurezza

Questa guida copre le best practice di sicurezza per l'esecuzione di una piattaforma Chamilo 3.0 in produzione. La sicurezza è una responsabilità condivisa tra il software della piattaforma, la configurazione del server e le pratiche operative continuative.

Per gli strumenti di monitoraggio e audit integrati citati in questa guida (log dei tentativi di accesso, rilevamento delle intrusioni, scansioni della robustezza delle password e controlli di integrità dei file), consultare il capitolo [Sicurezza](../security/README.md).

## Mantenere Chamilo aggiornato

La pratica di sicurezza più importante è mantenere aggiornata l'installazione di Chamilo.

* Iscriversi all'account X di sicurezza Chamilo (@chamilosecurity) o seguire il repository GitHub per gli annunci di rilascio.
* Applicare tempestivamente le patch di sicurezza. Gli aggiornamenti minori all'interno del ramo 3.0 sono progettati per essere applicati in sicurezza.
* Seguire il [processo di aggiornamento](../installation/upgrading.md) per ogni update.

## HTTPS

Servire sempre Chamilo tramite HTTPS in produzione.

* Ottenere un certificato SSL/TLS (Let's Encrypt fornisce certificati gratuiti tramite Certbot).
* Configurare il web server in modo da reindirizzare tutto il traffico HTTP verso HTTPS.
* Abilitare l'intestazione HSTS (HTTP Strict Transport Security) per prevenire gli attacchi di downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Senza HTTPS, le credenziali di accesso, i cookie di sessione e tutti i dati utente vengono trasmessi in chiaro e possono essere intercettati sulla rete.

## Permessi sui file

Limitare i permessi sui file al minimo necessario.

| Percorso | Proprietario | Permessi | Note |
|------|-------|-------------|-------|
| File dell'applicazione (codice sorgente) | root o utente di deploy | 755 (dir), 644 (file) | Il web server necessita di accesso in sola lettura. |
| `var/` | utente del web server | 775 | Deve essere scrivibile per cache Symfony, log e caricamenti di file |
| `.env` | root o utente di deploy | 640 | Contiene segreti. Il web server necessita di accesso in sola lettura durante l'uso normale, ma di accesso in scrittura durante l'installazione. |
| `config/` | root o utente di deploy | 750 | Contiene segreti. Il web server necessita di accesso in sola lettura durante l'uso normale, ma di accesso in scrittura durante l'installazione. |

Non impostare mai i permessi a 777. Non eseguire mai il web server come root.

## Politiche sulle password

Configurare requisiti di password robusti in [Impostazioni di sicurezza](../platform-settings/security-settings.md):

* Lunghezza minima di 8 caratteri (consigliati 12+).
* Richiedere una combinazione di maiuscole, minuscole, numeri e caratteri speciali.
* Valutare l'abilitazione della scadenza delle password per gli ambienti soggetti a conformità.
* Educare gli utenti a scegliere password robuste e uniche.

## Limitazione della frequenza e protezione dalla forza bruta

### Livello applicazione

* Impostare **Numero massimo di tentativi di accesso prima del blocco dell'account** (`login_max_attempt_before_blocking_account`) su un valore basso (ad esempio 5).
* Abilitare il **CAPTCHA** sulla pagina di accesso. Il CAPTCHA è on/off — non viene attivato automaticamente dopo N accessi falliti. Abbinarlo a **Errori CAPTCHA prima del blocco** (`captcha_number_mistakes_to_block_account`) per bloccare un account che continua a fallire il CAPTCHA.
* Esaminare periodicamente il report [Tentativi di accesso](../security/login-attempts.md) per individuare schemi di forza bruta e il report [Simple IDS](../security/simple-ids.md) per altre richieste segnalate (tentativi XSS, path traversal e simili).

### Livello server

Utilizzare **fail2ban** per monitorare i fallimenti di accesso e bloccare gli indirizzi IP offensivi:

```ini
# /etc/fail2ban/jail.d/chamilo.conf
[chamilo]
enabled = true
port = http,https
filter = chamilo-auth
logpath = /path/to/chamilo/var/log/prod.log
maxretry = 5
bantime = 900
```

Creare un filtro corrispondente in `/etc/fail2ban/filter.d/chamilo-auth.conf` per riconoscere le voci di log dei fallimenti di autenticazione.

## Gestione delle sessioni

* Impostare una **durata della sessione** ragionevole (ad es. 3600 secondi / 1 ora) nelle impostazioni di sicurezza.
* Configurare i **flag dei cookie di sessione** nella configurazione Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Only send over HTTPS
          cookie_httponly: true     # Not accessible via JavaScript
          cookie_samesite: lax     # CSRF protection
  ```

* Valutare la disabilitazione di "Remember me" sulle piattaforme con contenuti sensibili.

## Intestazioni di sicurezza HTTP

Configurare il server web in modo che invii le intestazioni di sicurezza:

| Header | Value | Purpose |
|--------|-------|---------|
| `X-Content-Type-Options` | `nosniff` | Impedisce lo sniffing del tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Impedisce il clickjacking tramite iframe. |
| `X-XSS-Protection` | `1; mode=block` | Protezione XSS legacy per i browser più datati. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controlla la fuoriuscita di informazioni nel referrer. |
| `Content-Security-Policy` | Varies | Controlla quali risorse possono essere caricate. Richiede un’impostazione attenta per Chamilo. |

Esempio per Apache:

```apache
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set Referrer-Policy "strict-origin-when-cross-origin"
```

Esempio per Nginx:

```nginx
add_header X-Content-Type-Options "nosniff" always;
add_header X-Frame-Options "SAMEORIGIN" always;
add_header Referrer-Policy "strict-origin-when-cross-origin" always;
```

## Sicurezza del caricamento dei file

* Bloccare le estensioni di file eseguibili (exe, bat, sh, php, phtml, cgi) in [Impostazioni di sicurezza](../platform-settings/security-settings.md).
* Configurare il server web in modo che **non esegua mai i file caricati**. Per Apache, aggiungere all’intera directory var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Analizzare i file caricati con un antivirus (ClamAV) se l’ambiente lo richiede.

## Sicurezza del database

* Utilizzare un **utente di database dedicato** per Chamilo, con soli i privilegi necessari (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX sul database di Chamilo).
* Non utilizzare l’account root del database.
* Assicurarsi che il database non sia accessibile da Internet pubblico. Collegarlo a localhost o a una rete privata.
* Abilitare la registrazione di audit del database negli ambienti soggetti a obblighi di conformità.

## Backup

* Pianificare **backup automatici giornalieri** sia del database sia dei file caricati.
* Conservare i backup in una posizione distinta dal server (offsite o storage cloud).
* Verificare periodicamente il ripristino dei backup per confermare che siano utilizzabili.
* Cifrare i backup se contengono dati sensibili.

Consultare [Backup](../maintenance/backups.md) per istruzioni dettagliate.

## Monitoraggio

* Monitorare i log di Chamilo in `var/log/prod.log` per errori e attività sospette.
* Impostare il monitoraggio del server (CPU, memoria, disco) per rilevare l’esaurimento delle risorse.
* Configurare avvisi per i fallimenti di autenticazione ripetuti.
* Esaminare periodicamente gli account utente per individuare account non autorizzati o inattivi.
* Pianificare i controlli di [integrità dei file](../security/file-integrity.md) (Chamilo 3.0+) in cron per essere avvisati quando i file installati cambiano in modo inatteso, ed eseguire periodicamente il [verificatore della robustezza delle password](../security/password-strength-checker.md), in particolare dopo importazioni massive di utenti.

## Elenco di controllo

Utilizzare questo elenco di controllo in fase di distribuzione o di audit di un’installazione Chamilo:

- [ ] HTTPS abilitato con certificato valido
- [ ] Reindirizzamento da HTTP a HTTPS configurato
- [ ] `APP_ENV=prod` e `APP_DEBUG=0` in `.env`
- [ ] `APP_SECRET` univoco generato
- [ ] Permessi sui file limitati (nessun 777)
- [ ] Policy delle password configurata
- [ ] Tentativi di accesso massimi e CAPTCHA abilitati
- [ ] Estensioni di file eseguibili bloccate
- [ ] Intestazioni di sicurezza configurate sul server web
- [ ] Flag dei cookie di sessione impostati (secure, httponly, samesite)
- [ ] L’utente del database ha privilegi minimi
- [ ] Backup automatici pianificati e verificati
- [ ] Baseline di integrità dei file stabilita e scansione pianificata in cron (Chamilo 3.0+)
- [ ] Monitoraggio dei log attivo
- [ ] La versione di Chamilo è aggiornata