# إضافات أدوات المقرر

تضيف إضافات أدوات المقرر أدوات جديدة إلى الصفحة الرئيسية للمقرر إلى جانب الأدوات المدمجة مثل Documents وExercises وForums.

## كيف تعمل إضافات أدوات المقرر

عندما تسجّل إضافة نفسها كأداة مقرر:

1. تظهر في شبكة أدوات الصفحة الرئيسية للمقرر
2. يمكن للمعلمين إظهارها أو إخفاؤها مثل أي أداة أخرى
3. يؤدي النقر على الأداة إلى فتح واجهة الإضافة ضمن سياق المقرر

## التسجيل كأداة مقرر

في صنف الإضافة، عيّن `$isCoursePlugin = true`. لإضافة أيقونة أداة تلقائيًا إلى الصفحة الرئيسية للمقرر، عيّن أيضًا `$addCourseTool = true`:

```php
class MyToolPlugin extends Plugin
{
    protected function __construct()
    {
        parent::__construct('1.0', 'Author');
        $this->isCoursePlugin = true;
        $this->addCourseTool = true;
    }
}
```

## إعدادات لكل مقرر

عرّف حقول الإعداد على مستوى المقرر عبر الخاصية `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

تظهر هذه الحقول في لوحة إعدادات المقرر ويمكن التحقق منها بتجاوز `validateCourseSetting(string $variable)` (أرجع `false` لرفض قيمة) أو التعامل معها عبر `course_settings_updated(array $values)`.

## التثبيت وإلغاء التثبيت

لتسجيل حقول الإضافة عبر جميع المقررات الموجودة عند التثبيت:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

للتثبيت في مقرر واحد (مثلًا عند إنشاء مقرر جديد):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

لإزالة الحقول من مقرر محدد:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## نقاط التكامل

تتكامل إضافات أدوات المقرر عبر:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — تسجّل الإضافة كأداة في المقرر
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — تحدد أي الأدوات (بما فيها أدوات الإضافات) تظهر في الصفحة الرئيسية للمقرر
* تظهر الأداة في مجموعة `CTool` الخاصة بالمقرر

## سياق المقرر

عندما ينقر المتعلم على أداة إضافتك، يعمل رمز الإضافة ضمن سياق المقرر. يمكنك الوصول إلى:

* المقرر الحالي (عبر `api_get_course_id()` أو مخزن طلب CID)
* الجلسة الحالية (إن وُجدت)
* المستخدم الحالي
* إعدادات الإضافة على مستوى المقرر

## أمثلة

إضافات أدوات المقرر المدمجة:

* **BigBlueButton** (`Bbb/`) — مؤتمرات فيديو داخل المقررات
* **Zoom** (`Zoom/`) — اجتماعات Zoom داخل المقررات
* **OnlyOffice** (`Onlyoffice/`) — تحرير المستندات داخل المقررات