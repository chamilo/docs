# Projectstructuur

## Hoofdmapstructuur

```
chamilo/
├── assets/          # Frontend broncode
│   ├── vue/         # Vue 3 applicatie (componenten, weergaven, router, stores)
│   ├── css/         # SCSS stylesheets
│   └── js/          # Verouderde JavaScript
├── config/          # Symfony configuratie (routes, services, packages)
├── public/          # Webroot (index.php, verouderde PHP-pagina's, plugins)
│   ├── main/        # Verouderde PHP-modules (één submap per tool)
│   └── plugin/      # Gebundelde en aangepaste plugins
├── src/             # PHP broncode (Symfony bundles)
│   ├── CoreBundle/  # Kernplatformlogica
│   ├── CourseBundle/# Cursusspecifieke functies
│   └── LtiBundle/   # LTI 1.3 integratie
├── templates/       # Twig sjablonen
├── var/             # Cache, logs, uploads (gegenereerd)
├── vendor/          # Composer afhankelijkheden (gegenereerd)
├── node_modules/    # npm afhankelijkheden (gegenereerd)
└── translations/    # Vertalingsbestanden
```

## Broncode (`src/`)

### CoreBundle

De grootste bundle. Opmerkelijke submappen:

| Map | Inhoud |
|-----------|----------|
| `Entity/` | Doctrine entiteiten (User, Course, Session, ResourceNode, enz.) |
| `Controller/` | Beheer-, API-actie- en paginacontrollers (de Api/ submap bevat aangepaste API Platform acties) |
| `Settings/` | Instellingenschemabestanden (platformconfiguratie) |
| `Repository/` | Doctrine repositories |
| `AiProvider/` | AI-provider implementaties (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Cursustooldefinities |
| `Security/` | Stemmers, authenticators, autorisatie |
| `EventListener/` | Gebeurtenisluisteraars |
| `EventSubscriber/` | Gebeurtenisabonnees |
| `Command/` | Symfony console commando's |
| `Migrations/` | Database migraties |
| `Twig/` | Twig extensies |
| `Storage/` | Flysystem opslagadapters |

### CourseBundle

Cursusspecifieke entiteiten en logica:

| Map | Inhoud |
|-----------|----------|
| `Entity/` | Cursusinhoud entiteiten (CDocument, CQuiz, CLp, CForum, CStudentPublication, enz.) |
| `Controller/` | Cursuscontrollers |
| `Settings/` | Instellingenschema's op cursusniveau |
| `Component/CourseCopy/` | Cursus import/export (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3 integratie:

| Map | Inhoud |
|-----------|----------|
| `Entity/` | LTI platform-, tool- en implementatie-entiteiten |
| `Controller/` | LTI start- en configuratie-eindpunten |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Toepassingstoegangspunt
├── main_installer.js    # Installatie-toegangspunt
├── components/          # Herbruikbare Vue-componenten
│   ├── accessurl/       # Multi-URL (portaal) componenten
│   ├── admin/           # Beheerderspecifieke componenten
│   ├── assignments/     # Opdrachtformulieren en lijsten
│   ├── attendance/      # Aanwezigheidslijstcomponenten
│   ├── basecomponents/  # Gedeelde basiscomponenten (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, enz.) en ChamiloIcons.js
│   ├── blog/            # Blogcomponenten
│   ├── branch/          # Filiaal/netwerkcampuscomponenten
│   ├── ccalendarevent/  # Cursuskalendergebeurteniscomponenten
│   ├── chat/            # Chat- en AI-tutor
│   ├── course/          # Cursuskaartjes, catalogi, formulieren
│   ├── coursecategory/  # Cursuscategoriecomponenten
│   ├── coursemaintenance/ # Cursus back-up/herstelcomponenten
│   ├── ctoolintro/      # Cursustool introductiecomponenten
│   ├── documents/       # Documentbeheercomponenten
│   ├── dropbox/         # Dropbox (bestandsuitwisseling) componenten
│   ├── filemanager/     # Bestandsbrowsercomponenten
│   ├── glossary/        # Woordenlijstcomponenten
│   ├── installer/       # Installatiewizard
│   ├── layout/          # Zijbalk, Bovenbalk, shell-lay-out
│   ├── links/           # Externe linkcomponenten
│   ├── login/           # Inlogformuliercomponenten
│   ├── lp/              # Leerpadcomponenten
│   ├── message/         # Berichtencomponenten
│   ├── page/            # Statische pagina-componenten
│   ├── pageLayout/      # Pagin lay-out wrappercomponenten
│   ├── personalfile/    # Persoonlijke bestandsruimtecomponenten
│   ├── platform/        # Platformniveau UI-componenten
│   ├── resource_links/  # Beheercomponenten voor bronlinks
│   ├── room/            # Virtuele ruimtecomponenten
│   ├── session/         # Sessie (leercampagne) componenten
│   ├── sessionadmin/    # Sessiebeheerderscomponenten
│   ├── skill/           # Vaardigheden en competentiecomponenten
│   ├── social/          # Sociale netwerkcomponenten
│   ├── systemannouncement/ # Systeemaankondigingcomponenten
│   ├── user/            # Gebruikersprofiel- en beheercomponenten
│   ├── usergroup/       # Gebruikersgroep (klas) componenten
│   └── userreluser/     # Gebruikersrelatie (vriend/volgen) componenten
├── views/               # Pagina-niveau Vue-weergaven (spiegelt components/ structuur)
│   ├── accessurl/       ├── account/         ├── admin/
│   ├── assignments/     ├── attendance/      ├── blog/
│   ├── branch/          ├── buycourses/      ├── ccalendarevent/
│   ├── course/          ├── coursecategory/  ├── coursemaintenance/
│   ├── ctoolintro/      ├── documents/       ├── dropbox/
│   ├── filemanager/     ├── glossary/        ├── links/
│   ├── lp/              ├── message/         ├── page/
│   ├── pageLayout/      ├── personalfile/    ├── room/
│   ├── sessionadmin/    ├── skill/           ├── social/
│   ├── terms/           ├── user/            ├── usergroup/
│   └── userreluser/
├── router/              # Vue Router (index.js + één module per functiegebied)
├── store/               # Pinia stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Gedeelde compositiefuncties (submappen per functie)
├── services/            # API-dienstlaag (één bestand per entiteit/domein)
├── utils/               # Hulpprogrammafuncties (datums, hydra, fetch, sanitizeHtml, enz.)
├── config/              # Runtime configuratie (api.js, env.js)
├── constants/           # Gedeelde constanten
│   └── entity/          # Entiteitsspecifieke constanten (sessie, bericht, extrafield, enz.)
├── layouts/             # Topniveau lay-outcomponenten (MyCourses.vue)
├── pages/               # Standalone pagina-componenten (Home, Login, Faq, Demo)
├── mixins/              # Verouderde Vue 2-stijl mixins (ListMixin, CreateMixin, enz.)
├── hooks/               # Composable hooks (useSidebar, useState)
├── plugins/             # Vue pluginregistraties (httpErrors, vuetify)
├── validators/          # Vuelidate aangepaste validators
└── error/               # Foutgrenscomponenten
```

## Configuratie (`config/`)

```
config/
├── packages/            # Bundle- en frameworkconfiguratie (één YAML-bestand per pakket)
│   ├── security.yaml    # Rolhiërarchie, firewalls, toegangscontrole
│   ├── doctrine.yaml    # Doctrine ORM en DBAL instellingen
│   ├── api_platform.yaml# API Platform configuratie
│   ├── framework.yaml   # Kerninstellingen van Symfony
│   ├── lexik_jwt_authentication.yaml  # JWT-tokeninstellingen
│   ├── nelmio_cors.yaml # CORS-headers voor API-consumenten
│   ├── oneup_flysystem.yaml  # Cloudopslagadapters
│   ├── webpack_encore.yaml   # Webpack Encore integratie
│   ├── ... (30+ pakketbestanden)
│   ├── dev/             # Alleen voor ontwikkeling overschrijvingen (web profiler, debug, routing)
│   ├── prod/            # Alleen voor productie overschrijvingen (momenteel lege placeholder)
│   └── test/            # Testomgeving overschrijvingen (JWT, validator, web profiler)
├── routes/              # Route-definities
│   ├── api_platform.yaml     # API Platform routeprefix
│   ├── attributes.yaml       # Controller annotatie-gebaseerde routes
│   ├── fos_js_routing.yaml   # FOS JS Routing blootstelling
│   ├── legacy.yaml           # Routes voor oude PHP-pagina's onder public/main/
│   ├── security.yaml         # Inlog-/uitlog-/OAuth2-routes
│   ├── dev/                  # Alleen voor ontwikkeling routes (profiler, Maker bundle)
│   └── test/                 # Alleen voor test route-overschrijvingen
├── jwt/                 # JWT-sleutelpaar (privé-/publieke sleutels)
└── jwt-test/            # JWT-sleutels voor de testomgeving
```

Symfony voegt automatisch de basis `packages/*.yaml`-bestanden samen met die in de bijbehorende omgevingssubmap (`dev/`, `prod/`, of `test/`), zodat omgevingsspecifieke bestanden alleen de waarden hoeven te overschrijven die verschillen.

## Buildconfiguratie

| Bestand | Doel |
|------|---------|
| `webpack.config.js` | Webpack Encore configuratie (ingangen, loaders, plugins) |
| `tailwind.config.js` | Tailwind CSS configuratie (inhoudspaden, thema-uitbreidingen, plugins) |
| `tsconfig.json` | TypeScript configuratie |
| `eslint.config.mjs` | ESLint regels (platte configuratie) |
| `.prettierrc.json` | Prettier opmaakregels |

Alle bestanden bevinden zich in de projecthoofdmap. PostCSS-plugins (Tailwind + Autoprefixer) worden inline geconfigureerd binnen `webpack.config.js` via `enablePostCssLoader()` — er is geen standalone `postcss.config.js`. `webpack.config.js` leest `tailwind.config.js` indirect via PostCSS, dus wijzigingen in de `content`- of `theme`-secties van Tailwind worden van kracht bij de volgende uitvoering van `yarn encore dev` / `yarn encore production`.

## Webpack Ingangspunten

De build produceert deze bundels:

**JavaScript:**
* `vue` — Hoofd Vue 3 applicatie (`assets/vue/main.js`)
* `vue_installer` — Installatiewizard (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Oude JS voor pagina's die nog niet zijn gemigreerd naar Vue

**CSS:**
* `app` — Hoofdstylesheet (`assets/css/app.scss`)
* Plus gespecialiseerde stylesheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS Structuur (`assets/css/`)

```
assets/css/
├── app.scss             # Ingangspunt — importeert Tailwind, de SCSS-index en externe CSS
├── _tailwind.scss       # Tailwind richtlijnen (@tailwind base / components / utilities)
├── chat.scss            # Stijlen voor chat- en AI-tutorpaneel
├── document.scss        # Stijlen voor documentviewer
├── editor.scss          # TinyMCE editor shell stijlen
├── editor_content.scss  # Stijlen geïnjecteerd in het editor iframe lichaam
├── markdown.scss        # Stijlen voor markdown-gerenderde inhoud
├── print.scss           # Print stylesheet
├── responsive.scss      # Responsieve overschrijvingen
├── scorm.scss           # SCORM-speler stijlen
├── legacy/              # Stijlen voor oude PHP-pagina's (bijv. frameReadyLoader.scss)
└── scss/                # Modulaire SCSS-partials
    ├── index.scss           # Barrel-bestand — importeert alle onderstaande partials
    ├── abstracts/           # Mixins en gedeelde functies
    ├── settings/            # Ontwerptokens (typografie, componentbasis)
    ├── atoms/               # Per-component PrimeVue overschrijvingen (knoppen, invoervelden, kalender, enz.)
    ├── molecules/           # Kleine samengestelde UI-patronen (chips, werkbalken, lege staten)
    ├── organisms/           # Grotere functiegebieden (zijbalk, datatabel, dialoog, LP-paneel, enz.)
    ├── layout/              # Pagina-skelet partials (topbar, hoofdcontainer, breadcrumb)
    ├── components/          # Oude component-specifieke bestanden (blog, oefening, sociaal, vaardigheid, enz.)
    └── libs/                # Overschrijvingen van externe bibliotheken (FullCalendar, MediaElement.js)
```

---
### Tailwind CSS

Tailwind is geïntegreerd via PostCSS. `assets/css/_tailwind.scss` genereert de basis-, component- en utility-lagen; `assets/css/app.scss` importeert deze als eerste, zodat Tailwind-utilities beschikbaar zijn in alle andere deelbestanden. De Tailwind-configuratie — inhoudspaden voor het opschonen, thema-uitbreidingen en plugins — bevindt zich in `tailwind.config.js` in de hoofdmap van het project (`/var/www/chamilo/tailwind.config.js`).

Aangepaste utility-klassen en componentklassen die zijn gedefinieerd met `@layer` (zichtbaar in `app.scss`) volgen de laagconventie van Tailwind, zodat door de gebruiker gedefinieerde klassen dezelfde specificiteitsregels respecteren als de gegenereerde utilities.

### Kleurenthema's

Chamilo ondersteunt een kleurenthemasysteem dat direct vanuit de beheerdersinterface kan worden geconfigureerd (**Beheer > Kleurenthema's**). Elk opgeslagen thema schrijft zijn bestanden naar een specifieke map onder `var/themes/`:

```
var/themes/
└── [thema-naam]/
    ├── colors.css       # CSS aangepaste eigenschappen voor het volledige kleurenpalet
    ├── default.css      # Optionele aanvullende aangepaste CSS-regels
    ├── learnpath.css    # Specifieke aanpassingen voor leerpaden
    ├── tiny-settings.js # Kleurenpaletinstellingen voor de TinyMCE-editor
    └── images/          # Thema-afbeeldingen (logo, favicon, achtergronden, PWA-iconen)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Achtergrondafbeeldingen, afbeeldingen voor beheerdersblokken, enz.
```

`colors.css` definieert CSS aangepaste eigenschappen als ruimtegescheiden RGB-kanaal-tripletten in plaats van `rgb()`-waarden, wat Tailwind in staat stelt om opacity-varianten (bijv. `bg-primary/50`) samen te stellen zonder extra configuratie:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

De themalaag bevindt zich bovenop de gecompileerde Tailwind/SCSS-bundel: de browser laadt `colors.css` na het hoofdstylesheet, waardoor thema-aanpassingen direct van kracht worden zonder een buildstap.