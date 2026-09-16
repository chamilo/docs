# Kurseinstellungen

Vorgaben und Richtlinien, die plattformweit für Kurse gelten — Sichtbarkeit, Erstellungsrechte, zulässige Werkzeuge, Lernendenberechtigungen und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Kurs**. Diese Kategorie enthält **45 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `active_tools_on_create`

**Aktive Werkzeuge bei der Kurserstellung**

Wählen Sie die Werkzeuge aus, die nach der Erstellung eines Kurses *aktiv* sein sollen.

*Standard:*
```
agenda,announcement,attendance,bbb,blog,chat,course_description,course_progress,customcertificate,document,dropbox,forum,global,glossary,gradebook,group,learnpath,link,mobidico,notebook,notebookteacher,portfolio,positioning,quiz,student_publication,survey,test2pdf,tracking,user,wiki,zoom
```

### `allow_base_course_category`

**Kurskategorien der obersten URL verwenden**

Erlaubt Administratoren und Lehrenden in Multi-URL-Umgebungen, Kategorien der obersten URL Kursen in den untergeordneten URLs zuzuweisen.

*Standard: `false`*

### `allow_course_theme`

**Kursthemen zulassen**

Ermöglicht grafische Kursthemen und macht es möglich, das von einem Kurs verwendete Stylesheet auf eines der in Chamilo verfügbaren Stylesheets zu ändern. Wenn ein Benutzer den Kurs betritt, hat das Stylesheet des Kurses Vorrang vor dem eigenen Stylesheet des Benutzers und dem Standard-Stylesheet der Plattform.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Öffentliche Kurse mit Nutzungsbedingungen zugänglich machen**

Wenn diese Option aktiviert ist und ein Kurs öffentliche Sichtbarkeit sowie Nutzungsbedingungen hat, werden diese Bedingungen deaktiviert, solange der Kurs öffentlich ist.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Zugriff authentifizierter Benutzer auf öffentliche Kurse sperren**

Nur öffentliche Kurse anzeigen. Registrierten Benutzern den Zugriff auf Kurse mit der Sichtbarkeit „offen“ nicht erlauben, sofern sie nicht in jedem dieser Kurse eingeschrieben sind.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Brotkrumennavigation der Kursstartseite**

Die Brotkrumennavigation ist das horizontale Link-Navigationssystem, das sich üblicherweise oben links auf Ihrer Seite befindet. Diese Option legt fest, was in der Brotkrumennavigation auf den Startseiten der Kurse erscheinen soll.

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Lehrendeninformationen auf der Kursdetailseite ausblenden**

Auf der Kursdetailseite die Informationen zum Lehrenden ausblenden.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Kursvorlagen auf eine Kurskategorie beschränken**

Geben Sie einen Kategoriecode an, der als Kursvorlagen verwendet werden soll. Nur diese Kurse erscheinen im Dropdown bei der Kurserstellung, und Benutzer sehen die Kurse dieser Kategorie nicht im Kurskatalog.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Zusatzfelder, die in den Kurseinstellungen angezeigt werden**

Die in diesem Array definierten Felder erscheinen auf der Seite der Kurseinstellungen.

### `course_creation_by_teacher_extra_fields_to_show`

**Zusatzfelder, die im Kurserstellungsformular angezeigt werden**

Die in diesem Array definierten Felder erscheinen als zusätzliche Felder im Kurserstellungsformular.

### `course_creation_donate_link`

**Spendenlink auf der Kurserstellungsseite**

Die Seite, auf die die Spendennachricht verlinken soll (vollständige URL).

### `course_creation_donate_message_show`

**Spendennachricht auf der Kurserstellungsseite anzeigen**

Fügt auf der Kurserstellungsseite für Lehrende ein Nachrichtenfeld hinzu, das sie bittet, für das Projekt zu spenden.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Kurscode-Feld aus dem Kurserstellungsformular entfernen**

Wenn nicht angegeben, wird der Kurscode standardmäßig anhand des Kurstitels erzeugt. Aktivieren Sie diese Option, um das Code-Feld vollständig aus dem Kurserstellungsformular zu entfernen.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Kurskategorie als Pflichtfeld festlegen**

Beim Erstellen eines Kurses die Kurskategorie zu einer erforderlichen Einstellung machen.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Zusatzfelder, die im Kurserstellungsformular Pflicht sind**

Die in diesem Array definierten Felder sind im Kurserstellungsformular Pflichtfelder.

### `course_creation_splash_screen`

**Startbildschirm für Kurse**

Beim Erstellen eines neuen Kurses einen Startbildschirm anzeigen.

*Standard: `true`*

### `course_creation_use_template`

**Vorlagenkurs für neue Kurse verwenden**

Setzen Sie diese Option, um denselben Vorlagenkurs (identifiziert durch seine numerische Kurs-ID in der Datenbank) für alle neuen Kurse zu verwenden, die auf der Plattform erstellt werden. Bitte beachten Sie, dass diese Einstellung bei unzureichender Planung erhebliche Auswirkungen auf den Speicherplatzverbrauch haben kann. Der Vorlagenkurs wird so verwendet, als hätte der Lehrende den Kurs mit den Kurs-Sicherungswerkzeugen kopiert; es wird also kein Benutzerinhalt kopiert, sondern nur Lehrendenmaterial. Alle übrigen Regeln der Kurssicherung gelten. Leer lassen (oder auf 0 setzen), um die Funktion zu deaktivieren.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Kursfelder mit Feldern aus dem Benutzerprofil vorausfüllen**

Wenn nicht leer, sucht der Kurserstellungsprozess nach bestimmten Feldern im Benutzerprofil und füllt diese automatisch für den Kurs aus. Beispielsweise könnte ein auf digitales Marketing spezialisierter Lehrender automatisch eine Markierung « digitales Marketing » für jeden von ihm/ihr erstellten Kurs setzen.

### `course_hide_tools`

**Werkzeuge vor Lehrenden verbergen**

Markieren Sie die Werkzeuge, die Sie vor Lehrenden verbergen möchten. Dadurch wird der Zugriff auf das jeweilige Werkzeug unterbunden.

### `course_images_in_courses_list`

**Benutzerdefinierte Kurs-Icons**

Kursbilder als Kurs-Icon in den Kurslisten verwenden (anstelle des standardmäßigen grünen Tafel-Icons).

*Standard: `true`*

### `course_log_default_extra_fields`

**Zusätzliche Benutzerfelder standardmäßig auf der Kursstatistikseite**

Konfigurieren Sie dieses Array mit den internen IDs der Extra-Felder, die Sie standardmäßig auf der zentralen Kursstatistikseite anzeigen möchten.

### `course_log_hide_columns`

**Spalten in den Kursprotokollen ausblenden**

Dieses Array ermöglicht es, festzulegen, welche Spalten auf der zentralen Kursstatistikseite und im Gesamtzeitbericht ausgeblendet werden sollen.

### `course_sequence_valid_only_in_same_session`

**Voraussetzungen nur innerhalb derselben Session validieren**

Wenn aktiviert, gilt ein Kurs nur dann als erfüllt, wenn er in der aktuellen Session bestanden wurde. Wenn deaktiviert, schalten auch in anderen Sessions bestandene Kurse abhängige Kurse frei.

*Standard: `false`*


### `course_student_info`

**Anzeige von Studierendeninformationen zum Kurs**

Auf den Seiten „Meine Kurse“/„Meine Sessions“ zusätzliche Informationen zu Punktzahl, Fortschritt und/oder Zertifikatserwerb der Studierenden anzeigen.

### `course_validation`

**Kursvalidierung**

Wenn die Funktion „Kursvalidierung“ aktiviert ist, kann ein Lehrender keinen Kurs eigenständig erstellen. Er/sie füllt eine Kursanfrage aus. Der Plattformadministrator prüft die Anfrage und genehmigt oder lehnt sie ab.<br />Diese Funktion basiert auf automatisierten E-Mail-Nachrichten; konfigurieren Sie Chamilo so, dass ein E-Mail-Server und ein dediziertes E-Mail-Konto verwendet werden.

*Standard: `false`*


### `course_validation_terms_and_conditions_url`

**Kursvalidierung – Link zu den Nutzungsbedingungen**

Dies ist die URL des Dokuments „Nutzungsbedingungen“, das für das Stellen einer Kursanfrage gilt. Wenn hier eine Adresse hinterlegt ist, muss der Benutzer diese Bedingungen lesen und akzeptieren, bevor er eine Kursanfrage sendet.<br />Wenn Sie das Chamilo-Modul „Nutzungsbedingungen“ aktivieren und dessen URL verwenden möchten, lassen Sie diese Einstellung leer.

### `courses_default_creation_visibility`

**Standard-Kurssichtbarkeit**

Standard-Kurssichtbarkeit beim Erstellen eines neuen Kurses

*Standard: `2`*


### `display_coursecode_in_courselist`

**Code im Kursnamen anzeigen**

Kurscode in den Kurslisten anzeigen

*Standard: `false`*


### `display_teacher_in_courselist`

**Lehrenden im Kursnamen anzeigen**

Lehrenden in den Kurslisten anzeigen

*Standard: `true`*


### `enable_tool_introduction`

**Werkzeug-Einführung aktivieren**

Einführungen auf der Startseite jedes Werkzeugs aktivieren

*Standard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Abmelde-Schaltfläche unter „Meine Kurse“ anzeigen**

Eine Schaltfläche zum Abmelden von einem Kurs auf der Seite „Meine Kurse“ hinzufügen.

*Standard: `false`*

### `example_material_course_creation`

**Beispielmaterial bei der Kurserstellung**

Beim Erstellen eines neuen Kurses automatisch Beispielmaterial anlegen

*Standard: `true`*


### `hide_course_rating`

**Kursbewertung ausblenden**

Die Kursbewertungsfunktion ist standardmäßig an verschiedenen Stellen vorhanden. Wenn Sie sie nicht wünschen, aktivieren Sie diese Option.

*Standard: `false`*

### `hide_course_sidebar`

**Kursblock in der Seitenleiste ausblenden**

Auf Bildschirmen, auf denen das linke Menü sichtbar ist, den Abschnitt « Kurse » nicht anzeigen.

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Kennzeichnung für über mehrere URLs geteilte Kurse anzeigen**

Fügt ein Link-Icon zu Kursen hinzu, die zwischen URLs geteilt werden, damit Benutzer (insbesondere Lehrende) wissen, dass sie beim Bearbeiten des Kursinhalts besondere Vorsicht walten lassen müssen.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Nur Kurse in der Sprache des Benutzers anzeigen**

Wenn aktiviert, blendet diese Option alle Kurse aus, die nicht in der Sprache des Benutzers festgelegt sind.

*Standard: `false`*

### `profiling_filter_adding_users`

**Benutzer anhand von Profilfeldern bei der Einschreibung in den Kurs filtern**

Lehrenden erlauben, Benutzer anhand zusätzlicher Felder auf der Seite zur Einschreibung von Benutzern in ihren Kurs zu filtern.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Abhängigkeiten in der Kurseinführung anzeigen**

Wenn die Sequenzierung von Ressourcen mit Kursen oder Sitzungen verwendet wird, die Abhängigkeiten des Kurses auf der Startseite des Kurses anzeigen.

*Standard: `false`*

### `scorm_cumulative_session_time`

**Kumulierte Sitzungszeit für SCORM**

Wenn aktiviert, wird die Sitzungszeit für SCORM-Lernpfade kumuliert, andernfalls wird sie nur ab dem Zeitpunkt der letzten Aktualisierung gezählt. Dies ist eine globale Einstellung. Sie wird beim Erstellen eines neuen Lernpfads verwendet, kann aber anschließend für jeden einzelnen neu definiert werden.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-Mail-Benachrichtigung bei Kurserstellung**

Bei jeder Erstellung eines neuen Kurses durch einen Lehrenden eine E-Mail an den Plattformadministrator senden

*Standard: `false`*


### `show_course_duration`

**Kursdauer anzeigen**

Die Kursdauer neben dem Kurstitel im Kurskatalog und in der Kursliste anzeigen.

*Standard: `false`*

### `show_navigation_menu`

**Kursnavigationsmenü anzeigen**

Ein Navigationsmenü anzeigen, das den Zugriff auf die Werkzeuge beschleunigt

*Standard: `false`*


### `show_toolshortcuts`

**Werkzeug-Verknüpfungen**

Die Werkzeug-Verknüpfungen im Banner anzeigen?

*Standard: `false`*

### `student_view_enabled`

**Lernendenansicht aktivieren**

Die Lernendenansicht aktivieren, mit der ein Lehrender oder Administrator einen Kurs so sehen kann, wie ihn ein Lernender sehen würde

*Standard: `true`*


### `view_grid_courses`

**Kurse in einem Rasterlayout anzeigen**

Kurse in einem Layout mit mehreren Kursen pro Zeile anzeigen. Andernfalls zeigt das Layout einen Kurs pro Zeile.

*Standard: `true`*