# Impostazioni della posta

Come viene costruita la posta in uscita — identità del mittente, layout, firma e indirizzi per scopi speciali.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Posta**. Questa categoria contiene **17 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_email_editor_for_anonymous`

**Editor e-mail per gli anonimi**

Consentire agli utenti anonimi di inviare e-mail dalla piattaforma. Nell'attuale contesto di sicurezza delle informazioni questa non è un'opzione raccomandata.

*Predefinito: `true`*


### `cron_notification_help_desk`

**Indirizzi e-mail a cui inviare i report di esecuzione dei cronjob**

Forniti come array di indirizzi e-mail. Non funziona ancora per tutti i cronjob.

### `mail_content_style`

**Attributi HTML extra del corpo delle e-mail**

Attributi HTML extra da applicare al tag body delle e-mail di notifica generate.

### `mail_header_style`

**Attributi HTML extra dell'intestazione delle e-mail**

Attributi HTML extra da applicare alla sezione di intestazione delle e-mail di notifica generate.

### `mailer_debug_enable`

**Posta: Debug**

Selezionare se si desidera abilitare i log di debug dell'invio delle e-mail. Forniranno maggiori informazioni su ciò che accade durante la connessione al servizio di posta, ma non sono eleganti e potrebbero compromettere il design della pagina. Utilizzare solo in assenza di attività degli utenti.

*Predefinito: `false`*


### `mailer_dkim`

**Posta: intestazioni DKIM**

Inserire un array JSON delle impostazioni di configurazione DKIM (vedere l'esempio).

### `mailer_dsn`

**DSN della posta**

Il DSN include completamente tutti i parametri necessari per connettersi al servizio di posta. Maggiori informazioni sono disponibili all'indirizzo https://symfony.com/doc/7.4/mailer.html#using-built-in-transports. Ecco alcuni esempi di sintassi DSN supportate: https://symfony.com/doc/7.4/mailer.html#using-a-3rd-party-transport. Per Microsoft 365, dove l'SMTP con autenticazione di base è in fase di ritiro, inviare invece tramite Microsoft Graph API con `microsoftgraph+api://CLIENT_ID:CLIENT_SECRET@default?tenantId=TENANT_ID` (codificare in URL qualsiasi carattere speciale nel client secret). Ciò richiede una registrazione di applicazione Entra ID con il permesso applicativo `Mail.Send` — vedere [Configurazione e-mail](../installation/email-configuration.md).

*Predefinito: `null://null`*


### `mailer_exclude_json`

**Posta: evitare l'uso di LD+JSON**

Alcuni client di posta non comprendono il formato descrittivo LD+JSON, mostrandolo all'utente finale come una stringa JSON sciolta. Se è il vostro caso, potreste voler impostare la variabile seguente su 'false' per disabilitare questa intestazione.

*Predefinito: `false`*


### `mailer_from_email`

**Inviare tutte le e-mail da questo indirizzo e-mail**

Imposta l'indirizzo e-mail predefinito utilizzato nel campo "from" delle e-mail.

### `mailer_from_name`

**Inviare tutte le e-mail come provenienti da questo nome (organizzativo)**

Imposta il nome visualizzato predefinito utilizzato per l'invio delle e-mail della piattaforma. ad es. "Support team".

### `mailer_mails_charset`

**Posta: set di caratteri**

Nel caso in cui sia necessario definire il charset da utilizzare nell'invio di tali e-mail. Lasciare vuoto se non si è sicuri.

*Predefinito: `UTF-8`*


### `messages_hide_mail_content`

**Nascondere il contenuto delle e-mail per portare gli utenti sulla piattaforma**

Preferire versioni brevi delle e-mail con un collegamento allo spazio di messaggistica sulla piattaforma per aumentare il coinvolgimento basato sulla piattaforma.

*Predefinito: `false`*


### `notifications_extended_footer_message`

**Piè di pagina esteso delle notifiche**

Aggiungere un piè di pagina extra personalizzato per le e-mail di notifica per una lingua specifica, ad esempio per avvisi sulla privacy. È possibile aggiungere più lingue e paragrafi.

### `send_notification_score_in_percentage`

**Inviare il punteggio in percentuale nella notifica dei risultati dei test**

Invia i punteggi degli esercizi come percentuali invece che come punti nelle e-mail di notifica dei risultati dei test.

*Predefinito: `false`*


### `send_two_inscription_confirmation_mail`

**Inviare 2 e-mail di registrazione**

Inviare due e-mail distinte in fase di registrazione. Una per il nome utente, un'altra per la password.

*Predefinito: `false`*


### `show_user_email_in_notification`

**Mostrare l'indirizzo e-mail del mittente nelle notifiche**

Include l'indirizzo e-mail del mittente insieme al suo nome nelle e-mail di messaggi personali e di notifica.

*Predefinito: `false`*


### `update_users_email_to_dummy_except_admins`

**Aggiornare l'e-mail degli utenti a un valore fittizio durante le importazioni**

Durante le importazioni CSV speciali tramite cron degli utenti, sostituire automaticamente le e-mail con l'e-mail fittizia username@example.com.

*Predefinito: `false`*