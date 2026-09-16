# Instellingensysteem

De configuratie van Chamilo wordt beheerd via een reeks instellingenschema's (ongeveer 40, afhankelijk van de release) die elk configureerbaar aspect van het platform definiëren. Ze bevinden zich in `src/CoreBundle/Settings/` — de exacte lijst daar is de bron van waarheid.

## Hoe het werkt

Instellingen worden:

1. **Gedefinieerd** in schemaklassen (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Opgeslagen** in de database (tabel `settings_current`)
3. **Benaderd** via de service `SettingsManager`
4. **Beheerd** via de administratieve webinterface

## Instellingenschema's

Elk schemabestand definieert een categorie van instellingen. Belangrijke schema's:

| Schema | Doel |
|--------|---------|
| `PlatformSettingsSchema` | Instellinginformatie, tijdzone, servertype, portaalfunctionaliteit |
| `SecuritySettingsSchema` | Aanmeldpogingen, CAPTCHA, wachtwoordbeleid, HTTP-headers, 2FA |
| `RegistrationSettingsSchema` | Zelfregistratie, verplichte velden, automatisch inschrijven |
| `CourseSettingsSchema` | Standaardwaarden bij cursusaanmaak, tools, catalogus |
| `SessionSettingsSchema` | Standaardwaarden voor sessies, zichtbaarheid |
| `MailSettingsSchema` | E-mailconfiguratie, DKIM, meldingen |
| `AiHelpersSettingsSchema` | AI-providers, functie-schakelaars per AI-tool |
| `ExerciseSettingsSchema` | Quizscoring, feedback, vraagopties |
| `LearningPathSettingsSchema` | Weergave van leerpaden, vereisten, SCORM-instellingen |
| `DocumentSettingsSchema` | Uploadlimieten, toegestane bestandstypen, opslag |
| `DisplaySettingsSchema` | UI-tabbladen, zijbalkitems, thema |
| `LanguageSettingsSchema` | Beschikbare talen, standaardlocale |
| `AdminSettingsSchema` | Beheerders-e-mail, beheerdersspecifieke opties |

## Instellingen benaderen

In PHP-code:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

In templates:

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

## Structuur van een instelling

Elke instelling heeft:

* **Namespace** — De schemacategorie (bijv. `platform`, `security`, `ai_helpers`)
* **Variable** — De naam van de instelling (bijv. `site_name`, `allow_registration`)
* **Value** — De huidige waarde
* **Type** — Gegevenstype (string, boolean, array, enz.)

## Instellingen op cursusniveau

Sommige instellingen kunnen op cursusniveau worden overschreven. Deze zijn gedefinieerd in `src/CourseBundle/Settings/` en omvatten:

* Oefeninginstellingen per cursus
* Opdrachtinstellingen per cursus
* AI-functieschakelaars per cursus

## Multi-URL-instellingen

In multi-URL-omgevingen kunnen sommige instellingen per toegang-URL worden aangepast, zodat verschillende portaalconfiguraties vanuit dezelfde installatie mogelijk zijn.

Die instellingen verschijnen meerdere keren in de tabel `settings`, met verschillende waarden voor `access_url`. Standaard zijn alle instellingen gekoppeld aan `access_url=1`.

## Een nieuwe instelling toevoegen

1. Voeg de instellingsdefinitie toe aan de juiste schemaklasse
2. Geef een standaardwaarde op
3. Voer indien nodig databasemigraties uit
4. Benader de instelling via `SettingsManager`