# Impostazioni di sicurezza

Protezione dell'accesso, policy delle password, header di content security, autenticazione a due fattori e sistema leggero di rilevamento delle intrusioni.

Questa pagina riguarda la *policy* di sicurezza. Per gli strumenti di monitoraggio che osservano la piattaforma in base a questa policy (log dei tentativi di accesso, eventi di rilevamento delle intrusioni, scansioni della robustezza delle password e controlli di integrità dei file), vedere [Sicurezza](../security/README.md).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Sicurezza**. Questa categoria contiene **32 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo per lo scripting tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `2fa_enable`

**Abilita 2FA**

Aggiunge campi nella pagina di aggiornamento della password per abilitare la 2FA tramite un'app autenticatore TOTP. Se disabilitata a livello globale, gli utenti non vedranno i campi 2FA e non verrà richiesta la 2FA all'accesso, anche se l'avevano abilitata in precedenza.

*Predefinito: `false`*

### `access_to_personal_file_for_all`

**Accesso ai file personali per tutti**

Consente l'accesso a tutti i file personali senza restrizioni

*Predefinito: `false`*


### `admins_can_set_users_pass`

**Gli amministratori possono impostare manualmente le password degli utenti**

[inferred] Se abilitata, gli amministratori possono impostare manualmente le password degli utenti senza richiedere loro di reimpostarle.

### `allow_captcha`

**CAPTCHA**

Abilita un CAPTCHA nel modulo di accesso, nel modulo di iscrizione e nel modulo di recupero password per evitare attacchi di tipo password hammering

*Predefinito: `false`*

### `allow_online_users_by_status`

**Filtra gli utenti visibili come online**

Limita la visibilità degli utenti online a ruoli utente specifici.

### `allow_strength_pass_checker`

**Verificatore della robustezza della password**

Abilitare questa opzione per aggiungere un indicatore visivo della robustezza della password quando l'utente la modifica. NON impedisce l'inserimento di password deboli: funge solo da aiuto visivo.

*Predefinito: `true`*


### `anonymous_autoprovisioning`

**Auto-provisioning di ulteriori utenti anonimi**

Crea dinamicamente nuovi utenti anonimi per sostenere un elevato traffico di visitatori.

*Predefinito: `false`*


### `captcha_number_mistakes_to_block_account`

**Tolleranza errori CAPTCHA**

Il numero di volte in cui un utente può sbagliare nel riquadro CAPTCHA prima che l'account venga bloccato.

### `captcha_time_to_block`

**Durata del blocco account per CAPTCHA**

Se l'utente raggiunge il massimo di errori consentiti (quando è in uso il CAPTCHA), l'account verrà bloccato per questo numero di minuti.

### `check_password`

**Verifica i requisiti della password**

Abilita la convalida dei requisiti della password definiti sopra durante la creazione o l'aggiornamento della password.

*Predefinito: `false`*


### `file_integrity_check_notify_admins` **v3**

**Destinatari delle notifiche del controllo di integrità dei file**

Elenco di indirizzi e-mail, separati da virgola, da notificare quando una scansione di integrità dei file rileva una modifica. Lasciare vuoto per notificare invece tutti gli amministratori globali.

### `filter_terms`

**Termini da filtrare**

Fornire un elenco di termini, uno per riga, da filtrare dalle pagine web e dalle e-mail. Tali termini verranno sostituiti da ***.

### `force_renew_password_at_first_login`

**Forza il rinnovo della password al primo accesso**

Si tratta di una misura semplice per aumentare la sicurezza del portale, chiedendo agli utenti di cambiare immediatamente la password, in modo che quella trasmessa via e-mail non sia più valida e utilizzino poi una password da loro scelta e nota solo a loro.

*Predefinito: `false`*


### `hide_breadcrumb_if_not_allowed`

**Nascondi il breadcrumb se 'non consentito'**

Se l'utente non è autorizzato ad accedere a una pagina specifica, nasconde anche il breadcrumb. Ciò aumenta la sicurezza evitando la visualizzazione di informazioni non necessarie.

*Predefinito: `false`*


### `login_max_attempt_before_blocking_account`

**Tentativi di accesso massimi prima del blocco**

Numero di tentativi di accesso non riusciti da tollerare prima che l'account utente venga bloccato e debba essere sbloccato da un amministratore.

*Predefinito: `0`*

### `password_requirements`

**Requisiti minimi di sintassi della password**

Definisce la struttura richiesta per le password degli utenti. Esempio: {"min":{"length":8,"lowercase":1,"uppercase":1,"numeric":1,"specials":1}}. Usare "specials" (plurale) per richiedere caratteri speciali.

### `password_rotation_days`

**Intervallo di rotazione della password (giorni)**

Numero di giorni prima che gli utenti debbano ruotare la password (0 = disabilitato).

*Predefinito: `0`*


### `prevent_multiple_simultaneous_login`

**Impedisci accessi simultanei**

Impedisce agli utenti di connettersi con lo stesso account più di una volta. È un'opzione utile sui portali a pagamento per accesso, ma può essere restrittiva in fase di test poiché un solo browser può connettersi con un dato account.

*Predefinito: `false`*

### `proxy_settings`

**Impostazioni proxy**

Alcune funzionalità di Chamilo si connettono all'esterno dal server. Ad esempio per verificare che un contenuto esterno esista quando si crea un collegamento o si mostra una pagina incorporata nel percorso di apprendimento. Se il server Chamilo utilizza un proxy per uscire dalla propria rete, questo è il punto in cui configurarlo.

### `security_block_inactive_users_immediately`

**Blocca immediatamente gli utenti disabilitati**

Blocca immediatamente gli utenti che sono stati disabilitati dall'amministratore tramite la gestione utenti. In caso contrario, gli utenti disabilitati manterranno i privilegi precedenti fino al logout.

*Predefinito: `false`*


### `security_content_policy`

**Content Security Policy**

La Content Security Policy è una misura efficace per proteggere il sito dagli attacchi XSS. Mettendo in whitelist le origini dei contenuti approvati, è possibile impedire al browser di caricare risorse dannose. Questa impostazione è particolarmente complicata da configurare con gli editor WYSIWYG, ma se si aggiungono tutti i domini che si desidera autorizzare per l'inclusione di iframe nell'istruzione child-src, questo esempio dovrebbe funzionare. È possibile impedire l'esecuzione di JavaScript da origini esterne (anche all'interno di immagini SVG) utilizzando un elenco rigoroso nell'argomento 'script-src'. Lasciare vuoto per disabilitare. Impostazione di esempio: default-src 'self'; script-src 'self' 'unsafe-eval' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; child-src 'self' *.youtube.com yt.be *.vimeo.com *.slideshare.com;

### `security_content_policy_report_only`

**Content Security Policy solo in segnalazione**

Questa impostazione consente di sperimentare segnalando ma non applicando alcune Content Security Policy.

### `security_public_key_pins`

**HTTP Public Key Pinning**

HTTP Public Key Pinning protegge il sito dagli attacchi MiTM che utilizzano certificati X.509 fraudolenti. Mettendo in whitelist solo le identità di cui il browser deve fidarsi, gli utenti sono protetti nel caso in cui un'autorità di certificazione sia compromessa.

### `security_public_key_pins_report_only`

**HTTP Public Key Pinning solo in segnalazione**

Questa impostazione consente di sperimentare segnalando ma non applicando alcuni HTTP Public Key Pinning.

### `security_referrer_policy`

**Security Referrer Policy**

La Referrer Policy è una nuova intestazione che consente a un sito di controllare quante informazioni il browser include nella navigazione in uscita da un documento e dovrebbe essere impostata da tutti i siti.

*Predefinito: `origin-when-cross-origin`*


### `security_session_cookie_samesite_none`

**Cookie di sessione samesite**

Abilita il parametro samesite:None per il cookie di sessione. Maggiori informazioni: https://www.chromium.org/updates/same-site e https://developers.google.com/search/blog/2020/01/get-ready-for-new-samesitenone-secure

*Predefinito: `false`*

### `security_strict_transport`

**HTTP Strict Transport Security**

HTTP Strict Transport Security è un'ottima funzionalità da supportare sul sito e rafforza l'implementazione di TLS facendo sì che lo User Agent imponga l'uso di HTTPS. Valore consigliato: 'strict-transport-security: max-age=63072000; includeSubDomains'. Vedere https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Strict-Transport-Security. È possibile includere il suffisso 'preload', ma ciò ha conseguenze sul dominio di primo livello (TLD), quindi probabilmente non va fatto alla leggera. Vedere https://hstspreload.org/. Lasciare vuoto per disabilitare.

### `security_x_content_type_options`

**X-Content-Type-Options**

X-Content-Type-Options impedisce a un browser di tentare il MIME-sniffing del tipo di contenuto e lo costringe a attenersi al content-type dichiarato. L'unico valore valido per questa intestazione è 'nosniff'.

*Predefinito: `nosniff`*


### `security_x_frame_options`

**X-Frame-Options**

X-Frame-Options indica al browser se si desidera consentire o meno che il sito sia inserito in un frame. Impedendo a un browser di inquadrare il sito è possibile difendersi da attacchi come il clickjacking. Se si definisce qui un URL, esso deve definire l'URL (o gli URL) da cui il contenuto deve essere visibile, non gli URL da cui il sito accetta contenuti. Ad esempio, se l'URL principale (root_web sopra) è https://11.chamilo.org/, allora questa impostazione dovrebbe essere: 'ALLOW-FROM https://11.chamilo.org'. Queste intestazioni si applicano solo alle pagine in cui Chamilo è responsabile della generazione delle intestazioni HTTP (cioè i file '.php'). Non si applicano ai file statici. Se si sperimenta con questa funzionalità, assicurarsi di aggiornare anche la configurazione del server web per aggiungere le intestazioni corrette per i file statici. Vedere la documentazione di configurazione CDN sopra (cercare 'add_header') per maggiori informazioni. Valore consigliato (rigoroso) per questa impostazione, se abilitata: 'SAMEORIGIN'.

*Predefinito: `SAMEORIGIN`*


### `security_xss_protection`

**X-XSS-Protection**

X-XSS-Protection imposta la configurazione del filtro cross-site scripting integrato nella maggior parte dei browser. Valore consigliato '1; mode=block'.

*Predefinito: `1; mode=block`*


### `user_reset_password`

**Abilita token di reimpostazione password**

Questa opzione consente di generare un token monouso a scadenza inviato via e-mail all'utente per reimpostare la propria password.

*Predefinito: `false`*

### `user_reset_password_token_limit`

**Limite di tempo per il token di reimpostazione della password**

Il numero di secondi prima che il token generato scada automaticamente e non possa più essere utilizzato (è necessario generarne uno nuovo).

*Predefinito: `3600`*