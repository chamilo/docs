# المتحكمات

يستخدم Chamilo 2.0 عددًا كبيرًا من المتحكمات (في حدود عشرات) منظمة عبر الحزم. يتغير العدد الدقيق من إصدار إلى آخر — تعامل مع الأسماء أدناه على أنها توضيحية، لا شاملة.

## أنواع المتحكمات

### متحكمات الإدارة

موجودة في `src/CoreBundle/Controller/Admin/`. تتعامل مع إدارة المنصة:

* `AdminController` — لوحة التحكم، معلومات الملف، اختبار البريد الإلكتروني
* `UserListController` — إدارة المستخدمين CRUD
* `CourseListController` — إدارة الدورات
* `SessionAdminController` — إدارة الجلسات
* `SettingsController` — إعدادات المنصة
* `SecurityController` — محاولات تسجيل الدخول، أحداث IDS
* `PluginsController` — إدارة الإضافات
* `RoomController` — إدارة الغرف

### متحكمات إجراءات API

إجراءات مخصصة لـ API Platform في `src/CoreBundle/Controller/Api/`:

هذه تمتد إجراءات CRUD المدمجة في API Platform بمنطق أعمال مخصص. أمثلة:

* `CreateDocumentFileAction` — رفع ملف للوثائق
* `CreateStudentPublicationFileAction` — رفع تسليم المهام
* `UpdateVisibilityDocument` — تبديل رؤية الوثيقة
* `ExportCGlossaryAction` — تصدير قاموس المصطلحات
* `MoveDocumentAction` — نقل وثيقة إلى مجلد مختلف

بالنسبة لعمليات القراءة/الكتابة التي لا تحتاج إلى متحكم HTTP مخصص — أي عندما تريد فقط تغيير *كيفية* جلب عنصر أو مجموعة أو حفظها — فضّل **مزود الحالة** أو **معالج الحالة** (انظر أدناه). يُفضل حجز متحكمات إجراءات API لنقاط النهاية التي تحتاج فعليًا إلى منطق على مستوى الطلب (رفع الملفات، صيغ استجابة مخصصة، تدفقات متعددة الخطوات).

### متحكم الذكاء الاصطناعي

`src/CoreBundle/Controller/AiController.php` هو نقطة الدخول لنقاط نهاية متعلقة بالذكاء الاصطناعي (توليد أسئلة Aiken، توليد مسار التعلم، توليد الصور/الفيديو، تصحيح الإجابات المفتوحة، تحليل الوثائق…). يتطور مجموعة المسارات الدقيقة بسرعة — اقرأ سمات `#[Route]` الخاصة بالمتحكم للحصول على القائمة الحالية بدلاً من الاعتماد على نسخة هنا.

### متحكم الدردشة

`src/CoreBundle/Controller/ChatController.php` يتعامل مع الدردشة في الوقت الفعلي والمدرس الذكاء الاصطناعي:

* الرسائل من مستخدم إلى مستخدم
* دردشة المدرس الذكاء الاصطناعي (لوحة الدردشة المرساة)
* تاريخ الرسائل والاستطلاع

## مزودي ومعالجو حالة API Platform

ليس كل نقطة نهاية API مدعومة بمتحكم. يقسم API Platform 3 العمل بين واجهتين:

* **مزودي الحالة** (`ApiPlatform\State\ProviderInterface`) — يعيدون البيانات لعمليات `GET` (عنصر واحد أو مجموعة).
* **معالجو الحالة** (`ApiPlatform\State\ProcessorInterface`) — يتعاملون مع الكتابة لعمليات `POST`، `PUT`، `PATCH`، و `DELETE`.

تنفيذات Chamilo موجودة في `src/CoreBundle/State/` (حوالي 35+ فئة). ترتبط بالكيانات عبر وسيطتي `provider:` و `processor:` لعمليات `#[ApiResource]` بدلاً من المسارات.

### متى تستخدمها

استخدم مزود/معالج — بدلاً من متحكم إجراء API — عندما:

* تتبع نقطة النهاية شكل REST القياسي (قائمة / قراءة / إنشاء / تحديث / حذف) لكنها تحتاج إلى تجميع بيانات مخصص أو منطق حفظ.
* تحتاج إلى تصفية، إلغاء تطبيع، أو إثراء نتيجة قراءة مجموعة أو عنصر (مثل احترام Access URL الحالي، سياق الدورة، أو قواعد الرؤية).
* تحتاج إلى تشغيل آثار جانبية عند الكتابة (سجلات التدقيق، توليد الملفات، تحديثات الكيانات المرتبطة) مع الحفاظ على خط أنابيب تطبيع وتثبت وترقيم صفحات API Platform.
* تريد الحفاظ على اكتشاف العملية في مخطط OpenAPI / Hydra دون تسجيل مسار مخصص.

إذا كانت نقطة النهاية تحتاج بدلاً من ذلك إلى الوصول الخام إلى `Request`، أو تعيد حمولة غير مورد (تنزيل ملف، CSV، إعادة توجيه)، أو تنسق تدفقًا متعدد الخطوات، فإن متحكم إجراء API في `src/CoreBundle/Controller/Api/` أفضل.

### الربط على الكيان

أشر إلى الفئة في العملية:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### مثال على مزود

`src/CoreBundle/State/DocumentProvider.php` يحل `CDocument` بواسطة متغير URI ويرمي `NotFoundHttpException` عند عدم وجوده:

```php
final class DocumentProvider implements ProviderInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): CDocument
    {
        $document = $this->entityManager->find(CDocument::class, $uriVariables['document_id'] ?? null);

        if (!$document instanceof CDocument) {
            throw new NotFoundHttpException('Document not found.');
        }

        return $document;
    }
}
```

---
### مثال على المعالج

`src/CoreBundle/State/ColorThemeStateProcessor.php` يفوّض إلى `persistProcessor` الافتراضي لـ Doctrine، ثم ينفّذ التأثيرات الجانبية (يولّد ملف CSS على نظام الملفات Flysystem الخاص بالثيمات، يربط الثيم بـ Access URL الحالي):

```php
final readonly class ColorThemeStateProcessor implements ProcessorInterface
{
    public function __construct(
        private ProcessorInterface $persistProcessor,
        private AccessUrlHelper $accessUrlHelper,
        private EntityManagerInterface $entityManager,
        #[Autowire(service: 'oneup_flysystem.themes_filesystem')]
        private FilesystemOperator $filesystem,
    ) {}

    public function process($data, Operation $operation, array $uriVariables = [], array $context = []): ?ColorTheme
    {
        \assert($data instanceof ColorTheme);

        $colorTheme = $this->persistProcessor->process($data, $operation, $uriVariables, $context);

        // …generate colors.css, link to current AccessUrl, flush…

        return $colorTheme;
    }
}
```

### الأنماط التي يجب معرفتها

* **التكوين مع المعالج الافتراضي.** قم بتزيين `ProcessorInterface $persistProcessor` (المدمج في Doctrine) بحيث يتم تشغيل المنطق الخاص بـ Chamilo *حول* عملية الاستمرارية القياسية، وليس بدلاً منها.
* **مزودو المجموعات يقومون بتصفح صفحاتهم الخاصة.** عندما يبني مزود مجموعة استعلاماً مخصصاً، يجب أن يحترم `?page`، `?itemsPerPage`، وفلاتر البحث — يتدخل مُصفّح الصفحات التلقائي لـ API Platform فقط لمزود المجموعة الافتراضي لـ Doctrine.
* **فئة واحدة لكل مورد + نوع عملية شائع**، لكن مزوداً واحداً يمكن أن يخدم عدة عمليات (انظر `UsergroupStateProvider`، المُعاد استخدامه عبر أربع عمليات على `Usergroup`).
* **اتفاقية التسمية**: `<Entity>StateProvider` / `<Entity>StateProcessor` لمعالجات المورد بأكمله؛ `<Entity><Action>Processor` (مثل `CBlogAssignAuthorProcessor`، `CStudentPublicationDeleteProcessor`) للعمليات الأضيق.

## التوجيه

يستخدم المتحكّمات **سمات PHP 8** لتعريف المسارات:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

تستخدم موارد API Platform سمات `#[ApiResource]` على الكيانات، مع عمليات مخصصة تشير إلى إجراءات المتحكّم.

## السمات

يستخدم المتحكّمات سمات مشتركة لوظائف شائعة:

* `ControllerTrait` — الوصول إلى الإعدادات، والمُحوّل، والخدمات الشائعة
* `CourseControllerTrait` — مساعدات سياق المقرر الدراسي
* `ResourceControllerTrait` — عمليات عقدة المورد