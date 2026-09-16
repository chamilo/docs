# Twig-templates

Chamilo gebruikt Twig voor server-side gerenderde pagina's. Templates staan in `src/CoreBundle/Resources/views/` en worden aangeduid met het namespace-prefix `@ChamiloCore/` (bijv. `@ChamiloCore/Layout/base-layout.html.twig`).

Er is geen `templates/`-directory op het hoogste niveau — alle Twig-templates staan onder `src/CoreBundle/Resources/views/`.

## Hoe Twig en Vue naast elkaar bestaan

De meeste pagina's volgen deze flow:

1. Een Symfony-controller rendert een Twig-template die een layout uitbreidt.
2. De layout include `vue_setup.html.twig`, die `<div id="app">` emitteert en runtime-globals (`window.user`, `window.breadcrumb`, enz.) injecteert via `vue_js_setup.html.twig`.
3. Vue mount op `#app` en verzorgt alle UI-rendering binnen dat element.
4. De Vue-app communiceert met de backend via de REST API.

Voor legacy-pagina's die nog niet naar Vue zijn gemigreerd, rendert Symfony de volledige pagina-HTML via Twig en wordt de inhoud in `#sectionMainContent` geplaatst. Vue mount nog steeds (en levert de sidebar- en topbar-shell), maar het hoofdinhoudsgebied is server-gerenderde HTML.

## Layout-templates

Alle layouts breiden `@ChamiloCore/Layout/base-layout.html.twig` uit, dat de structuur van `<html>`, `<head>` en `<body>` biedt. Beschikbare layoutvarianten:

| Template | Doel |
|----------|---------|
| `Layout/base-layout.html.twig` | Root-template — `<html>`-shell, importeert Macros, emitteert `<head>` en `<body>` |
| `Layout/layout.html.twig` | Standaard volledige layout met sidebar, topbar en inhoudsgebied |
| `Layout/layout_one_col.html.twig` | Enkelkoloms layout (geen sidebar) |
| `Layout/layout_two_col.html.twig` | Tweekoloms layout |
| `Layout/layout_content.html.twig` | Wrapper alleen voor inhoud |
| `Layout/layout_empty.html.twig` | Lege layout met minimale chrome |
| `Layout/no_layout.html.twig` | Geen header/footer; inhoud gaat rechtstreeks in `<body>` |
| `Layout/no_layout_scorm.html.twig` | Kale layout voor SCORM-inhoudsframes |
| `Layout/blank.html.twig` | Volledig lege pagina |
| `Layout/skill_layout.html.twig` | Layout voor de pagina met het vaardighedenwiel |

## Belangrijke partials

| Template | Doel |
|----------|---------|
| `Layout/head.html.twig` | Inhoud van `<head>`: metatags, alle Encore CSS-entries, thema `colors.css`, legacy JS-entries, OpenGraph/Twitter-tags |
| `Layout/foot.html.twig` | Einde van body: Vue JS-entry point, injectie van `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emitteert `<div id="app">` en include `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injecteert `window.user`, `window.breadcrumb`, `window.languages`, enz. |
| `Layout/cookie_banner.html.twig` | GDPR-cookiebanner voor toestemming |
| `Layout/footer.html.twig` | Paginavoettekstbalk |
| `Layout/course_navigation.html.twig` | Navigatie-breadcrumb van cursustools |

## Webpack Encore-integratie

`head.html.twig` laadt CSS voor alle entries; `foot.html.twig` laadt de Vue JS-bundle:

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

Legacy JS-entries (`legacy_app`, `legacy_lp`, enz.) worden in `<head>` geladen omdat legacy PHP-pagina's ervan afhankelijk zijn dat ze beschikbaar zijn voordat de DOM gereed is.

## Macros

Herbruikbare Twig-macros staan in `Macros/` en worden bovenaan `base-layout.html.twig` geïmporteerd:

| Macrobestand | Biedt |
|-----------|---------|
| `Macros/box.html.twig` | Helpers voor inhoudsboxen |
| `Macros/actions.html.twig` | Rendering van actieknoppen |
| `Macros/buttons.html.twig` | HTML-helpers voor knoppen |
| `Macros/headers.html.twig` | Helpers voor paginakoppen |
| `Macros/image.html.twig` | Helpers voor afbeeldingsrendering |
| `Macros/modals.html.twig` | Helpers voor modale dialogen |

Gebruik in elke template die `base-layout.html.twig` uitbreidt:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Aangepaste Vue-templates

Chamilo ondersteunt Vue-pagina-overrides per installatie via de omgevingsvariabele `APP_CUSTOM_VUE_TEMPLATE`. Wanneer deze is ingesteld, stelt de Webpack-build via `DefinePlugin` een constante `ENV_CUSTOM_VUE_TEMPLATE` beschikbaar, en importeert de Vue-router voorwaardelijk override-componenten uit `var/vue_templates/`.

Huidige overridelocaties:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Alleen de bestanden die in `var/vue_templates/` aanwezig zijn, worden overschreven — alle overige pagina's en componenten gebruiken de originele core-versies.

## Twig-functiereferentie

Belangrijke Twig-functies die in alle templates beschikbaar zijn (geregistreerd in `ChamiloExtension`):

| Functie | Doel |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Een platforminstelling lezen |
| `chamilo_settings_has('ns.key')` | Controleren of een instelling bestaat |
| `chamilo_settings_all()` | Alle instellingen als array ophalen |
| `theme_asset('path')` | URL naar een asset in het actieve thema |
| `theme_asset_link_tag('path')` | `<link>`-tag voor een CSS-bestand van het thema |
| `theme_asset_script_tag('path')` | `<script>`-tag voor een JS-bestand van het thema |
| `theme_asset_base64('path')` | Base64-data-URI voor een thema-asset |
| `theme_logo('header'\|'email')` | URL naar het voorkeurslogo |
| `is_allowed_to_edit(...)` | Hulpfunctie voor rechtencontrole |