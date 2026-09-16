# نظام الإعدادات

تُدار تكوين Chamilo من خلال مجموعة من مخططات الإعدادات (حوالي 40 منها، تختلف بين الإصدارات) التي تحدد كل جانب قابل للتكوين في المنصة. توجد في `src/CoreBundle/Settings/` — القائمة الدقيقة هناك هي المصدر الحقيقي للحقيقة.

## كيفية عمله

الإعدادات هي:

1. **مُعرَّفة** في فئات المخطط (`src/CoreBundle/Settings/*SettingsSchema.php`)
2. **مخزنة** في قاعدة البيانات (جدول `settings_current`)
3. **مُسْتَخْدَمَة** عبر خدمة `SettingsManager`
4. **مُدْرَجَة** من خلال واجهة الإدارة الإلكترونية

## مخططات الإعدادات

يحدد كل ملف مخطط فئة من الإعدادات. المخططات الرئيسية:

| المخطط | الغرض |
|--------|-------|
| `PlatformSettingsSchema` | معلومات المؤسسة، المنطقة الزمنية، نوع الخادم، ميزات البوابة |
| `SecuritySettingsSchema` | محاولات تسجيل الدخول، CAPTCHA، سياسة كلمة المرور، رؤوس HTTP، 2FA |
| `RegistrationSettingsSchema` | التسجيل الذاتي، الحقول المطلوبة، الاشتراك التلقائي |
| `CourseSettingsSchema` | إعدادات افتراضية لإنشاء الدورة، الأدوات، الكتالوج |
| `SessionSettingsSchema` | إعدادات افتراضية للجلسة، الرؤية |
| `MailSettingsSchema` | تكوين البريد الإلكتروني، DKIM، الإشعارات |
| `AiHelpersSettingsSchema` | مزودو الذكاء الاصطناعي، تبديلات الميزات لكل أداة ذكاء اصطناعي |
| `ExerciseSettingsSchema` | تسجيل الاختبارات، الملاحظات، خيارات الأسئلة |
| `LearningPathSettingsSchema` | عرض مسار التعلم، المتطلبات السابقة، إعدادات SCORM |
| `DocumentSettingsSchema` | حدود الرفع، أنواع الملفات المسموح بها، التخزين |
| `DisplaySettingsSchema` | علامات تبويب الواجهة، عناصر الشريط الجانبي، السمة |
| `LanguageSettingsSchema` | اللغات المتاحة، الإعداد الافتراضي للموقع |
| `AdminSettingsSchema` | بريد الإدارة الإلكتروني، خيارات خاصة بالإدارة |

## الوصول إلى الإعدادات

في كود PHP:

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

## هيكل الإعداد

لكل إعداد:

* **مساحة الاسم** — فئة المخطط (مثل `platform`، `security`، `ai_helpers`)
* **المتغير** — اسم الإعداد (مثل `site_name`، `allow_registration`)
* **القيمة** — القيمة الحالية
* **النوع** — نوع البيانات (string، boolean، array، إلخ)

## إعدادات مستوى الدورة

يمكن تجاوز بعض الإعدادات على مستوى الدورة. هذه مُعرَّفة في `src/CourseBundle/Settings/` وتشمل:

* إعدادات التمارين لكل دورة
* إعدادات المهام لكل دورة
* تبديلات ميزات الذكاء الاصطناعي لكل دورة

## إعدادات متعددة الـ URL

في الإعدادات متعددة الـ URL، يمكن تخصيص بعض الإعدادات لكل عنوان URL للوصول، مما يسمح بتكوينات بوابة مختلفة من نفس التثبيت.

ستظهر هذه الإعدادات عدة مرات في جدول `settings`، مع قيم `access_url` مختلفة. افتراضيًا، ترتبط جميع الإعدادات بـ `access_url=1`.

## إضافة إعداد جديد

1. أضف تعريف الإعداد إلى فئة المخطط المناسبة
2. قدم قيمة افتراضية
3. قم بتشغيل هجرات قاعدة البيانات إذا لزم الأمر
4. استخدم الإعداد عبر `SettingsManager`