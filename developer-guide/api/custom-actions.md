# 自定义操作

除了标准的 CRUD 操作外，Chamilo 还拥有许多自定义 API 操作控制器（数量在几十个左右），用于处理专门的操作。具体数量因版本而异——请查看 `src/CoreBundle/Controller/Api/` 以获取当前集合。

## 位置

自定义操作位于 `src/CoreBundle/Controller/Api/`。

## 值得注意的自定义操作

### 文档

| 控制器 | 用途 |
|-----------|---------|
| `CreateDocumentFileAction` | 上传文件或创建文件夹/链接文档 |
| `UpdateDocumentFileAction` | 替换文档文件 |
| `ReplaceDocumentFileAction` | 替换文档文件，保留其 ID |
| `MoveDocumentAction` | 将文档移动到不同文件夹 |
| `UpdateVisibilityDocument` | 切换文档对学习者的可见性 |
| `DownloadAllDocumentsAction` | 以 ZIP 格式下载文件夹中的所有文档 |
| `DownloadSelectedDocumentsAction` | 以 ZIP 格式下载选定的文档集 |
| `DocumentUsageAction` | 列出使用文档的课程/会话 |
| `DocumentLearningPathUsageAction` | 列出使用文档的学习路径 |

### 词汇表

| 控制器 | 用途 |
|-----------|---------|
| `CreateCGlossaryAction` | 创建词汇表术语 |
| `UpdateCGlossaryAction` | 更新词汇表术语 |
| `ExportCGlossaryAction` | 将词汇表导出为文件 |
| `ImportCGlossaryAction` | 从文件导入词汇表 |
| `ExportGlossaryToDocumentsAction` | 将词汇表导出为课程中的文档 |
| `GetGlossaryCollectionController` | 获取带有自定义过滤的词汇表集合 |

### 链接

| 控制器 | 用途 |
|-----------|---------|
| `CreateCLinkAction` | 创建外部链接 |
| `UpdateCLinkAction` | 更新外部链接 |
| `CreateCLinkCategoryAction` | 创建链接类别 |
| `UpdateCLinkCategoryAction` | 更新链接类别 |
| `CheckCLinkAction` | 检查链接 URL 是否可访问 |
| `ExportCLinksAction` | 将链接导出为文件 |
| `CLinkDetailsController` | 获取链接详细信息 |
| `CLinkImageController` | 获取或设置链接的预览图像 |
| `GetLinksCollectionController` | 获取带有自定义过滤的链接集合 |
| `UpdateVisibilityLink` | 切换链接可见性 |
| `UpdateVisibilityLinkCategory` | 切换链接类别可见性 |
| `UpdatePositionLink` | 重新排序链接 |

### 学习路径

| 控制器 | 用途 |
|-----------|---------|
| `CreateCLpAction` | 创建学习路径 |
| `LpReorderController` | 重新排序学习路径项目 |

### 日历

| 控制器 | 用途 |
|-----------|---------|
| `UpdateCCalendarEventAction` | 更新课程日历事件 |
| `CalendarMyStudentsScheduleAction` | 获取教师学生的日程安排 |

### 博客

| 控制器 | 用途 |
|-----------|---------|
| `CreateCBlogAction` | 创建博客文章 |
| `CreateBlogAttachmentAction` | 为博客文章添加附件 |
| `UpdateVisibilityBlog` | 切换博客可见性 |

### Dropbox

| 控制器 | 用途 |
|-----------|---------|
| `CreateDropboxFileAction` | 上传文件到 Dropbox（文件交换工具） |

### 学生作业（任务）

| 控制器 | 用途 |
|-----------|---------|
| `CreateStudentPublicationFileAction` | 提交作业文件 |
| `CreateStudentPublicationCommentAction` | 为提交添加评论 |
| `CreateStudentPublicationCorrectionFileAction` | 为提交上传更正文件 |

### 个人文件

| 控制器 | 用途 |
|-----------|---------|
| `CreatePersonalFileAction` | 上传文件到用户的个人文件空间 |
| `UpdatePersonalFileAction` | 更新个人文件 |

### 社交

| 控制器 | 用途 |
|-----------|---------|
| `LikeSocialPostController` | 点赞社交帖子 |
| `DislikeSocialPostController` | 取消点赞社交帖子 |
| `CreateSocialPostAttachmentAction` | 为社交帖子添加附件 |
| `SocialPostAttachmentsController` | 列出社交帖子上的附件 |
| `AbstractFeedbackSocialPostController` | 社交帖子反馈操作的基类 |

### 会话

| 控制器 | 用途 |
|-----------|---------|
| `CreateSessionWithUsersAndCoursesAction` | 创建会话并一次性注册用户和课程 |

### 用户与访问 URL

| 控制器 | 用途 |
|-----------|---------|
| `CreateUserOnAccessUrlAction` | 创建用户并将其与访问 URL 关联 |
| `UserAccessUrlsController` | 列出用户所属的访问 URL |
| `UserSkillsController` | 列出授予用户的技能 |

### 视频会议

| 控制器 | 用途 |
|-----------|---------|
| `VideoConferenceCallbackController` | 处理来自外部视频会议提供商的回调 |

### 基类

| 类 | 用途 |
|-------|---------|
| `BaseResourceFileAction` | 文件上传操作的基类；处理多部分解析、资源节点创建和存储 |

## 实现自定义操作

自定义操作是标准的 Symfony 控制器，在 API Platform 的操作定义中被引用。`#[ApiResource]` 属性存在于**实体**上，每个操作的 `controller:` 参数指向操作类：

```php
// 在实体类上（例如 src/CourseBundle/Entity/CDocument.php）：
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

操作类本身是一个普通的可调用控制器——服务通过 `__invoke()` 方法参数注入：

```php
namespace Chamilo\CoreBundle\Controller\Api;

use Chamilo\CourseBundle\Entity\CDocument;
use Symfony\Component\HttpFoundation\Request;

final class CreateDocumentFileAction extends BaseResourceFileAction
{
    public function __invoke(
        Request $request,
        CDocumentRepository $repo,
        // ... 其他注入的服务
    ): CDocument {
        // 处理上传并返回实体
    }
}
```

关键点：
- 当操作直接读取请求（例如多部分文件上传）而不是让 API Platform 反序列化 JSON 主体时，设置 `deserialize: false`。
- 文件上传操作通常继承自 `BaseResourceFileAction`，它处理多部分解析和资源节点连接。
- 安全性通过操作上的 `security:` 参数强制执行，而不是在控制器内部。