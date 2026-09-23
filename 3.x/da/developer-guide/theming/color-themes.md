# Farvetemaer

Chamilo 3.0 bruger et databasebaseret farvetemasystem. Temaer administreres via administrationsgrænsefladen, gemmes i databasen og skrives til disk som CSS-filer. De kan tilpasses pr. adgangs-URL, så installationer med flere URL'er kan have forskellige visuelle identiteter.

## Datamodel

To entiteter styrer temasystemet:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Felt | Type | Beskrivelse |
|-------|------|-------------|
| `id` | int | Primærnøgle |
| `title` | string | Menneskelæseligt navn |
| `slug` | string | Autogenereret fra `title` (f.eks. `"My Theme"` → `my-theme`); bruges som mappenavn i `var/themes/` |
| `variables` | array (JSON) | Kortlægning af CSS-egenskabsnavn → værdi (f.eks. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Knytter et `ColorTheme` til en `AccessUrl`. Det booleske flag `active` angiver, hvilket tema der aktuelt er aktivt for den pågældende URL. Kun ét tema kan være aktivt pr. adgangs-URL ad gangen.

## Hvordan temaer gemmes

Når et tema oprettes eller opdateres via API'et, genererer `ColorThemeStateProcessor` CSS-filen og skriver den til Flysystem `themes_filesystem` (understøttet af `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Den genererede `colors.css` indpakker alle variabler i en `:root`-blok:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Værdierne er mellemrumsseparerede RGB-kanaltripletter (ikke `rgb()`), hvilket gør det muligt for Tailwind at sammensætte opacitetvarianter som `bg-primary/50` uden yderligere konfiguration.

## Forrang ved temaopløsning

`ThemeHelper::getVisualTheme()` afgør, hvilket temaslug der skal anvendes på en given side, i denne rækkefølge:

1. **Aktivt tema for den aktuelle AccessUrl** — posten `AccessUrlRelColorTheme` med `active = true`
2. **Brugervalgt tema** — temaet gemt på `User`-entiteten, hvis platformindstillingen `profile.user_selected_theme` er aktiveret
3. **Kurstema** — kursusindstillingen `course_theme`, hvis platformindstillingen `course.allow_course_theme` er aktiveret
4. **Læringsstitema** — LP'ens `$lp_theme_css`-værdi, hvis kursusindstillingen `allow_learning_path_theme` er aktiveret
5. **Miljøvariablen `THEME_FALLBACK`** — sat i `.env` som `THEME_FALLBACK='chamilo'`
6. **Standard** — `chamilo` (hardkodet som `ThemeHelper::DEFAULT_THEME`)

## Levering af aktiver

Temaaktiver leveres af `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) under præfikset `/themes`.

| Rute | Formål |
|-------|---------|
| `GET /themes/{name}/{path}` | Lever et vilkårligt temaaktiv (CSS, JS, billeder); falder tilbage til `chamilo`-temaet, hvis det ikke findes i det anmodede tema |
| `GET /themes/{slug}/logo/{type}` | Lever det foretrukne logo (`header` eller `email`), med SVG → PNG-tilbagefald |
| `POST /themes/{slug}/logos` | Upload header-/e-maillogoer (SVG og/eller PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Slet et specifikt logo |

Den generelle aktivrute (`/{name}/{path}`) falder automatisk tilbage til standardtemaet `chamilo`, når en fil mangler i det anmodede tema, så temaer kun behøver at indeholde filer, de faktisk overskriver.

## Hvordan temaer indlæses i skabeloner

Layoutskabelonen `head.html.twig` indlæser det aktive temas aktiver via Twig-hjælpefunktioner:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

De tre Twig-funktioner (registreret i `ChamiloExtension`) opløser aktivstien via `ThemeHelper` og anvender den samme tilbagefaldskæde som ovenfor:

| Funktion | Returnerer |
|----------|---------|
| `theme_asset('path')` | URL til aktivet i det opløste tema |
| `theme_asset_link_tag('path')` | Fuldt `<link rel="stylesheet">`-tag |
| `theme_asset_script_tag('path')` | Fuldt `<script src="...">`-tag |
| `theme_asset_base64('path')` | Base64-kodet data-URI for aktivet |
| `theme_logo('header'\|'email')` | URL til det bedst tilgængelige logo |

## API-endepunkter

Temastyring eksponeres via API Platform REST API (kun administrator):

| Metode | Endepunkt | Formål |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Opret et nyt tema |
| `PUT` | `/api/color_themes/{id}` | Opdater et eksisterende tema |
| `POST` | `/api/access_url_rel_color_themes` | Knyt/aktivér et tema for en adgangs-URL |
| `GET` | `/api/access_url_rel_color_themes` | List temaknytninger for den aktuelle adgangs-URL |

## Oprettelse af et brugerdefineret tema

Den standardmæssige arbejdsgang går via administrationsgrænsefladen (**Admin → Color Themes**), som kalder API-endepunkterne ovenfor. For at oprette et tema programmatisk:

1. `POST /api/color_themes` med en JSON-krop:

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

Dette persisterer entiteten og skriver `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` for at knytte det til og aktivere det for den aktuelle access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

For at tilføje brugerdefinerede billeder (logo, favicon, baggrunde) skal de uploades via `POST /themes/{slug}/logos` eller placeres direkte i `var/themes/{slug}/images/`.

## Reference til farvevariabler

Alle variabler, som den standardmæssige Tailwind-konfiguration forventer:

| Variabel | Formål |
|----------|---------|
| `--color-primary-base` | Primær brandfarve |
| `--color-primary-gradient` | Mørkere gradientstop for primær |
| `--color-primary-button-text` | Tekstfarve på primære knapper |
| `--color-primary-button-alternative-text` | Alternativ tekstfarve på primære knapper |
| `--color-secondary-base` | Sekundær accentfarve |
| `--color-secondary-gradient` | Gradientstop for sekundær |
| `--color-secondary-button-text` | Tekstfarve på sekundære knapper |
| `--color-tertiary-base` | Tertiær farve |
| `--color-tertiary-gradient` | Gradientstop for tertiær |
| `--color-tertiary-button-text` | Tekstfarve på tertiære knapper |
| `--color-success-base` | Farve for succes-tilstand |
| `--color-success-gradient` | Gradientstop for succes |
| `--color-success-button-text` | Tekstfarve på succes-knapper |
| `--color-info-base` | Farve for info-tilstand |
| `--color-info-gradient` | Gradientstop for info |
| `--color-info-button-text` | Tekstfarve på info-knapper |
| `--color-warning-base` | Farve for advarsels-tilstand |
| `--color-warning-gradient` | Gradientstop for advarsel |
| `--color-warning-button-text` | Tekstfarve på advarselsknapper |
| `--color-danger-base` | Farve for fare-/fejltilstand |
| `--color-danger-gradient` | Gradientstop for fare |
| `--color-danger-button-text` | Tekstfarve på fareknapper |
| `--color-form-base` | Accentfarve for formularelementer |