# Instellingensysteem

De configuratie van Chamilo wordt beheerd via een reeks instellingenschema's (ongeveer 40, afhankelijk van de release) die elk configureerbaar aspect van het platform definiëren. Deze bevinden zich in `src/CoreBundle/Settings/` — de exacte lijst daar is de bron van waarheid.

## Hoe het werkt

Instellingen worden:

1. **Gedefinieerd** in schemaklassen (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Opgeslagen** in de database (tabel `settings_current`)
3. **Benaderd** via de `SettingsManager`-service
4. **Beheerd** via de administratieve webinterface

## Instellingenschema's

Elk schemabestand definieert een categorie van instellingen. Belangrijke schema's:

| Schema | Doel |
|--------|------|
| `PlatformSettingsSchema` | Instellingsinformatie, tijdzone, servertype, portaalfuncties |
| `SecuritySettingsSchema` | Inlogpogingen, CAPTCHA, wachtwoordbeleid, HTTP-headers, 2FA |
| `RegistrationSettingsSchema` | Zelfregistratie, verplichte velden, automatische inschrijving |
| `CourseSettingsSchema` | Standaardinstellingen voor cursuscreatie, tools, catalogus |
| `SessionSettingsSchema` | Standaardinstellingen voor sessies, zichtbaarheid |
| `MailSettingsSchema` | E-mailconfiguratie, DKIM, meldingen |
| `AiHelpersSettingsSchema` | AI-aanbieders, functietoggles per AI-tool |
| `ExerciseSettingsSchema` | Quizscoring, feedback, vraagopties |
| `LearningPathSettingsSchema` | Weergave van leerpaden, vereisten, SCORM-instellingen |
| `DocumentSettingsSchema` | Uploadlimieten, toegestane bestandstypen, opslag |
| `DisplaySettingsSchema` | UI-tabbladen, zijbalkitems, thema |
| `LanguageSettingsSchema` | Beschikbare talen, standaardtaal |
| `AdminSettingsSchema` | E-mail van beheerder, beheerderspecifieke opties |

## Toegang tot instellingen

In PHP-code:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

In sjablonen:

```twig
{# Een enkele instelling lezen #}
{{ chamilo_settings_get('platform.site_name') }}

{# Controleren of een instelling bestaat #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Alle instellingen als een array ophalen #}
{% set settings = chamilo_settings_all() %}
```

## Structuur van instellingen

Elke instelling heeft:

* **Namespace** — De schemacategorie (bijv. `platform`, `security`, `ai_helpers`)
* **Variabele** — De naam van de instelling (bijv. `site_name`, `allow_registration`)
* **Waarde** — De huidige waarde
* **Type** — Gegevenstype (string, boolean, array, enz.)

## Instellingen op cursusniveau

Sommige instellingen kunnen op cursusniveau worden overschreven. Deze worden gedefinieerd in `src/CourseBundle/Settings/` en omvatten:

* Oefeninstellingen per cursus
* Opdrachtinstellingen per cursus
* AI-functietoggles per cursus

## Multi-URL-instellingen

In multi-URL-opstellingen kunnen sommige instellingen per toegang-URL worden aangepast, waardoor verschillende portaalconfiguraties mogelijk zijn vanuit dezelfde installatie.

Deze instellingen verschijnen meerdere keren in de `settings`-tabel, met verschillende `access_url`-waarden. Standaard zijn alle instellingen gekoppeld aan `access_url=1`.

## Een nieuwe instelling toevoegen

1. Voeg de instellingsdefinitie toe aan de juiste schemaklasse
2. Geef een standaardwaarde op
3. Voer database-migraties uit indien nodig
4. Benader de instelling via `SettingsManager`