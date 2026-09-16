# Workflow-Einstellungen

Übergreifende Workflow-Schalter — Kurserstellung, Einschreibungsvalidierung, Aufgaben-Workflows und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Workflows**. Diese Kategorie enthält **23 Einstellungen**, die nachfolgend mit Titel und Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_user_course_subscription_by_course_admin`

**Kursadministratoren das Einschreiben von Benutzern in Kurse erlauben**

Wenn Sie diese Option aktivieren, können Kursadministratoren Benutzer in einen Kurs einschreiben

*Standard: `true`*


### `allow_users_to_create_courses`

**Nicht-Administratoren das Erstellen von Kursen erlauben**

Nicht-Administratoren (Lehrenden) erlauben, neue Kurse auf dem Server zu erstellen

*Standard: `false`*


### `allow_working_time_edition`

**Bearbeitung der Kursarbeitszeit aktivieren**

Aktivieren Sie diese Funktion, damit Lehrende die von Lernenden im Kurs verbrachte Zeit manuell aktualisieren können.

*Standard: `false`*


### `course_visibility_change_only_admin`

**Kurs-Sichtbarkeit nur durch Administratoren änderbar**

Entzieht Nicht-Administratoren die Möglichkeit, die Kurs-Sichtbarkeit zu ändern. Die Sichtbarkeit kann problematisch sein, wenn zu viele Lehrende direkt kontrolliert werden müssen. Das Erzwingen von Sichtbarkeiten ermöglicht der Organisation eine bessere Verwaltung der Kurskataloge.

*Standard: `false`*


### `default_menu_entry_for_course_or_session`

**Standard-Menüeintrag für Kurse**

Legen Sie die standardmäßigen Unterelemente des Eintrags „Kurse“ fest, die angezeigt werden, wenn der Benutzer in keinem Kurs und keiner Session eingeschrieben ist.

*Standard: `my_courses`*


### `disable_user_conditions_sender_id`

**Interne ID des Benutzers, der Benachrichtigungen über deaktivierte Konten versendet**

Vermeiden Sie eine zu persönliche Ansprache der Benutzer, indem Sie ein „Bot“-Konto verwenden, um E-Mails an Benutzer zu senden, wenn deren Konto aus irgendeinem Grund deaktiviert wird.

*Standard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Möglichkeit zum Bearbeiten von Kurstutoren deaktivieren**

Wenn deaktiviert, haben Administratoren auf der Kursbearbeitungsseite keinen Link, um Tutoren schnell Session-Kursen zuzuweisen.

*Standard: `false`*


### `drh_allow_access_to_all_students`

**HRM kann von Berichtsseiten auf alle Studierenden zugreifen**

[inferred] HR-/DRH-Managern Zugriff auf Berichtsseiten für alle Lernenden der gesamten Plattform gewähren.

*Standard: `false`*


### `gamification_mode`

**Gamification-Modus**

Sternen-Erfolge in Lernpfaden aktivieren

### `go_to_course_after_login`

**Nach der Anmeldung direkt zum Kurs wechseln**

Wenn ein Benutzer in einem Kurs eingeschrieben ist, nach der Anmeldung direkt zum Kurs wechseln

*Standard: `false`*


### `load_term_conditions_section`

**Abschnitt mit Nutzungsbedingungen laden**

Die rechtliche Vereinbarung erscheint bei der Anmeldung oder beim Betreten eines Kurses.

*Standard: `login`*


### `multiple_url_hide_disabled_settings`

**Deaktivierte Einstellungen in Sub-URLs ausblenden**

Auf „Ja“ setzen, um Einstellungen in einer Sub-URL vollständig auszublenden, wenn die Einstellung in der Haupt-URL deaktiviert ist (wobei das Feld access_url_changeable = 0)

*Standard: `false`*


### `plugin_redirection_enabled`

**Umleitungs-Plugin aktivieren**

Nur aktivieren, wenn Sie das Redirection-Plugin verwenden

*Standard: `false`*


### `redirect_index_to_url_for_logged_users`

**index.php für authentifizierte Benutzer auf eine angegebene URL umleiten**

Wenn Sie die Indexseite (Ankündigungen, beliebte Kurse usw.) nicht verwenden möchten, können Sie hier das Skript (ab dem Document Root) festlegen, zu dem Benutzer umgeleitet werden, wenn sie den Index laden möchten.

### `send_all_emails_to`

**Alle E-Mails senden an**

Geben Sie eine Liste von E-Mail-Adressen an, an die *alle* von der Plattform gesendeten E-Mails gehen. Die E-Mails werden an diese Adressen als sichtbare Empfänger gesendet.

### `session_admin_user_subscription_search_extra_field_to_search`

**Zusätzliches Benutzerfeld zur Suche und Benennung von Sessions**

Diese Einstellung definiert den Schlüssel des zusätzlichen Benutzerfelds (z. B. „company“), der verwendet wird, um Benutzer zu suchen und den Namen der Session festzulegen, wenn Studierende über /admin-dashboard/register registriert werden.

### `teacher_can_select_course_template`

**Lehrende können einen Kurs als Vorlage auswählen**

Erlaubt, einen Kurs als Vorlage für den neuen Kurs auszuwählen, den die Lehrperson erstellt

*Standard: `true`*


### `update_student_expiration_x_date`

**Ablaufdatum beim ersten Login setzen**

Array, das „days“ und „months“ definiert, um das Ablaufdatum des Kontos festzulegen, wenn sich der Benutzer zum ersten Mal anmeldet.

### `user_edition_extra_field_to_check`

**Zusätzliches Feld als Auslöser für die Registrierung als ehemaliger Lernender festlegen**

Geben Sie hier die Bezeichnung eines zusätzlichen Feldes an. Wird dieses zusätzliche Feld für einen Benutzer aktualisiert, wird ein Prozess ausgelöst, der den Zugriff dieses Benutzers auf Kurse mit demselben angegebenen zusätzlichen Feld prüft.

### `user_number_of_days_for_default_expiration_date_per_role`

**Standardmäßige Ablaufdauer in Tagen nach Rolle**

Ein Array der Form Rolle => Zahl, das die Anzahl der Tage angibt, die ein Konto je nach Rolle bis zum Ablauf gültig ist.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Abmeldung von Benutzerinnen und Benutzern aus Kurs/Session bei Abmeldung aus Gruppe/Klasse deaktivieren**

[inferred] Beim Entfernen einer Benutzerin oder eines Benutzers aus einer Gruppe/Klasse diese bzw. diesen nicht automatisch aus zugehörigen Kursen oder Sessions abmelden.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Abmeldung von Benutzerinnen und Benutzern aus dem Kurs bei Entfernen des Kurses aus Gruppe/Klasse deaktivieren**

[inferred] Wenn ein Kurs aus einer Gruppe/Klasse entfernt wird, Benutzerinnen und Benutzer nicht automatisch aus diesem Kurs abmelden.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Abmeldung von Benutzerinnen und Benutzern aus der Session bei Entfernen der Session aus Gruppe/Klasse deaktivieren**

[inferred] Wenn eine Session aus einer Gruppe/Klasse entfernt wird, Benutzerinnen und Benutzer nicht automatisch aus dieser Session abmelden.

*Standard: `false`*