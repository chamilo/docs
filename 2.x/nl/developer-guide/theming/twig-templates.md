# Twig Sjablonen

Chamilo gebruikt Twig voor server-side gerenderde pagina's. Sjablonen bevinden zich in `src/CoreBundle/Resources/views/` en worden aangeduid met het voorvoegsel `@ChamiloCore/` (bijvoorbeeld `@ChamiloCore/Layout/base-layout.html.twig`).

Er is geen overkoepelende `templates/` map — alle Twig-sjablonen bevinden zich onder `src/CoreBundle/Resources/views/`.

## Hoe Twig en Vue Samenwerken

De meeste pagina's volgen dit proces:

1. Een Symfony-controller rendert een Twig-sjabloon dat een lay-out uitbreidt.
2. De lay-out bevat `vue_setup.html.twig`, dat `<div id="app">` uitzendt en runtime globals (`window.user`, `window.breadcrumb`, enz.) injecteert via `vue_js_setup.html.twig`.
3. Vue wordt gekoppeld aan `#app` en verzorgt alle UI-rendering binnen dat element.
4. De Vue-app communiceert met de backend via de REST API.

Voor oudere pagina's die nog niet zijn gemigreerd naar Vue, rendert Symfony de volledige pagina-HTML via Twig en wordt de inhoud geplaatst binnen `#sectionMainContent`. Vue wordt nog steeds gekoppeld (voor de zijbalk en bovenbalk), maar het hoofdinhoudsgebied is server-gerenderde HTML.

## Lay-out Sjablonen

Alle lay-outs breiden `@ChamiloCore/Layout/base-layout.html.twig` uit, dat de `<html>`, `<head>` en `<body>` structuur biedt. Beschikbare lay-outvarianten:

| Sjabloon | Doel |
|----------|------|
| `Layout/base-layout.html.twig` | Basissjabloon — `<html>` shell, importeert Macros, zendt `<head>` en `<body>` uit |
| `Layout/layout.html.twig` | Standaard volledige lay-out met zijbalk, bovenbalk en inhoudsgebied |
| `Layout/layout_one_col.html.twig` | Lay-out met één kolom (geen zijbalk) |
| `Layout/layout_two_col.html.twig` | Lay-out met twee kolommen |
| `Layout/layout_content.html.twig` | Alleen inhoud wrapper |
| `Layout/layout_empty.html.twig` | Lege lay-out met minimale opmaak |
| `Layout/no_layout.html.twig` | Geen header/footer; inhoud gaat direct in `<body>` |
| `Layout/no_layout_scorm.html.twig` | Kale lay-out voor SCORM-inhoudsframes |
| `Layout/blank.html.twig` | Volledig lege pagina |
| `Layout/skill_layout.html.twig` | Lay-out voor de vaardighedenwielpagina |

## Belangrijke Partials

| Sjabloon | Doel |
|----------|------|
| `Layout/head.html.twig` | `<head>` inhoud: meta-tags, alle Encore CSS-items, thema `colors.css`, oudere JS-items, OpenGraph/Twitter-tags |
| `Layout/foot.html.twig` | Einde van body: Vue JS startpunt, injectie van `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Zendt `<div id="app">` uit en bevat `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injecteert `window.user`, `window.breadcrumb`, `window.languages`, enz. |
| `Layout/cookie_banner.html.twig` | GDPR cookie toestemmingsbanner |
| `Layout/footer.html.twig` | Pagina voettekstbalk |
| `Layout/course_navigation.html.twig` | Navigatiekruimelpad voor cursustools |

## Webpack Encore Integratie

`head.html.twig` laadt CSS voor alle items; `foot.html.twig` laadt de Vue JS-bundel:

```twig
{# In head.html.twig — CSS items #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (geladen aan het einde van body) #}
{{ encore_entry_script_tags('vue') }}
```

Oudere JS-items (`legacy_app`, `legacy_lp`, enz.) worden geladen in `<head>` omdat oudere PHP-pagina's afhankelijk zijn van hun beschikbaarheid voordat de DOM klaar is.

## Macros

Herbruikbare Twig-macros bevinden zich in `Macros/` en worden geïmporteerd aan de bovenkant van `base-layout.html.twig`:

| Macro-bestand | Biedt |
|---------------|-------|
| `Macros/box.html.twig` | Hulpmiddelen voor inhoudsboxen |
| `Macros/actions.html.twig` | Rendering van actieknoppen |
| `Macros/buttons.html.twig` | HTML-hulpmiddelen voor knoppen |
| `Macros/headers.html.twig` | Hulpmiddelen voor paginaheaders |
| `Macros/image.html.twig` | Hulpmiddelen voor het renderen van afbeeldingen |
| `Macros/modals.html.twig` | Hulpmiddelen voor modale dialogen |

Gebruik binnen elk sjabloon dat `base-layout.html.twig` uitbreidt:

```twig
{{ macro_buttons.submit('Opslaan') }}
{{ macro_box.content_box('Titel', inhoud) }}
```

## Aangepaste Vue Sjablonen

Chamilo ondersteunt per installatie overschrijvingen van Vue-pagina's via de omgevingsvariabele `APP_CUSTOM_VUE_TEMPLATE`. Wanneer ingesteld, stelt de Webpack-build een constante `ENV_CUSTOM_VUE_TEMPLATE` beschikbaar via `DefinePlugin`, en importeert de Vue-router voorwaardelijk overschrijvingscomponenten uit `var/vue_templates/`.

Huidige overschrijvingslocaties:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Vervangt de standaard / startpagina
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Alleen de bestanden die aanwezig zijn in `var/vue_templates/` worden overschreven — alle andere pagina's en componenten gebruiken de originele kernbestanden.

---
## Twig Functies Referentie

Belangrijke Twig-functies die beschikbaar zijn in alle sjablonen (geregistreerd in `ChamiloExtension`):

| Functie | Doel |
|----------|------|
| `chamilo_settings_get('ns.key')` | Een platforminstelling lezen |
| `chamilo_settings_has('ns.key')` | Controleren of een instelling bestaat |
| `chamilo_settings_all()` | Alle instellingen als een array ophalen |
| `theme_asset('path')` | URL naar een asset in het actieve thema |
| `theme_asset_link_tag('path')` | `<link>`-tag voor een thema-CSS-bestand |
| `theme_asset_script_tag('path')` | `<script>`-tag voor een thema-JS-bestand |
| `theme_asset_base64('path')` | Base64 data-URI voor een thema-asset |
| `theme_logo('header'\|'email')` | URL naar het voorkeurslogo |
| `is_allowed_to_edit(...)` | Hulp bij permissiecontrole |