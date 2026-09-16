# الإجراءات المخصصة

بالإضافة إلى عمليات CRUD القياسية، يضم Chamilo عدداً من متحكمات إجراءات واجهة برمجة التطبيقات المخصصة (بعشرات الإجراءات) التي تعالج عمليات متخصصة. يختلف العدد الدقيق بين الإصدارات — اعرض `src/CoreBundle/Controller/Api/` للاطلاع على المجموعة الحالية.

## الموقع

توجد الإجراءات المخصصة في `src/CoreBundle/Controller/Api/`.

## إجراءات مخصصة بارزة

### المستندات

| المتحكم | الغرض |
|-----------|---------|
| `CreateDocumentFileAction` | رفع ملف أو إنشاء مجلد/مستند رابط |
| `UpdateDocumentFileAction` | استبدال ملف مستند |
| `ReplaceDocumentFileAction` | استبدال ملف مستند مع الحفاظ على معرّفاته |
| `MoveDocumentAction` | نقل مستند إلى مجلد مختلف |
| `UpdateVisibilityDocument` | تبديل ظهور المستند للمتعلمين |
| `DownloadAllDocumentsAction` | تنزيل جميع المستندات في مجلد كملف ZIP |
| `DownloadSelectedDocumentsAction` | تنزيل مجموعة محددة من المستندات كملف ZIP |
| `DocumentUsageAction` | سرد المقررات/الجلسات التي يُستخدم فيها مستند |
| `DocumentLearningPathUsageAction` | سرد مسارات التعلم التي يُستخدم فيها مستند |

### المسرد

| المتحكم | الغرض |
|-----------|---------|
| `CreateCGlossaryAction` | إنشاء مصطلح في المسرد |
| `UpdateCGlossaryAction` | تحديث مصطلح في المسرد |
| `ExportCGlossaryAction` | تصدير المسرد إلى ملف |
| `ImportCGlossaryAction` | استيراد المسرد من ملف |
| `ExportGlossaryToDocumentsAction` | تصدير المسرد كمستند في المقرر |
| `GetGlossaryCollectionController` | الحصول على مجموعة المسرد مع تصفية مخصصة |

### الروابط

| المتحكم | الغرض |
|-----------|---------|
| `CreateCLinkAction` | إنشاء رابط خارجي |
| `UpdateCLinkAction` | تحديث رابط خارجي |
| `CreateCLinkCategoryAction` | إنشاء فئة روابط |
| `UpdateCLinkCategoryAction` | تحديث فئة روابط |
| `CheckCLinkAction` | التحقق مما إذا كان عنوان URL للرابط قابلاً للوصول |
| `ExportCLinksAction` | تصدير الروابط إلى ملف |
| `CLinkDetailsController` | الحصول على تفاصيل الرابط |
| `CLinkImageController` | الحصول على صورة معاينة الرابط أو تعيينها |
| `GetLinksCollectionController` | الحصول على مجموعة الروابط مع تصفية مخصصة |
| `UpdateVisibilityLink` | تبديل ظهور الرابط |
| `UpdateVisibilityLinkCategory` | تبديل ظهور فئة الروابط |
| `UpdatePositionLink` | إعادة ترتيب الروابط |

### مسارات التعلم

| المتحكم | الغرض |
|-----------|---------|
| `CreateCLpAction` | إنشاء مسار تعلم |
| `LpReorderController` | إعادة ترتيب عناصر مسار التعلم |

### التقويم

| المتحكم | الغرض |
|-----------|---------|
| `UpdateCCalendarEventAction` | تحديث حدث تقويم المقرر |
| `CalendarMyStudentsScheduleAction` | الحصول على جدول طلاب المعلم |

### المدونة

| المتحكم | الغرض |
|-----------|---------|
| `CreateCBlogAction` | إنشاء تدوينة |
| `CreateBlogAttachmentAction` | إرفاق ملف بتدوينة |
| `UpdateVisibilityBlog` | تبديل ظهور المدونة |

### صندوق الإسقاط

| المتحكم | الغرض |
|-----------|---------|
| `CreateDropboxFileAction` | رفع ملف إلى صندوق الإسقاط (أداة تبادل الملفات) |

### أعمال الطلاب (الواجبات)

| المتحكم | الغرض |
|-----------|---------|
| `CreateStudentPublicationFileAction` | تسليم ملف واجب |
| `CreateStudentPublicationCommentAction` | إضافة تعليق إلى تسليم |
| `CreateStudentPublicationCorrectionFileAction` | رفع ملف تصحيح لتسليم |

### الملفات الشخصية

| المتحكم | الغرض |
|-----------|---------|
| `CreatePersonalFileAction` | رفع ملف إلى مساحة الملفات الشخصية للمستخدم |
| `UpdatePersonalFileAction` | تحديث ملف شخصي |

### الاجتماعي

| المتحكم | الغرض |
|-----------|---------|
| `LikeSocialPostController` | الإعجاب بمنشور اجتماعي |
| `DislikeSocialPostController` | إلغاء الإعجاب بمنشور اجتماعي |
| `CreateSocialPostAttachmentAction` | إرفاق ملف بمنشور اجتماعي |
| `SocialPostAttachmentsController` | سرد المرفقات على منشور اجتماعي |
| `AbstractFeedbackSocialPostController` | صنف أساسي لإجراءات ملاحظات المنشورات الاجتماعية |

### الجلسات

| المتحكم | الغرض |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | إنشاء جلسة وتسجيل المستخدمين والمقررات في استدعاء واحد |

### المستخدمون وعناوين URL للوصول

| المتحكم | الغرض |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | إنشاء مستخدم وربطه بعنوان URL للوصول |
| `UserAccessUrlsController` | سرد عناوين URL للوصول التي ينتمي إليها المستخدم |
| `UserSkillsController` | سرد المهارات الممنوحة لمستخدم |

### مؤتمر الفيديو

| المتحكم | الغرض |
|-----------|---------|
| `VideoConferenceCallbackController` | معالجة الاستدعاءات الراجعة من مزودي مؤتمرات الفيديو الخارجيين |

### الأصناف الأساسية

| الصنف | الغرض |
|-------|---------|
| `BaseResourceFileAction` | صنف أساسي لإجراءات رفع الملفات؛ يعالج تحليل multipart وإنشاء عقدة المورد والتخزين |

## تنفيذ إجراء مخصص

الإجراءات المخصصة هي وحدات تحكم Symfony قياسية يُشار إليها في تعريفات عمليات API Platform. توجد السمة `#[ApiResource]` على **الكيان**، ويشير المعامل `controller:` لكل عملية إلى صنف الإجراء:

```php
// On the entity class (e.g. src/CourseBundle/Entity/CDocument.php):
#[ApiResource(
    shortName: 'Document',
    operations: [
        new Post(
            controller: CreateDocumentFileAction::class,
            deserialize: false,
        ),
        new Put(
            uriTemplate: '/documents/{iid}/move',
            controller: MoveDocumentAction::class,
            deserialize: false,
        ),
    ]
)]
class CDocument extends AbstractResource { ... }
```

صنف الإجراء نفسه هو وحدة تحكم قابلة للاستدعاء بسيطة — تُحقَن الخدمات عبر وسائط الطريقة `__invoke()`:

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... other injected services
    ): CDocument {
        // Handle the upload and return the entity
    }
}
```

النقاط الأساسية:
- يُضبط `deserialize: false` عندما يقرأ الإجراء الطلب مباشرة (مثل رفع ملفات متعددة الأجزاء) بدلًا من ترك API Platform يفك تسلسل جسم JSON.
- تمتد إجراءات رفع الملفات عادةً من `BaseResourceFileAction`، الذي يتولى تحليل المحتوى متعدد الأجزاء وربط عقدة المورد.
- يُفرَض الأمان عبر المعامل `security:` على العملية، وليس داخل وحدة التحكم.