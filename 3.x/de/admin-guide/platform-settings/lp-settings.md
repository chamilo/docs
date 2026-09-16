# Einstellungen für Lernpfade

Vorgaben und Verhalten des Werkzeugs **Lernpfade** — Autostart, Standardansicht, Voraussetzungen, SCORM-Verhalten und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Lernpfade**. Diese Kategorie enthält **51 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_all_files_in_lp_export`

**Beim Export eines Lernpfads alle Dateien exportieren**

Beim Export eines LP werden alle Dateien und Ordner im selben Pfad einer HTML-Datei ebenfalls exportiert.

*Standard: `false`*


### `allow_htaccess_import_from_scorm`

**.htaccess aus SCORM-Paketen zulassen**

Normalerweise werden alle .htaccess-Dateien beim Import von Inhalten in Chamilo gefiltert und entfernt. Diese Funktion erlaubt den Import von .htaccess, wenn sie in einem SCORM-Paket vorhanden ist.

*Standard: `false`*


### `allow_import_scorm_package_in_course_builder`

**SCORM-Import innerhalb des Kursimports**

Ermöglicht das Kopieren der Verzeichnisstruktur von SCORM-Paketen beim Wiederherstellen eines Kurses (über das Kurswartungswerkzeug).

*Standard: `false`*


### `allow_lp_chamilo_export`

**Lernpfade im Chamilo-Sicherungsformat exportieren**

Ermöglicht den Export beliebiger Lernpfade im Sicherungsformat eines Chamilo-Kurses.

*Standard: `false`*


### `allow_lp_return_link`

**Rückkehr-Link in Lernpfaden anzeigen**

Deaktivieren Sie diese Option, um die Schaltfläche „Zur Startseite zurückkehren“ in den Lernpfaden auszublenden.

*Standard: `true`*


### `allow_lp_subscription_to_usergroups`

**Einschreibung in Lernpfade für Klassen**

Ermöglicht die Einschreibung in Lernpfade und Lernpfad-Kategorien für Gruppen/Klassen.

*Standard: `false`*


### `allow_session_lp_category`

**Lernpfad-Kategorien können in Sitzungen verwaltet werden**

[inferred] Ermöglicht Lernenden und Lehrenden, Lernpfade in Sitzungskursen nach Kategorien zu organisieren und zu verwalten.

*Standard: `false`*


### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Lehrende können auf gesperrte Lernpfade zugreifen**

Lehrende müssen Lernpfade nicht vollständig durchlaufen, um Zugriff auf einen durch Voraussetzungen gesperrten Lernpfad zu erhalten.

*Standard: `false`*


### `disable_js_in_lp_view`

**JS in der Lernpfad-Ansicht deaktivieren**

Deaktiviert JS-Dateien, die Chamilo üblicherweise HTML-Dateien im Lernpfad hinzufügt (während der Anzeige).

*Standard: `false`*


### `disable_my_lps_page`

**Seite „Meine Lernpfade“ ausblenden**

Die Seite „Mein Lernpfad“ wurde in 1.11 hinzugefügt. Verwenden Sie diese Option, um sie auszublenden.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Download-Schaltfläche nach Abschluss der Lernpfade**

Zeigt nach Abschluss aller LP eine Schaltfläche zum Herunterladen von Dateien. Beispiel: Wenn ABC der Kurs-Code ist und 1 und 100 die Dokument-IDs sind, wählen Sie: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bearbeitung von Tests, die in Lernpfaden enthalten sind**

Ermöglicht die Bearbeitung von Tests, auch wenn sie in einen Lernpfad aufgenommen wurden. Standardmäßig wird die Bearbeitung verhindert, wenn der Test in einem Lernpfad liegt, weil das die Konsistenz der Nachverfolgung bei vielen Lernenden beeinträchtigen kann, wenn die Teständerungen erheblich sind.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Anforderungsetikett in Lernpfaden ausblenden**

Blendet den Tooltip zu den Voraussetzungen bei Lernpfad-Elementen aus. Dies ist vorwiegend eine ästhetische Entscheidung.

*Standard: `true`*

### `hide_lp_time`

**Zeit aus Lernpfad-Aufzeichnungen ausblenden**

Blendet die in Lernpfaden verbrachte Zeit in Berichten generell aus.

*Standard: `false`*

### `hide_scorm_copy_link`

**SCORM-Kopie ausblenden**

Blendet das Symbol „Lernpfad kopieren“ in der Lernpfad-Liste aus.

*Standard: `false`*

### `hide_scorm_export_link`

**SCORM-Export ausblenden**

Blendet das Symbol „SCORM-Export“ in der Lernpfad-Liste aus.

*Standard: `false`*

### `hide_scorm_pdf_link`

**PDF-Export von Lernpfaden ausblenden**

Blendet das Symbol „Lernpfad als PDF exportieren“ in der Lernpfad-Liste aus.

*Standard: `true`*

### `lp_allow_export_to_students`

**Lernende können Lernpfade exportieren**

Aktivieren Sie dies, damit Lernende die Lernpfade als SCORM-Pakete herunterladen können.

*Standard: `false`*

### `lp_enable_flow`

**Zwischen Lernpfaden navigieren**

Fügt die Möglichkeit hinzu, einen „nächsten“ Lernpfad auszuwählen, und zeigt Schaltflächen im Lernpfad an, um von einem zum nächsten zu wechseln.

*Standard: `false`*

### `lp_fixed_encoding`

**Feste Kodierung im Lernpfad**

Reduziert den Ressourcenverbrauch, indem eine Prüfung der Textkodierung in importierten Lernpfaden übersprungen wird.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datumsbasierte Voraussetzungen für Lernpfad-Elemente**

Fügt die Option hinzu, Voraussetzungen mit Start- und Enddatum für Lernpfad-Elemente festzulegen.

*Standard: `false`*

### `lp_menu_location`

**Position des Lernpfad-Menüs**

Setzen Sie diesen Wert auf 'left' oder 'right', um die Seite des Lernpfad-Menüs zu ändern.

*Standard: `left`*

### `lp_minimum_time`

**Mindestzeit zum Abschließen eines Lernpfads**

Fügt Lernpfaden ein Feld für die Mindestzeit hinzu. Wenn der Benutzer nicht so viel Zeit im Lernpfad verbracht hat, kann das letzte Element des Lernpfads nicht abgeschlossen werden.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lernpfad-Element entsperren, wenn maximale Versuche für Test-Voraussetzung erreicht sind**

[inferred] Entsperrt nachfolgende Lernpfad-Elemente automatisch, wenn ein Lernender die maximale Anzahl von Testversuchen für einen als Voraussetzung dienenden Test ausgeschöpft hat.


### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Voraussetzungen nach letztem Testversuch entsperren**

Ermöglicht Benutzern, in einem Lernpfad fortzufahren, nachdem alle Testversuche eines Tests aufgebraucht wurden, der als Voraussetzung für andere Elemente dient.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Letzten Punktestand bei Test-Voraussetzungen im Lernpfad verwenden**

Wenn ein Test als Voraussetzung für ein Element im Lernpfad verwendet wird, nur den letzten Versuch des Tests zur Validierung der Voraussetzung heranziehen (standardmäßig wird der beste Versuch verwendet).

*Standard: `false`*

### `lp_prevents_beforeunload`

**beforeunload-JS-Ereignis im Lernpfad unterbinden**

Dies verbessert die Browserkompatibilität, indem problematische JS-Ereignisse nicht ausgeführt werden.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Lernpfad-Punktestand als Fortschritt verwenden**

Dies ist nützlich bei SCORM-Inhalten mit nur einem großen SCO. SCORM übermittelt keinen Fortschritt, daher ist dies ein Trick, um den Punktestand als Fortschritt zu verwenden. Durch Aktivieren dieser Option können Sie dies pro Lernpfad konfigurieren.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximalen Fortschritt statt Durchschnitt in der Lernpfad-Berichterstattung anzeigen**

[inferred] Berechnet den Lernpfad-Fortschritt anhand des maximalen Elementabschlusses statt über den Durchschnitt aller Elemente.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximalen Fortschritt vs. Durchschnitt für Lernpfade auf Kursebene auswählen**

Ermöglicht die Neudefinition der Einstellung, den besten Fortschritt statt Durchschnittswerte in der Berichterstattung von Lernpfaden auf Kursebene anzuzeigen.

*Standard: `false`*

### `lp_show_reduced_report`

**Lernpfade: gekürzten Bericht anzeigen**

Innerhalb des Lernpfad-Werkzeugs, wenn ein Benutzer seinen eigenen Fortschritt überprüft (über das Statistik-Symbol), eine gekürzte (weniger detaillierte) Version des Fortschrittsberichts anzeigen.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Verfügbarkeit von Lernpfaden für Lernende anzeigen**

Lernpfade den Lernenden mit ihren Verfügbarkeitsdaten anzeigen, anstatt sie bis zum Eintreten des Datums zu verbergen.

*Standard: `false`*

### `lp_subscription_settings`

**Einstellungen für die Lernpfad-Einschreibung**

Konfigurieren Sie zusätzliche Optionen für die Einschreibungsfunktion von Lernpfaden. Optionen umfassen 'allow_add_users_to_lp' und 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Zusammenklappbare Elemente von Lernpfaden**

[inferred] Zeigt Lernpfad-Elemente im zusammenklappbaren Akkordeon-Format für verbesserte Navigation und Inhaltsorganisation an.

*Standard: `false`*

### `lp_view_settings`

**Anzeige-Einstellungen für Lernpfade**

Konfigurieren Sie zusätzliche Optionen für die Anzeige von Lernpfaden. Optionen umfassen 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' und 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Zusatzfeld als student\_id in der SCORM-Kommunikation verwenden**

Geben Sie den Namen des Zusatzfelds an, das als student_id für die gesamte SCORM-Kommunikation verwendet werden soll.

### `scorm_api_username_as_student_id`

**Benutzername als student\_id in der SCORM-Kommunikation verwenden**

[inferred] Verwendet den Benutzernamen des Lernenden als Studentenkennung in der SCORM-API-Kommunikation statt der Lernenden-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-Status autonom aktualisieren**

Wenn das SCO keinen Status sendet, übernehmen und den Status anhand dessen aktualisieren, was in Chamilo beobachtet werden kann.

*Standard: `false`*

### `scorm_upload_from_cache`

**SCORM aus dem Cache-Verzeichnis hochladen**

Ermöglicht Administratoren, ein SCORM-Paket (im ZIP-Format) in das Cache-Verzeichnis hochzuladen und es als Importquelle auf der SCORM-Upload-Seite zu verwenden.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Tests aus Lernpfaden auch dann anzeigen, wenn unsichtbar**

Versteckte Übungen, die einem LP hinzugefügt wurden, in der Übungsliste anzeigen. Befinden wir uns in einer Sitzung, ist der Test im Basiskurs unsichtbar, er ist in einem LP enthalten und die Einstellung zur Anzeige ist nicht ausdrücklich auf wahr gesetzt, dann ausblenden.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Tests in der Liste der Lernpfad-Tests auch dann anzeigen, wenn unsichtbar**

[inferred] Nimmt versteckte Tests in die Liste der verfügbaren Tests auf, wenn Lernpfad-Inhalte betrachtet werden.

*Standard: `false`*

### `show_invisible_exercise_in_lp_toc`

**Unsichtbare Tests in Lernpfaden sichtbar**

Tests, die im Test-Werkzeug als „unsichtbar“ markiert sind, erscheinen, wenn sie in einem Lernpfad enthalten sind.

*Default: `false`*

### `show_invisible_lp_in_course_home`

**Link zum Lernpfad auf der Kursstartseite anzeigen, wenn unsichtbar**

Wenn ein Lernpfad auf unsichtbar gesetzt ist, der Lehrer/Tutor ihn aber von der Kursstartseite aus verfügbar machen möchte, verhindert diese Option, dass Chamilo den Link auf der Kursstartseite ausblendet.

*Default: `false`*

### `show_prerequisite_as_blocked`

**Voraussetzungen von Lernpfaden**

In den Lernpfadlisten ein visuelles Element anzeigen, das zeigt, dass andere Lernpfade derzeit durch eine Voraussetzungsregel gesperrt sind.

*Default: `false`*

### `student_follow_page_add_lp_acquisition_info`

**Spalte „Erwerb“ in der Lerner-Nachverfolgung hinzufügen**

Spalte auf der Seite der Lerner-Nachverfolgung hinzufügen, um den Erwerbsstatus eines Lerners in einem Lernpfad anzuzeigen.

*Default: `false`*

### `student_follow_page_add_lp_invisible_checkbox`

**Sichtbarkeitsinformationen für Lernpfade auf der Seite der Lerner-Nachverfolgung hinzufügen**

[inferred] Sichtbarkeitsstatus-Indikator für Lernpfade auf der Seite der Lernerfortschrittsverfolgung anzeigen.

*Default: `false`*

### `student_follow_page_add_LP_subscription_info`

**Freigabeinformationen in der Lernpfadliste**

Dies fügt eine Spalte „freigeschaltet“ in der Lernpfadliste hinzu, wenn der Lerner für den betreffenden Lernpfad eingeschrieben ist und Zugriff darauf hat.

*Default: `false`*

### `student_follow_page_hide_lp_tests_average`

**Prozentzeichen im Testdurchschnitt in Lernpfaden in der Lerner-Nachverfolgung ausblenden**

Blendet das Prozent-Symbol in der Angabe „Durchschnitt der Tests in Lernpfaden“ in der Studierendenverfolgung aus

*Default: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Nicht abonnierte Lernpfade auf der Seite der Lerner-Nachverfolgung einbeziehen**

[inferred] Lernpfade auf Fortschrittsseiten anzeigen, auch wenn Lerner nicht dafür eingeschrieben sind.

*Default: `false`*

### `ticket_lp_quiz_info_add`

**Informationen zu Lernpfaden und Tests zur Ticket-Berichterstattung hinzufügen**

[inferred] Informationen zu Lernpfaden und Tests in die Support-Ticket-Berichterstattung aufnehmen, um die Nachverfolgung von Problemen zu verbessern.

*Default: `false`*

### `validate_lp_prerequisite_from_other_session`

**Status von Lernpfadelementen aus anderen Sitzungen verwenden**

Ermöglicht Benutzern, Voraussetzungen in einem Lernpfad zu erfüllen, wenn das entsprechende Element bereits in einer anderen Sitzung abgeschlossen wurde.

*Default: `false`*