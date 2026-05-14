# Webdienste-Einstellungen

Konfiguration der legacy SOAP/REST-Webdienste (getrennt von den modernen API Platform-Endpunkten).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Webdienste** zu. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_download_documents_by_api_key`

**Download von Kursdokumenten per API-Schlüssel erlauben**

Dokumente herunterladen, indem der REST-API-Schlüssel für einen Benutzer überprüft wird

*Standard: `false`*

### `disable_webservices`

**Webdienste deaktivieren**

Wenn Sie keine Webdienste nutzen, aktivieren Sie diese Option, um unnötige Sicherheitsrisiken zu vermeiden.

*Standard: `false`*

### `messaging_allow_send_push_notification`

**Push-Benachrichtigungen an die Chamilo Messaging Mobile-App erlauben**

Push-Benachrichtigungen über die Firebase Console von Google senden

*Standard: `false`*

### `messaging_gdc_api_key`

**Server-Schlüssel der Firebase Console für Cloud Messaging**

Server-Schlüssel (Legacy-Token) aus den Projekt-Credentials

### `messaging_gdc_project_number`

**Sender-ID der Firebase Console für Cloud Messaging**

Sie müssen ein Projekt auf <a href='https://console.firebase.google.com/'>Google Firebase Console</a> registrieren

### `webservice_enable_adminonly_api`

**Nur-Admin-Webdienste aktivieren**

Einige REST-Webdienste sind nur für Administratoren vorgesehen und standardmäßig deaktiviert. Aktivieren Sie diese Funktion, um den Zugriff auf diese Webdienste zu ermöglichen (natürlich nur für Benutzer mit Admin-Berechtigungen).

*Standard: `false`*

### `webservice_return_user_field`

**Webdienste geben Benutzerfeld zurück**

Fordern Sie REST-Webdienste (v2.php) auf, einen anderen Identifikator für Felder zurückzugeben, die mit der Benutzer-ID zusammenhängen. Dies ist nützlich, wenn das externe System nicht wirklich mit Benutzer-IDs wie in Chamilo umgeht, da es dem externen System hilft, die zurückgegebenen Benutzerdaten mit externen Daten abzugleichen, die Chamilo bekannt sind. Wenn Sie beispielsweise ein externes Authentifizierungssystem verwenden, können Sie das zusätzliche Feld zurückgeben, das verwendet wird, um den Benutzer mit dem externen Authentifizierungssystem abzugleichen, anstelle von user.id.

*Standard: `oauth2_id`*