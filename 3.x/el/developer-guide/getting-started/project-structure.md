# Δομή Έργου

## Κατάλογοι Ανώτατου Επιπέδου

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

## Πηγαίος Κώδικας (`src/`)

### CoreBundle

Το μεγαλύτερο bundle. Αξιόλογοι υποκατάλογοι:

| Κατάλογος | Περιεχόμενα |
|-----------|----------|
| `Entity/` | Οντότητες Doctrine (User, Course, Session, ResourceNode, κ.λπ.) |
| `Controller/` | Ελεγκτές διαχείρισης, ενεργειών API και σελίδων (ο υποφάκελος Api/ περιέχει προσαρμοσμένες ενέργειες του API Platform) |
| `Settings/` | Αρχεία σχήματος ρυθμίσεων (διαμόρφωση πλατφόρμας) |
| `Repository/` | Αποθετήρια Doctrine |
| `AiProvider/` | Υλοποιήσεις παρόχων AI (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Ορισμοί εργαλείων μαθήματος |
| `Security/` | Voters, authenticators, εξουσιοδότηση |
| `EventListener/` | Ακροατές συμβάντων |
| `EventSubscriber/` | Συνδρομητές συμβάντων |
| `Command/` | Εντολές κονσόλας Symfony |
| `Migrations/` | Μεταναστεύσεις βάσης δεδομένων |
| `Twig/` | Επεκτάσεις Twig |
| `Storage/` | Προσαρμογείς αποθήκευσης Flysystem |

### CourseBundle

Οντότητες και λογική ειδικά για μαθήματα:

| Κατάλογος | Περιεχόμενα |
|-----------|----------|
| `Entity/` | Οντότητες περιεχομένου μαθήματος (CDocument, CQuiz, CLp, CForum, CStudentPublication, κ.λπ.) |
| `Controller/` | Ελεγκτές μαθήματος |
| `Settings/` | Σχήματα ρυθμίσεων σε επίπεδο μαθήματος |
| `Component/CourseCopy/` | Εισαγωγή/εξαγωγή μαθήματος (Common Cartridge, Moodle) |

### LtiBundle

Ενσωμάτωση LTI 1.3:

| Κατάλογος | Περιεχόμενα |
|-----------|----------|
| `Entity/` | Οντότητες πλατφόρμας, εργαλείου και ανάπτυξης LTI |
| `Controller/` | Σημεία εκκίνησης και διαμόρφωσης LTI |

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

## Ρυθμίσεις (`config/`)

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

Το Symfony συγχωνεύει αυτόματα τα βασικά αρχεία `packages/*.yaml` με εκείνα στον αντίστοιχο υποκατάλογο περιβάλλοντος (`dev/`, `prod/` ή `test/`), επομένως τα αρχεία που αφορούν συγκεκριμένο περιβάλλον χρειάζεται να παρακάμπτουν μόνο τις τιμές που διαφέρουν.

## Δοκιμές (`tests/`)

Ο κατάλογος `tests/` **δεν περιλαμβάνεται στα συσκευασμένα πακέτα λήψης του Chamilo** (ZIP/tarball εκδόσεων) — αφαιρείται επειδή δεν έχει σκοπό κατά την εκτέλεση και ορισμένα από τα σενάριά του θα μπορούσαν να αποτελέσουν κίνδυνο αν παρέμεναν σε διακομιστή παραγωγής. Υπάρχει μόνο όταν το έργο λαμβάνεται μέσω `git clone`.

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

| Κατάλογος | Περιεχόμενα |
|-----------|----------|
| `CoreBundle/` | Δοκιμές PHPUnit που αντικατοπτρίζουν το `src/CoreBundle/`: `Api/`, `ApiResource/`, `Command/`, `Controller/`, `DataFixtures/`, `Entity/`, `Event/`, `EventListener/`, `Filter/`, `fixtures/`, `Helpers/`, `Mcp/`, `Migrations/`, `Repository/`, `Security/`, `Serializer/`, `Service/`, `Settings/`, `State/`, `Tool/`, `Traits/`, `Twig/` |
| `CourseBundle/` | Δοκιμές PHPUnit που αντικατοπτρίζουν το `src/CourseBundle/`: `Api/`, `Component/CourseCopy/`, `Repository/`, `Settings/` |
| `datafiller/` | Σενάρια που γεμίζουν μια δοκιμαστική εγκατάσταση με περιεχόμενο επίδειξης: `data_courses.php`, `data_users.php`, `fill_courses.php`, `fill_users.php`, `fill_many_users.php`, `fill_whoisonline.php`, `generate_users.php`, `fill_all.php` (εκτελεί τα υπόλοιπα), καθώς και `images/` και ένα μεγάλο παράδειγμα εισαγωγής χρηστών σε CSV |
| `history/` | Στιγμιότυπα που τεκμηριώνουν τη δομή του Chamilo σε παλαιότερες εκδόσεις (`1.8.8.2`, `1.9.0`, `1.10.0`, `1.11.0`, `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`, που φορτώνεται από το PHPStan κατά την ανάλυση κώδικα Doctrine ORM |
| `playwright/` | Δοκιμές από άκρο σε άκρο στο πρόγραμμα περιήγησης: `features/*.feature` (σενάρια Gherkin που εκτελούνται μέσω [playwright-bdd](https://vitalets.github.io/playwright-bdd/)), `steps/common.steps.ts` (ορισμοί βημάτων TypeScript), `fixtures/` (αρχεία δοκιμών, π.χ. υπολογιστικά φύλλα), `scripts/check-results.mjs`, `playwright.config.ts`, και η παραγόμενη έξοδος `.features-gen/`. Αντικαθιστά την παλιά σουίτα Behat, της οποίας τα σενάρια παραμένουν στο ιστορικό του git για αναφορά |
| `procedures/` | Υπολογιστικά φύλλα (προς το παρόν `spanish/`) που χρησιμοποιούνται ως βάση λίστας ελέγχου για χειροκίνητη ποιοτική ανασκόπηση λειτουργιών |
| `scripts/` | Μεμονωμένα σενάρια συντήρησης/διόρθωσης/μετάβασης για υπάρχουσες πύλες Chamilo (κυρίως στοχευμένα σε παλαιότερες εκδόσεις), καθώς και υποφάκελοι `git-hooks/`, `img/`, `lang/` και `packaging/` |

Δείτε το [Δοκιμές](../contributing/testing.md) για το πώς να ρυθμίσετε τη βάση δεδομένων δοκιμών και να εκτελέσετε τις σουίτες PHPUnit και Playwright.

## Ρύθμιση κατασκευής

| Αρχείο | Σκοπός |
|------|---------|
| `webpack.config.js` | Ρύθμιση Webpack Encore (entries, loaders, plugins) |
| `tailwind.config.js` | Ρύθμιση Tailwind CSS (διαδρομές περιεχομένου, επεκτάσεις θέματος, πρόσθετα) |
| `tsconfig.json` | Ρύθμιση TypeScript |
| `eslint.config.mjs` | Κανόνες ESLint (flat config) |
| `.prettierrc.json` | Κανόνες μορφοποίησης Prettier |

Όλα τα αρχεία βρίσκονται στη ρίζα του έργου. Τα πρόσθετα PostCSS (Tailwind + Autoprefixer) ρυθμίζονται ενσωματωμένα μέσα στο `webpack.config.js` μέσω `enablePostCssLoader()` — δεν υπάρχει αυτόνομο `postcss.config.js`. Το `webpack.config.js` διαβάζει το `tailwind.config.js` έμμεσα μέσω PostCSS, επομένως οι αλλαγές στις ενότητες `content` ή `theme` του Tailwind ισχύουν στην επόμενη εκτέλεση `yarn encore dev` / `yarn encore production`.

## Σημεία εισόδου Webpack

Η κατασκευή παράγει αυτά τα πακέτα:

**JavaScript:**
* `vue` — Κύρια εφαρμογή Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Οδηγός εγκατάστασης (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Κληρονομημένο JS για σελίδες που δεν έχουν ακόμη μεταφερθεί στο Vue

**CSS:**
* `app` — Κύριο φύλλο στυλ (`assets/css/app.scss`)
* Επιπλέον εξειδικευμένα φύλλα: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

## Δομή CSS (`assets/css/`)

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

Το Tailwind ενσωματώνεται μέσω PostCSS. Το `assets/css/_tailwind.scss` εκπέμπει τα επίπεδα base, component και utility· το `assets/css/app.scss` το εισάγει πρώτο ώστε τα βοηθητικά (utilities) του Tailwind να είναι διαθέσιμα σε όλα τα υπόλοιπα partials. Η διαμόρφωση του Tailwind — διαδρομές περιεχομένου για purging, επεκτάσεις θέματος και πρόσθετα — βρίσκεται στο `tailwind.config.js` στη ρίζα του έργου (`/var/www/chamilo/tailwind.config.js`).

Οι προσαρμοσμένες κλάσεις utility και component που ορίζονται με `@layer` (ορατές στο `app.scss`) ακολουθούν τη σύμβαση επιπέδων του Tailwind, ώστε οι κλάσεις που ορίζει ο χρήστης να υπακούουν στους ίδιους κανόνες ειδικότητας με τα παραγόμενα utilities.

### Χρωματικά θέματα

Το Chamilo υποστηρίζει σύστημα χρωματικών θεμάτων που μπορεί να ρυθμιστεί απευθείας από τη διεπαφή διαχειριστή (**Διαχείριση > Χρωματικά θέματα**). Κάθε αποθηκευμένο θέμα γράφει τα αρχεία του σε αποκλειστικό κατάλογο κάτω από το `var/themes/`:

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

Το `colors.css` ορίζει προσαρμοσμένες ιδιότητες CSS ως τριάδες καναλιών RGB διαχωρισμένες με κενά αντί για τιμές `rgb()`, γεγονός που επιτρέπει στο Tailwind να συνθέτει παραλλαγές αδιαφάνειας (π.χ. `bg-primary/50`) χωρίς επιπλέον διαμόρφωση:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Το επίπεδο θέματος βρίσκεται πάνω από το μεταγλωττισμένο πακέτο Tailwind/SCSS: το πρόγραμμα περιήγησης φορτώνει το `colors.css` μετά το κύριο φύλλο στυλ, ώστε οι αλλαγές θέματος να ισχύουν αμέσως χωρίς βήμα build.