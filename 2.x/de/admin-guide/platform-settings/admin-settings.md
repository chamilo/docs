# Administrator-Identitätseinstellungen

Identität und Kontaktdaten des Plattformadministrators. Diese Werte erscheinen im Footer der Plattform und in einigen systemgenerierten E-Mails.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Administrator-Identität** zu. Diese Kategorie enthält **12 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `administrator_email`

**Portal-Administrator: E-Mail**

Die E-Mail-Adresse des Plattformadministrators (erscheint im Footer auf der linken Seite)

### `administrator_name`

**Portal-Administrator: Vorname**

Der Vorname des Plattformadministrators (erscheint im Footer auf der linken Seite)

### `administrator_phone`

**Portal-Administrator: Telefonnummer**

Die Telefonnummer des Plattformadministrators (erscheint im Footer auf der linken Seite)

### `administrator_surname`

**Portal-Administrator: Nachname**

Der Nachname des Plattformadministrators (erscheint im Footer auf der linken Seite)

### `chamilo_latest_news`

**Neueste Nachrichten**

Erhalten Sie die neuesten Nachrichten von Chamilo, einschließlich Sicherheitslücken und Veranstaltungen, direkt in Ihrem Verwaltungspanel. Diese Nachrichten werden jedes Mal, wenn Sie die Verwaltungsseite laden, auf dem Chamilo-Nachrichtenserver überprüft und sind nur für Administratoren sichtbar.

*Standard: `true`*

### `chamilo_support`

**Chamilo-Support-Block**

Erhalten Sie Profi-Tipps und eine einfache Möglichkeit, offizielle Dienstleister für professionellen Support direkt von den Machern von Chamilo zu kontaktieren. Dieser Block erscheint auf Ihrer Verwaltungsseite, ist nur für Administratoren sichtbar und wird bei jedem Laden der Verwaltungsseite aktualisiert.

*Standard: `true`*

### `max_anonymous_users`

**Mehrere anonyme Benutzer**

Aktivieren Sie diese Option, um mehreren Systembenutzern für anonyme Benutzer zu erlauben. Dies ist nützlich, wenn Sie diese Plattform als öffentliche Präsentationsfläche für einige Kurse nutzen. Mehrere anonyme Benutzer ermöglichen es, das Tracking für die Dauer der Erfahrung für mehrere Benutzer zu verfolgen, ohne ihre Daten zu vermischen (was sie sonst verwirren könnte).

*Standard: `0`*

### `redirect_admin_to_courses_list`

**Administrator zur Kursliste umleiten**

Das Standardverhalten besteht darin, Administratoren direkt zum Verwaltungspanel zu leiten (während Lehrer und Schüler zur Kursliste oder zur Plattform-Startseite geleitet werden). Aktivieren Sie diese Option, um den Administrator ebenfalls zu seiner Kursliste umzuleiten.

*Standard: `false`*

### `send_inscription_notification_to_general_admin_only`

**Nur globalen Administrator über neue Benutzer benachrichtigen**

Wenn aktiviert, erhält nur der globale Administrator E-Mail-Benachrichtigungen über neue Benutzerregistrierungen anstelle aller Administratoren.

*Standard: `false`*

### `show_link_request_hrm_user`

**Link anzeigen, um Verbindung zwischen Benutzer und HRM anzufordern**

Zeigt einen Link auf der Profilseite an, der es Personalverantwortlichen ermöglicht, eine Verknüpfung mit einem Benutzerkonto anzufordern.

*Standard: `false`*

### `user_status_option_only_for_admin_enabled`

**Rolle vor normalen Benutzern verbergen**

Ermöglicht das Verbergen der Benutzerrolle, wenn diese Option auf „true“ gesetzt ist und das folgende Array die entsprechende Rolle auf „true“ setzt.

*Standard: `false`*

### `user_status_option_show_only_for_admin`

**Definieren, welche Rollen vor normalen Benutzern verborgen sind**

Die Rollen, die auf „true“ gesetzt sind, werden nur Administratoren angezeigt. Andere Benutzer können sie nicht sehen.