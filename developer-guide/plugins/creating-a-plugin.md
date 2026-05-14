# إنشاء إضافة

يوضح هذا الدليل خطوة بخطوة إنشاء إضافة Chamilo أساسية. للحصول على تفاصيل إضافية، انظر [صفحة ويكي تطوير الإضافات](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## الخطوة 1: إنشاء مجلد الإضافة

أنشئ مجلدًا في `public/plugin/`. يجب أن يتطابق اسم المجلد مع معرف الإضافة الخاصة بك:

```
public/plugin/MyPlugin/
```

## الخطوة 2: تعريف فئة الإضافة

أنشئ `src/MyPluginPlugin.php`. تمتد الفئة من `Plugin` وتتبع نمط الـ singleton:

```php
<?php

class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = [
            'tool_enable' => 'boolean',
            'api_key'     => 'text',
        ];
        parent::__construct('1.0', 'Your Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### أنواع الإعدادات المتاحة

| Type | Description |
|------|-------------|
| `boolean` | Checkbox on/off |
| `text` | Single-line text input |
| `select` | Dropdown (provide `options` array) |
| `wysiwyg` | Rich text editor |
| `html` | Raw HTML field |
| `checkbox` | Checkbox |
| `user` | User selector |

بالنسبة لإعدادات `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

الوصول إلى الإعدادات أثناء التشغيل:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## الخطوة 3: إنشاء plugin.php

`plugin.php` في جذر الإضافة **مطلوب**. يجب أن يعين `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## الخطوة 4: إنشاء نصوص التثبيت والإزالة

`install.php`:

```php
<?php
MyPluginPlugin::create()->install();
```

`uninstall.php`:

```php
<?php
MyPluginPlugin::create()->uninstall();
```

قم بتنفيذ إنشاء/حذف المخطط الفعلي داخل الفئة باستخدام `SchemaTool` الخاص بـ Doctrine.

## الخطوة 5: إضافة الترجمات

أنشئ ملفات اللغة في `lang/` باستخدام رموز اللغات (مثل `en_US.php`، `fr_FR.php`، `es_ES.php`). الاحتياطي هو `en_US.php`.

```php
<?php
// lang/en_US.php
$strings['plugin_title']   = 'My Plugin';
$strings['plugin_comment'] = 'Description of what this plugin does.';
$strings['tool_enable']    = 'Enable plugin';
$strings['api_key']        = 'API Key';
$strings['api_key_help']   = 'Enter the API key from your account.';
```

الوصول إلى الترجمات عبر `$plugin->get_lang('key')`.

## الخطوة 6: إدخال المحتوى عبر مناطق العرض

يمكن للإضافات إدخال HTML في 18 منطقة محددة مسبقًا من الواجهة الأمامية Vue. قم بتجاوز `renderRegion()` في فئتك:

```php
public function renderRegion(string $region): string
{
    if ('header_right' !== $region) {
        return '';
    }
    return '<div class="my-plugin-widget">Hello!</div>';
}
```

تشمل المناطق المتاحة: `content_bottom`، `content_top`، `course_tool_plugin`، `footer_center`، `footer_left`، `footer_right`، `header_center`، `header_left`، `header_main`، `header_right`، `login_bottom`، `login_top`، `main_bottom`، `main_top`، `menu_administrator`، `menu_bottom`، `menu_top`، `pre_footer`.

## الخطوة 7: الاستجابة لأحداث المنصة (اختياري)

يمكن للإضافات الاستجابة لأحداث المنصة باستخدام مشتركي أحداث Symfony. أنشئ ملفًا ينتهي بـ `EventSubscriber.php` داخل `src/EventSubscriber/` — يتم تسجيله تلقائيًا عبر `PluginEventSubscriberPass`.

```php
<?php
// src/EventSubscriber/MyPluginEventSubscriber.php

use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        // Plugin classes are not Symfony services — use the create() singleton.
        $this->plugin = MyPluginPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::COURSE_CREATED => 'onCourseCreated',
        ];
    }

    public function onCourseCreated($event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }
        // your logic here
    }
}
```

انظر `src/CoreBundle/Event/Events.php` للحصول على قائمة كاملة بالأحداث المتاحة (المستخدم، الدورة، الجلسة، LP، التمرين، المحفظة، المصادقة، وغيرها).
---

---
## الخطوة 8: خطافات دورة الحياة

قم بتجاوز هذه الطرق في فئة الإضافة الخاصة بك للرد على إجراءات المنصة:

| الطريقة | يتم تشغيلها عند |
|---------|------------------|
| `install()` | تفعيل الإضافة |
| `uninstall()` | إزالة الإضافة |
| `performActionsAfterConfigure()` | حفظ نموذج الإعدادات بواسطة المسؤول |
| `course_settings_updated(array $values)` | تغيير إعدادات المستوى الدراسي |
| `validateCourseSetting(string $variable)` | حفظ إعداد الدورة (أعد `false` للرفض) |
| `doWhenDeletingUser(int $userId)` | حذف مستخدم |
| `doWhenDeletingCourse(int $courseId)` | حذف دورة |
| `doWhenDeletingSession(int $sessionId)` | حذف جلسة |

## الخطوة 9: التفعيل

قم بتسجيل الدخول كمسؤول، انتقل إلى **إدارة الإضافات**، ابحث عن إضافتك، وانقر على **تفعيل**.

## نصائح

* **اتبع الإضافات الحالية كأمثلة** — `public/plugin/HelloWorld/` و `public/plugin/TopLinks/` مراجع بسيطة جيدة
* **استخدم الترجمات** — استخدم دائمًا نظام `lang/` للنصوص الموجهة للمستخدم
* **نظف عند الإلغاء** — أزل جداول قاعدة البيانات والإعدادات في سكريبت الإلغاء
* **تحقق من حالة التفعيل** — في مشتركي الأحداث، اتصل دائمًا بـ `$this->plugin->isEnabled()` قبل تنفيذ المنطق