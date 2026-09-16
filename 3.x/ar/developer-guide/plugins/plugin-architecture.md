# بنية الإضافات

## موقع الإضافات

تُخزَّن الإضافات في `public/plugin/`. ولكل إضافة دليل خاص بها:

```
public/plugin/
├── Bbb/                    # BigBlueButton integration
├── Zoom/                   # Zoom integration
├── Onlyoffice/             # OnlyOffice document editing
├── XApi/                   # xAPI/Tin Can
├── ...                     # bundled plugins ship under public/plugin/
```

## بنية الإضافة

يحتوي دليل إضافة نموذجي على:

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

## صنف الإضافة

تمتد كل إضافة من الصنف الأساسي `Plugin` (`public/main/inc/lib/plugin.class.php`) وتتبع نمط المفرد (singleton):

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

### خصائص الصنف الأساسية

| الخاصية | النوع | التأثير |
|----------|------|--------|
| `$isCoursePlugin` | bool | تسجّل الإضافة كأداة مقرر |
| `$isAdminPlugin` | bool | تضيف صفحة واجهة إدارة |
| `$isMailPlugin` | bool | تتكامل مع نظام البريد |
| `$addCourseTool` | bool | تضيف أيقونة إلى الصفحة الرئيسية للمقرر |
| `$course_settings` | array | تعرّف حقول الإعداد لكل مقرر |

## دورة حياة الإضافة

1. **التثبيت** — يفعّل المسؤول الإضافة، فيُنفَّذ `install.php`
2. **الإعداد** — تُعرَّف الإعدادات وتُدار عبر لوحة الإدارة؛ وتُخزَّن في `access_url_rel_plugin` (تدعم تعدد المستأجرين)
3. **التنفيذ** — تحقن الإضافة المحتوى في مناطق العرض أو تتفاعل مع أحداث المنصة
4. **التعطيل** — تُعطَّل الإضافة مع الحفاظ على بياناتها
5. **إلغاء التثبيت** — يُنفَّذ `uninstall.php` لتنظيف البيانات والجداول

## مناطق العرض

تحقن الإضافات HTML في 18 منطقة محددة مسبقاً في واجهة Vue الأمامية عبر تجاوز `renderRegion()`:

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

## التكامل مع Symfony

### مشتركي الأحداث

تُسجَّل تلقائياً الملفات التي تنتهي بـ `EventSubscriber.php` والموجودة داخل `src/EventSubscriber/` عبر `PluginEventSubscriberPass`. وهي تنفّذ `EventSubscriberInterface` وتتفاعل مع الأحداث المعرَّفة في `src/CoreBundle/Event/Events.php`.

ولأن صنف الإضافة (`MyPluginPlugin`) ليس خدمة Symfony، لا يمكن حقنه تلقائياً في منشئ المشترك. استخدم المفرد `create()` بدلاً من ذلك:

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

تُكتشف تلقائياً كيانات Doctrine الموجودة في `src/Entity/` بواسطة `PluginEntityPass`. استخدم سمات PHP 8 للربط. يجب أن يتبع فضاء الأسماء `Chamilo\PluginBundle\{PluginName}`. استخدم بادئات أسماء جداول فريدة (مثل `my_plugin_*`) لتجنب التصادمات.

### خدمة PluginHelper

للوصول إلى حالة الإضافة من خدمات Symfony الأساسية، حقن `PluginHelper` بدلاً من إنشاء مثيل لصنف الإضافة مباشرة:

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

| الطريقة | الغرض |
|--------|---------|
| `isPluginEnabled(string $name): bool` | التحقق مما إذا كانت الإضافة مثبتة ونشطة لعنوان الوصول الحالي |
| `loadLegacyPlugin(string $name): ?object` | إنشاء وإرجاع المفرد (singleton) الخاص بالإضافة |
| `getPluginSetting(string $name, string $key): mixed` | قراءة قيمة إعداد واحدة للإضافة |
| `getPluginOverrides(string $name): array` | الحصول على تجاوزات `plugin.yaml` (القيم الافتراضية + الخاصة بعنوان الوصول) لإضافة ما |

## مراجع الملفات الأساسية

| الملف | الغرض |
|------|---------|
| `public/main/inc/lib/plugin.class.php` | الصنف الأساسي للإضافة |
| `public/main/inc/lib/plugin.lib.php` | مدير الإضافات |
| `src/CoreBundle/Entity/Plugin.php` | كيان Doctrine للإضافة |
| `src/CoreBundle/Helpers/PluginHelper.php` | خدمة PluginHelper |
| `src/CoreBundle/Event/Events.php` | ثوابت الأحداث |
| `public/plugin/HelloWorld/` | إضافة مثال بسيطة للغاية |
| `public/plugin/TopLinks/` | إضافة مثال بسيطة |