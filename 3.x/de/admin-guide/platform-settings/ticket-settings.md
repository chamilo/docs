# Ticket-Einstellungen

Verhalten des **Tickets**-Systems (Helpdesk).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Tickets**. Diese Kategorie enthält **8 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `show_link_bug_notification`

**Link zum Melden eines Fehlers anzeigen**

Zeigt im Kopfbereich einen Link an, um einen Fehler in unserer Support-Plattform zu melden (http://support.chamilo.org). Beim Klicken auf den Link wird der Benutzer zur Support-Plattform weitergeleitet, auf eine Wiki-Seite, die den Prozess der Fehlermeldung beschreibt.

*Standard: `false`*


### `show_link_ticket_notification`

**Link zur Ticketerstellung anzeigen**

Zeigt den Link zur Ticketerstellung für Benutzer auf der rechten Seite des Portals an

*Standard: `false`*


### `ticket_allow_category_edition`

**Bearbeitung von Ticketkategorien zulassen**

Erlaubt Administratoren die Bearbeitung von Kategorien.

*Standard: `false`*

### `ticket_allow_student_add`

**Benutzern das Hinzufügen von Tickets erlauben**

Erlaubt allen Benutzern, Tickets hinzuzufügen, nicht nur den Administratoren.

*Standard: `false`*

### `ticket_project_user_roles`

**Zugriff nach Rolle auf Ticketprojekte**

Erlaubt den Zugriff auf Ticketprojekte durch bestimmte Benutzerrollen. Beispiel: ['permissions' => [1 => [17]] wobei project_id = 1, STUDENT_BOSS = 17.

> Diese Einstellung ist für Nicht-Administratoren obligatorisch: Ohne eine hier definierte Rollenzuordnung können nur Administratoren auf Support-Tickets zugreifen. Um einer anderen Rolle Zugriff auf ein Ticketprojekt zu gewähren, fügen Sie deren Rollen-ID zu den Berechtigungen dieser Einstellung für dieses Projekt hinzu.

### `ticket_send_warning_to_all_admins`

**Ticket-Warnmeldungen an Administratoren senden**

Sendet eine Nachricht, wenn ein Ticket ohne Kategorie erstellt wurde oder wenn einer Kategorie kein Administrator zugewiesen ist.

*Standard: `false`*


### `ticket_support_bot_enabled`

**Support-Bot aktivieren**

Aktiviert den entscheidungsbaumbasierten Support-Assistenten im angedockten Chat. Dies ist standardmäßig deaktiviert. Administratoren müssen außerdem einen gültigen Support-Baum mit einer Einstiegsfrage und Optionen konfigurieren und veröffentlichen, bevor der Bot verfügbar wird. Der Bot verwendet vordefinierte Auswahlmöglichkeiten anstelle generativer KI und kann für ungelöste Fragen ein Ticket erstellen.

*Standard: `false`*

Siehe [Support-Bot](../support-bot.md) für Konfiguration und Benutzerablauf (PR #9224, Issue #8754).

### `ticket_warn_admin_no_user_in_category`

**Warnung an Administratoren senden, wenn einer Ticketkategorie niemand zugewiesen ist**

Sendet eine Warnmeldung (E-Mail und Chamilo-Nachricht) an alle Administratoren, wenn einer Kategorie kein Benutzer zugewiesen ist.

*Standard: `false`*