# Kleurenthema's

Chamilo 2.0 maakt gebruik van een databasegestuurd kleurenthemasysteem. Thema's worden beheerd via de beheerdersinterface, opgeslagen in de database en als CSS-bestanden naar de schijf geschreven. Ze kunnen worden aangepast per toegang-URL, waardoor installaties met meerdere URL's verschillende visuele identiteiten kunnen hebben.

## Gegevensmodel

Twee entiteiten sturen het themasysteem aan:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Veld | Type | Beschrijving |
|-------|------|-------------|
| `id` | int | Primaire sleutel |
| `title` | string | Menselijk leesbare naam |
| `slug` | string | Automatisch gegenereerd uit `title` (bijv. `"Mijn Thema"` → `mijn-thema`); gebruikt als mapnaam in `var/themes/` |
| `variables` | array (JSON) | Kaart van CSS-eigendomsnaam → waarde (bijv. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

Koppelt een `ColorTheme` aan een `AccessUrl`. De `active` boolean-vlag markeert welk thema momenteel actief is voor die URL. Slechts één thema kan tegelijkertijd actief zijn per toegang-URL.

## Hoe Thema's Worden Opgeslagen

Wanneer een thema wordt aangemaakt of bijgewerkt via de API, genereert `ColorThemeStateProcessor` het CSS-bestand en schrijft dit naar de Flysystem `themes_filesystem` (ondersteund door `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← gegenereerd uit ColorTheme.variables
```

Het gegenereerde `colors.css` omvat alle variabelen in een `:root`-blok:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

Waarden zijn spatiegescheiden RGB-kanaal-tripletten (niet `rgb()`), wat Tailwind in staat stelt om opaciteitsvarianten zoals `bg-primary/50` samen te stellen zonder extra configuratie.

## Prioriteit bij Themaresolutie

`ThemeHelper::getVisualTheme()` bepaalt welk thema-slug op een bepaalde pagina wordt toegepast, in deze volgorde:

1. **Actief thema voor de huidige AccessUrl** — het `AccessUrlRelColorTheme`-record met `active = true`
2. **Door de gebruiker geselecteerd thema** — het thema dat is opgeslagen in de `User`-entiteit, als de platforminstelling `profile.user_selected_theme` is ingeschakeld
3. **Cursusthema** — de cursusinstelling `course_theme`, als de platforminstelling `course.allow_course_theme` is ingeschakeld
4. **Thema voor leerpad** — de `$lp_theme_css`-waarde van het leerpad, als de cursusinstelling `allow_learning_path_theme` is ingeschakeld
5. **`THEME_FALLBACK` omgevingsvariabele** — ingesteld in `.env` als `THEME_FALLBACK='chamilo'`
6. **Standaard** — `chamilo` (hardcoded als `ThemeHelper::DEFAULT_THEME`)

## Levering van Assets

Thema-assets worden geleverd door `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) onder het voorvoegsel `/themes`.

| Route | Doel |
|-------|---------|
| `GET /themes/{name}/{path}` | Levert een thema-asset (CSS, JS, afbeeldingen); valt terug op het `chamilo`-thema als het niet wordt gevonden in het gevraagde thema |
| `GET /themes/{slug}/logo/{type}` | Levert het voorkeur-logo (`header` of `email`), met SVG → PNG fallback |
| `POST /themes/{slug}/logos` | Upload header/email-logo's (SVG en/of PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Verwijdert een specifiek logo |

De algemene asset-route (`/{name}/{path}`) valt automatisch terug op het standaard `chamilo`-thema wanneer een bestand ontbreekt in het gevraagde thema, zodat thema's alleen bestanden hoeven te bevatten die ze daadwerkelijk overschrijven.

## Hoe Thema's Worden Geladen in Sjablonen

Het `head.html.twig`-lay-outsjabloon laadt de assets van het actieve thema via Twig-helperfuncties:

```twig
{# Injecteer de kleurvariabelen van het thema #}
{{ theme_asset_link_tag('colors.css') }}

{# Injecteer TinyMCE-kleurenpalet #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Verwijs naar andere thema-assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

De drie Twig-functies (geregistreerd in `ChamiloExtension`) lossen het assetpad op via `ThemeHelper`, waarbij dezelfde fallback-keten als hierboven wordt toegepast:

| Functie | Retourneert |
|----------|---------|
| `theme_asset('path')` | URL naar de asset in het opgeloste thema |
| `theme_asset_link_tag('path')` | Volledige `<link rel="stylesheet">`-tag |
| `theme_asset_script_tag('path')` | Volledige `<script src="...">`-tag |
| `theme_asset_base64('path')` | Base64-gecodeerde data-URI van de asset |
| `theme_logo('header'\|'email')` | URL naar het best beschikbare logo |

## API-eindpunten

Thema-beheer is beschikbaar via de API Platform REST API (alleen voor beheerders):

| Methode | Eindpunt | Doel |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Maak een nieuw thema aan |
| `PUT` | `/api/color_themes/{id}` | Werk een bestaand thema bij |
| `POST` | `/api/access_url_rel_color_themes` | Koppel/activeer een thema voor een toegang-URL |
| `GET` | `/api/access_url_rel_color_themes` | Lijst thema-associaties voor de huidige toegang-URL |

## Een Aangepast Thema Maken

De standaard workflow verloopt via de beheerdersinterface (**Beheer → Kleurenthema's**), die de bovenstaande API-eindpunten aanroept. Om programmatisch een thema te maken:

1. `POST /api/color_themes` met een JSON-body:

```json
{
  "title": "Mijn Thema",
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

2. `POST /api/access_url_rel_color_themes` om het thema te koppelen en te activeren voor de huidige toegang-URL:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

Om aangepaste afbeeldingen (logo, favicon, achtergronden) toe te voegen, upload ze via `POST /themes/{slug}/logos` of plaats ze direct in `var/themes/{slug}/images/`.

## Referentie voor Kleurvariabelen

Alle variabelen die worden verwacht door de standaard Tailwind-configuratie:

| Variabele | Doel |
|----------|---------|
| `--color-primary-base` | Primaire merkkleur |
| `--color-primary-gradient` | Donkerdere gradiëntstop voor primair |
| `--color-primary-button-text` | Tekstkleur op primaire knoppen |
| `--color-primary-button-alternative-text` | Alternatieve tekstkleur op primaire knoppen |
| `--color-secondary-base` | Secundaire accentkleur |
| `--color-secondary-gradient` | Gradiëntstop voor secundair |
| `--color-secondary-button-text` | Tekstkleur op secundaire knoppen |
| `--color-tertiary-base` | Tertiaire kleur |
| `--color-tertiary-gradient` | Gradiëntstop voor tertiair |
| `--color-tertiary-button-text` | Tekstkleur op tertiaire knoppen |
| `--color-success-base` | Kleur voor successtatus |
| `--color-success-gradient` | Gradiëntstop voor succes |
| `--color-success-button-text` | Tekstkleur op succesknoppen |
| `--color-info-base` | Kleur voor informatietoestand |
| `--color-info-gradient` | Gradiëntstop voor info |
| `--color-info-button-text` | Tekstkleur op infoknoppen |
| `--color-warning-base` | Kleur voor waarschuwingstoestand |
| `--color-warning-gradient` | Gradiëntstop voor waarschuwing |
| `--color-warning-button-text` | Tekstkleur op waarschuwingsknoppen |
| `--color-danger-base` | Kleur voor gevaar/foutstatus |
| `--color-danger-gradient` | Gradiëntstop voor gevaar |
| `--color-danger-button-text` | Tekstkleur op gevaarknoppen |
| `--color-form-base` | Accentkleur voor formulierelementen |