# Einstellungssystem

Die Konfiguration von Chamilo wird durch eine Reihe von Einstellungsschemata (etwa 40, je nach Version unterschiedlich) verwaltet, die jeden konfigurierbaren Aspekt der Plattform definieren. Sie befinden sich in `src/CoreBundle/Settings/` — die genaue Liste dort ist die maßgebliche Quelle.

## Funktionsweise

Einstellungen werden:

1. **Definiert** in Schema-Klassen (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Gespeichert** in der Datenbank (Tabelle `settings_current`)
3. **Abgerufen** über den Dienst `SettingsManager`
4. **Verwaltet** über die Administrations-Weboberfläche

## Einstellungsschemata

Jede Schema-Datei definiert eine Kategorie von Einstellungen. Wichtige Schemata:

| Schema | Zweck |
|--------|-------|
| `PlatformSettingsSchema` | Institutionsinformationen, Zeitzone, Servertyp, Portal-Funktionen |
| `SecuritySettingsSchema` | Anmeldeversuche, CAPTCHA, Passwortrichtlinien, HTTP-Header, 2FA |
| `RegistrationSettingsSchema` | Selbstregistrierung, Pflichtfelder, automatische Anmeldung |
| `CourseSettingsSchema` | Standardeinstellungen für Kurse, Werkzeuge, Katalog |
| `SessionSettingsSchema` | Sitzungs-Standards, Sichtbarkeit |
| `MailSettingsSchema` | E-Mail-Konfiguration, DKIM, Benachrichtigungen |
| `AiHelpersSettingsSchema` | KI-Anbieter, Funktionsschalter pro KI-Tool |
| `ExerciseSettingsSchema` | Quiz-Bewertung, Feedback, Fragenoptionen |
| `LearningPathSettingsSchema` | LP-Anzeige, Voraussetzungen, SCORM-Einstellungen |
| `DocumentSettingsSchema` | Upload-Limits, erlaubte Dateitypen, Speicherung |
| `DisplaySettingsSchema` | UI-Tabs, Sidebar-Elemente, Theme |
| `LanguageSettingsSchema` | Verfügbare Sprachen, Standard-Sprachumgebung |
| `AdminSettingsSchema` | Admin-E-Mail, admin-spezifische Optionen |

## Zugriff auf Einstellungen

In PHP-Code:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

In Vorlagen:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## Struktur der Einstellungen

Jede Einstellung hat:

* **Namespace** — Die Schema-Kategorie (z. B. `platform`, `security`, `ai_helpers`)
* **Variable** — Der Name der Einstellung (z. B. `site_name`, `allow_registration`)
* **Wert** — Der aktuelle Wert
* **Typ** — Datentyp (String, Boolean, Array usw.)

## Kursspezifische Einstellungen

Einige Einstellungen können auf Kursebene überschrieben werden. Diese werden in `src/CourseBundle/Settings/` definiert und umfassen:

* Übungseinstellungen pro Kurs
* Aufgabeneinstellungen pro Kurs
* KI-Funktionsschalter pro Kurs

## Multi-URL-Einstellungen

In Multi-URL-Setups können einige Einstellungen pro Zugriffs-URL angepasst werden, was unterschiedliche Portal-Konfigurationen aus derselben Installation ermöglicht.

Diese Einstellungen erscheinen mehrfach in der Tabelle `settings` mit unterschiedlichen `access_url`-Werten. Standardmäßig sind alle Einstellungen mit `access_url=1` verknüpft.

## Hinzufügen einer neuen Einstellung

1. Fügen Sie die Einstellungsdefinition zur entsprechenden Schema-Klasse hinzu
2. Geben Sie einen Standardwert an
3. Führen Sie bei Bedarf Datenbankmigrationen durch
4. Greifen Sie auf die Einstellung über `SettingsManager` zu