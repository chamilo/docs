# Editor-Einstellungen

Konfiguration des Rich-Text-Editors (TinyMCE), der plattformweit verwendet wird — Symbolleisten, Plugins, KI-Hilfen im Editor.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Editor**. Diese Kategorie enthält **26 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor`

**Online-E-Mail-Editor aktiviert**

Wenn diese Option aktiviert ist, öffnet ein Klick auf eine E-Mail-Adresse einen Online-Editor.

### `allow_spellcheck`

**Rechtschreibprüfung**

Rechtschreibprüfung aktivieren

### `block_copy_paste_for_students`

**Kopieren und Einfügen für Lernende sperren**

Lernenden die Möglichkeit nehmen, im WYSIWYG-Editor zu kopieren und einzufügen

### `editor_block_image_copy_paste`

**Kopieren und Einfügen von Bildern im WYSIWYG-Editor verhindern**

Die Verwendung von Bildern per Kopieren und Einfügen als Base64 im Editor verhindern, um zu vermeiden, dass die Datenbank mit Bildern gefüllt wird.

*Standard: `false`*


### `editor_driver_list`

**Liste der WYSIWYG-Dateitreiber**

Array mit den Namen der Treiber für den Dateizugriff aus dem WYSIWYG-Editor.

### `editor_settings`

**WYSIWYG-Editor-Einstellungen**

Generisches Konfigurationsarray zur globalen Neukonfiguration des WYSIWYG-Editors.

### `enable_iframe_inclusion`

**Iframes im HTML-Editor zulassen**

Das Zulassen beliebiger Iframes im HTML-Editor erweitert die Bearbeitungsmöglichkeiten der Benutzer, kann jedoch ein Sicherheitsrisiko darstellen. Stellen Sie bitte sicher, dass Sie sich auf Ihre Benutzer verlassen können (d. h. Sie wissen, wer sie sind), bevor Sie diese Funktion aktivieren.

### `enable_uploadimage_editor`

**Drag & Drop von Bildern im WYSIWYG-Editor zulassen**

Bild-Upload als Datei aktivieren, wenn im Inhalt kopiert oder per Drag & Drop eingefügt wird.

*Standard: `false`*


### `enabled_asciisvg`

**AsciiSVG aktivieren**

Das AsciiSVG-Plugin im WYSIWYG-Editor aktivieren, um Diagramme aus mathematischen Funktionen zu zeichnen.

### `enabled_googlemaps`

**Google Maps aktivieren**

Die Schaltfläche zum Einfügen von Google Maps aktivieren. Die Aktivierung ist nicht vollständig, wenn nicht zuvor die Datei main/inc/lib/fckeditor/myconfig.php bearbeitet und ein Google-Maps-API-Schlüssel hinzugefügt wurde.

### `enabled_imgmap`

**Image Maps aktivieren**

Die Schaltfläche zum Einfügen von Image Maps aktivieren. Damit können URLs Bereichen eines Bildes zugeordnet und Hotspots erzeugt werden.

### `enabled_insertHtml`

**Einfügen von Widgets zulassen**

Damit können Sie auf Ihren Webseiten Ihre bevorzugten Videos und Anwendungen wie Vimeo oder Slideshare sowie allerlei Widgets und Gadgets einbetten

### `enabled_mathjax`

**MathJax aktivieren**

Die MathJax-Bibliothek aktivieren, um mathematische Formeln darzustellen. Dadurch wird der Editor-Symbolleiste eine Formelschaltfläche hinzugefügt; Formeln werden in LaTeX geschrieben. Siehe [Mathematische Formeln](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**SVG-Dateien erstellen und bearbeiten**

Diese Option ermöglicht das mehrschichtige Erstellen und Bearbeiten von SVG (Scalable Vector Graphics) online sowie den Export als PNG-Bilder.

### `enabled_wiris`

**WIRIS-Mathematik-Editor**

WIRIS-Mathematik-Editor aktivieren. Durch die Installation dieses Plugins erhalten Sie den WIRIS-Editor und WIRIS CAS.<br/>Diese Aktivierung ist nicht vollständig, sofern nicht zuvor das <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-Plugin für CKeditor WIRIS</a> heruntergeladen und sein Inhalt im Chamilo-Verzeichnis main/inc/lib/javascript/ckeditor/plugins/ entpackt wurde.<br/>Dies ist erforderlich, weil Wiris proprietäre Software ist und seine Dienste <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommerziell</a> sind. Um das Plugin anzupassen, bearbeiten Sie die Datei configuration.ini oder ersetzen Sie deren Inhalt durch die mit Chamilo mitgelieferte Datei configuration.ini.default.

### `force_wiki_paste_as_plain_text`

**Einfügen als reinen Text im Wiki erzwingen**

Dadurch wird verhindert, dass viele versteckte, fehlerhafte oder nicht standardkonforme Tags, die aus anderen Texten kopiert wurden, den Wiki-Text nach vielen Vorgängen beschädigen; beim Bearbeiten gehen jedoch einige Funktionen verloren.

### `full_editor_toolbar_set`

**Vollständige WYSIWYG-Editor-Symbolleiste**

Die vollständige Symbolleiste in allen WYSIWYG-Editorfeldern der Plattform anzeigen.

*Standard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier im Wiki**

HTML Purifier im Wiki-Werkzeug aktivieren (erhöht die Sicherheit, reduziert jedoch Stilfunktionen)

### `include_asciimathml_script`

**Mathjax-Bibliothek auf allen Systemseiten laden**

Aktivieren Sie diese Einstellung, wenn Sie auf MathML basierende mathematische Formeln und auf ASCIIsvg basierende mathematische Grafiken nicht nur im Werkzeug „Dokumente“, sondern auch an anderen Stellen im System anzeigen möchten.

### `math_asciimathML`

**ASCIIMathML-Mathematik-Editor**

ASCIIMathML-Mathematik-Editor aktivieren

### `more_buttons_maximized_mode`

**Erweiterte Schaltflächenleiste**

Erweiterte Schaltflächenleisten aktivieren, wenn der WYSIWYG-Editor maximiert ist

*Standard: `true`*

### `save_titles_as_html`

**Titel als HTML speichern**

Ermöglicht Benutzern, HTML in Titelfeldern an mehreren Stellen einzubinden. Dadurch ist eine gewisse Gestaltung von Titeln möglich, insbesondere in Testfragen. Außerdem können diese speziellen Titelfelder dieselbe sprachspezifische Markierung wie `translate_html` unten verwenden, die reine Texttitel sonst nicht aufnehmen können.

*Standard: `false`*

### `translate_html`

**Mehrsprachige HTML-Inhalte unterstützen**

Wenn aktiviert, können Benutzer in HTML-Elementen ein Attribut ‚lang‘ verwenden, um die Sprache festzulegen, in der der Inhalt dieses Elements verfasst ist. Aktivieren Sie mehrere Elemente mit unterschiedlichen ‚lang‘-Attributen, und Chamilo zeigt den Inhalt nur in der Sprache des Benutzers an.

*Standard: `false`*

Siehe [Mehrsprachige Inhalte](../../teacher-guide/adding-content/multi-language-content.md) im Lehrerhandbuch für die vollständige, lehrerorientierte Anleitung zu dieser Funktion.


### `video_context_menu_hidden`

**Kontextmenü im Videoplayer ausblenden**

Wenn aktiviert, ist das Rechtsklick-Kontextmenü bei HTML5-Videoplayern deaktiviert.

*Standard: `false`*


### `video_player_renderers`

**Videoplayer-Renderer**

Player-Renderer für Medien von YouTube, Vimeo, Facebook, DailyMotion und Twitch aktivieren

### `youtube_for_students`

**Lernenden das Einfügen von Videos von YouTube erlauben**

Ermöglicht Lernenden, YouTube-Videos einzufügen