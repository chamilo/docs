# Webdienste-Einstellungen

Konfiguration der älteren SOAP-/REST-Webdienste (getrennt von den modernen API-Platform-Endpunkten).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Webdienste**. Diese Kategorie enthält **7 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_download_documents_by_api_key`

**Download von Kursdokumenten per API-Schlüssel erlauben**

Dokumente herunterladen und dabei den REST-API-Schlüssel eines Benutzers prüfen

*Standard: `false`*


### `disable_webservices`

**Webdienste deaktivieren**

Wenn Sie keine Webdienste nutzen, aktivieren Sie diese Option, um unnötige Sicherheitsrisiken zu vermeiden.

*Standard: `false`*


### `messaging_allow_send_push_notification`

**Push-Benachrichtigungen an die Chamilo-Messaging-Mobile-App erlauben**

Push-Benachrichtigungen über die Firebase Console von Google senden

*Standard: `false`*


### `messaging_gdc_api_key`

**Serverschlüssel der Firebase Console für Cloud Messaging**

Serverschlüssel (Legacy-Token) aus den Projektzugangsdaten

### `messaging_gdc_project_number`

**Absender-ID der Firebase Console für Cloud Messaging**

Sie müssen ein Projekt in der <a href='https://console.firebase.google.com/'>Google Firebase Console</a> registrieren

### `webservice_enable_adminonly_api`

**Nur-Admin-Webdienste aktivieren**

Einige REST-Webdienste sind als nur für Administratoren gekennzeichnet und standardmäßig deaktiviert. Aktivieren Sie diese Funktion, um Zugriff auf diese Webdienste zu gewähren (selbstverständlich nur für Benutzer mit Admin-Zugangsdaten).

*Standard: `false`*

### `webservice_return_user_field`

**Von Webdiensten zurückgegebenes Benutzerfeld**

REST-Webdienste (v2.php) anweisen, für Felder mit Bezug zur Benutzer-ID einen anderen Bezeichner zurückzugeben. Das ist nützlich, wenn das externe System nicht wirklich mit den Benutzer-IDs arbeitet, wie sie in Chamilo vorliegen, da es dem externen System hilft, die zurückgegebenen Benutzerdaten mit externen Daten abzugleichen, die Chamilo bekannt sind. Wenn Sie beispielsweise ein externes Authentifizierungssystem nutzen, können Sie das Extrafeld zurückgeben, das zur Zuordnung des Benutzers zum externen Authentifizierungssystem verwendet wird, anstelle von user.id.

*Standard: `oauth2_id`*