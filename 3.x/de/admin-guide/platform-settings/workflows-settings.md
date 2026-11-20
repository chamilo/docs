# Workflow-Einstellungen

Übergreifende Workflow-Schalter — Kurserstellung, Validierung von Einschreibungen, Aufgaben-Workflows und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Workflows**. Diese Kategorie enthält **23 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_user_course_subscription_by_course_admin`

**Benutzereinschreibung in Kurse durch Kursadministratoren zulassen**

Wenn diese Option aktiviert ist, können Kursadministratoren Benutzer in einen Kurs einschreiben.

*Standard: `true`*


### `allow_users_to_create_courses`

**Nicht-Administratoren das Erstellen von Kursen erlauben**

Nicht-Administratoren (Lehrkräften) erlauben, neue Kurse auf dem Server zu erstellen

*Standard: `false`*


### `allow_working_time_edition`

**Bearbeitung der Kursarbeitszeit aktivieren**

Aktivieren Sie diese Funktion, damit Lehrkräfte die von Lernenden im Kurs verbrachte Zeit manuell aktualisieren können.

*Standard: `false`*


### `course_visibility_change_only_admin`

**Änderungen der Kurssichtbarkeit nur für Administratoren**

Entfernt die Möglichkeit für Nicht-Administratoren, die Kurssichtbarkeit zu ändern. Die Sichtbarkeit kann problematisch sein, wenn zu viele Lehrkräfte vorhanden sind, um sie direkt zu steuern. Das Erzwingen von Sichtbarkeiten ermöglicht es der Organisation, Kurskataloge besser zu verwalten.

*Standard: `false`*


### `default_menu_entry_for_course_or_session`

**Standardmenüeintrag für Kurse**

Definiert die standardmäßigen Unterelemente des Eintrags „Kurse“, die angezeigt werden, wenn der Benutzer weder in einem Kurs noch in einer Sitzung eingeschrieben ist.

*Standard: `my_courses`*


### `disable_user_conditions_sender_id`

**Interne ID des Benutzers, der zum Senden von Benachrichtigungen über deaktivierte Konten verwendet wird**

Vermeiden Sie es, zu persönlich mit Benutzern zu sein, indem Sie ein „Bot“-Konto verwenden, um E-Mails an Benutzer zu senden, wenn ihr Konto aus irgendeinem Grund deaktiviert wird.

*Standard: `0`*


### `disabled_edit_session_coaches_course_editing_course`

**Möglichkeit zum Bearbeiten von Kurstutoren deaktivieren**

Wenn deaktiviert, haben Administratoren auf der Kursbearbeitungsseite keinen Link, um Tutoren schnell Sitzungskursen zuzuweisen.

*Standard: `false`*


### `hrm_allow_access_to_all_students`

**HRM kann von Berichtsseiten aus auf alle Lernenden zugreifen**

HRM-Benutzern den Zugriff auf alle Lernenden von Berichtsseiten aus erlauben. Der Legacy-Schlüssel `workflows.drh_allow_access_to_all_students` bleibt aus Kompatibilitätsgründen erkannt.

*Standard: `false`*


### `gamification_mode`

**Gamification-Modus**

Aktiviert die Sterne-Errungenschaft in Lernpfaden

### `go_to_course_after_login`

**Nach der Anmeldung direkt zum Kurs wechseln**

Wenn ein Benutzer in einem Kurs eingeschrieben ist, nach der Anmeldung direkt zum Kurs wechseln

*Standard: `false`*


### `load_term_conditions_section`

**Abschnitt mit Nutzungsbedingungen laden**

Die rechtliche Vereinbarung erscheint während der Anmeldung oder beim Betreten eines Kurses.

*Standard: `login`*


### `multiple_url_hide_disabled_settings`

**Deaktivierte Einstellungen in Unter-URLs ausblenden**

Auf Ja setzen, um Einstellungen in einer Unter-URL vollständig auszublenden, wenn die Einstellung in der Haupt-URL deaktiviert ist (wobei das Feld access_url_changeable = 0)

*Standard: `false`*


### `plugin_redirection_enabled`

**Weiterleitungs-Plugin aktivieren**

Nur aktivieren, wenn Sie das Redirection-Plugin verwenden

*Standard: `false`*


### `redirect_index_to_url_for_logged_users`

**index.php für authentifizierte Benutzer auf eine angegebene URL umleiten**

Wenn Sie die Indexseite (Ankündigungen, beliebte Kurse usw.) nicht verwenden möchten, können Sie hier das Skript (vom Dokumentenstamm aus) definieren, zu dem Benutzer umgeleitet werden, wenn sie versuchen, den Index zu laden.

### `send_all_emails_to`

**Alle E-Mails senden an**

Geben Sie eine Liste von E-Mail-Adressen an, an die *alle* von der Plattform gesendeten E-Mails gesendet werden. Die E-Mails werden an diese Adressen als sichtbares Ziel gesendet.

### `session_admin_user_subscription_search_extra_field_to_search`

**Zusätzliches Benutzerfeld zur Suche und Benennung von Sitzungen**

Diese Einstellung definiert den Schlüssel des zusätzlichen Benutzerfelds (z. B. „company“), der zur Suche nach Benutzern und zur Festlegung des Sitzungsnamens verwendet wird, wenn Lernende über /admin-dashboard/register registriert werden.

### `teacher_can_select_course_template`

**Lehrkraft kann einen Kurs als Vorlage auswählen**

Ermöglicht die Auswahl eines Kurses als Vorlage für den neuen Kurs, den die Lehrkraft erstellt

*Standard: `true`*


### `update_student_expiration_x_date`

**Ablaufdatum bei der ersten Anmeldung festlegen**

Array, das die „days“ und „months“ definiert, um das Ablaufdatum des Kontos festzulegen, wenn sich der Benutzer zum ersten Mal anmeldet.

### `user_edition_extra_field_to_check`

**Ein zusätzliches Feld als Auslöser für die Registrierung als ehemaliger Lernender festlegen**

Geben Sie hier eine Bezeichnung eines zusätzlichen Felds an. Wenn dieses zusätzliche Feld für einen Benutzer aktualisiert wird, wird ein Prozess ausgelöst, der den Zugriff dieses Benutzers auf Kurse mit demselben angegebenen zusätzlichen Feld prüft.

---
### `user_number_of_days_for_default_expiration_date_per_role`

**Standardmäßige Ablaufdauer in Tagen nach Rolle**

Ein Array aus Rolle => Zahl, das die Anzahl der Tage angibt, die ein Konto bis zum Ablauf hat, abhängig von der Rolle.

### `usergroup_do_not_unsubscribe_users_from_course_nor_session_on_user_unsubscribe`

**Abmeldung von Benutzern aus Kurs/Sitzung bei Abmeldung aus Gruppe/Klasse deaktivieren**

[abgeleitet] Beim Entfernen eines Benutzers aus einer Gruppe/Klasse werden diese nicht automatisch von den zugehörigen Kursen oder Sitzungen abgemeldet.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_course_on_course_unsubscribe`

**Abmeldung von Benutzern aus dem Kurs beim Entfernen des Kurses aus Gruppe/Klasse deaktivieren**

[abgeleitet] Wenn ein Kurs aus einer Gruppe/Klasse entfernt wird, werden Benutzer nicht automatisch von diesem Kurs abgemeldet.

*Standard: `false`*


### `usergroup_do_not_unsubscribe_users_from_session_on_session_unsubscribe`

**Abmeldung von Benutzern aus der Sitzung beim Entfernen der Sitzung aus Gruppe/Klasse deaktivieren**

[abgeleitet] Wenn eine Sitzung aus einer Gruppe/Klasse entfernt wird, werden Benutzer nicht automatisch von dieser Sitzung abgemeldet.

*Standard: `false`*