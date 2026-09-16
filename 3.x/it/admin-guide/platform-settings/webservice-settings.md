# Impostazioni dei Web Service

Configurazione dei web service SOAP / REST legacy (distinti dagli endpoint moderni di API Platform).

Accedere a queste impostazioni in **Amministrazione > Impostazioni di configurazione > Web Services**. Questa categoria contiene **7 impostazioni**, elencate di seguito con il titolo e il commento forniti nei fixture delle impostazioni della piattaforma (`SettingsCurrentFixtures.php`).

> Il nome della variabile nel codice è mostrato in monospazio. Utilizzarlo quando si esegue lo scripting tramite l'API o quando è necessario modificare tali impostazioni a livello globale modificando [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Impostazioni

### `allow_download_documents_by_api_key`

**Consenti il download dei documenti del corso tramite API Key**

Scarica i documenti verificando la chiave API REST di un utente

*Predefinito: `false`*


### `disable_webservices`

**Disabilita i web service**

Se non si utilizzano i web service, abilitare questa opzione per evitare qualsiasi rischio di sicurezza non necessario.

*Predefinito: `false`*


### `messaging_allow_send_push_notification`

**Consenti le notifiche push all'app mobile Chamilo Messaging**

Invia notifiche push tramite Google's Firebase Console

*Predefinito: `false`*


### `messaging_gdc_api_key`

**Chiave server di Firebase Console per Cloud Messaging**

Chiave server (token legacy) dalle credenziali del progetto

### `messaging_gdc_project_number`

**Sender ID di Firebase Console per Cloud Messaging**

È necessario registrare un progetto su <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Abilita i web service riservati agli amministratori**

Alcuni web service REST sono contrassegnati solo per gli amministratori e sono disabilitati per impostazione predefinita. Abilitare questa funzione per concedere l'accesso a tali web service (agli utenti con credenziali di amministratore, ovviamente).

*Predefinito: `false`*

### `webservice_return_user_field`

**Campo utente restituito dai web service**

Chiedere ai web service REST (v2.php) di restituire un altro identificatore per i campi relativi all'ID utente. Ciò è utile se il sistema esterno non gestisce realmente gli ID utente così come sono in Chamilo, poiché aiuta il sistema esterno a far corrispondere i dati utente restituiti con alcuni dati esterni noti a Chamilo. Ad esempio, se si utilizza un sistema di autenticazione esterno, è possibile restituire il campo extra usato per far corrispondere l'utente con il sistema di autenticazione esterno anziché user.id.

*Predefinito: `oauth2_id`*