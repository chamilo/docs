# Twig-mallar

Chamilo använder Twig för sidor som renderas på serversidan. Mallarna ligger i `src/CoreBundle/Resources/views/` och refereras med namnrymdsprefixet `@ChamiloCore/` (t.ex. `@ChamiloCore/Layout/base-layout.html.twig`).

Det finns ingen katalog `templates/` på översta nivån — alla Twig-mallar ligger under `src/CoreBundle/Resources/views/`.

## Hur Twig och Vue samexisterar

De flesta sidor följer detta flöde:

1. En Symfony-kontroller renderar en Twig-mall som utökar en layout.
2. Layouten inkluderar `vue_setup.html.twig`, som emitterar `<div id="app">` och injicerar runtime-globaler (`window.user`, `window.breadcrumb`, etc.) via `vue_js_setup.html.twig`.
3. Vue monteras på `#app` och hanterar all UI-rendering inuti det elementet.
4. Vue-appen kommunicerar med backend via REST API.

För äldre sidor som ännu inte migrerats till Vue renderar Symfony hela sidans HTML via Twig och innehållet placeras inuti `#sectionMainContent`. Vue monteras fortfarande (och tillhandahåller skalet med sidopanel och topplist), men huvudinnehållsområdet är serverrenderad HTML.

## Layoutmallar

Alla layouter utökar `@ChamiloCore/Layout/base-layout.html.twig`, som tillhandahåller strukturen för `<html>`, `<head>` och `<body>`. Tillgängliga layoutvarianter:

| Mall | Syfte |
|----------|---------|
| `Layout/base-layout.html.twig` | Rotmall — `<html>`-skal, importerar Macros, emitterar `<head>` och `<body>` |
| `Layout/layout.html.twig` | Standardlayout i full bredd med sidopanel, topplist och innehållsområde |
| `Layout/layout_one_col.html.twig` | Enkolumnslayout (ingen sidopanel) |
| `Layout/layout_two_col.html.twig` | Tvåkolumnslayout |
| `Layout/layout_content.html.twig` | Wrapper endast för innehåll |
| `Layout/layout_empty.html.twig` | Tom layout med minimalt ramverk |
| `Layout/no_layout.html.twig` | Ingen sidhuvud/sidfot; innehållet hamnar direkt inuti `<body>` |
| `Layout/no_layout_scorm.html.twig` | Minimal layout för SCORM-innehållsramar |
| `Layout/blank.html.twig` | Helt tom sida |
| `Layout/skill_layout.html.twig` | Layout för sidan med färdighetshjulet |

## Viktiga partials

| Mall | Syfte |
|----------|---------|
| `Layout/head.html.twig` | Innehåll i `<head>`: meta-taggar, alla Encore CSS-poster, temats `colors.css`, äldre JS-poster, OpenGraph-/Twitter-taggar |
| `Layout/foot.html.twig` | Slutet av body: Vue JS-ingångspunkt, injektion av `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emitterar `<div id="app">` och inkluderar `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injicerar `window.user`, `window.breadcrumb`, `window.languages`, etc. |
| `Layout/cookie_banner.html.twig` | GDPR-banner för cookie-samtycke |
| `Layout/footer.html.twig` | Sidfotslist |
| `Layout/course_navigation.html.twig` | Brödsmula för kursverktygsnavigering |

## Integration med Webpack Encore

`head.html.twig` laddar CSS för alla poster; `foot.html.twig` laddar Vue JS-bunten:

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

Äldre JS-poster (`legacy_app`, `legacy_lp`, etc.) laddas i `<head>` eftersom äldre PHP-sidor är beroende av att de finns tillgängliga innan DOM är redo.

## Makron

Återanvändbara Twig-makron finns i `Macros/` och importeras högst upp i `base-layout.html.twig`:

| Makrofil | Tillhandahåller |
|-----------|---------|
| `Macros/box.html.twig` | Hjälpfunktioner för innehållsrutor |
| `Macros/actions.html.twig` | Rendering av åtgärdsknappar |
| `Macros/buttons.html.twig` | HTML-hjälpfunktioner för knappar |
| `Macros/headers.html.twig` | Hjälpfunktioner för sidhuvuden |
| `Macros/image.html.twig` | Hjälpfunktioner för bildrendering |
| `Macros/modals.html.twig` | Hjälpfunktioner för modaler |

Användning i valfri mall som utökar `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Anpassade Vue-mallar

Chamilo stöder Vue-sidöverskrivningar per installation via miljövariabeln `APP_CUSTOM_VUE_TEMPLATE`. När den är satt exponerar Webpack-bygget en konstant `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, och Vue-routern importerar villkorligt överskrivningskomponenter från `var/vue_templates/`.

Aktuella överskrivningsplatser:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Endast filerna som finns i `var/vue_templates/` överskrivs — alla övriga sidor och komponenter använder kärnans original.

## Twig-funktioner – referens

Viktiga Twig-funktioner som är tillgängliga i alla mallar (registrerade i `ChamiloExtension`):

| Funktion | Syfte |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Läsa en plattformsinställning |
| `chamilo_settings_has('ns.key')` | Kontrollera om en inställning finns |
| `chamilo_settings_all()` | Hämta alla inställningar som en array |
| `theme_asset('path')` | URL till en tillgång i det aktiva temat |
| `theme_asset_link_tag('path')` | `<link>`-tagg för en CSS-fil i temat |
| `theme_asset_script_tag('path')` | `<script>`-tagg för en JS-fil i temat |
| `theme_asset_base64('path')` | Base64-data-URI för en temaresurs |
| `theme_logo('header'\|'email')` | URL till den föredragna logotypen |
| `is_allowed_to_edit(...)` | Hjälpfunktion för behörighetskontroll |