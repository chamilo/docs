# Impostazioni di Sicurezza

Protezione dell'accesso, politica delle password, intestazioni di sicurezza dei contenuti, autenticazione a due fattori e il sistema leggero di rilevamento delle intrusioni.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Sicurezza**. Questa categoria contiene **31 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `2fa_enable`

**Abilita 2FA**

Aggiunge campi nella pagina di aggiornamento della password per abilitare l'autenticazione a due fattori (2FA) utilizzando un'app di autenticazione TOTP. Quando disabilitata a livello globale, gli utenti non vedranno i campi per il 2FA e non saranno richiesti di utilizzarlo al momento dell'accesso, anche se lo avevano abilitato in precedenza.

*Predefinito: `false`*

### `access_to_personal_file_for_all`

**Accesso ai file personali per tutti**

Consente l'accesso a tutti i file personali senza restrizioni.

*Predefinito: `false`*

### `admins_can_set_users_pass`

**Gli amministratori possono impostare manualmente le password degli utenti**

[dedotto] Quando abilitata, gli amministratori possono impostare manualmente le password degli utenti direttamente senza richiedere agli utenti di reimpostarle.

### `allow_captcha`

**CAPTCHA**

Abilita un CAPTCHA nel modulo di accesso, nel modulo di registrazione e nel modulo di recupero password per evitare attacchi di forza bruta sulle password.

*Predefinito: `false`*

### `allow_online_users_by_status`

**Filtra gli utenti visibili come online**

Limita la visibilità degli utenti online a specifici ruoli utente.

### `allow_strength_pass_checker`

**Controllo della forza della password**

Abilita questa opzione per aggiungere un indicatore visivo della forza della password quando l'utente cambia la propria password. Questo NON impedirà l'inserimento di password deboli, agisce solo come un aiuto visivo.

*Predefinito: `true`*

### `anonymous_autoprovisioning`

**Auto-provisioning di utenti anonimi aggiuntivi**

Crea dinamicamente nuovi utenti anonimi per supportare un alto traffico di visitatori.

*Predefinito: `false`*

### `captcha_number_mistakes_to_block_account`

**Numero di errori CAPTCHA consentiti**

Il numero di volte che un utente può sbagliare nel box CAPTCHA prima che il suo account venga bloccato.

### `captcha_time_to_block`

**Tempo di blocco account per CAPTCHA**

Se l'utente raggiunge il numero massimo di errori di accesso consentiti (quando utilizza il CAPTCHA), il suo account verrà bloccato per questo numero di minuti.

### `check_password`

**Verifica dei requisiti della password**

Abilita la validazione dei requisiti della password definiti sopra durante la creazione o l'aggiornamento della password.

*Predefinito: `false`*

### `filter_terms`

**Filtra termini**

Fornisci un elenco di termini, uno per riga, da filtrare dalle pagine web e dalle e-mail. Questi termini verranno sostituiti con ***.

### `force_renew_password_at_first_login`

**Forza il rinnovo della password al primo accesso**

Questa è una misura semplice per aumentare la sicurezza del tuo portale chiedendo agli utenti di cambiare immediatamente la propria password, in modo che quella inviata via e-mail non sia più valida e utilizzino una password che hanno scelto loro e che solo loro conoscono.

*Predefinito: `false`*

### `hide_breadcrumb_if_not_allowed`

**Nascondi breadcrumb se 'non consentito'**

Se l'utente non è autorizzato ad accedere a una specifica pagina, nasconde anche il breadcrumb. Questo aumenta la sicurezza evitando la visualizzazione di informazioni non necessarie.

*Predefinito: `false`*

### `login_max_attempt_before_blocking_account`

**Numero massimo di tentativi di accesso prima del blocco**

Numero di tentativi di accesso falliti da tollerare prima che l'account utente venga bloccato e debba essere sbloccato da un amministratore.

*Predefinito: `0`*

### `password_requirements`

**Requisiti minimi di sintassi della password**

Definisce la struttura richiesta per le password degli utenti. Esempio: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Usa "specials" (plurale) per richiedere caratteri speciali.

### `password_rotation_days`

**Intervallo di rotazione della password (giorni)**

Numero di giorni prima che gli utenti debbano cambiare la propria password (0 = disabilitato).

*Predefinito: `0`*

### `prevent_multiple_simultaneous_login`

**Impedisci accessi simultanei**

Impedisce agli utenti di connettersi con lo stesso account più di una volta. Questa è una buona opzione per portali a pagamento per accesso, ma potrebbe essere restrittiva durante i test poiché solo un browser può connettersi con un dato account.

*Predefinito: `false`*

### `proxy_settings`

**Impostazioni proxy**

Alcune funzionalità di Chamilo si connettono all'esterno dal server. Ad esempio, per verificare che un contenuto esterno esista quando si crea un link o si mostra una pagina incorporata nel percorso di apprendimento. Se il tuo server Chamilo utilizza un proxy per uscire dalla sua rete, questo è il posto dove configurarlo.

### `security_block_inactive_users_immediately`

**Blocca immediatamente gli utenti disabilitati**

Blocca immediatamente gli utenti che sono stati disabilitati dall'amministratore tramite la gestione utenti. Altrimenti, gli utenti disabilitati manterranno i loro privilegi precedenti fino al logout.

*Predefinito: `false`*

---
### `security_content_policy`

**Politica di Sicurezza dei Contenuti**

La Politica di Sicurezza dei Contenuti è una misura efficace per proteggere il tuo sito da attacchi XSS. Autorizzando solo le fonti di contenuto approvate, puoi impedire al browser di caricare risorse malevole. Questa impostazione è particolarmente complessa da configurare con editor WYSIWYG, ma se aggiungi tutti i domini che desideri autorizzare per l'inclusione di iframe nella dichiarazione child-src, questo esempio dovrebbe funzionare per te. Puoi impedire l'esecuzione di JavaScript da fonti esterne (inclusi quelli all'interno di immagini SVG) utilizzando un elenco rigoroso nell'argomento 'script-src'. Lascia vuoto per disabilitare. Esempio di impostazione: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Politica di Sicurezza dei Contenuti solo in modalità report**

Questa impostazione ti consente di sperimentare riportando ma non applicando alcune Politiche di Sicurezza dei Contenuti.

### `security_public_key_pins`

**HTTP Public Key Pinning**

L'HTTP Public Key Pinning protegge il tuo sito da attacchi MiTM che utilizzano certificati X.509 non autorizzati. Autorizzando solo le identità che il browser dovrebbe considerare affidabili, i tuoi utenti sono protetti nel caso in cui un'autorità di certificazione venga compromessa.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning solo in modalità report**

Questa impostazione ti consente di sperimentare riportando ma non applicando alcune configurazioni di HTTP Public Key Pinning.

### `security_referrer_policy`

**Politica di Riferimento per la Sicurezza**

La Politica di Riferimento è un nuovo header che consente a un sito di controllare quante informazioni il browser include durante la navigazione lontano da un documento e dovrebbe essere impostata da tutti i siti.

*Default: `origin-when-cross-origin`*

### `security_session_cookie_samesite_none`

**Cookie di sessione samesite**

Abilita il parametro samesite:None per il cookie di sessione. Maggiori informazioni: https://www.chromium.org/updates/same-site e https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Default: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

L'HTTP Strict Transport Security è una funzionalità eccellente da supportare sul tuo sito e rafforza la tua implementazione di TLS obbligando l'User Agent a utilizzare HTTPS. Valore consigliato: 'strict-transport-security: max-age=63072000; includeSubDomains'. Consulta https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. Puoi includere il suffisso 'preload', ma questo ha conseguenze sul dominio di primo livello (TLD), quindi probabilmente non va fatto alla leggera. Consulta https://hstspreload.org/. Lascia vuoto per disabilitare.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options impedisce al browser di tentare di indovinare il tipo di contenuto tramite MIME-sniffing e lo obbliga a rispettare il tipo di contenuto dichiarato. L'unico valore valido per questo header è 'nosniff'.

*Default: `nosniff`*

### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indica al browser se desideri consentire che il tuo sito venga incorporato in un frame o meno. Impedendo al browser di incorporare il tuo sito, puoi difenderti da attacchi come il clickjacking. Se definisci un URL qui, dovrebbe specificare l'URL o gli URL da cui il tuo contenuto dovrebbe essere visibile, non gli URL da cui il tuo sito accetta contenuti. Ad esempio, se il tuo URL principale (root_web sopra) è https://11.chamilo.org/, allora questa impostazione dovrebbe essere: 'ALLOW-FROM https://11.chamilo.org'. Questi header si applicano solo alle pagine in cui Chamilo è responsabile della generazione degli header HTTP (cioè i file '.php'). Non si applicano ai file statici. Se stai sperimentando con questa funzionalità, assicurati di aggiornare anche la configurazione del tuo server web per aggiungere gli header corretti per i file statici. Consulta la documentazione sulla configurazione CDN sopra (cerca 'add_header') per maggiori informazioni. Valore consigliato (rigoroso) per questa impostazione, se abilitata: 'SAMEORIGIN'.

*Default: `SAMEORIGIN`*

### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection imposta la configurazione per il filtro di cross-site scripting integrato nella maggior parte dei browser. Valore consigliato '1; mode=block'.

*Default: `1; mode=block`*

### `user_reset_password`

**Abilita token di reimpostazione password**

Questa opzione consente di generare un token monouso a scadenza inviato tramite e-mail all'utente per reimpostare la propria password.

*Default: `false`*

### `user_reset_password_token_limit`

**Limite di tempo per il token di reimpostazione password**

Il numero di secondi prima che il token generato scada automaticamente e non possa più essere utilizzato (sarà necessario generare un nuovo token).

*Default: `3600`*