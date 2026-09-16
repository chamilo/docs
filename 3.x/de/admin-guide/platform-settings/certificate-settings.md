# Zertifikatseinstellungen

Standardeinstellungen, die gelten, wenn ein Lernender ein Zertifikat aus dem Notenbuch erhält.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Zertifikate**. Diese Kategorie enthält **11 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code ist in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_certificate_pdf_footer`

**Fußzeile zu PDF-Zertifikatsexporten hinzufügen**

Wenn aktiviert, wird den PDF-Exporten von Zertifikaten eine Fußzeile hinzugefügt.

*Standard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatische Zertifikatsgenerierung bei WS-Aufruf**

Wenn aktiviert und der Webservice WSCertificatesList verwendet wird, stellt diese Option sicher, dass alle Zertifikate von den Nutzern generiert wurden, sofern sie in allen im Notenbuch definierten Elementen für alle Kurse und Sitzungen die ausreichende Punktzahl erreicht haben (dies kann erhebliche Verarbeitungsressourcen auf Ihrem Server beanspruchen).

*Standard: `false`*

### `allow_certificates_search` **v3**

**Zertifikatssuche zulassen**

Erlaubt Nutzern und Besuchern, generierte Zertifikate über das Menü in der oberen Leiste zu suchen.

*Standard: `false`*

### `allow_general_certificate`

**Allgemeines Zertifikat aktivieren**

Ein allgemeines Zertifikat ist ein Zertifikat, das alle Leistungen des Nutzers in den von ihm besuchten Kursen zusammenfasst.

*Standard: `false`*

### `allow_public_certificates`

**Öffentliche Zertifikate zulassen**

Nutzerzertifikate können von nicht registrierten Nutzern eingesehen werden.

*Standard: `false`*

### `certificate_filter_by_official_code`

**Zertifikate nach offiziellem Code filtern**

Fügt der Zertifikatsliste einen Filter nach dem offiziellen Code der Studierenden hinzu.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-Ausrichtung für Zertifikate**

Legen Sie ‚portrait‘ oder ‚landscape‘ (technische Begriffe) für PDF-Zertifikate fest.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Zertifikate: PDF-Exportlink für alle ausblenden**

Aktivieren, um die Möglichkeit zum Export von Zertifikaten als PDF vollständig zu entfernen (für alle Nutzer). Wenn aktiviert, gilt dies auch für das Ausblenden gegenüber Studierenden.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Zertifikate: Exportlink für Studierende ausblenden**

Wenn aktiviert, können Studierende ihre Zertifikate nicht als PDF exportieren. Diese Option ist verfügbar, weil der PDF-Export je nach genauer HTML-Struktur der Zertifikatsvorlage von geringer Qualität sein kann. In diesem Fall ist es am besten, den Studierenden nur das HTML-Zertifikat anzuzeigen.

*Standard: `false`*

### `hide_my_certificate_link`

**Link ‚Mein Zertifikat‘ ausblenden**

Blendet die Zertifikatsseite für Nicht-Administratoren aus.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Sitzungsadministratoren das Herunterladen privater Zertifikate erlauben**

Wenn aktiviert, können Sitzungsadministratoren Zertifikate herunterladen, auch wenn diese nicht öffentlich veröffentlicht sind.

*Standard: `false`*

## Siehe auch

Zertifikaten kann nun eine Gültigkeitsdauer und ein Ablaufdatum zugewiesen werden, mit automatischen oder manuellen Ablauf-Erinnerungen. Dies wird hier nicht konfiguriert — die Gültigkeitsdauer ist eine lehrendenbezogene Notenbuch-Einstellung, und der Ein-/Ausschalter für den Erinnerungs-Cron befindet sich in der Kategorie **Cron-Jobs**. Siehe [Zertifikate und Kompetenzen](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) und [Cron-Job-Einstellungen](crons-settings.md#certificate-expiry-reminders).