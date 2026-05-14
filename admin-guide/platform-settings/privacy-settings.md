# Datenschutzeinstellungen

Datenschutz- und Datenschutzkontrollen (im Stil der DSGVO) — Einwilligung, Datenexport, Anfragen zur Kontolöschung und Ähnliches.

Greifen Sie auf diese Einstellungen unter **Verwaltung > Konfigurationseinstellungen > Datenschutz** zu. Diese Kategorie enthält **6 Einstellungen**, die unten mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Standardeinstellungen der Plattform (`SettingsCurrentFixtures.php`) bereitgestellt werden.

> Der Variablenname im Code wird in Monospace angezeigt. Verwenden Sie ihn, wenn Sie über die API skripten oder wenn Sie diese Einstellungen auf globaler Ebene ändern möchten, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `data_protection_officer_email`

**E-Mail-Adresse des Datenschutzbeauftragten**

E-Mail-Adresse des benannten Datenschutzbeauftragten, die in den DSGVO-/Datenschutzabschnitten angezeigt wird.

### `data_protection_officer_name`

**Name des Datenschutzbeauftragten**

Vollständiger Name des benannten Datenschutzbeauftragten, der auf den Seiten zu persönlichen Daten und Datenschutz angezeigt wird.

### `data_protection_officer_role`

**Rolle des Datenschutzbeauftragten**

Berufsbezeichnung oder Rolle des benannten Datenschutzbeauftragten, die neben dem Namen in den Datenschutzinformationen angezeigt wird.

### `disable_change_user_visibility_for_public_courses`

**Deaktivieren der Sichtbarkeit von Tool-Benutzern in öffentlichen Kursen**

Verhindern Sie, dass jemand das 'Benutzer'-Tool in einem öffentlichen Kurs sichtbar macht.

*Standard: `true`*

### `disable_gdpr`

**DSGVO-Funktionen deaktivieren**

Wenn Sie Ihre Erklärung zum Schutz personenbezogener Daten bereits an anderer Stelle für Benutzer verwalten, können Sie diese Funktion sicher deaktivieren.

*Standard: `true`*

### `hide_user_field_from_list`

**Felder in der Benutzerliste im Kurs ausblenden**

Standardmäßig zeigen wir alle Daten der Benutzer im Benutzer-Tool im Kurs an. Dieses Array ermöglicht es Ihnen, festzulegen, welche Felder Sie nicht anzeigen möchten. Dies betrifft nur Hauptfelder (nicht zusätzliche Felder).