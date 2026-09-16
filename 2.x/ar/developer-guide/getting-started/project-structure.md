# هيكل المشروع

## المجلدات الرئيسية العليا

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

## كود المصدر (`src/`)

### CoreBundle

أكبر حزمة. مجلدات فرعية بارزة:

| المجلد | المحتويات |
|--------|------------|
| `Entity/` | كيانات Doctrine (User, Course, Session, ResourceNode, إلخ.) |
| `Controller/` | وحدات التحكم الإدارية، وحدات التحكم في إجراءات API، ووحدات التحكم في الصفحات (مجلد Api/ يحتوي على إجراءات منصة API المخصصة) |
| `Settings/` | ملفات مخطط الإعدادات (تكوين المنصة) |
| `Repository/` | مستودعات Doctrine |
| `AiProvider/` | تنفيذات مزودي الذكاء الاصطناعي (OpenAI، Gemini، Mistral، DeepSeek، Grok) |
| `Tool/` | تعريفات أدوات الدورة |
| `Security/` | ناخبون، مصادقون، تفويض |
| `EventListener/` | مستمعو الأحداث |
| `EventSubscriber/` | مشتركو الأحداث |
| `Command/` | أوامر وحدة التحكم Symfony |
| `Migrations/` | عمليات نقل قاعدة البيانات |
| `Twig/` | امتدادات Twig |
| `Storage/` | محولات تخزين Flysystem |

### CourseBundle

كيانات منطق الدورة الخاصة بالدورة:

| المجلد | المحتويات |
|--------|------------|
| `Entity/` | كيانات محتوى الدورة (CDocument، CQuiz، CLp، CForum، CStudentPublication، إلخ.) |
| `Controller/` | وحدات التحكم في الدورة |
| `Settings/` | مخططات إعدادات مستوى الدورة |
| `Component/CourseCopy/` | استيراد/تصدير الدورة (Common Cartridge، Moodle) |

### LtiBundle

تكامل LTI 1.3:

| المجلد | المحتويات |
|--------|------------|
| `Entity/` | كيانات منصة LTI، وأداة، ونشر |
| `Controller/` | نقاط نهاية إطلاق LTI وتكوين |

---
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

---
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

يدمج Symfony تلقائيًا ملفات `packages/*.yaml` الأساسية مع تلك الموجودة في مجلد البيئة المتطابق (`dev/`، أو `prod/`، أو `test/`)، لذا لا تحتاج ملفات محددة للبيئة إلا إلى تجاوز القيم التي تختلف.

## إعدادات البناء

| الملف | الغرض |
|-------|-------|
| `webpack.config.js` | إعدادات Webpack Encore (المدخلات، المحملات، الإضافات) |
| `tailwind.config.js` | إعدادات Tailwind CSS (مسارات المحتوى، امتدادات الثيم، الإضافات) |
| `tsconfig.json` | إعدادات TypeScript |
| `eslint.config.mjs` | قواعد ESLint (تكوين مسطح) |
| `.prettierrc.json` | قواعد تنسيق Prettier |

توجد جميع الملفات في جذر المشروع. تُعد إضافات PostCSS (Tailwind + Autoprefixer) داخل `webpack.config.js` عبر `enablePostCssLoader()` — لا يوجد `postcss.config.js` مستقل. يقرأ `webpack.config.js` ملف `tailwind.config.js` بشكل غير مباشر عبر PostCSS، لذا تظهر التغييرات في أقسام `content` أو `theme` الخاصة بـ Tailwind في التشغيل التالي لـ `yarn encore dev` / `yarn encore production`.

## نقاط الدخول لـ Webpack

يُنتج البناء هذه الحزم:

**JavaScript:**
* `vue` — التطبيق الرئيسي لـ Vue 3 (`assets/vue/main.js`)
* `vue_installer` — معالج التثبيت (`assets/vue/main_installer.js`)
* `legacy_app`، `legacy_exercise`، `legacy_lp`، `legacy_document` — JavaScript القديم للصفحات التي لم تُهاجر إلى Vue بعد

**CSS:**
* `app` — ورقة الأنماط الرئيسية (`assets/css/app.scss`)
* بالإضافة إلى أوراق متخصصة: `chat`، `document`، `editor`، `editor_content`، `markdown`، `print`، `responsive`، `scorm`

## هيكل CSS (`assets/css/`)

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

يتم دمج Tailwind عبر PostCSS. `assets/css/_tailwind.scss` يصدر الطبقات الأساسية والمكونات والأدوات؛ `assets/css/app.scss` يستورده أولاً حتى تكون أدوات Tailwind متاحة في جميع الجزئيات الأخرى. تكوين Tailwind — مسارات المحتوى للتنقية، وامتدادات الثيم، والإضافات — موجود في `tailwind.config.js` في جذر المشروع (`/var/www/chamilo/tailwind.config.js`).

الفئات الأدوات المخصصة وفئات المكونات المعرفة باستخدام `@layer` (المرئية في `app.scss`) تتبع اتفاقية الطبقات في Tailwind بحيث تحترم الفئات المعرفة من قبل المستخدم نفس قواعد الخصوصية مثل الأدوات المولدة.

### Color Themes

يدعم Chamilo نظامًا لثيمات الألوان يمكن تهيئته مباشرة من واجهة الإدارة (**Admin > Color Themes**). كل ثيم محفوظ يكتب ملفاته في دليل مخصص تحت `var/themes/`:

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

`colors.css` يعرف خصائص CSS المخصصة كثلاثيات قنوات RGB مفصولة بمسافات بدلاً من قيم `rgb()`، مما يسمح لـ Tailwind بتكوين متغيرات الشفافية (مثل `bg-primary/50`) دون تكوين إضافي:

```css
:root {
    --color-primary-base: 46 117 163;
    --color-secondary-base: 243 126 47;
    /* ... */
}
```

تضع طبقة الثيم فوق حزمة Tailwind/SCSS المجمعة: يقوم المتصفح بتحميل `colors.css` بعد ورقة الأنماط الرئيسية، لذا تطبق تغييرات الثيم فورًا دون خطوة بناء.