# CAS-Einstellungen

Legacy CAS (Central Authentication Service) Konfiguration, übernommen aus Chamilo 1.x. Siehe [CAS](../authentication/cas.md) für den aktuellen Status des CAS-Authentifikators in Chamilo 2.x.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > CAS** zu. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `cas_activate`

**CAS-Authentifizierung aktivieren**

Das Aktivieren der CAS-Authentifizierung ermöglicht es Benutzern, sich mit ihren CAS-Anmeldedaten zu authentifizieren.<br/>Gehen Sie zu <a href='settings.php?category=CAS'>Plugin</a>, um eine konfigurierbare 'CAS Login'-Schaltfläche für Ihren Chamilo-Campus hinzuzufügen. Oder Sie können die CAS-Authentifizierung erzwingen, indem Sie cas[force_redirect] in app/config/auth.conf.php setzen.

### `cas_add_user_activate`

**CAS-Benutzerhinzufügung aktivieren**

Aktivieren Sie die CAS-Benutzerhinzufügung. Um das Benutzerkonto aus dem LDAP-Verzeichnis zu erstellen, müssen die Tabellen extldap_config und extldap_user_correspondance in app/config/auth.conf.php ausgefüllt sein.

### `cas_port`

**Haupt-CAS-Server-Port**

Der Port, über den eine Verbindung zum Haupt-CAS-Server hergestellt wird

### `cas_protocol`

**Haupt-CAS-Server-Protokoll**

Das Protokoll, mit dem wir uns mit dem CAS-Server verbinden

### `cas_server`

**Haupt-CAS-Server**

Dies ist der Haupt-CAS-Server, der für die Authentifizierung verwendet wird (IP-Adresse oder Hostname)

### `cas_server_uri`

**Haupt-CAS-Server-URI**

Der Pfad zum CAS-Dienst

### `update_user_info_cas_with_ldap`

**CAS-authentifizierte Benutzerkontoinformationen aus LDAP aktualisieren**

Stellt sicher, dass der Vorname, Nachname und die E-Mail-Adresse des Benutzers mit den aktuellen Werten im LDAP-Verzeichnis übereinstimmen