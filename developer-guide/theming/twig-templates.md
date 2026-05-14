# قوالب Twig

يستخدم Chamilo محرك Twig للصفحات المعروضة من جانب الخادم. توجد القوالب في `src/CoreBundle/Resources/views/` ويتم الإشارة إليها ببادئة المساحة الاسمية `@ChamiloCore/` (مثل `@ChamiloCore/Layout/base-layout.html.twig`).

لا يوجد دليل `templates/` على المستوى العلوي — جميع قوالب Twig تقع تحت `src/CoreBundle/Resources/views/`.

## كيفية تعايش Twig و Vue

تتبع معظم الصفحات هذا التدفق:

1. يعرض متحكم Symfony قالب Twig يمتد تخطيطًا.
2. يتضمن التخطيط `vue_setup.html.twig`، الذي يصدر `<div id="app">` ويحقن المتغيرات العامة أثناء التشغيل (`window.user`، `window.breadcrumb`، إلخ) عبر `vue_js_setup.html.twig`.
3. يتم تركيب Vue على `#app` ويتعامل مع كل عرض واجهة المستخدم داخل ذلك العنصر.
4. تتواصل تطبيق Vue مع الخلفية عبر REST API.

بالنسبة للصفحات القديمة التي لم تهاجر إلى Vue بعد، يعرض Symfony HTML الكامل للصفحة عبر Twig ويتم وضع المحتوى داخل `#sectionMainContent`. لا يزال Vue يتم تركيبه (يوفر غلاف الشريط الجانبي والشريط العلوي)، لكن منطقة المحتوى الرئيسية هي HTML معروض من جانب الخادم.

## قوالب التخطيط

تمتد جميع التخطيطات `@ChamiloCore/Layout/base-layout.html.twig`، الذي يوفر هيكل `<html>`، `<head>`، و `<body>`. المتغيرات المتاحة للتخطيط:

| القالب | الغرض |
|--------|-------|
| `Layout/base-layout.html.twig` | القالب الجذر — غلاف `<html>`، استيراد الماكرو، إصدار `<head>` و `<body>` |
| `Layout/layout.html.twig` | التخطيط الكامل القياسي مع الشريط الجانبي، الشريط العلوي، ومنطقة المحتوى |
| `Layout/layout_one_col.html.twig` | تخطيط عمود واحد (بدون شريط جانبي) |
| `Layout/layout_two_col.html.twig` | تخطيط عمودين |
| `Layout/layout_content.html.twig` | غلاف المحتوى فقط |
| `Layout/layout_empty.html.twig` | تخطيط فارغ مع كروم أدنى |
| `Layout/no_layout.html.twig` | بدون رأس/تذييل؛ يذهب المحتوى مباشرة داخل `<body>` |
| `Layout/no_layout_scorm.html.twig` | تخطيط عاري لإطارات محتوى SCORM |
| `Layout/blank.html.twig` | صفحة فارغة تمامًا |
| `Layout/skill_layout.html.twig` | تخطيط لصفحة عجلة المهارات |

## الأجزاء الجزئية الرئيسية

| القالب | الغرض |
|--------|-------|
| `Layout/head.html.twig` | محتوى `<head>`: علامات meta، جميع مدخلات CSS لـ Encore، `colors.css` للثيم، مدخلات JS القديمة، علامات OpenGraph/Twitter |
| `Layout/foot.html.twig` | نهاية الجسم: نقطة دخول Vue JS، حقن `tracking.footer_extra_content` |
| `Layout/vue_setup.html.twig` | يصدر `<div id="app">` ويشمل `vue_js_setup.html.twig` |
| `Layout/vue_js_setup.html.twig` | يحقن `window.user`، `window.breadcrumb`، `window.languages`، إلخ. |
| `Layout/cookie_banner.html.twig` | لافتة موافقة ملفات تعريف الارتباط GDPR |
| `Layout/footer.html.twig` | شريط تذييل الصفحة |
| `Layout/course_navigation.html.twig` | فتات التنقل لأدوات المقرر الدراسي |

## تكامل Webpack Encore

يحمل `head.html.twig` ملفات CSS لجميع المدخلات؛ يحمل `foot.html.twig` حزمة Vue JS:

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

مدخلات JS القديمة (`legacy_app`، `legacy_lp`، إلخ) يتم تحميلها في `<head>` لأن الصفحات PHP القديمة تعتمد على توفرها قبل أن يكون DOM جاهزًا.

## الماكرو

الماكرو Twig القابلة لإعادة الاستخدام موجودة في `Macros/` ويتم استيرادها في أعلى `base-layout.html.twig`:

| ملف الماكرو | يوفر |
|-------------|------|
| `Macros/box.html.twig` | مساعدات صندوق المحتوى |
| `Macros/actions.html.twig` | عرض أزرار الإجراء |
| `Macros/buttons.html.twig` | مساعدات HTML للأزرار |
| `Macros/headers.html.twig` | مساعدات رأس الصفحة |
| `Macros/image.html.twig` | مساعدات عرض الصور |
| `Macros/modals.html.twig` | مساعدات حوار النافذة المنبثقة |

الاستخدام داخل أي قالب يمتد `base-layout.html.twig`:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## قوالب Vue المخصصة

يدعم Chamilo تجاوز صفحات Vue لكل تثبيت عبر متغير البيئة `APP_CUSTOM_VUE_TEMPLATE`. عند تعيينه، يعرض بناء Webpack ثابتة `ENV_CUSTOM_VUE_TEMPLATE` عبر `DefinePlugin`، ويستورد راوتر Vue شروطيًا مكونات التجاوز من `var/vue_templates/`.

مواقع التجاوز الحالية:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

يتم تجاوز الملفات الموجودة فقط في `var/vue_templates/` — جميع الصفحات والمكونات الأخرى تستخدم الأصول الأساسية.
---

---
## مرجع دوال Twig

الدوال الرئيسية لـ Twig المتاحة في جميع القوالب (مسجلة في `ChamiloExtension`):

| الدالة | الغرض |
|--------|-------|
| `chamilo_settings_get('ns.key')` | قراءة إعداد منصة |
| `chamilo_settings_has('ns.key')` | التحقق من وجود إعداد |
| `chamilo_settings_all()` | الحصول على جميع الإعدادات كمصفوفة |
| `theme_asset('path')` | رابط URL لمورد في السمة النشطة |
| `theme_asset_link_tag('path')` | وسم `<link>` لملف CSS للسمة |
| `theme_asset_script_tag('path')` | وسم `<script>` لملف JS للسمة |
| `theme_asset_base64('path')` | رابط URI بيانات Base64 لمورد السمة |
| `theme_logo('header'\|'email')` | رابط URL للشعار المفضل |
| `is_allowed_to_edit(...)` | مساعد التحقق من الصلاحيات |