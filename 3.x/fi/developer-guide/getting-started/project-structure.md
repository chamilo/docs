# Projektin rakenne

## Ylimmän tason hakemistot

```
chamilo/
├── assets/          # Frontend source code
│   ├── vue/         # Vue 3 application (components, views, router, stores)
│   ├── css/         # SCSS stylesheets
│   └── js/          # Legacy JavaScript
├── config/          # Symfony configuration (routes, services, packages)
├── public/          # Web root (index.php, legacy PHP pages, plugins)
│   ├── main/        # Legacy PHP modules (one subdirectory per tool)
│   └── plugin/      # Bundled and custom plugins
├── src/             # PHP source code (Symfony bundles)
│   ├── CoreBundle/  # Core platform logic
│   ├── CourseBundle/# Course-specific features
│   └── LtiBundle/   # LTI 1.3 integration
├── templates/       # Twig templates
├── var/             # Cache, logs, uploads (generated)
├── vendor/          # Composer dependencies (generated)
├── node_modules/    # npm dependencies (generated)
└── translations/    # Translation files
```

## Lähdekoodi (`src/`)

### CoreBundle

Suurin bundle. Huomionarvoisia alihakemistoja:

| Hakemisto | Sisältö |
|-----------|----------|
| `Entity/` | Doctrine-entiteetit (User, Course, Session, ResourceNode jne.) |
| `Controller/` | Ylläpito-, API-toiminto- ja sivukontrollerit (Api/-alihakemisto sisältää mukautetut API Platform -toiminnot) |
| `Settings/` | Asetusskeematiedostot (alustan konfiguraatio) |
| `Repository/` | Doctrine-repositoriot |
| `AiProvider/` | Tekoälytarjoajien toteutukset (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Kurssityökalujen määritelmät |
| `Security/` | Voterit, autentikoijat, valtuutus |
| `EventListener/` | Tapahtumakuuntelijat |
| `EventSubscriber/` | Tapahtumatilaajat |
| `Command/` | Symfony-konsolikomennot |
| `Migrations/` | Tietokantamigraatiot |
| `Twig/` | Twig-laajennukset |
| `Storage/` | Flysystem-tallennussovittimet |

### CourseBundle

Kurssikohtaiset entiteetit ja logiikka:

| Hakemisto | Sisältö |
|-----------|----------|
| `Entity/` | Kurssisisällön entiteetit (CDocument, CQuiz, CLp, CForum, CStudentPublication jne.) |
| `Controller/` | Kurssikontrollerit |
| `Settings/` | Kurssitason asetusskeemat |
| `Component/CourseCopy/` | Kurssin tuonti/vienti (Common Cartridge, Moodle) |

### LtiBundle

LTI 1.3 -integraatio:

| Hakemisto | Sisältö |
|-----------|----------|
| `Entity/` | LTI-alustan, työkalun ja käyttöönoton entiteetit |
| `Controller/` | LTI-käynnistyksen ja konfiguraation päätepisteet |

## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Application entry point
├── main_installer.js    # Installer entry point
├── components/          # Reusable Vue components
│   ├── accessurl/       # Multi-URL (portal) components
│   ├── admin/           # Admin-specific components
│   ├── assignments/     # Assignment forms and lists
│   ├── attendance/      # Attendance sheet components
│   ├── basecomponents/  # Shared base components (BaseButton, BaseIcon, BaseTable, BaseTinyEditor, etc.) and ChamiloIcons.js
│   ├── blog/            # Blog components
│   ├── branch/          # Branch/network campus components
│   ├── ccalendarevent/  # Course calendar event components
│   ├── chat/            # Chat and AI tutor
│   ├── course/          # Course cards, catalogs, forms
│   ├── coursecategory/  # Course category components
│   ├── coursemaintenance/ # Course backup/restore components
│   ├── ctoolintro/      # Course tool introduction components
│   ├── documents/       # Document management components
│   ├── dropbox/         # Dropbox (file exchange) components
│   ├── filemanager/     # File browser components
│   ├── glossary/        # Glossary components
│   ├── installer/       # Installation wizard
│   ├── layout/          # Sidebar, Topbar, shell layout
│   ├── links/           # External links components
│   ├── login/           # Login form components
│   ├── lp/              # Learning path components
│   ├── message/         # Messaging components
│   ├── page/            # Static page components
│   ├── pageLayout/      # Page layout wrapper components
│   ├── personalfile/    # Personal file space components
│   ├── platform/        # Platform-level UI components
│   ├── resource_links/  # Resource link management components
│   ├── room/            # Virtual room components
│   ├── session/         # Session (learning campaign) components
│   ├── sessionadmin/    # Session administration components
│   ├── skill/           # Skills and competencies components
│   ├── social/          # Social network components
│   ├── systemannouncement/ # System announcement components
│   ├── user/            # User profile and management components
│   ├── usergroup/       # User group (class) components
│   └── userreluser/     # User relationship (friend/follow) components
├── views/               # Page-level Vue views (mirrors components/ structure)
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
├── router/              # Vue Router (index.js + one module per feature area)
├── store/               # Pinia stores
│   └── modules/         # crud.js, notifications.js, ux.js
├── composables/         # Shared composition functions (per-feature subdirectories)
├── services/            # API service layer (one file per entity/domain)
├── utils/               # Utility helpers (dates, hydra, fetch, sanitizeHtml, etc.)
├── config/              # Runtime configuration (api.js, env.js)
├── constants/           # Shared constants
│   └── entity/          # Entity-specific constants (session, message, extrafield, etc.)
├── layouts/             # Top-level layout components (MyCourses.vue)
├── pages/               # Standalone page components (Home, Login, Faq, Demo)
├── mixins/              # Legacy Vue 2-style mixins (ListMixin, CreateMixin, etc.)
├── hooks/               # Composable hooks (useSidebar, useState)
├── plugins/             # Vue plugin registrations (httpErrors, vuetify)
├── validators/          # Vuelidate custom validators
└── error/               # Error boundary components
```

## Konfiguraatio (`config/`)

```
config/
├── packages/            # Bundle and framework configuration (one YAML file per package)
│   ├── security.yaml    # Role hierarchy, firewalls, access control
│   ├── doctrine.yaml    # Doctrine ORM and DBAL settings
│   ├── api_platform.yaml# API Platform configuration
│   ├── framework.yaml   # Core Symfony settings
│   ├── lexik_jwt_authentication.yaml  # JWT token settings
│   ├── nelmio_cors.yaml # CORS headers for API consumers
│   ├── oneup_flysystem.yaml  # Cloud storage adapters
│   ├── webpack_encore.yaml   # Webpack Encore integration
│   ├── ... (30+ package files)
│   ├── dev/             # Development-only overrides (web profiler, debug, routing)
│   ├── prod/            # Production-only overrides (currently empty placeholder)
│   └── test/            # Test-environment overrides (JWT, validator, web profiler)
├── routes/              # Route definitions
│   ├── api_platform.yaml     # API Platform route prefix
│   ├── attributes.yaml       # Controller annotation-based routes
│   ├── fos_js_routing.yaml   # FOS JS Routing exposure
│   ├── legacy.yaml           # Routes for legacy PHP pages under public/main/
│   ├── security.yaml         # Login/logout/OAuth2 routes
│   ├── dev/                  # Development-only routes (profiler, Maker bundle)
│   └── test/                 # Test-only route overrides
├── jwt/                 # JWT key pair (private/public keys)
└── jwt-test/            # JWT keys for the test environment
```

Symfony yhdistää automaattisesti perus-`packages/*.yaml`-tiedostot vastaavan ympäristöalhakemiston (`dev/`, `prod/` tai `test/`) tiedostoihin, joten ympäristökohtaisissa tiedostoissa tarvitsee ylikirjoittaa vain poikkeavat arvot.

## Testit (`tests/`)

`tests/` **ei sisälly pakattuihin Chamilo-latauksiin** (julkaisu-ZIP-/tarball-tiedostoihin) — se poistetaan, koska sillä ei ole käyttötarkoitusta ajonaikana ja osa sen skripteistä voisi aiheuttaa riskin, jos ne jätettäisiin tuotantopalvelimelle. Se on mukana vain, kun projekti on hankittu komennolla `git clone`.

```
tests/
├── CoreBundle/       # PHPUnit tests, mirroring src/CoreBundle/'s subdirectory layout
├── CourseBundle/     # PHPUnit tests, mirroring src/CourseBundle/'s subdirectory layout
├── datafiller/       # Scripts that seed a test installation with demo courses/users/content
├── history/          # Snapshots of what Chamilo looked like at past versions
├── phpstan/          # Bootstrap file used by PHPStan when analyzing Doctrine ORM code
├── playwright/       # Browser-driven end-to-end tests (Gherkin + playwright-bdd)
├── procedures/       # Spreadsheets used as a base for manual QA of features
├── scripts/          # Standalone maintenance/fix/migration scripts for existing portals
├── AbstractApiTest.php                        # Base class for API Platform test cases
├── ApplicationAvailabilityFunctionalTest.php   # Smoke test asserting core pages load
├── ChamiloTestTrait.php                        # Shared fixtures/auth/request helpers
├── bootstrap.php                               # PHPUnit bootstrap
├── deprecations.baseline.json                  # Accepted deprecation warnings, excluded from failing the suite
└── README.md                                   # Setup instructions for PHPUnit and Playwright
```

| Hakemisto | Sisältö |
|-----------|----------|
| `CoreBundle/` | PHPUnit-testit, jotka peilaavat `src/CoreBundle/`-rakennetta: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | PHPUnit-testit, jotka peilaavat `src/CourseBundle/`-rakennetta: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Skriptit, jotka täyttävät testi-asennuksen demosisällöllä: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (ajaa muut), sekä `images/` ja suuri CSV-käyttäjätuontiesimerkki |
| `history/` | Tilannekuvat, jotka dokumentoivat Chamilon rakenteen aiemmissa julkaisuissa (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, jonka PHPStan lataa analysoidessaan Doctrine ORM -koodia |
| `playwright/` | Selainpohjaiset päästä päähän -testit: `features/*.feature` (Gherkin-skenaariot, jotka ajetaan [playwright-bdd](https://vitalets.github.io/playwright-bdd/):llä), `steps/common.steps.ts` (TypeScript-askelmäärittelyt), `fixtures/` (testitiedostot, esim. taulukot), `scripts/check-results.mjs`, `playwright.config.ts` ja generoitu `.features-gen/`-tuloste. Korvaa vanhan Behat-paketin, jonka skenaariot säilyvät git-historiassa viitteeksi |
| `procedures/` | Taulukot (tällä hetkellä `spanish/`), joita käytetään tarkistuslistapohjana ominaisuuksien manuaalisessa laadunvarmistuksessa |
| `scripts/` | Kertaluonteiset ylläpito-/korjaus-/migraatioskriptit olemassa oleville Chamilo-portaaleille (pääosin vanhempia versioita varten) sekä `git-hooks/`-, `img/`-, `lang/`- ja `packaging/`-alihakemistot |

Katso [Testaus](../contributing/testing.md) testitietokannan käyttöönotosta sekä PHPUnit- ja Playwright-pakettien ajamisesta.

## Koontikonfiguraatio

| Tiedosto | Tarkoitus |
|------|---------|
| `webpack.config.js` | Webpack Encore -konfiguraatio (entryt, loaderit, pluginat) |
| `tailwind.config.js` | Tailwind CSS -konfiguraatio (sisältöpolut, teeman laajennukset, pluginat) |
| `tsconfig.json` | TypeScript-konfiguraatio |
| `eslint.config.mjs` | ESLint-säännöt (flat config) |
| `.prettierrc.json` | Prettier-muotoilusäännöt |

Kaikki tiedostot sijaitsevat projektin juuressa. PostCSS-pluginat (Tailwind + Autoprefixer) on konfiguroitu sisäisesti tiedostossa `webpack.config.js` metodilla `enablePostCssLoader()` — erillistä `postcss.config.js`-tiedostoa ei ole. `webpack.config.js` lukee `tailwind.config.js`-tiedoston epäsuorasti PostCSS:n kautta, joten muutokset Tailwindin `content`- tai `theme`-osioihin tulevat voimaan seuraavalla `yarn encore dev` / `yarn encore production` -ajolla.

## Webpack-entryt

Koonti tuottaa nämä paketit:

**JavaScript:**
* `vue` — Pääasiallinen Vue 3 -sovellus (`assets/vue/main.js`)
* `vue_installer` — Asennusvelho (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy-JS sivuille, joita ei ole vielä siirretty Vueen

**CSS:**
* `app` — Päätyylitiedosto (`assets/css/app.scss`)
* Lisäksi erikoistuneet tyylit: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## CSS-rakenne (`assets/css/`)

```
assets/css/
├── app.scss             # Entry point — imports Tailwind, the SCSS index, and third-party CSS
├── _tailwind.scss       # Tailwind directives (@tailwind base / components / utilities)
├── chat.scss            # Chat and AI tutor panel styles
├── document.scss        # Document viewer styles
├── editor.scss          # TinyMCE editor shell styles
├── editor_content.scss  # Styles injected into the editor iframe body
├── markdown.scss        # Markdown-rendered content styles
├── print.scss           # Print stylesheet
├── responsive.scss      # Responsive overrides
├── scorm.scss           # SCORM player styles
├── legacy/              # Styles for legacy PHP pages (e.g. frameReadyLoader.scss)
└── scss/                # Modular SCSS partials
    ├── index.scss           # Barrel file — imports all partials below
    ├── abstracts/           # Mixins and shared functions
    ├── settings/            # Design tokens (typography, component base)
    ├── atoms/               # Per-component PrimeVue overrides (buttons, inputs, calendar, etc.)
    ├── molecules/           # Small composed UI patterns (chips, toolbars, empty states)
    ├── organisms/           # Larger feature areas (sidebar, datatable, dialog, LP panel, etc.)
    ├── layout/              # Page skeleton partials (topbar, main container, breadcrumb)
    ├── components/          # Legacy component-specific files (blog, exercise, social, skill, etc.)
    └── libs/                # Third-party library overrides (FullCalendar, MediaElement.js)
```

### Tailwind CSS

Tailwind on integroitu PostCSS:n kautta. `assets/css/_tailwind.scss` tuottaa base-, component- ja utility-kerrokset; `assets/css/app.scss` tuo sen ensin, jotta Tailwind-utilitit ovat käytettävissä kaikissa muissa osatiedostoissa. Tailwind-konfiguraatio — sisältöpolut purkausta varten, teeman laajennukset ja liitännäiset — sijaitsee tiedostossa `tailwind.config.js` projektin juuressa (`/var/www/chamilo/tailwind.config.js`).

Mukautetut utility-luokat ja komponenttiluokat, jotka on määritelty `@layer`-direktiivillä (näkyvät tiedostossa `app.scss`), noudattavat Tailwindin kerrosjärjestystä, jotta käyttäjän määrittelemät luokat noudattavat samoja spesifisyyssääntöjä kuin generoidut utilitit.

### Väriteemat

Chamilo tukee väriteemajärjestelmää, joka voidaan määrittää suoraan ylläpitokäyttöliittymästä (**Ylläpito > Väriteemat**). Jokainen tallennettu teema kirjoittaa tiedostonsa omaan hakemistoonsa polun `var/themes/` alle:

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS custom properties for the full color palette
    ├── default.css      # Optional additional custom CSS rules
    ├── learnpath.css    # Learning path-specific overrides
    ├── tiny-settings.js # TinyMCE editor color palette settings
    └── images/          # Theme images (logo, favicon, backgrounds, PWA icons)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Background images, admin block images, etc.
```

`colors.css` määrittelee CSS-muuttujat välilyönnein erotettuina RGB-kanavakolmikkoina eikä `rgb()`-arvoina, jolloin Tailwind voi muodostaa peittävyysvariantteja (esim. `bg-primary/50`) ilman lisäkonfiguraatiota:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Teemakerros asettuu käännetyn Tailwind/SCSS-paketin päälle: selain lataa `colors.css`-tiedoston päätyylitiedoston jälkeen, joten teeman muutokset tulevat voimaan heti ilman käännösvaihetta.