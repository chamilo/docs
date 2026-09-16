# Template Twig

Chamilo utilizza Twig per le pagine renderizzate lato server. I template si trovano in `src/CoreBundle/Resources/views/` e vengono referenziati con il prefisso di namespace `@ChamiloCore/` (ad es. `@ChamiloCore/Layout/base-layout.html.twig`).

Non esiste una directory `templates/` di primo livello — tutti i template Twig sono sotto `src/CoreBundle/Resources/views/`.

## Come coesistono Twig e Vue

La maggior parte delle pagine segue questo flusso:

1. Un controller Symfony renderizza un template Twig che estende un layout.
2. Il layout include `vue_setup.html.twig`, che emette `<div id="app">` e inietta i globali di runtime (`window.user`, `window.breadcrumb`, ecc.) tramite `vue_js_setup.html.twig`.
3. Vue si monta su `#app` e gestisce tutto il rendering dell’interfaccia utente all’interno di quell’elemento.
4. L’app Vue comunica con il backend tramite la REST API.

Per le pagine legacy non ancora migrate a Vue, Symfony renderizza l’HTML completo della pagina tramite Twig e il contenuto viene inserito in `#sectionMainContent`. Vue si monta comunque (fornendo la shell della barra laterale e della barra superiore), ma l’area del contenuto principale è HTML renderizzato dal server.

## Template di layout

Tutti i layout estendono `@ChamiloCore/Layout/base-layout.html.twig`, che fornisce la struttura `<html>`, `<head>` e `<body>`. Varianti di layout disponibili:

| Template | Scopo |
|----------|---------|
| `Layout/base-layout.html.twig` | Template radice — shell `<html>`, importa i Macro, emette `<head>` e `<body>` |
| `Layout/layout.html.twig` | Layout completo standard con barra laterale, barra superiore e area contenuto |
| `Layout/layout_one_col.html.twig` | Layout a colonna singola (senza barra laterale) |
| `Layout/layout_two_col.html.twig` | Layout a due colonne |
| `Layout/layout_content.html.twig` | Wrapper solo contenuto |
| `Layout/layout_empty.html.twig` | Layout vuoto con chrome minimo |
| `Layout/no_layout.html.twig` | Nessuna intestazione/piè di pagina; il contenuto va direttamente dentro `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout minimale per i frame di contenuto SCORM |
| `Layout/blank.html.twig` | Pagina completamente vuota |
| `Layout/skill_layout.html.twig` | Layout per la pagina della ruota delle competenze |

## Partial principali

| Template | Scopo |
|----------|---------|
| `Layout/head.html.twig` | Contenuto di `<head>`: meta tag, tutte le entry CSS di Encore, `colors.css` del tema, entry JS legacy, tag OpenGraph/Twitter |
| `Layout/foot.html.twig` | Fine del body: punto di ingresso JS di Vue, iniezione di `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emette `<div id="app">` e include `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Inietta `window.user`, `window.breadcrumb`, `window.languages`, ecc. |
| `Layout/cookie_banner.html.twig` | Banner di consenso cookie GDPR |
| `Layout/footer.html.twig` | Barra del piè di pagina |
| `Layout/course_navigation.html.twig` | Breadcrumb di navigazione degli strumenti del corso |

## Integrazione Webpack Encore

`head.html.twig` carica il CSS per tutte le entry; `foot.html.twig` carica il bundle JS di Vue:

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

Le entry JS legacy (`legacy_app`, `legacy_lp`, ecc.) vengono caricate in `<head>` perché le pagine PHP legacy dipendono dalla loro disponibilità prima che il DOM sia pronto.

## Macro

Le macro Twig riutilizzabili si trovano in `Macros/` e vengono importate in cima a `base-layout.html.twig`:

| File macro | Fornisce |
|-----------|---------|
| `Macros/box.html.twig` | Helper per i riquadri di contenuto |
| `Macros/actions.html.twig` | Rendering dei pulsanti di azione |
| `Macros/buttons.html.twig` | Helper HTML per i pulsanti |
| `Macros/headers.html.twig` | Helper per le intestazioni di pagina |
| `Macros/image.html.twig` | Helper per il rendering delle immagini |
| `Macros/modals.html.twig` | Helper per le finestre di dialogo modali |

Utilizzo all’interno di qualsiasi template che estende `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## Template Vue personalizzati

Chamilo supporta le sostituzioni delle pagine Vue per installazione tramite la variabile d’ambiente `APP_CUSTOM_VUE_TEMPLATE`. Quando è impostata, la build Webpack espone una costante `ENV_CUSTOM_VUE_TEMPLATE` tramite `DefinePlugin`, e il router Vue importa condizionalmente i componenti di override da `var/vue_templates/`.

Posizioni di override attuali:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Vengono sostituiti solo i file presenti in `var/vue_templates/` — tutte le altre pagine e componenti usano gli originali del core.

## Riferimento alle funzioni Twig

Principali funzioni Twig disponibili in tutti i template (registrate in `ChamiloExtension`):

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | Legge un'impostazione della piattaforma |
| `chamilo_settings_has('ns.key')` | Verifica se un'impostazione esiste |
| `chamilo_settings_all()` | Ottiene tutte le impostazioni come array |
| `theme_asset('path')` | URL di un asset nel tema attivo |
| `theme_asset_link_tag('path')` | Tag `<link>` per un file CSS del tema |
| `theme_asset_script_tag('path')` | Tag `<script>` per un file JS del tema |
| `theme_asset_base64('path')` | Data URI in Base64 per un asset del tema |
| `theme_logo('header'\|'email')` | URL del logo preferito |
| `is_allowed_to_edit(...)` | Helper per il controllo dei permessi |