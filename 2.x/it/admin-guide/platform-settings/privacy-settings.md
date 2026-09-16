# Impostazioni sulla Privacy

Controlli relativi alla privacy e alla protezione dei dati (in stile GDPR) — consenso, esportazione dei dati, richieste di cancellazione dell'account e simili.

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Privacy**. Questa categoria contiene **6 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `data_protection_officer_email`

**Indirizzo e-mail del responsabile della protezione dei dati**

Indirizzo e-mail del responsabile designato per la protezione dei dati, visualizzato nelle sezioni relative a GDPR/privacy.

### `data_protection_officer_name`

**Nome del responsabile della protezione dei dati**

Nome completo del responsabile designato per la protezione dei dati, visualizzato nelle pagine relative ai dati personali e alla privacy.

### `data_protection_officer_role`

**Ruolo del responsabile della protezione dei dati**

Titolo o ruolo del responsabile designato per la protezione dei dati, visualizzato accanto al suo nome nelle informazioni sulla privacy.

### `disable_change_user_visibility_for_public_courses`

**Disabilita la possibilità di rendere visibili gli utenti negli strumenti dei corsi pubblici**

Impedisci a chiunque di rendere visibile lo strumento 'utenti' in un corso pubblico.

*Default: `true`*

### `disable_gdpr`

**Disabilita le funzionalità GDPR**

Se gestisci già la dichiarazione sulla protezione dei dati personali degli utenti altrove, puoi disabilitare questa funzionalità in sicurezza.

*Default: `true`*

### `hide_user_field_from_list`

**Nascondi campi dall'elenco degli utenti nel corso**

Per impostazione predefinita, mostriamo tutti i dati degli utenti nello strumento utenti del corso. Questo array ti consente di specificare quali campi non desideri visualizzare. Riguarda solo i campi principali (non i campi extra).