# CAS-Einstellungen

Legacy-CAS-Konfiguration (Central Authentication Service), die aus Chamilo 1.x übernommen wurde. Den aktuellen Status des CAS-Authenticators in Chamilo 3.x finden Sie unter [CAS](../authentication/cas.md).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > CAS**. Diese Kategorie enthält **7 Einstellungen**, die nachfolgend mit Titel und Kommentar aus den Settings-Fixtures der Plattform (`SettingsCurrentFixtures.php`) aufgeführt sind.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `cas_activate`

**CAS-Authentifizierung aktivieren**

Die Aktivierung der CAS-Authentifizierung ermöglicht es Benutzern, sich mit ihren CAS-Anmeldedaten zu authentifizieren.<br/>Gehen Sie zu <a href='settings.php?category=CAS'>Plugin</a>, um eine konfigurierbare Schaltfläche „CAS Login“ für Ihren Chamilo-Campus hinzuzufügen. Alternativ können Sie die CAS-Authentifizierung erzwingen, indem Sie cas[force_redirect] in app/config/auth.conf.php setzen.

### `cas_add_user_activate`

**CAS-Benutzeranlage aktivieren**

CAS-Benutzeranlage aktivieren. Um das Benutzerkonto aus dem LDAP-Verzeichnis zu erstellen, müssen die Tabellen extldap_config und extldap_user_correspondance in app/config/auth.conf.php ausgefüllt sein.

### `cas_port`

**Port des Haupt-CAS-Servers**

Der Port, über den die Verbindung zum Haupt-CAS-Server hergestellt wird

### `cas_protocol`

**Protokoll des Haupt-CAS-Servers**

Das Protokoll, mit dem die Verbindung zum CAS-Server hergestellt wird

### `cas_server`

**Haupt-CAS-Server**

Dies ist der Haupt-CAS-Server, der für die Authentifizierung verwendet wird (IP-Adresse oder Hostname)

### `cas_server_uri`

**URI des Haupt-CAS-Servers**

Der Pfad zum CAS-Dienst

### `update_user_info_cas_with_ldap`

**Kontoinformationen CAS-authentifizierter Benutzer aus LDAP aktualisieren**

Stellt sicher, dass Vorname, Nachname und E-Mail-Adresse des Benutzers mit den aktuellen Werten im LDAP-Verzeichnis übereinstimmen