# 文档

文档工具是课程的文件仓库。您可以上传文件、创建 HTML 格式的文档、将内容整理到文件夹中，并为学习者提供他们所需的全部资料。

## 访问文档工具

从课程主页打开 **文档** <img src="../../.gitbook/assets/icons/mdi-bookshelf.svg" alt="文档" data-size="line"> 工具。您将看到文件浏览器，显示课程文档库的根文件夹。

![显示文件夹、文件及操作图标的文档文件浏览器](../../.gitbook/assets/documents-file-browser.png)

## 上传文件

1. 点击 **上传** <img src="../../.gitbook/assets/icons/mdi-upload.svg" alt="上传" data-size="line"> 按钮
2. 从计算机中选择一个或多个文件（可将文件拖放到上传区域）
3. 文件上传后会出现在当前文件夹中

Chamilo 支持大多数常见文件类型：PDF、办公文档（.docx、.odt）、演示文稿（.pptx、.odp）、电子表格（.xlsx、.ods）、图像（PNG、JPG、SVG、GIF）、音频文件、视频文件（包括 WEBM）、HTML 文件等。

门户管理员可能通过管理后台安全部分的白名单/黑名单过滤设置禁止某些格式。

为便于学习者阅读，我们建议上传浏览器无需额外工具即可查看或打开的文件。这会使课程更具可移植性，从而更便于在移动设备上访问，也更便于有特殊能力需求的人士阅读。

## 创建内容

除上传文件外，您还可以直接在 Chamilo 中创建内容：

### 网页

1. 点击 **新建文档**
2. 使用富文本编辑器撰写内容，可包含格式、图像、表格和链接
3. 为页面输入 **标题**
4. 保存

富文本编辑器（TinyMCE）提供类似文字处理软件的功能，包括：

* 文本格式（粗体、斜体、标题、列表）
* 表格
* 图像（上传或链接到现有图像）
* 嵌入视频和音频
* 指向其他资源的链接
* 供高级用户使用的 HTML 源代码编辑

### AI 媒体生成

当平台启用 AI 助手时，您可以请 AI 生成 **图像** 或 **短视频**，用于为正在编辑的文档中的段落配图。选中一段文字，打开 **生成 AI 媒体** 对话框，AI 将生成可供您审阅并插入的媒体项。该对话框遵循课程级权限，仅在允许 AI 媒体生成的课程中显示。

### 音频录制

如果浏览器支持，您可以直接在文档工具中录制音频——适用于创建音频说明或语言学习内容。这要求 Chamilo 使用 HTTPS 配置，因为音频录制所用技术仅在连接安全时才被浏览器允许。

## 使用文件夹进行整理

使用文件夹保持文档库井然有序：

1. 点击 **新建文件夹** <img src="../../.gitbook/assets/icons/mdi-folder-plus.svg" alt="新建文件夹" data-size="line">
2. 输入文件夹名称
3. 保存

您可以创建嵌套文件夹以构建逻辑内容层次（例如：`Module 1 > Week 1 > Readings`）。

### 移动文件

* 在列表中找到您的文件
* 点击 **移动** <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="移动" data-size="line">
* 选择目标文件夹
* 确认

## 管理文档

对于每个文件或文件夹，您可以：

| 操作 | 图标 | 说明 |
|--------|------|-------------|
| **编辑** | <img src="../../.gitbook/assets/icons/mdi-pencil.svg" alt="编辑" data-size="line"> | 重命名文件或编辑其内容（适用于网页） |
| **删除** | <img src="../../.gitbook/assets/icons/mdi-delete.svg" alt="删除" data-size="line"> | 移除文件或文件夹 |
| **下载** | <img src="../../.gitbook/assets/icons/mdi-download-box.svg" alt="下载" data-size="line"> | 将文件下载到计算机 |
| **可见性** | <img src="../../.gitbook/assets/icons/mdi-eye.svg" alt="可见性" data-size="line"> | 对学习者隐藏或显示该文件 |
| **替换** | <img src="../../.gitbook/assets/icons/mdi-file-replace.svg" alt="替换" data-size="line"> | 用更新版本替换该文件 |
| **移动** | <img src="../../.gitbook/assets/icons/mdi-folder-move.svg" alt="移动" data-size="line"> | 移动到其他文件夹 |

当您使用文档构建学习路径时，替换文件是一项重要功能，因为替换文档可在不丢失学习者已保存进度的情况下刷新该文档。

### 批量操作

使用复选框选择多个文件，然后使用工具栏一次性删除或下载所有选定项目。

## OnlyOffice 集成

如果管理员已配置 **OnlyOffice** 插件，您可以直接在浏览器中编辑 Word、Excel 和 PowerPoint（或 LibreOffice）文件，无需下载。查看受支持的文件时，请查找 **使用 OnlyOffice 编辑** <img src="../../.gitbook/assets/icons/mdi-file-document-edit-outline.svg" alt="OnlyOffice" data-size="line"> 选项。

文档存储在 Chamilo 中，OnlyOffice 仅用于在浏览器中**查看**或编辑文档，无需任何额外工具。

## 云文件

如果您使用云存储（Azure Blob、AWS S3 或 Google Cloud）存放文件，这些文件会存储在云端，但您可以从此处链接它们。对您和学习者而言这是透明的——无论存储后端如何，文档工具的工作方式都相同。

## 提示

* **尽早整理** — 在上传内容之前先创建文件夹结构，以免日后重新整理。如果您已创建过结构合理的其他课程，之后可以将这些课程用作模板
* **使用描述性文件名** — 用清晰、有意义的名称帮助学习者找到所需内容
* **隐藏进行中的工作** — 使用可见性开关隐藏仍在准备中的文档
* **从学习路径链接** — 在学习路径中引用文档，以创建引导式学习序列
* **检查磁盘配额** — 如果课程有存储限制，请删除过时文件以释放空间