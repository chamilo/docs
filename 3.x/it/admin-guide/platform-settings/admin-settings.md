# Impostazioni identità dell'amministratore

Identità e dati di contatto dell'amministratore della piattaforma. Questi valori compaiono nel piè di pagina della piattaforma e in alcune e-mail generate dal sistema.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Identità dell'amministratore**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o per modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `administrator_email`

**Amministratore del portale: e-mail**

L'indirizzo e-mail dell'amministratore della piattaforma (appare nel piè di pagina a sinistra)

### `administrator_name`

**Amministratore del portale: nome**

Il nome dell'amministratore della piattaforma (appare nel piè di pagina a sinistra)

### `administrator_phone`

**Amministratore del portale: numero di telefono**

Il numero di telefono dell'amministratore della piattaforma (appare nel piè di pagina a sinistra)

### `administrator_surname`

**Amministratore del portale: cognome**

Il cognome dell'amministratore della piattaforma (appare nel piè di pagina a sinistra)

### `chamilo_latest_news`

**Ultime notizie**

Ricevere le ultime notizie da Chamilo, comprese le vulnerabilità di sicurezza e gli eventi, direttamente nel pannello di amministrazione. Queste notizie vengono verificate sul server delle notizie di Chamilo ogni volta che si carica la pagina di amministrazione e sono visibili solo agli amministratori.

*Predefinito: `true`*

### `chamilo_support`

**Blocco di supporto Chamilo**

Ottenere suggerimenti professionali e un modo semplice per contattare i fornitori di servizi ufficiali per il supporto professionale, direttamente dai creatori di Chamilo. Questo blocco compare nella pagina di amministrazione, è visibile solo agli amministratori e si aggiorna ogni volta che si carica la pagina di amministrazione.

*Predefinito: `true`*

### `max_anonymous_users`

**Utenti anonimi multipli**

Abilitare questa opzione per consentire più utenti di sistema per gli utenti anonimi. È utile quando si utilizza la piattaforma come vetrina pubblica per alcuni corsi. Disporre di più utenti anonimi consente al tracciamento di funzionare per la durata dell'esperienza per diversi utenti senza mescolare i loro dati (il che altrimenti potrebbe confonderli).

*Predefinito: `0`*

### `redirect_admin_to_courses_list`

**Reindirizzare l'amministratore all'elenco dei corsi**

Il comportamento predefinito è inviare gli amministratori direttamente al pannello di amministrazione (mentre docenti e studenti vengono inviati all'elenco dei corsi o alla homepage della piattaforma). Abilitare per reindirizzare anche l'amministratore al proprio elenco dei corsi.

*Predefinito: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notificare solo all'amministratore globale i nuovi utenti**

Se abilitata, solo l'amministratore globale riceve le notifiche e-mail sulle nuove registrazioni degli utenti, invece di tutti gli amministratori.

*Predefinito: `false`*

### `show_link_request_hrm_user`

**Mostrare il collegamento per richiedere il vincolo tra utente e HRM**

Visualizzare un collegamento nella pagina del profilo che consente ai direttori delle risorse umane di richiedere di essere collegati a un account utente.

*Predefinito: `false`*

### `user_status_option_only_for_admin_enabled`

**Nascondere il ruolo agli utenti normali**

Consente di nascondere il ruolo degli utenti quando questa opzione è impostata su true e l'array seguente imposta il ruolo corrispondente su 'true'.

*Predefinito: `false`*

### `user_status_option_show_only_for_admin`

**Definire quali ruoli sono nascosti agli utenti normali**

I ruoli impostati su 'true' appariranno solo agli amministratori. Gli altri utenti non potranno vederli.