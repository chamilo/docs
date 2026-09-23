# Indstillingssystem

Chamilos konfiguration styres via et sæt indstillingsskemaer (omkring 40, varierende mellem udgivelser), der definerer alle konfigurerbare aspekter af platformen. De ligger i `src/CoreBundle/Settings/` — den nøjagtige liste dér er sandhedskilden.

## Sådan fungerer det

Indstillinger:

1. **Defineres** i skemaklasser (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Gemmes** i databasen (tabellen `settings_current`)
3. **Tilgås** via tjenesten `SettingsManager`
4. **Administreres** via administrationsgrænsefladen på nettet

## Indstillingsskemaer

Hver skemafil definerer en kategori af indstillinger. Vigtige skemaer:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Institutionsoplysninger, tidszone, servertype, portalfunktioner |
| `SecuritySettingsSchema` | Login-forsøg, CAPTCHA, adgangskodepolitik, HTTP-headere, 2FA |
| `RegistrationSettingsSchema` | Selvregistrering, obligatoriske felter, auto-tilmelding |
| `CourseSettingsSchema` | Standarder for kursusoprettelse, værktøjer, katalog |
| `SessionSettingsSchema` | Sessionsstandarder, synlighed |
| `MailSettingsSchema` | E-mailkonfiguration, DKIM, notifikationer |
| `AiHelpersSettingsSchema` | AI-udbydere, funktionskontakter pr. AI-værktøj |
| `ExerciseSettingsSchema` | Quiz-scoring, feedback, spørgsmålsindstillinger |
| `LearningPathSettingsSchema` | Visning af LP, forudsætninger, SCORM-indstillinger |
| `DocumentSettingsSchema` | Uploadgrænser, tilladte filtyper, lagring |
| `DisplaySettingsSchema` | UI-faner, sidepanel-elementer, tema |
| `LanguageSettingsSchema` | Tilgængelige sprog, standardlocale |
| `AdminSettingsSchema` | Administrator-e-mail, administratorspecifikke indstillinger |

## Adgang til indstillinger

I PHP-kode:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

I skabeloner:

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

## Indstillingsstruktur

Hver indstilling har:

* **Namespace** — Skemakategorien (f.eks. `platform`, `security`, `ai_helpers`)
* **Variable** — Indstillingens navn (f.eks. `site_name`, `allow_registration`)
* **Value** — Den aktuelle værdi
* **Type** — Datatype (streng, boolean, array osv.)

## Kursusniveau-indstillinger

Nogle indstillinger kan overstyres på kursusniveau. Disse defineres i `src/CourseBundle/Settings/` og omfatter:

* Øvelsesindstillinger pr. kursus
* Opgaveindstillinger pr. kursus
* AI-funktionskontakter pr. kursus

## Multi-URL-indstillinger

I multi-URL-opsætninger kan nogle indstillinger tilpasses pr. adgangs-URL, så der kan være forskellige portalkonfigurationer fra samme installation.

Disse indstillinger vises flere gange i tabellen `settings` med forskellige `access_url`-værdier. Som standard er alle indstillinger knyttet til `access_url=1`.

## Tilføjelse af en ny indstilling

1. Tilføj indstillingsdefinitionen til den relevante skemaklasse
2. Angiv en standardværdi
3. Kør databasemigrationer om nødvendigt
4. Tilgå indstillingen via `SettingsManager`