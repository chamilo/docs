# Ticket-Einstellungen

Verhalten des **Tickets**-Systems (Helpdesk).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Tickets** zu. Diese Kategorie enthält **7 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `show_link_bug_notification`

**Link zum Melden eines Fehlers anzeigen**

Zeigt einen Link im Header an, um einen Fehler in unserer Support-Plattform (http://support.chamilo.org) zu melden. Beim Klicken auf den Link wird der Benutzer zur Support-Plattform weitergeleitet, auf eine Wiki-Seite, die den Prozess zur Fehlermeldung beschreibt.

*Standard: `false`*

### `show_link_ticket_notification`

**Link zur Ticket-Erstellung anzeigen**

Zeigt den Link zur Ticket-Erstellung für Benutzer auf der rechten Seite des Portals an.

*Standard: `false`*

### `ticket_allow_category_edition`

**Bearbeitung von Ticket-Kategorien erlauben**

Erlaubt Administratoren die Bearbeitung von Kategorien.

*Standard: `false`*

### `ticket_allow_student_add`

**Benutzern das Hinzufügen von Tickets erlauben**

Erlaubt allen Benutzern, Tickets hinzuzufügen, nicht nur den Administratoren.

*Standard: `false`*

### `ticket_project_user_roles`

**Zugriff auf Ticket-Projekte nach Rollen**

Erlaubt den Zugriff auf Ticket-Projekte durch bestimmte Benutzerrollen. Beispiel: ['permissions' => [1 => [17]] wobei project_id = 1, STUDENT_BOSS = 17.

### `ticket_send_warning_to_all_admins`

**Ticket-Warnmeldungen an Administratoren senden**

Sendet eine Nachricht, wenn ein Ticket ohne Kategorie erstellt wurde oder wenn einer Kategorie kein Administrator zugewiesen ist.

*Standard: `false`*

### `ticket_warn_admin_no_user_in_category`

**Warnung an Administratoren senden, wenn eine Ticket-Kategorie niemanden verantwortlich hat**

Sendet eine Warnmeldung (E-Mail und Chamilo-Nachricht) an alle Administratoren, wenn einer Kategorie kein Benutzer zugewiesen ist.

*Standard: `false`*