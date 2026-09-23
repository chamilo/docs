# Inställningssystem

Chamilos konfiguration hanteras genom en uppsättning inställningsscheman (cirka 40 stycken, varierande mellan versioner) som definierar varje konfigurerbar aspekt av plattformen. De finns i `src/CoreBundle/Settings/` — den exakta listan där är sanningens källa.

## Så fungerar det

Inställningar:

1. **Definieras** i schemaklasser (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Lagras** i databasen (tabellen `settings_current`)
3. **Nås** via tjänsten `SettingsManager`
4. **Hanteras** via administrationsgränssnittet på webben

## Inställningsscheman

Varje schemafil definierar en kategori av inställningar. Viktiga scheman:

| Schema | Syfte |
|--------|---------|
| `PlatformSettingsSchema` | Institutionsinformation, tidszon, servertyp, portalens funktioner |
| `SecuritySettingsSchema` | Inloggningsförsök, CAPTCHA, lösenordspolicy, HTTP-huvuden, 2FA |
| `RegistrationSettingsSchema` | Självregistrering, obligatoriska fält, automatisk prenumeration |
| `CourseSettingsSchema` | Standardvärden vid kurskapande, verktyg, katalog |
| `SessionSettingsSchema` | Standardvärden för sessioner, synlighet |
| `MailSettingsSchema` | E-postkonfiguration, DKIM, aviseringar |
| `AiHelpersSettingsSchema` | AI-leverantörer, funktionsväxlar per AI-verktyg |
| `ExerciseSettingsSchema` | Poängsättning i quiz, återkoppling, frågealternativ |
| `LearningPathSettingsSchema` | Visning av LP, förkunskapskrav, SCORM-inställningar |
| `DocumentSettingsSchema` | Uppladdningsgränser, tillåtna filtyper, lagring |
| `DisplaySettingsSchema` | Flikar i användargränssnittet, sidofältsposter, tema |
| `LanguageSettingsSchema` | Tillgängliga språk, standardlocale |
| `AdminSettingsSchema` | Administratörens e-post, administratörsspecifika alternativ |

## Åtkomst till inställningar

I PHP-kod:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

I mallar:

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

## Inställningens struktur

Varje inställning har:

* **Namespace** — Schemakategorin (t.ex. `platform`, `security`, `ai_helpers`)
* **Variable** — Inställningens namn (t.ex. `site_name`, `allow_registration`)
* **Value** — Det aktuella värdet
* **Type** — Datatyp (string, boolean, array, osv.)

## Kursnivåinställningar

Vissa inställningar kan åsidosättas på kursnivå. Dessa definieras i `src/CourseBundle/Settings/` och omfattar:

* Övningsinställningar per kurs
* Inlämningsinställningar per kurs
* AI-funktionsväxlar per kurs

## Inställningar för flera URL:er

I installationer med flera URL:er kan vissa inställningar anpassas per åtkomst-URL, vilket möjliggör olika portalkonfigurationer från samma installation.

Dessa inställningar visas flera gånger i tabellen `settings`, med olika värden för `access_url`. Som standard är alla inställningar kopplade till `access_url=1`.

## Lägga till en ny inställning

1. Lägg till inställningsdefinitionen i lämplig schemaklass
2. Ange ett standardvärde
3. Kör databasmigreringar vid behov
4. Åtkom inställningen via `SettingsManager`