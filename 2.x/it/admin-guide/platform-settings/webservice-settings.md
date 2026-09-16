# Impostazioni dei Servizi Web

Configurazione dei servizi web SOAP / REST legacy (separati dagli endpoint moderni di API Platform).

Accedi a queste impostazioni tramite **Amministrazione > Impostazioni di configurazione > Servizi Web**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei dati di configurazione della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospace. Utilizzalo quando scrivi script tramite l'API o quando devi modificare queste impostazioni a livello globale editando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_download_documents_by_api_key`

**Consenti il download di documenti del corso tramite chiave API**

Scarica documenti verificando la chiave API REST per un utente

*Predefinito: `false`*


### `disable_webservices`

**Disabilita i servizi web**

Se non utilizzi i servizi web, abilita questa opzione per evitare qualsiasi rischio di sicurezza non necessario.

*Predefinito: `false`*


### `messaging_allow_send_push_notification`

**Consenti notifiche push all'app mobile di messaggistica Chamilo**

Invia notifiche push tramite la console Firebase di Google

*Predefinito: `false`*


### `messaging_gdc_api_key`

**Chiave del server della console Firebase per Cloud Messaging**

Chiave del server (token legacy) dalle credenziali del progetto

### `messaging_gdc_project_number`

**ID mittente della console Firebase per Cloud Messaging**

È necessario registrare un progetto su <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Abilita servizi web solo per amministratori**

Alcuni servizi web REST sono contrassegnati come riservati agli amministratori e sono disabilitati per impostazione predefinita. Abilita questa funzione per concedere l'accesso a questi servizi web (agli utenti con credenziali di amministratore, ovviamente).

*Predefinito: `false`*

### `webservice_return_user_field`

**Campo utente restituito dai servizi web**

Richiedi ai servizi web REST (v2.php) di restituire un altro identificatore per i campi relativi all'ID utente. Questo è utile se il sistema esterno non gestisce realmente gli ID utente come sono in Chamilo, poiché aiuta il sistema esterno a correlare i dati utente restituiti con alcuni dati esterni noti a Chamilo. Ad esempio, se utilizzi un sistema di autenticazione esterno, puoi restituire il campo extra utilizzato per correlare l'utente con il sistema di autenticazione esterno anziché user.id.

*Predefinito: `oauth2_id`*