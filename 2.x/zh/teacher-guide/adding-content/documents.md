# 文档

文档工具是您课程的文件存储库。您可以上传文件、创建HTML格式的文档、将内容组织到文件夹中，并为学生提供访问所需所有材料的机会。

## 访问文档工具

在课程首页上打开**文档**工具 <img src="/.gitbook/assets/icons/mdi-bookshelf.svg" alt="文档" data-size="line">。您将看到一个文件浏览器，显示您课程文档库的根文件夹。

![文档文件浏览器，显示带有操作图标的文件夹和文件](/.gitbook/assets/documents-file-browser.png)

## 上传文件

1. 点击**上传**按钮 <img src="/.gitbook/assets/icons/mdi-upload.svg" alt="上传" data-size="line">
2. 从您的计算机中选择一个或多个文件（您可以将文件拖放到上传区域）
3. 文件将被上传并显示在当前文件夹中

Chamilo 支持大多数常见文件类型：PDF、办公文档（.docx, .odt）、演示文稿（.pptx, .odp）、电子表格（.xlsx, .ods）、图片（PNG, JPG, SVG, GIF）、音频文件、视频文件（包括 WEBM）、HTML 文件等。

某些格式可能会被门户管理员通过安全设置中的白名单/黑名单过滤配置所禁止。

为了便于学生阅读，我们建议上传浏览器可以直接查看或打开而无需额外工具的文件。这将使您的课程更具可移植性，从而更易于在移动设备上访问，并对有特殊需求的人群更加友好。

## 创建内容

除了上传文件外，您还可以在 Chamilo 中直接创建内容：

### 网页

1. 点击**新建文档**
2. 使用富文本编辑器编写内容，支持格式化、图片、表格和链接
3. 为页面输入一个**标题**
4. 保存

富文本编辑器（TinyMCE）提供类似于文字处理器的功能，包括：

* 文本格式化（粗体、斜体、标题、列表）
* 表格
* 图片（上传或链接到现有图片）
* 嵌入视频和音频
* 链接到其他资源
* 高级用户的 HTML 源代码编辑

### AI 媒体生成

当平台上启用了 AI 助手时，您可以请求 AI 为您正在编辑的文档中的某个段落生成**图片**或**短视频**。选择一个段落，打开**AI 生成媒体**对话框，AI 将生成一个媒体项目供您审查和插入。该对话框会遵守课程级别的权限，仅在允许 AI 生成媒体的课程中显示。

### 录音

如果您的浏览器支持，您可以直接在文档工具中录制音频——这对于创建音频指导或语言学习内容非常有用。这需要 Chamilo 配置为 HTTPS，因为录音功能使用的技术只有在连接安全时才被浏览器允许。

## 使用文件夹组织

使用文件夹保持您的文档库井井有条：

1. 点击**新建文件夹** <img src="/.gitbook/assets/icons/mdi-folder-plus.svg" alt="新建文件夹" data-size="line">
2. 为文件夹输入名称
3. 保存

您可以创建嵌套文件夹，以构建逻辑的内容层次结构（例如，`模块 1 > 第 1 周 > 阅读材料`）。

### 移动文件

* 在列表中找到您的文件
* 点击**移动** <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="移动" data-size="line">
* 选择目标文件夹
* 确认

---
## 管理文档

对于每个文件或文件夹，您可以：

| 操作 | 图标 | 描述 |
|------|-------|-----------|
| **编辑** | <img src="/.gitbook/assets/icons/mdi-pencil.svg" alt="编辑" data-size="line"> | 重命名文件或编辑其内容（针对网页） |
| **删除** | <img src="/.gitbook/assets/icons/mdi-delete.svg" alt="删除" data-size="line"> | 删除文件或文件夹 |
| **下载** | <img src="/.gitbook/assets/icons/mdi-download-box.svg" alt="下载" data-size="line"> | 将文件下载到您的计算机 |
| **可见性** | <img src="/.gitbook/assets/icons/mdi-eye.svg" alt="可见性" data-size="line"> | 对学生隐藏或显示文件 |
| **替换** | <img src="/.gitbook/assets/icons/mdi-file-replace.svg" alt="替换" data-size="line"> | 用更新版本替换文件 |
| **移动** | <img src="/.gitbook/assets/icons/mdi-folder-move.svg" alt="移动" data-size="line"> | 移动到不同的文件夹 |

替换文件是一个重要功能，当您使用文档构建学习路径时，替换文档可以让其更新，而不会让学生丢失针对该文档保存的进度。

### 批量操作

使用复选框选择多个文件，然后使用工具栏一次性删除或下载所有选定的项目。

---
## 与 OnlyOffice 集成

如果您的管理员配置了 **OnlyOffice** 插件，您可以直接在浏览器中编辑 Word、Excel 和 PowerPoint（或 LibreOffice）文件，而无需下载它们。在查看兼容文件时，寻找 **使用 OnlyOffice 编辑** 选项 <img src="/.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line">。

文档存储在 Chamilo 中，OnlyOffice 仅用于在浏览器中**查看**或编辑文档，无需额外的工具。

## 云端文件

如果您使用云存储（Azure Blob、AWS S3 或 Google Cloud）来存储文件，这些文件将存储在云端，但您可以从这里链接它们。这对您和您的学生来说是透明的——文档工具的工作方式相同，无论后端存储如何。

## 小贴士

* **从一开始就组织好** — 在上传内容之前创建文件夹结构，以避免后续重新整理。如果您已经创建了具有正确结构的其他课程，可以稍后将其用作模板
* **使用描述性文件名** — 使用清晰且有意义的名称，帮助学生找到所需内容
* **隐藏正在进行中的工作** — 使用可见性切换开关隐藏您仍在准备的文档
* **从学习路径链接** — 在您的学习路径中引用文档，以创建引导式学习序列
* **检查磁盘配额** — 如果您的课程有存储限制，请删除过时的文件以释放空间