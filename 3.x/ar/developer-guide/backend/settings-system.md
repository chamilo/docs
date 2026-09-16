# نظام الإعدادات

تُدار إعدادات Chamilo عبر مجموعة من مخططات الإعدادات (حوالي 40 مخططًا، تختلف بين الإصدارات) التي تحدّد كل جانب قابل للتهيئة في المنصة. توجد في `src/CoreBundle/Settings/` — والقائمة الدقيقة هناك هي المصدر المعتمد.

## آلية العمل

الإعدادات:

1. **تُعرَّف** في أصناف المخططات (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **تُخزَّن** في قاعدة البيانات (جدول `settings_current`)
3. **يُوصَل إليها** عبر خدمة `SettingsManager`
4. **تُدار** عبر واجهة الويب للإدارة

## مخططات الإعدادات

يعرّف كل ملف مخطط فئة من الإعدادات. المخططات الرئيسية:

| المخطط | الغرض |
|--------|---------|
| `PlatformSettingsSchema` | معلومات المؤسسة، المنطقة الزمنية، نوع الخادم، ميزات البوابة |
| `SecuritySettingsSchema` | محاولات تسجيل الدخول، CAPTCHA، سياسة كلمات المرور، ترويسات HTTP، المصادقة الثنائية |
| `RegistrationSettingsSchema` | التسجيل الذاتي، الحقول المطلوبة، الاشتراك التلقائي |
| `CourseSettingsSchema` | إعدادات إنشاء المقررات الافتراضية، الأدوات، الكتالوج |
| `SessionSettingsSchema` | إعدادات الجلسات الافتراضية، الرؤية |
| `MailSettingsSchema` | تهيئة البريد الإلكتروني، DKIM، الإشعارات |
| `AiHelpersSettingsSchema` | مزوّدو الذكاء الاصطناعي، مفاتيح تفعيل الميزات لكل أداة ذكاء اصطناعي |
| `ExerciseSettingsSchema` | تصحيح الاختبارات، التغذية الراجعة، خيارات الأسئلة |
| `LearningPathSettingsSchema` | عرض مسار التعلم، المتطلبات السابقة، إعدادات SCORM |
| `DocumentSettingsSchema` | حدود الرفع، أنواع الملفات المسموح بها، التخزين |
| `DisplaySettingsSchema` | تبويبات واجهة المستخدم، عناصر الشريط الجانبي، السمة |
| `LanguageSettingsSchema` | اللغات المتاحة، اللغة الافتراضية |
| `AdminSettingsSchema` | بريد المسؤول، خيارات خاصة بالمسؤول |

## الوصول إلى الإعدادات

في شيفرة PHP:

```php
// Via SettingsManager service
$value = $settingsManager->getSetting('platform.site_name');

// In legacy code
$value = api_get_setting('platform.site_name');
```

في القوالب:

```twig
{# Read a single setting #}
{{ chamilo_settings_get('platform.site_name') }}

{# Check whether a setting exists #}
{% if chamilo_settings_has('platform.allow_registration') %}
    ...
{% endif %}

{# Get all settings as an array #}
{% set settings = chamilo_settings_all() %}
```

## بنية الإعداد

لكل إعداد:

* **Namespace** — فئة المخطط (مثل `platform` و`security` و`ai_helpers`)
* **Variable** — اسم الإعداد (مثل `site_name` و`allow_registration`)
* **Value** — القيمة الحالية
* **Type** — نوع البيانات (سلسلة، منطقي، مصفوفة، إلخ)

## إعدادات مستوى المقرر

يمكن تجاوز بعض الإعدادات على مستوى المقرر. تُعرَّف في `src/CourseBundle/Settings/` وتشمل:

* إعدادات التمارين لكل مقرر
* إعدادات الواجبات لكل مقرر
* مفاتيح تفعيل ميزات الذكاء الاصطناعي لكل مقرر

## إعدادات تعدد عناوين URL

في إعدادات تعدد عناوين URL، يمكن تخصيص بعض الإعدادات لكل عنوان وصول، مما يتيح تكوينات بوابات مختلفة من التثبيت نفسه.

ستظهر تلك الإعدادات عدة مرات في جدول `settings`، بقيم `access_url` مختلفة. افتراضيًا، ترتبط جميع الإعدادات بـ `access_url=1`.

## إضافة إعداد جديد

1. أضف تعريف الإعداد إلى صنف المخطط المناسب
2. وفّر قيمة افتراضية
3. نفّذ ترحيلات قاعدة البيانات إن لزم الأمر
4. ادخل إلى الإعداد عبر `SettingsManager`