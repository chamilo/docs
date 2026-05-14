# Sitzungseinstellungen

Standardwerte und Verhalten für **Sitzungen** — Lebenszyklus von Sitzungen, Zugriffsfenster für Trainer, Sichtbarkeit von Kursen innerhalb einer Sitzung und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Sitzungen** zu. Diese Kategorie enthält **68 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_users_by_coach`

**Benutzer durch Trainer registrieren**

Trainer-Benutzer können Benutzer zur Plattform hinzufügen und Benutzer zu einer Sitzung anmelden.

*Standard: `false`*

### `allow_career_diagram`

**Karrierediagramme aktivieren**

Karrierediagramme ermöglichen die Anzeige von Diagrammen zu Karrieren, Fähigkeiten und Kursen.

*Standard: `false`*

### `allow_career_users`

**Karrierediagramme für Benutzer aktivieren**

Wenn Karrierediagramme aktiviert sind, können Benutzer diese nur sehen (und nur die Diagramme, die ihren Studien entsprechen), wenn Sie diese Option aktivieren.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Trainern das Bearbeiten innerhalb von Kurssitzungen erlauben**

Trainern das Bearbeiten innerhalb von Kurssitzungen erlauben.

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Sitzungsadministratoren können Benutzer löschen**

Sitzungsadministratoren können Benutzer von der Plattform entfernen, wenn sie ihre Sitzung(en) verwalten.

*Standard: `false`*

### `allow_disable_user_for_session_admin`

**Sitzungsadministratoren können Benutzer deaktivieren**

Sitzungsadministratoren können Benutzerkonten deaktivieren, um das Einloggen zu verhindern, während die Einschreibungsdaten in ihren Sitzung(en) erhalten bleiben.

*Standard: `false`*

### `allow_edit_tool_visibility_in_session`

**Bearbeitung der Werkzeugsichtbarkeit in Sitzungen erlauben**

Bei der Verwendung von Sitzungen ist das Standardverhalten, die Werkzeugsichtbarkeit des Basiskurses zu verwenden. Diese Einstellung ändert dies, sodass Trainer in Sitzungskursen die Werkzeugsichtbarkeiten an ihre Bedürfnisse anpassen können.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Nach Registrierung auf der 'Über'-Seite der Sitzung zur Sitzung weiterleiten**

Neue Benutzer automatisch nach Abschluss der Registrierung über die 'Über'-Seite einer Sitzung zur Sitzungsseite weiterleiten.

*Standard: `false`*

### `allow_search_diagnostic`

**Sitzungssuchdiagnose aktivieren**

Tutoren erlauben, eine Diagnose zu erhalten, die ihnen hilft, die besten Sitzungen für Lernende zu finden.

*Standard: `false`*

### `allow_session_admin_extra_access`

**Sitzungsadministratoren können auf Stapel-Benutzerimport, -aktualisierung und -export zugreifen**

Sitzungsadministratoren können zusätzlich zu ihren Standardberechtigungen auf Funktionen für den Stapel-Benutzerimport, die Aktualisierung und den Export zugreifen.

*Standard: `false`*

### `allow_session_admin_login_as_teacher`

**Sitzungsadministratoren können sich als Lehrer einloggen**

Sitzungsadministratoren können Lehrerkonten imitieren, um Kursinhalte und die Erfahrung der Studierenden innerhalb ihrer Sitzung(en) zu previewen.

*Standard: `false`*

### `allow_session_admin_read_careers`

**Sitzungsadministratoren können Karrieren einsehen**

[abgeleitet] Sitzungsadministratoren können Karrierewege und Beförderungsworkflows, die mit ihren verwalteten Sitzungen verknüpft sind, einsehen und darauf zugreifen.

*Standard: `false`*

### `allow_session_admins_to_manage_all_sessions`

**Sitzungsadministratoren erlauben, alle Sitzungen zu sehen**

Wenn diese Option nicht aktiviert ist (Standard), können Sitzungsadministratoren nur die von ihnen erstellten Sitzungen sehen. Dies ist in einer offenen Umgebung verwirrend, in der Sitzungsadministratoren möglicherweise Supportzeit zwischen zwei Sitzungen teilen müssen.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Sitzung-zu-Sitzung-Kopie für Lehrer erlauben**

Aktivieren Sie diese Option, um Lehrern zu erlauben, ihre Inhalte von einem Kurs in einer Sitzung zu einem Kurs in einer anderen Sitzung zu kopieren. Standardmäßig ist diese Option nur für Plattformadministratoren verfügbar.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Lehrern das Erstellen von Sitzungen erlauben**

Lehrer können ihre eigenen Sitzungen erstellen, bearbeiten und löschen.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutoren können Studierende Sitzungen zuweisen**

Wenn aktiviert, können Kurs-Trainer/Tutoren in Sitzungen neue Benutzer zu ihrer Sitzung anmelden. Diese Option ist sonst nur für Administratoren und Sitzungsadministratoren verfügbar.

*Standard: `false`*

### `allow_user_session_collapsable`

**Benutzern das Einklappen von Sitzungen in 'Meine Sitzungen' erlauben**

Benutzer können Sitzungskarten oder -gruppen auf der Seite 'Meine Sitzungen' einklappen, um visuelle Unordnung zu reduzieren und die Navigation zu verbessern.

*Standard: `false`*

### `assignment_base_course_teacher_access_to_all_session`

**Basiskurslehrer können Aufgaben aus allen Sitzungen sehen**

Alle Veröffentlichungen der Lernenden (aus dem Basiskurs und aus allen Sitzungen) auf der Seite work/pending.php des Basiskurses anzeigen.

*Standard: `false`*

---
### `career_diagram_disclaimer`

**Haftungsausschluss unter dem Karrierediagramm anzeigen**

Fügen Sie einen Haftungsausschluss unter dem Karrierediagramm hinzu. Eine Sprachvariable namens 'Career diagram disclaimer' muss in Ihrer Unter-Sprache vorhanden sein.

*Standard: `false`*

### `career_diagram_legend`

**Legende unter dem Karrierediagramm anzeigen**

Fügen Sie eine Karrierelegende unter dem Karrierediagramm hinzu. Eine Sprachvariable namens 'Career diagram legend' muss in Ihrer Unter-Sprache vorhanden sein.

*Standard: `false`*

### `courses_list_session_title_link`

**Art des Links für den Sitzungstitel**

Auf der Kurse/Sitzungen-Seite kann der Sitzungstitel wie folgt gestaltet sein: 0 = kein Link (Sitzungstitel ausblenden); 1 = Titel mit einer speziellen Sitzungsseite verlinken; 2 = Titel mit dem Kurs verlinken, wenn es nur einen Kurs gibt; 3 = Sitzungstitel macht die Kursliste einklappbar; 4 = kein Link (Sitzungstitel anzeigen).

*Standard: `1`*

### `default_session_list_view`

**Standardansicht der Sitzungsliste**

Wählen Sie die Standardregisterkarte aus, die Sie beim Öffnen der Sitzungsliste als Administrator sehen möchten.

*Standard: `all`*

### `drh_can_access_all_session_content`

**Personalverantwortliche haben Zugriff auf alle Sitzungsinhalte**

Wenn aktiviert, erhalten Personalverantwortliche Zugriff auf alle Inhalte und Benutzer der Sitzungen, die sie betreuen.

*Standard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Kopieren von sitzungsspezifischen Inhalten bei Sitzungskopie aktivieren**

Ermöglicht die Duplizierung von Ressourcen, die in der Sitzung erstellt wurden, beim Duplizieren der Sitzung.

*Standard: `false`*

### `email_template_subscription_to_session_confirmation_lost_password`

**Link zum Zurücksetzen des Passworts in E-Mail-Benachrichtigung zur Sitzungsanmeldung hinzufügen**

Fügen Sie einen Link zum Zurücksetzen des Passworts in Bestätigungs-E-Mails zur Sitzungsanmeldung ein, die an Benutzer gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standard: `false`*

### `email_template_subscription_to_session_confirmation_username`

**Benutzernamen in E-Mail-Benachrichtigung zur Sitzungsanmeldung hinzufügen**

Fügen Sie den Benutzernamen des Benutzers in Bestätigungs-E-Mails zur Sitzungsanmeldung ein, die gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standard: `false`*

### `enable_auto_reinscription`

**Automatische Wiedereinschreibung aktivieren**

Aktivieren oder deaktivieren Sie die automatische Wiedereinschreibung, wenn die Gültigkeit eines Kurses abläuft. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standard: `false`*

### `enable_session_replication`

**Sitzungsreplikation aktivieren**

Aktivieren oder deaktivieren Sie die automatische Sitzungsreplikation. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standard: `false`*

### `extend_rights_for_coach`

**Erweiterte Rechte für Trainer**

Die Aktivierung dieser Option gibt dem Trainer die gleichen Berechtigungen wie dem Ausbilder bei Autorentools.

*Standard: `false`*

### `hide_courses_in_sessions`

**Kursliste in Sitzungen ausblenden**

Blenden Sie die Liste der Kurse innerhalb einer Sitzung aus, wenn der Sitzungsblock auf Ihrer Kursseite angezeigt wird (zeigen Sie sie nur innerhalb des spezifischen Sitzungsbildschirms an).

*Standard: `false`*

### `hide_reporting_session_list`

**Sitzungsliste im Berichtstool ausblenden**

Sitzungen, die den Kurs enthalten, werden im Berichtstool innerhalb des Kurses selbst aufgelistet, was erhebliches Gewicht hinzufügen kann, wenn derselbe Kurs in Hunderten von Sitzungen verwendet wird. Diese Option entfernt diese Liste.

*Standard: `false`*

### `hide_search_form_in_session_list`

**Suchformular in der Sitzungsliste ausblenden**

Entfernen Sie das Suchfeld aus der Sitzungslistenansicht in der Administrationsoberfläche.

*Standard: `false`*

### `hide_session_graph_in_my_progress`

**Sitzungsdiagramm in "Mein Fortschritt" ausblenden**

Verbergen Sie Sitzungsfortschrittsdiagramme und Visualisierungen auf der Seite "Mein Fortschritt" in den Lern-Dashboards.

*Standard: `false`*

### `hide_tab_list`

**Registerkarten auf der Sitzungsseite ausblenden**

Entfernen Sie Navigationsregisterkarten von der Sitzungsdetailseite, um die Benutzeroberfläche zu vereinfachen.

### `limit_session_admin_list_users`

**Sitzungsadministratoren dürfen nicht auf die Benutzerliste zugreifen**

Verhindern Sie, dass Sitzungsadministratoren auf die globale Benutzerliste in der Administrationsoberfläche zugreifen.

*Standard: `false`*

### `limit_session_admin_role`

**Berechtigungen von Sitzungsadministratoren einschränken**

Wenn aktiviert, sehen Sitzungsadministratoren nur den Benutzerblock mit der Option 'Benutzer hinzufügen' und den Sitzungsblock mit der Option 'Sitzungsliste'.

*Standard: `false`*

### `my_courses_session_order`

**Standard-Sortierung der Sitzungen in "Meine Sitzungen" ändern**

Standardmäßig werden Sitzungen nach Startdatum sortiert. Ändern Sie dies, indem Sie ein Array vom Typ ['field' => 'end_date', 'order' => 'desc'] bereitstellen.

### `my_courses_view_by_session`

**Meine Kurse nach Sitzung anzeigen**

Aktivieren Sie eine zusätzliche Seite 'Meine Kurse', auf der Sitzungen als Teil der Kurse angezeigt werden, anstatt umgekehrt.

*Standard: `false`*

### `my_progress_session_show_all_courses`

**Mein Fortschritt: Kursdetails in Sitzung anzeigen**

Zeigen Sie alle Details jedes Kurses in der Sitzung an, wenn Sie auf die Sitzungsdetails klicken.

*Standard: `false`*

### `prevent_session_admins_to_manage_all_users`

**Verhindern, dass Sitzungsadministratoren alle Benutzer verwalten**

Durch Aktivieren dieser Option können Sitzungsadministratoren auf der Administrationsseite nur die von ihnen erstellten Benutzer sehen.

*Standard: `false`*

---
### `remove_session_url`

**Link zur Sitzungsseite ausblenden**

Versteckt den Link zur Sitzungsseite in der Liste der Sitzungen.

*Standard: `false`*


### `session_admins_access_all_content`

**Sitzungsadministratoren können auf alle Kursinhalte zugreifen**

Sitzungsadministratoren können alle Kursinhalte innerhalb ihrer Sitzungen einsehen, einschließlich eingeschränkter oder archivierter Materialien.

*Standard: `false`*


### `session_admins_edit_courses_content`

**Sitzungsadministratoren können Kursinhalte bearbeiten**

Sitzungsadministratoren können Kursinhalte (Dokumente, Übungen, Werkzeuge) in den Kursen bearbeiten, die ihren Sitzungen zugewiesen sind.

*Standard: `false`*


### `session_automatic_creation_user_id`

**Ersteller-ID für automatisch erstellte Sitzungen**

Legt den Benutzer fest, der als Ersteller von automatisch erstellten Sitzungen verwendet wird (um zu vermeiden, dass jede Sitzung dem Benutzer '1' zugewiesen wird, der oft der Portaladministrator ist).

*Standard: `1`*


### `session_classes_tab_disable`

**Hinzufügen von Klassen in Sitzungskursen für Nicht-Administratoren deaktivieren**

Deaktiviert den Reiter zum Hinzufügen von Klassen in Sitzungskursen für Nicht-Administratoren.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Sitzungen nach Dauer immer für Trainer zugänglich**

Andernfalls haben Sitzungstrainer nur während der aktiven Dauer Zugriff auf Sitzungen nach Dauer.

*Standard: `false`*


### `session_course_ordering`

**Manuelle Sortierung von Kursen in Sitzungen**

Aktivieren Sie diese Option, um Sitzungsadministratoren das manuelle Sortieren der Kurse innerhalb einer Sitzung zu ermöglichen. Wenn deaktiviert, werden Kurse alphabetisch nach Kurstitel sortiert.

*Standard: `false`*


### `session_course_users_subscription_limited_to_session_users`

**Einschränkung der Kursanmeldungen auf Sitzungsbenutzer**

Beschränkt die Liste der Studierenden, die sich für eine Kurssitzung anmelden können, und deaktiviert die Registrierung für Benutzer in allen Kursen über die Seite "Sitzung fortsetzen".

*Standard: `false`*


### `session_courses_read_only_mode`

**Kurs in Sitzung auf Nur-Lesen-Modus setzen**

Ermöglicht Lehrern, bestimmte Kurse im Nur-Lesen-Modus zu setzen, wenn sie über Sitzungen geöffnet werden. Aktivieren Sie in den Kurseigenschaften die Option "Kurs in Sitzung sperren".

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Pflichtfelder im Sitzungserstellungsformular festlegen**

Fordert die aufgeführten Felder während der Sitzungserstellung an.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Sitzungsfelder mit Benutzerfeldern vorab ausfüllen**

Array von Beziehungen zwischen zusätzlichen Benutzerfeldern und zusätzlichen Sitzungsfeldern, sodass die Sitzung mit Daten vorab ausgefüllt werden kann, die den Benutzerdaten entsprechen.

### `session_days_after_coach_access`

**Standardzugriffstage für Trainer nach Sitzungsende**

Standardanzahl an Tagen, die ein Trainer nach dem offiziellen Sitzungsenddatum auf seine Sitzung zugreifen kann.

### `session_days_before_coach_access`

**Standardzugriffstage für Trainer vor Sitzungsbeginn**

Standardanzahl an Tagen, die ein Trainer vor dem offiziellen Sitzungsstartdatum auf seine Sitzung zugreifen kann.

### `session_import_settings`

**Optionen für den Sitzungsimport**

Array von Optionen, die als Standardparameter beim CSV/XML-Sitzungsimport angewendet werden.

### `session_list_order`

**Sitzungen unterstützen manuelle Sortierung**

Ermöglicht das manuelle Neusortieren von Sitzungen in der Administrationssitzungsliste per Drag-and-Drop oder ähnlichem Mechanismus.

*Standard: `false`*


### `session_list_show_count_users`

**Anzahl der Benutzer in der Sitzungsliste anzeigen**

Der Administrator kann die Anzahl der Benutzer in jeder Sitzung sehen. Dies erhöht die Ladezeit der Sitzungsliste, daher überlegen Sie sorgfältig, ob Sie die zusätzliche Wartezeit in Kauf nehmen möchten, wenn Sie diese Funktion häufig nutzen.

*Standard: `false`*


### `session_list_view_remaining_days`

**Verbleibende Tage in "Meine Sitzungen" anzeigen**

Wenn aktiviert, werden die Sitzungsdaten auf der Seite "Meine Sitzungen" durch die Anzahl der verbleibenden Tage ersetzt.

*Standard: `false`*


### `session_model_list_field_ordered_by_id`

**Sitzungsvorlagen nach ID im Sitzungserstellungsformular sortieren**

Sortiert Sitzungsvorlagen im Dropdown-Menü des Sitzungserstellungsformulars nach ihrer numerischen ID anstatt alphabetisch nach Name.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Leeren der angemeldeten Benutzer bei Sitzungsanmeldung verhindern**

Verhindert bei der Mehrfachanmeldung von Lernenden zu einer Sitzung das normale Verhalten, bei dem Benutzer, die sich nicht im rechten Bereich befinden, beim Klicken auf "Absenden" abgemeldet werden. Behält alle Benutzer dort bei.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Alle Sitzungen auf der Seite "Meine Kurse" anzeigen**

Wenn aktiviert, zeigt diese Option alle Sitzungen des Benutzers in einer kalenderbasierten Ansicht.

*Standard: `true`*


### `show_session_coach`

**Sitzungstrainer anzeigen**

Zeigt den Namen des globalen Sitzungstrainers im Titelbereich der Sitzung in der Kursliste an.

*Standard: `false`*


### `show_session_data`

**Sitzungsdatentitel anzeigen**

Zeigt den Kommentar zu den Sitzungsdaten an.

*Standard: `false`*


### `show_session_description`

**Sitzungsbeschreibung anzeigen**

Zeigt die Sitzungsbeschreibung überall dort an, wo diese Option implementiert ist (Sitzungsverfolgungsseiten usw.).

*Standard: `false`*

---
### `show_simple_session_info`

**Einfache Sitzungsinformationen anzeigen**

Fügt dem Untertitel der Sitzung in der Sitzungsliste den Coach und die Daten hinzu.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Nur Benutzer aus aktiven Sitzungen in der Nachverfolgung anzeigen**

Zeigt in den Ansichten zur Lernenden-Nachverfolgung und Berichterstellung nur Benutzer aus derzeit aktiven Sitzungen an.

*Standard: `false`*


### `tracking_columns`

**Kurs-Sitzungs-Nachverfolgungsspalten anpassen**

Definiert ein Array von Spalten für die folgenden Berichte: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Dauer automatisch erstellter Sitzungen**

Dauer (in Tagen) der automatisch erstellten Sitzungen für einzelne Benutzer. Nach Ablauf kann sich der Benutzer nicht mehr für denselben Kurs registrieren (es wird keine weitere Sitzung erstellt).

*Standard: `1095`*


### `user_session_display_mode`

**Anzeigemodus für Meine Sitzungen**

Wählen Sie, wie die Seite "Meine Sitzungen" angezeigt wird: als moderne visuelle Blockansicht (Kartenansicht) oder im klassischen Listenstil.

*Standard: `list`*