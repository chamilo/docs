# Inställningar för webbtjänster

Konfiguration av de äldre SOAP-/REST-webbtjänsterna (separata från de moderna API Platform-ändpunkterna).

Öppna dessa inställningar under **Administration > Konfigurationsinställningar > Webbtjänster**. Denna kategori innehåller **7 inställningar**, listade nedan med titel och kommentar som levereras i plattformens inställningsfixtures (`SettingsCurrentFixtures.php`).

> Variabelnamnet i koden visas i monospace. Använd det när du skriptar via API:et eller när du behöver ändra dessa inställningar på global nivå genom att redigera [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml).

## Inställningar

### `allow_download_documents_by_api_key`

**Tillåt nedladdning av kursdokument med API-nyckel**

Ladda ned dokument med verifiering av REST-API-nyckeln för en användare

*Standard: `false`*


### `disable_webservices`

**Inaktivera webbtjänster**

Om du inte använder webbtjänster, aktivera detta för att undvika onödiga säkerhetsrisker.

*Standard: `false`*


### `messaging_allow_send_push_notification`

**Tillåt push-notiser till den mobila appen Chamilo Messaging**

Skicka push-notiser via Googles Firebase Console

*Standard: `false`*


### `messaging_gdc_api_key`

**Servernyckel för Firebase Console för Cloud Messaging**

Servernyckel (äldre token) från projektets autentiseringsuppgifter

### `messaging_gdc_project_number`

**Avsändar-ID för Firebase Console för Cloud Messaging**

Du måste registrera ett projekt på <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Aktivera webbtjänster endast för administratörer**

Vissa REST-webbtjänster är märkta som endast för administratörer och är inaktiverade som standard. Aktivera den här funktionen för att ge åtkomst till dessa webbtjänster (till användare med administratörsuppgifter, givetvis).

*Standard: `false`*

### `webservice_return_user_field`

**Användarfält som returneras av webbtjänster**

Be REST-webbtjänster (v2.php) att returnera en annan identifierare för fält relaterade till användar-ID. Detta är användbart om det externa systemet inte verkligen hanterar användar-ID:n som de är i Chamilo, eftersom det hjälper det externa systemet att matcha de returnerade användardata mot någon extern data som är känd för Chamilo. Om du till exempel använder ett externt autentiseringssystem kan du returnera extrafältet som används för att matcha användaren mot det externa autentiseringssystemet i stället för user.id.

*Standard: `oauth2_id`*