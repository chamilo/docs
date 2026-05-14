# Einstellungen für Übungen (Tests)

Standardwerte und Verhalten des Tools **Übungen (Tests)** — Anzeige von Fragen, Bewertung, Versuche und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Übungen (Tests)** zu. Diese Kategorie enthält **63 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_exercise_best_attempt_in_report`

**Anzeige des besten Versuchsergebnisses aktivieren**

Stellen Sie eine Liste von Kurs- und Test-IDs bereit, die den besten Versuchsergebnis für jeden Lernenden in den Berichten anzeigen.

### `allow_coach_feedback_exercises`

**Trainern erlauben, bei der Überprüfung von Übungen Kommentare zu hinterlassen**

Erlauben Sie Trainern, während der Überprüfung von Übungen Feedback zu bearbeiten.

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Lehrern erlauben, Tests in Lernpfaden zu bearbeiten**

Standardmäßig verhindert Chamilo, dass Tests, die in einem Lernpfad enthalten sind, bearbeitet werden. Dies dient dazu, Änderungen zu vermeiden, die sich unterschiedlich auf die Ergebnisse und/oder den Fortschritt der Lernenden (vergangen und zukünftig) im Lernpfad auswirken könnten. Diese Option erlaubt es Lehrern, diese Einschränkung zu umgehen.

### `allow_exercise_categories`

**Testkategorien aktivieren**

Testkategorien sind standardmäßig nicht aktiviert, da sie eine zusätzliche Komplexitätsebene hinzufügen. Aktivieren Sie diese Funktion, um alle Verwaltungssymbole für Testkategorien anzuzeigen.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Auswahl obligatorischer Fragen aktivieren**

Ermöglichen Sie die Auswahl obligatorischer Fragen in einem Test, wenn zufällige Kategorien verwendet werden.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Testbenachrichtigungseinstellungen auf Testebene**

Aktivieren Sie die Konfiguration von Benachrichtigungen über Testeinreichungen auf Testebene anstelle der Kursebene. Fällt auf die Einstellungen der Kursebene zurück, wenn sie auf Testebene nicht definiert sind.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Schnelles Hinzufügen von Bildern zur Frage**

Aktivieren Sie ein zusätzliches Symbol in der Liste der Testfragen, um ein Bild als Fragenbeschreibung hinzuzufügen. Dies beschleunigt die Bearbeitung von Fragen erheblich, wenn die Fragen im Titel stehen und die Beschreibung nur ein Bild enthält.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Fragenfeedback bei falscher Antwort hinzufügen**

Standardmäßig erlaubt Chamilo, Feedback zu jeder Antwort in einer Frage anzuzeigen. Mit dieser Option wird ein zusätzliches Feld erstellt, um vordefiniertes Feedback für die gesamte Frage bereitzustellen. Dieses Feedback wird nur angezeigt, wenn der Benutzer falsch geantwortet hat.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Konfiguration der Testergebnisseite aktivieren**

Definieren Sie ein Array von Einstellungen, die Sie auf alle Testergebnisseiten anwenden möchten. Einstellungen können ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ und möglicherweise in Zukunft weitere sein. Suchen Sie im Code nach ‘getPageConfigurationAttribute’, um zu sehen, was verwendet wird.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Schaltfläche 'Zurück' im Test zur Navigation zwischen Fragen anzeigen**

Setzen Sie dies auf false, um die Schaltfläche 'Zurück' beim Beantworten von Fragen in einem Test zu deaktivieren, wodurch Benutzer gezwungen werden, immer vorwärts zu navigieren.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Audio-Feedback zu eingereichten Antworten**

Erlauben Sie Lehrern, den Benutzern Feedback zu jeder Frage in einem Test durch Audio (alternativ zu Text) zu geben.

*Standard: `true`*

### `allow_time_per_question`

**Zeit pro Frage in Tests aktivieren**

Standardmäßig ist es nur möglich, die Zeit pro Test zu begrenzen. Eine Begrenzung pro Frage fügt eine zusätzliche Ebene an Möglichkeiten hinzu, und Sie können (vorsichtig) beides kombinieren.

*Standard: `false`*

### `block_category_questions`

**Fragen früherer Kategorien in einem Test sperren**

Bei Verwendung dieser Option erscheint eine zusätzliche Option in der Testkonfiguration. Wenn ein Test mit mehreren Fragenkategorien verwendet wird und eine Verteilung nach Kategorien gefordert ist, ermöglicht dies dem Benutzer, Fragen pro Kategorie zu navigieren. Sobald eine Kategorie abgeschlossen ist, geht er zur nächsten Kategorie über und kann nicht zur vorherigen Kategorie zurückkehren.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Versand von Testbenachrichtigungen an den allgemeinen Coach blockieren**

Lernende, die einen Test abschließen, senden normalerweise Benachrichtigungen an Trainer, einschließlich des allgemeinen Sitzungscoachs. Aktivieren Sie diese Option, um den allgemeinen Coach von diesen Benachrichtigungen auszuschließen.

*Standard: `false`*

---
### `configure_exercise_visibility_in_course`

**Aktivieren, um die Konfiguration der Übungsinvisibilität in einer Sitzung auf Basiskurs-Ebene zu umgehen**

Ermöglicht die Konfiguration der Unsichtbarkeit von Übungen in einer Sitzung auf Basiskurs-Ebene, um die globale Konfiguration zu umgehen. Wenn nicht gesetzt, wird der globale Parameter verwendet.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**Option 'Ergebnisse löschen' für Lehrer deaktivieren**

Deaktiviert die Möglichkeit, Testergebnisse aus der Testliste zu löschen. Dies wird oft verwendet, wenn weniger sorgfältige Lehrer Kurse verwalten, um kritische Fehler zu vermeiden.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standard-E-Mail-Benachrichtigungseinstellung bei neuem Quiz**

Legt fest, ob Kursmanager (Lehrer) per E-Mail benachrichtigt werden sollen, wenn ein Quiz von einem Schüler beantwortet wird. Dies ist der Standardwert für alle neuen Kurse, aber jeder Lehrer kann diese Einstellung in seinem eigenen Kurs ändern.

*Standard: `true`*

### `enable_quiz_scenario`

**Quiz-Szenario aktivieren**

Von hier aus können Sie Übungen erstellen, die je nach den Antworten des Benutzers unterschiedliche Fragen vorschlagen.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Zusätzliche Links für Lehrer in der Testliste**

Konfigurieren Sie Callback-Elemente, um neue Aktionssymbole für Lehrer auf der rechten Seite der Testliste zu generieren, in Form eines Arrays, z. B. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Benutzernamen auf der Testergebnisseite anzeigen**

Zeigt den Benutzernamen (anstelle von oder zusätzlich zu den Benutzerinformationen) auf der Testergebnisseite an.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Zusätzliche Benutzerfelder im Übungskategorie-Bericht hinzufügen**

Definieren Sie ein Array mit der Liste der zusätzlichen Benutzerfelder, die dem Bericht hinzugefügt werden sollen.

### `exercise_category_round_score_in_export`

**Punktzahl in Testexporten runden**

Wenn aktiviert, werden Testergebnisse beim Exportieren von Übungsberichten auf die nächste ganze Zahl gerundet.

*Standard: `false`*

### `exercise_embeddable_extra_types`

**Einbettbare Fragetypen**

Standardmäßig werden nur Einzelantwort- und Mehrfachantwortfragen berücksichtigt, wenn entschieden wird, ob ein Test in ein Video eingebettet werden kann. Mit dieser Option können Sie festlegen, dass weitere Fragetypen verfügbar sind. Beachten Sie, dass nicht alle Fragetypen gut in den für Videos vorgesehenen Raum passen. Die Fragetypen sind im Code in question.class.php verfügbar.

### `exercise_hide_ip`

**Benutzer-IP in Testberichten ausblenden**

Standardmäßig zeigen wir Benutzerinformationen und deren IP-Adresse an, aber dies könnte als personenbezogene Daten gelten. Mit dieser Option können Sie diese Informationen aus allen Testberichten entfernen.

*Standard: `false`*

### `exercise_hide_label`

**Frageband (richtig/falsch) in Testergebnissen ausblenden**

In den Testergebnissen erscheint standardmäßig ein Band, das anzeigt, ob die Antwort richtig oder falsch war. Aktivieren Sie diese Option, um das Band global zu entfernen.

*Standard: `false`*

### `exercise_invisible_in_session`

**Übung in Sitzung unsichtbar**

Wenn eine Übung im Basiskurs sichtbar ist, erscheint sie in der Sitzung unsichtbar. Wenn eine Übung im Basiskurs unsichtbar ist, erscheint sie in der Sitzung nicht.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Maximale Editoren auf der Übungsergebnisseite**

Aufgrund der großen Anzahl von Fragen, die in einer Übung erscheinen können, kann der Korrekturbildschirm, der es dem Lehrer ermöglicht, Kommentare zu jeder Antwort hinzuzufügen, sehr langsam laden. Setzen Sie diese Zahl auf 5, um die Plattform anzuweisen, nur bis zu einer bestimmten Anzahl von Antworten WYSIWYG-Editoren auf dem Bildschirm anzuzeigen. Dies beschleunigt die Ladezeit der Korrekturseite erheblich, entfernt jedoch WYSIWYG-Editoren und lässt nur einen einfachen Texteditor übrig.

*Standard: `0`*

### `exercise_max_score`

**Maximale Punktzahl von Übungen**

Legen Sie eine maximale Punktzahl (üblicherweise 10, 20 oder 100) für alle Übungen auf der Plattform fest. Dies bestimmt, wie die Endergebnisse für Benutzer und Lehrer angezeigt werden.

*Standard: `20`*

### `exercise_min_score`

**Minimale Punktzahl von Übungen**

Legen Sie eine minimale Punktzahl (üblicherweise 0) für alle Übungen auf der Plattform fest. Dies bestimmt, wie die Endergebnisse für Benutzer und Lehrer angezeigt werden.

*Standard: `0`*

### `exercise_result_end_text_html_strict_filtering`

**HTML-Filterung in Test-Endnachrichten umgehen**

Betrachten Sie Nachrichten am Ende von Tests als immer sicher. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript dort.

*Standard: `false`*

### `exercise_score_format`

**Format der Testergebnisse**

Wählen Sie zwischen den folgenden Formen für die Anzeige der Punktzahl der Benutzer in verschiedenen Berichten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Verwenden Sie die numerische ID der gewünschten Form.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Neue Testversuche deaktivieren**

Deaktiviert neue Testversuche global. Wird normalerweise verwendet, wenn es ein Problem mit Tests im Allgemeinen gibt und Sie etwas Zeit zur Analyse benötigen, ohne die gesamte Plattform zu blockieren.

*Standard: `false`*

---
### `hide_free_question_score`

**Punktzahl offener Fragen verbergen**

Verbergen Sie die Tatsache, dass offene Fragen (einschließlich Audio und Anmerkungen) eine Punktzahl haben, indem Sie die Anzeige der Punktzahl in allen Berichten für Lernende ausblenden.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Benutzerinformationen auf der Testergebnisseite verbergen**

Die standardmäßige Testergebnisseite zeigt ein Benutzerdatenblatt (Foto, Name usw.), was in einigen Kontexten als Grenzüberschreitung beim Umgang mit personenbezogenen Daten angesehen werden könnte. Aktivieren Sie diese Option, um Benutzerdetails aus den Testergebnissen zu entfernen.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Berechtigungen von Lehrkräften für Tests einschränken**

Wenn aktiviert, können Lehrkräfte keine Tests oder Fragen löschen, die Sichtbarkeit von Tests ändern, Tests nach QTI herunterladen, Ergebnisse bereinigen usw.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale Liste ausstehender Tests**

Aktivieren Sie diese Option, um dem Endbenutzer eine Seite mit der Liste der ausstehenden Tests über alle Kurse hinweg anzuzeigen.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-Filterung bei Testfragen umgehen**

Gehen Sie davon aus, dass der Text von Fragen in Tests immer sicher ist. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript in diesen Fragen.

*Standard: `false`*


### `question_pagination_length`

**Länge der Fragen-Pagination für Lehrkräfte**

Anzahl der Fragen, die auf jeder Seite angezeigt werden, wenn die Option zur Fragen-Pagination für Lehrkräfte verwendet wird.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Zusätzliche Aufzeichnung von Testantworten aktivieren**

Aktivieren Sie die Aufzeichnung aller Antworten (auch temporärer) in der Tabelle `track_e_attempt_recording`. Diese Funktion ist experimentell und kann Probleme auf den Berichtsseiten verursachen, wenn versucht wird, einen Test zu bewerten.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Alle Antworten vor Testabgabe überprüfen**

Zeigen Sie ein Popup mit der Liste der beantworteten/unbeantworteten Fragen an, bevor der Test abgegeben wird.

*Standard: `false`*


### `quiz_check_button_enable`

**Überprüfung des Antwortspeicherprozesses vor Teststart hinzufügen**

Stellen Sie sicher, dass die Benutzer bereit sind, den Test zu beginnen, indem Sie eine Simulation des Fragen-Speicherprozesses vor dem Betreten des Tests bereitstellen. Dies ermöglicht die frühzeitige Erkennung einiger Verbindungsprobleme und reduziert Reibungen in der Benutzererfahrung.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Kontrollkästchen zur Bestätigung der Anzahl der Antworten hinzufügen**

Diese Option fügt am Ende jedes Tests ein Kontrollkästchen hinzu, das den Benutzer auffordert, die Anzahl der gespeicherten Antworten zu bestätigen. Dies liefert bessere Prüfdaten für kritische Tests.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Verwaiste Fragen beim Kursexport verwerfen**

Beim Exportieren eines Kurses werden Fragen, die nicht Teil eines Tests sind, nicht exportiert.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Zertifikat am Testende generieren**

Generieren Sie ein Zertifikat, wenn ein Quiz beendet wird. Das Quiz muss im Notenbuch-Tool verknüpft sein und eine Bestehensquote konfiguriert haben.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabelle der Testversuche auf der Startseite verbergen**

Verbergen Sie die Tabelle, die alle vorherigen Versuche auf der Test-Startseite anzeigt.

*Standard: `false`*


### `quiz_hide_question_number`

**Fragenummer verbergen**

Verbergen Sie die fortlaufende Nummerierung der Fragen während eines Tests.

*Standard: `false`*


### `quiz_image_zoom`

**Zoomfunktion für Testbilder aktivieren**

Aktivieren Sie diese Funktion, um Benutzern das Zoomen auf Bilder in Tests zu ermöglichen.

### `quiz_keep_alive_ping_interval`

**Sitzung während Tests aktiv halten**

Halten Sie die Sitzung aktiv, indem Sie in regelmäßigen Abständen ein Ping-Signal an den Server senden, hier definiert. Wir empfehlen alle 300 Sekunden.

*Standard: `0`*


### `quiz_open_question_decimal_score`

**Dezimalpunktzahl bei offenen Fragetypen**

Erlauben Sie Lehrkräften, offene Fragen, mündliche Ausdrucksfragen und Anmerkungsfragen mit einer Dezimalpunktzahl zu bewerten.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Kopieren und Einfügen in Tests blockieren**

Blockieren Sie die Tasten für Kopieren/Einfügen/Speichern/Drucken sowie Rechtsklicks in Übungen.

*Standard: `false`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Fragen automatisch löschen, wenn Test gelöscht wird**

Das Standardverhalten besteht darin, Fragen zu verwaisen, wenn der einzige Test, der sie verwendet, gelöscht wird. Wenn diese Option aktiviert ist, werden alle Fragen, die sonst verwaist wären, ebenfalls gelöscht.

*Standard: `false`*


### `quiz_results_answers_report`

**Link zum Herunterladen der Testergebnisse anzeigen**

Zeigen Sie auf der Testergebnisseite einen Link an, um die Ergebnisse als Datei herunterzuladen.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Testbeschreibung immer auf der Ergebnisseite anzeigen**

Wenn aktiviert, wird die Testbeschreibung nach Abschluss des Tests immer auf der Ergebnisseite angezeigt.

*Standard: `false`*


### `score_grade_model`

**Bewertungsmodell für Punktzahlen**

Definieren Sie ein Array von Punktzahlbereichen und Farben, um Berichte mit diesem Modell anzuzeigen. Dies ermöglicht es Ihnen, Farben anstelle von numerischen Noten anzuzeigen.

---
### `send_score_in_exam_notification_mail_to_manager`

**Punktzahl in der E-Mail-Benachrichtigung über die Testabgabe hinzufügen**

Fügt die Punktzahl des Lernenden der E-Mail-Benachrichtigung hinzu, die an den Lehrer gesendet wird, nachdem ein Test abgegeben wurde.

*Standard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Testversuche aus allen Sitzungen im Bericht über ausstehende Tests anzeigen**

Zeigt Testversuche von Nutzern in allen Sitzungen, zu denen der allgemeine Coach Zugriff hat, im Bericht über ausstehende Tests an.

*Standard: `false`*


### `show_exercise_expected_choice`

**Erwartete Auswahl in den Testergebnissen anzeigen**

Zeigt die erwartete Auswahl und einen Status (richtig/falsch) für jede Antwort auf der Ergebnisseite des Tests an (sofern der Test so konfiguriert ist, dass Ergebnisse angezeigt werden).

*Standard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Punktzahl für Fragen zum Gewissheitsgrad anzeigen**

Standardmäßig zeigt Chamilo keine Punktzahl für Fragetypen zum Gewissheitsgrad an.

*Standard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Testversuche aus allen Sitzungen im Basiskurs anzeigen**

Zeigt Testversuche von Nutzern in allen Sitzungen dem Lehrer im Basiskurs an.

*Standard: `false`*


### `show_official_code_exercise_result_list`

**Offiziellen Code in den Ergebnissen der Übungen anzeigen**

Legt fest, ob der offizielle Code der Studierenden in den Berichten über die Ergebnisse der Übungen angezeigt werden soll.

*Standard: `false`*


### `show_question_id`

**Fragen-IDs in Tests anzeigen**

Zeigt die internen IDs der Fragen an, damit Nutzer Probleme bei bestimmten Fragen notieren und effizienter melden können.

*Standard: `false`*


### `show_question_pagination`

**Fragen-Pagination für Lehrer anzeigen**

Bei Tests mit vielen Fragen wird eine Pagination verwendet, wenn die Anzahl der Fragen höher ist als dieser Wert. Setzen Sie den Wert auf 0, um die Pagination zu deaktivieren.

*Standard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Gelöschte Tests in 'Mein Fortschritt' anzeigen**

Aktivieren Sie diese Option, um auf der Seite 'Mein Fortschritt' die Ergebnisse aller von Ihnen absolvierten Tests anzuzeigen, auch der gelöschten.

*Standard: `false`*