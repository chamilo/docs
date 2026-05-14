# Dokumenteinstellungen

Verhalten des Kurs-Tools **Dokumente** — Uploads, erlaubte Erweiterungen, Freigabe und Vorlagen.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Dokumente** zu. Diese Kategorie enthält **29 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Plattform-Einstellungs-Fixtures (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `access_url_specific_files`

**URL-spezifische Dateien aktivieren**

Wenn diese Funktion bei einer Multi-URL-Konfiguration aktiviert ist, können Sie zur Haupt-URL navigieren und URL-spezifische Versionen jeder Datei (im Dokumente-Tool) bereitstellen. Die Originaldatei wird durch die Alternative ersetzt, wenn sie von einer anderen URL aus angezeigt wird. Dies ermöglicht eine noch detailliertere Anpassung jeder URL, während Sie den Vorteil nutzen, dieselben Kurse mehrfach wiederzuverwenden.

*Standard: `false`*

### `default_document_quotum`

**Standard-Festplattenspeicher**

Wie viel Festplattenspeicher steht für einen Kurs zur Verfügung? Sie können das Kontingent für bestimmte Kurse überschreiben über: Plattformverwaltung > Kurse > bearbeiten

*Standard: `1000`*

### `default_group_quotum`

**Verfügbarer Festplattenspeicher für Gruppen**

Wie viel Festplattenspeicher steht standardmäßig für das Dokumente-Tool einer Gruppe zur Verfügung?

*Standard: `250`*

### `documents_custom_cloud_link_list`

**Strikte Host-Liste für Cloud-Links festlegen**

Das Dokumente-Tool kann Links zu Dateien in der Cloud integrieren. Die Liste der Cloud-Dienste ist auf eine fest codierte Liste beschränkt, aber Sie können das Array ‚links‘ definieren, das eine Liste Ihrer eigenen Dienste/URLs enthält. Die hier definierte Liste ersetzt die Standardliste.

### `documents_default_visibility_defined_in_course`

**Dokumentensichtbarkeit im Kurs definiert**

Die standardmäßige Dokumentensichtbarkeit für alle Kurse

*Standard: `false`*

### `documents_hide_download_icon`

**Download-Symbol für Dokumente ausblenden**

Im Dokumente-Tool das Download-Symbol für Benutzer ausblenden.

*Standard: `false`*

### `enable_x_sendfile_headers`

**X-Sendfile-Header aktivieren**

Aktivieren Sie dies, wenn Sie X-Sendfile auf Webserver-Ebene aktiviert haben und die erforderlichen Header hinzufügen möchten, damit Browser diese übernehmen.

*Standard: `false`*

### `group_category_document_access`

**Freigabeoptionen für Dokumente innerhalb von Gruppenkategorien aktivieren**

Wenn aktiviert, können Administratoren Zugriffs- und Freigabeberechtigungen für Dokumentgruppen nach Kategorie festlegen.

*Standard: `false`*

### `group_document_access`

**Freigabeoptionen für Gruppendokumente aktivieren**

Wenn aktiviert, können Freigabe- und Zugriffsberechtigungen auf Gruppenebene konfiguriert werden.

*Standard: `false`*

### `pdf_export_watermark_by_course`

**Wasserzeichen-Definition nach Kurs aktivieren**

Wenn diese Option aktiviert ist, können Lehrkräfte ihr eigenes Wasserzeichen für die Dokumente in ihren Kursen definieren.

*Standard: `false`*

### `pdf_export_watermark_enable`

**Wasserzeichen bei PDF-Export aktivieren**

Durch Aktivieren dieser Option können Sie ein Bild oder einen Text hochladen, der automatisch als Wasserzeichen zu allen PDF-Exporten von Dokumenten im System hinzugefügt wird.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-Wasserzeichentext**

Dieser Text wird als Wasserzeichen zu den Dokumentenexporten als PDF hinzugefügt.

### `permanently_remove_deleted_files`

**Gelöschte Dateien können nicht wiederhergestellt werden**

Das Löschen einer Datei im Dokumente-Tool löscht sie dauerhaft. Die Datei kann nicht wiederhergestellt werden.

*Standard: `false`*

### `permissions_for_new_directories`

**Berechtigungen für neue Verzeichnisse**

Die Möglichkeit, die Berechtigungseinstellungen für jedes neu erstellte Verzeichnis zu definieren, ermöglicht es Ihnen, die Sicherheit gegen Angriffe durch Hacker zu verbessern, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0770) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu bieten. Das angegebene Format verwendet die UNIX-Terminologie von Eigentümer-Gruppe-Andere mit Lese-Schreib-Ausführungsrechten.

*Standard: `0770`*

### `permissions_for_new_files`

**Berechtigungen für neue Dateien**

Die Möglichkeit, die Berechtigungseinstellungen für jede neu erstellte Datei zu definieren, ermöglicht es Ihnen, die Sicherheit gegen Angriffe durch Hacker zu verbessern, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0550) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu bieten. Das angegebene Format verwendet die UNIX-Terminologie von Eigentümer-Gruppe-Andere mit Lese-Schreib-Ausführungsrechten. Wenn Sie Oogie verwenden, stellen Sie sicher, dass der Benutzer, der LibreOffice startet, Dateien im Kursordner schreiben kann.

*Standard: `0660`*

### `send_notification_when_document_added`

**Benachrichtigung an Studierende senden, wenn ein Dokument hinzugefügt wird**

Immer wenn jemand ein neues Element im Dokumente-Tool erstellt, eine Benachrichtigung an die Benutzer senden.

*Standard: `false`*

---
### `show_default_folders`

**Standardordner mit Multimedia-Ressourcen im Dokumenten-Tool anzeigen**

Multimedia-Dateiordner, die standardmäßig bereitgestellte Dateien enthalten, organisiert in Kategorien wie Video, Audio, Bild und Flash-Animationen, die in Kursen verwendet werden können. Auch wenn Sie diese im Dokumenten-Tool unsichtbar machen, können Sie diese Ressourcen weiterhin im Web-Editor der Plattform nutzen.

*Default: `true`*

### `show_documents_preview`

**Dokumentenvorschau anzeigen**

Das Anzeigen von Vorschauen der Dokumente im Dokumenten-Tool verhindert das Laden einer neuen Seite nur zum Anzeigen eines Dokuments, kann jedoch bei einigen älteren Browsern oder Bildschirmen mit geringerer Breite instabil sein.

*Default: `false`*

### `show_users_folders`

**Benutzerordner im Dokumenten-Tool anzeigen**

Diese Option ermöglicht es Ihnen, Lehrern die Ordner anzuzeigen oder zu verbergen, die das System für jeden Benutzer generiert, der das Dokumenten-Tool besucht oder eine Datei über den Web-Editor sendet. Wenn Sie diese Ordner den Lehrern anzeigen, können sie diese für die Lernenden sichtbar machen oder nicht und jedem Lernenden einen spezifischen Bereich im Kurs zur Verfügung stellen, wo sie nicht nur Dokumente speichern, sondern auch Webseiten erstellen und bearbeiten, in PDF exportieren, Zeichnungen anfertigen, persönliche Webvorlagen erstellen, Dateien senden sowie Verzeichnisse und Dateien erstellen, verschieben und löschen und Sicherheitskopien ihrer Ordner anlegen können. Jeder Benutzer hat somit einen vollständigen Dokumenten-Manager. Beachten Sie auch, dass jeder Benutzer eine sichtbare Datei aus einem beliebigen Ordner im Dokumenten-Tool (unabhängig vom Eigentümer) in sein/ihr Portfolio oder den persönlichen Dokumentenbereich im sozialen Netzwerk kopieren kann, um sie in anderen Kursen zu verwenden.

*Default: `true`*

### `students_download_folders`

**Lernenden das Herunterladen von Verzeichnissen erlauben**

Ermöglicht Lernenden, ein komplettes Verzeichnis aus dem Dokumenten-Tool zu packen und herunterzuladen.

*Default: `true`*

### `students_export2pdf`

**Lernenden den Export von Webdokumenten ins PDF-Format in den Dokumenten- und Wiki-Tools erlauben**

Diese Funktion ist standardmäßig aktiviert, aber im Falle einer Serverüberlastung oder bei spezifischen Lernumgebungen möchten Sie sie möglicherweise für alle Kurse deaktivieren.

*Default: `true`*

### `thematic_pdf_orientation`

**PDF-Ausrichtung für Kursfortschritt**

Im Kursfortschritts-Tool können Sie ein PDF der verschiedenen Elemente drucken. Setzen Sie ‘portrait’ oder ‘landscape’ (technische Begriffe), um dies zu ändern.

*Default: `landscape`*

### `upload_extensions_blacklist`

**Blacklist - Einstellung**

Die Blacklist wird verwendet, um Dateierweiterungen zu filtern, indem Dateien entfernt (oder umbenannt) werden, deren Erweiterung in der untenstehenden Blacklist aufgeführt ist. Die Erweiterungen sollten ohne den führenden Punkt (.) und durch Semikolon (;) getrennt angegeben werden, wie im Folgenden: exe;com;bat;scr;php. Dateien ohne Erweiterung werden akzeptiert. Groß- und Kleinschreibung spielt keine Rolle.

### `upload_extensions_list_type`

**Art des Filterns bei Datei-Uploads**

Ob Sie die Blacklist- oder Whitelist-Filterung verwenden möchten. Weitere Details finden Sie in der Beschreibung der Blacklist oder Whitelist unten.

*Default: `blacklist`*

### `upload_extensions_replace_by`

**Ersatzerweiterung**

Geben Sie die Erweiterung ein, die Sie verwenden möchten, um gefährliche Erweiterungen zu ersetzen, die vom Filter erkannt wurden. Nur erforderlich, wenn Sie einen Filter durch Ersetzung ausgewählt haben.

*Default: `dangerous`*

### `upload_extensions_skip`

**Filterverhalten (überspringen/umbenennen)**

Wenn Sie „überspringen“ wählen, werden die durch die Blacklist oder Whitelist gefilterten Dateien nicht in das System hochgeladen. Wenn Sie „umbenennen“ wählen, wird ihre Erweiterung durch die in der Einstellung für den Erweiterungsersatz definierte ersetzt. Beachten Sie, dass Umbenennen Sie nicht wirklich schützt und zu Namenskonflikten führen kann, wenn mehrere Dateien mit demselben Namen, aber unterschiedlichen Erweiterungen existieren.

*Default: `true`*

### `upload_extensions_whitelist`

**Whitelist - Einstellung**

Die Whitelist wird verwendet, um Dateierweiterungen zu filtern, indem Dateien entfernt (oder umbenannt) werden, deren Erweiterung *NICHT* in der untenstehenden Whitelist aufgeführt ist. Dies gilt allgemein als sicherer, aber restriktiver Ansatz zur Filterung. Die Erweiterungen sollten ohne den führenden Punkt (.) und durch Semikolon (;) getrennt angegeben werden, wie im Folgenden: htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Dateien ohne Erweiterung werden akzeptiert. Groß- und Kleinschreibung spielt keine Rolle.

### `users_copy_files`

**Benutzern das Kopieren von Dateien aus einem Kurs in den persönlichen Dateibereich erlauben**

Ermöglicht Benutzern, Dateien aus einem Kurs in ihren persönlichen Dateibereich zu kopieren, der über das soziale Netzwerk oder den HTML-Editor sichtbar ist, wenn sie sich außerhalb eines Kurses befinden.

*Default: `true`*

### `video_features`

**Video-Funktionen**

Array von zusätzlichen Funktionen, die Sie für den Videoplayer in Chamilo aktivieren können. Optionen umfassen 'speed', wodurch Sie die Wiedergabegeschwindigkeit eines Videos ändern können.