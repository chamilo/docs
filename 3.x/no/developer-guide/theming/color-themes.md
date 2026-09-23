# Fargetemaer

Chamilo 3.0 bruker et databasebasert fargetemasystem. Temaer administreres via admin-grensesnittet, lagres i databasen og skrives til disk som CSS-filer. De kan tilpasses per tilgangs-URL, slik at installasjoner med flere URL-er kan ha ulike visuelle identiteter.

## Datamodell

To entiteter styrer temasystemet:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | int | Primærnøkkel |
| `title` | string | Menneskelesbart navn |
| `slug` | string | Autogenerert fra `title` (f.eks. `"My Theme"` → `my-theme`); brukes som katalognavn i `var/themes/` |
| `variables` | array (JSON) | Kartlegging av CSS-egenskapsnavn → verdi (f.eks. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Knytter et `ColorTheme` til en `AccessUrl`. Den boolske flagget `active` markerer hvilket tema som er aktivt for den URL-en. Bare ett tema kan være aktivt per tilgangs-URL om gangen.

## Hvordan temaer lagres

Når et tema opprettes eller oppdateres via API-et, genererer `ColorThemeStateProcessor` CSS-filen og skriver den til Flysystem `themes_filesystem` (støttet av `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Den genererte `colors.css` pakker alle variabler inn i en `:root`-blokk:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Verdier er mellomromsseparerte RGB-kanaltripletter (ikke `rgb()`), noe som lar Tailwind sette sammen opasitetsvarianter som `bg-primary/50` uten ekstra konfigurasjon.

## Forrang ved temaoppløsning

`ThemeHelper::getVisualTheme()` avgjør hvilken temaslug som skal brukes på en gitt side, i denne rekkefølgen:

1. **Aktivt tema for gjeldende AccessUrl** — `AccessUrlRelColorTheme`-posten med `active = true`
2. **Brukervalgt tema** — temaet lagret på `User`-entiteten, hvis plattforminnstillingen `profile.user_selected_theme` er aktivert
3. **Kurstema** — kursinnstillingen `course_theme`, hvis plattforminnstillingen `course.allow_course_theme` er aktivert
4. **Læringsstitema** — LP-ens `$lp_theme_css`-verdi, hvis kursinnstillingen `allow_learning_path_theme` er aktivert
5. **Miljøvariabelen `THEME_FALLBACK`** — satt i `.env` som `THEME_FALLBACK='chamilo'`
6. **Standard** — `chamilo` (hardkodet som `ThemeHelper::DEFAULT_THEME`)

## Levering av ressurser

Temeressurser leveres av `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) under prefikset `/themes`.

| Rute | Formål |
|-------|---------|
| `GET /themes/{name}/{path}` | Lever en vilkårlig temeressurs (CSS, JS, bilder); faller tilbake til `chamilo`-temaet hvis den ikke finnes i det forespurte temaet |
| `GET /themes/{slug}/logo/{type}` | Lever foretrukket logo (`header` eller `email`), med SVG → PNG-tilbakefall |
| `POST /themes/{slug}/logos` | Last opp header-/e-postlogoer (SVG og/eller PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Slett en spesifikk logo |

Den generelle ressursruten (`/{name}/{path}`) faller automatisk tilbake til standardtemaet `chamilo` når en fil mangler i det forespurte temaet, slik at temaer bare trenger å inkludere filer de faktisk overstyrer.

## Hvordan temaer lastes i maler

Layoutmalen `head.html.twig` laster det aktive temaets ressurser via Twig-hjelpefunksjoner:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

De tre Twig-funksjonene (registrert i `ChamiloExtension`) løser ressursstien via `ThemeHelper` og bruker samme tilbakefallskjede som over:

| Funksjon | Returnerer |
|----------|---------|
| `theme_asset('path')` | URL til ressursen i det oppløste temaet |
| `theme_asset_link_tag('path')` | Fullstendig `<link rel="stylesheet">`-tagg |
| `theme_asset_script_tag('path')` | Fullstendig `<script src="...">`-tagg |
| `theme_asset_base64('path')` | Base64-kodet data-URI for ressursen |
| `theme_logo('header'\|'email')` | URL til den beste tilgjengelige logoen |

## API-endepunkter

Temabehandling eksponeres via API Platform REST API (kun administrator):

| Metode | Endepunkt | Formål |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Opprett et nytt tema |
| `PUT` | `/api/color_themes/{id}` | Oppdater et eksisterende tema |
| `POST` | `/api/access_url_rel_color_themes` | Knytt/aktiver et tema for en tilgangs-URL |
| `GET` | `/api/access_url_rel_color_themes` | List temaknytninger for gjeldende tilgangs-URL |

## Opprette et egendefinert tema

Den vanlige arbeidsflyten går via administrasjonsgrensesnittet (**Admin → Color Themes**), som kaller API-endepunktene ovenfor. For å opprette et tema programmatisk:

1. `POST /api/color_themes` med en JSON-kropp:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

Dette lagrer entiteten og skriver `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` for å knytte det til og aktivere det for gjeldende access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

For å legge til egendefinerte bilder (logo, favicon, bakgrunner), last dem opp via `POST /themes/{slug}/logos` eller plasser dem direkte i `var/themes/{slug}/images/`.

## Referanse for fargevariabler

Alle variabler som forventes av standard Tailwind-konfigurasjon:

| Variabel | Formål |
|----------|---------|
| `--color-primary-base` | Primær merkevarefarge |
| `--color-primary-gradient` | Mørkere gradientstopp for primær |
| `--color-primary-button-text` | Tekstfarge på primærknapper |
| `--color-primary-button-alternative-text` | Alternativ tekstfarge på primærknapper |
| `--color-secondary-base` | Sekundær aksentfarge |
| `--color-secondary-gradient` | Gradientstopp for sekundær |
| `--color-secondary-button-text` | Tekstfarge på sekundærknapper |
| `--color-tertiary-base` | Tertiærfarge |
| `--color-tertiary-gradient` | Gradientstopp for tertiær |
| `--color-tertiary-button-text` | Tekstfarge på tertiærknapper |
| `--color-success-base` | Farge for suksess-tilstand |
| `--color-success-gradient` | Gradientstopp for suksess |
| `--color-success-button-text` | Tekstfarge på suksessknapper |
| `--color-info-base` | Farge for info-tilstand |
| `--color-info-gradient` | Gradientstopp for info |
| `--color-info-button-text` | Tekstfarge på infoknapper |
| `--color-warning-base` | Farge for advarsel-tilstand |
| `--color-warning-gradient` | Gradientstopp for advarsel |
| `--color-warning-button-text` | Tekstfarge på advarselsknapper |
| `--color-danger-base` | Farge for fare-/feiltilstand |
| `--color-danger-gradient` | Gradientstopp for fare |
| `--color-danger-button-text` | Tekstfarge på fareknapper |
| `--color-form-base` | Aksentfarge for skjemaelementer |