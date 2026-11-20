# Einstellungen der KI-Helfer

Konfiguration der KI-Helfer (Texterzeugung, Bilderzeugung, Videoerzeugung, KI-Tutor, KI-Bewertung). Jeder Anbieter kann je Aufgabentyp aktiviert werden. Siehe auch [KI-Konfiguration](../integrations/ai-configuration.md).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > KI-Helfer**. Diese Kategorie enthält **15 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `ai_providers`

**Verbindungsdaten der KI-Anbieter**

Konfigurationsdaten für die Verbindung mit externen KI-Diensten.

### `content_analyser`

**Inhaltsanalysator**

Analysiert Lernmaterialien, um Erkenntnisse zu gewinnen oder die Qualität zu verbessern.

*Standard: `false`*

### `course_analyser`

**Kursanalysator**

Analysiert alle Ressourcen in einem oder mehreren Kursen und trainiert das KI-Modell vor, damit es jede Frage zu diesem oder diesen Kursen beantworten kann (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden dürfen).

*Standard: `false`*

### `disclose_ai_assistance`

**KI-Unterstützung offenlegen**

Zeigt eine Kennzeichnung bei jedem Inhalt oder Feedback an, der bzw. das von einem KI-System erzeugt oder mit erzeugt wurde, und macht dem Benutzer damit deutlich, dass der Inhalt mit Hilfe eines KI-Systems erstellt wurde. Angaben dazu, welches KI-System in welchem Fall verwendet wurde, werden zu Prüfzwecken in der Datenbank gespeichert, sind für den Endbenutzer jedoch nicht direkt zugänglich.

*Standard: `true`*

### `enable_ai_helpers`

**KI-Helfer-Werkzeug aktivieren**

Aktiviert alle verfügbaren KI-gestützten Funktionen der Plattform.

*Standard: `false`*

### `exercise_generator`

**Übungs-Generator**

Erzeugt personalisierte Tests mit KI auf Grundlage der Kursinhalte.

*Standard: `false`*

### `glossary_terms_generator`

**Glossarbegriffe-Generator**

Ermöglicht Lehrkräften, KI-generierte Glossarbegriffe für ihren Kurs anzufordern. Dabei werden 20 Begriffe auf Grundlage des Kurstitels und der allgemeinen Beschreibung im Werkzeug „Kursbeschreibung“ erzeugt. Bei mehrfacher Verwendung werden bereits in diesem Glossar vorhandene Begriffe ausgeschlossen (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden dürfen).

*Standard: `false`*

### `image_generator`

**Bildgenerator**

Erzeugt Bilder anhand von Prompts oder Inhalten mithilfe von KI.

*Standard: `false`*

### `learning_path_generator`

**Lernpfad-Generator**

Erzeugt personalisierte Lernpfade anhand von KI-Vorschlägen.

*Standard: `false`*

### `open_answers_grader`

**Bewertung offener Antworten**

Bewertet offene Antworten automatisch mithilfe von KI.

*Standard: `false`*

### `task_grader`

**Aufgabenbewertung**

Verwendet KI, um hochgeladene Aufgaben zu bewerten und zu benoten.

*Standard: `false`*

### `toolbox`

**KI-Werkzeugkasten**

Ermöglicht Lehrkräften, KI-gestützte Bildungsanwendungen innerhalb von Kursen zu erstellen und zu versionieren.

*Standard: `false`*

### `tutor_chatbot`

**Von KI angetriebener Tutor-Chatbot**

Stellt Studierenden einen KI-gestützten Tutor-Assistenten zur Verfügung.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Erzeugt Videos anhand von Prompts oder Inhalten mithilfe von KI (dies kann viele Tokens verbrauchen).

*Standard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**KI-Übersetzung in alle aktiven Sprachen in WYSIWYG-Editoren zulassen**

Ermöglicht Lehrkräften, Übersetzungen für alle aktiven Plattformsprachen in einer einzigen WYSIWYG-Aktion zu erzeugen. Dies kann eine große Anzahl von KI-Tokens verbrauchen.

*Standard: `true`*