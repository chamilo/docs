# هيكل المشروع

## الدلائل ذات المستوى الأعلى

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

## الشيفرة المصدرية (`src/`)

### CoreBundle

أكبر حزمة. الدلائل الفرعية البارزة:

| الدليل | المحتويات |
|-----------|----------|
| `Entity/` | كيانات Doctrine (User، Course، Session، ResourceNode، إلخ.) |
| `Controller/` | وحدات تحكم الإدارة وإجراءات API والصفحات (المجلد الفرعي Api/ يحتوي على إجراءات API Platform المخصصة) |
| `Settings/` | ملفات مخطط الإعدادات (تهيئة المنصة) |
| `Repository/` | مستودعات Doctrine |
| `AiProvider/` | تنفيذات مزوّدي الذكاء الاصطناعي (OpenAI، Gemini، Mistral، DeepSeek، Grok) |
| `Tool/` | تعريفات أدوات المقرر |
| `Security/` | المصوّتون والمصادِقون والتفويض |
| `EventListener/` | مستمعو الأحداث |
| `EventSubscriber/` | مشترِكو الأحداث |
| `Command/` | أوامر وحدة تحكم Symfony |
| `Migrations/` | ترحيلات قاعدة البيانات |
| `Twig/` | امتدادات Twig |
| `Storage/` | محوّلات تخزين Flysystem |

### CourseBundle

الكيانات والمنطق الخاصان بالمقرر:

| الدليل | المحتويات |
|-----------|----------|
| `Entity/` | كيانات محتوى المقرر (CDocument، CQuiz، CLp، CForum، CStudentPublication، إلخ.) |
| `Controller/` | وحدات تحكم المقرر |
| `Settings/` | مخططات إعدادات مستوى المقرر |
| `Component/CourseCopy/` | استيراد/تصدير المقرر (Common Cartridge، Moodle) |

### LtiBundle

تكامل LTI 1.3:

| الدليل | المحتويات |
|-----------|----------|
| `Entity/` | كيانات منصة LTI والأداة والنشر |
| `Controller/` | نقاط نهاية تشغيل LTI والتهيئة |

## الواجهة الأمامية (`assets/vue/`)

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

## الإعدادات (`config/`)

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

يدمج Symfony تلقائيًا ملفات `packages/*.yaml` الأساسية مع تلك الموجودة في المجلد الفرعي المطابق للبيئة (`dev/` أو `prod/` أو `test/`)، لذا تحتاج الملفات الخاصة بالبيئة فقط إلى تجاوز القيم التي تختلف.

## الاختبارات (`tests/`)

المجلد `tests/` **غير مضمَّن في حزم تنزيل Chamilo** (ملفات ZIP/tarball للإصدارات) — يُزال لأنه لا غرض له في وقت التشغيل وقد تشكّل بعض سكربتاته خطرًا إن تُركت على خادم إنتاج. وهو موجود فقط عند الحصول على المشروع عبر `git clone`.

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

| المجلد | المحتويات |
|-----------|----------|
| `CoreBundle/` | اختبارات PHPUnit تعكس `src/CoreBundle/`: `Api/`، `ApiResource/`، `Command/`، `Controller/`، `DataFixtures/`، `Entity/`، `Event/`، `EventListener/`، `Filter/`، `fixtures/`، `Helpers/`، `Mcp/`، `Migrations/`، `Repository/`، `Security/`، `Serializer/`، `Service/`، `Settings/`، `State/`، `Tool/`، `Traits/`، `Twig/` |
| `CourseBundle/` | اختبارات PHPUnit تعكس `src/CourseBundle/`: `Api/`، `Component/CourseCopy/`، `Repository/`، `Settings/` |
| `datafiller/` | سكربتات تملأ تثبيتًا اختباريًا بمحتوى تجريبي: `data_courses.php`، `data_users.php`، `fill_courses.php`، `fill_users.php`، `fill_many_users.php`، `fill_whoisonline.php`، `generate_users.php`، `fill_all.php` (يشغّل البقية)، إضافة إلى `images/` ومثال كبير لاستيراد المستخدمين بصيغة CSV |
| `history/` | لقطات توثّق بنية Chamilo في إصدارات سابقة (`1.8.8.2`، `1.9.0`، `1.10.0`، `1.11.0`، `2.0`) |
| `phpstan/` | `doctrine-orm-bootstrap.php`، يحمّله PHPStan عند تحليل شيفرة Doctrine ORM |
| `playwright/` | اختبارات طرف-إلى-طرف في المتصفح: `features/*.feature` (سيناريوهات Gherkin تُشغَّل عبر [playwright-bdd](https://vitalets.github.io/playwright-bdd/))، `steps/common.steps.ts` (تعريفات الخطوات بلغة TypeScript)، `fixtures/` (ملفات اختبار، مثل جداول البيانات)، `scripts/check-results.mjs`، `playwright.config.ts`، والمخرجات المولَّدة في `.features-gen/`. يحل محل مجموعة Behat القديمة التي تبقى سيناريوهاتها في تاريخ git للمرجع |
| `procedures/` | جداول بيانات (حاليًا `spanish/`) تُستخدم أساسًا لقائمة تحقق في المراجعة اليدوية لجودة الميزات |
| `scripts/` | سكربتات صيانة/إصلاح/ترحيل لمرة واحدة لبوابات Chamilo القائمة (تستهدف في الغالب إصدارات أقدم)، إضافة إلى المجلدات الفرعية `git-hooks/` و`img/` و`lang/` و`packaging/` |

راجع [الاختبار](../contributing/testing.md) لمعرفة كيفية إعداد قاعدة بيانات الاختبار وتشغيل مجموعتي PHPUnit وPlaywright.

## إعدادات البناء

| الملف | الغرض |
|------|---------|
| `webpack.config.js` | إعداد Webpack Encore (نقاط الدخول، المحمّلات، الإضافات) |
| `tailwind.config.js` | إعداد Tailwind CSS (مسارات المحتوى، امتدادات السمة، الإضافات) |
| `tsconfig.json` | إعداد TypeScript |
| `eslint.config.mjs` | قواعد ESLint (إعداد مسطّح) |
| `.prettierrc.json` | قواعد تنسيق Prettier |

تقع جميع الملفات في جذر المشروع. تُضبط إضافات PostCSS (Tailwind + Autoprefixer) ضمنيًا داخل `webpack.config.js` عبر `enablePostCssLoader()` — ولا يوجد ملف مستقل `postcss.config.js`. يقرأ `webpack.config.js` ملف `tailwind.config.js` بشكل غير مباشر عبر PostCSS، لذا تسري التغييرات على أقسام `content` أو `theme` في Tailwind عند التشغيل التالي لـ `yarn encore dev` / `yarn encore production`.

## نقاط دخول Webpack

ينتج البناء هذه الحزم:

**JavaScript:**
* `vue` — تطبيق Vue 3 الرئيسي (`assets/vue/main.js`)
* `vue_installer` — معالج التثبيت (`assets/vue/main_installer.js`)
* `legacy_app`، `legacy_exercise`، `legacy_lp`، `legacy_document` — JavaScript قديم للصفحات التي لم تُرحَّل بعد إلى Vue

**CSS:**
* `app` — ورقة الأنماط الرئيسية (`assets/css/app.scss`)
* إضافة إلى أوراق متخصصة: `chat`، `document`، `editor`، `editor_content`، `markdown`، `print`، `responsive`، `scorm`

## بنية CSS ‏(`assets/css/`)

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

يُدمج Tailwind عبر PostCSS. يُصدِر `assets/css/_tailwind.scss` طبقات الأساس والمكوّنات والأدوات المساعدة؛ ويستورده `assets/css/app.scss` أولاً حتى تكون أدوات Tailwind المساعدة متاحة في جميع الأجزاء الأخرى. إعدادات Tailwind — مسارات المحتوى للتنقية، وامتدادات السمة، والإضافات — موجودة في `tailwind.config.js` في جذر المشروع (`/var/www/chamilo/tailwind.config.js`).

تتبع فئات الأدوات المساعدة المخصّصة وفئات المكوّنات المعرَّفة بـ `@layer` (الظاهرة في `app.scss`) اصطلاح طبقات Tailwind حتى تحترم الفئات التي يعرّفها المستخدم قواعد التخصيص نفسها التي تتبعها الأدوات المساعدة المُولَّدة.

### سمات الألوان

يدعم Chamilo نظام سمات ألوان يمكن ضبطه مباشرة من واجهة الإدارة (**الإدارة > سمات الألوان**). يكتب كل سمة محفوظة ملفاتها في دليل مخصّص تحت `var/themes/`:

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

يعرّف `colors.css` خصائص CSS المخصّصة كثلاثيات قنوات RGB مفصولة بمسافات بدلاً من قيم `rgb()`، مما يتيح لـ Tailwind تركيب متغيرات الشفافية (مثل `bg-primary/50`) دون إعداد إضافي:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

تقع طبقة السمة فوق حزمة Tailwind/SCSS المُجمَّعة: يحمّل المتصفح `colors.css` بعد ورقة الأنماط الرئيسية، فتُطبَّق تغييرات السمة فوراً دون خطوة بناء.