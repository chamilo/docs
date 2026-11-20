# Kurseinstellungen

Standardwerte und Richtlinien, die plattformweit für Kurse gelten — Sichtbarkeit, Erstellungsrechte, zulässige Werkzeuge, Berechtigungen für Lernende und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Kurs**. Diese Kategorie enthält **47 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

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

In Multi-URL-Einstellungen können Administratoren und Lehrende Kategorien der obersten URL Kursen in den untergeordneten URLs zuweisen.

*Standard: `false`*

### `allow_course_theme`

**Kursthemen zulassen**

Ermöglicht grafische Kursthemen und erlaubt es, das von einem Kurs verwendete Stylesheet durch eines der für Chamilo verfügbaren Stylesheets zu ersetzen. Wenn ein Benutzer den Kurs betritt, hat das Stylesheet des Kurses Vorrang vor dem eigenen Stylesheet des Benutzers und dem Standard-Stylesheet der Plattform.

*Standard: `true`*

### `allow_public_course_with_no_terms_conditions`

**Zugang zu öffentlichen Kursen mit Nutzungsbedingungen**

Wenn diese Option aktiviert ist und ein Kurs öffentliche Sichtbarkeit sowie Nutzungsbedingungen hat, werden diese Bedingungen deaktiviert, solange der Kurs öffentlich ist.

*Standard: `false`*

### `block_registered_users_access_to_open_course_contents`

**Zugang authentifizierter Benutzer zu öffentlichen Kursen sperren**

Nur öffentliche Kurse anzeigen. Registrierten Benutzern den Zugang zu Kursen mit der Sichtbarkeit „offen“ nicht gestatten, sofern sie nicht in jedem dieser Kurse eingeschrieben sind.

*Standard: `false`*

### `breadcrumbs_course_homepage`

**Brotkrümelnavigation der Kursstartseite**

Die Brotkrümelnavigation ist das horizontale Link-Navigationssystem, das sich üblicherweise oben links auf Ihrer Seite befindet. Mit dieser Option legen Sie fest, was in der Brotkrümelnavigation auf den Startseiten der Kurse erscheinen soll.

*Standard: `course_title`*

### `course_about_teacher_name_hide`

**Informationen zur Lehrkraft auf der Kursdetailseite ausblenden**

Auf der Kursdetailseite die Informationen zur Lehrkraft ausblenden.

*Standard: `false`*

### `course_category_code_to_use_as_model`

**Kursvorlagen auf eine Kurskategorie beschränken**

Geben Sie einen Kategoriecode an, der als Kursvorlagen verwendet werden soll. Nur diese Kurse werden in der Dropdown-Liste bei der Kurserstellung angezeigt, und Benutzer sehen die Kurse dieser Kategorie nicht im Kurskatalog.

### `course_configuration_tool_extra_fields_to_show_and_edit`

**Zusatzfelder in den Kurseinstellungen anzeigen**

Die in diesem Array definierten Felder erscheinen auf der Seite der Kurseinstellungen.

### `course_creation_by_teacher_extra_fields_to_show`

**Zusatzfelder im Formular zur Kurserstellung anzeigen**

Die in diesem Array definierten Felder erscheinen als zusätzliche Felder im Formular zur Kurserstellung.

### `course_creation_donate_link`

**Spendenlink auf der Seite zur Kurserstellung**

Die Seite, auf die die Spendennachricht verlinken soll (vollständige URL).

### `course_creation_donate_message_show`

**Spendennachricht auf der Seite zur Kurserstellung anzeigen**

Fügen Sie auf der Seite zur Kurserstellung für Lehrende ein Nachrichtenfeld hinzu, in dem sie um eine Spende für das Projekt gebeten werden.

*Standard: `false`*

### `course_creation_form_hide_course_code`

**Feld für den Kurscode aus dem Formular zur Kurserstellung entfernen**

Wenn kein Kurscode angegeben wird, wird er standardmäßig anhand des Kurstitels erzeugt. Aktivieren Sie diese Option, um das Codefeld vollständig aus dem Formular zur Kurserstellung zu entfernen.

*Standard: `false`*

### `course_creation_form_set_course_category_mandatory`

**Kurskategorie als Pflichtfeld festlegen**

Machen Sie bei der Erstellung eines Kurses die Kurskategorie zu einer erforderlichen Einstellung.

*Standard: `false`*

### `course_creation_form_set_extra_fields_mandatory`

**Zusatzfelder im Formular zur Kurserstellung als Pflichtfelder festlegen**

Die in diesem Array definierten Felder sind im Formular zur Kurserstellung Pflichtfelder.

### `course_creation_splash_screen`

**Startbildschirm für Kurse**

Beim Erstellen eines neuen Kurses einen Startbildschirm anzeigen.

*Standard: `true`*

### `course_creation_use_template`

**Vorlagenkurs für neue Kurse verwenden**

Aktivieren Sie diese Einstellung, um denselben Vorlagenkurs (identifiziert durch seine numerische Kurs-ID in der Datenbank) für alle neuen Kurse zu verwenden, die auf der Plattform erstellt werden. Bitte beachten Sie, dass diese Einstellung bei unzureichender Planung erhebliche Auswirkungen auf den Speicherplatzverbrauch haben kann. Der Vorlagenkurs wird so verwendet, als hätte die Lehrkraft eine Kopie des Kurses mit den Kurs-Sicherungswerkzeugen erstellt; es werden also keine Benutzerinhalte kopiert, sondern nur Lehrmaterial. Alle übrigen Regeln der Kurssicherung gelten. Leer lassen (oder auf 0 setzen), um die Funktion zu deaktivieren.

### `course_creation_user_course_extra_field_relation_to_prefill`

**Kursfelder mit Feldern aus dem Benutzerprofil vorausfüllen**

Wenn der Wert nicht leer ist, sucht der Kurserstellungsprozess nach bestimmten Feldern im Benutzerprofil und füllt sie automatisch für den Kurs aus. Beispielsweise könnte eine Lehrkraft mit Spezialisierung auf digitales Marketing automatisch ein Kennzeichen « digitales Marketing » für jeden von ihr erstellten Kurs setzen.

### `course_hide_tools`

**Werkzeuge vor Lehrkräften ausblenden**

Markieren Sie die Werkzeuge, die Sie vor Lehrkräften ausblenden möchten. Dadurch wird der Zugriff auf das Werkzeug unterbunden.

### `course_images_in_courses_list`

**Benutzerdefinierte Kurssymbole**

Kursbilder als Kurssymbol in Kurslisten verwenden (anstelle des standardmäßigen grünen Tafel-Symbols).

*Standard: `true`*

### `course_log_default_extra_fields`

**Zusätzliche Benutzerfelder standardmäßig auf der Kursstatistikseite**

Konfigurieren Sie dieses Array mit den internen IDs der zusätzlichen Felder, die standardmäßig auf der Hauptseite der Kursstatistiken angezeigt werden sollen.

### `course_log_hide_columns`

**Spalten in Kursprotokollen ausblenden**

Dieses Array ermöglicht es, festzulegen, welche Spalten auf der Hauptseite der Kursstatistiken und im Bericht zur Gesamtzeit ausgeblendet werden.

### `course_sequence_valid_only_in_same_session`

**Voraussetzungen nur innerhalb derselben Sitzung validieren**

Wenn aktiviert, gilt ein Kurs nur dann als validiert, wenn er innerhalb der aktuellen Sitzung bestanden wurde. Wenn deaktiviert, schalten auch in anderen Sitzungen bestandene Kurse abhängige Kurse frei.

*Standard: `false`*


### `course_student_info`

**Anzeige der Kursinformationen für Lernende**

Auf den Seiten „Meine Kurse“/„Meine Sitzungen“ zusätzliche Informationen zu Punktzahl, Fortschritt und/oder Zertifikatserwerb der Lernenden anzeigen.

### `course_validation`

**Kursvalidierung**

Wenn die Funktion „Kursvalidierung“ aktiviert ist, kann eine Lehrkraft einen Kurs nicht allein erstellen. Sie füllt einen Kursantrag aus. Die Plattformadministration prüft den Antrag und genehmigt oder lehnt ihn ab.<br />Diese Funktion beruht auf automatisiertem E-Mail-Versand; konfigurieren Sie Chamilo so, dass ein E-Mail-Server erreichbar ist und ein dediziertes E-Mail-Konto verwendet wird.

*Standard: `false`*


### `course_validation_terms_and_conditions_url`

**Kursvalidierung – Link zu den Allgemeinen Geschäftsbedingungen**

Dies ist die URL zum Dokument „Allgemeine Geschäftsbedingungen“, das für die Stellung eines Kursantrags gilt. Wenn die Adresse hier gesetzt ist, muss die Benutzerin bzw. der Benutzer diese Bedingungen lesen und ihnen zustimmen, bevor ein Kursantrag gesendet wird.<br />Wenn Sie das Modul „Allgemeine Geschäftsbedingungen“ von Chamilo aktivieren und dessen URL verwendet werden soll, lassen Sie diese Einstellung leer.

### `courses_default_creation_visibility`

**Standard-Kurssichtbarkeit**

Standard-Kurssichtbarkeit beim Erstellen eines neuen Kurses

*Standard: `2`*


### `display_coursecode_in_courselist`

**Code im Kursnamen anzeigen**

Kurscode in der Kursliste anzeigen

*Standard: `false`*


### `display_teacher_in_courselist`

**Lehrkraft im Kursnamen anzeigen**

Lehrkraft in der Kursliste anzeigen

*Standard: `true`*


### `enable_tool_introduction`

**Werkzeugeinführung aktivieren**

Einführungen auf der Startseite jedes Werkzeugs aktivieren

*Standard: `false`*


### `enable_unsubscribe_button_on_my_course_page`

**Abmeldebutton unter „Meine Kurse“ anzeigen**

Einen Button zum Abmelden von einem Kurs auf der Seite „Meine Kurse“ hinzufügen.

*Standard: `false`*

### `example_material_course_creation`

**Beispielmaterial bei der Kurserstellung**

Beim Erstellen eines neuen Kurses automatisch Beispielmaterial anlegen

*Standard: `true`*


### `hide_course_rating`

**Kursbewertung ausblenden**

Die Funktion zur Kursbewertung ist standardmäßig an verschiedenen Stellen vorhanden. Aktivieren Sie diese Option, wenn Sie sie nicht verwenden möchten.

*Standard: `false`*

### `hide_course_sidebar`

**Kursblock in der Seitenleiste ausblenden**

Auf Bildschirmen, auf denen das linke Menü sichtbar ist, den Abschnitt « Kurse » nicht anzeigen.

*Standard: `true`*

### `multiple_access_url_show_shared_course_marker`

**Markierung für zwischen URLs geteilte Kurse anzeigen**

Fügt Kursen, die zwischen URLs geteilt werden, ein Link-Symbol hinzu, damit Benutzerinnen und Benutzer (insbesondere Lehrkräfte) wissen, dass sie beim Bearbeiten der Kursinhalte besondere Sorgfalt walten lassen müssen.

*Standard: `false`*

### `my_courses_show_courses_in_user_language_only`

**Nur Kurse in der Sprache der Benutzerin bzw. des Benutzers anzeigen**

Wenn aktiviert, blendet diese Option alle Kurse aus, die nicht in der Sprache der Benutzerin bzw. des Benutzers eingestellt sind.

*Standard: `false`*

### `profiling_filter_adding_users`

**Benutzer anhand von Profilfeldern bei der Kurseinschreibung filtern**

Ermöglicht Lehrkräften, Benutzer auf der Seite zur Kurseinschreibung anhand zusätzlicher Felder zu filtern.

*Standard: `false`*


### `resource_sequence_show_dependency_in_course_intro`

**Abhängigkeiten in der Kurseinführung anzeigen**

Zeigt bei der Verwendung der Ressourcenabfolge mit Kursen oder Sitzungen die Abhängigkeiten des Kurses auf der Kursstartseite an.

*Standard: `false`*

### `scorm_cumulative_session_time`

**Kumulative Sitzungszeit für SCORM**

Wenn aktiviert, wird die Sitzungszeit für SCORM-Lernpfade kumulativ erfasst; andernfalls wird sie nur ab dem Zeitpunkt der letzten Aktualisierung gezählt. Dies ist eine globale Einstellung. Sie wird beim Erstellen eines neuen Lernpfads verwendet, kann anschließend jedoch für jeden Lernpfad neu festgelegt werden.

*Standard: `true`*


### `send_email_to_admin_when_create_course`

**E-Mail-Benachrichtigung bei Kurserstellung**

Sendet jedes Mal eine E-Mail an die Plattformadministration, wenn eine Lehrkraft einen neuen Kurs erstellt.

*Standard: `false`*


### `show_clock_time_spent_can_be_modified_in_course`

**Uhr für die verbrachte Zeit kann pro Kurs geändert werden**

Wenn aktiviert, können Lehrkräfte in den Kurseinstellungen festlegen, ob ihr Kurs den Lernenden die im Kurs verbrachte Zeit anzeigt, anstatt der Plattformeinstellung zu folgen.

*Standard: `false`*

### `show_clock_time_spent_on_all_course_page_for_learner`

**Lernenden die im Kurs verbrachte Zeit anzeigen**

Zeigt auf jeder Seite eines Kurses, einschließlich der Lernpfade, eine Uhr an, die den Lernenden die Gesamtzeit anzeigt, die sie im Kurs verbracht haben, wie sie durch die Kursverfolgung erfasst wird. Sie läuft weiter, solange der Lernende aktiv ist, und stoppt nach der maximalen Inaktivitätszeit, die von der Verfolgung berücksichtigt wird.

Die Uhr zeigt dieselbe Zeit wie die Kursberichte: Sie beginnt mit der für den Lernenden im Kurs bereits erfassten Zeit (und in der Sitzung, wenn der Kurs innerhalb einer Sitzung absolviert wird) und zählt dann jede Sekunde. Nach Ablauf der in `maximum_inactive_time_to_consider` (Einstellungen zur Verfolgung) festgelegten Inaktivitätszeit beendet die Verfolgung die Zählung, und die Uhr stoppt ebenfalls, bis der Lernende erneut aktiv wird. Lehrkräfte, Tutoren, Coaches und Administratoren sehen die Uhr niemals.

*Standard: `false`*

### `show_course_duration`

**Kursdauer anzeigen**

Zeigt die Kursdauer neben dem Kurstitel im Kurskatalog und in der Kursliste an.

*Standard: `false`*

### `show_navigation_menu`

**Kursnavigationsmenü anzeigen**

Zeigt ein Navigationsmenü an, das den Zugriff auf die Werkzeuge beschleunigt.

*Standard: `false`*


### `show_toolshortcuts`

**Werkzeugverknüpfungen**

Die Werkzeugverknüpfungen im Banner anzeigen?

*Standard: `false`*

### `student_view_enabled`

**Lernendenansicht aktivieren**

Aktiviert die Lernendenansicht, mit der eine Lehrkraft oder ein Administrator einen Kurs so sehen kann, wie ihn ein Lernender sehen würde.

*Standard: `true`*


### `view_grid_courses`

**Kurse in einem Rasterlayout anzeigen**

Zeigt Kurse in einem Layout mit mehreren Kursen pro Zeile an. Andernfalls zeigt das Layout einen Kurs pro Zeile an.

*Standard: `true`*