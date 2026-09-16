# Impostazioni sulla privacy

Controlli su privacy e protezione dei dati (in stile GDPR) — consenso, esportazione dei dati, richieste di cancellazione dell’account e analoghi.

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Privacy**. Questa categoria contiene **6 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è indicato in monospazio. Utilizzarlo per gli script tramite API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `data_protection_officer_email`

**Indirizzo e-mail del responsabile della protezione dei dati**

Indirizzo e-mail del responsabile della protezione dei dati designato, visualizzato nelle sezioni GDPR/privacy.

### `data_protection_officer_name`

**Nome del responsabile della protezione dei dati**

Nome completo del responsabile della protezione dei dati designato, visualizzato nelle pagine sui dati personali e sulla privacy.

### `data_protection_officer_role`

**Ruolo del responsabile della protezione dei dati**

Titolo professionale o ruolo del responsabile della protezione dei dati designato, visualizzato accanto al nome nelle informazioni sulla privacy.

### `disable_change_user_visibility_for_public_courses`

**Disabilitare la visibilità degli utenti dello strumento nei corsi pubblici**

Impedire a chiunque di rendere visibile lo strumento «utenti» in un corso pubblico.

*Predefinito: `true`*

### `disable_gdpr`

**Disabilitare le funzionalità GDPR**

Se la dichiarazione di protezione dei dati personali verso gli utenti è già gestita altrove, è possibile disabilitare in sicurezza questa funzionalità.

*Predefinito: `true`*

### `hide_user_field_from_list`

**Nascondere campi dall’elenco utenti nel corso**

Per impostazione predefinita, nello strumento utenti del corso vengono mostrati tutti i dati degli utenti. Questo array consente di specificare quali campi non si desidera visualizzare. Riguarda solo i campi principali (non i campi extra).