# Dokumente-Einstellungen

Verhalten des Kurswerkzeugs **Dokumente** — Uploads, zulässige Dateierweiterungen, Freigabe und Vorlagen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Dokumente**. Diese Kategorie enthält **29 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) mitgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `access_url_specific_files`

**URL-spezifische Dateien aktivieren**

Wenn diese Funktion in einer Multi-URL-Konfiguration aktiviert ist, können Sie zur Haupt-URL wechseln und URL-spezifische Versionen beliebiger Dateien (im Dokumente-Werkzeug) bereitstellen. Die Originaldatei wird durch die Alternative ersetzt, sobald sie von einer anderen URL aus betrachtet wird. So können Sie jede URL noch weiter anpassen und gleichzeitig denselben Kurs mehrfach wiederverwenden.

*Standard: `false`*

### `default_document_quotum`

**Standard-Festplattenspeicher**

Wie viel Speicherplatz steht einem Kurs zur Verfügung? Das Kontingent für einen bestimmten Kurs können Sie überschreiben über: Plattformadministration > Kurse > bearbeiten

*Standard: `1000`*


### `default_group_quotum`

**Verfügbarer Gruppenspeicherplatz**

Wie viel Festplattenspeicher steht standardmäßig für das Dokumente-Werkzeug einer Gruppe zur Verfügung?

*Standard: `250`*


### `documents_custom_cloud_link_list`

**Strikte Host-Liste für Cloud-Links festlegen**

Das Dokumente-Werkzeug kann Links zu Dateien in der Cloud einbinden. Die Liste der Cloud-Dienste ist auf eine fest kodierte Liste beschränkt, Sie können jedoch das Array ‚links‘ definieren, das eine eigene Liste von Diensten/URLs enthält. Die hier definierte Liste ersetzt die Standardliste.

### `documents_default_visibility_defined_in_course`

**Dokumentensichtbarkeit im Kurs definiert**

Die Standard-Dokumentensichtbarkeit für alle Kurse

*Standard: `false`*

### `documents_hide_download_icon`

**Download-Symbol für Dokumente ausblenden**

Im Dokumente-Werkzeug das Download-Symbol für Benutzer ausblenden.

*Standard: `false`*


### `enable_x_sendfile_headers`

**X-sendfile-Header aktivieren**

Aktivieren Sie dies, wenn X-sendfile auf Webserver-Ebene aktiviert ist und Sie die erforderlichen Header hinzufügen möchten, damit Browser sie übernehmen.

*Standard: `false`*

### `group_category_document_access`

**Freigabeoptionen für Dokumente innerhalb einer Gruppenkategorie aktivieren**

Wenn aktiviert, können Administratoren Dokumentenzugriff und Freigabeberechtigungen für Dokumentengruppen nach Kategorie festlegen.

*Standard: `false`*


### `group_document_access`

**Freigabeoptionen für Gruppendokumente aktivieren**

Wenn aktiviert, können Dokumentenfreigabe und Zugriffsberechtigungen auf Gruppenebene konfiguriert werden.

*Standard: `false`*


### `pdf_export_watermark_by_course`

**Wasserzeichen-Definition pro Kurs aktivieren**

Wenn diese Option aktiviert ist, können Lehrende ein eigenes Wasserzeichen für die Dokumente in ihren Kursen definieren.

*Standard: `false`*


### `pdf_export_watermark_enable`

**Wasserzeichen im PDF-Export aktivieren**

Durch Aktivieren dieser Option können Sie ein Bild oder einen Text hochladen, der automatisch als Wasserzeichen zu allen PDF-Exporten von Dokumenten im System hinzugefügt wird.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-Wasserzeichentext**

Dieser Text wird als Wasserzeichen zu den Dokumentenexporten als PDF hinzugefügt.

### `permanently_remove_deleted_files`

**Gelöschte Dateien können nicht wiederhergestellt werden**

Das Löschen einer Datei im Dokumente-Werkzeug löscht sie dauerhaft. Die Datei kann nicht wiederhergestellt werden

*Standard: `false`*

### `permissions_for_new_directories`

**Berechtigungen für neue Verzeichnisse**

Die Möglichkeit, die Berechtigungseinstellungen für jedes neu erstellte Verzeichnis festzulegen, verbessert die Sicherheit gegen Angriffe durch Hacker, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0770) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu geben. Das verwendete Format folgt der UNIX-Terminologie Owner-Group-Others mit Read-Write-Execute-Berechtigungen.

*Standard: `0770`*


### `permissions_for_new_files`

**Berechtigungen für neue Dateien**

Die Möglichkeit, die Berechtigungseinstellungen für jede neu erstellte Datei festzulegen, verbessert die Sicherheit gegen Angriffe durch Hacker, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0550) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu geben. Das verwendete Format folgt der UNIX-Terminologie Owner-Group-Others mit Read-Write-Execute-Berechtigungen. Wenn Sie Oogie verwenden, achten Sie darauf, dass der Benutzer, der LibreOffice startet, Dateien im Kursordner schreiben kann.

*Standard: `0660`*


### `send_notification_when_document_added`

**Benachrichtigung an Lernende senden, wenn ein Dokument hinzugefügt wird**

Immer wenn jemand ein neues Element im Dokumente-Werkzeug erstellt, eine Benachrichtigung an die Benutzer senden.

*Standard: `false`*

### `show_default_folders`

**Im Dokumenten-Werkzeug alle Ordner mit standardmäßig bereitgestellten Multimedia-Ressourcen anzeigen**

Multimedia-Dateordner mit standardmäßig bereitgestellten Dateien, organisiert in den Kategorien Video, Audio, Bild und Flash-Animationen zur Verwendung in den Kursen. Auch wenn Sie sie im Dokumenten-Werkzeug unsichtbar machen, können Sie diese Ressourcen weiterhin im Web-Editor der Plattform verwenden.

*Standard: `true`*

### `show_documents_preview`

**Dokumentenvorschau anzeigen**

Das Anzeigen von Vorschauen der Dokumente im Dokumenten-Werkzeug vermeidet das Laden einer neuen Seite nur zur Anzeige eines Dokuments, kann jedoch bei älteren Browsern oder Bildschirmen mit geringerer Breite instabil sein.

*Standard: `false`*

### `show_users_folders`

**Benutzerordner im Dokumenten-Werkzeug anzeigen**

Diese Option ermöglicht es Ihnen, den Lehrenden die Ordner anzuzeigen oder zu verbergen, die das System für jeden Benutzer erzeugt, der das Dokumenten-Werkzeug besucht oder eine Datei über den Web-Editor sendet. Wenn Sie diese Ordner den Lehrenden anzeigen, können diese sie für die Lernenden sichtbar oder unsichtbar machen und jedem Lernenden einen eigenen Bereich im Kurs geben, in dem nicht nur Dokumente gespeichert, sondern auch Webseiten erstellt und bearbeitet, nach PDF exportiert, Zeichnungen angefertigt, persönliche Web-Vorlagen erstellt, Dateien gesendet sowie Verzeichnisse und Dateien erstellt, verschoben und gelöscht und Sicherheitskopien der eigenen Ordner angelegt werden können. Jeder Benutzer des Kurses verfügt damit über eine vollständige Dokumentenverwaltung. Denken Sie außerdem daran, dass jeder Benutzer eine Datei, die in einem beliebigen Ordner des Dokumenten-Werkzeugs sichtbar ist (unabhängig davon, ob er der Eigentümer ist oder nicht), in sein Portfolio oder den persönlichen Dokumentenbereich des sozialen Netzwerks kopieren kann, sodass sie in anderen Kursen verfügbar ist.

*Standard: `true`*

### `students_download_folders`

**Lernenden das Herunterladen von Verzeichnissen erlauben**

Lernenden erlauben, ein vollständiges Verzeichnis aus dem Dokumenten-Werkzeug zu packen und herunterzuladen

*Standard: `true`*


### `students_export2pdf`

**Lernenden den Export von Web-Dokumenten ins PDF-Format in den Werkzeugen Dokumente und Wiki erlauben**

Diese Funktion ist standardmäßig aktiviert, kann jedoch bei Überlastung des Servers durch Missbrauch oder in speziellen Lernumgebungen für alle Kurse deaktiviert werden.

*Standard: `true`*

### `thematic_pdf_orientation`

**PDF-Ausrichtung für den Kursfortschritt**

Im Werkzeug Kursfortschritt können Sie ein PDF der verschiedenen Elemente drucken. Setzen Sie ‚portrait‘ oder ‚landscape‘ (technische Begriffe), um dies zu ändern.

*Standard: `landscape`*


### `upload_extensions_blacklist`

**Blacklist – Einstellung**

Die Blacklist wird verwendet, um Dateierweiterungen zu filtern, indem jede Datei entfernt (oder umbenannt) wird, deren Erweiterung in der untenstehenden Blacklist steht. Die Erweiterungen sollten ohne den führenden Punkt (.) und durch Semikolon (;) getrennt angegeben werden, wie folgt:  exe;com;bat;scr;php. Dateien ohne Erweiterung werden akzeptiert. Die Groß-/Kleinschreibung spielt keine Rolle.

### `upload_extensions_list_type`

**Art der Filterung bei Dokument-Uploads**

Ob Sie die Blacklist- oder die Whitelist-Filterung verwenden möchten. Siehe die Beschreibung von Blacklist bzw. Whitelist unten für weitere Details.

*Standard: `blacklist`*


### `upload_extensions_replace_by`

**Ersatz-Erweiterung**

Geben Sie die Erweiterung ein, die Sie zum Ersetzen der vom Filter erkannten gefährlichen Erweiterungen verwenden möchten. Nur erforderlich, wenn Sie einen Filter durch Ersetzung gewählt haben.

*Standard: `dangerous`*


### `upload_extensions_skip`

**Filterverhalten (überspringen/umbenennen)**

Wenn Sie überspringen wählen, werden die über die Blacklist oder Whitelist gefilterten Dateien nicht ins System hochgeladen. Wenn Sie sie umbenennen, wird ihre Erweiterung durch die in der Einstellung zur Erweiterungsersetzung definierte ersetzt. Beachten Sie, dass Umbenennen Sie nicht wirklich schützt und zu Namenskollisionen führen kann, wenn mehrere Dateien mit demselben Namen, aber unterschiedlichen Erweiterungen existieren.

*Standard: `true`*


### `upload_extensions_whitelist`

**Whitelist – Einstellung**

Die Whitelist wird verwendet, um Dateierweiterungen zu filtern, indem jede Datei entfernt (oder umbenannt) wird, deren Erweiterung *NICHT* in der untenstehenden Whitelist steht. Dies gilt allgemein als sicherer, aber restriktiverer Filteransatz. Die Erweiterungen sollten ohne den führenden Punkt (.) und durch Semikolon (;) getrennt angegeben werden, wie folgt:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Dateien ohne Erweiterung werden akzeptiert. Die Groß-/Kleinschreibung spielt keine Rolle.

### `users_copy_files`

**Benutzern das Kopieren von Dateien aus einem Kurs in den persönlichen Dateibereich erlauben**

Ermöglicht Benutzern, Dateien aus einem Kurs in den persönlichen Dateibereich zu kopieren, sichtbar über das soziale Netzwerk oder über den HTML-Editor, wenn sie sich außerhalb eines Kurses befinden

*Standard: `true`*


### `video_features`

**Video-Funktionen**

Array zusätzlicher Funktionen, die Sie für den Videoplayer in Chamilo aktivieren können. Zu den Optionen gehört ‚speed‘, womit Sie die Wiedergabegeschwindigkeit eines Videos ändern können.