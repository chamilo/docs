# Impostazioni della Posta

Come viene costruita la posta in uscita: identità del mittente, layout, firma e indirizzi per scopi speciali.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Posta**. Questa categoria contiene **18 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati predefiniti delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_email_editor_for_anonymous`

**Editor di e-mail per utenti anonimi**

Consenti agli utenti anonimi di inviare e-mail dalla piattaforma. Nell'era attuale della sicurezza delle informazioni, questa non è un'opzione consigliata.

*Default: `true`*

### `cron_notification_help_desk`

**Indirizzi e-mail per inviare rapporti sull'esecuzione dei cronjob**

Forniti come array di indirizzi e-mail. Non funziona ancora per tutti i cronjob.

### `mail_content_style`

**Attributi extra per il corpo HTML delle e-mail**

Attributi HTML aggiuntivi da applicare al tag body delle e-mail di notifica generate.

### `mail_header_style`

**Attributi extra per l'intestazione HTML delle e-mail**

Attributi HTML aggiuntivi da applicare alla sezione di intestazione delle e-mail di notifica generate.

### `mailer_debug_enable`

**Posta: Debug**

Seleziona se desideri abilitare i log di debug per l'invio delle e-mail. Questi ti forniranno maggiori informazioni su cosa succede durante la connessione al servizio di posta, ma non sono eleganti e potrebbero compromettere il design della pagina. Utilizzali solo quando non c'è attività utente.

*Default: `false`*

### `mailer_dkim`

**Posta: Intestazioni DKIM**

Inserisci un array JSON delle tue impostazioni di configurazione DKIM (vedi esempio).

### `mailer_dsn`

**DSN della Posta**

Il DSN include completamente tutti i parametri necessari per connettersi al servizio di posta. Puoi saperne di più su https://symfony.com/doc/6.4/mailer.html#using-built-in-transports. Ecco alcuni esempi di sintassi DSN supportate: https://symfony.com/doc/6.4/mailer.html#using-a-3rd-party-transport

*Default: `null://null`*

### `mailer_exclude_json`

**Posta: Evita di usare LD+JSON**

Alcuni client di posta non comprendono il formato descrittivo LD+JSON, mostrandolo come una stringa JSON non formattata all'utente finale. Se questo è il tuo caso, potresti voler impostare la variabile sottostante su 'false' per disabilitare questa intestazione.

*Default: `false`*

### `mailer_from_email`

**Invia tutte le e-mail da questo indirizzo e-mail**

Imposta l'indirizzo e-mail predefinito utilizzato nel campo "da" delle e-mail.

### `mailer_from_name`

**Invia tutte le e-mail come provenienti da questo nome (organizzativo)**

Imposta il nome visualizzato predefinito utilizzato per l'invio delle e-mail della piattaforma, ad esempio "Team di supporto".

### `mailer_mails_charset`

**Posta: set di caratteri**

Nel caso in cui sia necessario definire il set di caratteri da utilizzare per l'invio di queste e-mail. Lascia vuoto se non sei sicuro.

*Default: `UTF-8`*

### `mailer_xoauth2`

**Posta: Opzioni XOAuth2**

Se utilizzi un servizio di posta basato su XOAuth2, usa questa impostazione in JSON per salvare la tua configurazione specifica (vedi esempio) e seleziona XOAuth2 nell'impostazione del servizio di posta.

### `messages_hide_mail_content`

**Nascondi il contenuto delle e-mail per portare gli utenti sulla piattaforma**

Preferisci versioni brevi delle e-mail con un link allo spazio di messaggistica sulla piattaforma per aumentare l'engagement basato sulla piattaforma.

*Default: `false`*

### `notifications_extended_footer_message`

**Piè di pagina esteso per le notifiche**

Aggiungi un piè di pagina personalizzato extra per le e-mail di notifica per una lingua specifica, ad esempio per avvisi sulla politica sulla privacy. È possibile aggiungere più lingue e paragrafi.

### `send_notification_score_in_percentage`

**Invia il punteggio in percentuale nella notifica dei risultati del test**

Invia i punteggi degli esercizi come percentuali invece che come punti nelle e-mail di notifica dei risultati dei test.

*Default: `false`*

### `send_two_inscription_confirmation_mail`

**Invia 2 e-mail di registrazione**

Invia due e-mail separate al momento della registrazione. Una per il nome utente, un'altra per la password.

*Default: `false`*

### `show_user_email_in_notification`

**Mostra l'indirizzo e-mail del mittente nelle notifiche**

Include l'indirizzo e-mail del mittente insieme al suo nome nelle e-mail di messaggi personali e notifiche.

*Default: `false`*

### `update_users_email_to_dummy_except_admins`

**Aggiorna l'e-mail degli utenti a un valore fittizio durante le importazioni**

Durante le importazioni speciali di utenti tramite CSV cron, sostituisci automaticamente le e-mail con un indirizzo fittizio username@example.com.

*Default: `false`*