# Zertifikatseinstellungen

Standardwerte, die angewendet werden, wenn ein Lernender ein Zertifikat über das Notenbuch erhält.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Zertifikate** zu. Diese Kategorie enthält **9 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API Skripte erstellen oder diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_certificate_pdf_footer`

**Fußzeile zu PDF-Zertifikatsexporten hinzufügen**

Wenn aktiviert, wird eine Fußzeile zu PDF-Exporten von Zertifikaten hinzugefügt.

*Standard: `false`*

### `allow_general_certificate`

**Allgemeines Zertifikat aktivieren**

Ein allgemeines Zertifikat ist ein Zertifikat, das alle Errungenschaften des Benutzers in den von ihm besuchten Kursen zusammenfasst.

*Standard: `false`*

### `allow_public_certificates`

**Öffentliche Zertifikate erlauben**

Benutzerzertifikate können von nicht registrierten Benutzern eingesehen werden.

*Standard: `false`*

### `certificate_filter_by_official_code`

**Zertifikate nach offiziellem Code filtern**

Fügt einen Filter für den offiziellen Code der Studierenden zur Zertifikatsliste hinzu.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-Ausrichtung für Zertifikate**

Legen Sie ‘portrait’ oder ‘landscape’ (technische Begriffe) für PDF-Zertifikate fest.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Zertifikate: PDF-Exportlink für alle ausblenden**

Aktivieren Sie diese Option, um die Möglichkeit, Zertifikate als PDF zu exportieren, vollständig zu entfernen (für alle Benutzer). Wenn aktiviert, wird dies auch für Studierende ausgeblendet.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Zertifikate: Exportlink für Studierende ausblenden**

Wenn aktiviert, können Studierende ihre Zertifikate nicht als PDF exportieren. Diese Option ist verfügbar, da je nach der genauen HTML-Struktur der Zertifikatvorlage der PDF-Export von geringer Qualität sein kann. In diesem Fall ist es am besten, den Studierenden nur das HTML-Zertifikat anzuzeigen.

*Standard: `false`*

### `hide_my_certificate_link`

**Link ‘Mein Zertifikat’ ausblenden**

Blendet die Zertifikatsseite für Nicht-Admin-Benutzer aus.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Sitzungsadministratoren das Herunterladen privater Zertifikate erlauben**

Wenn aktiviert, können Sitzungsadministratoren Zertifikate herunterladen, auch wenn diese nicht öffentlich veröffentlicht sind.

*Standard: `false`*