# Δομή Έργου

## Βασικοί Κατάλογοι

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

Το μεγαλύτερο bundle. Σημαντικοί υποκατάλογοι:

| Κατάλογος | Περιεχόμενα |
|-----------|-------------|
| `Entity/` | Doctrine entities (User, Course, Session, ResourceNode, etc.) |
| `Controller/` | Admin, API action, and page controllers (the Api/ subfolder holds custom API Platform actions) |
| `Settings/` | Settings schema files (platform configuration) |
| `Repository/` | Doctrine repositories |
| `AiProvider/` | AI provider implementations (OpenAI, Gemini, Mistral, DeepSeek, Grok) |
| `Tool/` | Course tool definitions |
| `Security/` | Voters, authenticators, authorization |
| `EventListener/` | Event listeners |
| `EventSubscriber/` | Event subscribers |
| `Command/` | Symfony console commands |
| `Migrations/` | Database migrations |
| `Twig/` | Twig extensions |
| `Storage/` | Flysystem storage adapters |

### CourseBundle

Οντότητες και λογική ειδικά για μαθήματα:

| Κατάλογος | Περιεχόμενα |
|-----------|-------------|
| `Entity/` | Course-content entities (CDocument, CQuiz, CLp, CForum, CStudentPublication, etc.) |
| `Controller/` | Course controllers |
| `Settings/` | Course-level settings schemas |
| `Component/CourseCopy/` | Course import/export (Common Cartridge, Moodle) |

### LtiBundle

Ενσωμάτωση LTI 1.3:

| Κατάλογος | Περιεχόμενα |
|-----------|-------------|
| `Entity/` | LTI platform, tool, and deployment entities |
| `Controller/` | LTI launch and configuration endpoints |

---
## Frontend (`assets/vue/`)

```
assets/vue/
├── main.js              # Σημείο εισόδου εφαρμογής
├── main_installer.js    # Σημείο εισόδου εγκαταστάτη
├── components/          # Επαναχρησιμοποιήσιμα Vue components
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

---
## Ρύθμιση (`config/`)

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

Το Symfony συγχωνεύει αυτόματα τα βασικά αρχεία `packages/*.yaml` με αυτά στον αντίστοιχο υποφάκελο περιβάλλοντος (`dev/`, `prod/`, ή `test/`), έτσι τα αρχεία ειδικά για το περιβάλλον χρειάζεται να αντικαθιστούν μόνο τις τιμές που διαφέρουν.

## Ρύθμιση κατασκευής

| Αρχείο | Σκοπός |
|--------|--------|
| `webpack.config.js` | Ρύθμιση Webpack Encore (εισαγωγές, loaders, plugins) |
| `tailwind.config.js` | Ρύθμιση Tailwind CSS (μονοπάτια περιεχομένου, επεκτάσεις θέματος, plugins) |
| `tsconfig.json` | Ρύθμιση TypeScript |
| `eslint.config.mjs` | Κανόνες ESLint (flat config) |
| `.prettierrc.json` | Κανόνες μορφοποίησης Prettier |

Όλα τα αρχεία βρίσκονται στη ρίζα του έργου. Τα plugins PostCSS (Tailwind + Autoprefixer) ρυθμίζονται εν σειρά μέσα στο `webpack.config.js` μέσω `enablePostCssLoader()` — δεν υπάρχει αυτόνομο `postcss.config.js`. Το `webpack.config.js` διαβάζει το `tailwind.config.js` έμμεσα μέσω PostCSS, έτσι οι αλλαγές στις ενότητες `content` ή `theme` του Tailwind ισχύουν στην επόμενη εκτέλεση `yarn encore dev` / `yarn encore production`.

## Σημεία εισόδου Webpack

Η κατασκευή παράγει τα εξής bundles:

**JavaScript:**
* `vue` — Κύρια εφαρμογή Vue 3 (`assets/vue/main.js`)
* `vue_installer` — Οδηγός εγκατάστασης (`assets/vue/main_installer.js`)
* `legacy_app`, `legacy_exercise`, `legacy_lp`, `legacy_document` — Legacy JS για σελίδες που δεν έχουν ακόμη μετεγκατασταθεί σε Vue

**CSS:**
* `app` — Κύριο stylesheet (`assets/css/app.scss`)
* Συν εξειδικευμένα sheets: `chat`, `document`, `editor`, `editor_content`, `markdown`, `print`, `responsive`, `scorm`

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

---
### Tailwind CSS

Το Tailwind ενσωματώνεται μέσω PostCSS. Το `assets/css/_tailwind.scss` παράγει τα στρώματα base, component και utility· το `assets/css/app.scss` το εισάγει πρώτο ώστε οι λειτουργίες Tailwind να είναι διαθέσιμες σε όλα τα άλλα partials. Η διαμόρφωση Tailwind — μονοπάτια περιεχομένου για καθαρισμό, επεκτάσεις θέματος και plugins — βρίσκεται στο `tailwind.config.js` στη ρίζα του έργου (`/var/www/chamilo/tailwind.config.js`).

Οι προσαρμοσμένες κλάσεις utility και οι κλάσεις component που ορίζονται με `@layer` (ορατές στο `app.scss`) ακολουθούν τη σύμβαση στρωματοποίησης του Tailwind ώστε οι κλάσεις που ορίζει ο χρήστης να σέβονται τους ίδιους κανόνες ειδικότητας με τις γενόμενες λειτουργίες.

### Χρωματικά Θέματα

Το Chamilo υποστηρίζει σύστημα χρωματικής θεματοποίησης που μπορεί να διαμορφωθεί απευθείας από τη διεπαφή διαχειριστή (**Admin > Color Themes**). Κάθε αποθηκευμένο θέμα γράφει τα αρχεία του σε ειδικό κατάλογο κάτω από το `var/themes/`:

```
var/themes/
└── [theme-name]/
    ├── colors.css       # CSS custom properties για την πλήρη χρωματική παλέτα
    ├── default.css      # Προαιρετικοί επιπλέον κανόνες προσαρμοσμένου CSS
    ├── learnpath.css    # Ειδικές παρακάμψεις για μονοπάτια μάθησης
    ├── tiny-settings.js # Ρυθμίσεις χρωματικής παλέτας του επεξεργαστή TinyMCE
    └── images/          # Εικόνες θέματος (logo, favicon, φόντα, εικόνες PWA)
        ├── header-logo.png / header-logo.svg
        ├── favicon.ico
        ├── pwa-icons/   # icon-192.png, icon-512.png
        └── ...          # Εικόνες φόντου, εικόνες μπλοκ διαχειριστή, κ.λπ.
```

Το `colors.css` ορίζει CSS custom properties ως τριάδες καναλιών RGB χωρισμένες με κενά αντί για τιμές `rgb()`, κάτι που επιτρέπει στο Tailwind να συνθέτει παραλλαγές αδιαφανούς (π.χ. `bg-primary/50`) χωρίς επιπλέον διαμόρφωση:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

Το στρώμα θέματος βρίσκεται πάνω από το μεταγλωττισμένο πακέτο Tailwind/SCSS: ο περιηγητής φορτώνει το `colors.css` μετά το κύριο stylesheet, οπότε οι αλλαγές θέματος εφαρμόζονται άμεσα χωρίς βήμα κατασκευής.