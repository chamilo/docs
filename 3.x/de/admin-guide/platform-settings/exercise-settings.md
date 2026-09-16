# Übungen (Tests) – Einstellungen

Vorgaben und Verhalten des Werkzeugs **Übungen (Tests)** – Anzeige von Fragen, Bewertung, Versuche und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Übungen (Tests)**. Diese Kategorie enthält **64 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_exercise_best_attempt_in_report`

**Anzeige des Versuchs mit der besten Punktzahl aktivieren**

Geben Sie eine Liste von Kurs- und Test-IDs an, für die in den Berichten der Versuch mit der besten Punktzahl jedes Lernenden angezeigt wird.

### `allow_coach_feedback_exercises`

**Tutoren das Kommentieren beim Überprüfen von Übungen erlauben**

Tutoren das Bearbeiten von Feedback beim Überprüfen von Übungen erlauben

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Lehrenden das Bearbeiten von Tests in Lernpfaden erlauben**

Standardmäßig verhindert Chamilo das Bearbeiten von Tests, die in einem Lernpfad enthalten sind. Damit sollen Änderungen vermieden werden, die Lernende (vergangene und zukünftige) hinsichtlich der Ergebnisse und/oder des Fortschritts im Lernpfad unterschiedlich betreffen würden. Diese Option erlaubt Lehrenden, diese Einschränkung zu umgehen.


### `allow_exercise_categories`

**Testkategorien aktivieren**

Testkategorien sind standardmäßig nicht aktiviert, da sie eine zusätzliche Komplexitätsebene einführen. Aktivieren Sie diese Funktion, damit alle Verwaltungs-Symbole zu Testkategorien angezeigt werden.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Auswahl verpflichtender Fragen aktivieren**

Ermöglicht die Auswahl verpflichtender Fragen in einem Test bei Verwendung zufälliger Kategorien.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Test-Benachrichtigungseinstellungen auf Testebene**

Ermöglicht die Konfiguration von Benachrichtigungen bei Testabgaben auf Testebene statt auf Kursebene. Falls auf Testebene nicht definiert, wird auf die Kurseinstellungen zurückgefallen.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Schnelles Hinzufügen eines Bildes zur Frage**

Aktiviert ein zusätzliches Symbol in der Fragenliste des Tests, um ein Bild als Fragenbeschreibung hinzuzufügen. Das beschleunigt die Fragenbearbeitung erheblich, wenn die Fragen im Titel stehen und die Beschreibung nur ein Bild enthält.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Fragen-Feedback bei falscher Antwort hinzufügen**

Standardmäßig erlaubt Chamilo Feedback zu jeder einzelnen Antwort einer Frage. Mit dieser Option wird ein zusätzliches Feld angelegt, um vordefiniertes Feedback zur gesamten Frage bereitzustellen. Dieses Feedback erscheint nur, wenn der Benutzer falsch geantwortet hat.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Konfiguration der Testergebnisseite aktivieren**

Definieren Sie ein Array von Einstellungen, die auf alle Testergebnisseiten angewendet werden sollen. Mögliche Einstellungen sind ‚hide_question_score‘, ‚hide_expected_answer‘, ‚hide_category_table‘, ‚hide_correct_answered_questions‘, ‚hide_total_score‘ und möglicherweise weitere in Zukunft. Suchen Sie im Code nach ‚getPageConfigurationAttribute‘, um zu sehen, was verwendet wird.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Schaltfläche ‚Zurück‘ im Test zur Navigation zwischen Fragen anzeigen**

Setzen Sie dies auf false, um die Schaltfläche ‚Zurück‘ beim Beantworten von Fragen in einem Test zu deaktivieren und Benutzer so zu zwingen, stets vorwärts zu gehen.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Audio-Feedback zu abgegebenen Antworten**

Lehrenden erlauben, Feedback an Benutzer per Audio (alternativ zu Text) zu jeder Frage in einem Test zu geben.

*Standard: `true`*

### `allow_time_per_question`

**Zeit pro Frage in Tests aktivieren**

Standardmäßig ist nur eine Zeitbegrenzung pro Test möglich. Eine Begrenzung pro Frage eröffnet zusätzliche Möglichkeiten; beide können (vorsichtig) kombiniert werden.

*Standard: `false`*

### `block_category_questions`

**Fragen vorheriger Kategorien in einem Test sperren**

Bei Verwendung dieser Option erscheint eine zusätzliche Option in der Testkonfiguration. Bei einem Test mit mehreren Fragenkategorien und einer Verteilung nach Kategorie können Benutzer die Fragen kategorieweise durchlaufen. Sobald eine Kategorie abgeschlossen ist, wechselt er/sie zur nächsten Kategorie und kann nicht zur vorherigen Kategorie zurückkehren.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Versand von Test-Benachrichtigungen an den allgemeinen Tutor blockieren**

Wenn Lernende einen Test abschließen, werden Benachrichtigungen üblicherweise an Tutoren gesendet, einschließlich des allgemeinen Sitzungstutors. Aktivieren Sie diese Option, um den allgemeinen Tutor von diesen Benachrichtigungen auszunehmen.

*Standard: `false`*

### `configure_exercise_visibility_in_course`

**Konfiguration der Unsichtbarkeit von Tests in Sitzungen auf Ebene des Basiskurses ermöglichen**

Ermöglicht die Konfiguration der Unsichtbarkeit von Tests in Sitzungen im Basiskurs, um die globale Konfiguration zu umgehen. Ist die Option nicht gesetzt, wird der globale Parameter verwendet.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**„Ergebnisse löschen“ für Lehrende deaktivieren**

Deaktiviert die Option, Testergebnisse aus der Testliste zu löschen. Dies wird häufig verwendet, wenn weniger sorgfältige Lehrende Kurse verwalten, um kritische Fehler zu vermeiden.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standard-E-Mail-Benachrichtigung bei neuem Test**

Ob Kursverwalter (Lehrende) per E-Mail benachrichtigt werden sollen, wenn ein Test von einem Lernenden beantwortet wird. Dies ist der Standardwert für alle neuen Kurse; jeder Lehrende kann diese Einstellung in seinem eigenen Kurs weiterhin ändern.

*Standard: `true`*

### `enable_quiz_scenario`

**Testszenario aktivieren**

Hierüber können Sie Tests erstellen, die je nach den Antworten der Benutzer unterschiedliche Fragen vorschlagen.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Zusätzliche Links für Lehrende in der Testliste**

Callback-Elemente konfigurieren, um neue Aktionssymbole für Lehrende rechts in der Testliste zu erzeugen, in Form eines Arrays, z. B. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Benutzername auf der Testergebnisseite anzeigen**

Den Benutzernamen (statt oder zusätzlich zu den Benutzerinformationen) auf der Testergebnisseite anzeigen.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Zusätzliche Benutzerfelder im Testkategoriebericht hinzufügen**

Ein Array mit der Liste der zusätzlichen Benutzerfelder definieren, die dem Bericht hinzugefügt werden sollen.

### `exercise_category_round_score_in_export`

**Punktzahl in Testexporten runden**

Wenn aktiviert, werden Testpunktzahlen beim Export von Testberichten auf die nächste ganze Zahl gerundet.

*Standard: `false`*

### `exercise_embeddable_extra_types`

**Einbettbare Fragetypen**

Standardmäßig werden nur Fragen mit Einfach- und Mehrfachauswahl berücksichtigt, wenn entschieden wird, ob ein Test in ein Video eingebettet werden kann. Mit dieser Option können Sie festlegen, dass weitere Fragetypen verfügbar sind. Beachten Sie, dass nicht alle Fragetypen gut in den für Videos vorgesehenen Bereich passen. Die Fragetypen sind im Code in question.class.php verfügbar.

### `exercise_hide_ip`

**Benutzer-IP aus Testberichten ausblenden**

Standardmäßig werden Benutzerinformationen und die IP-Adresse angezeigt; dies kann jedoch als personenbezogene Daten gelten. Diese Option ermöglicht es, diese Informationen aus allen Testberichten zu entfernen.

*Standard: `false`*

### `exercise_hide_label`

**Fragenband (richtig/falsch) in Testergebnissen ausblenden**

In Testergebnissen erscheint standardmäßig ein Band, das anzeigt, ob die Antwort richtig oder falsch war. Aktivieren Sie diese Option, um das Band global zu entfernen.

*Standard: `false`*

### `exercise_invisible_in_session`

**Test in Sitzung unsichtbar**

Wenn ein Test im Basiskurs sichtbar ist, erscheint er in der Sitzung unsichtbar. Wenn ein Test im Basiskurs unsichtbar ist, erscheint er in der Sitzung nicht.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Maximale Anzahl Editoren auf der Testergebnisseite**

Wegen der großen Anzahl von Fragen, die in einem Test erscheinen können, kann der Korrekturbildschirm, auf dem der Lehrende Kommentare zu jeder Antwort hinzufügen kann, sehr langsam laden. Setzen Sie diese Zahl auf 5, damit die Plattform WYSIWYG-Editoren nur bis zu einer bestimmten Anzahl von Antworten auf dem Bildschirm anzeigt. Dadurch wird die Ladezeit der Korrekturseite erheblich verkürzt, WYSIWYG-Editoren entfallen jedoch und es bleibt nur ein reiner Texteditor.

*Standard: `0`*


### `exercise_max_score`

**Maximale Punktzahl von Tests**

Eine maximale Punktzahl (in der Regel 10, 20 oder 100) für alle Tests auf der Plattform festlegen. Dies bestimmt, wie Endergebnisse Benutzern und Lehrenden angezeigt werden.

*Standard: `20`*


### `exercise_min_score`

**Minimale Punktzahl von Tests**

Eine minimale Punktzahl (in der Regel 0) für alle Tests auf der Plattform festlegen. Dies bestimmt, wie Endergebnisse Benutzern und Lehrenden angezeigt werden.

*Standard: `0`*


### `exercise_result_end_text_html_strict_filtering`

**HTML-Filterung in Test-Abschlussnachrichten umgehen**

Nachrichten am Ende von Tests als immer sicher betrachten. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript dort.

*Standard: `false`*


### `exercise_score_format`

**Format der Testpunktzahl**

Wählen Sie zwischen den folgenden Formen für die Anzeige der Punktzahl der Benutzer in verschiedenen Berichten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Verwenden Sie die numerische ID der gewünschten Form.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Neue Testversuche deaktivieren**

Neue Testversuche global deaktivieren. Wird üblicherweise verwendet, wenn es ein allgemeines Problem mit Tests gibt und Sie Zeit zur Analyse benötigen, ohne die gesamte Plattform zu sperren.

*Standard: `false`*

### `hide_free_question_score`

**Punktzahl offener Fragen ausblenden**

Blendet aus, dass offene Fragen (einschließlich Audio und Annotationen) eine Punktzahl haben, indem die Anzeige der Punktzahl in allen berichtsbezogenen Ansichten für Lernende unterdrückt wird.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Benutzerinformationen auf der Testergebnisseite ausblenden**

Die Standard-Testergebnisseite zeigt ein Benutzerdatenblatt (Foto, Name usw.), das in manchen Kontexten als Grenzüberschreitung bei der Verarbeitung personenbezogener Daten angesehen werden kann. Aktivieren Sie diese Option, um Benutzerdetails aus den Testergebnissen zu entfernen.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Berechtigungen von Lehrenden für Tests einschränken**

Wenn aktiviert, können Lehrende Tests und Fragen nicht löschen, die Sichtbarkeit von Tests nicht ändern, nicht nach QTI herunterladen, Ergebnisse nicht bereinigen usw.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale Liste ausstehender Tests**

Aktivieren, um dem Endbenutzer eine Seite mit der Liste ausstehender Tests über alle Kurse hinweg anzuzeigen.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-Filterung in Testfragen umgehen**

Geht davon aus, dass Fragentexte in Tests stets sicher sind. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript darin.

*Standard: `false`*


### `question_pagination_length`

**Fragenpaginierungslänge für Lehrende**

Anzahl der Fragen, die auf jeder Seite angezeigt werden, wenn die Fragenpaginierung für Lehrende verwendet wird.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Zusätzliche Aufzeichnung von Testantworten aktivieren**

Aktiviert die Aufzeichnung aller Antworten (auch temporärer) in der Tabelle track_e_attempt_recording. Diese Funktion ist experimentell und kann Probleme auf den Berichtsseiten verursachen, wenn ein Test bewertet werden soll.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Alle Antworten vor dem Absenden des Tests prüfen**

Zeigt vor dem Absenden des Tests ein Popup mit der Liste beantworteter/unbeantworteter Fragen an.

*Standard: `false`*


### `quiz_check_button_enable`

**Prüfung des Antwortspeichervorgangs vor dem Test hinzufügen**

Stellt sicher, dass Benutzer bereit sind, den Test zu beginnen, indem vor dem Eintritt in den Test eine Simulation des Fragenspeichervorgangs bereitgestellt wird. Dies ermöglicht die frühzeitige Erkennung einiger Verbindungsprobleme und verringert Reibungen in der Benutzererfahrung.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Kontrollkästchen zur Bestätigung der Antwortanzahl hinzufügen**

Diese Option fügt am Ende jedes Tests ein Kontrollkästchen hinzu, mit dem der Benutzer die Anzahl der gespeicherten Antworten bestätigt. Dies liefert bessere Prüfungsdaten für kritische Tests.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Verwaiste Fragen beim Kursexport verwerfen**

Beim Export eines Kurses werden Fragen, die zu keinem Test gehören, nicht exportiert.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Zertifikat am Testende erzeugen**

Erzeugt ein Zertifikat beim Beenden eines Quiz. Das Quiz muss im Notenbuch-Werkzeug verknüpft sein und einen konfigurierten Bestehensprozentsatz haben.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabelle der Testversuche auf der Teststartseite ausblenden**

Blendet die Tabelle aus, die alle vorherigen Versuche auf der Teststartseite anzeigt.

*Standard: `false`*


### `quiz_hide_question_number`

**Fragennummer ausblenden**

Blendet die fortlaufende Nummerierung der Fragen während der Testdurchführung aus.

*Standard: `false`*


### `quiz_image_zoom`

**Zoomen von Testbildern aktivieren**

Aktivieren Sie diese Funktion, damit Benutzer Bilder in den Tests zoomen können.

### `quiz_keep_alive_ping_interval`

**Sitzung in Tests aktiv halten**

Hält die Sitzung aktiv, indem in regelmäßigen Abständen alle x Sekunden ein Ping-Signal an den Server gesendet wird; der Wert wird hier festgelegt. Wir empfehlen einmal alle 300 Sekunden.

*Standard: `0`*


### `quiz_open_question_decimal_score`

**Dezimalpunktzahl bei offenen Fragetypen**

Ermöglicht Lehrenden, die Fragetypen Offen, Mündlicher Ausdruck und Annotation mit einer Dezimalpunktzahl zu bewerten.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Kopieren und Einfügen in Tests blockieren**

Blockiert Kopieren/Einfügen/Speichern/Drucken sowie Rechtsklicks in Übungen.

*Standard: `false`*

### `quiz_question_category_destinations` **v3**

**Progressive adaptive Tests über Kategorieziele aktivieren**

Aktiviert progressive adaptive Tests, bei denen jede Fragenkategorie Lernende abhängig von ihrer Punktzahl zu einer anderen Kategorie weiterleiten kann.

*Standard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Fragen beim Löschen des Tests automatisch löschen**

Das Standardverhalten besteht darin, Fragen zu verwaisten, wenn der einzige Test, der sie verwendet, gelöscht wird. Wenn aktiviert, stellt diese Option sicher, dass alle Fragen, die sonst verwaist wären, ebenfalls gelöscht werden.

*Standard: `false`*


### `quiz_results_answers_report`

**Link zum Herunterladen der Testergebnisse anzeigen**

Zeigt auf der Testergebnisseite einen Link zum Herunterladen der Ergebnisse als Datei an.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Testbeschreibung auf der Ergebnisseite immer anzeigen**

Wenn aktiviert, wird die Testbeschreibung nach Abschluss des Tests immer auf der Ergebnisseite angezeigt.

*Standard: `false`*

### `score_grade_model`

**Notenmodell für Punktzahlen**

Definieren Sie ein Array von Punktzahlbereichen und Farben, um Berichte anhand dieses Modells darzustellen. So können Farben statt numerischer Noten angezeigt werden.

### `send_score_in_exam_notification_mail_to_manager`

**Punktzahl in die E-Mail-Benachrichtigung zur Testabgabe aufnehmen**

Die Punktzahl des Lernenden in die E-Mail-Benachrichtigung aufnehmen, die nach der Abgabe eines Tests an die Lehrkraft gesendet wird.

*Standard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Testversuche aus allen Sitzungen im Bericht zu ausstehenden Tests anzeigen**

Testversuche von Nutzern in allen Sitzungen anzeigen, auf die der allgemeine Tutor im Bericht zu ausstehenden Tests Zugriff hat.

*Standard: `false`*


### `show_exercise_expected_choice`

**Erwartete Auswahl in den Testergebnissen anzeigen**

Die erwartete Auswahl und einen Status (richtig/falsch) für jede Antwort auf der Testergebnisseite anzeigen (sofern der Test so konfiguriert ist, dass Ergebnisse angezeigt werden).

*Standard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Punktzahl für Fragen zum Sicherheitsgrad anzeigen**

Standardmäßig zeigt Chamilo für Fragetypen zum Sicherheitsgrad keine Punktzahl an.

*Standard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Testversuche aus allen Sitzungen im Basiskurs anzeigen**

Testversuche von Nutzern in allen Sitzungen der Lehrkraft im Basiskurs anzeigen.

*Standard: `false`*


### `show_official_code_exercise_result_list`

**Offizielle Kennung in den Übungs- bzw. Testergebnissen anzeigen**

Ob die offizielle Kennung der Studierenden in den Berichten zu den Übungs- bzw. Testergebnissen angezeigt werden soll

*Standard: `false`*

### `show_question_id`

**Fragen-IDs in Tests anzeigen**

Die internen IDs der Fragen anzeigen, damit Nutzer Probleme bei bestimmten Fragen notieren und effizienter melden können.

*Standard: `false`*


### `show_question_pagination`

**Fragenpaginierung für Lehrkräfte anzeigen**

Bei Tests mit vielen Fragen Paginierung verwenden, wenn die Anzahl der Fragen höher ist als dieser Wert. Auf 0 setzen, um Paginierung zu verhindern.

*Standard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Gelöschte Tests unter „Mein Fortschritt“ anzeigen**

Aktivieren Sie diese Option, um auf der Seite „Mein Fortschritt“ die Ergebnisse aller von Ihnen absolvierten Tests anzuzeigen, auch derjenigen, die gelöscht wurden.

*Standard: `false`*