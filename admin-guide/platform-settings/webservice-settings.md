# Web Services Settings

Configuration of the legacy SOAP / REST web services (separate from the modern API Platform endpoints).

Access these settings under **Administration > Configuration settings > Web Services**. This category contains **7 settings**, listed below with the title and comment shipped in the platform's settings fixtures (`SettingsCurrentFixtures.php`).

> The variable name in code is shown in `monospace`. Use it when scripting via the API or referring to settings in `.env` overrides.

## Settings

### `allow_download_documents_by_api_key`

**Allow download course documents by API Key**

Download documents verifying the REST API key for a user

### `disable_webservices`

**Disable web services**

If you do not use web services, enable this to avoid any unnecessary security risk.

### `messaging_allow_send_push_notification`

**Allow Push Notifications to the Chamilo Messaging mobile app**

Send Push Notifications by Google's Firebase Console

### `messaging_gdc_api_key`

**Server key of Firebase Console for Cloud Messaging**

Server key (legacy token) from project credentials

### `messaging_gdc_project_number`

**Sender ID of Firebase Console for Cloud Messaging**

You need register a project on <a href='https://console.firebase.google.com/'>Google Firebase Console</a>

### `webservice_enable_adminonly_api`

**Enable admin-only web services**

Some REST web services are marked for admins only and are disabled by default. Enable this feature to give access to these web services (to users with admin credentials, obviously).

### `webservice_return_user_field`

**Webservices return user field**

Ask REST webservices (v2.php) to return another identifier for fields related to user ID. This is useful if the external system doesn't really deal with user IDs as they are in Chamilo, as it helps the external system match the user data return with some external data that is know to Chamilo. For example, if you use an external authentication system, you can return the extra field used to match the user with the external authentication system rather than user.id.

