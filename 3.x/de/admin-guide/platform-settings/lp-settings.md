# Einstellungen für Lernpfade

Standardwerte und Verhalten des Werkzeugs **Lernpfade** — automatischer Start, Standardansicht, Voraussetzungen, SCORM-Verhalten und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Lernpfade**. Diese Kategorie enthält **53 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_all_files_in_lp_export`

**Beim Export eines Lernpfads alle Dateien exportieren**

Beim Export eines Lernpfads werden auch alle Dateien und Ordner im selben Pfad einer HTML-Datei exportiert.

*Standard: `false`*


### `allow_htaccess_import_from_scorm`

**.htaccess aus SCORM-Paketen zulassen**

Normalerweise werden alle .htaccess-Dateien beim Import von Inhalten in Chamilo gefiltert und entfernt. Diese Funktion ermöglicht den Import von .htaccess, wenn sie in einem SCORM-Paket vorhanden ist.

*Standard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-Import innerhalb des Kursimports**

Aktivieren, um die Verzeichnisstruktur von SCORM-Paketen beim Wiederherstellen eines Kurses (über das Werkzeug zur Kurswartung) zu kopieren.

*Standard: `false`*


### `allow_lp_chamilo_export`

**Lernpfade im Chamilo-Sicherungsformat exportieren**

Ermöglicht den Export beliebiger Lernpfade im Sicherungsformat eines Chamilo-Kurses.

*Standard: `false`*


### `allow_lp_return_link`

**Rückkehrlink für Lernpfade anzeigen**

Deaktivieren Sie diese Option, um die Schaltfläche „Zur Startseite zurückkehren“ in den Lernpfaden auszublenden.

*Standard: `true`*


### `allow_lp_subscription_to_usergroups`

**Lernpfad-Einschreibung für Klassen**

Ermöglicht die Einschreibung in Lernpfade und Lernpfadkategorien für Gruppen/Klassen.

*Standard: `false`*


### `allow_session_lp_category`

**Lernpfadkategorien können in Sitzungen verwaltet werden**

[abgeleitet] Ermöglicht Lernenden und Lehrenden, Lernpfade innerhalb von Sitzungskursen nach Kategorien zu organisieren und zu verwalten.

*Standard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Lehrende können gesperrte Lernpfade aufrufen**

Lehrende müssen Lernpfade nicht vollständig abschließen, um Zugriff auf einen durch Voraussetzungen gesperrten Lernpfad zu erhalten.

*Standard: `false`*


### `disable_js_in_lp_view`

**JS in der Lernpfadansicht deaktivieren**

Deaktiviert JS-Dateien, die Chamilo HTML-Dateien im Lernpfad üblicherweise hinzufügt (während diese angezeigt werden).

*Standard: `false`*


### `disable_my_lps_page`

**Seite „Meine Lernpfade“ ausblenden**

Die Seite „Mein Lernpfad“ wurde in 1.11 hinzugefügt. Verwenden Sie diese Option, um sie auszublenden.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Schaltfläche „Herunterladen“ nach Abschluss der Lernpfade**

Schaltfläche zum Herunterladen von Dateien anzeigen, nachdem alle Lernpfade abgeschlossen wurden. Beispiel: Wenn ABC der Kurscode ist und 1 und 100 die Dokument-IDs sind, wählen Sie: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bearbeitung von Tests, die in Lernpfaden enthalten sind**

Ermöglicht die Bearbeitung von Tests, auch wenn sie in einen Lernpfad aufgenommen wurden. Standardmäßig wird die Bearbeitung verhindert, wenn der Test in einem Lernpfad enthalten ist, da dies bei erheblichen Teständerungen die Konsistenz der Nachverfolgung bei vielen Lernenden beeinträchtigen kann.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Anforderungskennzeichnung in Lernpfaden ausblenden**

Blendet den Tooltip zu den Voraussetzungen bei Lernpfadelementen aus. Dies ist vor allem eine ästhetische Entscheidung.

*Standard: `true`*

### `hide_lp_time`

**Zeit aus Lernpfadaufzeichnungen ausblenden**

Blendet die in Lernpfaden verbrachte Zeit in Berichten allgemein aus.

*Standard: `false`*

### `hide_scorm_copy_link`

**SCORM-Kopie ausblenden**

Blendet das Symbol „Lernpfad kopieren“ in der Liste der Lernpfade aus.

*Standard: `false`*

### `hide_scorm_export_link`

**SCORM-Export ausblenden**

Blendet das Symbol „SCORM-Export“ in der Liste der Lernpfade aus.

*Standard: `false`*

### `hide_scorm_pdf_link`

**PDF-Export des Lernpfads ausblenden**

Blendet das Symbol „PDF-Export des Lernpfads“ in der Liste der Lernpfade aus.

*Standard: `true`*

### `lp_allow_export_to_students`

**Lernende können Lernpfade exportieren**

Aktivieren Sie dies, damit Lernende die Lernpfade als SCORM-Pakete herunterladen können.

*Standard: `false`*

### `lp_default_visibility_can_be_modified_in_course` **v3**

**Standard-Sichtbarkeit neuer Lernpfade kann kursweise geändert werden**

Wenn aktiviert, können Lehrende in den Kurseinstellungen die Sichtbarkeit festlegen, die neuen Lernpfaden ihres Kurses zugewiesen wird, anstelle des Plattformstandards.

*Standard: `false`*

Wenn dies aktiviert ist, erscheint im Abschnitt **Einstellungen für Lernpfade** der Kurseinstellungen die Option **Standard-Sichtbarkeit für neue Lernpfade**. Ein Kurs, für den kein Wert gewählt wurde, verwendet `lp_default_visibility_on_creation`.

### `lp_default_visibility_on_creation` **v3**

**Standardsichtbarkeit neuer Lernpfade**

Sichtbarkeit, die einem neuen Lernpfad zugewiesen wird, wenn eine Lehrkraft ihn in einem Kurs erstellt. Lehrkräfte können die Sichtbarkeit jedes einzelnen Lernpfads anschließend weiterhin ändern.

*Standard: `invisible`*

### `lp_enable_flow`

**Navigation zwischen Lernpfaden**

Fügt die Möglichkeit hinzu, einen „nächsten“ Lernpfad auszuwählen, und zeigt Schaltflächen innerhalb des Lernpfads an, um von einem zum nächsten zu wechseln.

*Standard: `false`*

### `lp_fixed_encoding`

**Feste Zeichenkodierung im Lernpfad**

Reduziert den Ressourcenverbrauch, indem eine Prüfung der Textkodierung in importierten Lernpfaden ignoriert wird.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datumsbasierte Voraussetzungen für Lernpfadelemente**

Fügt die Option hinzu, Voraussetzungen mit Start- und Enddatum für Lernpfadelemente zu definieren.

*Standard: `false`*

### `lp_menu_location`

**Position des Lernpfadmenüs**

Setzen Sie diesen Wert auf 'left' oder 'right', um die Seite des Lernpfadmenüs zu ändern.

*Standard: `left`*

### `lp_minimum_time`

**Mindestzeit zum Abschließen eines Lernpfads**

Fügt Lernpfaden ein Feld für die Mindestzeit hinzu. Hat der Benutzer nicht so viel Zeit im Lernpfad verbracht, kann das letzte Element des Lernpfads nicht abgeschlossen werden.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lernpfadelement entsperren, wenn die maximale Anzahl von Versuchen für die Testvoraussetzung erreicht ist**

[abgeleitet] Entsperrt nachfolgende Lernpfadelemente automatisch, wenn ein Lernender die maximale Anzahl von Quizversuchen für einen Voraussetzungstest ausgeschöpft hat.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Voraussetzungen nach dem letzten Testversuch entsperren**

Ermöglicht Benutzern, in einem Lernpfad fortzufahren, nachdem alle Quizversuche eines Tests aufgebraucht wurden, der als Voraussetzung für andere Elemente dient.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Letzte Punktzahl bei Testvoraussetzungen im Lernpfad verwenden**

Wenn ein Test als Voraussetzung für ein Element im Lernpfad verwendet wird, wird nur der letzte Versuch des Tests zur Validierung der Voraussetzung herangezogen (standardmäßig wird der beste Versuch verwendet).

*Standard: `false`*

### `lp_prevents_beforeunload`

**beforeunload-JS-Ereignis im Lernpfad verhindern**

Dies verbessert die Browserkompatibilität, indem die Ausführung problematischer JS-Ereignisse verhindert wird.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Lernpfadpunktzahl als Fortschritt verwenden**

Dies ist nützlich bei SCORM-Inhalten mit nur einem großen SCO. SCORM übermittelt keinen Fortschritt; daher dient dies als Hilfsmittel, um die Punktzahl als Fortschritt zu verwenden. Durch Aktivieren dieser Option können Sie dies pro Lernpfad konfigurieren.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximalen Fortschritt statt Durchschnitt in Lernpfadberichten anzeigen**

[abgeleitet] Berechnet den Lernpfadfortschritt anhand der maximalen Elementabschlüsse statt als Durchschnitt aller Elemente.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximalen Fortschritt gegenüber Durchschnitt für Lernpfade auf Kursebene auswählen**

Ermöglicht die Neudefinition der Einstellung, um in Berichten zu Lernpfaden auf Kursebene den besten Fortschritt statt Durchschnittswerten anzuzeigen.

*Standard: `false`*

### `lp_show_reduced_report`

**Lernpfade: verkürzten Bericht anzeigen**

Zeigt im Lernpfad-Werkzeug, wenn ein Benutzer seinen eigenen Fortschritt überprüft (über das Statistiksymbol), eine verkürzte (weniger detaillierte) Version des Fortschrittsberichts an.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Verfügbarkeit von Lernpfaden für Lernende anzeigen**

Zeigt Lernpfade den Lernenden mit ihren Verfügbarkeitsdaten an, anstatt sie bis zum jeweiligen Datum auszublenden.

*Standard: `false`*

### `lp_subscription_settings`

**Abonnement-Einstellungen für Lernpfade**

Konfiguriert zusätzliche Optionen für die Abonnementfunktion von Lernpfaden. Zu den Optionen gehören 'allow_add_users_to_lp' und 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Einklappbare Elemente von Lernpfaden**

[abgeleitet] Zeigt Lernpfadelemente im einklappbaren Akkordeonformat an, um Navigation und Inhaltsorganisation zu verbessern.

*Standard: `false`*

### `lp_view_settings`

**Anzeigeeinstellungen für Lernpfade**

Konfiguriert zusätzliche Optionen für die Anzeige von Lernpfaden. Zu den Optionen gehören 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' und 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Zusatzfeld als student\_id in der SCORM-Kommunikation verwenden**

Geben Sie den Namen des Zusatzfelds an, das als student_id für die gesamte SCORM-Kommunikation verwendet werden soll.

### `scorm_api_username_as_student_id`

**Benutzernamen als student\_id in der SCORM-Kommunikation verwenden**

[abgeleitet] Verwendet den Benutzernamen des Lernenden als Studierendenkennung in der SCORM-API-Kommunikation anstelle der Lernenden-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-Status eigenständig aktualisieren**

Wenn das SCO keinen Status sendet, übernimmt das System die Aktualisierung des Status anhand der in Chamilo beobachtbaren Daten.

*Standard: `false`*

### `scorm_upload_from_cache`

**SCORM aus dem Cache-Verzeichnis hochladen**

Ermöglicht Administratoren, ein SCORM-Paket (im ZIP-Format) in das Cache-Verzeichnis hochzuladen und es auf der SCORM-Upload-Seite als Importquelle zu verwenden.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Tests aus Lernpfaden auch dann anzeigen, wenn sie unsichtbar sind**

Zeigt verborgene Übungen, die einem Lernpfad hinzugefügt wurden, in der Übungsliste an. Befinden wir uns in einer Sitzung, ist der Test im Basiskurs unsichtbar, ist er in einem Lernpfad enthalten und ist die Einstellung zu seiner Anzeige nicht ausdrücklich auf true gesetzt, wird er ausgeblendet.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Tests in der Liste der Lernpfad-Tests auch dann anzeigen, wenn sie unsichtbar sind**

[abgeleitet] Verborgene Tests in die Liste der verfügbaren Tests aufnehmen, wenn die Inhalte eines Lernpfads angezeigt werden.

*Standard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Unsichtbare Tests in Lernpfaden sichtbar**

Bewirkt, dass Tests, die im Test-Werkzeug als „unsichtbar“ gekennzeichnet sind, angezeigt werden, wenn sie in einem Lernpfad enthalten sind.

*Standard: `false`*

### `show_invisible_lp_in_course_home`

**Link zum Lernpfad auf der Kursstartseite anzeigen, auch wenn er unsichtbar ist**

Wenn ein Lernpfad auf unsichtbar gesetzt ist, die Lehrkraft bzw. der Tutor ihn jedoch über die Kursstartseite verfügbar machen möchte, verhindert diese Option, dass Chamilo den Link auf der Kursstartseite ausblendet.

*Standard: `false`*

### `show_prerequisite_as_blocked`

**Voraussetzungen von Lernpfaden**

Zeigt in den Listen der Lernpfade ein visuelles Element an, das darauf hinweist, dass andere Lernpfade derzeit durch eine Voraussetzungsregel gesperrt sind.

*Standard: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Spalte zum Erwerbsstatus in der Lernenden-Nachverfolgung hinzufügen**

Fügt der Seite zur Lernenden-Nachverfolgung eine Spalte hinzu, die den Erwerbsstatus eines Lernenden in einem Lernpfad anzeigt.

*Standard: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Sichtbarkeitsinformationen für Lernpfade auf der Seite zur Lernenden-Nachverfolgung hinzufügen**

[abgeleitet] Zeigt auf der Seite zur Fortschrittsverfolgung der Lernenden einen Indikator für den Sichtbarkeitsstatus von Lernpfaden an.

*Standard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informationen zum Freischaltungsstatus in der Liste der Lernpfade**

Fügt der Liste der Lernpfade eine Spalte „freigeschaltet“ hinzu, wenn der Lernende für den jeweiligen Lernpfad eingeschrieben ist und Zugriff darauf hat.

*Standard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Prozentzeichen im Durchschnitt der Tests in Lernpfaden in der Lernenden-Nachverfolgung ausblenden**

Blendet das Prozent-Symbol in der Angabe „Durchschnitt der Tests in Lernpfaden“ in der Lernenden-Nachverfolgung aus.

*Standard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Nicht abonnierte Lernpfade auf der Seite zur Lernenden-Nachverfolgung einbeziehen**

[abgeleitet] Zeigt Lernpfade auf den Fortschrittsseiten auch dann an, wenn Lernende nicht dafür eingeschrieben sind.

*Standard: `false`*

### `ticket_lp_quiz_info_add`

**Informationen zu Lernpfaden und Tests der Ticket-Berichterstattung hinzufügen**

[abgeleitet] Bezieht Informationen zu Lernpfaden und Tests in die Berichterstattung zu Support-Tickets ein, um die Problemverfolgung zu verbessern.

*Standard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Status von Lernpfadelementen aus anderen Sitzungen verwenden**

Ermöglicht es Benutzern, Voraussetzungen in einem Lernpfad zu erfüllen, wenn das entsprechende Element bereits in einer anderen Sitzung abgeschlossen wurde.

*Standard: `false`*