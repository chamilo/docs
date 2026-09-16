# سمات الألوان

يستخدم Chamilo 3.0 نظام سمات ألوان يعتمد على قاعدة البيانات. تُدار السمات عبر واجهة المسؤول، وتُخزَّن في قاعدة البيانات، وتُكتب على القرص كملفات CSS. ويمكن تخصيصها لكل عنوان وصول (access URL)، مما يتيح لمنشآت متعددة العناوين هويات بصرية مختلفة.

## نموذج البيانات

كيانان يقودان نظام السمات:

**`ColorTheme`** (`src/CoreBundle/Entity/ColorTheme.php`)

| الحقل | النوع | الوصف |
|-------|------|-------------|
| `id` | int | المفتاح الأساسي |
| `title` | string | اسم مقروء للإنسان |
| `slug` | string | يُولَّد تلقائيًا من `title` (مثل `"My Theme"` → `my-theme`)؛ يُستخدم كاسم المجلد في `var/themes/` |
| `variables` | array (JSON) | خريطة من اسم خاصية CSS مخصصة → القيمة (مثل `{"--color-primary-base": "46 117 163"}`) |

**`AccessUrlRelColorTheme`** (`src/CoreBundle/Entity/AccessUrlRelColorTheme.php`)

يربط `ColorTheme` بـ `AccessUrl`. يحدّد العلم المنطقي `active` أي سمة نشطة حاليًا لذلك العنوان. يمكن أن تكون سمة واحدة فقط نشطة لكل عنوان وصول في الوقت نفسه.

## كيفية تخزين السمات

عند إنشاء سمة أو تحديثها عبر API، يولّد `ColorThemeStateProcessor` ملف CSS ويكتبه إلى Flysystem `themes_filesystem` (المدعوم بـ `var/themes/`):

```
var/themes/
└── {slug}/
    └── colors.css   ← generated from ColorTheme.variables
```

يلفّ الملف المولَّد `colors.css` جميع المتغيرات داخل كتلة `:root`:

```css
:root {
  --color-primary-base: 46 117 163;
  --color-secondary-base: 243 126 47;
  --color-tertiary-base: 51 51 51;
  /* ... */
}
```

القيم هي ثلاثيات قنوات RGB مفصولة بمسافات (وليس `rgb()`)، مما يتيح لـ Tailwind تركيب متغيرات الشفافية مثل `bg-primary/50` دون إعداد إضافي.

## أولوية حل السمة

يحلّ `ThemeHelper::getVisualTheme()` أي معرّف سمة (slug) يُطبَّق على أي صفحة، بهذا الترتيب:

1. **السمة النشطة لـ AccessUrl الحالي** — سجل `AccessUrlRelColorTheme` حيث `active = true`
2. **السمة التي اختارها المستخدم** — السمة المخزَّنة على كيان `User`، إذا كان إعداد المنصة `profile.user_selected_theme` مفعّلًا
3. **سمة المقرر** — إعداد المقرر `course_theme`، إذا كان إعداد المنصة `course.allow_course_theme` مفعّلًا
4. **سمة مسار التعلّم** — قيمة `$lp_theme_css` الخاصة بمسار التعلّم، إذا كان إعداد المقرر `allow_learning_path_theme` مفعّلًا
5. **متغير البيئة `THEME_FALLBACK`** — يُضبط في `.env` كـ `THEME_FALLBACK='chamilo'`
6. **الافتراضي** — `chamilo` (مُرمَّز ثابتًا كـ `ThemeHelper::DEFAULT_THEME`)

## تقديم الأصول

تُقدَّم أصول السمات بواسطة `ThemeController` (`src/CoreBundle/Controller/ThemeController.php`) تحت البادئة `/themes`.

| المسار | الغرض |
|-------|---------|
| `GET /themes/{name}/{path}` | تقديم أي أصل للسمة (CSS، JS، صور)؛ يعود إلى سمة `chamilo` إذا لم يُوجد في السمة المطلوبة |
| `GET /themes/{slug}/logo/{type}` | تقديم الشعار المفضّل (`header` أو `email`)، مع احتياطي SVG → PNG |
| `POST /themes/{slug}/logos` | رفع شعارات الرأس/البريد (SVG و/أو PNG) |
| `DELETE /themes/{slug}/logos/{type}` | حذف شعار محدد |

مسار الأصول العام (`/{name}/{path}`) يعود تلقائيًا إلى سمة `chamilo` الافتراضية عندما يكون الملف مفقودًا من السمة المطلوبة، لذا تحتاج السمات فقط إلى تضمين الملفات التي تتجاوزها فعليًا.

## كيفية تحميل السمات في القوالب

قالب التخطيط `head.html.twig` يحمّل أصول السمة النشطة عبر دوال مساعدة في Twig:

```twig
{# Inject the theme's color variables #}
{{ theme_asset_link_tag('colors.css') }}

{# Inject TinyMCE color palette #}
{{ theme_asset_script_tag('tiny-settings.js') }}

{# Reference other theme assets #}
<link rel="shortcut icon" href="{{ theme_asset('images/favicon.ico') }}" type="image/x-icon" />
```

الدوال الثلاث في Twig (المسجَّلة في `ChamiloExtension`) تحل مسار الأصل عبر `ThemeHelper`، مطبّقة سلسلة الاحتياطي نفسها أعلاه:

| الدالة | تُرجع |
|----------|---------|
| `theme_asset('path')` | عنوان URL للأصل في السمة المحلولة |
| `theme_asset_link_tag('path')` | وسم `<link rel="stylesheet">` كامل |
| `theme_asset_script_tag('path')` | وسم `<script src="...">` كامل |
| `theme_asset_base64('path')` | URI بيانات مرمَّز بـ Base64 للأصل |
| `theme_logo('header'\|'email')` | عنوان URL لأفضل شعار متاح |

## نقاط نهاية API

تُعرَض إدارة السمات عبر REST API الخاص بـ API Platform (للمسؤولين فقط):

| الطريقة | نقطة النهاية | الغرض |
|--------|----------|---------|
| `POST` | `/api/color_themes` | إنشاء سمة جديدة |
| `PUT` | `/api/color_themes/{id}` | تحديث سمة موجودة |
| `POST` | `/api/access_url_rel_color_themes` | ربط/تفعيل سمة لعنوان وصول |
| `GET` | `/api/access_url_rel_color_themes` | سرد ارتباطات السمات لعنوان الوصول الحالي |

## إنشاء سمة مخصصة

سير العمل القياسي يتم عبر واجهة المسؤول (**المسؤول → سمات الألوان**)، التي تستدعي نقاط نهاية واجهة البرمجة أعلاه. لإنشاء سمة برمجيًا:

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

يحفظ هذا الكيان ويكتب `var/themes/my-theme/colors.css`.

2. `POST /api/access_url_rel_color_themes` لربطها وتفعيلها لعنوان الوصول الحالي:

```json
{
  "colorTheme": "/api/color_themes/{id}"
}
```

لإضافة صور مخصصة (الشعار، الأيقونة المفضلة، الخلفيات)، ارفعها عبر `POST /themes/{slug}/logos` أو ضعها مباشرة في `var/themes/{slug}/images/`.

## مرجع متغيرات الألوان

جميع المتغيرات المتوقعة من إعداد Tailwind الافتراضي:

| المتغير | الغرض |
|----------|---------|
| `--color-primary-base` | لون العلامة التجارية الأساسي |
| `--color-primary-gradient` | نقطة تدرج أغمق للأساسي |
| `--color-primary-button-text` | لون النص على الأزرار الأساسية |
| `--color-primary-button-alternative-text` | لون النص البديل على الأزرار الأساسية |
| `--color-secondary-base` | لون التمييز الثانوي |
| `--color-secondary-gradient` | نقطة التدرج للثانوي |
| `--color-secondary-button-text` | لون النص على الأزرار الثانوية |
| `--color-tertiary-base` | اللون الثالث |
| `--color-tertiary-gradient` | نقطة التدرج للثالث |
| `--color-tertiary-button-text` | لون النص على الأزرار الثالثة |
| `--color-success-base` | لون حالة النجاح |
| `--color-success-gradient` | نقطة التدرج للنجاح |
| `--color-success-button-text` | لون النص على أزرار النجاح |
| `--color-info-base` | لون حالة المعلومات |
| `--color-info-gradient` | نقطة التدرج للمعلومات |
| `--color-info-button-text` | لون النص على أزرار المعلومات |
| `--color-warning-base` | لون حالة التحذير |
| `--color-warning-gradient` | نقطة التدرج للتحذير |
| `--color-warning-button-text` | لون النص على أزرار التحذير |
| `--color-danger-base` | لون حالة الخطر/الخطأ |
| `--color-danger-gradient` | نقطة التدرج للخطر |
| `--color-danger-button-text` | لون النص على أزرار الخطر |
| `--color-form-base` | لون تمييز عناصر النموذج |