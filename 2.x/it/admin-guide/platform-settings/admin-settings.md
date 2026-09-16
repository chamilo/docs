# Impostazioni dell'Identità dell'Amministratore

Dettagli di identità e contatto dell'amministratore della piattaforma. Questi valori appaiono nel footer della piattaforma e in alcune email generate dal sistema.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Identità dell'Amministratore**. Questa categoria contiene **12 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `administrator_email`

**Amministratore del Portale: e-mail**

L'indirizzo e-mail dell'Amministratore della Piattaforma (appare nel footer a sinistra)

### `administrator_name`

**Amministratore del Portale: Nome**

Il Nome dell'Amministratore della Piattaforma (appare nel footer a sinistra)

### `administrator_phone`

**Amministratore del Portale: Numero di telefono**

Il numero di telefono dell'Amministratore della Piattaforma (appare nel footer a sinistra)

### `administrator_surname`

**Amministratore del Portale: Cognome**

Il Cognome dell'Amministratore della Piattaforma (appare nel footer a sinistra)

### `chamilo_latest_news`

**Ultime notizie**

Ricevi le ultime notizie da Chamilo, incluse vulnerabilità di sicurezza ed eventi, direttamente nel tuo pannello di amministrazione. Queste notizie verranno controllate sul server delle notizie di Chamilo ogni volta che carichi la pagina di amministrazione e sono visibili solo agli amministratori.

*Default: `true`*

### `chamilo_support`

**Blocco di supporto Chamilo**

Ottieni suggerimenti professionali e un modo semplice per contattare i fornitori di servizi ufficiali per supporto professionale, direttamente dai creatori di Chamilo. Questo blocco appare nella tua pagina di amministrazione, è visibile solo agli amministratori e si aggiorna ogni volta che carichi la pagina di amministrazione.

*Default: `true`*

### `max_anonymous_users`

**Utenti anonimi multipli**

Abilita questa opzione per consentire più utenti di sistema per utenti anonimi. Questo è utile quando si utilizza questa piattaforma come vetrina pubblica per alcuni corsi. Avere più utenti anonimi permetterà il tracciamento durante l'esperienza per diversi utenti senza mescolare i loro dati (che altrimenti potrebbero confonderli).

*Default: `0`*

### `redirect_admin_to_courses_list`

**Reindirizza l'amministratore all'elenco dei corsi**

Il comportamento predefinito è di inviare gli amministratori direttamente al pannello di amministrazione (mentre insegnanti e studenti vengono inviati all'elenco dei corsi o alla homepage della piattaforma). Abilita per reindirizzare anche l'amministratore al suo elenco di corsi.

*Default: `false`*

### `send_inscription_notification_to_general_admin_only`

**Notifica solo l'amministratore globale dei nuovi utenti**

Quando abilitata, solo l'amministratore globale riceve notifiche via email riguardo alle nuove registrazioni di utenti invece di tutti gli amministratori.

*Default: `false`*

### `show_link_request_hrm_user`

**Mostra il link per richiedere un legame tra utente e HRM**

Mostra un link nella pagina del profilo che consente ai direttori delle Risorse Umane di richiedere di essere collegati a un account utente.

*Default: `false`*

### `user_status_option_only_for_admin_enabled`

**Nascondi il ruolo agli utenti normali**

Consente di nascondere il ruolo degli utenti quando questa opzione è impostata su true e l'array seguente imposta il ruolo corrispondente su 'true'.

*Default: `false`*

### `user_status_option_show_only_for_admin`

**Definisci quali ruoli sono nascosti agli utenti normali**

I ruoli impostati su 'true' appariranno solo agli amministratori. Gli altri utenti non saranno in grado di vederli.