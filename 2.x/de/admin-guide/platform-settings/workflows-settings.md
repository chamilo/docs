# Workflow-Einstellungen

Querschnittliche Workflow-Schalter — Kurscreation, Einschreibungsvalidierung, Aufgaben-Workflows und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Workflows** zu. Diese Kategorie enthält **23 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_user_course_subscription_by_course_admin`

**Kursadministrator darf Benutzer in Kurse einschreiben**

Aktivieren Sie diese Option, um Kursadministratoren zu erlauben, Benutzer in einen Kurs einzuschreiben.

*Standard: `true`*

### `allow_users_to_create_courses`

**Nicht-Administratoren dürfen Kurse erstellen**

Erlauben Sie Nicht-Administratoren (Lehrkräften), neue Kurse auf dem Server zu erstellen.

*Standard: `false`*

### `allow_working_time_edition`

**Bearbeitung der Kursarbeitszeit aktivieren**

Aktivieren Sie diese Funktion, um Lehrkräften zu erlauben, die von Lernenden im Kurs verbrachte Zeit manuell zu aktualisieren.

*Standard: `false`*

### `course_visibility_change_only_admin`

**Kurs-Sichtbarkeitsänderungen nur für Administratoren**

Entfernen Sie die Möglichkeit für Nicht-Administratoren, die Kurs-Sichtbarkeit zu ändern. Die Sichtbarkeit kann ein Problem darstellen, wenn zu viele Lehrkräfte direkt kontrolliert werden müssen. Das Erzwingen von Sichtbarkeiten ermöglicht es der Organisation, Kurskataloge besser zu verwalten.

*Standard: `false`*

### `default_menu_entry_for_course_or_session`

**Standard-Menüeintrag für Kurse**

Definieren Sie die standardmäßigen Unterelemente des Eintrags 'Kurse', die angezeigt werden sollen, wenn der Benutzer weder in einem Kurs noch in einer Sitzung registriert ist.

*Standard: `my_courses`*

### `disable_user_conditions_sender_id`

**Interne ID des Benutzers, der für Benachrichtigungen über deaktivierte Konten verwendet wird**

Vermeiden Sie es, zu persönlich mit Benutzern zu werden, indem Sie ein 'Bot'-Konto verwenden, um E-Mails an Benutzer zu senden, wenn ihr Konto aus irgendeinem Grund deaktiviert wird.

*Standard: `0`*

### `disabled_edit_session_coaches_course_editing_course`

**Bearbeitung von Kurs-Coaches deaktivieren**

Wenn deaktiviert, haben Administratoren keinen Link, um Coaches schnell auf der Kursbearbeitungsseite zu Sitzungskursen zuzuweisen.

*Standard: `false`*

### `drh_allow_access_to_all_students`

**HRM kann auf alle Schüler über Berichtsseiten zugreifen**

[abgeleitet] Gewähren Sie HR/DRH-Managern Zugriff auf Berichtsseiten für alle Lernenden auf der Plattform.

*Standard: `false`*

### `gamification_mode`

**Gamification-Modus**

Aktivieren Sie die Sternen-Erfolge in Lernpfaden.

### `go_to_course_after_login`

**Direkt zum Kurs nach dem Login gehen**

Wenn ein Benutzer in einem Kurs registriert ist, direkt nach dem Login zum Kurs gehen.

*Standard: `false`*

### `load_term_conditions_section`

**Abschnitt mit Nutzungsbedingungen laden**

Die rechtliche Vereinbarung wird während des Logins oder beim Betreten eines Kurses angezeigt.

*Standard: `login`*

### `multiple_url_hide_disabled_settings`

**Deaktivierte Einstellungen in Sub-URLs ausblenden**

Setzen Sie auf Ja, um Einstellungen in einer Sub-URL vollständig auszublenden, wenn die Einstellung in der Haupt-URL deaktiviert ist (wo das Feld `access_url_changeable` = 0 ist).

*Standard: `false`*

### `plugin_redirection_enabled`

**Umleitungs-Plugin aktivieren**

Aktivieren Sie dies nur, wenn Sie das Redirection-Plugin verwenden.

*Standard: `false`*

### `redirect_index_to_url_for_logged_users`

**index.php für authentifizierte Benutzer auf angegebene URL umleiten**

Wenn Sie die Index-Seite (Ankündigungen, beliebte Kurse usw.) nicht verwenden möchten, können Sie hier das Skript (vom Dokumentenstamm aus) definieren, wohin Benutzer umgeleitet werden, wenn sie versuchen, die Index-Seite zu laden.

### `send_all_emails_to`

**Alle E-Mails senden an**

Geben Sie eine Liste von E-Mail-Adressen an, an die *alle* von der Plattform gesendeten E-Mails gesendet werden. Die E-Mails werden an diese Adressen als sichtbares Ziel gesendet.

### `session_admin_user_subscription_search_extra_field_to_search`

**Zusätzliches Benutzerfeld zur Suche und Benennung von Sitzungen**

Diese Einstellung definiert den Schlüssel des zusätzlichen Benutzerfelds (z. B. "company"), der verwendet wird, um nach Benutzern zu suchen und den Namen der Sitzung zu definieren, wenn Schüler über /admin-dashboard/register registriert werden.

### `teacher_can_select_course_template`

**Lehrkraft kann einen Kurs als Vorlage auswählen**

Erlauben Sie es, einen Kurs als Vorlage für den neuen Kurs auszuwählen, den die Lehrkraft erstellt.

*Standard: `true`*

### `update_student_expiration_x_date`

**Ablaufdatum beim ersten Login festlegen**

Array, das die 'Tage' und 'Monate' definiert, um das Ablaufdatum des Kontos festzulegen, wenn sich der Benutzer zum ersten Mal einloggt.

### `user_edition_extra_field_to_check`

**Zusätzliches Feld als Auslöser für die Registrierung als Ex-Lernender festlegen**

Geben Sie hier eine Bezeichnung für ein zusätzliches Feld an. Wenn dieses zusätzliche Feld für einen Benutzer aktualisiert wird, wird ein Prozess ausgelöst, um den Zugriff dieses Benutzers auf Kurse mit demselben angegebenen zusätzlichen Feld zu überprüfen.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Standardablauftage nach Rolle**

Ein Array aus Rolle => Anzahl, das die Anzahl der Tage angibt, die ein Konto bis zum Ablauf hat, abhängig von der Rolle.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Deaktivieren der Abmeldung von Benutzern aus Kursen/Sitzungen bei Abmeldung von Gruppe/Klasse**

[abgeleitet] Beim Entfernen eines Benutzers aus einer Gruppe/Klasse werden diese nicht automatisch von zugehörigen Kursen oder Sitzungen abgemeldet.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Deaktivieren der Abmeldung von Benutzern aus Kursen bei Entfernen eines Kurses aus Gruppe/Klasse**

[abgeleitet] Wenn ein Kurs aus einer Gruppe/Klasse entfernt wird, werden Benutzer nicht automatisch von diesem Kurs abgemeldet.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Deaktivieren der Abmeldung von Benutzern aus Sitzungen bei Entfernen einer Sitzung aus Gruppe/Klasse**

[abgeleitet] Wenn eine Sitzung aus einer Gruppe/Klasse entfernt wird, werden Benutzer nicht automatisch von dieser Sitzung abgemeldet.

*Standard: `false`*