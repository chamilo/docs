# Umfrage-Einstellungen

Standardwerte und Verhalten des **Umfragen**-Tools.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Umfragen** zu. Diese Kategorie enthält **12 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `extend_rights_for_coach_on_survey`

**Erweiterte Rechte für Trainer bei Umfragen**

Das Aktivieren dieser Option erlaubt es Trainern, Umfragen zu erstellen und zu bearbeiten.

*Standard: `true`*

### `hide_survey_edition`

**Bearbeitung von Umfragen verhindern**

Verhindert die Bearbeitung von Umfragen für alle hier aufgeführten Umfragen (nach Code). Verwenden Sie * , um die Bearbeitung aller Umfragen zu verhindern.

### `hide_survey_reporting_button`

**Schaltfläche für Umfrageberichte ausblenden**

Ermöglicht Administratoren, die Schaltfläche für Umfrageberichte auszublenden, wenn Umfragen zur Bewertung von Lehrern verwendet werden.

*Standard: `false`*

### `show_pending_survey_in_menu`

**"Ausstehende Umfragen" im Menü anzeigen**

Zeigt einen Menüpunkt an, der Benutzern den Zugriff auf ihre ausstehenden Umfragen ermöglicht.

*Standard: `false`*

### `show_surveys_base_in_sessions`

**Umfragen aus dem Basiskurs in allen Sitzungskursen anzeigen**

[abgeleitet] Macht Umfragen aus dem Basiskurs für Lernende in allen zugehörigen Sitzungskursen sichtbar und verfügbar.

*Standard: `false`*

### `survey_additional_teacher_modify_actions`

**Zusätzliche Aktionen (als Links) zu Umfragelisten für Lehrer hinzufügen**

Fügt Aktionen (normalerweise mit Plugins verbunden) zur Liste der Umfragen hinzu. Verwenden Sie die Array-Syntax ['myplugin' => ['MyPlugin', 'urlGeneratorCallback']].

### `survey_allow_answered_question_edit`

**Lehrern erlauben, Umfragefragen nach Beantwortung durch Schüler zu bearbeiten**

[abgeleitet] Erlaubt Lehrenden, Umfragefragen zu ändern, selbst nachdem Lernende Antworten eingereicht haben.

*Standard: `false`*

### `survey_anonymous_show_answered`

**Lehrern erlauben, zu sehen, wer bei anonymen Umfragen geantwortet hat**

Erlaubt Lehrern zu sehen, welche Lernenden bereits bei einer anonymen Umfrage geantwortet haben. Dies wird erst angezeigt, wenn mehr als ein Benutzer geantwortet hat, sodass es schwierig bleibt, zu identifizieren, wer was geantwortet hat.

*Standard: `false`*

### `survey_backwards_enable`

**Schaltfläche 'Vorherige Frage' in Umfragen aktivieren**

[abgeleitet] Aktiviert eine Navigationsschaltfläche "Vorherige Frage", um Lernenden das Überprüfen früherer Umfragefragen zu ermöglichen.

*Standard: `false`*

### `survey_duplicate_order_by_name`

**Bei Verwendung der Umfrageduplikationsfunktion nach Schülernamen sortieren**

Die Umfrageduplikationsfunktion richtet sich an Lehrer und soll es ihnen ermöglichen, ihre Einschätzung zu jedem Schüler nacheinander abzugeben. Diese Option sortiert die Fragen nach dem Nachnamen des Lernenden.

*Standard: `true`*

### `survey_email_sender_noreply`

**Umfrage-E-Mail-Absender (No-Reply)**

Sollen die Umfrageeinladungen die E-Mail-Adresse des Trainers oder die in der Hauptkonfiguration definierte No-Reply-Adresse verwenden?

*Standard: `coach`*

### `survey_mark_question_as_required`

**Alle Umfragefragen standardmäßig als 'erforderlich' markieren**

[abgeleitet] Markiert automatisch alle neu erstellten Umfragefragen standardmäßig als erforderliche Antworten.

*Standard: `false`*