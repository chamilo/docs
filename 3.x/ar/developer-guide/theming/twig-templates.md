# قوالب Twig

يستخدم Chamilo محرك Twig لصفحات العرض من جهة الخادم. توجد القوالب في `src/CoreBundle/Resources/views/` ويُشار إليها بالبادئة الاسمية `@ChamiloCore/` (مثل `@ChamiloCore/Layout/base-layout.html.twig`).

لا يوجد مجلد `templates/` في المستوى الأعلى — جميع قوالب Twig موجودة تحت `src/CoreBundle/Resources/views/`.

## كيف يتعايش Twig وVue

تتبع معظم الصفحات هذا التدفق:

1. يعرض متحكّم Symfony قالب Twig يمتد من تخطيط أساسي.
2. يضمّن التخطيط `vue_setup.html.twig`، الذي يُصدِر `<div id="app">` ويحقن المتغيرات العامة وقت التشغيل (`window.user`، `window.breadcrumb`، إلخ) عبر `vue_js_setup.html.twig`.
3. يُركَّب Vue على `#app` ويتولى كل عرض واجهة المستخدم داخل ذلك العنصر.
4. يتواصل تطبيق Vue مع الخلفية عبر REST API.

بالنسبة للصفحات القديمة التي لم تُرحَّل بعد إلى Vue، يعرض Symfony كامل HTML الصفحة عبر Twig ويُوضع المحتوى داخل `#sectionMainContent`. ما يزال Vue يُركَّب (موفّرًا غلاف الشريط الجانبي والشريط العلوي)، لكن منطقة المحتوى الرئيسية هي HTML مُعرَّض من الخادم.

## قوالب التخطيط

تمتد جميع التخطيطات من `@ChamiloCore/Layout/base-layout.html.twig`، الذي يوفّر بنية `<html>` و`<head>` و`<body>`. متغيرات التخطيط المتاحة:

| القالب | الغرض |
|----------|---------|
| `Layout/base-layout.html.twig` | القالب الجذر — غلاف `<html>`، يستورد Macros، ويُصدِر `<head>` و`<body>` |
| `Layout/layout.html.twig` | تخطيط كامل قياسي مع شريط جانبي وشريط علوي ومنطقة محتوى |
| `Layout/layout_one_col.html.twig` | تخطيط عمود واحد (بدون شريط جانبي) |
| `Layout/layout_two_col.html.twig` | تخطيط عمودين |
| `Layout/layout_content.html.twig` | غلاف للمحتوى فقط |
| `Layout/layout_empty.html.twig` | تخطيط فارغ بأدنى قدر من العناصر البصرية |
| `Layout/no_layout.html.twig` | بدون ترويسة/تذييل؛ يذهب المحتوى مباشرة داخل `<body>` |
| `Layout/no_layout_scorm.html.twig` | تخطيط مجرّد لإطارات محتوى SCORM |
| `Layout/blank.html.twig` | صفحة فارغة تمامًا |
| `Layout/skill_layout.html.twig` | تخطيط لصفحة عجلة المهارات |

## الأجزاء الجزئية الرئيسية

| القالب | الغرض |
|----------|---------|
| `Layout/head.html.twig` | محتوى `<head>`: وسوم meta، جميع مدخلات Encore CSS، `colors.css` للسمة، مدخلات JS القديمة، وسوم OpenGraph/Twitter |
| `Layout/foot.html.twig` | نهاية الجسم: نقطة دخول Vue JS، حقن `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | يُصدِر `<div id="app">` ويضمّن `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | يحقن `window.user`، `window.breadcrumb`، `window.languages`، إلخ. |
| `Layout/cookie_banner.html.twig` | شريط موافقة ملفات تعريف الارتباط وفق GDPR |
| `Layout/footer.html.twig` | شريط تذييل الصفحة |
| `Layout/course_navigation.html.twig` | مسار تنقل أدوات المقرر |

## التكامل مع Webpack Encore

يحمّل `head.html.twig` ملفات CSS لجميع المدخلات؛ ويحمّل `foot.html.twig` حزمة Vue JS:

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

تُحمَّل مدخلات JS القديمة (`legacy_app`، `legacy_lp`، إلخ) في `<head>` لأن صفحات PHP القديمة تعتمد على توفرها قبل أن يصبح DOM جاهزًا.

## الماكروات

توجد ماكروات Twig القابلة لإعادة الاستخدام في `Macros/` وتُستورد في أعلى `base-layout.html.twig`:

| ملف الماكرو | يوفّر |
|-----------|---------|
| `Macros/box.html.twig` | مساعدات صناديق المحتوى |
| `Macros/actions.html.twig` | عرض أزرار الإجراءات |
| `Macros/buttons.html.twig` | مساعدات HTML للأزرار |
| `Macros/headers.html.twig` | مساعدات ترويسة الصفحة |
| `Macros/image.html.twig` | مساعدات عرض الصور |
| `Macros/modals.html.twig` | مساعدات مربعات الحوار المنبثقة |

الاستخدام داخل أي قالب يمتد من `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## قوالب Vue المخصّصة

يدعم Chamilo تجاوز صفحات Vue لكل تثبيت عبر متغير البيئة `APP_CUSTOM_VUE_TEMPLATE`. عند تعيينه، يكشف بناء Webpack ثابتًا باسم `ENV_CUSTOM_VUE_TEMPLATE` عبر `DefinePlugin`، ويستورد موجّه Vue مكوّنات التجاوز شرطيًا من `var/vue_templates/`.

مواقع التجاوز الحالية:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

يُتجاوز فقط الملفات الموجودة في `var/vue_templates/` — وتستخدم جميع الصفحات والمكوّنات الأخرى النسخ الأصلية للنواة.

## مرجع دوال Twig

دوال Twig الأساسية المتاحة في جميع القوالب (مسجَّلة في `ChamiloExtension`):

| الدالة | الغرض |
|----------|---------|
| `chamilo_settings_get('ns.key')` | قراءة إعداد للمنصة |
| `chamilo_settings_has('ns.key')` | التحقق مما إذا كان الإعداد موجودًا |
| `chamilo_settings_all()` | الحصول على جميع الإعدادات كمصفوفة |
| `theme_asset('path')` | عنوان URL لأصل في السمة النشطة |
| `theme_asset_link_tag('path')` | وسم `<link>` لملف CSS في السمة |
| `theme_asset_script_tag('path')` | وسم `<script>` لملف JS في السمة |
| `theme_asset_base64('path')` | معرّف URI لبيانات Base64 لأصل في السمة |
| `theme_logo('header'\|'email')` | عنوان URL للشعار المفضَّل |
| `is_allowed_to_edit(...)` | دالة مساعدة للتحقق من الصلاحيات |