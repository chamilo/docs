# Kleurthema's

Chamilo 3.0 gebruikt een databasegestuurd kleurthemasysteem. Thema's worden beheerd via de beheer-UI, opgeslagen in de database en als CSS-bestanden naar schijf geschreven. Ze kunnen per access-URL worden aangepast, zodat installaties met meerdere URL's verschillende visuele identiteiten kunnen hebben.

## Datamodel

Twee entiteiten sturen het themasysteem:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Veld | Type | Beschrijving |
|-------|------|-------------|
| `id` | int | Primaire sleutel |
| `title` | string | Voor mensen leesbare naam |
| `slug` | string | Automatisch gegenereerd vanuit `title` (bijv. `"My Theme"` → `my-theme`); gebruikt als mapnaam in `var/themes/` |
| `variables` | array (JSON) | Mapping van CSS-custom-propertynaam → waarde (bijv. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Koppelt een `ColorTheme` aan een `AccessUrl`. De boolean-vlag `active` geeft aan welk thema momenteel actief is voor die URL. Per access-URL kan slechts één thema tegelijk actief zijn.

## Hoe thema's worden opgeslagen

Wanneer een thema via de API wordt aangemaakt of bijgewerkt, genereert `ColorThemeStateProcessor` het CSS-bestand en schrijft het naar het Flysystem `themes_filesystem` (ondersteund door `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

Het gegenereerde `colors.css` plaatst alle variabelen in een `:root`-blok:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Waarden zijn door spaties gescheiden RGB-kanaaltripels (geen `rgb()`), zodat Tailwind opaciteitsvarianten zoals `bg-primary/50` kan samenstellen zonder extra configuratie.

## Voorrangsvolgorde bij themaresolutie

`ThemeHelper::getVisualTheme()` bepaalt welke themaslug op een gegeven pagina wordt toegepast, in deze volgorde:

1. **Actief thema voor de huidige AccessUrl** — het `AccessUrlRelColorTheme`-record met `active = true`
2. **Door de gebruiker gekozen thema** — het thema dat op de `User`-entiteit is opgeslagen, als de platforminstelling `profile.user_selected_theme` is ingeschakeld
3. **Cursusthema** — de cursusinstelling `course_theme`, als de platforminstelling `course.allow_course_theme` is ingeschakeld
4. **Leerpadthema** — de waarde `$lp_theme_css` van het LP, als de cursusinstelling `allow_learning_path_theme` is ingeschakeld
5. **Omgevingsvariabele `THEME_FALLBACK`** — ingesteld in `.env` als `THEME_FALLBACK='chamilo'`
6. **Standaard** — `chamilo` (hardcoded als `ThemeHelper::DEFAULT_THEME`)

## Uitleveren van assets

Thema-assets worden uitgeleverd door `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) onder het prefix `/themes`.

| Route | Doel |
|-------|---------|
| `GET /themes/{name}/{path}` | Lever een willekeurige thema-asset (CSS, JS, afbeeldingen); valt terug op het thema `chamilo` als het bestand niet in het gevraagde thema wordt gevonden |
| `GET /themes/{slug}/logo/{type}` | Lever het voorkeurslogo (`header` of `email`), met terugval van SVG naar PNG |
| `POST /themes/{slug}/logos` | Upload header-/e-maillogo's (SVG en/of PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Verwijder een specifiek logo |

De algemene assetroute (`/{name}/{path}`) valt automatisch terug op het standaardthema `chamilo` wanneer een bestand in het gevraagde thema ontbreekt, zodat thema's alleen bestanden hoeven te bevatten die ze daadwerkelijk overschrijven.

## Hoe thema's in templates worden geladen

Het layouttemplate `head.html.twig` laadt de assets van het actieve thema via Twig-hulpfuncties:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

De drie Twig-functies (geregistreerd in `ChamiloExtension`) lossen het assetpad op via `ThemeHelper`, met dezelfde terugvalketen als hierboven:

| Functie | Retourneert |
|----------|---------|
| `theme_asset('path')` | URL naar de asset in het opgeloste thema |
| `theme_asset_link_tag('path')` | Volledige tag `<link rel="stylesheet">` |
| `theme_asset_script_tag('path')` | Volledige tag `<script src="...">` |
| `theme_asset_base64('path')` | Base64-gecodeerde data-URI van de asset |
| `theme_logo('header'\|'email')` | URL naar het best beschikbare logo |

## API-eindpunten

Themabeheer is beschikbaar via de REST API van API Platform (alleen voor beheerders):

| Methode | Eindpunt | Doel |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Een nieuw thema aanmaken |
| `PUT` | `/api/color_themes/{id}` | Een bestaand thema bijwerken |
| `POST` | `/api/access_url_rel_color_themes` | Een thema koppelen/activeren voor een access-URL |
| `GET` | `/api/access_url_rel_color_themes` | Thema-koppelingen voor de huidige access-URL weergeven |

## Een aangepast thema maken

De standaardworkflow verloopt via de beheerinterface (**Beheer → Kleuren thema's**), die de hierboven genoemde API-eindpunten aanroept. Om een thema programmatisch te maken:

1. `POST /api/color_themes` met een JSON-body:

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

Dit slaat de entiteit op en schrijft `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` om het te koppelen en te activeren voor de huidige access URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Om aangepaste afbeeldingen (logo, favicon, achtergronden) toe te voegen, uploadt u ze via `POST /themes/{slug}/logos` of plaatst u ze rechtstreeks in `var/themes/{slug}/images/`.

## Referentie kleuren variabelen

Alle variabelen die de standaard Tailwind-configuratie verwacht:

| Variabele | Doel |
|----------|---------|
| `--color-primary-base` | Primaire merkkleur |
| `--color-primary-gradient` | Donkerder verlooppunt voor primair |
| `--color-primary-button-text` | Tekstkleur op primaire knoppen |
| `--color-primary-button-alternative-text` | Alternatieve tekstkleur op primaire knoppen |
| `--color-secondary-base` | Secundaire accentkleur |
| `--color-secondary-gradient` | Verlooppunt voor secundair |
| `--color-secondary-button-text` | Tekstkleur op secundaire knoppen |
| `--color-tertiary-base` | Tertiaire kleur |
| `--color-tertiary-gradient` | Verlooppunt voor tertiair |
| `--color-tertiary-button-text` | Tekstkleur op tertiaire knoppen |
| `--color-success-base` | Kleur voor successtatus |
| `--color-success-gradient` | Verlooppunt voor succes |
| `--color-success-button-text` | Tekstkleur op succesknoppen |
| `--color-info-base` | Kleur voor infostatus |
| `--color-info-gradient` | Verlooppunt voor info |
| `--color-info-button-text` | Tekstkleur op infoknoppen |
| `--color-warning-base` | Kleur voor waarschuwingsstatus |
| `--color-warning-gradient` | Verlooppunt voor waarschuwing |
| `--color-warning-button-text` | Tekstkleur op waarschuwingsknoppen |
| `--color-danger-base` | Kleur voor gevaar-/foutstatus |
| `--color-danger-gradient` | Verlooppunt voor gevaar |
| `--color-danger-button-text` | Tekstkleur op gevaarknoppen |
| `--color-form-base` | Accentkleur voor formulierelementen |