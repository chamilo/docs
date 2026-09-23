# Färgteman

Chamilo 3.0 använder ett databasdrivet system för färgteman. Teman hanteras via administratörsgränssnittet, lagras i databasen och skrivs till disk som CSS-filer. De kan anpassas per åtkomst-URL, vilket gör att installationer med flera URL:er kan ha olika visuell identitet.

## Datamodell

Två entiteter styr temasystemet:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Fält | Typ | Beskrivning |
|-------|------|-------------|
| `id` | int | Primärnyckel |
| `title` | string | Läsbart namn |
| `slug` | string | Autogenereras från `title` (t.ex. `"My Theme"` → `my-theme`); används som katalognamn i `var/themes/` |
| `variables` | array (JSON) | Mappning av CSS-anpassad egenskapsnamn → värde (t.ex. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Kopplar ett `ColorTheme` till en `AccessUrl`. Den booleska flaggan `active` markerar vilket tema som för närvarande är aktivt för den URL:en. Endast ett tema kan vara aktivt per åtkomst-URL åt gången.

## Hur teman lagras

När ett tema skapas eller uppdateras via API:et genererar `ColorThemeStateProcessor` CSS-filen och skriver den till Flysystem `themes_filesystem` (baserad på `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Den genererade `colors.css` kapslar in alla variabler i ett `:root`-block:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Värdena är mellanslagsseparerade RGB-kanaltripletter (inte `rgb()`), vilket gör att Tailwind kan sätta ihop opacitetvarianter som `bg-primary/50` utan ytterligare konfiguration.

## Precedens vid temaresolution

`ThemeHelper::getVisualTheme()` avgör vilken temaslug som ska tillämpas på en given sida, i denna ordning:

1. **Aktivt tema för aktuell AccessUrl** — posten `AccessUrlRelColorTheme` med `active = true`
2. **Användarvalt tema** — temat som lagras på entiteten `User`, om plattformsinställningen `profile.user_selected_theme` är aktiverad
3. **Kurstema** — kursinställningen `course_theme`, om plattformsinställningen `course.allow_course_theme` är aktiverad
4. **Tema för lärstig** — LP:ns värde `$lp_theme_css`, om kursinställningen `allow_learning_path_theme` är aktiverad
5. **Miljövariabeln `THEME_FALLBACK`** — anges i `.env` som `THEME_FALLBACK='chamilo'`
6. **Standard** — `chamilo` (hårdkodat som `ThemeHelper::DEFAULT_THEME`)

## Servering av tillgångar

Tematillgångar serveras av `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) under prefixet `/themes`.

| Rutt | Syfte |
|-------|---------|
| `GET /themes/{name}/{path}` | Servera valfri tematillgång (CSS, JS, bilder); faller tillbaka till temat `chamilo` om den inte finns i det begärda temat |
| `GET /themes/{slug}/logo/{type}` | Servera den föredragna logotypen (`header` eller `email`), med fallback SVG → PNG |
| `POST /themes/{slug}/logos` | Ladda upp sidhuvuds-/e-postlogotyper (SVG och/eller PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Ta bort en specifik logotyp |

Den allmänna tillgångsrutten (`/{name}/{path}`) faller automatiskt tillbaka till standardtemat `chamilo` när en fil saknas i det begärda temat, så teman behöver bara innehålla filer som de faktiskt åsidosätter.

## Hur teman laddas i mallar

Layoutmallen `head.html.twig` laddar det aktiva temats tillgångar via Twig-hjälpfunktioner:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

De tre Twig-funktionerna (registrerade i `ChamiloExtension`) löser tillgångssökvägen via `ThemeHelper` och tillämpar samma fallbackkedja som ovan:

| Funktion | Returnerar |
|----------|---------|
| `theme_asset('path')` | URL till tillgången i det resolvade temat |
| `theme_asset_link_tag('path')` | Fullständig tagg `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Fullständig tagg `<script src="...">` |
| `theme_asset_base64('path')` | Base64-kodad data-URI för tillgången |
| `theme_logo('header'\|'email')` | URL till den bästa tillgängliga logotypen |

## API-ändpunkter

Temahantering exponeras via API Platform REST API (endast administratör):

| Metod | Ändpunkt | Syfte |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Skapa ett nytt tema |
| `PUT` | `/api/color_themes/{id}` | Uppdatera ett befintligt tema |
| `POST` | `/api/access_url_rel_color_themes` | Koppla/aktivera ett tema för en åtkomst-URL |
| `GET` | `/api/access_url_rel_color_themes` | Lista temakopplingar för aktuell åtkomst-URL |

## Skapa ett anpassat tema

Det vanliga arbetsflödet går via administratörsgränssnittet (**Admin → Color Themes**), som anropar API-ändpunkterna ovan. För att skapa ett tema programmatiskt:

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

Detta sparar entiteten och skriver `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` för att associera och aktivera det för den aktuella access-URL:en:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

För att lägga till anpassade bilder (logotyp, favicon, bakgrunder), ladda upp dem via `POST /themes/{slug}/logos` eller placera dem direkt i `var/themes/{slug}/images/`.

## Referens för färgvariabler

Alla variabler som förväntas av standardkonfigurationen för Tailwind:

| Variabel | Syfte |
|----------|---------|
| `--color-primary-base` | Primär varumärkesfärg |
| `--color-primary-gradient` | Mörkare gradientstopp för primär |
| `--color-primary-button-text` | Textfärg på primära knappar |
| `--color-primary-button-alternative-text` | Alternativ textfärg på primära knappar |
| `--color-secondary-base` | Sekundär accentfärg |
| `--color-secondary-gradient` | Gradientstopp för sekundär |
| `--color-secondary-button-text` | Textfärg på sekundära knappar |
| `--color-tertiary-base` | Tertiär färg |
| `--color-tertiary-gradient` | Gradientstopp för tertiär |
| `--color-tertiary-button-text` | Textfärg på tertiära knappar |
| `--color-success-base` | Färg för framgångstillstånd |
| `--color-success-gradient` | Gradientstopp för framgång |
| `--color-success-button-text` | Textfärg på framgångsknappar |
| `--color-info-base` | Färg för infotillstånd |
| `--color-info-gradient` | Gradientstopp för info |
| `--color-info-button-text` | Textfärg på infoknappar |
| `--color-warning-base` | Färg för varningstillstånd |
| `--color-warning-gradient` | Gradientstopp för varning |
| `--color-warning-button-text` | Textfärg på varningsknappar |
| `--color-danger-base` | Färg för fara/fel-tillstånd |
| `--color-danger-gradient` | Gradientstopp för fara |
| `--color-danger-button-text` | Textfärg på faroknappar |
| `--color-form-base` | Accentfärg för formulärelement |