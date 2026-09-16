# Einstellungen für Lernpfade

Standardwerte und Verhalten des Tools **Lernpfade** — Autostart, Standardansicht, Voraussetzungen, SCORM-Verhalten und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Lernpfade** zu. Diese Kategorie enthält **51 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_all_files_in_lp_export`

**Alle Dateien beim Export eines Lernpfads exportieren**

Beim Exportieren eines Lernpfads werden auch alle Dateien und Ordner im gleichen Pfad eines HTML-Dokuments exportiert.

*Standard: `false`*

### `allow_htaccess_import_from_scorm`

**Erlauben von .htaccess aus SCORM-Paketen**

Normalerweise werden alle .htaccess-Dateien beim Importieren von Inhalten in Chamilo gefiltert und entfernt. Diese Funktion erlaubt den Import von .htaccess, wenn sie in einem SCORM-Paket vorhanden ist.

*Standard: `false`*

### `allow_import_scorm_package_in_course_builder`

**SCORM-Import bei Kursimport**

Aktivieren Sie diese Option, um die Verzeichnisstruktur von SCORM-Paketen beim Wiederherstellen eines Kurses (über das Kurswartungstool) zu kopieren.

*Standard: `false`*

### `allow_lp_chamilo_export`

**Lernpfade im Chamilo-Backup-Format exportieren**

Ermöglichen Sie den Export Ihrer Lernpfade im Chamilo-Kurs-Backup-Format.

*Standard: `false`*

### `allow_lp_return_link`

**Rückkehrlink für Lernpfade anzeigen**

Deaktivieren Sie diese Option, um die Schaltfläche 'Zurück zur Startseite' in den Lernpfaden auszublenden.

*Standard: `true`*

### `allow_lp_subscription_to_usergroups`

**Abonnement von Lernpfaden für Klassen**

Aktivieren Sie das Abonnement von Lernpfaden und Lernpfadkategorien für Gruppen/Klassen.

*Standard: `false`*

### `allow_session_lp_category`

**Lernpfadkategorien können in Sitzungen verwaltet werden**

[abgeleitet] Ermöglichen Sie Lernenden und Lehrenden, Lernpfade innerhalb von Sitzungskursen nach Kategorien zu organisieren und zu verwalten.

*Standard: `false`*

### `allow_teachers_to_access_blocked_lp_by_prerequisite`

**Lehrende können auf gesperrte Lernpfade zugreifen**

Lehrende müssen keine vollständigen Lernpfade absolvieren, um Zugriff auf einen durch Voraussetzungen gesperrten Lernpfad zu erhalten.

*Standard: `false`*

### `disable_js_in_lp_view`

**JS in der Lernpfadansicht deaktivieren**

Deaktivieren Sie JS-Dateien, die Chamilo normalerweise zu HTML-Dateien im Lernpfad hinzufügt (während der Anzeige).

*Standard: `false`*

### `disable_my_lps_page`

**Seite 'Meine Lernpfade' ausblenden**

Die Seite 'Meine Lernpfade' wurde in Version 1.11 hinzugefügt. Verwenden Sie diese Option, um sie auszublenden.

*Standard: `false`*

### `download_files_after_all_lp_finished`

**Download-Schaltfläche nach Abschluss aller Lernpfade**

Zeigen Sie die Schaltfläche zum Herunterladen von Dateien an, nachdem alle Lernpfade abgeschlossen sind. Beispiel: Wenn ABC der Kurscode ist und 1 und 100 die Dokument-IDs sind, wählen Sie: ['courses' => ['ABC' => [1, 100]]].

### `force_edit_exercise_in_lp`

**Bearbeitung von Tests in Lernpfaden**

Ermöglichen Sie die Bearbeitung von Tests, auch wenn sie in einen Lernpfad eingebunden sind. Standardmäßig wird die Bearbeitung verhindert, wenn der Test in einem Lernpfad enthalten ist, da dies die Konsistenz der Nachverfolgung bei vielen Lernenden beeinträchtigen kann, wenn die Änderungen am Test erheblich sind.

*Standard: `false`*

### `hide_accessibility_label_on_lp_item`

**Voraussetzungslabel in Lernpfaden ausblenden**

Blenden Sie den Tooltip für Voraussetzungen bei Lernpfadelementen aus. Dies ist hauptsächlich eine ästhetische Entscheidung.

*Standard: `true`*

### `hide_lp_time`

**Zeitangaben in Lernpfadberichten ausblenden**

Blenden Sie die in Lernpfaden verbrachte Zeit in Berichten generell aus.

*Standard: `false`*

### `hide_scorm_copy_link`

**SCORM-Kopieren ausblenden**

Blenden Sie das Symbol zum Kopieren eines Lernpfads aus der Lernpfadliste aus.

*Standard: `false`*

### `hide_scorm_export_link`

**SCORM-Export ausblenden**

Blenden Sie das Symbol für den SCORM-Export aus der Lernpfadliste aus.

*Standard: `false`*

### `hide_scorm_pdf_link`

**PDF-Export von Lernpfaden ausblenden**

Blenden Sie das Symbol für den PDF-Export von Lernpfaden aus der Lernpfadliste aus.

*Standard: `true`*

### `lp_allow_export_to_students`

**Lernende können Lernpfade exportieren**

Aktivieren Sie diese Option, um Lernenden das Herunterladen von Lernpfaden als SCORM-Pakete zu ermöglichen.

*Standard: `false`*

### `lp_enable_flow`

**Navigation zwischen Lernpfaden**

Fügen Sie die Möglichkeit hinzu, einen 'nächsten' Lernpfad auszuwählen und Schaltflächen innerhalb des Lernpfads anzuzeigen, um von einem zum nächsten zu wechseln.

*Standard: `false`*

### `lp_fixed_encoding`

**Feste Kodierung im Lernpfad**

Reduzieren Sie die Ressourcennutzung, indem Sie eine Überprüfung der Textkodierung in importierten Lernpfaden ignorieren.

*Standard: `false`*

### `lp_item_prerequisite_dates`

**Datumsbasierte Voraussetzungen für Lernpfadelemente**

Fügt die Option hinzu, Voraussetzungen mit Start- und Enddaten für Lernpfadelemente zu definieren.

*Standard: `false`*

---
### `lp_menu_location`

**Position des Lernpfad-Menüs**

Setzen Sie dies auf 'left' oder 'right', um die Seite des Lernpfad-Menüs zu ändern.

*Standard: `left`*

### `lp_minimum_time`

**Mindestzeit zum Abschließen eines Lernpfads**

Fügen Sie ein Feld für die Mindestzeit zu Lernpfaden hinzu. Wenn der Benutzer nicht mindestens diese Zeit im Lernpfad verbracht hat, kann der letzte Punkt des Lernpfads nicht abgeschlossen werden.

*Standard: `false`*

### `lp_prerequisit_on_quiz_unblock_if_max_attempt_reached`

**Lernpfad-Element freischalten, wenn maximale Versuche für Testvoraussetzung erreicht sind**

[abgeleitet] Automatisches Freischalten nachfolgender Lernpfad-Elemente, wenn ein Lernender die maximalen Testversuche für eine Voraussetzung erschöpft hat.

### `lp_prerequisite_on_quiz_unblock_if_max_attempt_reached`

**Voraussetzungen nach letztem Testversuch freischalten**

Ermöglicht es Benutzern, in einem Lernpfad fortzufahren, nachdem alle Testversuche für einen als Voraussetzung dienenden Test aufgebraucht sind.

*Standard: `false`*

### `lp_prerequisite_use_last_attempt_only`

**Nur letzten Versuch bei Lernpfad-Testvoraussetzungen verwenden**

Wenn ein Test als Voraussetzung für ein Element im Lernpfad verwendet wird, wird nur der letzte Versuch des Tests zur Validierung der Voraussetzung herangezogen (Standard ist der beste Versuch).

*Standard: `false`*

### `lp_prevents_beforeunload`

**Beforeunload-JS-Ereignis im Lernpfad verhindern**

Dies hilft bei der Browserkompatibilität, indem problematische JS-Ereignisse verhindert werden.

*Standard: `false`*

### `lp_score_as_progress_enable`

**Lernpfad-Punktzahl als Fortschritt verwenden**

Dies ist nützlich, wenn SCORM-Inhalte mit nur einem großen SCO verwendet werden. SCORM kommuniziert keinen Fortschritt, daher ist dies ein Trick, um die Punktzahl als Fortschritt zu nutzen. Durch Aktivieren dieser Option können Sie dies pro Lernpfad konfigurieren.

*Standard: `false`*

### `lp_show_max_progress_instead_of_average`

**Maximalen Fortschritt statt Durchschnitt für Lernpfad-Berichte anzeigen**

[abgeleitet] Berechnet den Lernpfad-Fortschritt basierend auf dem maximalen Abschluss der Elemente anstatt des Durchschnitts aller Elemente.

*Standard: `false`*

### `lp_show_max_progress_or_average_enable_course_level_redefinition`

**Maximalen Fortschritt oder Durchschnitt für Lernpfade auf Kursebene auswählen**

Ermöglicht die Neudefinition der Einstellung, um den besten Fortschritt anstelle von Durchschnittswerten in Berichten zu Lernpfaden auf Kursebene anzuzeigen.

*Standard: `false`*

### `lp_show_reduced_report`

**Lernpfade: Reduzierten Bericht anzeigen**

Innerhalb des Lernpfad-Tools wird Benutzern, die ihren eigenen Fortschritt überprüfen (über das Statistik-Symbol), eine verkürzte (weniger detaillierte) Version des Fortschrittsberichts angezeigt.

*Standard: `false`*

### `lp_start_and_end_date_visible_in_student_view`

**Verfügbarkeit von Lernpfaden für Lernende anzeigen**

Zeigt Lernpfaden den Lernenden mit ihren Verfügbarkeitsdaten an, anstatt sie bis zum Datum zu verbergen.

*Standard: `false`*

### `lp_subscription_settings`

**Einstellungen für Lernpfad-Abonnements**

Konfigurieren Sie zusätzliche Optionen für die Lernpfad-Abonnementfunktion. Optionen umfassen 'allow_add_users_to_lp' und 'allow_add_users_to_lp_category'.

### `lp_view_accordion`

**Einklappbare Lernpfad-Elemente**

[abgeleitet] Zeigt Lernpfad-Elemente im einklappbaren Akkordeon-Format für eine verbesserte Navigation und Inhaltsorganisation an.

*Standard: `false`*

### `lp_view_settings`

**Anzeigeeinstellungen für Lernpfade**

Konfigurieren Sie zusätzliche Optionen für die Anzeige von Lernpfaden. Optionen umfassen 'show_reporting_icon', 'hide_lp_arrow_navigation', 'show_toolbar_by_default', 'navigation_in_the_middle' und 'add_extra_quit_to_home_icon'.

### `scorm_api_extrafield_to_use_as_student_id`

**Zusätzliches Feld als student_id in der SCORM-Kommunikation verwenden**

Geben Sie den Namen des zusätzlichen Feldes an, das als student_id für die gesamte SCORM-Kommunikation verwendet werden soll.

### `scorm_api_username_as_student_id`

**Benutzernamen als student_id in der SCORM-Kommunikation verwenden**

[abgeleitet] Verwendet den Benutzernamen des Lernenden als Studentenidentifikator in der SCORM-API-Kommunikation anstelle der Lernenden-ID.

*Standard: `false`*

### `scorm_lms_update_sco_status_all_time`

**SCO-Status autonom aktualisieren**

Wenn der SCO keinen Status sendet, übernehmen Sie die Kontrolle und aktualisieren Sie den Status basierend auf den in Chamilo beobachtbaren Daten.

*Standard: `false`*

### `scorm_upload_from_cache`

**SCORM aus Cache-Verzeichnis hochladen**

Ermöglicht Administratoren, ein SCORM-Paket (in Zip-Form) in das Cache-Verzeichnis hochzuladen und es als Importquelle auf der SCORM-Upload-Seite zu verwenden.

*Standard: `false`*

### `show_hidden_exercise_added_to_lp`

**Tests aus Lernpfaden anzeigen, auch wenn unsichtbar**

Zeigt versteckte Übungen, die zu einem Lernpfad hinzugefügt wurden, in der Übungsliste an. Wenn wir uns in einer Sitzung befinden, der Test im Basiskurs unsichtbar ist, in einem Lernpfad enthalten ist und die Einstellung zum Anzeigen nicht ausdrücklich auf true gesetzt ist, wird er ausgeblendet.

*Standard: `true`*

### `show_invisible_exercise_in_lp_list`

**Tests in der Liste der Lernpfad-Tests anzeigen, auch wenn unsichtbar**

[abgeleitet] Schließt versteckte Tests in die Liste der verfügbaren Tests ein, wenn der Inhalt des Lernpfads angezeigt wird.

*Standard: `false`*

---
### `show_invisible_exercise_in_lp_toc`

**Unsichtbare Tests in Lernpfaden sichtbar machen**

Tests, die im Test-Tool als 'unsichtbar' markiert sind, werden angezeigt, wenn sie in einen Lernpfad eingebunden sind.

*Standard: `false`*

### `show_invisible_lp_in_course_home`

**Link zum Lernpfad auf der Kursstartseite anzeigen, wenn unsichtbar**

Wenn ein Lernpfad als unsichtbar eingestellt ist, aber der Lehrer/Coach entschieden hat, ihn auf der Kursstartseite verfügbar zu machen, verhindert diese Option, dass Chamilo den Link auf der Kursstartseite ausblendet.

*Standard: `false`*

### `show_prerequisite_as_blocked`

**Voraussetzungen für Lernpfade**

Zeigt in den Lernpfadlisten ein visuelles Element an, das darauf hinweist, dass andere Lernpfade aufgrund von Voraussetzungsregeln derzeit gesperrt sind.

*Standard: `false`*

### `student_follow_page_add_LP_acquisition_info`

**Erwerbsspalte zur Lernenden-Nachverfolgung hinzufügen**

Fügt der Lernenden-Nachverfolgungsseite eine Spalte hinzu, die den Erwerbsstatus eines Lernenden in einem Lernpfad anzeigt.

*Standard: `false`*

### `student_follow_page_add_LP_invisible_checkbox`

**Sichtbarkeitsinformationen für Lernpfade auf der Lernenden-Nachverfolgungsseite hinzufügen**

Zeigt einen Sichtbarkeitsstatus-Indikator für Lernpfade auf der Fortschrittsverfolgungsseite der Lernenden an.

*Standard: `false`*

### `student_follow_page_add_LP_subscription_info`

**Informationen zu freigeschalteten Lernpfaden in der Lernpfadliste**

Fügt eine Spalte 'Freigeschaltet' in der Lernpfadliste hinzu, wenn der Lernende für den jeweiligen Lernpfad angemeldet ist und Zugriff darauf hat.

*Standard: `false`*

### `student_follow_page_hide_lp_tests_average`

**Prozentsymbol im Durchschnitt der Tests in Lernpfaden auf der Lernenden-Nachverfolgung ausblenden**

Blendet das Prozentsymbol in der Anzeige 'Durchschnitt der Tests in Lernpfaden' auf der Lernenden-Nachverfolgungsseite aus.

*Standard: `false`*

### `student_follow_page_include_not_subscribed_lp_students`

**Nicht angemeldete Lernpfade auf der Lernenden-Nachverfolgungsseite einbeziehen**

Zeigt Lernpfade auf den Fortschrittsseiten an, auch wenn die Lernenden nicht dafür angemeldet sind.

*Standard: `false`*

### `ticket_lp_quiz_info_add`

**Lernpfad- und Testinformationen zur Ticket-Berichterstattung hinzufügen**

Bezieht Lernpfad- und Testinformationen in die Berichterstattung von Support-Tickets ein, um die Nachverfolgung von Problemen zu verbessern.

*Standard: `false`*

### `validate_lp_prerequisite_from_other_session`

**Status von Lernpfadelementen aus anderen Sitzungen verwenden**

Ermöglicht es Benutzern, Voraussetzungen in einem Lernpfad zu erfüllen, wenn das entsprechende Element bereits in einer anderen Sitzung abgeschlossen wurde.

*Standard: `false`*