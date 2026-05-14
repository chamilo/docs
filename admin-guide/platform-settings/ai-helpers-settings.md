# Einstellungen für KI-Helfer

Konfiguration der KI-Helfer (Textgenerierung, Bildgenerierung, Videogenerierung, KI-Tutor, KI-Bewertung). Jeder Anbieter kann pro Aufgabentyp aktiviert werden. Siehe auch [KI-Konfiguration](../integrations/ai-configuration.md).

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > KI-Helfer** zu. Diese Kategorie enthält **13 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `ai_providers`

**Verbindungsdaten für KI-Anbieter**

Konfigurationsdaten zur Verbindung mit externen KI-Diensten.

### `content_analyser`

**Inhaltsanalysator**

Analysiert Lernmaterialien, um Erkenntnisse zu gewinnen oder die Qualität zu verbessern.

*Standard: `false`*

### `course_analyser`

**Kursanalysator**

Analysiert alle Ressourcen in einem oder mehreren Kursen und trainiert das KI-Modell vor, um Fragen zu diesem oder diesen Kursen zu beantworten (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden können).

*Standard: `false`*

### `disclose_ai_assistance`

**Offenlegung der KI-Unterstützung**

Zeigt ein Tag auf jedem Inhalt oder Feedback an, das von einem KI-System generiert oder mitgeneriert wurde, um dem Benutzer zu zeigen, dass der Inhalt mit Hilfe eines KI-Systems erstellt wurde. Details darüber, welches KI-System in welchem Fall verwendet wurde, werden zur Prüfung in der Datenbank gespeichert, sind jedoch für den Endbenutzer nicht direkt zugänglich.

*Standard: `true`*

### `enable_ai_helpers`

**KI-Helfer-Tool aktivieren**

Aktiviert alle verfügbaren KI-gestützten Funktionen auf der Plattform.

*Standard: `false`*

### `exercise_generator`

**Übungsgenerator**

Generiert personalisierte Tests mit KI basierend auf Kursinhalten.

*Standard: `false`*

### `glossary_terms_generator`

**Glossarbegriffe-Generator**

Ermöglicht Lehrern, KI-generierte Glossarbegriffe für ihren Kurs anzufordern. Dies generiert 20 Begriffe basierend auf dem Kurstitel und der allgemeinen Beschreibung im Kursbeschreibungstool. Bei mehrfacher Verwendung werden bereits im Glossar vorhandene Begriffe ausgeschlossen (stellen Sie sicher, dass Inhalte mit den konfigurierten KI-Diensten geteilt werden können).

*Standard: `false`*

### `image_generator`

**Bildgenerator**

Generiert Bilder basierend auf Eingaben oder Inhalten mithilfe von KI.

*Standard: `false`*

### `learning_path_generator`

**Lernpfad-Generator**

Generiert personalisierte Lernpfade mithilfe von KI-Vorschlägen.

*Standard: `false`*

### `open_answers_grader`

**Bewertung offener Antworten**

Bewertet automatisch offene Antworten mithilfe von KI.

*Standard: `false`*

### `task_grader`

**Aufgabenbewertung**

Verwendet KI, um hochgeladene Aufgaben zu bewerten und zu benoten.

*Standard: `false`*

### `tutor_chatbot`

**Tutor-Chatbot mit KI-Unterstützung**

Bietet Studierenden einen KI-gestützten Tutor-Assistenten.

*Standard: `false`*

### `video_generator`

**Videogenerator**

Generiert Videos basierend auf Eingaben oder Inhalten mithilfe von KI (dies kann viele Token verbrauchen).

*Standard: `false`*