# Modelli Twig

Chamilo utilizza Twig per le pagine renderizzate lato server. I modelli si trovano in `src/CoreBundle/Resources/views/` e sono referenziati con il prefisso di namespace `@ChamiloCore/` (ad esempio `@ChamiloCore/Layout/base-layout.html.twig`).

Non esiste una directory di livello superiore `templates/` — tutti i modelli Twig si trovano sotto `src/CoreBundle/Resources/views/`.

## Come Twig e Vue Coesistono

La maggior parte delle pagine segue questo flusso:

1. Un controller Symfony renderizza un modello Twig che estende un layout.
2. Il layout include `vue_setup.html.twig`, che emette `<div id="app">` e inietta variabili globali di runtime (`window.user`, `window.breadcrumb`, ecc.) tramite `vue_js_setup.html.twig`.
3. Vue si monta su `#app` e gestisce tutto il rendering dell'interfaccia utente all'interno di quell'elemento.
4. L'app Vue comunica con il backend tramite l'API REST.

Per le pagine legacy non ancora migrate a Vue, Symfony renderizza l'intero HTML della pagina tramite Twig e il contenuto viene posizionato all'interno di `#sectionMainContent`. Vue si monta comunque (fornendo la shell della barra laterale e della barra superiore), ma l'area del contenuto principale è HTML renderizzato lato server.

## Modelli di Layout

Tutti i layout estendono `@ChamiloCore/Layout/base-layout.html.twig`, che fornisce la struttura `<html>`, `<head>` e `<body>`. Varianti di layout disponibili:

| Modello | Scopo |
|----------|---------|
| `Layout/base-layout.html.twig` | Modello radice — shell `<html>`, importa Macro, emette `<head>` e `<body>` |
| `Layout/layout.html.twig` | Layout completo standard con barra laterale, barra superiore e area contenuto |
| `Layout/layout_one_col.html.twig` | Layout a colonna singola (senza barra laterale) |
| `Layout/layout_two_col.html.twig` | Layout a due colonne |
| `Layout/layout_content.html.twig` | Wrapper solo per il contenuto |
| `Layout/layout_empty.html.twig` | Layout vuoto con chrome minimo |
| `Layout/no_layout.html.twig` | Nessun header/footer; il contenuto va direttamente dentro `<body>` |
| `Layout/no_layout_scorm.html.twig` | Layout essenziale per i frame di contenuto SCORM |
| `Layout/blank.html.twig` | Pagina completamente vuota |
| `Layout/skill_layout.html.twig` | Layout per la pagina della ruota delle competenze |

## Parziali Chiave

| Modello | Scopo |
|----------|---------|
| `Layout/head.html.twig` | Contenuto di `<head>`: meta tag, tutte le voci CSS di Encore, `colors.css` del tema, voci JS legacy, tag OpenGraph/Twitter |
| `Layout/foot.html.twig` | Fine del body: punto di ingresso JS di Vue, iniezione di `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | Emite `<div id="app">` e include `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | Inietta `window.user`, `window.breadcrumb`, `window.languages`, ecc. |
| `Layout/cookie_banner.html.twig` | Banner di consenso ai cookie GDPR |
| `Layout/footer.html.twig` | Barra del footer della pagina |
| `Layout/course_navigation.html.twig` | Breadcrumb di navigazione degli strumenti del corso |

## Integrazione con Webpack Encore

`head.html.twig` carica il CSS per tutte le voci; `foot.html.twig` carica il bundle JS di Vue:

```twig
{# In head.html.twig — voci CSS #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (caricato alla fine del body) #}
{{ encore_entry_script_tags('vue') }}
```

Le voci JS legacy (`legacy_app`, `legacy_lp`, ecc.) vengono caricate in `<head>` perché le pagine PHP legacy dipendono dalla loro disponibilità prima che il DOM sia pronto.

## Macro

Le macro Twig riutilizzabili si trovano in `Macros/` e vengono importate all'inizio di `base-layout.html.twig`:

| File Macro | Fornisce |
|-----------|---------|
| `Macros/box.html.twig` | Helper per box di contenuto |
| `Macros/actions.html.twig` | Rendering di pulsanti di azione |
| `Macros/buttons.html.twig` | Helper HTML per pulsanti |
| `Macros/headers.html.twig` | Helper per intestazioni di pagina |
| `Macros/image.html.twig` | Helper per il rendering di immagini |
| `Macros/modals.html.twig` | Helper per dialoghi modali |

Utilizzo all'interno di qualsiasi modello che estende `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Salva') }}
{{ macro_box.content_box('Titolo', contenuto) }}
```

## Modelli Vue Personalizzati

Chamilo supporta override di pagine Vue per installazione tramite la variabile d'ambiente `APP_CUSTOM_VUE_TEMPLATE`. Quando impostata, la build di Webpack espone una costante `ENV_CUSTOM_VUE_TEMPLATE` tramite `DefinePlugin`, e il router Vue importa condizionalmente componenti di override da `var/vue_templates/`.

Posizioni attuali degli override:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Sostituisce la pagina di ingresso predefinita /
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

Solo i file presenti in `var/vue_templates/` vengono sovrascritti — tutte le altre pagine e componenti utilizzano gli originali del core.

---
## Riferimento alle Funzioni Twig

Funzioni Twig principali disponibili in tutti i template (registrate in `ChamiloExtension`):

| Funzione | Scopo |
|----------|-------|
| `chamilo_settings_get('ns.key')` | Legge un'impostazione della piattaforma |
| `chamilo_settings_has('ns.key')` | Verifica se un'impostazione esiste |
| `chamilo_settings_all()` | Ottiene tutte le impostazioni come array |
| `theme_asset('path')` | URL di una risorsa nel tema attivo |
| `theme_asset_link_tag('path')` | Tag `<link>` per un file CSS del tema |
| `theme_asset_script_tag('path')` | Tag `<script>` per un file JS del tema |
| `theme_asset_base64('path')` | URI dati Base64 per una risorsa del tema |
| `theme_logo('header'\|'email')` | URL del logo preferito |
| `is_allowed_to_edit(...)` | Helper per il controllo dei permessi |