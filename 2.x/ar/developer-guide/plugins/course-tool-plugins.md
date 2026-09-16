# ملحقات أدوات المقرر الدراسي

تضيف ملحقات أدوات المقرر الدراسي أدوات جديدة إلى صفحة رئيسية المقرر الدراسي إلى جانب الأدوات المدمجة مثل Documents، Exercises، وForums.

## كيفية عمل ملحقات أدوات المقرر الدراسي

عندما يسجل الملحق نفسه كأداة مقرر دراسي:

1. يظهر في شبكة أدوات صفحة رئيسية المقرر الدراسي
2. يمكن للمعلمين إظهارها/إخفاءها مثل أي أداة أخرى
3. النقر على الأداة يفتح واجهة الملحق ضمن سياق المقرر الدراسي

## التسجيل كأداة مقرر دراسي

في فئة الملحق الخاصة بك، قم بتعيين `$isCoursePlugin = true`. لإضافة أيقونة أداة تلقائيًا إلى صفحة رئيسية المقرر الدراسي، قم أيضًا بتعيين `$addCourseTool = true`:

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

## إعدادات لكل مقرر دراسي

حدد حقول التكوين على مستوى المقرر الدراسي عبر خاصية `$course_settings`:

```php
public array $course_settings = [
    ['name' => 'my_plugin_enabled', 'type' => 'checkbox', 'default' => false],
    ['name' => 'my_plugin_limit',   'type' => 'text',     'default' => '10'],
];
```

تظهر هذه في لوحة إعدادات المقرر الدراسي ويمكن التحقق من صحتها عن طريق تجاوز `validateCourseSetting(string $variable)` (أعد `false` لرفض قيمة) أو التصرف عليها عبر `course_settings_updated(array $values)`.

## التثبيت والإزالة

لتسجيل حقول الملحق عبر جميع المقررات الدراسية الحالية عند التثبيت:

```php
public function install(): void
{
    $this->install_course_fields_in_all_courses(add_tool_link: true);
}
```

لتثبيت في مقرر دراسي واحد (مثل عند إنشاء مقرر دراسي جديد):

```php
$this->course_install(courseId: $courseId, addToolLink: true);
```

لإزالة الحقول من مقرر دراسي محدد:

```php
$this->uninstall_course_fields(courseId: $courseId);
```

## نقاط التكامل

تتكامل ملحقات أدوات المقرر الدراسي من خلال:

* **`LegacyPluginCourseTool`** (`src/CoreBundle/Tool/LegacyPluginCourseTool.php`) — يسجل الملحق كأداة في المقرر الدراسي
* **`CToolStateProvider`** (`src/CoreBundle/State/CToolStateProvider.php`) — يحدد الأدوات التي تظهر (بما في ذلك أدوات الملحقات) على صفحة رئيسية المقرر الدراسي
* تظهر الأداة في مجموعة `CTool` للمقرر الدراسي

## سياق المقرر الدراسي

عندما ينقر المتعلم على أداة الملحق الخاص بك، يعمل كود الملحق ضمن سياق المقرر الدراسي. يمكنك الوصول إلى:

* المقرر الدراسي الحالي (عبر `api_get_course_id()` أو متجر طلب CID)
* الجلسة الحالية (إذا كانت適用ة)
* المستخدم الحالي
* إعدادات الملحق على مستوى المقرر الدراسي

## أمثلة

ملحقات أدوات المقرر الدراسي المدمجة:

* **BigBlueButton** (`Bbb/`) — مؤتمرات الفيديو داخل المقررات الدراسية
* **Zoom** (`Zoom/`) — اجتماعات Zoom داخل المقررات الدراسية
* **OnlyOffice** (`Onlyoffice/`) — تحرير المستندات داخل المقررات الدراسية