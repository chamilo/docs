# Innstillinger for webtjenester

Konfigurasjon av de eldre SOAP-/REST-webtjenestene (atskilt fra de moderne API Platform-endepunktene).

Tilgang til disse innstillingene finner du under **Administrasjon > Konfigurasjonsinnstillinger > Webtjenester**. Denne kategorien inneholder **7 innstillinger**, listet nedenfor med tittel og kommentar slik de leveres i plattformens innstillingsfiksturer (`SettingsCurrentFixtures.php`).

> Variabelnavnet i koden vises i monospace. Bruk det når du skripter via API-et, eller når du trenger å endre disse innstillingene på globalt nivå ved å redigere [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Innstillinger

### `allow_download_documents_by_api_key`

**Tillat nedlasting av kursdokumenter med API-nøkkel**

Last ned dokumenter ved å verifisere REST API-nøkkelen for en bruker

*Standard: `false`*


### `disable_webservices`

**Deaktiver webtjenester**

Hvis du ikke bruker webtjenester, aktiver dette for å unngå unødvendig sikkerhetsrisiko.

*Standard: `false`*


### `messaging_allow_send_push_notification`

**Tillat push-varsler til Chamilo Messaging-mobilappen**

Send push-varsler via Googles Firebase Console

*Standard: `false`*


### `messaging_gdc_api_key`

**Servernøkkel fra Firebase Console for Cloud Messaging**

Servernøkkel (eldre token) fra prosjektets påloggingsinformasjon

### `messaging_gdc_project_number`

**Avsender-ID fra Firebase Console for Cloud Messaging**

Du må registrere et prosjekt på <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Aktiver webtjenester kun for administratorer**

Noen REST-webtjenester er merket som kun for administratorer og er deaktivert som standard. Aktiver denne funksjonen for å gi tilgang til disse webtjenestene (til brukere med administratorlegitimasjon, selvsagt).

*Standard: `false`*

### `webservice_return_user_field`

**Webtjenester returnerer brukerfelt**

Be REST-webtjenester (v2.php) om å returnere en annen identifikator for felt knyttet til bruker-ID. Dette er nyttig hvis det eksterne systemet ikke egentlig håndterer bruker-ID-er slik de er i Chamilo, ettersom det hjelper det eksterne systemet med å matche de returnerte brukerdataene med eksterne data som Chamilo kjenner. For eksempel, hvis du bruker et eksternt autentiseringssystem, kan du returnere ekstrafeltet som brukes til å matche brukeren med det eksterne autentiseringssystemet i stedet for user.id.

*Standard: `oauth2_id`*