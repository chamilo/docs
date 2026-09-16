# Datenschutzeinstellungen

Datenschutz- und Datenschutzkontrollen (im Sinne der DSGVO) — Einwilligung, Datenexport, Anträge auf Kontolöschung und Ähnliches.

Diese Einstellungen finden Sie unter **Administration > Konfigurationseinstellungen > Datenschutz**. Diese Kategorie enthält **6 Einstellungen**, die nachfolgend mit dem Titel und dem Kommentar aufgeführt sind, wie sie in den Einstellungs-Fixtures der Plattform (`SettingsCurrentFixtures.php`) ausgeliefert werden.

> Der Variablenname im Code wird in Monospace dargestellt. Verwenden Sie ihn beim Skripten über die API oder wenn Sie diese Einstellungen global ändern müssen, indem Sie [`config/settings_override.yaml`](https://github.com/chamilo/chamilo-lms/wiki/Configurations#configsettings_overridesyaml) bearbeiten.

## Einstellungen

### `data_protection_officer_email`

**E-Mail-Adresse des Datenschutzbeauftragten**

E-Mail-Adresse des benannten Datenschutzbeauftragten, die in DSGVO-/Datenschutzbereichen angezeigt wird.

### `data_protection_officer_name`

**Name des Datenschutzbeauftragten**

Vollständiger Name des benannten Datenschutzbeauftragten, der auf Seiten zu personenbezogenen Daten und zum Datenschutz angezeigt wird.

### `data_protection_officer_role`

**Funktion des Datenschutzbeauftragten**

Berufsbezeichnung oder Funktion des benannten Datenschutzbeauftragten, die zusammen mit dem Namen in den Datenschutzinformationen angezeigt wird.

### `disable_change_user_visibility_for_public_courses`

**Sichtbarmachen der Werkzeugnutzer in öffentlichen Kursen deaktivieren**

Verhindert, dass jemand das Werkzeug „Benutzer“ in einem öffentlichen Kurs sichtbar macht.

*Standard: `true`*

### `disable_gdpr`

**DSGVO-Funktionen deaktivieren**

Wenn Sie Ihre Erklärung zum Schutz personenbezogener Daten gegenüber den Nutzern bereits an anderer Stelle verwalten, können Sie diese Funktion bedenkenlos deaktivieren.

*Standard: `true`*

### `hide_user_field_from_list`

**Felder in der Benutzerliste im Kurs ausblenden**

Standardmäßig werden alle Daten der Benutzer im Benutzerwerkzeug des Kurses angezeigt. Mit diesem Array können Sie festlegen, welche Felder nicht angezeigt werden sollen. Betrifft nur Hauptfelder (keine Extrafelder).