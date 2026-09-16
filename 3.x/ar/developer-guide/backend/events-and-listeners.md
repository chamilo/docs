# الأحداث والمستمعات

يستخدم Chamilo نظام الأحداث في Symfony للتواصل غير المترابط بين المكوّنات.

## مستمعات الأحداث

يستخدم Chamilo موقعين للمستمعات:

* **`src/CoreBundle/EventListener/`** — مستمعات نواة Symfony/HTTP (الطلب، الاستجابة، الاستثناء، تسجيل الدخول/الخروج، الوصول إلى المقرر/الجلسة، إلخ). أمثلة: `CidReqListener`، `CourseAccessListener`، `LoginSuccessHandler`، `LogoutListener`، `ExceptionListener`، `ResourceDoctrineListener`.
* **`src/CoreBundle/Entity/Listener/`** — مستمعات كيانات Doctrine المرتبطة بكيانات محددة. أمثلة: `ResourceNodeListener`، `CourseListener`، `SessionListener`، `LanguageListener`، `UserListener`، `MessageListener`.

اختر الموقع الذي يطابق ما تحتاج إلى التفاعل معه: أحداث مسار HTTP تُوضع في `EventListener/`؛ وخطافات دورة حياة الكيان تُوضع في `Entity/Listener/`.

## مشترِكو الأحداث

موجودون في `src/CoreBundle/EventSubscriber/`:

يمكن لمشترِكي الأحداث الاستماع إلى أحداث متعددة:

* **مشترِكو الأمان** — معالجة أحداث تسجيل الدخول/الخروج، وتتبع محاولات تسجيل الدخول
* **مشترِكو API** — معالجة سابقة/لاحقة لطلبات API
* **مشترِكو Doctrine** — التفاعل مع أحداث دورة حياة الكيان

## أحداث دورة حياة Doctrine

تستخدم الكيانات `#[ORM\HasLifecycleCallbacks]` لأحداث مستوى قاعدة البيانات:

```php
#[ORM\PrePersist]
public function prePersist(): void
{
    $this->createdAt = new DateTime();
}
```

## إنشاء مستمعات مخصصة

لإضافة سلوك مخصص:

1. أنشئ صنف مستمع/مشترِك في الحزمة المناسبة
2. وسِمه كمستمع أحداث أو مشترِك في إعداد الخدمة
3. نفّذ دالة المعالجة

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

| الحدث | متى يُطلَق |
|-------|--------------|
| `kernel.request` | كل طلب HTTP |
| `kernel.response` | قبل إرسال استجابة HTTP |
| `security.interactive_login` | عند تسجيل دخول المستخدم |
| `doctrine.prePersist` | قبل حفظ الكيان لأول مرة |
| `doctrine.postUpdate` | بعد تحديث الكيان |

## أحداث خاصة بـ Chamilo

تُرسَل هذه الأحداث من شيفرة Chamilo نفسها وهي نقاط التكامل الأساسية للإضافات. الثوابت معرَّفة في `Chamilo\CoreBundle\Event\Events`.

| الثابت | سلسلة الحدث | متى يُطلَق |
|----------|-------------|---------------|
| `Events::COURSE_CREATED` | `chamilo.event.course_created` | بعد إنشاء مقرر |
| `Events::COURSE_ACCESS_CHECK` | `chamilo.course_access_check` | قبل وصول مستخدم إلى مقرر |
| `Events::COURSE_USER_SUBSCRIPTION_CHECK` | `chamilo.event.course_user_subscription_check` | قبل تسجيل مستخدم في مقرر |
| `Events::SESSION_RESUBSCRIPTION` | `chamilo.event.session_resubscription` | عندما يحاول مستخدم إعادة الاشتراك في جلسة |
| `Events::LOGIN_CREDENTIALS_CHECKED` | `chamilo.event.login_credentials_checked` | بعد التحقق من بيانات اعتماد تسجيل الدخول |
| `Events::LOGIN_CONDITION_CHECKED` | `chamilo.event.login_condition_checked` | بعد التحقق من شروط تسجيل الدخول الإضافية |
| `Events::DOCUMENT_ACTION` | `chamilo.event.document_action` | عند عرض شريط أدوات أداة المستندات |
| `Events::DOCUMENT_ITEM_ACTION` | `chamilo.event.document_item_action` | عند عرض أزرار الإجراءات لكل ملف |
| `Events::DOCUMENT_ITEM_VIEW` | `chamilo.event.document_item_view` | عند فتح مستند للعرض |
| `Events::EXERCISE_REPORT_ACTION` | `chamilo.event.exercise_report_action` | عندما تعرض صفحة تقرير التمرين روابط الإجراءات الخاصة بها |
| `Events::EXERCISE_ENDED` | `chamilo.event.exercise_ended` | بعد أن يُرسل المتعلم تمريناً |
| `Events::EXERCISE_QUESTION_ANSWERED` | `chamilo.event.question_answered` | بعد الإجابة عن كل سؤال |
| `Events::LP_CREATED` | `chamilo.event.learning_path_created` | بعد إنشاء مسار تعلّم |
| `Events::LP_ITEM_VIEWED` | `chamilo.event.learning_path_item_viewed` | عندما يفتح المتعلم عنصراً في مسار التعلّم |
| `Events::LP_ENDED` | `chamilo.event.learning_path_ended` | بعد أن يُكمل المتعلم مسار تعلّم |
| `Events::ADMIN_BLOCK_DISPLAYED` | `chamilo.event.admin_block_displayed` | عندما يبني لوحة تحكم المسؤول قائمة الكتل الخاصة به |
| `Events::USER_CREATED` | `chamilo.event.user_created` | بعد إنشاء حساب مستخدم |
| `Events::USER_UPDATED` | `chamilo.event.user_updated` | بعد تحديث حساب مستخدم |
| `Events::USER_DELETED` | `chamilo.event.user_deleted` | بعد حذف حساب مستخدم |
| `Events::PORTFOLIO_ITEM_ADDED` | `chamilo.event.portfolio_item_added` | بعد إنشاء عنصر محفظة |
| `Events::NOTIFICATION_CONTENT_FORMATTED` | `chamilo_hook_event.notification_content` | عند تنسيق نص إشعار |

## مثال إضافة: إضافة زر إلى عارض المستندات

يستعرض هذا القسم كيف تستخدم إضافة مشترِك أحداث لحقن زر في صفحة Chamilo موجودة — دون الحاجة إلى تعديل شيفرة النواة.

### السيناريو

يريد إضافة تُدعى **MyViewer** إضافة زر «فتح في MyViewer» بجانب كل مستند في مدير ملفات المقرر. الحدث ذو الصلة هو `Events::DOCUMENT_ITEM_VIEW`، الذي يُرسِله Chamilo كلما كان مستند على وشك العرض، حاملاً كيان `CDocument` وقائمة روابط قابلة للتعديل.

### تخطيط مجلد الإضافة

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

### صنف الإضافة الرئيسي (`src/MyViewerPlugin.php`)

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

يوفر الصنف الأساسي `Plugin` الدوال `isEnabled()` و`get($settingKey)` ومساعدات لتثبيت أدوات المقرر والإعدادات. نمط المفرد (`static $instance`) هو اصطلاح Chamilo القياسي لأن صنف الإضافة يُنشأ أيضاً خارج حاوية Symfony (في صفحات PHP القديمة).

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

تُلحق `addLink()` HTML بالمصفوفة التي يعرضها قالب عرض المستندات في Chamilo بجانب إجراءات «تنزيل» و«معاينة» المدمجة. لا يعدّل المشترك ملفات نواة Chamilo أبداً.

### التسجيل

لا حاجة لتسجيل الخدمة يدوياً. يفعّل ملف `config/services.yaml` في Chamilo علامة `autoconfigure` في Symfony عالمياً، فتُوسَم تلقائياً أي صنف ينفّذ `EventSubscriberInterface` بوسم `kernel.event_subscriber`. طالما حُمِّل مجلد الإضافة (عبر classmap في Composer أو التحميل التلقائي PSR-4)، يلتقط Symfony المشترك عند مسح الذاكرة المؤقتة التالي.

```bash
php bin/console cache:clear
```

### كيف تتدفق بيانات الحدث

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

يمكن لعدة إضافات الاشتراك في الحدث نفسه بشكل مستقل؛ تلحق كل منها بالبيانات المشتركة دون معرفة بالأخرى. يتبع ترتيب التنفيذ نظام الأولوية في Symfony — مرّر عدداً صحيحاً للأولوية كعنصر ثانٍ في صف المعالج داخل `getSubscribedEvents()` إذا كان الترتيب مهماً:

```php
public static function getSubscribedEvents(): array
{
    return [
        Events::DOCUMENT_ITEM_VIEW => ['onDocumentItemView', 10], // higher = earlier
    ];
}
```