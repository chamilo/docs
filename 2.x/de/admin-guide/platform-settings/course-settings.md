# Kurseinstellungen

Standardwerte und Richtlinien, die für Kurse auf der gesamten Plattform gelten – Sichtbarkeit, Erstellungsrechte, erlaubte Werkzeuge, Berechtigungen für Lernende und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Kurs** zu. Diese Kategorie enthält **45 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `active_tools_on_create`

**Aktive Werkzeuge bei Kurserstellung**

Wählen Sie die Werkzeuge aus, die nach der Erstellung eines Kurses *aktiv* sein sollen.

*Standard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Kurskategorien von der Haupt-URL verwenden**

In Multi-URL-Einstellungen erlauben Sie Administratoren und Lehrenden, Kategorien von der Haupt-URL Kursen in den untergeordneten URLs zuzuweisen.

*Standard: `false`*

### `allow_course_theme`

**Kursthemen erlauben**

Ermöglicht grafische Kursthemen und macht es möglich, das Stylesheet, das von einem Kurs verwendet wird, auf eines der verfügbaren Stylesheets von Chamilo zu ändern. Wenn ein Benutzer den Kurs betritt, hat das Stylesheet des Kurses Vorrang vor dem eigenen Stylesheet des Benutzers und dem Standard-Stylesheet der Plattform.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Zugriff auf öffentliche Kurse mit Nutzungsbedingungen**

Wenn diese Option aktiviert ist, werden bei einem Kurs mit öffentlicher Sichtbarkeit und Nutzungsbedingungen diese Bedingungen deaktiviert, solange der Kurs öffentlich ist.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Zugriff auf öffentliche Kurse für authentifizierte Benutzer blockieren**

Zeigen Sie nur öffentliche Kurse an. Erlauben Sie registrierten Benutzern keinen Zugriff auf Kurse mit „offener“ Sichtbarkeit, es sei denn, sie sind für jeden dieser Kurse eingeschrieben.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Breadcrumb auf der Kurs-Startseite**

Das Breadcrumb ist das horizontale Navigationssystem mit Links, das sich normalerweise oben links auf Ihrer Seite befindet. Diese Option legt fest, was im Breadcrumb auf den Startseiten der Kurse angezeigt werden soll.

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Lehrerinformationen auf der Kursdetailseite ausblenden**

Blenden Sie auf der Kursdetailseite die Informationen zum Lehrer aus.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Kursvorlagen auf eine Kurskategorie beschränken**

Geben Sie einen Kategorien-Code an, der als Kursvorlagen verwendet werden soll. Nur diese Kurse werden bei der Kurserstellung im Dropdown-Menü angezeigt, und Benutzer sehen die Kurse dieser Kategorie nicht im Kurskatalog.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Zusätzliche Felder in den Kurseinstellungen anzeigen**

Die in diesem Array definierten Felder werden auf der Seite mit den Kurseinstellungen angezeigt.

### `course_creation_by_teacher_extra_fields_to_show`

**Zusätzliche Felder im Kurserstellungsformular anzeigen**

Die in diesem Array definierten Felder werden als zusätzliche Felder im Kurserstellungsformular angezeigt.

### `course_creation_donate_link`

**Spendenlink auf der Kurserstellungsseite**

Die Seite, auf die die Spendennachricht verlinken soll (vollständige URL).

### `course_creation_donate_message_show`

**Spendennachricht auf der Kurserstellungsseite anzeigen**

Fügen Sie eine Nachricht auf der Kurserstellungsseite für Lehrende hinzu, die sie auffordert, für das Projekt zu spenden.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Kurs-Code-Feld aus dem Kurserstellungsformular entfernen**

Wenn nicht angegeben, wird der Kurs-Code standardmäßig basierend auf dem Kurstitel generiert. Aktivieren Sie diese Option, um das Code-Feld vollständig aus dem Kurserstellungsformular zu entfernen.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Kurskategorie als Pflichtfeld festlegen**

Machen Sie bei der Kurserstellung die Kurskategorie zu einer erforderlichen Einstellung.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Zusätzliche Felder im Kurserstellungsformular als Pflichtfelder festlegen**

Die in diesem Array definierten Felder werden im Kurserstellungsformular als Pflichtfelder festgelegt.

### `course_creation_splash_screen`

**Begrüßungsbildschirm für Kurse**

Zeigen Sie bei der Erstellung eines neuen Kurses einen Begrüßungsbildschirm an.

*Standard: `true`*

---
### `course_creation_use_template`

**Vorlagekurs für neue Kurse verwenden**

Legen Sie fest, dass für alle neuen Kurse, die auf der Plattform erstellt werden, derselbe Vorlagekurs (identifiziert durch seine numerische Kurs-ID in der Datenbank) verwendet wird. Bitte beachten Sie, dass diese Einstellung, wenn sie nicht sorgfältig geplant ist, erhebliche Auswirkungen auf den Speicherplatzverbrauch haben kann. Der Vorlagekurs wird so verwendet, als ob der Lehrer eine Kopie des Kurses mit den Kurs-Backup-Tools erstellt hätte, sodass keine Benutzerinhalte kopiert werden, sondern nur das Material des Lehrers. Alle anderen Regeln für Kurs-Backups gelten. Lassen Sie das Feld leer (oder setzen Sie es auf 0), um diese Funktion zu deaktivieren.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Kursfelder mit Benutzerfeldern vorab ausfüllen**

Wenn dieses Feld nicht leer ist, sucht der Kurs-Erstellungsprozess nach bestimmten Feldern im Benutzerprofil und füllt diese automatisch für den Kurs aus. Zum Beispiel könnte ein Lehrer, der auf digitales Marketing spezialisiert ist, automatisch eine „Digitales Marketing“-Markierung für jeden von ihm erstellten Kurs setzen.

### `course_hide_tools`

**Tools vor Lehrern verbergen**

Markieren Sie die Tools, die Sie vor Lehrern verbergen möchten. Dies verhindert den Zugriff auf das jeweilige Tool.

### `course_images_in_courses_list`

**Benutzerdefinierte Kurs-Icons**

Verwenden Sie Kursbilder als Kurs-Icon in Kurslisten (anstelle des standardmäßigen grünen Tafel-Icons).

*Standard: `true`*

### `course_log_default_extra_fields`

**Standardmäßige zusätzliche Benutzerfelder auf der Kursstatistikseite**

Konfigurieren Sie dieses Array mit den internen IDs der zusätzlichen Felder, die Sie standardmäßig auf der Haupt-Kursstatistikseite anzeigen möchten.

### `course_log_hide_columns`

**Spalten in Kursprotokollen ausblenden**

Dieses Array ermöglicht es Ihnen, zu konfigurieren, welche Spalten auf der Haupt-Kursstatistikseite und im Gesamtzeitbericht ausgeblendet werden sollen.

### `course_sequence_valid_only_in_same_session`

**Voraussetzungen nur innerhalb derselben Sitzung validieren**

Wenn aktiviert, gilt ein Kurs nur dann als abgeschlossen, wenn er innerhalb der aktuellen Sitzung bestanden wurde. Wenn deaktiviert, werden auch in anderen Sitzungen bestandene Kurse abhängige Kurse freischalten.

*Standard: `false`*

### `course_student_info`

**Anzeige von Kursinformationen für Studierende**

Zeigen Sie auf den Seiten „Meine Kurse“/„Meine Sitzungen“ zusätzliche Informationen zu Punktestand, Fortschritt und/oder Zertifikatserwerb des Studierenden an.

### `course_validation`

**Kursvalidierung**

Wenn die Funktion „Kursvalidierung“ aktiviert ist, kann ein Lehrer keinen Kurs allein erstellen. Er/Sie füllt eine Kursanfrage aus. Der Plattformadministrator prüft die Anfrage und genehmigt oder lehnt sie ab.<br />Diese Funktion basiert auf automatisierten E-Mail-Nachrichten; konfigurieren Sie Chamilo so, dass es auf einen E-Mail-Server zugreifen kann und ein dediziertes E-Mail-Konto verwendet.

*Standard: `false`*

### `course_validation_terms_and_conditions_url`

**Kursvalidierung – Link zu den Nutzungsbedingungen**

Dies ist die URL zum Dokument „Nutzungsbedingungen“, das für die Beantragung eines Kurses gilt. Wenn die Adresse hier eingestellt ist, muss der Benutzer diese Nutzungsbedingungen lesen und ihnen zustimmen, bevor er eine Kursanfrage sendet.<br />Wenn Sie Chamilos Modul „Nutzungsbedingungen“ aktivieren und dessen URL verwenden möchten, lassen Sie diese Einstellung leer.

### `courses_default_creation_visibility`

**Standard-Sichtbarkeit von Kursen**

Standard-Sichtbarkeit beim Erstellen eines neuen Kurses.

*Standard: `2`*

### `display_coursecode_in_courselist`

**Kurskode in Kursnamen anzeigen**

Kurskode in der Kursliste anzeigen.

*Standard: `false`*

### `display_teacher_in_courselist`

**Lehrer in Kursnamen anzeigen**

Lehrer in der Kursliste anzeigen.

*Standard: `true`*

### `enable_tool_introduction`

**Tool-Einführung aktivieren**

Einführungen auf der Startseite jedes Tools aktivieren.

*Standard: `false`*

### `enable_unsubscribe_button_on_my_course_page`

**Abmeldebutton auf der Seite „Meine Kurse“ anzeigen**

Fügen Sie auf der Seite „Meine Kurse“ einen Button hinzu, um sich von einem Kurs abzumelden.

*Standard: `false`*

### `example_material_course_creation`

**Beispielmaterial bei Kurserstellung**

Beispielmaterial automatisch bei der Erstellung eines neuen Kurses erstellen.

*Standard: `true`*

### `hide_course_rating`

**Kursbewertung ausblenden**

Die Kursbewertungsfunktion ist standardmäßig an verschiedenen Stellen verfügbar. Wenn Sie diese nicht möchten, aktivieren Sie diese Option.

*Standard: `false`*

### `hide_course_sidebar`

**Kursblock in der Seitenleiste ausblenden**

Blenden Sie auf Bildschirmen, auf denen das linke Menü sichtbar ist, den Abschnitt „Kurse“ aus.

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Marker für geteilte Kurse bei Multi-URL anzeigen**

Fügt einen Link-Icon zu Kursen hinzu, die zwischen URLs geteilt werden, damit Benutzer (insbesondere Lehrer) wissen, dass sie beim Bearbeiten der Kursinhalte besondere Vorsicht walten lassen müssen.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Nur Kurse in der Sprache des Benutzers anzeigen**

Wenn aktiviert, blendet diese Option alle Kurse aus, die nicht in der Sprache des Benutzers eingestellt sind.

*Standard: `false`*

---
### `profiling_filter_adding_users`

**Benutzer basierend auf Profilfeldern bei der Kursanmeldung filtern**

Erlaubt Lehrenden, Benutzer auf der Seite zur Kursanmeldung anhand zusätzlicher Felder zu filtern.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Abhängigkeiten in der Kursübersicht anzeigen**

Bei der Verwendung von Ressourcen-Sequenzen in Kursen oder Sitzungen werden die Abhängigkeiten des Kurses auf der Startseite des Kurses angezeigt.

*Standard: `false`*


### `scorm_cumulative_session_time`

**Kumulative Sitzungszeit für SCORM**

Wenn aktiviert, wird die Sitzungszeit für SCORM-Lernpfade kumulativ berechnet, andernfalls wird sie nur ab dem letzten Aktualisierungszeitpunkt gezählt. Dies ist eine globale Einstellung. Sie wird beim Erstellen eines neuen Lernpfads verwendet, kann aber für jeden Lernpfad individuell angepasst werden.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-Mail-Benachrichtigung bei Kurserstellung**

Sendet eine E-Mail an den Plattformadministrator, jedes Mal wenn ein Lehrer einen neuen Kurs erstellt.

*Standard: `false`*


### `show_course_duration`

**Kursdauer anzeigen**

Zeigt die Kursdauer neben dem Kurstitel im Kurskatalog und in der Kursliste an.

*Standard: `false`*


### `show_navigation_menu`

**Kursnavigationsmenü anzeigen**

Zeigt ein Navigationsmenü an, das den schnellen Zugriff auf die Werkzeuge erleichtert.

*Standard: `false`*


### `show_toolshortcuts`

**Werkzeug-Shortcuts**

Sollen die Werkzeug-Shortcuts im Banner angezeigt werden?

*Standard: `false`*


### `student_view_enabled`

**Lernendenansicht aktivieren**

Aktiviert die Lernendenansicht, die es einem Lehrer oder Administrator ermöglicht, einen Kurs so zu sehen, wie ihn ein Lernender sehen würde.

*Standard: `true`*


### `view_grid_courses`

**Kurse in einem Rasterlayout anzeigen**

Zeigt Kurse in einem Layout mit mehreren Kursen pro Zeile an. Andernfalls zeigt das Layout einen Kurs pro Zeile.

*Standard: `true`*