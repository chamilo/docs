# Twig-skabeloner

Chamilo bruger Twig til serverside-renderede sider. Skabeloner ligger i `src/CoreBundle/Resources/views/` og refereres med navnerumspræfikset `@ChamiloCore/` (f.eks. `@ChamiloCore/Layout/base-layout.html.twig`).

Der findes ingen `templates/`-mappe på øverste niveau — alle Twig-skabeloner ligger under `src/CoreBundle/Resources/views/`.

## Hvordan Twig og Vue sameksisterer

De fleste sider følger denne proces:

1. En Symfony-controller renderer en Twig-skabelon, der udvider et layout.
2. Layoutet inkluderer `vue_setup.html.twig`, som udsender `<div id="app">` og injicerer runtime-globals (`window.user`, `window.breadcrumb` osv.) via `vue_js_setup.html.twig`.
3. Vue monteres på `#app` og håndterer al UI-rendering inde i det element.
4. Vue-appen kommunikerer med backend via REST API.

For ældre sider, der endnu ikke er migreret til Vue, renderer Symfony den fulde side-HTML via Twig, og indholdet placeres inde i `#sectionMainContent`. Vue monteres stadig (og leverer sidemenu- og topbjælkeskallen), men hovedindholdsområdet er server-renderet HTML.

## Layoutskabeloner

Alle layouts udvider `@ChamiloCore/Layout/base-layout.html.twig`, som leverer strukturen med `<html>`, `<head>` og `<body>`. Tilgængelige layoutvarianter:

| Skabelon | Formål |
|----------|---------|
| `Layout/base-layout.html.twig` | Rodskabelon — `<html>`-skal, importerer Macros, udsender `<head>` og `<body>` |
| `Layout/layout.html.twig` | Standard fuldt layout med sidemenu, topbjælke og indholdsområde |
| `Layout/layout_one_col.html.twig` | Enkolonnelayout (uden sidemenu) |
| `Layout/layout_two_col.html.twig` | Tokolonnelayout |
| `Layout/layout_content.html.twig` | Wrapper kun til indhold |
| `Layout/layout_empty.html.twig` | Tomt layout med minimalt chrome |
| `Layout/no_layout.html.twig` | Ingen header/footer; indholdet går direkte ind i `<body>` |
| `Layout/no_layout_scorm.html.twig` | Bare layout til SCORM-indholdsrammer |
| `Layout/blank.html.twig` | Fuldstændig blank side |
| `Layout/skill_layout.html.twig` | Layout til siden med kompetencehjulet |

## Centrale partials

| Skabelon | Formål |
|----------|---------|
| `Layout/head.html.twig` | Indhold i `<head>`: meta-tags, alle Encore CSS-entries, temaets `colors.css`, ældre JS-entries, OpenGraph/Twitter-tags |
| `Layout/foot.html.twig` | Slutningen af body: Vue JS-entry point, injektion af `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Udsender `<div id="app">` og inkluderer `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Injicerer `window.user`, `window.breadcrumb`, `window.languages` osv. |
| `Layout/cookie_banner.html.twig` | GDPR-banner til cookie-samtykke |
| `Layout/footer.html.twig` | Sidens sidefodsbjælke |
| `Layout/course_navigation.html.twig` | Brødkrumme til kursusværktøjsnavigation |

## Webpack Encore-integration

`head.html.twig` indlæser CSS for alle entries; `foot.html.twig` indlæser Vue JS-bundtet:

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

Ældre JS-entries (`legacy_app`, `legacy_lp` osv.) indlæses i `<head>`, fordi ældre PHP-sider afhænger af, at de er tilgængelige, før DOM er klar.

## Macros

Genbrugelige Twig-macros ligger i `Macros/` og importeres øverst i `base-layout.html.twig`:

| Macro-fil | Leverer |
|-----------|---------|
| `Macros/box.html.twig` | Hjælpere til indholdsbokse |
| `Macros/actions.html.twig` | Rendering af handlingsknapper |
| `Macros/buttons.html.twig` | HTML-hjælpere til knapper |
| `Macros/headers.html.twig` | Hjælpere til sidehoveder |
| `Macros/image.html.twig` | Hjælpere til billedrendering |
| `Macros/modals.html.twig` | Hjælpere til modal-dialoger |

Brug inde i enhver skabelon, der udvider `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Brugerdefinerede Vue-skabeloner

Chamilo understøtter Vue-side-overrides pr. installation via miljøvariablen `APP_CUSTOM_VUE_TEMPLATE`. Når den er sat, eksponerer Webpack-buildet en konstant `ENV_CUSTOM_VUE_TEMPLATE` via `DefinePlugin`, og Vue-routeren importerer betinget override-komponenter fra `var/vue_templates/`.

Nuværende override-placeringer:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Kun de filer, der findes i `var/vue_templates/`, overskrives — alle øvrige sider og komponenter bruger kerneoriginalerne.

## Twig-funktionsreference

Vigtige Twig-funktioner, der er tilgængelige i alle skabeloner (registreret i `ChamiloExtension`):

| Funktion | Formål |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Læs en platformindstilling |
| `chamilo_settings_has('ns.key')` | Tjek om en indstilling findes |
| `chamilo_settings_all()` | Hent alle indstillinger som et array |
| `theme_asset('path')` | URL til et asset i det aktive tema |
| `theme_asset_link_tag('path')` | `<link>`-tag til en CSS-fil i temaet |
| `theme_asset_script_tag('path')` | `<script>`-tag til en JS-fil i temaet |
| `theme_asset_base64('path')` | Base64-data-URI til et tema-asset |
| `theme_logo('header'\|'email')` | URL til det foretrukne logo |
| `is_allowed_to_edit(...)` | Hjælpefunktion til tilladelseskontrol |