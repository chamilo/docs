# Spracheneinstellungen

Verfügbare Sprachen, Standardsprache und wie Chamilo entscheidet, welche Sprache angezeigt wird.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Sprachen** zu. Diese Kategorie enthält **12 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungsvorlagen (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_course_multiple_languages`

**Mehrsprachige Kurse**

Aktivieren Sie Kurse, die in mehr als einer Sprache verwaltet werden. Diese Option fügt einen Sprachwähler auf der Kursseite hinzu, um Benutzern das einfache Wechseln zu ermöglichen, und fügt ein zusätzliches Feld 'multiple_language' zu Kursen hinzu, das Fernverwaltungsverfahren ermöglicht.

*Standard: `false`*

### `allow_use_sub_language`

**Definition und Verwendung von Untersprachen zulassen**

Durch Aktivieren dieser Option können Sie Variationen für jeden der in der Benutzeroberfläche der Plattform verwendeten Sprachbegriffe definieren, in Form einer neuen Sprache, die auf einer bestehenden Sprache basiert und diese erweitert. Sie finden diese Option im Sprachenbereich des Verwaltungspanels.

*Standard: `false`*

### `auto_detect_language_custom_pages`

**Sprachenerkennung auf benutzerdefinierten Seiten aktivieren**

Wenn Sie benutzerdefinierte Seiten verwenden, aktivieren Sie diese Option, wenn Sie möchten, dass ein Sprachdetektor die Seite in der Browsersprache des Benutzers anzeigt, oder deaktivieren Sie sie, um die Standardsprache der Plattform zu erzwingen.

*Standard: `true`*

### `language_flags_by_country`

**Sprachflaggen**

Verwenden Sie Länderflaggen für Sprachen. Dies ist standardmäßig nicht aktiviert, da einige Sprachen nicht strikt an ein Land gebunden sind, was bei einigen Benutzern zu Frustration führen kann.

*Standard: `false`*

### `language_priority_1`

**Höchste Prioritätssprache**

Primäre Sprache, die ausgewählt wird, wenn mehrere Sprachkontexte festgelegt sind.

*Standard: `course_lang`*

### `language_priority_2`

**Sekundäre Prioritätssprache**

Sekundäre Rückfallsprache, falls die erste Priorität nicht verfügbar ist oder außerhalb des Kontexts liegt.

*Standard: `user_profil_lang`*

### `language_priority_3`

**Dritte Prioritätssprache**

Tertiäre Rückfallsprache, falls höhere Prioritäten fehlschlagen.

*Standard: `user_selected_lang`*

### `language_priority_4`

**Vierte Prioritätssprache**

Letzte Rückfallsprache in der Reihenfolge der Priorität.

*Standard: `platform_lang`*

### `platform_language`

**Standard-Plattformsprache**

Hauptsprache, die standardmäßig verwendet wird, wenn keine Benutzersprache festgelegt ist.

*Standard: `en`*

### `show_different_course_language`

**Kursprachen anzeigen**

Zeigen Sie die Sprache jedes Kurses neben dem Kurstitel in der Kursliste auf der Startseite an.

*Standard: `true`*

### `show_language_selector_in_menu`

**Sprachwähler im Hauptmenü**

Zeigen Sie einen Sprachwähler im Hauptmenü an, der die Sprachpräferenz des Benutzers sofort aktualisiert. Dies kann in mehrsprachigen Portalen nützlich sein, in denen Lernende zwischen Sprachen für ihr Lernen wechseln müssen.

*Standard: `true`*

### `template_activate_language_filter`

**Mehrsprachige Dokumentvorlagen**

Aktivieren Sie Dokumentvorlagen (auf Plattform- oder Kursebene), die für bestimmte Sprachen konfiguriert werden können.

*Standard: `false`*