# هندسة الملحقات

## موقع الملحق

يتم تخزين الملحقات في `public/plugin/`. كل ملحق له دليله الخاص:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## هيكل الملحق

يحتوي دليل ملحق نموذجي على:

```
public/plugin/MyPlugin/
├── plugin.php              # REQUIRED — assigns $plugin_info
├── install.php             # Installation script
├── uninstall.php           # Uninstallation script
├── index.php               # Region rendering entry point (if applicable)
├── admin.php               # Admin interface (optional)
├── lang/                   # Translation files (locale codes: en_US.php, fr_FR.php, …)
├── src/
│   ├── MyPluginPlugin.php        # Main plugin class (extends Plugin)
│   ├── Entity/                   # Doctrine entities (auto-discovered)
│   ├── Repository/               # Doctrine repositories
│   └── EventSubscriber/          # Symfony event subscribers (auto-registered)
├── templates/              # Twig templates
└── resources/              # CSS/JS assets
```

## كلاس الملحق

يمتد كل ملحق من كلاس الأساس `Plugin` (`public/main/inc/lib/plugin.class.php`) ويتبع نمط الـ singleton:

```php
class MyPluginPlugin extends Plugin
{
    protected function __construct()
    {
        $settings = ['api_key' => 'text', 'enabled' => 'boolean'];
        parent::__construct('1.0', 'Author Name', $settings);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new static();
    }
}
```

### خصائص الكلاس الرئيسية

| الخاصية | النوع | التأثير |
|----------|------|--------|
| `$isCoursePlugin` | bool | يسجل الملحق كأداة مسار دراسي |
| `$isAdminPlugin` | bool | يضيف صفحة واجهة إدارية |
| `$isMailPlugin` | bool | يدمج مع نظام البريد الإلكتروني |
| `$addCourseTool` | bool | يضيف أيقونة إلى الصفحة الرئيسية للمسار الدراسي |
| `$course_settings` | array | يحدد حقول التكوين لكل مسار دراسي |

## دورة حياة الملحق

1. **التثبيت** — يقوم المسؤول بتفعيل الملحق، الذي يشغل `install.php`
2. **التكوين** — يتم تحديد الإعدادات وإدارتها عبر لوحة الإدارة؛ مخزنة في `access_url_rel_plugin` (يدعم الـ multi-tenant)
3. **التنفيذ** — يحقن الملحق المحتوى في مناطق العرض أو يتفاعل مع أحداث المنصة
4. **الإلغاء** — يتم تعطيل الملحق لكن بياناته محفوظة
5. **إزالة التثبيت** — يشغل `uninstall.php` لتنظيف البيانات والجداول

## مناطق العرض

تحقن الملحقات HTML في 18 منطقة محددة مسبقًا من الواجهة الأمامية Vue عن طريق تجاوز `renderRegion()`:

```php
public function renderRegion(string $region): string
{
    if ('footer_left' !== $region) {
        return '';
    }
    return '<p>My Plugin footer content</p>';
}
```

المناطق المتاحة: `content_bottom`, `content_top`, `course_tool_plugin`, `footer_center`, `footer_left`, `footer_right`, `header_center`, `header_left`, `header_main`, `header_right`, `login_bottom`, `login_top`, `main_bottom`, `main_top`, `menu_administrator`, `menu_bottom`, `menu_top`, `pre_footer`.

## تكامل Symfony

### مشتركو الأحداث

الملفات التي تنتهي بـ `EventSubscriber.php` الموضوعة داخل `src/EventSubscriber/` تُسجل تلقائيًا عبر `PluginEventSubscriberPass`. تطبق `EventSubscriberInterface` وتتفاعل مع الأحداث المحددة في `src/CoreBundle/Event/Events.php`.

بما أن كلاس الملحق (`MyPluginPlugin`) ليس خدمة Symfony، لا يمكن حقنه تلقائيًا في بناء المشترك. استخدم الـ `create()` singleton بدلاً من ذلك:

```php
class MyPluginEventSubscriber implements EventSubscriberInterface
{
    private MyPluginPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyPluginPlugin::create();
    }
}
```

### كيانات Doctrine

كيانات Doctrine الموضوعة في `src/Entity/` تُكتشف تلقائيًا بواسطة `PluginEntityPass`. استخدم سمات PHP 8 للـ mapping. يجب أن يتبع المساحة اسم `Chamilo\PluginBundle\{PluginName}`. استخدم بادئات أسماء جداول فريدة (مثل `my_plugin_*`) لتجنب التصادمات.

---

---
### خدمة PluginHelper

للوصول إلى حالة الملحق من خدمات Symfony الأساسية، قم بحقن `PluginHelper` بدلاً من إنشاء كائن لفئة الملحق مباشرة:

```php
use Chamilo\CoreBundle\Helpers\PluginHelper;

class SomeService
{
    public function __construct(private readonly PluginHelper $pluginHelper) {}

    public function doSomething(): void
    {
        if ($this->pluginHelper->isPluginEnabled('MyPlugin')) {
            $value = $this->pluginHelper->getPluginSetting('MyPlugin', 'api_key');
        }
    }
}
```

الطرق المتاحة:

| Method | Purpose |
|--------|---------|
| `isPluginEnabled(string $name): bool` | التحقق مما إذا كان الملحق مثبتًا وفعالًا لـ URL الوصول الحالي |
| `loadLegacyPlugin(string $name): ?object` | إنشاء كائن وإرجاع الـ singleton للملحق |
| `getPluginSetting(string $name, string $key): mixed` | قراءة قيمة إعداد ملحق واحد |
| `getPluginOverrides(string $name): array` | الحصول على تجاوزات `plugin.yaml` (الافتراضيات + الخاصة بـ URL الوصول) للملحق |

## مراجع الملفات الأساسية

| File | Purpose |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | فئة أساسية للملحق |
| `public/main/inc/lib/plugin.lib.php` | مدير الملحقات |
| `src/CoreBundle/Entity/Plugin.php` | كيان Doctrine للملحق |
| `src/CoreBundle/Helpers/PluginHelper.php` | خدمة PluginHelper |
| `src/CoreBundle/Event/Events.php` | ثوابت الأحداث |
| `public/plugin/HelloWorld/` | مثال بسيط لملحق |
| `public/plugin/TopLinks/` | مثال بسيط لملحق |