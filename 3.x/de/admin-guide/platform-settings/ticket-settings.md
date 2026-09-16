# Tickets-Einstellungen

Verhalten des **Tickets**-Systems (Helpdesk).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Tickets**. Diese Kategorie enthält **7 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `show_link_bug_notification`

**Link zum Melden eines Fehlers anzeigen**

Einen Link in der Kopfzeile anzeigen, um einen Fehler in unserer Support-Plattform (http://support.chamilo.org) zu melden. Beim Klicken auf den Link wird der Benutzer zur Support-Plattform weitergeleitet, auf eine Wiki-Seite, die den Prozess der Fehlermeldung beschreibt.

*Standard: `false`*


### `show_link_ticket_notification`

**Link zur Ticket-Erstellung anzeigen**

Den Link zur Ticket-Erstellung für Benutzer auf der rechten Seite des Portals anzeigen

*Standard: `false`*


### `ticket_allow_category_edition`

**Bearbeitung von Ticket-Kategorien zulassen**

Die Bearbeitung von Kategorien durch Administratoren zulassen.

*Standard: `false`*

### `ticket_allow_student_add`

**Benutzern das Hinzufügen von Tickets erlauben**

Allen Benutzern das Hinzufügen von Tickets erlauben, nicht nur den Administratoren.

*Standard: `false`*

### `ticket_project_user_roles`

**Zugriff auf Ticket-Projekte nach Rolle**

Ticket-Projekte für bestimmte Benutzerrollen zugänglich machen. Beispiel: ['permissions' => [1 => [17]] wobei project_id = 1, STUDENT_BOSS = 17.

> Diese Einstellung ist für Nicht-Administratoren verpflichtend: Ohne eine hier definierte Rollenzuordnung können nur Administratoren auf Support-Tickets zugreifen. Um einer anderen Rolle Zugriff auf ein Ticket-Projekt zu geben, fügen Sie deren Rollen-ID den Berechtigungen dieser Einstellung für das betreffende Projekt hinzu.

### `ticket_send_warning_to_all_admins`

**Ticket-Warnmeldungen an Administratoren senden**

Eine Nachricht senden, wenn ein Ticket ohne Kategorie erstellt wurde oder wenn einer Kategorie kein Administrator zugewiesen ist.

*Standard: `false`*


### `ticket_warn_admin_no_user_in_category`

**Administratoren benachrichtigen, wenn einer Ticket-Kategorie niemand zugewiesen ist**

Eine Warnmeldung (E-Mail und Chamilo-Nachricht) an alle Administratoren senden, wenn einer Kategorie kein Benutzer zugewiesen ist.

*Standard: `false`*