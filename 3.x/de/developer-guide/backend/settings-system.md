# Einstellungs-System

Die Konfiguration von Chamilo wird über eine Reihe von Einstellungsschemata verwaltet (rund 40, je nach Release unterschiedlich), die jeden konfigurierbaren Aspekt der Plattform definieren. Sie liegen in `src/CoreBundle/Settings/` — die genaue Liste dort ist die maßgebliche Quelle.

## Funktionsweise

Einstellungen werden:

1. **Definiert** in Schema-Klassen (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Gespeichert** in der Datenbank (Tabelle `settings_current`)
3. **Abgerufen** über den Dienst `SettingsManager`
4. **Verwaltet** über die administrative Weboberfläche

## Einstellungsschemata

Jede Schema-Datei definiert eine Kategorie von Einstellungen. Wichtige Schemata:

| Schema | Zweck |
|--------|---------|
| `PlatformSettingsSchema` | Institutionsdaten, Zeitzone, Servertyp, Portal-Funktionen |
| `SecuritySettingsSchema` | Anmeldeversuche, CAPTCHA, Passwortrichtlinie, HTTP-Header, 2FA |
| `RegistrationSettingsSchema` | Selbstregistrierung, Pflichtfelder, Auto-Einschreibung |
| `CourseSettingsSchema` | Standardwerte bei der Kurserstellung, Werkzeuge, Katalog |
| `SessionSettingsSchema` | Session-Standardwerte, Sichtbarkeit |
| `MailSettingsSchema` | E-Mail-Konfiguration, DKIM, Benachrichtigungen |
| `AiHelpersSettingsSchema` | KI-Anbieter, Funktionsumschalter je KI-Werkzeug |
| `ExerciseSettingsSchema` | Quiz-Bewertung, Feedback, Frageoptionen |
| `LearningPathSettingsSchema` | LP-Anzeige, Voraussetzungen, SCORM-Einstellungen |
| `DocumentSettingsSchema` | Upload-Limits, erlaubte Dateitypen, Speicherung |
| `DisplaySettingsSchema` | UI-Registerkarten, Seitenleistenelemente, Theme |
| `LanguageSettingsSchema` | Verfügbare Sprachen, Standard-Locale |
| `AdminSettingsSchema` | Admin-E-Mail, admin-spezifische Optionen |

## Zugriff auf Einstellungen

Im PHP-Code:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

In Templates:

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

## Struktur einer Einstellung

Jede Einstellung besitzt:

* **Namespace** — Die Schema-Kategorie (z. B. `platform`, `security`, `ai_helpers`)
* **Variable** — Der Einstellungsname (z. B. `site_name`, `allow_registration`)
* **Value** — Der aktuelle Wert
* **Type** — Datentyp (string, boolean, array usw.)

## Kursbezogene Einstellungen

Einige Einstellungen können auf Kursebene überschrieben werden. Diese sind in `src/CourseBundle/Settings/` definiert und umfassen:

* Übungseinstellungen pro Kurs
* Aufgabeneinstellungen pro Kurs
* KI-Funktionsumschalter pro Kurs

## Multi-URL-Einstellungen

In Multi-URL-Installationen können einige Einstellungen je Zugriffs-URL angepasst werden, sodass unterschiedliche Portal-Konfigurationen aus derselben Installation möglich sind.

Diese Einstellungen erscheinen mehrfach in der Tabelle `settings`, mit unterschiedlichen Werten für `access_url`. Standardmäßig sind alle Einstellungen mit `access_url=1` verknüpft.

## Hinzufügen einer neuen Einstellung

1. Die Einstellungsdefinition zur passenden Schema-Klasse hinzufügen
2. Einen Standardwert angeben
3. Bei Bedarf Datenbank-Migrationen ausführen
4. Auf die Einstellung über `SettingsManager` zugreifen