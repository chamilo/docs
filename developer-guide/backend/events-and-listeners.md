# الأحداث والمستمعين

يستخدم Chamilo نظام الأحداث في Symfony للاتصال المفصول بين المكونات.

## مستمعو الأحداث

يستخدم Chamilo موقعين للمستمعين:

* **`src/CoreBundle/EventListener/`** — مستمعو نواة Symfony/HTTP (الطلب، الاستجابة، الاستثناء، تسجيل الدخول/الخروج، الوصول إلى الدورة/الجلسة، إلخ). أمثلة: `CidReqListener`، `CourseAccessListener`، `LoginSuccessHandler`، `LogoutListener`، `ExceptionListener`، `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — مستمعو الكيانات Doctrine المرتبطة بكيانات محددة. أمثلة: `ResourceNodeListener`، `CourseListener`، `SessionListener`، `LanguageListener`، `UserListener`، `MessageListener`.

اختر الموقع الذي يتناسب مع ما تحتاج إلى الاستجابة له: أحداث خط أنابيب HTTP تذهب إلى `EventListener/`؛ خطافات دورة حياة الكيان تذهب إلى `Entity/Listener/`.

## المشتركون في الأحداث

موجودون في `src/CoreBundle/EventSubscriber/`:

يمكن لمشتركي الأحداث الاستماع إلى أحداث متعددة:

* **مشتركو الأمان** — التعامل مع أحداث تسجيل الدخول/الخروج، تتبع محاولات تسجيل الدخول
* **مشتركو API** — المعالجة قبل/بعد لطلبات API
* **مشتركو Doctrine** — الاستجابة لأحداث دورة حياة الكيان

## أحداث دورة حياة Doctrine

تستخدم الكيانات `#[ORM\HasLifecycleCallbacks]` لأحداث مستوى قاعدة البيانات:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## إنشاء مستمعين مخصصين

لإضافة سلوك مخصص:

1. إنشاء فئة مستمع/مشترك في الحزمة المناسبة
2. وضع علامة عليها كمستمع أو مشترك في تكوين الخدمة
3. تنفيذ طريقة المعالج

```php
class MyListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        // Your logic here
    }
}
```

## الأحداث الرئيسية

| الحدث | متى يتم إطلاقه |
|-------|--------------|
| `kernel.request` | كل طلب HTTP |
| `kernel.response` | قبل إرسال استجابة HTTP |
| `security.interactive_login` | عند تسجيل دخول المستخدم |
| `doctrine.prePersist` | قبل حفظ الكيان لأول مرة |
| `doctrine.postUpdate` | بعد تحديث الكيان |

## أحداث خاصة بـ Chamilo

هذه الأحداث يتم إطلاقها بواسطة كود Chamilo نفسه وهي نقاط التكامل الرئيسية للإضافات. يتم تعريف الثوابت في `Chamilo\CoreBundle\Event\Events`.

| الثابت | سلسلة الحدث | متى يتم إطلاقه |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | بعد إنشاء دورة |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | قبل وصول المستخدم إلى دورة |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | قبل تسجيل المستخدم في دورة |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | عند محاولة المستخدم إعادة الاشتراك في جلسة |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | بعد التحقق من بيانات تسجيل الدخول |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | بعد التحقق من شروط تسجيل الدخول الإضافية |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | عند عرض شريط أدوات أداة المستندات |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | عند عرض أزرار الإجراء لكل ملف |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | عند فتح مستند للعرض |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | عند عرض صفحة تقرير التمرين لروابط الإجراء |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | بعد تقديم المتعلم لتمرين |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | بعد الإجابة على كل سؤال |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | بعد إنشاء مسار تعلم |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | عند فتح المتعلم لعنصر مسار تعلم |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | بعد إكمال المتعلم لمسار تعلم |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | عند بناء لوحة تحكم المسؤول لقائمة الكتل |
| `Events::USER_CREATED` | `chamilo.event.user_created` | بعد إنشاء حساب مستخدم |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | بعد تحديث حساب مستخدم |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | بعد حذف حساب مستخدم |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | بعد إنشاء عنصر محفظة |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | عند تهيئة نص الإشعار |

## مثال إضافة: إضافة زر إلى عارض المستندات

يشرح هذا القسم كيفية استخدام إضافة لمشترك حدث لإدراج زر في صفحة Chamilo موجودة — دون الحاجة إلى تعديل كود النواة.

---

---
### السيناريو

يُريد إضافي يُدعى **MyViewer** إضافة زر "فتح في MyViewer" بجانب كل مستند في مدير ملفات الدورة الدراسية. الحدث ذو الصلة هو `Events::DOCUMENT_ITEM_VIEW`، الذي يُطلق من قبل Chamilo كلما كان مستند على وشك العرض، ويحمل كيان `CDocument` وقائمة قابلة للتعديل من الروابط.

### تخطيط دليل الإضافي

```
public/plugin/MyViewer/
├── plugin.php                          # Declares $plugin_info
├── install.php / uninstall.php
├── admin.php                           # Plugin settings page
├── lang/                               # Translation strings
└── src/
    ├── MyViewerPlugin.php              # Main plugin class (extends Plugin)
    └── EventSubscriber/
        └── MyViewerEventSubscriber.php # Event subscriber
```

### الصفحة الرئيسية للإضافي (`src/MyViewerPlugin.php`)

```php
declare(strict_types=1);

class MyViewerPlugin extends Plugin
{
    public const SETTING_SERVER_URL = 'server_url';

    protected function __construct()
    {
        parent::__construct('1.0', 'Your Name', [
            self::SETTING_SERVER_URL => 'text',
        ]);
    }

    public static function create(): static
    {
        static $instance = null;
        return $instance ??= new self();
    }

    public function getViewerUrl(int $documentId): string
    {
        $base = $this->get(self::SETTING_SERVER_URL);
        return sprintf('%s/view?doc=%d', rtrim((string) $base, '/'), $documentId);
    }
}
```

توفر الصفحة الأساسية `Plugin` الوظائف `isEnabled()` و`get($settingKey)` ومساعدات لتثبيت أدوات الدورة والإعدادات. نمط الـ singleton (`static $instance`) هو الاتفاقية القياسية في Chamilo لأن صفحة الإضافي تُستخدم أيضًا خارج حاوية Symfony (في صفحات PHP التقليدية).

### مشترك الحدث (`src/EventSubscriber/MyViewerEventSubscriber.php`)

```php
declare(strict_types=1);

use Chamilo\CoreBundle\Event\DocumentItemViewEvent;
use Chamilo\CoreBundle\Event\Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MyViewerEventSubscriber implements EventSubscriberInterface
{
    private MyViewerPlugin $plugin;

    public function __construct()
    {
        $this->plugin = MyViewerPlugin::create();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::DOCUMENT_ITEM_VIEW => 'onDocumentItemView',
        ];
    }

    public function onDocumentItemView(DocumentItemViewEvent $event): void
    {
        if (!$this->plugin->isEnabled()) {
            return;
        }

        $document = $event->getDocument();

        $url = $this->plugin->getViewerUrl($document->getIid());
        $label = $this->plugin->get_lang('OpenInMyViewer');

        $event->addLink(sprintf(
            '<a href="%s" target="_blank" class="btn btn--plain">%s</a>',
            htmlspecialchars($url, ENT_QUOTES),
            htmlspecialchars($label, ENT_QUOTES)
        ));
    }
}
```

تُضيف `addLink()` HTML إلى المصفوفة التي يعرضها قالب عرض المستند في Chamilo إلى جانب إجراءات "تحميل" و"معاينة" المدمجة. لا يُعدّل المشترك أبدًا ملفات Chamilo الأساسية.

### التسجيل

لا حاجة لتسجيل خدمة يدوي. يُفعّل `config/services.yaml` في Chamilo علامة `autoconfigure` في Symfony عالميًا، والتي تُسجّل تلقائيًا أي صفحة تنفّذ `EventSubscriberInterface` كـ `kernel.event_subscriber`. طالما يتم تحميل دليل الإضافي (عبر classmap لـ Composer أو PSR-4 autoload)، يلتقط Symfony المشترك عند مسح الذاكرة التخزينية التالي.

```bash
php bin/console cache:clear
```

### كيفية تدفق بيانات الحدث

```
Document list rendered
        │
        ▼
Chamilo dispatches DocumentItemViewEvent (carries CDocument entity + empty links[])
        │
        ├─► MyViewerEventSubscriber::onDocumentItemView()  → appends HTML link
        ├─► OnlyofficeEventSubscriber::onDocumentItemView() → appends "Edit" button
        │   (any number of plugins can listen to the same event)
        ▼
Template renders event->getLinks() alongside built-in file actions
```

يمكن لإضافيات متعددة الاشتراك في نفس الحدث بشكل مستقل؛ كل واحد يُضيف إلى البيانات المشتركة دون معرفة بالآخرين. يتبع ترتيب التنفيذ نظام الأولويات في Symfony — مرر رقم أولوية كعنصر ثاني في tuple المعالج في `getSubscribedEvents()` إذا كان الترتيب مهمًا:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```