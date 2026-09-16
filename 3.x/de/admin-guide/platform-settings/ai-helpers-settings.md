# Einstellungen der KI-Helfer

Konfiguration der KI-Helfer (Textgenerierung, Bildgenerierung, Videogenerierung, KI-Tutor, KI-Bewertung). Jeder Anbieter kann pro Aufgabentyp aktiviert werden. Siehe auch [KI-Konfiguration](../integrations/ai-configuration.md).

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > KI-Helfer**. Diese Kategorie enthält **14 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `ai_providers`

**Verbindungsdaten der KI-Anbieter**

Konfigurationsdaten zur Verbindung mit externen KI-Diensten.

### `content_analyser`

**Inhaltsanalysator**

Analysiert Lernmaterialien, um Erkenntnisse zu gewinnen oder die Qualität zu verbessern.

*Standard: `false`*

### `course_analyser`

**Kursanalysator**

Analysiert alle Ressourcen in einem oder mehreren Kursen und trainiert das KI-Modell vor, um beliebige Fragen zu diesem oder diesen Kursen zu beantworten (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden dürfen).

*Standard: `false`*

### `disclose_ai_assistance`

**KI-Unterstützung kenntlich machen**

Zeigt eine Kennzeichnung an jedem Inhalt oder Feedback, der bzw. das von einem KI-System erzeugt oder mit erzeugt wurde, und macht dem Nutzer deutlich, dass der Inhalt mit Hilfe eines KI-Systems erstellt wurde. Angaben dazu, welches KI-System in welchem Fall verwendet wurde, werden in der Datenbank für die Prüfung aufbewahrt, sind für den Endnutzer jedoch nicht direkt zugänglich.

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

Ermöglicht Lehrenden, in ihrem Kurs KI-generierte Glossarbegriffe anzufordern. Es werden 20 Begriffe auf Grundlage des Kurstitels und der allgemeinen Beschreibung im Werkzeug Kursbeschreibung erzeugt. Bei wiederholter Nutzung werden bereits im Glossar vorhandene Begriffe ausgeschlossen (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden dürfen).

*Standard: `false`*

### `image_generator`

**Bildgenerator**

Erzeugt Bilder auf Grundlage von Prompts oder Inhalten mittels KI.

*Standard: `false`*

### `learning_path_generator`

**Lernpfad-Generator**

Erzeugt personalisierte Lernpfade anhand von KI-Vorschlägen.

*Standard: `false`*

### `open_answers_grader`

**Bewertung offener Antworten**

Bewertet offene Antworten automatisch mittels KI.

*Standard: `false`*

### `task_grader`

**Aufgabenbewertung**

Nutzt KI, um hochgeladene Aufgaben zu bewerten und zu benoten.

*Standard: `false`*

### `tutor_chatbot`

**Von KI angetriebener Tutor-Chatbot**

Stellt Studierenden einen KI-gestützten Tutor-Assistenten bereit.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Erzeugt Videos auf Grundlage von Prompts oder Inhalten mittels KI (dies kann viele Tokens verbrauchen).

*Standard: `false`*

### `wysiwyg_translation_all_languages` **v3**

**KI-Übersetzung in alle aktiven Sprachen in WYSIWYG-Editoren zulassen**

Ermöglicht Lehrenden, in einer WYSIWYG-Aktion Übersetzungen für alle aktiven Plattformsprachen zu erzeugen. Dies kann eine große Anzahl von KI-Tokens verbrauchen.

*Standard: `true`*