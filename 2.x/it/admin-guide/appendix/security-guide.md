# Guida alla Sicurezza

Questa guida tratta le migliori pratiche di sicurezza per gestire una piattaforma Chamilo 2.0 in produzione. La sicurezza è una responsabilità condivisa tra il software della piattaforma, la configurazione del server e le pratiche operative continue.

## Mantieni Chamilo Aggiornato

La pratica di sicurezza più importante è mantenere aggiornata la tua installazione di Chamilo.

* Iscriviti all'account X di sicurezza di Chamilo (@chamilosecurity) o segui il repository GitHub per gli annunci di rilascio.
* Applica tempestivamente le patch di sicurezza. Gli aggiornamenti minori all'interno del ramo 2.0 sono progettati per essere sicuri da applicare.
* Segui il [processo di aggiornamento](../installation/upgrading.md) per ogni aggiornamento.

## HTTPS

Servi sempre Chamilo tramite HTTPS in produzione.

* Ottieni un certificato SSL/TLS (Let's Encrypt fornisce certificati gratuiti tramite Certbot).
* Configura il tuo server web per reindirizzare tutto il traffico HTTP a HTTPS.
* Abilita l'intestazione HSTS (HTTP Strict Transport Security) per prevenire attacchi di downgrade:

  ```
  Strict-Transport-Security: max-age=31536000; includeSubDomains
  ```

Senza HTTPS, le credenziali di accesso, i cookie di sessione e tutti i dati degli utenti vengono trasmessi in chiaro e possono essere intercettati sulla rete.

## Permessi dei File

Limita i permessi dei file al minimo necessario.

| Percorso | Proprietario | Permessi | Note |
|----------|--------------|----------|------|
| File dell'applicazione (codice sorgente) | root o utente di distribuzione | 755 (directory), 644 (file) | Il server web necessita di accesso in sola lettura. |
| `var/` | utente del server web | 775 | Deve essere scrivibile per la cache di Symfony, i log e il caricamento dei file |
| `.env` | root o utente di distribuzione | 640 | Contiene segreti. Il server web necessita di accesso in sola lettura durante l'uso normale, ma necessita di accesso in scrittura durante l'installazione. |
| `config/` | root o utente di distribuzione | 750 | Contiene segreti. Il server web necessita di accesso in sola lettura durante l'uso normale, ma necessita di accesso in scrittura durante l'installazione. |

Non impostare mai i permessi a 777. Non eseguire mai il server web come root.

## Politiche per le Password

Configura requisiti rigorosi per le password nelle [Impostazioni di Sicurezza](../platform-settings/security-settings.md):

* Lunghezza minima di 8 caratteri (12+ consigliati).
* Richiedi una combinazione di maiuscole, minuscole, numeri e caratteri speciali.
* Considera l'attivazione della scadenza delle password per ambienti soggetti a conformità.
* Educa gli utenti a scegliere password forti e uniche.

## Limitazione della Frequenza e Protezione da Attacchi Brute-Force

### Livello Applicativo

* Imposta **Numero massimo di tentativi di accesso prima del blocco dell'account** (`login_max_attempt_before_blocking_account`) a un valore basso (ad esempio 5).
* Abilita il **CAPTCHA** nella pagina di accesso. Il CAPTCHA è attivo/disattivo — non si attiva automaticamente dopo N tentativi falliti. Abbinalo a **Errori CAPTCHA prima del blocco** (`captcha_number_mistakes_to_block_account`) per bloccare un account che continua a fallire il CAPTCHA.

### Livello Server

Usa **fail2ban** per monitorare i fallimenti di accesso e bloccare gli indirizzi IP offensivi:

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

Crea un filtro corrispondente in `/etc/fail2ban/filter.d/chamilo-auth.conf` per abbinare le voci di log relative ai fallimenti di autenticazione.

## Gestione delle Sessioni

* Imposta una **durata della sessione** ragionevole (ad esempio, 3600 secondi / 1 ora) nelle impostazioni di sicurezza.
* Configura i **flag dei cookie di sessione** nella tua configurazione Symfony:

  ```yaml
  # config/packages/framework.yaml
  framework:
      session:
          cookie_secure: true      # Invia solo tramite HTTPS
          cookie_httponly: true     # Non accessibile tramite JavaScript
          cookie_samesite: lax     # Protezione CSRF
  ```

* Considera di disabilitare "Ricordami" su piattaforme con contenuti sensibili.

## Intestazioni di Sicurezza HTTP

Configura il tuo server web per inviare intestazioni di sicurezza:

| Intestazione | Valore | Scopo |
|--------------|--------|-------|
| `X-Content-Type-Options` | `nosniff` | Previene il rilevamento del tipo MIME. |
| `X-Frame-Options` | `SAMEORIGIN` | Previene il clickjacking tramite iframe. |
| `X-XSS-Protection` | `1; mode=block` | Protezione XSS legacy per browser più vecchi. |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controlla la perdita di informazioni sui referrer. |
| `Content-Security-Policy` | Varia | Controlla quali risorse possono essere caricate. Richiede un'attenta regolazione per Chamilo. |

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

## Sicurezza del Caricamento dei File

* Blocca le estensioni di file eseguibili (exe, bat, sh, php, phtml, cgi) nelle [Impostazioni di Sicurezza](../platform-settings/security-settings.md).
* Configura il tuo server web per **non eseguire mai i file caricati**. Per Apache, aggiungi al'intera directory var/:

  ```apache
  <Directory /path/to/chamilo/var>
      php_admin_flag engine off
      RemoveHandler .php .phtml .php3 .php5
  </Directory>
  ```

* Scansiona i file caricati con un antivirus (ClamAV) se il tuo ambiente lo richiede.

## Sicurezza del Database

* Utilizza un **utente del database dedicato** per Chamilo con solo i privilegi necessari (SELECT, INSERT, UPDATE, DELETE, CREATE, ALTER, DROP, INDEX sul database di Chamilo).
* Non utilizzare l'account root del database.
* Assicurati che il database non sia accessibile da internet pubblico. Collegalo a localhost o a una rete privata.
* Abilita il logging di audit del database per ambienti sensibili alla conformità.

## Backup

* Pianifica **backup automatizzati giornalieri** sia del database che dei file caricati.
* Conserva i backup in una posizione separata dal server (offsite o archiviazione cloud).
* Testa periodicamente il ripristino dei backup per verificare che siano utilizzabili.
* Cripta i backup se contengono dati sensibili.

Consulta [Backup](../maintenance/backups.md) per istruzioni dettagliate.

## Monitoraggio

* Monitora i log di Chamilo in `var/log/prod.log` per errori e attività sospette.
* Configura il monitoraggio del server (CPU, memoria, disco) per rilevare l'esaurimento delle risorse.
* Imposta avvisi per tentativi di autenticazione ripetuti falliti.
* Rivedi periodicamente gli account utente per individuare account non autorizzati o inattivi.

## Lista di Controllo

Utilizza questa lista di controllo durante l'implementazione o la verifica di un'installazione di Chamilo:

- [ ] HTTPS abilitato con certificato valido
- [ ] Reindirizzamento da HTTP a HTTPS configurato
- [ ] `APP_ENV=prod` e `APP_DEBUG=0` in `.env`
- [ ] `APP_SECRET` univoco generato
- [ ] Permessi dei file limitati (nessun 777)
- [ ] Politica delle password configurata
- [ ] Tentativi massimi di accesso e CAPTCHA abilitati
- [ ] Estensioni di file eseguibili bloccate
- [ ] Intestazioni di sicurezza configurate sul server web
- [ ] Flag dei cookie di sessione impostati (secure, httponly, samesite)
- [ ] Utente del database con privilegi minimi
- [ ] Backup automatizzati pianificati e testati
- [ ] Monitoraggio dei log attivo
- [ ] Versione di Chamilo aggiornata