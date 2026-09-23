# Twig-maler

Chamilo bruker Twig for serversiderenderte sider. Malene ligger i `src/CoreBundle/Resources/views/` og refereres med navneromsprefikset `@ChamiloCore/` (f.eks. `@ChamiloCore/Layout/base-layout.html.twig`).

Det finnes ingen `templates/`-katalog på toppnivå — alle Twig-maler ligger under `src/CoreBundle/Resources/views/`.

## Hvordan Twig og Vue sameksisterer

De fleste sider følger denne flyten:

1. En Symfony-kontroller renderer en Twig-mal som utvider et layout.
2. Layoutet inkluderer `vue_setup.html.twig`, som sender ut `<div id="app">` og injiserer kjøretidsglobale verdier (`window.user`, `window.breadcrumb`, osv.) via `vue_js_setup.html.twig`.
3. Vue monteres på `#app` og håndterer all UI-rendering inne i det elementet.
4. Vue-appen kommuniserer med backend via REST API.

For eldre sider som ennå ikke er migrert til Vue, renderer Symfony hele side-HTML-en via Twig, og innholdet plasseres inne i `#sectionMainContent`. Vue monteres likevel (og leverer skall for sidemeny og toppfelt), men hovedinnholdsområdet er serverrendert HTML.

## Layout-maler

Alle layout utvider `@ChamiloCore/Layout/base-layout.html.twig`, som gir strukturen for `<html>`, `<head>` og `<body>`. Tilgjengelige layoutvarianter:

| Mal | Formål |
|----------|---------|
| `Layout/base-layout.html.twig` | Rotmal — `<html>`-skall, importerer Macros, sender ut `<head>` og `<body>` |
| `Layout/layout.html.twig` | Standard fullt layout med sidemeny, toppfelt og innholdsområde |
| `Layout/layout_one_col.html.twig` | Énkolonnelayout (uten sidemeny) |
| `Layout/layout_two_col.html.twig` | Tokolonnelayout |
| `Layout/layout_content.html.twig` | Innpakning kun for innhold |
| `Layout/layout_empty.html.twig` | Tomt layout med minimalt rammeverk |
| `Layout/no_layout.html.twig` | Ingen topptekst/bunntekst; innholdet går rett inn i `<body>` |
| `Layout/no_layout_scorm.html.twig` | Nakent layout for SCORM-innholdsrammer |
| `Layout/blank.html.twig` | Helt blank side |
| `Layout/skill_layout.html.twig` | Layout for ferdighetshjul-siden |

## Viktige delmaler

| Mal | Formål |
|----------|---------|
| `Layout/head.html.twig` | `<head>`-innhold: metakoder, alle Encore CSS-oppføringer, temaets `colors.css`, eldre JS-oppføringer, OpenGraph-/Twitter-koder |
| `Layout/foot.html.twig` | Slutten av body: Vue JS-inngangspunkt, injeksjon av `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Sender ut `<div id="app">` og inkluderer `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injiserer `window.user`, `window.breadcrumb`, `window.languages`, osv. |
| `Layout/cookie_banner.html.twig` | GDPR-banner for informasjonskapsler |
| `Layout/footer.html.twig` | Sidens bunnfelt |
| `Layout/course_navigation.html.twig` | Brødsmule for kursverktøynavigasjon |

## Webpack Encore-integrasjon

`head.html.twig` laster CSS for alle oppføringer; `foot.html.twig` laster Vue JS-bunten:

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

Eldre JS-oppføringer (`legacy_app`, `legacy_lp`, osv.) lastes i `<head>` fordi eldre PHP-sider er avhengige av at de er tilgjengelige før DOM er klar.

## Makroer

Gjenbrukbare Twig-makroer ligger i `Macros/` og importeres øverst i `base-layout.html.twig`:

| Makrofil | Tilbyr |
|-----------|---------|
| `Macros/box.html.twig` | Hjelpere for innholdsbokser |
| `Macros/actions.html.twig` | Rendering av handlingsknapper |
| `Macros/buttons.html.twig` | HTML-hjelpere for knapper |
| `Macros/headers.html.twig` | Hjelpere for sideoverskrifter |
| `Macros/image.html.twig` | Hjelpere for bilderendering |
| `Macros/modals.html.twig` | Hjelpere for modalvinduer |

Bruk inne i enhver mal som utvider `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Tilpassede Vue-maler

Chamilo støtter Vue-sideoverstyringer per installasjon via miljøvariabelen `APP_CUSTOM_VUE_TEMPLATE`. Når den er satt, eksponerer Webpack-bygget en `ENV_CUSTOM_VUE_TEMPLATE`-konstant via `DefinePlugin`, og Vue-ruteren importerer betinget overstyringskomponenter fra `var/vue_templates/`.

Nåværende overstyringssteder:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Bare filene som finnes i `var/vue_templates/` overstyres — alle andre sider og komponenter bruker kjerneoriginalene.

## Twig-funksjonsreferanse

Viktige Twig-funksjoner tilgjengelige i alle maler (registrert i `ChamiloExtension`):

| Funksjon | Formål |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Les en plattforminnstilling |
| `chamilo_settings_has('ns.key')` | Sjekk om en innstilling finnes |
| `chamilo_settings_all()` | Hent alle innstillinger som en array |
| `theme_asset('path')` | URL til en ressurs i det aktive temaet |
| `theme_asset_link_tag('path')` | `<link>`-tagg for en CSS-fil i temaet |
| `theme_asset_script_tag('path')` | `<script>`-tagg for en JS-fil i temaet |
| `theme_asset_base64('path')` | Base64-data-URI for en temeressurs |
| `theme_logo('header'\|'email')` | URL til det foretrukne logoet |
| `is_allowed_to_edit(...)` | Hjelpefunksjon for tillatelsessjekk |