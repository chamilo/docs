# إنشاء إضافة

يرشدك هذا الدليل خلال إنشاء إضافة أساسية لـ Chamilo. لمزيد من التفاصيل، راجع [صفحة ويكي تطوير الإضافات](https://github.com/chamilo/chamilo-lms/wiki/Plugin-development).

## الخطوة 1: إنشاء مجلد الإضافة

أنشئ مجلدًا في `public/plugin/`. يجب أن يطابق اسم المجلد معرّف الإضافة:

```
public/plugin/MyPlugin/
```

## الخطوة 2: تعريف صنف الإضافة

أنشئ `src/MyPluginPlugin.php`. يمتد الصنف من `Plugin` ويتبع نمط المفرد (singleton):

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

| النوع | الوصف |
|------|-------------|
| `boolean` | خانة اختيار تشغيل/إيقاف |
| `text` | حقل إدخال نصي بسطر واحد |
| `select` | قائمة منسدلة (وفّر مصفوفة `options`) |
| `wysiwyg` | محرر نصوص غني |
| `html` | حقل HTML خام |
| `checkbox` | خانة اختيار |
| `user` | محدّد مستخدم |

لإعدادات `select`:

```php
$settings = [
    'mode' => [
        'type'             => 'select',
        'options'          => ['auto' => 'Automatic', 'manual' => 'Manual'],
        'translate_options' => true,
    ],
];
```

الوصول إلى الإعدادات في وقت التشغيل:

```php
$plugin = MyPluginPlugin::create();
$key  = $plugin->get('api_key');       // single value
$all  = $plugin->get_settings();       // all settings
```

## الخطوة 3: إنشاء plugin.php

الملف `plugin.php` في جذر الإضافة **مطلوب**. يجب أن يعيّن `$plugin_info`:

```php
<?php
$plugin_info = MyPluginPlugin::create()->get_info();
```

## الخطوة 4: إنشاء سكربتات التثبيت وإلغاء التثبيت

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

نفّذ إنشاء/حذف المخطط الفعلي داخل الصنف باستخدام `SchemaTool` من Doctrine.

## الخطوة 5: إضافة الترجمات

أنشئ ملفات اللغة في `lang/` باستخدام رموز الإعدادات المحلية (مثل `en_US.php` و`fr_FR.php` و`es.php`). الملف الاحتياطي هو `en_US.php`.

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

## الخطوة 6: حقن المحتوى عبر مناطق العرض

يمكن للإضافات حقن HTML في 18 منطقة محددة مسبقًا في الواجهة. تعتمد آلية عرض المنطقة على نوعها:

* **`course_tool_plugin`** هي المنطقة الوحيدة التي تُعرض عبر تجاوز `renderRegion(string $region): string` في صنف الإضافة. تُستدعى (عبر `PluginRegionController`) فقط لإضافة نطاقها المقرر (`is_course_plugin`) أثناء فتح صفحة مقرر:

  ```php
  public function renderRegion(string $region): string
  {
      if ('course_tool_plugin' !== $region) {
          return '';
      }
      return '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

* **المناطق العامة الست عشرة** — `content_bottom`، `content_top`، `footer_center`، `footer_left`، `footer_right`، `header_center`، `header_left`، `header_main`، `header_right`، `login_bottom`، `login_top`، `main_bottom`، `main_top`، `menu_bottom`، `menu_top`، `pre_footer` — تُعرض عبر تضمين ملف `index.php` الخاص بالإضافة، وليس عبر `renderRegion()`. يعيّن الإطار `$plugin_info['current_region']` قبل تضمين ذلك الملف، فيمكنه إما طباعة HTML مباشرة لتلك المنطقة عبر `echo` أو الإعلان عن قوالب Twig لعرضها عبر `$plugin_info['templates']`:

  ```php
  <?php
  // index.php
  if (!class_exists('MyPluginPlugin', false)) {
      require_once __DIR__.'/src/MyPluginPlugin.php';
  }

  $region = (string) ($plugin_info['current_region'] ?? '');

  if ('header_right' === $region) {
      echo '<div class="my-plugin-widget">Hello!</div>';
  }
  ```

  الملف `public/plugin/HelloWorld/index.php` مثال عملي مكتمل — لا تتجاوز HelloWorld الدالة `renderRegion()` على الإطلاق؛ كل منطقة تملؤها تمر عبر `index.php`.

* **`menu_administrator`** حالة خاصة محجوزة لروابط المسؤول فقط المعروضة في لوحة الإدارة القديمة، وليست الآليتين أعلاه. `Dashboard` و`CleanDeletedFiles` إضافتان حقيقيتان تستخدمانها.

أيًّا كانت الآلية التي تستخدمها، لا يزال على المسؤول تفعيل المنطقة (المناطق) لإضافتك من زر **المناطق** المجاور لها في صفحة **إدارة الإضافات** (انظر [الخطوة 9](#step-9-activate)) — لا تعرض الإضافة شيئًا في منطقة لم تُفعَّل صراحة هناك.

## الخطوة 7: التفاعل مع أحداث المنصة (اختياري)

يمكن للإضافات التفاعل مع أحداث المنصة باستخدام مشتركي أحداث Symfony. أنشئ ملفًا ينتهي بـ `EventSubscriber.php` داخل `src/EventSubscriber/` — يُسجَّل تلقائيًا عبر `PluginEventSubscriberPass`.

شرطان، وإلا يُتخطى المشترك بصمت: يجب أن تكون الصنف في **النطاق العام** (global namespace) (يمرّره الـ pass من اسم الملف)، ويجب تشغيل `composer dump-autoload` بعد إضافته (`public/plugin` هو إدخال classmap). تحقق من النتيجة بـ `php bin/console debug:event-dispatcher <event.name>`.

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

راجع `src/CoreBundle/Event/Events.php` للقائمة الكاملة للأحداث المتاحة (مستخدم، مقرر، جلسة، LP، تمرين، محفظة، مصادقة، والمزيد).

### التنظيف عند حذف مقرر أو جلسة أو مستخدم

إذا خزّنت إضافتك صفوفًا مرتبطة بمقرر أو جلسة أو مستخدم، اشترك في `Events::COURSE_DELETED` أو `Events::SESSION_DELETED` أو `Events::USER_DELETED`. هذه هي الطريقة الوحيدة للتنظيف — لم تعد طرق `doWhenDeleting*` القديمة موجودة. تنطبق ثلاث قواعد على هؤلاء المستمعين:

* **نفّذ على `AbstractEvent::TYPE_PRE`** — يُطلق الحدث قبل إزالة الصف، وهي اللحظة الوحيدة التي ما زال فيها المفتاح الأجنبي يُحلّ والبيانات قابلة للقراءة. يُطلق `USER_DELETED` أيضًا كـ `TYPE_POST`، لذا التحقق ليس اختياريًا هناك.
* **احمِ على التثبيت لا التفعيل** — استخدم `AppPlugin::getInstance()->isInstalled($this->plugin->get_name())`. تبقى صفوفك بعد تعطيل الإضافة، أو تفعيلها فقط على عنوان وصول آخر، ويحجب مفتاحها الأجنبي الحذف في الحالتين.
* **عند `USER_DELETED`، تحقق من `$event->isHardDelete()`** — الحذف الناعم يُبقي المستخدم قابلاً للاستعادة، لذا يجب أن تبقى بياناته.

```php
public function onUserDeleted(UserDeletedEvent $event): void
{
    if (AbstractEvent::TYPE_PRE !== $event->getType() || !$event->isHardDelete()) {
        return;
    }

    $userId = $event->getUser()?->getId();

    if (empty($userId) || !AppPlugin::getInstance()->isInstalled($this->plugin->get_name())) {
        return;
    }

    Database::getManager()->getConnection()->executeStatement(
        'DELETE FROM my_plugin_table WHERE user_id = :userId',
        ['userId' => $userId]
    );
}
```

إضافة `StudentFollowUp` هي المرجع للمستخدمين؛ وتحمل `Bbb` و`BuyCourses` و`EmbedRegistry` المكافئات للمقرر والجلسة.

## الخطوة 8: خطافات دورة الحياة

تجاوز هذه الطرق في صنف إضافتك للاستجابة لإجراءات المنصة:

| الطريقة | تُستدعى عندما |
|--------|----------------|
| `install()` | تُفعَّل الإضافة |
| `uninstall()` | تُزال الإضافة |
| `performActionsAfterConfigure()` | يحفظ المسؤول نموذج الإعداد |
| `course_settings_updated(array $values)` | تتغير إعدادات مستوى المقرر |
| `validateCourseSetting(string $variable)` | يُحفظ إعداد المقرر (أرجع `false` للرفض) |

أُزيلت `doWhenDeletingUser()` و`doWhenDeletingCourse()` و`doWhenDeletingSession()`، مع مُشغّل `AppPlugin::performActionsWhenDeletingItem()` الذي كان يستدعيها — تجاوزها الآن لا يفعل شيئًا. استخدم أحداث الحذف من [الخطوة 7](#cleaning-up-when-a-course-session-or-user-is-deleted) بدلًا من ذلك.

## الخطوة 9: التفعيل

سجّل الدخول كمسؤول وانتقل إلى كتلة **المنصة** في لوحة الإدارة، ثم **الإضافات** — يفتح ذلك صفحة **إدارة الإضافات**. اعثر على إضافتك وانقر **تثبيت**؛ بعد التثبيت، انقر **تمكين** لتفعيلها (تُظهر الإضافة الممكّنة زر **تعطيل** بدلًا من ذلك).

## نصائح

* **اتبع الإضافات الموجودة كأمثلة** — `public/plugin/HelloWorld/` و`public/plugin/TopLinks/` مراجع بسيطة جيدة
* **استخدم الترجمات** — استخدم دائمًا نظام `lang/` للنصوص الموجهة للمستخدم
* **نظّف عند إلغاء التثبيت** — أزل جداول قاعدة البيانات والإعدادات في سكربت إلغاء التثبيت
* **تحقق من حالة التمكين** — في مشتركي الأحداث، استدعِ `$this->plugin->isEnabled()` قبل تنفيذ المنطق. الاستثناء هو التنظيف عند الحذف: احمِ على التثبيت بدلًا من ذلك، لأن الصفوف تبقى بعد تعطيل الإضافة