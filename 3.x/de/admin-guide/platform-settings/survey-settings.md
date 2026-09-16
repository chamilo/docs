# Umfrage-Einstellungen

Standardwerte und Verhalten des Tools **Umfragen**.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Umfragen**. Diese Kategorie enthält **12 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `extend_rights_for_coach_on_survey`

**Rechte für Tutoren bei Umfragen erweitern**

Aktivieren Sie diese Option, um Tutoren das Erstellen und Bearbeiten von Umfragen zu erlauben

*Standard: `true`*


### `hide_survey_edition`

**Bearbeitung von Umfragen verhindern**

Verhindert die Bearbeitung von Umfragen für alle hier aufgeführten Umfragen (nach Code). Verwenden Sie *, um die Bearbeitung aller Umfragen zu verhindern.

### `hide_survey_reporting_button`

**Schaltfläche für Umfrageberichte ausblenden**

Ermöglicht Administratoren, die Schaltfläche für Umfrageberichte auszublenden, wenn Umfragen zur Befragung von Lehrkräften verwendet werden.

*Standard: `false`*


### `show_pending_survey_in_menu`

**„Ausstehende Umfragen“ im Menü anzeigen**

Zeigt einen Menüeintrag an, über den Benutzer auf ihre ausstehenden Umfragen zugreifen können.

*Standard: `false`*


### `show_surveys_base_in_sessions`

**Umfragen aus dem Basiskurs in allen Sitzungskursen anzeigen**

[inferred] Macht Umfragen aus dem Basiskurs für Lernende in allen zugehörigen Sitzungskursen sichtbar und verfügbar.

*Standard: `false`*


### `survey_additional_teacher_modify_actions`

**Zusätzliche Aktionen (als Links) zu Umfragelisten für Lehrkräfte hinzufügen**

Fügt Aktionen (in der Regel mit Plugins verbunden) in der Liste der Umfragen hinzu. Verwenden Sie die Array-Syntax ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Lehrkräften erlauben, Umfragefragen nach Antworten der Studierenden zu bearbeiten**

[inferred] Ermöglicht Dozierenden, Umfragefragen auch dann zu ändern, wenn Lernende bereits Antworten übermittelt haben.

*Standard: `false`*


### `survey_anonymous_show_answered`

**Lehrkräften erlauben zu sehen, wer anonyme Umfragen beantwortet hat**

Ermöglicht Lehrkräften zu sehen, welche Lernenden eine anonyme Umfrage bereits beantwortet haben. Dies erscheint erst, wenn mehr als ein Benutzer geantwortet hat, sodass es weiterhin schwierig bleibt festzustellen, wer was geantwortet hat.

*Standard: `false`*


### `survey_backwards_enable`

**Schaltfläche „vorherige Frage“ in Umfragen aktivieren**

[inferred] Aktiviert eine Navigationsschaltfläche „vorherige Frage“, damit Lernende frühere Umfragefragen erneut einsehen können.

*Standard: `false`*


### `survey_duplicate_order_by_name`

**Nach Studierendenname sortieren bei Nutzung der Umfrage-Duplizierungsfunktion**

Die Umfrage-Duplizierungsfunktion richtet sich an Lehrkräfte und soll diese auffordern, ihre Einschätzung zu jedem Studierenden der Reihe nach abzugeben. Diese Option sortiert die Fragen nach dem Nachnamen der Lernenden.

*Standard: `true`*


### `survey_email_sender_noreply`

**Absender der Umfrage-E-Mail (no-reply)**

Sollen Umfrageeinladungen die E-Mail-Adresse des Tutors oder die im Hauptkonfigurationsbereich definierte No-Reply-Adresse verwenden?

*Standard: `coach`* (die Auswahl „E-Mail-Absender des Kurstutors“ — der gespeicherte Wert ist gegenüber früheren Chamilo-Versionen unverändert, die Option ist in der Oberfläche jedoch mit „tutor“ beschriftet)


### `survey_mark_question_as_required`

**Alle Umfragefragen standardmäßig als „erforderlich“ markieren**

[inferred] Markiert alle neu erstellten Umfragefragen standardmäßig automatisch als erforderliche Antworten.

*Standard: `false`*