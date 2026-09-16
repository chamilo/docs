# Sitzungseinstellungen

Vorgaben und Verhalten für **Sitzungen** — Lebenszyklus von Sitzungen, Zugriffsfenster für Tutoren, Kurssichtbarkeit innerhalb einer Sitzung und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Sitzungen**. Diese Kategorie enthält **68 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_users_by_coach`

**Tutoren das Registrieren von Benutzern erlauben**

Tutoren dürfen Benutzer auf der Plattform anlegen und Benutzer in eine Sitzung einschreiben.

*Standard: `false`*

### `allow_career_diagram`

**Karrierediagramme aktivieren**

Karrierediagramme ermöglichen die Anzeige von Diagrammen zu Karrieren, Kompetenzen und Kursen.

*Standard: `false`*


### `allow_career_users`

**Karrierediagramme für Benutzer aktivieren**

Wenn Karrierediagramme aktiviert sind, können Benutzer sie nur sehen (und nur die Diagramme, die ihrem Studium entsprechen), wenn Sie diese Option aktivieren.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Tutoren das Bearbeiten innerhalb von Kurssitzungen erlauben**

Tutoren das Bearbeiten innerhalb von Kurssitzungen erlauben

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Sitzungsadministratoren können Benutzer löschen**

Sitzungsadministratoren können Benutzer von der Plattform entfernen, wenn sie ihre Sitzung(en) verwalten.

*Standard: `false`*


### `allow_disable_user_for_session_admin`

**Sitzungsadministratoren können Benutzer deaktivieren**

Sitzungsadministratoren können Benutzerkonten deaktivieren, um die Anmeldung zu verhindern, während die Einschreibungsdaten in ihren Sitzung(en) erhalten bleiben.

*Standard: `false`*


### `allow_edit_tool_visibility_in_session`

**Bearbeitung der Werkzeugsichtbarkeit in Sitzungen erlauben**

Bei der Verwendung von Sitzungen ist das Standardverhalten, die im Basiskurs definierte Werkzeugsichtbarkeit zu verwenden. Diese Einstellung ändert das so, dass Tutoren in Sitzungskursen die Werkzeugsichtbarkeiten an ihre Bedürfnisse anpassen können.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Nach der Registrierung auf der „Über“-Seite der Sitzung zur Sitzung weiterleiten**

Neue Benutzer nach Abschluss der Registrierung über die Über-Seite einer Sitzung automatisch auf ihre Sitzungsseite weiterleiten.

*Standard: `false`*


### `allow_search_diagnostic`

**Sitzungssuchdiagnose aktivieren**

Tutoren eine Diagnose ermöglichen, mit der sie nach den besten Sitzungen für Lernende suchen können.

*Standard: `false`*


### `allow_session_admin_extra_access`

**Sitzungsadministrator kann auf den Stapelimport, die Aktualisierung und den Export von Benutzern zugreifen**

Sitzungsadministratoren können zusätzlich zu ihren Standardberechtigungen auf die Funktionen für Stapelimport, Aktualisierung und Export von Benutzern zugreifen.

*Standard: `false`*


### `allow_session_admin_login_as_teacher`

**Sitzungsadministratoren können sich als Lehrende „anmelden“**

Sitzungsadministratoren können Lehrendenkonten übernehmen, um Kursinhalte und die Lernerfahrung innerhalb ihrer Sitzung(en) vorab zu betrachten.

*Standard: `false`*


### `allow_session_admin_read_careers`

**Sitzungsadministratoren können Karrieren einsehen**

[inferred] Sitzungsadministratoren können Karrierepfade und Beförderungsabläufe einsehen und darauf zugreifen, die mit den von ihnen verwalteten Sitzungen verknüpft sind.

*Standard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Sitzungsadministratoren das Einsehen aller Sitzungen erlauben**

Wenn diese Option nicht aktiviert ist (Standard), können Sitzungsadministratoren nur die von ihnen erstellten Sitzungen sehen. Das ist in einer offenen Umgebung verwirrend, in der Sitzungsadministratoren Unterstützungszeit zwischen zwei Sitzungen aufteilen müssen.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Kopieren von Sitzung zu Sitzung für Lehrende erlauben**

Aktivieren Sie diese Option, damit Lehrende ihre Inhalte von einem Kurs in einer Sitzung in einen Kurs in einer anderen Sitzung kopieren können. Standardmäßig steht diese Option nur Plattformadministratoren zur Verfügung.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Lehrenden das Erstellen von Sitzungen erlauben**

Lehrende können eigene Sitzungen erstellen, bearbeiten und löschen.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutoren können Lernende Sitzungen zuweisen**

Wenn aktiviert, können Kurstutoren in Sitzungen neue Benutzer in ihre Sitzung einschreiben. Diese Option steht andernfalls nur Administratoren und Sitzungsadministratoren zur Verfügung.

*Standard: `false`*

### `allow_user_session_collabsable`

**Benutzern das Einklappen von Sitzungen in Meine Sitzungen erlauben**

Benutzer können Sitzungskarten oder -gruppen auf der Seite Meine Sitzungen einklappen, um visuelle Unordnung zu reduzieren und die Navigation zu verbessern.

*Standard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Lehrende des Basiskurses können Aufgaben aus allen Sitzungen sehen**

Alle Lernendenveröffentlichungen (aus dem Basiskurs und aus allen Sitzungen) auf der Seite work/pending.php des Basiskurses anzeigen.

*Standard: `false`*

### `career_diagram_disclaimer`

**Einen Haftungsausschluss unter dem Karrierediagramm anzeigen**

Einen Haftungsausschluss unter dem Karrierediagramm hinzufügen. Eine Sprachvariable namens 'Career diagram disclaimer' muss in Ihrer Untersprache vorhanden sein.

*Standard: `false`*

### `career_diagram_legend`

**Eine Legende unter dem Karrierediagramm anzeigen**

Eine Karrierelegende unter dem Karrierediagramm hinzufügen. Eine Sprachvariable namens 'Career diagram legend' muss in Ihrer Untersprache vorhanden sein.

*Standard: `false`*

### `courses_list_session_title_link`

**Art des Links für den Sitzungstitel**

Auf der Kurse-/Sitzungsseite kann der Sitzungstitel eines der Folgenden sein: 0 = kein Link (Sitzungstitel ausblenden) ; 1 = Titel mit einer speziellen Sitzungsseite verknüpfen ; 2 = mit dem Kurs verknüpfen, wenn nur ein Kurs vorhanden ist ; 3 = Sitzungstitel macht die Kursliste einklappbar ; 4 = kein Link (Sitzungstitel anzeigen).

*Standard: `1`*

### `default_session_list_view`

**Standardansicht der Sitzungsliste**

Wählen Sie den Standard-Tab, den Sie beim Öffnen der Sitzungsliste als Administrator sehen möchten.

*Standard: `all`*


### `drh_can_access_all_session_content`

**HR-Direktoren greifen auf alle Sitzungsinhalte zu**

Wenn aktiviert, erhalten Personalleiter Zugriff auf alle Inhalte und Benutzer der Sitzungen, denen sie folgen.

*Standard: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Kopieren sitzungsspezifischer Inhalte in eine andere Sitzung aktivieren**

Ermöglicht die Duplizierung von Ressourcen, die in der Sitzung erstellt wurden, beim Duplizieren der Sitzung.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Link zum Zurücksetzen des Passworts zur E-Mail-Benachrichtigung über die Anmeldung zur Sitzung hinzufügen**

Einen Link zum Zurücksetzen des Passworts in Bestätigungs-E-Mails zur Anmeldung aufnehmen, die an Benutzer gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standard: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Benutzernamen zur E-Mail-Benachrichtigung über die Anmeldung zur Sitzung hinzufügen**

Den Benutzernamen des Benutzers in Bestätigungs-E-Mails zur Anmeldung aufnehmen, die gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standard: `false`*


### `enable_auto_reinscription`

**Automatische Wiedereinschreibung aktivieren**

Automatische Wiedereinschreibung aktivieren oder deaktivieren, wenn die Gültigkeit des Kurses abläuft. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standard: `false`*


### `enable_session_replication`

**Sitzungsreplikation aktivieren**

Automatische Sitzungsreplikation aktivieren oder deaktivieren. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standard: `false`*


### `extend_rights_for_coach`

**Rechte für Tutoren erweitern**

Aktivieren Sie diese Option, um Tutoren dieselben Berechtigungen wie Trainern bei den Autorentools zu geben

*Standard: `false`*

### `hide_courses_in_sessions`

**Kursliste in Sitzungen ausblenden**

Beim Anzeigen des Sitzungsblocks auf Ihrer Kursseite die Liste der Kurse innerhalb dieser Sitzung ausblenden (nur innerhalb der spezifischen Sitzungsansicht anzeigen).

*Standard: `false`*

### `hide_reporting_session_list`

**Sitzungsliste im Berichtstool ausblenden**

Sitzungen, die den Kurs enthalten, werden im Berichtstool innerhalb des Kurses selbst aufgelistet, was erhebliches Gewicht hinzufügen kann, wenn derselbe Kurs in Hunderten von Sitzungen verwendet wird. Diese Option entfernt diese Liste.

*Standard: `false`*


### `hide_search_form_in_session_list`

**Suchformular in der Sitzungsliste ausblenden**

Das Sucheingabefeld aus der Sitzungslistenansicht in der Administrationsoberfläche entfernen.

*Standard: `false`*


### `hide_session_graph_in_my_progress`

**Sitzungsdiagramm in Mein Fortschritt ausblenden**

Sitzungsfortschrittsdiagramme und Visualisierungen auf der Seite Mein Fortschritt in den Lernenden-Dashboards ausblenden.

*Standard: `false`*


### `hide_tab_list`

**Tabs auf der Sitzungsseite ausblenden**

Navigations-Tabs von der Sitzungsdetailseite entfernen, um die Oberfläche zu vereinfachen.

### `limit_session_admin_list_users`

**Sitzungsadministratoren ist der Zugriff auf die Benutzerliste untersagt**

Sitzungsadministratoren daran hindern, auf die globale Benutzerliste in der Administrationsoberfläche zuzugreifen.

*Standard: `false`*


### `limit_session_admin_role`

**Berechtigungen von Sitzungsadministratoren einschränken**

Wenn aktiviert, sehen die Sitzungsadministratoren nur den Benutzer-Block mit der Option „Benutzer hinzufügen“ und den Sitzungen-Block mit der Option „Sitzungsliste“.

*Standard: `false`*

### `my_courses_session_order`

**Die Standardsortierung der Sitzungen in Meine Sitzungen ändern**

Standardmäßig werden Sitzungen nach Startdatum sortiert. Ändern Sie dies, indem Sie ein Array vom Typ ['field' => 'end_date', 'order' => 'desc'] angeben.

### `my_courses_view_by_session`

**Meine Kurse nach Sitzung anzeigen**

Eine zusätzliche Seite „Meine Kurse“ aktivieren, auf der Sitzungen als Teil von Kursen erscheinen, und nicht umgekehrt.

*Standard: `false`*

### `my_progress_session_show_all_courses`

**Mein Fortschritt: Kursdetails in der Sitzung anzeigen**

Alle Details jedes Kurses in der Sitzung anzeigen, wenn auf die Sitzungsdetails geklickt wird.

*Standard: `false`*


### `prevent_session_admins_to_manage_all_users`

**Sitzungsadministratoren daran hindern, alle Benutzer zu verwalten**

Durch Aktivieren dieser Option können Sitzungsadministratoren auf der Administrationsseite nur die Benutzer sehen, die sie selbst erstellt haben.

*Standard: `false`*

### `remove_session_url`

**Link zur Sitzungsseite ausblenden**

Link zur Sitzungsseite in der Sitzungsliste ausblenden.

*Standard: `false`*


### `session_admins_access_all_content`

**Sitzungsadministratoren können auf alle Kursinhalte zugreifen**

Sitzungsadministratoren können alle Kursinhalte innerhalb ihrer Sitzungen einsehen, einschließlich eingeschränkter oder archivierter Materialien.

*Standard: `false`*

### `session_admins_edit_courses_content`

**Sitzungsadministratoren können Kursinhalte bearbeiten**

Sitzungsadministratoren können Kursinhalte (Dokumente, Übungen, Werkzeuge) in Kursen ändern, die ihren Sitzungen zugeordnet sind.

*Standard: `false`*

### `session_automatic_creation_user_id`

**Ersteller-ID automatisch angelegter Sitzungen**

Benutzer festlegen, der als Ersteller der automatisch angelegten Sitzungen verwendet wird (um zu vermeiden, dass jede Sitzung dem Benutzer „1“ zugeordnet wird, der oft der Portaladministrator ist).

*Standard: `1`*


### `session_classes_tab_disable`

**Hinzufügen von Klassen im Sitzungskurs für Nicht-Administratoren deaktivieren**

Registerkarte zum Hinzufügen von Klassen im Sitzungskurs für Nicht-Administratoren deaktivieren.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Sitzungen nach Dauer für Tutoren immer verfügbar**

Andernfalls haben Sitzungstutoren nur während der aktiven Dauer Zugriff auf Sitzungen nach Dauer.

*Standard: `false`*


### `session_course_ordering`

**Manuelle Sortierung der Sitzungskurse**

Diese Option aktivieren, damit Sitzungsadministratoren die Kurse innerhalb einer Sitzung manuell sortieren können. Wenn deaktiviert, werden Kurse alphabetisch nach Kurstitel sortiert.

*Standard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Einschreibungen in den Kurs auf Sitzungsbenutzer beschränken**

Die Liste der in die Kurssitzung einzuschreibenden Lernenden einschränken. Und die Registrierung von Benutzern in allen Kursen auf der Seite „Sitzung fortsetzen“ deaktivieren.

*Standard: `false`*


### `session_courses_read_only_mode`

**Kurs in der Sitzung schreibgeschützt setzen**

Lehrende können bestimmte Kurse in den schreibgeschützten Modus versetzen, wenn sie über Sitzungen geöffnet werden. In den Kurseigenschaften die Option „Kurs in der Sitzung sperren“ aktivieren.

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Zusätzliche Felder im Formular zur Sitzungserstellung als Pflichtfelder setzen**

Die aufgeführten Felder bei der Sitzungserstellung als Pflichtfelder verlangen.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Sitzungsfelder mit Benutzerfeldern vorausfüllen**

Array von Beziehungen zwischen zusätzlichen Benutzerfeldern und zusätzlichen Sitzungsfeldern, sodass die Sitzung mit Daten vorausgefüllt werden kann, die den Benutzerdaten entsprechen.

### `session_days_after_coach_access`

**Standard-Zugriffstage des Tutors nach der Sitzung**

Standardanzahl der Tage, die ein Tutor nach dem offiziellen Enddatum der Sitzung auf eine Sitzung zugreifen kann

### `session_days_before_coach_access`

**Standard-Zugriffstage des Tutors vor der Sitzung**

Standardanzahl der Tage, die ein Tutor vor dem offiziellen Startdatum der Sitzung auf eine Sitzung zugreifen kann

### `session_import_settings`

**Optionen für den Sitzungsimport**

Array von Optionen, die als Standardparameter beim CSV/XML-Sitzungsimport angewendet werden.

### `session_list_order`

**Sitzungen unterstützen manuelle Sortierung**

Manuelle Neuordnung von Sitzungen in der administrativen Sitzungsliste per Drag-and-Drop oder einem ähnlichen Mechanismus aktivieren.

*Standard: `false`*


### `session_list_show_count_users`

**Anzahl der Benutzer in der Sitzungsliste anzeigen**

Der Administrator kann die Anzahl der Benutzer in jeder Sitzung sehen. Dies belastet die Sitzungsliste zusätzlich; bei häufiger Nutzung sollte daher sorgfältig abgewogen werden, ob die zusätzliche Wartezeit akzeptabel ist.

*Standard: `false`*


### `session_list_view_remaining_days`

**Verbleibende Tage unter „Meine Sitzungen“ anzeigen**

Wenn aktiviert, werden die Sitzungsdaten auf der Seite „Meine Sitzungen“ durch die Anzahl der verbleibenden Tage ersetzt.

*Standard: `false`*

### `session_model_list_field_ordered_by_id`

**Sitzungsvorlagen im Formular zur Sitzungserstellung nach ID sortieren**

[inferred] Sitzungsvorlagen im Dropdown des Formulars zur Sitzungserstellung nach ihrer numerischen ID statt alphabetisch nach Namen sortieren.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Leeren der eingeschriebenen Benutzer bei der Sitzungseinschreibung verhindern**

Beim Einschreiben mehrerer Lernender in eine Sitzung das normale Verhalten verhindern, bei dem Benutzer, die sich nicht im rechten Bereich befinden, beim Klicken auf Senden abgemeldet werden. Alle Benutzer dort belassen.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Alle Sitzungen auf der Seite „Meine Kurse“ anzeigen**

Wenn aktiviert, zeigt diese Option alle Sitzungen des Benutzers in einer kalenderbasierten Ansicht.

*Standard: `true`*


### `show_session_coach`

**Sitzungstutor anzeigen**

Den Namen des allgemeinen Sitzungstutors im Sitzungstitelfeld in der Kursliste anzeigen

*Standard: `false`*

### `show_session_data`

**Titel der Sitzungsdaten anzeigen**

Kommentar zu den Sitzungsdaten anzeigen

*Standard: `false`*

### `show_session_description`

**Sitzungsbeschreibung anzeigen**

Die Sitzungsbeschreibung überall dort anzeigen, wo diese Option implementiert ist (Seiten zur Sitzungsverfolgung usw.)

*Standard: `false`*

### `show_simple_session_info`

**Einfache Sitzungsinformationen anzeigen**

Fügt den Tutor und die Daten zum Sitzungsuntertitel in der Sitzungsliste hinzu.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Nur Benutzer aus aktiven Sitzungen im Tracking anzeigen**

Zeigt in den Lerner-Tracking- und Berichtsansichten nur Benutzer aus aktuell aktiven Sitzungen an.

*Standard: `false`*


### `tracking_columns`

**Spalten des Kurs-Sitzungs-Trackings anpassen**

Definiert ein Array von Spalten für die folgenden Berichte: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Dauer automatisch erstellter Sitzungen**

Dauer (in Tagen) der für einzelne Benutzer automatisch erstellten Sitzungen. Nach Ablauf kann sich der Benutzer nicht mehr für denselben Kurs registrieren (es wird keine weitere Sitzung erstellt).

*Standard: `1095`*


### `user_session_display_mode`

**Anzeigemodus „Meine Sitzungen“**

Legt fest, wie die Seite „Meine Sitzungen“ angezeigt wird: als moderne visuelle Blockansicht (Karten) oder im klassischen Listenstil.

*Standard: `list`*