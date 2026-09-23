# Indstillinger for webtjenester

Konfiguration af de ældre SOAP-/REST-webtjenester (adskilt fra de moderne API Platform-endepunkter).

Få adgang til disse indstillinger under **Administration > Konfigurationsindstillinger > Webtjenester**. Denne kategori indeholder **7 indstillinger**, som er anført nedenfor med titel og kommentar som leveret i platformens indstillings-fixtures (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises med monospace. Brug det, når du scriptes via API'et, eller når du skal ændre disse indstillinger globalt ved at redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Indstillinger

### `allow_download_documents_by_api_key`

**Tillad download af kursusdokumenter via API-nøgle**

Download dokumenter ved at verificere REST API-nøglen for en bruger

*Standard: `false`*


### `disable_webservices`

**Deaktiver webtjenester**

Hvis du ikke bruger webtjenester, skal du aktivere denne indstilling for at undgå unødvendig sikkerhedsrisiko.

*Standard: `false`*


### `messaging_allow_send_push_notification`

**Tillad push-notifikationer til Chamilo Messaging-mobilappen**

Send push-notifikationer via Googles Firebase Console

*Standard: `false`*


### `messaging_gdc_api_key`

**Servernøgle fra Firebase Console til Cloud Messaging**

Servernøgle (ældre token) fra projektets legitimationsoplysninger

### `messaging_gdc_project_number`

**Afsender-ID fra Firebase Console til Cloud Messaging**

Du skal registrere et projekt på <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Aktivér webtjenester kun for administratorer**

Nogle REST-webtjenester er markeret som kun for administratorer og er deaktiveret som standard. Aktivér denne funktion for at give adgang til disse webtjenester (til brugere med administratorlegitimationsoplysninger, naturligvis).

*Standard: `false`*

### `webservice_return_user_field`

**Webtjenester returnerer brugerfelt**

Bed REST-webtjenester (v2.php) om at returnere en anden identifikator for felter relateret til bruger-ID. Dette er nyttigt, hvis det eksterne system ikke reelt arbejder med bruger-ID'er, som de er i Chamilo, da det hjælper det eksterne system med at matche de returnerede brugerdata med eksterne data, som Chamilo kender. Hvis du for eksempel bruger et eksternt autentificeringssystem, kan du returnere det ekstra felt, der bruges til at matche brugeren med det eksterne autentificeringssystem, i stedet for user.id.

*Standard: `oauth2_id`*