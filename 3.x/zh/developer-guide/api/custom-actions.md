# 自定义操作

除标准 CRUD 操作外，Chamilo 还提供大量自定义 API 操作控制器（数十个量级），用于处理专项操作。确切数量因版本而异——请列出 `src/CoreBundle/Controller/Api/` 以查看当前集合。

## 位置

自定义操作位于 `src/CoreBundle/Controller/Api/`。

## 主要自定义操作

### 文档

| Controller | Purpose |
|-----------|---------|
| `CreateDocumentFileAction` | 上传文件或创建文件夹/链接文档 |
| `UpdateDocumentFileAction` | 替换文档的文件 |
| `ReplaceDocumentFileAction` | 替换文档文件，同时保留其 ID |
| `MoveDocumentAction` | 将文档移动到其他文件夹 |
| `UpdateVisibilityDocument` | 切换文档对学习者的可见性 |
| `DownloadAllDocumentsAction` | 将文件夹中的全部文档下载为 ZIP |
| `DownloadSelectedDocumentsAction` | 将所选文档下载为 ZIP |
| `DocumentUsageAction` | 列出使用某文档的课程/学期 |
| `DocumentLearningPathUsageAction` | 列出使用某文档的学习路径 |

### 术语表

| Controller | Purpose |
|-----------|---------|
| `CreateCGlossaryAction` | 创建术语表词条 |
| `UpdateCGlossaryAction` | 更新术语表词条 |
| `ExportCGlossaryAction` | 将术语表导出为文件 |
| `ImportCGlossaryAction` | 从文件导入术语表 |
| `ExportGlossaryToDocumentsAction` | 将术语表导出为课程中的文档 |
| `GetGlossaryCollectionController` | 获取带自定义筛选的术语表集合 |

### 链接

| Controller | Purpose |
|-----------|---------|
| `CreateCLinkAction` | 创建外部链接 |
| `UpdateCLinkAction` | 更新外部链接 |
| `CreateCLinkCategoryAction` | 创建链接分类 |
| `UpdateCLinkCategoryAction` | 更新链接分类 |
| `CheckCLinkAction` | 检查链接 URL 是否可访问 |
| `ExportCLinksAction` | 将链接导出为文件 |
| `CLinkDetailsController` | 获取链接详情 |
| `CLinkImageController` | 获取或设置链接的预览图 |
| `GetLinksCollectionController` | 获取带自定义筛选的链接集合 |
| `UpdateVisibilityLink` | 切换链接可见性 |
| `UpdateVisibilityLinkCategory` | 切换链接分类可见性 |
| `UpdatePositionLink` | 重新排序链接 |

### 学习路径

| Controller | Purpose |
|-----------|---------|
| `CreateCLpAction` | 创建学习路径 |
| `LpReorderController` | 重新排序学习路径条目 |

### 日历

| Controller | Purpose |
|-----------|---------|
| `UpdateCCalendarEventAction` | 更新课程日历事件 |
| `CalendarMyStudentsScheduleAction` | 获取教师所带学生的日程 |

### 博客

| Controller | Purpose |
|-----------|---------|
| `CreateCBlogAction` | 创建博文 |
| `CreateBlogAttachmentAction` | 为博文附加文件 |
| `UpdateVisibilityBlog` | 切换博客可见性 |

### 投递箱

| Controller | Purpose |
|-----------|---------|
| `CreateDropboxFileAction` | 向投递箱（文件交换工具）上传文件 |

### 学生作业（作业）

| Controller | Purpose |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 提交作业文件 |
| `CreateStudentPublicationCommentAction` | 为提交添加评论 |
| `CreateStudentPublicationCorrectionFileAction` | 为提交上传批改文件 |

### 个人文件

| Controller | Purpose |
|-----------|---------|
| `CreatePersonalFileAction` | 向用户个人文件空间上传文件 |
| `UpdatePersonalFileAction` | 更新个人文件 |

### 社交

| Controller | Purpose |
|-----------|---------|
| `LikeSocialPostController` | 点赞社交帖子 |
| `DislikeSocialPostController` | 取消点赞社交帖子 |
| `CreateSocialPostAttachmentAction` | 为社交帖子附加文件 |
| `SocialPostAttachmentsController` | 列出社交帖子上的附件 |
| `AbstractFeedbackSocialPostController` | 社交帖子反馈操作的基类 |

### 学期

| Controller | Purpose |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | 一次调用中创建学期并注册用户与课程 |

### 用户与访问 URL

| Controller | Purpose |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | 创建用户并将其关联到访问 URL |
| `UserAccessUrlsController` | 列出用户所属的访问 URL |
| `UserSkillsController` | 列出授予用户的技能 |

### 视频会议

| Controller | Purpose |
|-----------|---------|
| `VideoConferenceCallbackController` | 处理来自外部视频会议提供商的回调 |

### 基类

| Class | Purpose |
|-------|---------|
| `BaseResourceFileAction` | 文件上传操作的基类；处理 multipart 解析、资源节点创建与存储 |

## 实现自定义操作

自定义操作是在 API Platform 操作定义中引用的标准 Symfony 控制器。`#[ApiResource]` 属性位于**实体**上，每个操作的 `controller:` 参数指向该操作类：

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

操作类本身是普通的可调用控制器——服务通过 `__invoke()` 方法参数注入：

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

要点：
- 当操作直接读取请求（例如 multipart 文件上传），而不是让 API Platform 反序列化 JSON 请求体时，应设置 `deserialize: false`。
- 文件上传类操作通常继承 `BaseResourceFileAction`，由它处理 multipart 解析以及资源节点的关联。
- 安全通过操作上的 `security:` 参数强制执行，而不是在控制器内部实现。