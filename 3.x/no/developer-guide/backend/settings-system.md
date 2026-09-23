# Innstillingssystem

Chamilos konfigurasjon administreres gjennom et sett med innstillingsskjemaer (rundt 40 av dem, varierende mellom utgivelser) som definerer alle konfigurerbare aspekter ved plattformen. De ligger i `src/CoreBundle/Settings/` — den nøyaktige listen der er kilden til sannhet.

## Slik fungerer det

Innstillinger blir:

1. **Definert** i skjemaklasser (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **Lagret** i databasen (`settings_current`-tabellen)
3. **Aksessert** via `SettingsManager`-tjenesten
4. **Administrert** gjennom administrasjonsgrensesnittet på nett

## Innstillingsskjemaer

Hver skjemfil definerer en kategori av innstillinger. Viktige skjemaer:

| Schema | Purpose |
|--------|---------|
| `PlatformSettingsSchema` | Institusjonsinformasjon, tidssone, servertype, portalfunksjoner |
| `SecuritySettingsSchema` | Innloggingsforsøk, CAPTCHA, passordpolicy, HTTP-hoder, 2FA |
| `RegistrationSettingsSchema` | Selvregistrering, påkrevde felt, auto-abonnement |
| `CourseSettingsSchema` | Standardverdier for kursopprettelse, verktøy, katalog |
| `SessionSettingsSchema` | Standardverdier for økter, synlighet |
| `MailSettingsSchema` | E-postkonfigurasjon, DKIM, varsler |
| `AiHelpersSettingsSchema` | AI-leverandører, funksjonsbrytere per AI-verktøy |
| `ExerciseSettingsSchema` | Quiz-poenggiving, tilbakemelding, spørsmålsalternativer |
| `LearningPathSettingsSchema` | LP-visning, forutsetninger, SCORM-innstillinger |
| `DocumentSettingsSchema` | Opplastingsgrenser, tillatte filtyper, lagring |
| `DisplaySettingsSchema` | UI-faner, sideelementer, tema |
| `LanguageSettingsSchema` | Tilgjengelige språk, standard locale |
| `AdminSettingsSchema` | Administrator-e-post, administratorspesifikke alternativer |

## Tilgang til innstillinger

I PHP-kode:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

I maler:

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

## Innstillingsstruktur

Hver innstilling har:

* **Namespace** — Skjemakategorien (f.eks. `platform`, `security`, `ai_helpers`)
* **Variable** — Innstillingsnavnet (f.eks. `site_name`, `allow_registration`)
* **Value** — Gjeldende verdi
* **Type** — Datatype (string, boolean, array, osv.)

## Kursnivåinnstillinger

Noen innstillinger kan overstyres på kursnivå. Disse er definert i `src/CourseBundle/Settings/` og omfatter:

* Øvelsesinnstillinger per kurs
* Oppgaveinnstillinger per kurs
* AI-funksjonsbrytere per kurs

## Multi-URL-innstillinger

I multi-URL-oppsett kan noen innstillinger tilpasses per tilgangs-URL, slik at ulike portalkonfigurasjoner kan brukes fra samme installasjon.

Disse innstillingene vises flere ganger i `settings`-tabellen, med ulike `access_url`-verdier. Som standard er alle innstillinger knyttet til `access_url=1`.

## Legge til en ny innstilling

1. Legg innstillingsdefinisjonen til den aktuelle skjemaklassen
2. Angi en standardverdi
3. Kjør databasemigreringer om nødvendig
4. Aksesser innstillingen via `SettingsManager`