# الإجراءات المخصصة

بالإضافة إلى عمليات CRUD القياسية، يحتوي Chamilo على عدد من متحكمات إجراءات API المخصصة (بالعشرات) التي تتعامل مع عمليات متخصصة. يختلف العدد الدقيق بين الإصدارات — قم بسرد `src/CoreBundle/Controller/Api/` للحصول على المجموعة الحالية.

## الموقع

تقع الإجراءات المخصصة في `src/CoreBundle/Controller/Api/`.

## الإجراءات المخصصة البارزة

### المستندات

| المتحكم | الغرض |
|---------|-------|
| `CreateDocumentFileAction` | رفع ملف أو إنشاء مجلد/رابط مستند |
| `UpdateDocumentFileAction` | استبدال ملف المستند |
| `ReplaceDocumentFileAction` | استبدال ملف مستند مع الحفاظ على معرفاته |
| `MoveDocumentAction` | نقل مستند إلى مجلد مختلف |
| `UpdateVisibilityDocument` | تبديل رؤية المستند للمتعلمين |
| `DownloadAllDocumentsAction` | تنزيل جميع المستندات في مجلد كملف ZIP |
| `DownloadSelectedDocumentsAction` | تنزيل مجموعة مختارة من المستندات كملف ZIP |
| `DocumentUsageAction` | سرد الدورات/الجلسات التي يُستخدم فيها المستند |
| `DocumentLearningPathUsageAction` | سرد مسارات التعلم التي يُستخدم فيها المستند |

### المصطلحات

| المتحكم | الغرض |
|---------|-------|
| `CreateCGlossaryAction` | إنشاء مصطلح مصطلحات |
| `UpdateCGlossaryAction` | تحديث مصطلح مصطلحات |
| `ExportCGlossaryAction` | تصدير المصطلحات إلى ملف |
| `ImportCGlossaryAction` | استيراد المصطلحات من ملف |
| `ExportGlossaryToDocumentsAction` | تصدير المصطلحات كمستند في الدورة |
| `GetGlossaryCollectionController` | الحصول على مجموعة المصطلحات مع تصفية مخصصة |

### الروابط

| المتحكم | الغرض |
|---------|-------|
| `CreateCLinkAction` | إنشاء رابط خارجي |
| `UpdateCLinkAction` | تحديث رابط خارجي |
| `CreateCLinkCategoryAction` | إنشاء فئة روابط |
| `UpdateCLinkCategoryAction` | تحديث فئة روابط |
| `CheckCLinkAction` | التحقق من إمكانية الوصول إلى عنوان URL للرابط |
| `ExportCLinksAction` | تصدير الروابط إلى ملف |
| `CLinkDetailsController` | الحصول على تفاصيل الرابط |
| `CLinkImageController` | الحصول على صورة معاينة الرابط أو تعيينها |
| `GetLinksCollectionController` | الحصول على مجموعة الروابط مع تصفية مخصصة |
| `UpdateVisibilityLink` | تبديل رؤية الرابط |
| `UpdateVisibilityLinkCategory` | تبديل رؤية فئة الروابط |
| `UpdatePositionLink` | إعادة ترتيب الروابط |

### مسارات التعلم

| المتحكم | الغرض |
|---------|-------|
| `CreateCLpAction` | إنشاء مسار تعلم |
| `LpReorderController` | إعادة ترتيب عناصر مسار التعلم |

### التقويم

| المتحكم | الغرض |
|---------|-------|
| `UpdateCCalendarEventAction` | تحديث حدث تقويم الدورة |
| `CalendarMyStudentsScheduleAction` | الحصول على جدول طلاب المعلم |

### المدونة

| المتحكم | الغرض |
|---------|-------|
| `CreateCBlogAction` | إنشاء منشور مدونة |
| `CreateBlogAttachmentAction` | إرفاق ملف بمنشور مدونة |
| `UpdateVisibilityBlog` | تبديل رؤية المدونة |

### صندوق الإرسال

| المتحكم | الغرض |
|---------|-------|
| `CreateDropboxFileAction` | رفع ملف إلى صندوق الإرسال (أداة تبادل الملفات) |

### أعمال الطلاب (الواجبات)

| المتحكم | الغرض |
|---------|-------|
| `CreateStudentPublicationFileAction` | تقديم ملف واجب |
| `CreateStudentPublicationCommentAction` | إضافة تعليق إلى تقديم |
| `CreateStudentPublicationCorrectionFileAction` | رفع ملف تصحيح لتقديم |

### الملفات الشخصية

| المتحكم | الغرض |
|---------|-------|
| `CreatePersonalFileAction` | رفع ملف إلى مساحة الملفات الشخصية للمستخدم |
| `UpdatePersonalFileAction` | تحديث ملف شخصي |

### الاجتماعي

| المتحكم | الغرض |
|---------|-------|
| `LikeSocialPostController` | الإعجاب بمنشور اجتماعي |
| `DislikeSocialPostController` | إلغاء الإعجاب بمنشور اجتماعي |
| `CreateSocialPostAttachmentAction` | إرفاق ملف بمنشور اجتماعي |
| `SocialPostAttachmentsController` | سرد الملحقات على منشور اجتماعي |
| `AbstractFeedbackSocialPostController` | الفئة الأساسية لإجراءات تعليقات المنشورات الاجتماعية |

### الجلسات

| المتحكم | الغرض |
|---------|-------|
| `CreateSessionWithUsersAndCoursesAction` | إنشاء جلسة وتسجيل مستخدمين ودورات في مكالمة واحدة |

### المستخدمون وروابط الوصول

| المتحكم | الغرض |
|---------|-------|
| `CreateUserOnAccessUrlAction` | إنشاء مستخدم وربطه برابط وصول |
| `UserAccessUrlsController` | سرد روابط الوصول التابعة لمستخدم |
| `UserSkillsController` | سرد المهارات الممنوحة لمستخدم |

### مؤتمرات الفيديو

| المتحكم | الغرض |
|---------|-------|
| `VideoConferenceCallbackController` | التعامل مع الاستدعاءات المرتدة من مزودي مؤتمرات الفيديو الخارجيين |

### الفئات الأساسية

| الفئة | الغرض |
|-------|-------|
| `BaseResourceFileAction` | الفئة الأساسية لإجراءات رفع الملفات؛ تتعامل مع تحليل multipart، إنشاء عقدة المورد، والتخزين |

---

---
## تنفيذ إجراء مخصص

الإجراءات المخصصة هي وحدات تحكم Symfony قياسية يتم الإشارة إليها في تعريفات عمليات API Platform. يوجد سمة `#[ApiResource]` على **الكيان**، ويشير معامل `controller:` لكل عملية إلى فئة الإجراء:

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

فئة الإجراء نفسها هي وحدة تحكم قابلة للاستدعاء عادية — يتم حقن الخدمات عبر معاملات طريقة `__invoke()`:

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

نقاط رئيسية:
- يتم تعيين `deserialize: false` عندما يقرأ الإجراء الطلب مباشرة (مثل تحميلات الملفات متعددة الأجزاء) بدلاً من السماح لـ API Platform بتحليل جسم JSON.
- عادةً ما تمتد إجراءات تحميل الملفات من `BaseResourceFileAction`، والتي تتعامل مع تحليل متعدد الأجزاء وربط عقدة المورد.
- يتم فرض الأمان عبر معامل `security:` على العملية، وليس داخل وحدة التحكم.