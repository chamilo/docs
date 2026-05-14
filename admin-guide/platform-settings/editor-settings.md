# Editor-Einstellungen

Konfiguration des Rich-Text-Editors (TinyMCE), der plattformweit verwendet wird – Symbolleisten, Plugins, KI-Hilfen im Editor.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Editor** zu. Diese Kategorie enthält **26 Einstellungen**, die unten mit dem Titel und Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor`

**Online-E-Mail-Editor aktiviert**

Wenn diese Option aktiviert ist, öffnet ein Klick auf eine E-Mail-Adresse einen Online-Editor.

### `allow_spellcheck`

**Rechtschreibprüfung**

Rechtschreibprüfung aktivieren

### `block_copy_paste_for_students`

**Kopieren und Einfügen für Lernende blockieren**

Lernenden die Möglichkeit blockieren, Inhalte in den WYSIWYG-Editor zu kopieren und einzufügen

### `editor_block_image_copy_paste`

**Kopieren und Einfügen von Bildern im WYSIWYG-Editor verhindern**

Verhindern Sie das Kopieren und Einfügen von Bildern als Base64 im Editor, um zu vermeiden, dass die Datenbank mit Bildern gefüllt wird.

*Standard: `false`*

### `editor_driver_list`

**Liste der WYSIWYG-Dateitreiber**

Array, das die Namen der Treiber für den Dateizugriff über den WYSIWYG-Editor enthält.

### `editor_settings`

**WYSIWYG-Editor-Einstellungen**

Generisches Konfigurationsarray, um den WYSIWYG-Editor global neu zu konfigurieren.

### `enable_iframe_inclusion`

**Iframes im HTML-Editor erlauben**

Das Zulassen beliebiger Iframes im HTML-Editor erweitert die Bearbeitungsmöglichkeiten der Benutzer, kann jedoch ein Sicherheitsrisiko darstellen. Stellen Sie sicher, dass Sie Ihren Benutzern vertrauen können (d.h. Sie wissen, wer sie sind), bevor Sie diese Funktion aktivieren.

### `enable_uploadimage_editor`

**Bilder per Drag & Drop im WYSIWYG-Editor erlauben**

Bild-Upload als Datei aktivieren, wenn Inhalte kopiert oder per Drag & Drop eingefügt werden.

*Standard: `false`*

### `enabled_asciisvg`

**AsciiSVG aktivieren**

Aktivieren Sie das AsciiSVG-Plugin im WYSIWYG-Editor, um Diagramme aus mathematischen Funktionen zu zeichnen.

### `enabled_googlemaps`

**Google Maps aktivieren**

Aktivieren Sie die Schaltfläche zum Einfügen von Google Maps. Die Aktivierung ist nicht vollständig umgesetzt, wenn nicht zuvor die Datei main/inc/lib/fckeditor/myconfig.php bearbeitet und ein Google Maps API-Schlüssel hinzugefügt wurde.

### `enabled_imgmap`

**Bildkarten aktivieren**

Aktivieren Sie die Schaltfläche zum Einfügen von Bildkarten. Dies ermöglicht es Ihnen, URLs mit Bereichen eines Bildes zu verknüpfen und Hotspots zu erstellen.

### `enabled_insertHtml`

**Einfügen von Widgets erlauben**

Dies ermöglicht es Ihnen, Ihre bevorzugten Videos und Anwendungen wie Vimeo oder Slideshare sowie allerlei Widgets und Gadgets in Ihre Webseiten einzubetten.

### `enabled_mathjax`

**MathJax aktivieren**

Aktivieren Sie die MathJax-Bibliothek zur Visualisierung mathematischer Formeln. Dies ist nur nützlich, wenn entweder die Einstellungen für ASCIIMathML oder ASCIISVG aktiviert sind.

### `enabled_support_svg`

**SVG-Dateien erstellen und bearbeiten**

Diese Option ermöglicht es Ihnen, mehrschichtige SVG-Dateien (Scalable Vector Graphics) online zu erstellen und zu bearbeiten sowie sie in PNG-Format zu exportieren.

### `enabled_wiris`

**WIRIS mathematischer Editor**

Aktivieren Sie den mathematischen Editor WIRIS. Durch die Installation dieses Plugins erhalten Sie den WIRIS-Editor und WIRIS CAS.<br/>Diese Aktivierung ist nicht vollständig umgesetzt, es sei denn, das <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-Plugin für CKeditor WIRIS</a> wurde zuvor heruntergeladen und dessen Inhalt im Verzeichnis main/inc/lib/javascript/ckeditor/plugins/ von Chamilo entpackt.<br/>Dies ist notwendig, da Wiris proprietäre Software ist und seine Dienste <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommerziell</a> sind. Um Anpassungen am Plugin vorzunehmen, bearbeiten Sie die Datei configuration.ini oder ersetzen Sie deren Inhalt durch die mit Chamilo gelieferte Datei configuration.ini.default.

### `force_wiki_paste_as_plain_text`

**Einfügen als reiner Text im Wiki erzwingen**

Dies verhindert viele versteckte, falsche oder nicht standardkonforme Tags, die aus anderen Texten kopiert wurden, und schützt den Text des Wikis vor Problemen; allerdings gehen dabei einige Bearbeitungsfunktionen verloren.

### `full_editor_toolbar_set`

**Vollständige WYSIWYG-Editor-Symbolleiste**

Zeigen Sie die vollständige Symbolleiste in allen WYSIWYG-Editorfeldern auf der Plattform an.

*Standard: `false`*

### `htmlpurifier_wiki`

**HTMLPurifier im Wiki**

Aktivieren Sie HTMLPurifier im Wiki-Tool (erhöht die Sicherheit, reduziert jedoch Stilfunktionen)

### `include_asciimathml_script`

**MathJax-Bibliothek auf allen Systemseiten laden**

Aktivieren Sie diese Einstellung, wenn Sie mathematische Formeln auf Basis von MathML und mathematische Grafiken auf Basis von ASCIIsvg nicht nur im Tool 'Dokumente', sondern auch an anderen Stellen im System anzeigen möchten.

### `math_asciimathML`

**ASCIIMathML mathematischer Editor**

Aktivieren Sie den mathematischen Editor ASCIIMathML

### `more_buttons_maximized_mode`

**Erweiterte Schaltflächenleiste**

Aktivieren Sie erweiterte Schaltflächenleisten, wenn der WYSIWYG-Editor maximiert ist

*Standard: `true`*

---
### `save_titles_as_html`

**Titel als HTML speichern**

Erlaubt Benutzern, HTML in TitelFeldern an verschiedenen Stellen zu verwenden. Dies ermöglicht eine gewisse Gestaltung von Titeln, insbesondere bei Testfragen.

*Standard: `false`*

### `translate_html`

**Mehrsprachigen HTML-Inhalt unterstützen**

Wenn aktiviert, erlaubt diese Option Benutzern, ein 'lang'-Attribut in HTML-Elementen zu verwenden, um die Sprache des Inhalts dieses Elements zu definieren. Aktivieren Sie mehrere Elemente mit unterschiedlichen 'lang'-Attributen, und Chamilo zeigt den Inhalt nur in der Sprache des Benutzers an.

*Standard: `false`*

### `video_context_menu_hidden`

**Kontextmenü im Videoplayer ausblenden**

Wenn aktiviert, wird das Kontextmenü bei Rechtsklick auf HTML5-Videoplayern deaktiviert.

*Standard: `false`*

### `video_player_renderers`

**Videoplayer-Renderer**

Aktivieren Sie Player-Renderer für YouTube-, Vimeo-, Facebook-, DailyMotion- und Twitch-Medien.

### `youtube_for_students`

**Lernenden das Einfügen von YouTube-Videos erlauben**

Ermöglicht Lernenden, YouTube-Videos einzufügen.