# Einstellungen für Übungen (Tests)

Standardwerte und Verhalten des Werkzeugs **Übungen (Tests)** — Anzeige von Fragen, Bewertung, Versuche und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Übungen (Tests)**. Diese Kategorie enthält **66 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_exercise_best_attempt_in_report`

**Anzeige des Versuchs mit der besten Punktzahl aktivieren**

Geben Sie eine Liste von Kurs- und Test-IDs an, für die in den Berichten der Versuch mit der besten Punktzahl für jede lernende Person angezeigt wird.

### `allow_coach_feedback_exercises`

**Tutorinnen und Tutoren erlauben, beim Überprüfen von Übungen Kommentare abzugeben**

Tutorinnen und Tutoren erlauben, beim Überprüfen von Übungen Feedback zu bearbeiten

*Standard: `true`*

### `allow_edit_exercise_in_lp`

**Lehrkräften erlauben, Tests in Lernpfaden zu bearbeiten**

Standardmäßig verhindert Chamilo, dass Sie Tests bearbeiten, die in einem Lernpfad enthalten sind. Dadurch sollen Änderungen vermieden werden, die sich auf Lernende (vergangene und zukünftige) hinsichtlich der Ergebnisse und/oder des Fortschritts im Lernpfad unterschiedlich auswirken würden. Diese Option ermöglicht es Lehrkräften, diese Einschränkung zu umgehen.


### `allow_exercise_categories`

**Testkategorien aktivieren**

Testkategorien sind standardmäßig nicht aktiviert, da sie eine zusätzliche Komplexitätsebene hinzufügen. Aktivieren Sie diese Funktion, damit alle Verwaltungssymbole im Zusammenhang mit Testkategorien angezeigt werden.

*Standard: `false`*

### `allow_mandatory_question_in_category`

**Auswahl obligatorischer Fragen aktivieren**

Aktivieren Sie die Auswahl obligatorischer Fragen in einem Test, wenn zufällige Kategorien verwendet werden.

*Standard: `false`*

### `allow_notification_setting_per_exercise`

**Benachrichtigungseinstellungen für Tests auf Testebene**

Aktivieren Sie die Konfiguration von Benachrichtigungen über Testabgaben auf Testebene statt auf Kursebene. Falls auf Testebene nichts definiert ist, wird auf die Einstellungen auf Kursebene zurückgegriffen.

*Standard: `false`*

### `allow_quick_question_description_popup`

**Schnelles Hinzufügen eines Bildes zu einer Frage**

Aktivieren Sie ein zusätzliches Symbol in der Liste der Testfragen, um ein Bild als Fragenbeschreibung hinzuzufügen. Dies beschleunigt die Bearbeitung von Fragen erheblich, wenn die Fragen im Titel stehen und die Beschreibung nur ein Bild enthält.

*Standard: `false`*

### `allow_quiz_question_feedback`

**Fragenfeedback hinzufügen, wenn die Antwort falsch ist**

Standardmäßig ermöglicht Chamilo, Feedback zu jeder Antwort einer Frage anzuzeigen. Mit dieser Option wird ein zusätzliches Feld erstellt, um vordefiniertes Feedback zur gesamten Frage bereitzustellen. Dieses Feedback erscheint nur, wenn die nutzende Person falsch geantwortet hat.

*Standard: `false`*

### `allow_quiz_results_page_config`

**Konfiguration der Testergebnisseite aktivieren**

Definieren Sie ein Array von Einstellungen, die Sie auf alle Testergebnisseiten anwenden möchten. Mögliche Einstellungen sind ‘hide_question_score’, ‘hide_expected_answer’, ‘hide_category_table’, ‘hide_correct_answered_questions’, ‘hide_total_score’ und möglicherweise weitere in der Zukunft. Suchen Sie im Code nach ‘getPageConfigurationAttribute’, um zu sehen, was verwendet wird.

*Standard: `false`*

### `allow_quiz_show_previous_button_setting`

**Schaltfläche „Zurück“ im Test zur Navigation zwischen Fragen anzeigen**

Setzen Sie dies auf false, um die Schaltfläche „Zurück“ beim Beantworten von Fragen in einem Test zu deaktivieren und die nutzenden Personen so zu zwingen, stets vorwärtszugehen.

*Standard: `false`*

### `allow_teacher_comment_audio`

**Audio-Feedback zu eingereichten Antworten**

Lehrkräften erlauben, den nutzenden Personen zu jeder Frage eines Tests Feedback per Audio (alternativ zu Text) zu geben.

*Standard: `true`*

### `allow_time_per_question`

**Zeit pro Frage in Tests aktivieren**

Standardmäßig ist es nur möglich, die Zeit pro Test zu begrenzen. Eine Begrenzung pro Frage fügt eine zusätzliche Ebene von Möglichkeiten hinzu, und Sie können beides (mit Bedacht) kombinieren.

*Standard: `false`*

### `block_category_questions`

**Fragen vorheriger Kategorien in einem Test sperren**

Wenn Sie diese Option verwenden, erscheint eine zusätzliche Option in der Konfiguration des Tests. Bei einem Test mit mehreren Fragenkategorien und einer Verteilung nach Kategorie ermöglicht dies der nutzenden Person, Fragen kategorieweise zu durchlaufen. Sobald eine Kategorie abgeschlossen ist, wechselt sie zur nächsten Kategorie und kann nicht zur vorherigen Kategorie zurückkehren.

*Standard: `false`*

### `block_quiz_mail_notification_general_coach`

**Versand von Testbenachrichtigungen an die allgemeine Tutorin bzw. den allgemeinen Tutor blockieren**

Wenn Lernende einen Test abschließen, werden Benachrichtigungen in der Regel an Tutorinnen und Tutoren gesendet, einschließlich der allgemeinen Sitzungstutorin bzw. des allgemeinen Sitzungstutors. Aktivieren Sie diese Option, um die allgemeine Tutorin bzw. den allgemeinen Tutor von diesen Benachrichtigungen auszuschließen.

*Standard: `false`*

### `configure_exercise_visibility_in_course`

**Aktivieren, um die Konfiguration „Übung in der Sitzung unsichtbar“ auf Ebene des Basiskurses zu umgehen**

Aktiviert die Konfiguration der Unsichtbarkeit von Übungen in der Sitzung im Basiskurs, um die globale Konfiguration zu umgehen. Wenn nicht gesetzt, wird der globale Parameter verwendet.

*Standard: `false`*

### `disable_clean_exercise_results_for_teachers`

**„Ergebnisse bereinigen“ für Lehrkräfte deaktivieren**

Deaktiviert die Option, Testergebnisse aus der Testliste zu löschen. Dies wird häufig verwendet, wenn weniger sorgfältige Lehrkräfte Kurse verwalten, um schwerwiegende Fehler zu vermeiden.

*Standard: `true`*

### `email_alert_manager_on_new_quiz`

**Standard-E-Mail-Benachrichtigung bei neuem Quiz**

Legt fest, ob Kursverantwortliche (Lehrkräfte) per E-Mail benachrichtigt werden sollen, wenn ein Quiz von einem Lernenden beantwortet wird. Dies ist der Standardwert für alle neuen Kurse; jede Lehrkraft kann diese Einstellung jedoch weiterhin im eigenen Kurs ändern.

*Standard: `true`*

### `enable_quiz_scenario`

**Quiz-Szenario aktivieren**

Hiermit können Sie Übungen erstellen, die je nach den Antworten der Benutzer unterschiedliche Fragen vorschlagen.

*Standard: `true`*

### `exercise_additional_teacher_modify_actions`

**Zusätzliche Links für Lehrkräfte in der Testliste**

Konfigurieren Sie Callback-Elemente, um neue Aktionssymbole für Lehrkräfte auf der rechten Seite der Testliste zu erzeugen, in Form eines Arrays, z. B. ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']]

### `exercise_attempts_report_show_username`

**Benutzernamen auf der Testergebnisseite anzeigen**

Zeigt den Benutzernamen (anstelle von oder zusätzlich zu den Benutzerinformationen) auf der Testergebnisseite an.

*Standard: `false`*

### `exercise_category_report_user_extra_fields`

**Zusätzliche Benutzerfelder im Übungskategoriebericht hinzufügen**

Definieren Sie ein Array mit der Liste der zusätzlichen Benutzerfelder, die dem Bericht hinzugefügt werden sollen.

### `exercise_category_round_score_in_export`

**Punktzahl in Testexporten runden**

Wenn aktiviert, werden Testpunktzahlen beim Export von Übungsberichten auf die nächste ganze Zahl gerundet.

*Standard: `false`*

### `exercise_default_visibility_can_be_modified_in_course` **v3**

**Standardsichtbarkeit neuer Tests kann kursweise geändert werden**

Wenn aktiviert, können Lehrkräfte in den Kurseinstellungen die Sichtbarkeit festlegen, die neuen Tests ihres Kurses zugewiesen wird, anstelle des Plattformstandards.

*Standard: `false`*

Wenn dies aktiviert ist, erscheint in den Kurseinstellungen im Abschnitt **Tests** die Option **Standardsichtbarkeit für neue Tests**. Ein Kurs, für den kein Wert gewählt wurde, verwendet `exercise_default_visibility_on_creation`.

### `exercise_default_visibility_on_creation` **v3**

**Standardsichtbarkeit neuer Tests**

Sichtbarkeit, die einem neuen Test zugewiesen wird, wenn eine Lehrkraft ihn in einem Kurs erstellt. Lehrkräfte können die Sichtbarkeit jedes Tests anschließend weiterhin ändern.

*Standard: `visible`*

### `exercise_embeddable_extra_types`

**Einbettbare Fragetypen**

Standardmäßig werden nur Einfachauswahl- und Mehrfachauswahlfragen berücksichtigt, wenn entschieden wird, ob ein Test in ein Video eingebettet werden kann. Mit dieser Option können Sie festlegen, dass weitere Fragetypen verfügbar sind. Beachten Sie, dass nicht alle Fragetypen gut in den für Videos vorgesehenen Bereich passen. Die Fragetypen sind im Code in question.class.php verfügbar.

### `exercise_hide_ip`

**Benutzer-IP in Testberichten ausblenden**

Standardmäßig werden Benutzerinformationen und die IP-Adresse angezeigt; dies kann jedoch als personenbezogene Daten gelten. Mit dieser Option können Sie diese Angaben aus allen Testberichten entfernen.

*Standard: `false`*

### `exercise_hide_label`

**Fragenband (richtig/falsch) in Testergebnissen ausblenden**

In den Testergebnissen erscheint standardmäßig ein Band, das anzeigt, ob die Antwort richtig oder falsch war. Aktivieren Sie diese Option, um das Band global zu entfernen.

*Standard: `false`*

### `exercise_invisible_in_session`

**Übung in der Sitzung unsichtbar**

Wenn eine Übung im Basiskurs sichtbar ist, erscheint sie in der Sitzung als unsichtbar. Wenn eine Übung im Basiskurs unsichtbar ist, erscheint sie in der Sitzung nicht.

*Standard: `false`*

### `exercise_max_editors_in_page`

**Maximale Anzahl von Editoren im Übungsergebnisbildschirm**

Aufgrund der großen Anzahl von Fragen, die in einer Übung erscheinen können, kann der Korrekturbildschirm, auf dem die Lehrkraft Kommentare zu jeder Antwort hinzufügen kann, sehr langsam laden. Setzen Sie diesen Wert auf 5, damit die Plattform WYSIWYG-Editoren nur bis zu einer bestimmten Anzahl von Antworten auf dem Bildschirm anzeigt. Dadurch wird die Ladezeit der Korrekturseite erheblich verkürzt, die WYSIWYG-Editoren werden jedoch entfernt und es bleibt nur ein einfacher Texteditor.

*Standard: `0`*


### `exercise_max_score`

**Maximale Punktzahl von Übungen**

Definieren Sie eine maximale Punktzahl (in der Regel 10, 20 oder 100) für alle Übungen auf der Plattform. Dadurch wird festgelegt, wie Endergebnisse Benutzern und Lehrkräften angezeigt werden.

*Standard: `20`*


### `exercise_min_score`

**Minimale Punktzahl von Übungen**

Definieren Sie eine minimale Punktzahl (in der Regel 0) für alle Übungen auf der Plattform. Dadurch wird festgelegt, wie Endergebnisse Benutzern und Lehrkräften angezeigt werden.

*Standard: `0`*

### `exercise_result_end_text_html_strict_filtering`

**HTML-Filterung in Testabschlussmeldungen umgehen**

Nachrichten am Ende von Tests werden als stets sicher betrachtet. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript an dieser Stelle.

*Standard: `false`*


### `exercise_score_format`

**Format der Testergebnisse**

Wählen Sie zwischen den folgenden Formen für die Anzeige der Punktzahl der Benutzer in verschiedenen Berichten: 1 = SCORE_AVERAGE (5 / 10); 2 = SCORE_PERCENT (50%); 3 = SCORE_DIV_PERCENT (5 / 10 (50%)). Verwenden Sie die numerische ID der gewünschten Form.

*Standard: `0`*

### `exercises_disable_new_attempts`

**Neue Testversuche deaktivieren**

Neue Testversuche global deaktivieren. Wird üblicherweise verwendet, wenn es ein allgemeines Problem mit Tests gibt und Sie Zeit für die Analyse benötigen, ohne die gesamte Plattform zu sperren.

*Standard: `false`*


### `hide_free_question_score`

**Punktzahl offener Fragen ausblenden**

Blendet aus, dass offene Fragen (einschließlich Audio und Anmerkungen) eine Punktzahl haben, indem die Anzeige der Punktzahl in allen für Lernende sichtbaren Berichten ausgeblendet wird.

*Standard: `false`*


### `hide_user_info_in_quiz_result`

**Benutzerinformationen auf der Testergebnisseite ausblenden**

Die Standardseite der Testergebnisse zeigt ein Benutzerdatenblatt (Foto, Name usw.), das in manchen Kontexten als grenzwertig im Hinblick auf die Verarbeitung personenbezogener Daten angesehen werden kann. Aktivieren Sie diese Option, um Benutzerdetails aus den Testergebnissen zu entfernen.

*Standard: `false`*


### `limit_exercise_teacher_access`

**Berechtigungen von Lehrkräften für Tests einschränken**

Wenn aktiviert, können Lehrkräfte weder Tests noch Fragen löschen, die Sichtbarkeit von Tests ändern, nach QTI herunterladen, Ergebnisse bereinigen usw.

*Standard: `false`*


### `my_courses_show_pending_exercise_attempts`

**Globale Liste ausstehender Tests**

Aktivieren, um dem Endbenutzer eine Seite mit der Liste ausstehender Tests über alle Kurse hinweg anzuzeigen.

*Standard: `false`*


### `question_exercise_html_strict_filtering`

**HTML-Filterung in Testfragen umgehen**

Fragentexte in Tests werden als stets sicher betrachtet. Das Entfernen des Filters ermöglicht die Verwendung von JavaScript an dieser Stelle.

*Standard: `false`*


### `question_pagination_length`

**Länge der Fragenpaginierung für Lehrkräfte**

Anzahl der Fragen, die auf jeder Seite angezeigt werden, wenn die Option zur Fragenpaginierung für Lehrkräfte verwendet wird.

*Standard: `20`*


### `quiz_answer_extra_recording`

**Zusätzliche Aufzeichnung von Testantworten aktivieren**

Aktiviert die Aufzeichnung aller Antworten (auch vorübergehender) in der Tabelle track_e_attempt_recording. Diese Funktion ist experimentell und kann Probleme auf den Berichtsseiten verursachen, wenn versucht wird, einen Test zu bewerten.

*Standard: `false`*


### `quiz_check_all_answers_before_end_test`

**Alle Antworten vor dem Absenden des Tests prüfen**

Zeigt vor dem Absenden des Tests ein Popup mit der Liste der beantworteten und unbeantworteten Fragen an.

*Standard: `false`*


### `quiz_check_button_enable`

**Prüfung des Antwortspeicherungsprozesses vor dem Test hinzufügen**

Stellt sicher, dass Benutzer bereit sind, den Test zu starten, indem vor dem Betreten des Tests eine Simulation des Fragenspeicherungsprozesses bereitgestellt wird. Dies ermöglicht die frühzeitige Erkennung einiger Verbindungsprobleme und verringert Reibungen in der Benutzererfahrung.

*Standard: `false`*


### `allow_final_exam_access_rule`

**Zugangsbedingungen vor einem Test**

Ermöglicht Lehrkräften, einen Test, beispielsweise eine Abschlussprüfung, geschlossen zu halten, bis der Lernende eine Mindestzeit im Kurs verbracht und ein erforderliches Profilfeld ausgefüllt hat. Lehrkräfte legen diese Bedingungen in den erweiterten Einstellungen jedes Tests fest. Solange diese Einstellung deaktiviert ist, werden die Bedingungen weder angezeigt noch angewendet.

Die Einstellung wird automatisch aktiviert, wenn die Plattform mit Tests aktualisiert wird, die bereits solche Bedingungen enthalten, sowie durch den Befehl `chamilo:migration:migrate-final-exam-access`, wenn dieser sie schreibt.

*Standard: `false`*


### `quiz_confirm_saved_answers`

**Kontrollkästchen zur Bestätigung der Antwortanzahl hinzufügen**

Diese Option fügt am Ende jedes Tests ein Kontrollkästchen hinzu, mit dem der Benutzer die Anzahl der gespeicherten Antworten bestätigen soll. Dies liefert bessere Audit-Daten für kritische Tests.

*Standard: `false`*


### `quiz_discard_orphan_in_course_export`

**Verwaiste Fragen beim Kurs-Export verwerfen**

Beim Exportieren eines Kurses werden Fragen, die zu keinem Test gehören, nicht exportiert.

*Standard: `false`*


### `quiz_generate_certificate_ending`

**Zertifikat bei Testende erzeugen**

Erzeugt ein Zertifikat beim Beenden eines Quiz. Das Quiz muss im Notenbuch-Werkzeug verknüpft sein und einen konfigurierten Bestehensprozentsatz haben.

*Standard: `false`*


### `quiz_hide_attempts_table_on_start_page`

**Tabelle der Testversuche auf der Teststartseite ausblenden**

Blendet die Tabelle aus, die alle vorherigen Versuche auf der Teststartseite anzeigt.

*Standard: `false`*


### `quiz_hide_question_number`

**Fragennummer ausblenden**

Blendet die fortlaufende Nummerierung der Fragen beim Ablegen eines Tests aus.

*Standard: `false`*


### `quiz_image_zoom`

**Zoomen von Testbildern aktivieren**

Aktivieren Sie diese Funktion, damit Benutzer in Tests verwendete Bilder vergrößern können.

### `quiz_keep_alive_ping_interval`

**Sitzung in Tests aktiv halten**

Hält die Sitzung aktiv, indem in dem hier definierten Intervall von x Sekunden ein regelmäßiges Ping-Signal an den Server gesendet wird. Wir empfehlen ein Intervall von 300 Sekunden.

*Standard: `0`*

### `quiz_open_question_decimal_score`

**Dezimalbewertung bei offenen Fragetypen**

Ermöglicht der Lehrkraft, die Fragetypen „offene Frage“, „mündlicher Ausdruck“ und „Annotation“ mit einer Dezimalbewertung zu bewerten.

*Standard: `false`*


### `quiz_prevent_copy_paste`

**Kopieren und Einfügen in Tests blockieren**

Blockiert die Tasten für Kopieren/Einfügen/Speichern/Drucken sowie Rechtsklicks in Übungen.

*Standard: `false`*

### `quiz_question_category_destinations` **v3**

**Progressive adaptive Tests nach Kategorieziel aktivieren**

Aktiviert progressive adaptive Tests, bei denen jede Fragenkategorie Lernende je nach Punktzahl in eine andere Kategorie weiterleiten kann.

*Standard: `true`*


### `quiz_question_delete_automatically_when_deleting_exercise`

**Fragen beim Löschen eines Tests automatisch löschen**

Standardmäßig werden Fragen verwaist, wenn der einzige Test, der sie verwendet, gelöscht wird. Ist diese Option aktiviert, werden alle Fragen, die andernfalls verwaist wären, ebenfalls gelöscht.

*Standard: `false`*


### `quiz_results_answers_report`

**Link zum Herunterladen der Testergebnisse anzeigen**

Zeigt auf der Seite mit den Testergebnissen einen Link zum Herunterladen der Ergebnisse als Datei an.

*Standard: `false`*


### `quiz_show_description_on_results_page`

**Testbeschreibung auf der Ergebnisseite immer anzeigen**

Wenn aktiviert, wird die Testbeschreibung nach Abschluss des Tests immer auf der Ergebnisseite angezeigt.

*Standard: `false`*


### `score_grade_model`

**Notenmodell für Punktzahlen**

Definiert ein Array von Punktzahlbereichen und Farben, um Berichte anhand dieses Modells anzuzeigen. Dadurch können Farben anstelle numerischer Noten angezeigt werden.

### `send_score_in_exam_notification_mail_to_manager`

**Punktzahl in die E-Mail-Benachrichtigung zur Testabgabe aufnehmen**

Fügt die Punktzahl der lernenden Person der E-Mail-Benachrichtigung hinzu, die nach der Abgabe eines Tests an die Lehrkraft gesendet wird.

*Standard: `false`*


### `show_exercise_attempts_in_all_user_sessions`

**Testversuche aus allen Sitzungen im Bericht ausstehender Tests anzeigen**

Zeigt im Bericht ausstehender Tests Testversuche von Benutzern aus allen Sitzungen an, auf die der allgemeine Tutor Zugriff hat.

*Standard: `false`*


### `show_exercise_expected_choice`

**Erwartete Auswahl in den Testergebnissen anzeigen**

Zeigt auf der Seite mit den Testergebnissen die erwartete Auswahl und einen Status (richtig/falsch) für jede Antwort an (sofern der Test so konfiguriert ist, dass Ergebnisse angezeigt werden).

*Standard: `false`*


### `show_exercise_question_certainty_ribbon_result`

**Punktzahl für Fragen zum Gewissheitsgrad anzeigen**

Standardmäßig zeigt Chamilo keine Punktzahl für die Fragetypen zum Gewissheitsgrad an.

*Standard: `false`*


### `show_exercise_session_attempts_in_base_course`

**Testversuche aus allen Sitzungen im Basiskurs anzeigen**

Zeigt der Lehrkraft im Basiskurs Testversuche von Benutzern aus allen Sitzungen an.

*Standard: `false`*


### `show_official_code_exercise_result_list`

**Amtlichen Code in den Übungsergebnissen anzeigen**

Legt fest, ob der amtliche Code der Studierenden in den Berichten zu den Übungsergebnissen angezeigt wird.

*Standard: `false`*

### `show_question_id`

**Fragen-IDs in Tests anzeigen**

Zeigt die internen IDs der Fragen an, damit Benutzer Probleme bei bestimmten Fragen notieren und effizienter melden können.

*Standard: `false`*


### `show_question_pagination`

**Fragenpaginierung für Lehrkräfte anzeigen**

Verwendet bei Tests mit vielen Fragen eine Paginierung, wenn die Anzahl der Fragen höher ist als dieser Wert. Auf 0 setzen, um die Paginierung zu deaktivieren.

*Standard: `100`*


### `tracking_my_progress_show_deleted_exercises`

**Gelöschte Tests unter „Mein Fortschritt“ anzeigen**

Aktivieren Sie diese Option, um auf der Seite „Mein Fortschritt“ die Ergebnisse aller absolvierten Tests anzuzeigen, auch der gelöschten.

*Standard: `false`*