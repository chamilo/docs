# Zertifikateinstellungen

Standardwerte, die angewendet werden, wenn ein Lernender ein Zertifikat aus dem Notenbuch erhält.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Zertifikate**. Diese Kategorie enthält **23 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, die in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Festbreitenschrift angezeigt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen auf globaler Ebene ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `add_certificate_pdf_footer`

**Fußzeile zu PDF-Zertifikatsexporten hinzufügen**

Wenn aktiviert, wird den PDF-Exporten von Zertifikaten eine Fußzeile hinzugefügt.

*Standard: `false`*

### `add_gradebook_certificates_cron_task_enabled` **v3**

**Automatische Zertifikatserzeugung bei WS-Aufruf**

Wenn aktiviert und bei Verwendung des Webservices WSCertificatesList stellt diese Option sicher, dass alle Zertifikate von den Benutzern erzeugt wurden, sofern sie in allen im Notenbuch definierten Elementen für alle Kurse und Sitzungen die ausreichende Punktzahl erreicht haben (dies kann erhebliche Verarbeitungsressourcen auf Ihrem Server beanspruchen).

*Standard: `false`*

### `allow_certificates_search` **v3**

**Zertifikatssuche zulassen**

Erlaubt Benutzern und Besuchern, erzeugte Zertifikate über das Menü in der oberen Leiste zu suchen.

*Standard: `false`*

### `allow_general_certificate`

**Allgemeines Zertifikat aktivieren**

Ein allgemeines Zertifikat ist ein Zertifikat, das alle Leistungen des Benutzers in den von ihm absolvierten Kursen zusammenfasst.

*Standard: `false`*

### `allow_public_certificates`

**Öffentliche Zertifikate zulassen**

Benutzerzertifikate können von nicht registrierten Benutzern eingesehen werden.

*Standard: `false`*

### `blockchain_verification_enabled`

**Signierte Zertifikate und optionale Verankerung im Sepolia-Testnet aktivieren**

Wenn aktiviert, kann ein Lernender die Veröffentlichung eines digital signierten Notenbuch-Zertifikatsnachweises genehmigen; ein Administrator kann ihn ausstellen oder widerrufen und optional den Fingerabdruck des Nachweises im Sepolia-Testnet verankern. Siehe [Verifizierung signierter Zertifikate](../maintenance/signed-certificate-verification.md).

*Standard: `false`*

### `certificate_filter_by_official_code`

**Zertifikate nach offiziellem Code filtern**

Fügt der Zertifikatsliste einen Filter auf den offiziellen Code der Studierenden hinzu.

*Standard: `false`*

### `certificate_pdf_orientation`

**PDF-Ausrichtung für Zertifikate**

Legen Sie „portrait“ oder „landscape“ (Fachbegriffe) für PDF-Zertifikate fest.

*Standard: `landscape`*

### `hide_certificate_export_link`

**Zertifikate: PDF-Exportlink für alle ausblenden**

Aktivieren, um die Möglichkeit, Zertifikate als PDF zu exportieren, vollständig zu entfernen (für alle Benutzer). Wenn aktiviert, schließt dies das Ausblenden für Studierende ein.

*Standard: `false`*

### `hide_certificate_export_link_students`

**Zertifikate: Exportlink für Studierende ausblenden**

Wenn aktiviert, können Studierende ihre Zertifikate nicht als PDF exportieren. Diese Option ist verfügbar, weil der PDF-Export je nach genauer HTML-Struktur der Zertifikatsvorlage von geringer Qualität sein kann. In diesem Fall ist es am besten, den Studierenden nur das HTML-Zertifikat anzuzeigen.

*Standard: `false`*

### `hide_my_certificate_link`

**Link „Mein Zertifikat“ ausblenden**

Blendet die Zertifikatsseite für Benutzer ohne Administratorrechte aus.

*Standard: `false`*

### `session_admin_can_download_all_certificates`

**Sitzungsadministratoren das Herunterladen privater Zertifikate erlauben**

Wenn aktiviert, können Sitzungsadministratoren Zertifikate herunterladen, auch wenn sie nicht öffentlich veröffentlicht sind.

*Standard: `false`*

### `transcript_enabled`

**Akademische Leistungsnachweise**

Aktiviert inoffizielle akademische Leistungsnachweise für Lernende und erlaubt autorisiertem Personal, digital signierte, widerrufbare offizielle Leistungsnachweise auszustellen. Der eigene Leistungsnachweis eines Benutzers erscheint unter `/transcript`. Siehe [Akademische Leistungsnachweise](../users/academic-transcripts.md).

*Standard: `false`*

### `transcript_program_title`

**Programmtitel des Leistungsnachweises**

Programm- oder Qualifikationsbezeichnung, die auf Leistungsnachweis-PDFs gedruckt wird.

*Standard: leer*

### `transcript_course_code_source`

**Kurscode des Leistungsnachweises**

Wählen Sie, welches Kursfeld den auf Leistungsnachweisen angezeigten Code liefert: Kurscode (`visual_code`) oder Abteilungsname (`department_name`).

*Standard: `visual_code`*

### `transcript_hours_extra_field`

**Feld für Kursstunden des Leistungsnachweises**

Variable des zusätzlichen Kursfelds, das die erforderlichen Stunden enthält. Leer lassen, um die Kursdauer zu verwenden.

*Standard: leer*

### `transcript_completed_hours_are_required_hours`

**Abgeschlossene Stunden des Leistungsnachweises sind die erforderlichen Stunden**

Wenn aktiviert, werden die erforderlichen Kursstunden als abgeschlossene Stunden angezeigt. Andernfalls spiegeln die abgeschlossenen Stunden die im Kurs erfasste Lernzeit wider.

*Standard: `false`*

### `transcript_student_number_extra_field`

**Feld für die Matrikelnummer des Leistungsnachweises**

Variable des zusätzlichen Benutzerfelds, das die Matrikelnummer des Lernenden enthält. Leer lassen, um diese Nummer wegzulassen.

*Standard: leer*

### `transcript_address_extra_fields`

**Adressfelder des Transcripts**

Kommagetrennte Variablen zusätzlicher Benutzerfelder, die an die Adresse der lernenden Person angehängt werden, z. B. Ort oder Postleitzahl.

*Standard: leer*

### `transcript_grading_scale`

**Notenskala des Transcripts**

Ein JSON-Array aus Mindestprozentsatz, Buchstabennote und Notenpunkten, geordnet vom höchsten zum niedrigsten Minimum. Beispiel: `{ "min": 90, "letter": "A", "points": 4.0 }`. Diese Zuordnung wird für die Buchstaben und den GPA des Transcripts verwendet.

*Standard: A (90% / 4), B (80% / 3), C (70% / 2), D (60% / 1), F (0% / 0)*

### `transcript_gpa_note`

**GPA-Hinweis des Transcripts**

Text, der unter dem GPA gedruckt wird und die Berechnung erläutert. Standardmäßig ist der GPA der **ungewichtete Durchschnitt** der Notenpunkte der im Transcript aufgeführten Kurse.

*Standard: `The GPA is the unweighted average of the grade points of the courses listed in this transcript.`*

### `transcript_signatory_name`

**Name der unterzeichnenden Person des Transcripts**

Name der institutionellen unterzeichnenden Person, der auf offiziellen Transcripts gedruckt wird. Eine Plattformadministration kann auf der Transcript-Seite eines Benutzers ein separates Unterschriftsbild hochladen.

*Standard: leer*

### `transcript_signatory_title`

**Titel der unterzeichnenden Person des Transcripts**

Amts- bzw. Funktionsbezeichnung der institutionellen unterzeichnenden Person auf offiziellen Transcripts.

*Standard: leer*

## Siehe auch

Zertifikate können nun eine Gültigkeitsdauer und ein Ablaufdatum erhalten, mit automatischen oder manuellen Ablauferinnerungen. Dies wird hier nicht konfiguriert — die Gültigkeitsdauer ist eine lehrendenorientierte Einstellung des Notenbuchs, und der Ein-/Aus-Schalter des Erinnerungs-Crons befindet sich in der Kategorie **Cron-Jobs**. Siehe [Zertifikate und Kompetenzen](../../teacher-guide/tracking-and-reporting/certificates-and-skills.md#certificate-validity-and-expiry) und [Einstellungen für Cron-Jobs](crons-settings.md#certificate-expiry-reminders).