# Spracheinstellungen

Verfügbare Sprachen, Standardsprache und wie Chamilo ermittelt, welche Sprache angezeigt wird.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Sprachen**. Diese Kategorie enthält **13 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_course_multiple_languages`

**Mehrsprachige Kurse**

Aktiviert Kurse, die in mehr als einer Sprache verwaltet werden. Diese Option fügt auf der Kursseite einen Sprachauswähler hinzu, damit Benutzer einfach wechseln können, und ergänzt Kurse um ein Extrafeld „multiple_language“, das Fernverwaltungsverfahren ermöglicht.

*Standard: `false`*


### `allow_use_sub_language`

**Definition und Verwendung von Untersprachen zulassen**

Wenn Sie diese Option aktivieren, können Sie Varianten für jeden der in der Plattformoberfläche verwendeten Sprachbegriffe definieren, in Form einer neuen Sprache, die auf einer bestehenden Sprache basiert und diese erweitert. Sie finden diese Option im Sprachenbereich des Administrationspanels.

*Standard: `false`*

### `auto_detect_language_custom_pages`

**Automatische Spracherkennung auf benutzerdefinierten Seiten aktivieren**

Wenn Sie benutzerdefinierte Seiten verwenden, aktivieren Sie diese Option, wenn dort ein Spracherkenner die Seite in der Browsersprache des Benutzers anzeigen soll, oder deaktivieren Sie sie, um die Sprache auf die Standardplattformsprache festzulegen.

*Standard: `true`*


### `language_by_resource` **v3**

**Sprache nach Ressource**

Ermöglicht das Zuweisen einer bestimmten Sprache zu einzelnen Ressourcen.

*Standard: `false`*

### `language_flags_by_country`

**Sprachflaggen**

Länderflaggen für Sprachen verwenden. Dies ist standardmäßig nicht aktiviert, weil einige Sprachen nicht streng an ein Land gebunden sind, was bei manchen Benutzern zu Unzufriedenheit führen kann.

*Standard: `false`*


### `language_priority_1`

**Sprache mit höchster Priorität**

Primäre Sprache, die ausgewählt wird, wenn mehrere Sprachkontexte gesetzt sind.

*Standard: `course_lang`*


### `language_priority_2`

**Sprache mit zweiter Priorität**

Sekundäre Ersatzsprache, falls die erste Priorität nicht verfügbar oder außerhalb des Kontexts ist.

*Standard: `user_profil_lang`*


### `language_priority_3`

**Sprache mit dritter Priorität**

Tertiäre Ersatzsprache, falls höhere Prioritäten fehlschlagen.

*Standard: `user_selected_lang`*


### `language_priority_4`

**Sprache mit vierter Priorität**

Letzte Ersatzsprache in der Prioritätsreihenfolge.

*Standard: `platform_lang`*


### `platform_language`

**Standardplattformsprache**

Hauptsprache, die standardmäßig verwendet wird, wenn keine Benutzersprache gesetzt ist.

*Standard: `en`*


### `show_different_course_language`

**Kurssprachen anzeigen**

Die Sprache jedes Kurses neben dem Kurstitel in der Kursliste auf der Startseite anzeigen

*Standard: `true`*


### `show_language_selector_in_menu`

**Sprachumschalter im Hauptmenü**

Einen Sprachauswähler im Hauptmenü anzeigen, der die Sprachpräferenz des Benutzers sofort aktualisiert. Dies kann in mehrsprachigen Portalen nützlich sein, in denen Lernende für ihr Lernen von einer Sprache in eine andere wechseln müssen.

*Standard: `true`*


### `template_activate_language_filter`

**Mehrsprachige Dokumentvorlagen**

Ermöglicht, Dokumentvorlagen (auf Plattform- oder Kursebene) für bestimmte Sprachen zu konfigurieren.

*Standard: `false`*