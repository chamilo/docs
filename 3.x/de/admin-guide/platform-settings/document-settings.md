# Dokumenteinstellungen

Verhalten des Kurswerkzeugs **Dokumente** — Uploads, zulässige Erweiterungen, Freigabe und Vorlagen.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Dokumente**. Diese Kategorie enthält **30 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `access_url_specific_files`

**URL-spezifische Dateien aktivieren**

Wenn diese Funktion in einer Multi-URL-Konfiguration aktiviert ist, können Sie zur Haupt-URL wechseln und URL-spezifische Versionen beliebiger Dateien (im Dokumentenwerkzeug) bereitstellen. Die Originaldatei wird durch die Alternative ersetzt, sobald sie von einer anderen URL aus angezeigt wird. So können Sie jede URL noch weiter anpassen und gleichzeitig den Vorteil nutzen, dieselben Kurse mehrfach wiederzuverwenden.

*Standard: `false`*

### `default_document_quotum`

**Standardfestplattenspeicher**

Wie viel Festplattenspeicher steht einem Kurs zur Verfügung? Das Kontingent für einen bestimmten Kurs können Sie überschreiben über: Plattformadministration > Kurse > bearbeiten

*Standard: `1000`*


### `default_group_quotum`

**Verfügbarer Festplattenspeicher für Gruppen**

Wie viel Festplattenspeicher steht standardmäßig für das Dokumentenwerkzeug einer Gruppe zur Verfügung?

*Standard: `250`*


### `document_default_visibility_can_be_modified_in_course` **v3**

**Standardsichtbarkeit neuer Dokumente kann kursweise geändert werden**

Wenn diese Option aktiviert ist, können Lehrende in den Kurseinstellungen die Sichtbarkeit festlegen, die neuen Dokumenten ihres Kurses zugewiesen wird, anstelle des Plattformstandards.

*Standard: `false`*

Wenn dies aktiviert ist, erscheint in den Kurseinstellungen im Abschnitt **Dokumente** die Option **Standardsichtbarkeit für neue Dokumente**. Ein Kurs, für den kein Wert gewählt wurde, verwendet `document_default_visibility_on_creation`.

### `document_default_visibility_on_creation` **v3**

**Standardsichtbarkeit neuer Dokumente**

Sichtbarkeit, die einem neuen Dokument, Ordner oder einer hochgeladenen Datei zugewiesen wird, wenn eine Lehrkraft sie in einem Kurs erstellt. Lehrende können die Sichtbarkeit jedes Elements anschließend weiterhin ändern.

*Standard: `visible`*

### `documents_custom_cloud_link_list`

**Strikte Hostliste für Cloud-Links festlegen**

Das Dokumentenwerkzeug kann Links zu Dateien in der Cloud einbinden. Die Liste der Cloud-Dienste ist auf eine fest codierte Liste beschränkt, Sie können jedoch das Array ‚links‘ definieren, das eine eigene Liste von Diensten/URLs enthält. Die hier definierte Liste ersetzt die Standardliste.

### `documents_hide_download_icon`

**Download-Symbol für Dokumente ausblenden**

Blendet im Dokumentenwerkzeug das Download-Symbol für Benutzer aus.

*Standard: `false`*


### `enable_x_sendfile_headers`

**X-Sendfile-Header aktivieren**

Aktivieren Sie dies, wenn X-Sendfile auf Webserver-Ebene aktiviert ist und Sie die erforderlichen Header hinzufügen möchten, damit Browser sie erkennen.

*Standard: `false`*

### `group_category_document_access`

**Freigabeoptionen für Dokumente innerhalb einer Gruppenkategorie aktivieren**

Wenn diese Option aktiviert ist, können Administratoren den Dokumentenzugriff und die Freigabeberechtigungen für Dokumentengruppen nach Kategorie festlegen.

*Standard: `false`*


### `group_document_access`

**Freigabeoptionen für Gruppendokumente aktivieren**

Wenn diese Option aktiviert ist, können Dokumentenfreigabe und Zugriffsberechtigungen auf Gruppenebene konfiguriert werden.

*Standard: `false`*


### `pdf_export_watermark_by_course`

**Wasserzeichen-Definition nach Kurs aktivieren**

Wenn diese Option aktiviert ist, können Lehrende ein eigenes Wasserzeichen für die Dokumente in ihren Kursen festlegen.

*Standard: `false`*


### `pdf_export_watermark_enable`

**Wasserzeichen im PDF-Export aktivieren**

Wenn Sie diese Option aktivieren, können Sie ein Bild oder einen Text hochladen, der automatisch als Wasserzeichen zu allen PDF-Exporten von Dokumenten im System hinzugefügt wird.

*Standard: `false`*

### `pdf_export_watermark_text`

**PDF-Wasserzeichentext**

Dieser Text wird den als PDF exportierten Dokumenten als Wasserzeichen hinzugefügt.

### `permanently_remove_deleted_files`

**Gelöschte Dateien können nicht wiederhergestellt werden**

Das Löschen einer Datei im Dokumentenwerkzeug löscht sie dauerhaft. Die Datei kann nicht wiederhergestellt werden

*Standard: `false`*

### `permissions_for_new_directories`

**Berechtigungen für neue Verzeichnisse**

Die Möglichkeit, die Berechtigungseinstellungen festzulegen, die jedem neu erstellten Verzeichnis zugewiesen werden, verbessert die Sicherheit gegen Angriffe durch Hacker, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0770) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu bieten. Das angegebene Format verwendet die UNIX-Terminologie Owner-Group-Others mit den Berechtigungen Read-Write-Execute.

*Standard: `0770`*

### `permissions_for_new_files`

**Berechtigungen für neue Dateien**

Die Möglichkeit, die Berechtigungseinstellungen festzulegen, die jeder neu erstellten Datei zugewiesen werden, verbessert die Sicherheit gegen Angriffe durch Hacker, die gefährliche Inhalte auf Ihr Portal hochladen. Die Standardeinstellung (0550) sollte ausreichen, um Ihrem Server ein angemessenes Schutzniveau zu bieten. Das angegebene Format verwendet die UNIX-Terminologie Owner-Group-Others mit den Berechtigungen Read-Write-Execute. Wenn Sie Oogie verwenden, achten Sie darauf, dass der Benutzer, der LibreOffice startet, Dateien im Kursordner schreiben kann.

*Standard: `0660`*


### `send_notification_when_document_added`

**Benachrichtigung an Lernende senden, wenn ein Dokument hinzugefügt wird**

Immer wenn jemand ein neues Element im Dokumentenwerkzeug erstellt, wird eine Benachrichtigung an die Benutzer gesendet.

*Standard: `false`*


### `show_default_folders`

**Im Dokumentenwerkzeug alle Ordner anzeigen, die standardmäßig bereitgestellte Multimedia-Ressourcen enthalten**

Multimedia-Dateiordner mit standardmäßig bereitgestellten Dateien, geordnet nach den Kategorien Video, Audio, Bild und Flash-Animationen, zur Verwendung in ihren Kursen. Auch wenn Sie sie im Dokumentenwerkzeug unsichtbar machen, können Sie diese Ressourcen weiterhin im Web-Editor der Plattform verwenden.

*Standard: `true`*

### `show_documents_preview`

**Dokumentvorschau anzeigen**

Die Anzeige von Vorschauen der Dokumente im Dokumentenwerkzeug vermeidet das Laden einer neuen Seite nur zur Anzeige eines Dokuments, kann jedoch bei einigen älteren Browsern oder Bildschirmen mit geringerer Breite instabil sein.

*Standard: `false`*

### `show_users_folders`

**Benutzerordner im Dokumentenwerkzeug anzeigen**

Mit dieser Option können Sie Lehrkräften die Ordner anzeigen oder ausblenden, die das System für jeden Benutzer erzeugt, der das Dokumentenwerkzeug besucht oder eine Datei über den Web-Editor sendet. Wenn Sie diese Ordner den Lehrkräften anzeigen, können sie die Lernenden sichtbar machen oder nicht und jedem Lernenden einen eigenen Bereich im Kurs geben, in dem er nicht nur Dokumente speichern, sondern auch Webseiten erstellen und bearbeiten, nach PDF exportieren, Zeichnungen anfertigen, persönliche Webvorlagen erstellen, Dateien senden sowie Verzeichnisse und Dateien erstellen, verschieben und löschen und Sicherungskopien seiner Ordner anlegen kann. Jeder Kursteilnehmer verfügt über einen vollständigen Dokumentenmanager. Denken Sie außerdem daran, dass jeder Benutzer eine Datei, die in einem beliebigen Ordner des Dokumentenwerkzeugs sichtbar ist (unabhängig davon, ob er der Eigentümer ist oder nicht), in sein Portfolio oder seinen persönlichen Dokumentenbereich des sozialen Netzwerks kopieren kann, wo sie ihm zur Verwendung in anderen Kursen zur Verfügung steht.

*Standard: `true`*

### `students_download_folders`

**Lernenden das Herunterladen von Verzeichnissen erlauben**

Lernenden erlauben, ein vollständiges Verzeichnis aus dem Dokumentenwerkzeug zu packen und herunterzuladen

*Standard: `true`*


### `students_export2pdf`

**Lernenden den Export von Webdokumenten in das PDF-Format in den Werkzeugen Dokumente und Wiki erlauben**

Diese Funktion ist standardmäßig aktiviert, kann jedoch bei Serverüberlastung durch Missbrauch oder in bestimmten Lernumgebungen für alle Kurse deaktiviert werden.

*Standard: `true`*

### `thematic_pdf_orientation`

**PDF-Ausrichtung für den Kursfortschritt**

Im Werkzeug Kursfortschritt können Sie ein PDF der verschiedenen Elemente drucken. Setzen Sie „portrait“ oder „landscape“ (Fachbegriffe), um dies zu ändern.

*Standard: `landscape`*


### `upload_extensions_blacklist`

**Blacklist – Einstellung**

Die Blacklist wird verwendet, um Dateierweiterungen zu filtern, indem jede Datei entfernt (oder umbenannt) wird, deren Erweiterung in der untenstehenden Blacklist aufgeführt ist. Die Erweiterungen sollten ohne den führenden Punkt (.) und durch Semikolon (;) getrennt angegeben werden, wie folgt:  exe;com;bat;scr;php. Dateien ohne Erweiterung werden akzeptiert. Die Groß-/Kleinschreibung spielt keine Rolle.

### `upload_extensions_list_type`

**Art der Filterung bei Dokument-Uploads**

Ob Sie die Filterung per Blacklist oder Whitelist verwenden möchten. Weitere Einzelheiten finden Sie in der Beschreibung der Blacklist bzw. Whitelist unten.

*Standard: `blacklist`*


### `upload_extensions_replace_by`

**Ersatz-Erweiterung**

Geben Sie die Erweiterung ein, die Sie zum Ersetzen der vom Filter erkannten gefährlichen Erweiterungen verwenden möchten. Nur erforderlich, wenn Sie einen Filter durch Ersetzung ausgewählt haben.

*Standard: `dangerous`*


### `upload_extensions_skip`

**Filterverhalten (überspringen/umbenennen)**

Wenn Sie sich für das Überspringen entscheiden, werden die über die Blacklist oder Whitelist gefilterten Dateien nicht in das System hochgeladen. Wenn Sie sich für die Umbenennung entscheiden, wird ihre Erweiterung durch die in der Einstellung für die Ersatz-Erweiterung definierte Erweiterung ersetzt. Beachten Sie, dass eine Umbenennung Sie nicht wirklich schützt und zu Namenskollisionen führen kann, wenn mehrere Dateien mit demselben Namen, aber unterschiedlichen Erweiterungen vorhanden sind.

*Standard: `true`*

### `upload_extensions_whitelist`

**Whitelist – Einstellung**

Die Whitelist dient dazu, Dateierweiterungen zu filtern, indem jede Datei entfernt (oder umbenannt) wird, deren Erweiterung in der untenstehenden Whitelist *NICHT* enthalten ist. Sie gilt allgemein als sicherer, aber restriktiverer Ansatz zur Filterung. Die Erweiterungen sollten ohne führenden Punkt (.) angegeben und durch ein Semikolon (;) getrennt werden, wie im folgenden Beispiel:  htm;html;txt;doc;xls;ppt;jpg;jpeg;gif;sxw. Dateien ohne Erweiterung werden akzeptiert. Die Groß-/Kleinschreibung spielt keine Rolle.

### `users_copy_files`

**Benutzern erlauben, Dateien aus einem Kurs in Ihren persönlichen Dateibereich zu kopieren**

Ermöglicht Benutzern, Dateien aus einem Kurs in Ihren persönlichen Dateibereich zu kopieren, der über das soziale Netzwerk oder über den HTML-Editor sichtbar ist, wenn sie sich außerhalb eines Kurses befinden

*Standard: `true`*


### `video_features`

**Videofunktionen**

Array zusätzlicher Funktionen, die Sie für den Videoplayer in Chamilo aktivieren können. Zu den Optionen gehört 'speed', womit Sie die Wiedergabegeschwindigkeit eines Videos ändern können.