# Editor-Einstellungen

Konfiguration des Rich-Text-Editors (TinyMCE), der plattformweit verwendet wird — Symbolleisten, Plugins, KI-Hilfen im Editor.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Editor**. Diese Kategorie enthält **29 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `allow_email_editor`

**Online-E-Mail-Editor aktiviert**

Wenn diese Option aktiviert ist, öffnet ein Klick auf eine E-Mail-Adresse einen Online-Editor.

### `allow_spellcheck`

**Rechtschreibprüfung**

Rechtschreibprüfung aktivieren

### `block_copy_paste_for_students`

**Kopieren und Einfügen für Lernende sperren**

Lernenden die Möglichkeit nehmen, in den WYSIWYG-Editor zu kopieren und einzufügen

### `editor_block_image_copy_paste`

**Kopieren und Einfügen von Bildern im WYSIWYG-Editor verhindern**

Verhindert die Verwendung von Bildern per Kopieren und Einfügen als Base64 im Editor, um zu vermeiden, dass die Datenbank mit Bildern gefüllt wird.

*Standard: `false`*


### `editor_driver_list`

**Liste der WYSIWYG-Dateitreiber**

Array mit den Namen der Treiber für den Dateizugriff aus dem WYSIWYG-Editor.

### `editor_settings`

**Einstellungen des WYSIWYG-Editors**

Generisches Konfigurationsarray zur globalen Neukonfiguration des WYSIWYG-Editors.

### `enable_iframe_inclusion`

**Iframes im HTML-Editor zulassen**

Das Zulassen beliebiger Iframes im HTML-Editor erweitert die Bearbeitungsmöglichkeiten der Benutzer, kann jedoch ein Sicherheitsrisiko darstellen. Stellen Sie bitte sicher, dass Sie sich auf Ihre Benutzer verlassen können (d. h. Sie wissen, wer sie sind), bevor Sie diese Funktion aktivieren.

### `enable_uploadimage_editor`

**Bilder per Drag-and-drop im WYSIWYG-Editor zulassen**

Aktiviert den Bild-Upload als Datei beim Kopieren von Inhalten oder beim Drag-and-drop.

*Standard: `false`*


### `enabled_asciisvg`

**AsciiSVG aktivieren**

Aktiviert das AsciiSVG-Plugin im WYSIWYG-Editor, um Diagramme aus mathematischen Funktionen zu zeichnen.

### `enabled_googlemaps`

**Google Maps aktivieren**

Aktiviert die Schaltfläche zum Einfügen von Google Maps. Die Aktivierung ist nicht vollständig wirksam, wenn nicht zuvor die Datei main/inc/lib/fckeditor/myconfig.php bearbeitet und ein Google-Maps-API-Schlüssel hinzugefügt wurde.

### `enabled_imgmap`

**Image Maps aktivieren**

Aktiviert die Schaltfläche zum Einfügen von Image Maps. Damit können Sie URLs Bereichen eines Bildes zuordnen und Hotspots erstellen.

### `enabled_insertHtml`

**Einfügen von Widgets zulassen**

Damit können Sie auf Ihren Webseiten Ihre bevorzugten Videos und Anwendungen wie Vimeo oder SlideShare sowie alle Arten von Widgets und Gadgets einbetten

### `enabled_mathjax`

**MathJax aktivieren**

Aktiviert die MathJax-Bibliothek zur Darstellung mathematischer Formeln. Dadurch wird der Editor-Symbolleiste eine Formel-Schaltfläche hinzugefügt, in der Formeln in LaTeX geschrieben werden. Siehe [Mathematische Formeln](../../teacher-guide/adding-content/math-formulas.md).

### `enabled_support_svg`

**SVG-Dateien erstellen und bearbeiten**

Mit dieser Option können Sie SVG-Dateien (Scalable Vector Graphics) mehrschichtig online erstellen und bearbeiten sowie sie als Bilder im PNG-Format exportieren.

### `enabled_wiris`

**Mathematischer Editor WIRIS**

Aktiviert den mathematischen Editor WIRIS. Durch die Installation dieses Plugins erhalten Sie den WIRIS-Editor und WIRIS CAS.<br/>Diese Aktivierung ist nicht vollständig wirksam, sofern nicht zuvor das <a href='http://www.wiris.com/es/plugins3/ckeditor/download' target='_blank'>PHP-Plugin für CKeditor WIRIS</a> heruntergeladen und sein Inhalt im Chamilo-Verzeichnis main/inc/lib/javascript/ckeditor/plugins/ entpackt wurde.<br/>Dies ist erforderlich, weil Wiris proprietäre Software ist und seine Dienste <a href='http://www.wiris.com/store/who-pays' target='_blank'>kommerziell</a> sind. Um Anpassungen am Plugin vorzunehmen, bearbeiten Sie die Datei configuration.ini oder ersetzen Sie ihren Inhalt durch die mit Chamilo ausgelieferte Datei configuration.ini.default.

### `etherpad_api_key`

**Etherpad-API-Schlüssel**

Serverseitige API-Anmeldeinformation, die zum Erstellen der Pad- und Editor-Sitzungen verwendet wird. Behandeln Sie sie als Geheimnis; teilen Sie sie nicht in Tickets oder Dokumentations-Screenshots.

*Standard: leer*

### `etherpad_enabled`

**Etherpad für die Wiki-Bearbeitung aktivieren**

Wenn aktiviert und korrekt konfiguriert, lädt das Bearbeitungsformular einer vorhandenen Wiki-Seite den kollaborativen Etherpad-Editor. Beim Speichern wird aus dem aktuellen Inhalt eine normale Wiki-Revision erstellt.

*Standard: `false`*

### `etherpad_url`

**Etherpad-URL**

Basis-URL des Etherpad-Servers, der zum Öffnen des gemeinsamen Wiki-Editors verwendet wird. Für sichere eingebettete Sitzungen stellen Sie Etherpad auf **demselben Origin wie Chamilo** bereit, beispielsweise hinter einem Reverse-Proxy unter `https://campus.example.org/etherpad`. Betten Sie keinen fremden Cross-Origin-Server ein.

*Standard: leer*

### `force_wiki_paste_as_plain_text`

**Einfügen als reinen Text im Wiki erzwingen**

Dies verhindert, dass viele versteckte, fehlerhafte oder nicht standardkonforme Tags, die aus anderen Texten kopiert wurden, den Wiki-Text nach zahlreichen Problemen beschädigen; dabei gehen jedoch einige Funktionen beim Bearbeiten verloren.

### `full_editor_toolbar_set`

**Vollständige WYSIWYG-Editor-Symbolleiste**

Die vollständige Symbolleiste in allen WYSIWYG-Editorfeldern der Plattform anzeigen.

*Standard: `false`*


### `htmlpurifier_wiki`

**HTMLPurifier im Wiki**

HTML-Purifier im Wiki-Werkzeug aktivieren (erhöht die Sicherheit, reduziert jedoch Formatierungsfunktionen)

### `include_asciimathml_script`

**MathJax-Bibliothek auf allen Systemseiten laden**

Aktivieren Sie diese Einstellung, wenn Sie auf MathML basierende mathematische Formeln und auf ASCIIsvg basierende mathematische Grafiken nicht nur im Werkzeug „Dokumente“, sondern auch an anderen Stellen im System anzeigen möchten.

### `math_asciimathML`

**Mathematischer ASCIIMathML-Editor**

Mathematischen ASCIIMathML-Editor aktivieren

### `more_buttons_maximized_mode`

**Erweiterte Schaltflächenleiste**

Erweiterte Schaltflächenleisten aktivieren, wenn der WYSIWYG-Editor maximiert ist

*Standard: `true`*

### `save_titles_as_html`

**Titel als HTML speichern**

Ermöglicht Benutzern, an mehreren Stellen HTML in Titelfelder einzufügen. Dadurch können Titel teilweise formatiert werden, insbesondere bei Testfragen. Außerdem können diese spezifischen Titelfelder dieselbe sprachspezifische Kennzeichnung wie `translate_html` unten verwenden, die reine Texttitel sonst nicht aufnehmen können.

*Standard: `false`*

### `translate_html`

**Unterstützung für mehrsprachige HTML-Inhalte**

Wenn diese Option aktiviert ist, können Benutzer das Attribut „lang“ in HTML-Elementen verwenden, um die Sprache festzulegen, in der der Inhalt dieses Elements verfasst ist. Aktivieren Sie mehrere Elemente mit unterschiedlichen „lang“-Attributen, und Chamilo zeigt den Inhalt nur in der Sprache des Benutzers an.

*Standard: `false`*

Eine vollständige, an Lehrkräfte gerichtete Anleitung zu dieser Funktion finden Sie unter [Mehrsprachige Inhalte](../../teacher-guide/adding-content/multi-language-content.md) im Leitfaden für Lehrkräfte.


### `video_context_menu_hidden`

**Kontextmenü des Videoplayers ausblenden**

Wenn aktiviert, wird das Kontextmenü per Rechtsklick bei HTML5-Videoplayern deaktiviert.

*Standard: `false`*


### `video_player_renderers`

**Videoplayer-Renderer**

Player-Renderer für Medien von YouTube, Vimeo, Facebook, DailyMotion und Twitch aktivieren

### `youtube_for_students`

**Lernenden das Einfügen von YouTube-Videos erlauben**

Ermöglicht Lernenden, YouTube-Videos einzufügen