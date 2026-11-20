# Sitzungseinstellungen

Standardwerte und Verhalten für **Sitzungen** — Sitzungslebenszyklus, Zugriffsfenster für Tutoren, Sichtbarkeit von Kursen innerhalb einer Sitzung und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Sitzungen**. Diese Kategorie enthält **68 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_users_by_coach`

**Tutoren erlauben, Benutzer zu registrieren**

Tutoren dürfen Benutzer auf der Plattform anlegen und Benutzer in eine Sitzung einschreiben.

*Standard: `false`*

### `allow_career_diagram`

**Karrierediagramme aktivieren**

Karrierediagramme ermöglichen die Darstellung von Diagrammen zu Karrieren, Kompetenzen und Kursen.

*Standard: `false`*


### `allow_career_users`

**Karrierediagramme für Benutzer aktivieren**

Wenn Karrierediagramme aktiviert sind, können Benutzer sie nur sehen (und nur die Diagramme, die ihrem Studium entsprechen), wenn Sie diese Option aktivieren.

*Standard: `false`*

### `allow_coach_to_edit_course_session`

**Tutoren erlauben, innerhalb von Kurssitzungen zu bearbeiten**

Tutoren erlauben, innerhalb von Kurssitzungen zu bearbeiten

*Standard: `true`*

### `allow_delete_user_for_session_admin`

**Sitzungsadministratoren können Benutzer löschen**

Sitzungsadministratoren können Benutzer von der Plattform entfernen, wenn sie ihre Sitzung(en) verwalten.

*Standard: `false`*


### `allow_disable_user_for_session_admin`

**Sitzungsadministratoren können Benutzer deaktivieren**

Sitzungsadministratoren können Benutzerkonten deaktivieren, um die Anmeldung zu verhindern, während Einschreibungsdatensätze in ihren Sitzungen erhalten bleiben.

*Standard: `false`*


### `allow_edit_tool_visibility_in_session`

**Bearbeitung der Werkzeugsichtbarkeit in Sitzungen erlauben**

Bei der Verwendung von Sitzungen besteht das Standardverhalten darin, die im Basiskurs definierte Werkzeugsichtbarkeit zu verwenden. Diese Einstellung ändert dies, sodass Tutoren in Sitzungskursen die Sichtbarkeit der Werkzeuge an ihre Bedürfnisse anpassen können.

*Standard: `true`*

### `allow_redirect_to_session_after_inscription_about`

**Nach der Registrierung auf der Seite „Über“ der Sitzung zur Sitzung weiterleiten**

Neue Benutzer nach Abschluss der Registrierung über die Seite „Über“ einer Sitzung automatisch zu ihrer Sitzungsseite weiterleiten.

*Standard: `false`*


### `allow_search_diagnostic`

**Sitzungssuchdiagnose aktivieren**

Tutoren eine Diagnose ermöglichen, mit der sie nach den besten Sitzungen für Lernende suchen können.

*Standard: `false`*


### `allow_session_admin_extra_access`

**Sitzungsadministratoren können auf den Stapelimport, die Aktualisierung und den Export von Benutzern zugreifen**

Sitzungsadministratoren können zusätzlich zu ihren Standardberechtigungen auf Funktionen zum Stapelimport, zur Aktualisierung und zum Export von Benutzern zugreifen.

*Standard: `false`*


### `allow_session_admin_login_as_teacher`

**Sitzungsadministratoren können sich als Lehrkräfte anmelden**

Sitzungsadministratoren können Lehrkraftkonten übernehmen, um Kursinhalte und die Lernerfahrung innerhalb ihrer Sitzung(en) in der Vorschau anzuzeigen.

*Standard: `false`*


### `allow_session_admin_read_careers`

**Sitzungsadministratoren können Karrieren anzeigen**

[abgeleitet] Sitzungsadministratoren können Karrierepfade und Beförderungsabläufe anzeigen und darauf zugreifen, die mit ihren verwalteten Sitzungen verknüpft sind.

*Standard: `false`*


### `allow_session_admins_to_manage_all_sessions`

**Sitzungsadministratoren erlauben, alle Sitzungen zu sehen**

Wenn diese Option nicht aktiviert ist (Standard), können Sitzungsadministratoren nur die von ihnen erstellten Sitzungen sehen. Dies ist in einer offenen Umgebung verwirrend, in der Sitzungsadministratoren die Betreuungszeit möglicherweise zwischen zwei Sitzungen aufteilen müssen.

*Standard: `false`*

### `allow_session_course_copy_for_teachers`

**Kopieren von Sitzung zu Sitzung für Lehrkräfte erlauben**

Aktivieren Sie diese Option, damit Lehrkräfte ihre Inhalte von einem Kurs in einer Sitzung in einen Kurs in einer anderen Sitzung kopieren können. Standardmäßig steht diese Option nur Plattformadministratoren zur Verfügung.

*Standard: `false`*

### `allow_teachers_to_create_sessions`

**Lehrkräften erlauben, Sitzungen zu erstellen**

Lehrkräfte können ihre eigenen Sitzungen erstellen, bearbeiten und löschen.

*Standard: `false`*

### `allow_tutors_to_assign_students_to_session`

**Tutoren können Lernende Sitzungen zuweisen**

Wenn diese Option aktiviert ist, können Kurstutoren in Sitzungen neue Benutzer in ihre Sitzung einschreiben. Andernfalls steht diese Option nur Administratoren und Sitzungsadministratoren zur Verfügung.

*Standard: `false`*

### `allow_user_session_collapsable`

**Benutzern erlauben, Sitzungen unter „Meine Sitzungen“ einzuklappen**

Benutzer können Sitzungskarten oder Gruppen auf der Seite „Meine Sitzungen“ einklappen, um die visuelle Überladung zu verringern und die Navigation zu verbessern.

*Standard: `false`*


### `assignment_base_course_teacher_access_to_all_session`

**Lehrkraft des Basiskurses kann Aufgaben aus allen Sitzungen sehen**

Alle Veröffentlichungen von Lernenden (aus dem Basiskurs und aus allen Sitzungen) auf der Seite work/pending.php des Basiskurses anzeigen.

*Standard: `false`*

### `career_diagram_disclaimer`

**Haftungsausschluss unter dem Karrierediagramm anzeigen**

Fügen Sie einen Haftungsausschluss unter dem Karrierediagramm hinzu. Eine Sprachvariable mit dem Namen „Career diagram disclaimer“ muss in Ihrer Untersprache vorhanden sein.

*Standardwert: `false`*

### `career_diagram_legend`

**Legende unter dem Karrierediagramm anzeigen**

Fügen Sie eine Karrierelegende unter dem Karrierediagramm hinzu. Eine Sprachvariable mit dem Namen „Career diagram legend“ muss in Ihrer Untersprache vorhanden sein.

*Standardwert: `false`*

### `courses_list_session_title_link`

**Art des Links für den Sitzungstitel**

Auf der Seite Kurse/Sitzungen kann der Sitzungstitel eine der folgenden Formen haben: 0 = kein Link (Sitzungstitel ausblenden); 1 = Titel mit einer speziellen Sitzungsseite verknüpfen; 2 = Link zum Kurs, wenn nur ein Kurs vorhanden ist; 3 = der Sitzungstitel macht die Kursliste einklappbar; 4 = kein Link (Sitzungstitel anzeigen).

*Standardwert: `1`*

### `default_session_list_view`

**Standardansicht der Sitzungsliste**

Wählen Sie die Standardregisterkarte aus, die beim Öffnen der Sitzungsliste als Administrator angezeigt werden soll.

*Standardwert: `all`*


### `hrm_can_access_all_session_content`

**HR-Direktoren greifen auf alle Sitzungsinhalte zu**

Wenn aktiviert, können HRM-Benutzer auf Inhalte und Benutzer in den Sitzungen zugreifen, denen sie folgen. Der Legacy-Schlüssel `session.drh_can_access_all_session_content` bleibt aus Kompatibilitätsgründen erkannt.

*Standardwert: `true`*

### `duplicate_specific_session_content_on_session_copy`

**Kopieren sitzungsspezifischer Inhalte in eine andere Sitzung aktivieren**

Ermöglicht die Duplizierung von Ressourcen, die in der Sitzung erstellt wurden, beim Duplizieren der Sitzung.

*Standardwert: `false`*


### `email_template_subscription_to_session_confirmation_lost_password`

**Link zum Zurücksetzen des Passworts zur E-Mail-Benachrichtigung über die Anmeldung zu einer Sitzung hinzufügen**

Fügen Sie einen Link zum Zurücksetzen des Passworts in Bestätigungs-E-Mails zur Anmeldung ein, die an Benutzer gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standardwert: `false`*


### `email_template_subscription_to_session_confirmation_username`

**Benutzernamen zur E-Mail-Benachrichtigung über die Anmeldung zu einer Sitzung hinzufügen**

Fügen Sie den Benutzernamen des Benutzers in Bestätigungs-E-Mails zur Anmeldung ein, die gesendet werden, wenn sie in eine Sitzung eingeschrieben werden.

*Standardwert: `false`*


### `enable_auto_reinscription`

**Automatische Wiedereinschreibung aktivieren**

Aktivieren oder deaktivieren Sie die automatische Wiedereinschreibung, wenn die Gültigkeit des Kurses abläuft. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standardwert: `false`*


### `enable_session_replication`

**Sitzungsreplikation aktivieren**

Aktivieren oder deaktivieren Sie die automatische Sitzungsreplikation. Der zugehörige Cron-Job muss ebenfalls aktiviert sein.

*Standardwert: `false`*


### `extend_rights_for_coach`

**Rechte für Tutoren erweitern**

Aktivieren Sie diese Option, um Tutoren dieselben Berechtigungen wie Trainern für Autorentools zu geben

*Standardwert: `false`*

### `hide_courses_in_sessions`

**Kursliste in Sitzungen ausblenden**

Wenn der Sitzungsblock auf Ihrer Kursseite angezeigt wird, blenden Sie die Liste der Kurse innerhalb dieser Sitzung aus (zeigen Sie sie nur auf dem spezifischen Sitzungsbildschirm an).

*Standardwert: `false`*

### `hide_reporting_session_list`

**Sitzungsliste im Berichtswerkzeug ausblenden**

Sitzungen, die den Kurs enthalten, werden im Berichtswerkzeug innerhalb des Kurses selbst aufgelistet, was die Darstellung erheblich belasten kann, wenn derselbe Kurs in Hunderten von Sitzungen verwendet wird. Diese Option entfernt diese Liste.

*Standardwert: `false`*


### `hide_search_form_in_session_list`

**Suchformular in der Sitzungsliste ausblenden**

Entfernen Sie das Sucheingabefeld aus der Sitzungslistenansicht in der Verwaltungsoberfläche.

*Standardwert: `false`*


### `hide_session_graph_in_my_progress`

**Sitzungsdiagramm in „Mein Fortschritt“ ausblenden**

Blenden Sie Sitzungsfortschrittsdiagramme und Visualisierungen auf der Seite „Mein Fortschritt“ in den Dashboards der Lernenden aus.

*Standardwert: `false`*


### `hide_tab_list`

**Registerkarten auf der Sitzungsseite ausblenden**

Entfernen Sie Navigationsregisterkarten von der Sitzungsdetailseite, um die Oberfläche zu vereinfachen.

### `limit_session_admin_list_users`

**Sitzungsadministratoren ist der Zugriff auf die Benutzerliste untersagt**

Verhindern Sie, dass Sitzungsadministratoren auf die globale Benutzerliste in der Verwaltungsoberfläche zugreifen.

*Standardwert: `false`*


### `limit_session_admin_role`

**Berechtigungen von Sitzungsadministratoren einschränken**

Wenn aktiviert, sehen die Sitzungsadministratoren nur den Benutzerblock mit der Option „Benutzer hinzufügen“ und den Sitzungsblock mit der Option „Sitzungsliste“.

*Standardwert: `false`*

### `my_courses_session_order`

**Standardsortierung der Sitzungen in „Meine Sitzungen“ ändern**

Standardmäßig werden Sitzungen nach Startdatum sortiert. Ändern Sie dies, indem Sie ein Array des Typs ['field' => 'end_date', 'order' => 'desc'] angeben.

### `my_courses_view_by_session`

**Meine Kurse nach Sitzung anzeigen**

Aktivieren Sie eine zusätzliche Seite „Meine Kurse“, auf der Sitzungen als Teil von Kursen erscheinen und nicht umgekehrt.

*Standardwert: `false`*

### `my_progress_session_show_all_courses`

**Mein Fortschritt: Kursdetails in der Sitzung anzeigen**

Zeigen Sie alle Details jedes Kurses in der Sitzung an, wenn Sie auf die Sitzungsdetails klicken.

*Standardwert: `false`*

### `prevent_session_admins_to_manage_all_users`

**Sitzungsadministratoren daran hindern, alle Benutzer zu verwalten**

Wenn diese Option aktiviert ist, können Sitzungsadministratoren auf der Verwaltungsseite nur die Benutzer sehen, die sie selbst erstellt haben.

*Standard: `false`*

### `remove_session_url`

**Link zur Sitzungsseite ausblenden**

Blendet den Link zur Sitzungsseite in der Sitzungsliste aus.

*Standard: `false`*


### `session_admins_access_all_content`

**Sitzungsadministratoren können auf alle Kursinhalte zugreifen**

Sitzungsadministratoren können alle Kursinhalte innerhalb ihrer Sitzungen einsehen, einschließlich eingeschränkter oder archivierter Materialien.

*Standard: `false`*

### `session_admins_edit_courses_content`

**Sitzungsadministratoren können Kursinhalte bearbeiten**

Sitzungsadministratoren können Kursinhalte (Dokumente, Übungen, Werkzeuge) in Kursen bearbeiten, die ihren Sitzungen zugewiesen sind.

*Standard: `false`*

### `session_automatic_creation_user_id`

**Ersteller-ID automatisch erstellter Sitzungen**

Legen Sie den Benutzer fest, der als Ersteller der automatisch erstellten Sitzungen verwendet wird (um zu vermeiden, dass jede Sitzung dem Benutzer „1“ zugewiesen wird, der häufig der Portaladministrator ist).

*Standard: `1`*


### `session_classes_tab_disable`

**Registerkarte „Klasse hinzufügen“ im Sitzungskurs für Nicht-Administratoren deaktivieren**

Deaktiviert die Registerkarte zum Hinzufügen von Klassen im Sitzungskurs für Nicht-Administratoren.

*Standard: `false`*


### `session_coach_access_after_duration_end`

**Sitzungen nach Dauer für Tutoren immer verfügbar**

Andernfalls haben Sitzungstutoren nur während der aktiven Dauer Zugriff auf Sitzungen nach Dauer.

*Standard: `false`*


### `session_course_ordering`

**Manuelle Sortierung der Sitzungskurse**

Aktivieren Sie diese Option, damit Sitzungsadministratoren die Kurse innerhalb einer Sitzung manuell sortieren können. Wenn deaktiviert, werden Kurse alphabetisch nach Kurstitel sortiert.

*Standard: `false`*

### `session_course_users_subscription_limited_to_session_users`

**Kurseinschreibungen auf Benutzer der Sitzung beschränken**

Schränkt die Liste der Lernenden ein, die in die Kurssitzung eingeschrieben werden können. Und deaktiviert die Registrierung von Benutzern in allen Kursen über die Seite „Sitzung fortsetzen“.

*Standard: `false`*


### `session_courses_read_only_mode`

**Kurs in der Sitzung auf schreibgeschützt setzen**

Ermöglicht Lehrkräften, einige Kurse in den schreibgeschützten Modus zu versetzen, wenn sie über Sitzungen geöffnet werden. Aktivieren Sie in den Kurseigenschaften die Option „Kurs in der Sitzung sperren“.

*Standard: `false`*


### `session_creation_form_set_extra_fields_mandatory`

**Pflicht-Zusatzfelder im Formular zur Sitzungserstellung festlegen**

Macht die aufgeführten Felder bei der Sitzungserstellung erforderlich.

### `session_creation_user_course_extra_field_relation_to_prefill`

**Sitzungsfelder mit Benutzerfeldern vorausfüllen**

Array von Beziehungen zwischen Benutzer-Zusatzfeldern und Sitzungs-Zusatzfeldern, damit die Sitzung mit Daten vorausgefüllt werden kann, die den Benutzerdaten entsprechen.

### `session_days_after_coach_access`

**Standardzugriffstage des Tutors nach der Sitzung**

Standardanzahl der Tage, an denen ein Tutor nach dem offiziellen Sitzungsende auf eine Sitzung zugreifen kann

### `session_days_before_coach_access`

**Standardzugriffstage des Tutors vor der Sitzung**

Standardanzahl der Tage, an denen ein Tutor vor dem offiziellen Sitzungsbeginn auf eine Sitzung zugreifen kann

### `session_import_settings`

**Optionen für den Sitzungsimport**

Array von Optionen, die als Standardparameter beim CSV-/XML-Sitzungsimport angewendet werden.

### `session_list_order`

**Sitzungen unterstützen manuelle Sortierung**

Aktiviert die manuelle Neuanordnung von Sitzungen in der Verwaltungssitzungsliste per Drag-and-Drop oder einem ähnlichen Mechanismus.

*Standard: `false`*


### `session_list_show_count_users`

**Benutzeranzahl in der Sitzungsliste anzeigen**

Der Administrator kann die Anzahl der Benutzer in jeder Sitzung sehen. Dies erhöht die Last der Sitzungsliste. Wenn Sie die Liste häufig verwenden, sollten Sie sorgfältig abwägen, ob Sie die zusätzliche Wartezeit in Kauf nehmen möchten.

*Standard: `false`*


### `session_list_view_remaining_days`

**Verbleibende Tage in „Meine Sitzungen“ anzeigen**

Wenn aktiviert, werden die Sitzungsdaten auf der Seite „Meine Sitzungen“ durch die Anzahl der verbleibenden Tage ersetzt.

*Standard: `false`*

### `session_model_list_field_ordered_by_id`

**Sitzungsvorlagen im Formular zur Sitzungserstellung nach ID sortieren**

[abgeleitet] Sortiert Sitzungsvorlagen im Dropdown des Formulars zur Sitzungserstellung nach ihrer numerischen ID statt alphabetisch nach Namen.

*Standard: `false`*


### `session_multiple_subscription_students_list_avoid_emptying`

**Leeren der eingeschriebenen Benutzer bei der Sitzungseinschreibung verhindern**

Verhindert bei der Mehrfacheinschreibung von Lernenden in eine Sitzung das normale Verhalten, Benutzer abzumelden, die sich beim Absenden nicht im rechten Bereich befinden. Alle Benutzer bleiben erhalten.

*Standard: `false`*


### `show_all_sessions_on_my_course_page`

**Alle Sitzungen auf der Seite „Meine Kurse“ anzeigen**

Wenn aktiviert, zeigt diese Option alle Sitzungen des Benutzers in der kalenderbasierten Ansicht an.

*Standard: `true`*


### `show_session_coach`

**Sitzungstutor anzeigen**

Zeigt den Namen des allgemeinen Sitzungstutors im Sitzungstitelfeld der Kursliste an

*Standard: `false`*

### `show_session_data`

**Titel der Sitzungsdaten anzeigen**

Kommentar zu Sitzungsdaten anzeigen

*Standard: `false`*

### `show_session_description`

**Sitzungsbeschreibung anzeigen**

Die Sitzungsbeschreibung überall anzeigen, wo diese Option implementiert ist (Seiten zur Sitzungsnachverfolgung usw.).

*Standard: `false`*

### `show_simple_session_info`

**Einfache Sitzungsinformationen anzeigen**

Den Tutor und die Daten zum Sitzungsuntertitel in der Sitzungsliste hinzufügen.

*Standard: `true`*


### `show_users_in_active_sessions_in_tracking`

**Nur Benutzer aus aktiven Sitzungen in der Nachverfolgung anzeigen**

Nur Benutzer aus derzeit aktiven Sitzungen in den Ansichten zur Lernendennachverfolgung und Berichterstattung anzeigen.

*Standard: `false`*


### `tracking_columns`

**Spalten der Kurs-Sitzungs-Nachverfolgung anpassen**

Ein Array von Spalten für die folgenden Berichte definieren: 'course_session', 'my_students_lp', 'my_progress_lp', 'my_progress_courses'.

### `user_s_session_duration`

**Dauer automatisch erstellter Sitzungen**

Dauer (in Tagen) der automatisch erstellten Einzelnutzer-Sitzungen. Nach Ablauf kann sich der Benutzer nicht erneut für denselben Kurs registrieren (es wird keine weitere Sitzung erstellt).

*Standard: `1095`*


### `user_session_display_mode`

**Anzeigemodus „Meine Sitzungen“**

Wählen Sie, wie die Seite „Meine Sitzungen“ angezeigt wird: als moderne visuelle Blockansicht (Karten) oder im klassischen Listenstil.

*Standard: `list`*