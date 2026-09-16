# Administrator-Identitätseinstellungen

Identität und Kontaktdaten des Plattformadministrators. Diese Werte erscheinen in der Fußzeile der Plattform und in einigen systemgenerierten E-Mails.

Zugriff auf diese Einstellungen unter **Administration > Konfigurationseinstellungen > Administrator-Identität**. Diese Kategorie enthält **12 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `administrator_email`

**Portal-Administrator: E-Mail**

Die E-Mail-Adresse des Plattformadministrators (erscheint links in der Fußzeile)

### `administrator_name`

**Portal-Administrator: Vorname**

Der Vorname des Plattformadministrators (erscheint links in der Fußzeile)

### `administrator_phone`

**Portal-Administrator: Telefonnummer**

Die Telefonnummer des Plattformadministrators (erscheint links in der Fußzeile)

### `administrator_surname`

**Portal-Administrator: Nachname**

Der Nachname des Plattformadministrators (erscheint links in der Fußzeile)

### `chamilo_latest_news`

**Aktuelle Nachrichten**

Erhalten Sie die neuesten Nachrichten von Chamilo, einschließlich Sicherheitslücken und Veranstaltungen, direkt in Ihrem Administrationsbereich. Diese Nachrichten werden bei jedem Laden der Administrationsseite auf dem Chamilo-Nachrichtenserver geprüft und sind nur für Administratoren sichtbar.

*Standard: `true`*

### `chamilo_support`

**Chamilo-Support-Block**

Erhalten Sie Profi-Tipps und eine einfache Möglichkeit, offizielle Dienstleister für professionellen Support zu kontaktieren, direkt von den Machern von Chamilo. Dieser Block erscheint auf Ihrer Administrationsseite, ist nur für Administratoren sichtbar und wird bei jedem Laden der Administrationsseite aktualisiert.

*Standard: `true`*

### `max_anonymous_users`

**Mehrere anonyme Benutzer**

Aktivieren Sie diese Option, um mehrere Systembenutzer für anonyme Benutzer zuzulassen. Dies ist nützlich, wenn diese Plattform als öffentliche Präsentation für einige Kurse genutzt wird. Mehrere anonyme Benutzer ermöglichen es, dass das Tracking für die Dauer der Nutzung für mehrere Benutzer funktioniert, ohne deren Daten zu vermischen (was sie sonst verwirren könnte).

*Standard: `0`*

### `redirect_admin_to_courses_list`

**Administrator zur Kursliste umleiten**

Das Standardverhalten besteht darin, Administratoren direkt zum Administrationsbereich zu senden (während Lehrende und Lernende zur Kursliste oder zur Startseite der Plattform gesendet werden). Aktivieren Sie diese Option, um den Administrator ebenfalls zu seiner Kursliste umzuleiten.

*Standard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Nur den globalen Administrator über neue Benutzer benachrichtigen**

Wenn aktiviert, erhält nur der globale Administrator E-Mail-Benachrichtigungen über neue Benutzerregistrierungen statt aller Administratoren.

*Standard: `false`*

### `show_link_request_hrm_user`

**Link zur Anforderung einer Verknüpfung zwischen Benutzer und HRM anzeigen**

Zeigt auf der Profilseite einen Link an, über den Personalverantwortliche (Human Resources) eine Verknüpfung mit einem Benutzerkonto anfordern können.

*Standard: `false`*

### `user_status_option_only_for_admin_enabled`

**Rolle vor normalen Benutzern verbergen**

Ermöglicht das Verbergen der Benutzerrolle, wenn diese Option auf true gesetzt ist und das folgende Array die entsprechende Rolle auf 'true' setzt.

*Standard: `false`*

### `user_status_option_show_only_for_admin`

**Festlegen, welche Rollen für normale Benutzer verborgen sind**

Die auf 'true' gesetzten Rollen erscheinen nur für Administratoren. Andere Benutzer können sie nicht sehen.