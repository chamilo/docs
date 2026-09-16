# سمات الألوان

يستخدم Chamilo 2.0 نظام سمات ألوان مدفوع بالقاعدة البيانات. يتم إدارة السمات من خلال واجهة المستخدم الإدارية، وتُخزن في قاعدة البيانات، وتُكتب على القرص كملفات CSS. يمكن تخصيصها لكل عنوان URL للوصول، مما يسمح للتثبيتات متعددة الـ URL بامتلاك هويات بصرية مختلفة.

## نموذج البيانات

يدير نظام السمات كيانان:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| Field | Type | Description |
|-------|------|-------------|
| `id` | int | Primary key |
| `title` | string | Human-readable name |
| `slug` | string | Auto-generated from `title` (e.g. `"My Theme"` → `my-theme`); used as the directory name in `var/themes/` |
| `variables` | array (JSON) | Map of CSS custom property name → value (e.g. `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

يربط `ColorTheme` بـ `AccessUrl`. يشير العلم المنطقي `active` إلى السمة النشطة حاليًا لهذا العنوان URL. يمكن أن تكون سمة واحدة فقط نشطة لكل عنوان URL للوصول في وقت واحد.

## كيفية تخزين السمات

عند إنشاء سمة أو تحديثها عبر API، يولد `ColorThemeStateProcessor` ملف CSS ويكتبه إلى Flysystem `themes_filesystem` (مدعوم بـ `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

يلف الملف المُولد `colors.css` جميع المتغيرات في كتلة `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

تكون القيم ثلاثيات قنوات RGB مفصولة بمسافات (وليست `rgb()`)، مما يسمح لـ Tailwind بتكوين متغيرات الشفافية مثل `bg-primary/50` دون تكوين إضافي.

## أولوية حل السمات

يحدد `ThemeHelper::getVisualTheme()` أي slug للسمة يتم تطبيقه على أي صفحة معينة، بهذا الترتيب:

1. **السمة النشطة لـ AccessUrl الحالي** — سجل `AccessUrlRelColorTheme` مع `active = true`
2. **السمة المختارة من المستخدم** — السمة المخزنة في كيان `User`، إذا كان إعداد المنصة `profile.user_selected_theme` مفعلاً
3. **سمة المقرر الدراسي** — إعداد المقرر `course_theme`، إذا كان إعداد المنصة `course.allow_course_theme` مفعلاً
4. **سمة مسار التعلم** — قيمة `$lp_theme_css` لـ LP، إذا كان إعداد المقرر `allow_learning_path_theme` مفعلاً
5. **`THEME_FALLBACK` env var** — مُعيَّن في `.env` كـ `THEME_FALLBACK='chamilo'`
6. **افتراضي** — `chamilo` (مُشفَّر بشكل صلب كـ `ThemeHelper::DEFAULT_THEME`)

## تقديم الموارد

تُقدَّم موارد السمات بواسطة `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) تحت بادئة `/themes`.

| Route | Purpose |
|-------|---------|
| `GET /themes/{name}/{path}` | Serve any theme asset (CSS, JS, images); falls back to `chamilo` theme if not found in the requested theme |
| `GET /themes/{slug}/logo/{type}` | Serve the preferred logo (`header` or `email`), with SVG → PNG fallback |
| `POST /themes/{slug}/logos` | Upload header/email logos (SVG and/or PNG) |
| `DELETE /themes/{slug}/logos/{type}` | Delete a specific logo |

يُرجع مسار المورد العام (`/{name}/{path}`) تلقائيًا إلى سمة `chamilo` الافتراضية عندما يكون ملف مفقودًا من السمة المطلوبة، لذا تحتاج السمات فقط إلى تضمين الملفات التي تغطيها فعليًا.

## كيفية تحميل السمات في القوالب

يحمل قالب التخطيط `head.html.twig` موارد السمة النشطة عبر دوال مساعدة Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

تحل الدالتين Twig الثلاث (المسجلة في `ChamiloExtension`) مسار المورد عبر `ThemeHelper`، مطبقة نفس سلسلة الرجوع أعلاه:

| Function | Returns |
|----------|---------|
| `theme_asset('path')` | URL to the asset in the resolved theme |
| `theme_asset_link_tag('path')` | Full `<link rel="stylesheet">` tag |
| `theme_asset_script_tag('path')` | Full `<script src="...">` tag |
| `theme_asset_base64('path')` | Base64-encoded data URI of the asset |
| `theme_logo('header'\|'email')` | URL to the best available logo |

## نقاط نهاية API

يتم عرض إدارة السمات عبر REST API لـ API Platform (خاص بالإداريين فقط):

| Method | Endpoint | Purpose |
|--------|----------|---------|
| `POST` | `/api/color_themes` | Create a new theme |
| `PUT` | `/api/color_themes/{id}` | Update an existing theme |
| `POST` | `/api/access_url_rel_color_themes` | Associate/activate a theme for an access URL |
| `GET` | `/api/access_url_rel_color_themes` | List theme associations for the current access URL |

---

---
## إنشاء سمة مخصصة

السير العملي القياسي يكون من خلال واجهة المسؤول (**Admin → Color Themes**)، والتي تستدعي نقاط نهاية الـ API المذكورة أعلاه. لإنشاء سمة برمجيًا:

1. `POST /api/color_themes` مع جسم JSON:

```json
{
  "title": "My Theme",
  "variables": {
    "--color-primary-base": "30 90 140",
    "--color-primary-gradient": "20 60 100",
    "--color-primary-button-text": "30 90 140",
    "--color-primary-button-alternative-text": "255 255 255",
    "--color-secondary-base": "200 80 30",
    "--color-secondary-gradient": "160 60 20",
    "--color-secondary-button-text": "255 255 255"
  }
}
```

هذا يحفظ الكيان ويكتب `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` لربطها وتفعيلها لـ access URL الحالي:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

لإضافة صور مخصصة (شعار، favicon، خلفيات)، قم برفعها عبر `POST /themes/{slug}/logos` أو ضعها مباشرة في `var/themes/{slug}/images/`.

## مرجع متغيرات الألوان

جميع المتغيرات المتوقعة من تكوين Tailwind الافتراضي:

| المتغير | الغرض |
|----------|---------|
| `--color-primary-base` | لون العلامة التجارية الأساسي |
| `--color-primary-gradient` | نقطة توقف التدرج الأغمق للأساسي |
| `--color-primary-button-text` | لون نص الأزرار الأساسية |
| `--color-primary-button-alternative-text` | لون نص بديل على الأزرار الأساسية |
| `--color-secondary-base` | لون التمييز الثانوي |
| `--color-secondary-gradient` | نقطة توقف التدرج للثانوي |
| `--color-secondary-button-text` | لون نص الأزرار الثانوية |
| `--color-tertiary-base` | اللون الثالثي |
| `--color-tertiary-gradient` | نقطة توقف التدرج للثالثي |
| `--color-tertiary-button-text` | لون نص الأزرار الثالثية |
| `--color-success-base` | لون حالة النجاح |
| `--color-success-gradient` | نقطة توقف التدرج للنجاح |
| `--color-success-button-text` | لون نص أزرار النجاح |
| `--color-info-base` | لون حالة المعلومات |
| `--color-info-gradient` | نقطة توقف التدرج للمعلومات |
| `--color-info-button-text` | لون نص أزرار المعلومات |
| `--color-warning-base` | لون حالة التحذير |
| `--color-warning-gradient` | نقطة توقف التدرج للتحذير |
| `--color-warning-button-text` | لون نص أزرار التحذير |
| `--color-danger-base` | لون حالة الخطر/الخطأ |
| `--color-danger-gradient` | نقطة توقف التدرج للخطر |
| `--color-danger-button-text` | لون نص أزرار الخطر |
| `--color-form-base` | لون التمييز لعناصر النموذج |