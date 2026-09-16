# وحدات التحكم

يستخدم Chamilo 3.0 عددًا كبيرًا من وحدات التحكم (بترتيب العشرات) موزّعة عبر الحزم. يتغيّر العدد الدقيق من إصدار إلى آخر — اعتبر الأسماء أدناه توضيحية وليست شاملة.

## أنواع وحدات التحكم

### وحدات تحكم الإدارة

تقع في `src/CoreBundle/Controller/Admin/`. تتولى إدارة المنصة:

* `AdminController` — لوحة المعلومات، معلومات الملفات، اختبار البريد الإلكتروني
* `UserListController` — عمليات CRUD للمستخدمين
* `CourseListController` — إدارة المقررات
* `SessionAdminController` — إدارة الجلسات
* `SettingsController` — إعدادات المنصة
* `SecurityController` — محاولات تسجيل الدخول، أحداث IDS
* `PluginsController` — إدارة الإضافات
* `RoomController` — إدارة الغرف

### وحدات تحكم إجراءات API

إجراءات مخصّصة لـ API Platform في `src/CoreBundle/Controller/Api/`:

توسّع عمليات CRUD المضمّنة في API Platform بمنطق أعمال مخصّص. أمثلة:

* `CreateDocumentFileAction` — رفع ملف للمستندات
* `CreateStudentPublicationFileAction` — رفع تسليم الواجب
* `UpdateVisibilityDocument` — تبديل ظهور المستند
* `ExportCGlossaryAction` — تصدير المسرد
* `MoveDocumentAction` — نقل مستند إلى مجلد مختلف

لعمليات القراءة/الكتابة التي لا تحتاج إلى وحدة تحكم HTTP مخصّصة — أي عندما تريد فقط تغيير *كيفية* جلب عنصر أو مجموعة أو حفظها — فضّل **موفّر الحالة (State Provider)** أو **معالج الحالة (State Processor)** (انظر أدناه). يُفضَّل حصر وحدات تحكم إجراءات API في النقاط النهائية التي تحتاج فعلًا إلى منطق على مستوى الطلب (رفع الملفات، صيغ استجابة مخصّصة، تدفقات متعددة الخطوات).

### وحدة تحكم الذكاء الاصطناعي

`src/CoreBundle/Controller/AiController.php` هي نقطة الدخول لنقاط النهاية المتعلقة بالذكاء الاصطناعي (توليد أسئلة Aiken، توليد مسار التعلّم، توليد الصور/الفيديو، تصحيح الإجابات المفتوحة، تحليل المستندات…). تتطوّر مجموعة المسارات بسرعة — اقرأ سمات `#[Route]` في وحدة التحكم للقائمة الحالية بدل الاعتماد على نسخة هنا.

### وحدة تحكم الدردشة

`src/CoreBundle/Controller/ChatController.php` تتولى الدردشة الفورية ومعلّم الذكاء الاصطناعي:

* المراسلة من مستخدم إلى مستخدم
* دردشة معلّم الذكاء الاصطناعي (لوحة دردشة مرسّاة)
* سجل الرسائل والاستطلاع

## موفّرو الحالة ومعالجوها في API Platform

ليست كل نقطة نهاية API مدعومة بوحدة تحكم. يقسّم API Platform 4 العمل بين واجهتين:

* **موفّرو الحالة** (`ApiPlatform\State\ProviderInterface`) — يعيدون البيانات لعمليات `GET` (عنصر واحد أو مجموعة).
* **معالجو الحالة** (`ApiPlatform\State\ProcessorInterface`) — يتولون الكتابة لعمليات `POST` و`PUT` و`PATCH` و`DELETE`.

توجد تنفيذات Chamilo في `src/CoreBundle/State/` (حوالي 35+ صنفًا). تُربَط بالكيانات عبر وسيطتي `provider:` و`processor:` لعمليات `#[ApiResource]` وليس عبر المسارات.

### متى تستخدمها

الجأ إلى موفّر/معالج — بدل وحدة تحكم إجراء API — عندما:

* تتبع نقطة النهاية الشكل REST القياسي (قائمة / قراءة / إنشاء / تحديث / حذف) لكنها تحتاج تجميع بيانات أو منطق حفظ مخصّص.
* تحتاج إلى تصفية نتيجة قراءة مجموعة أو عنصر أو إلغاء تطبيعها أو إثرائها (مثل احترام عنوان URL للوصول الحالي، أو سياق المقرر، أو قواعد الظهور).
* تحتاج إلى تشغيل آثار جانبية عند الكتابة (سجلات التدقيق، توليد الملفات، تحديثات الكيانات المرتبطة) مع الإبقاء على مسار التطبيع والتحقق والترقيم في API Platform.
* تريد الإبقاء على العملية قابلة للاكتشاف في مخطط OpenAPI / Hydra دون تسجيل مسار مخصّص.

إذا احتاجت نقطة النهاية بدلًا من ذلك إلى وصول خام إلى `Request`، أو أعادت حمولة ليست موردًا (تنزيل ملف، CSV، إعادة توجيه)، أو نسّقت تدفقًا متعدد الخطوات، فإن وحدة تحكم إجراء API في `src/CoreBundle/Controller/Api/` أنسب.

### الربط على الكيان

أشر إلى الصنف على العملية:

```php
#[ApiResource(
    operations: [
        new GetCollection(provider: UserCollectionStateProvider::class),
        new Post(processor: ColorThemeStateProcessor::class),
    ]
)]
class ColorTheme { ... }
```

### مثال على الموفّر

`src/CoreBundle/State/DocumentProvider.php` يحلّ `CDocument` عبر متغير URI ويرمي `NotFoundHttpException` عند الغياب:

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

### مثال المعالج

يفوّض `src/CoreBundle/State/ColorThemeStateProcessor.php` إلى `persistProcessor` الافتراضي في Doctrine، ثم ينفّذ آثارًا جانبية (يولّد ملف CSS على نظام ملفات Flysystem الخاص بالسمات، ويربط السمة بعنوان Access URL الحالي):

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

### أنماط يجدر معرفتها

* **التركيب مع المعالج الافتراضي.** زيّن `ProcessorInterface $persistProcessor` (المدمج في Doctrine) بحيث يعمل منطق Chamilo الخاص *حول* عملية الحفظ القياسية، لا بدلًا منها.
* **موفّرو المجموعات ينفّذون ترقيم الصفحات بأنفسهم.** عندما يبني موفّر مجموعة استعلامًا مخصصًا، يجب أن يحترم `?page` و`?itemsPerPage` ومرشحات البحث — لا يعمل مُرقّم الصفحات التلقائي في API Platform إلا مع موفّر مجموعة Doctrine الافتراضي.
* **صنف واحد لكل مورد + نوع عملية أمر شائع**، لكن يمكن لموفّر واحد أن يخدم عدة عمليات (انظر `UsergroupStateProvider`، المُعاد استخدامه عبر أربع عمليات على `Usergroup`).
* **اصطلاح التسمية**: `<Entity>StateProvider` / `<Entity>StateProcessor` للمعالجات على مستوى المورد بأكمله؛ `<Entity><Action>Processor` (مثل `CBlogAssignAuthorProcessor` و`CStudentPublicationDeleteProcessor`) للعمليات الأضيق نطاقًا.

## التوجيه

تستخدم وحدات التحكم **سمات PHP 8** لتعريف المسارات:

```php
#[Route('/admin/user-list')]
class UserListController extends AbstractController
{
    #[Route('/', name: 'admin_user_list')]
    public function index(): Response { ... }
}
```

تستخدم موارد API Platform سمات `#[ApiResource]` على الكيانات، مع عمليات مخصصة تشير إلى إجراءات وحدات التحكم.

## السمات المشتركة (Traits)

تستخدم وحدات التحكم سمات مشتركة للوظائف الشائعة:

* `ControllerTrait` — الوصول إلى الإعدادات والمُسلسِل والخدمات المشتركة
* `CourseControllerTrait` — مساعدات سياق المقرر
* `ResourceControllerTrait` — عمليات عقدة المورد