# Git 工作流程

## 代码库

Chamilo 源代码托管在 GitHub 上：[github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## 分支管理

* **`master`** — 主要开发分支
* 功能分支从 `master` 创建，用于新功能的开发
* 发布分支为稳定版本创建

## 提交更改

1. 在 GitHub 上 **Fork** 代码库
2. 将你的 fork **克隆** 到本地
3. 为你的更改 **创建分支**：`git checkout -b feature/my-feature`
4. 按照编码规范 **进行更改**
5. 使用清晰、描述性的提交信息 **提交** 更改
6. **推送** 到你的 fork：`git push origin feature/my-feature`
7. 针对 `master` 分支 **创建拉取请求**

## 提交信息

编写清晰的提交信息，解释 **内容** 和 **原因**：

```
词汇表：添加 AI 辅助的术语生成

教师现在可以使用配置的 AI 提供商生成词汇表术语。支持可配置的提示和术语数量。
```

### 工具前缀约定

主题行以更改涉及的 **工具或区域** 作为前缀，后跟冒号。我们使用简短的共享术语，以便变更日志和 `git log --oneline` 能按工具快速浏览。前缀始终使用工具规范名称的 **单数** 形式。

格式：`<前缀>: <以现在时态的祈使句总结>`

示例：

```
Document: 修复学生视图中的列表
Exercise: 防止测验中出现重复的问题标题
Learnpath: 允许通过拖放重新排序章节
Internal: 重构 API 规范化器中的 ResourceNode 加载
CI: 在 GitHub Actions 工作流程中缓存 Composer 下载
```

如果更改涉及多个工具，选择受影响最大的工具；仅涉及代码结构（不影响最终用户工具）的真正跨领域更改归类为 `Internal`。仅涉及文档的更改（本网站、变更日志、仅作为参考的内联文档块）归类为 `Documentation`。

#### 允许的前缀

| 前缀                 | 范围/备注                                                                            |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 不是“Agenda”                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | 课程和会话目录，包括首页上的“热门课程”                                              |
| `Chat`               |                                                                                      |
| `CI`                 | 持续集成，自动化测试等                                                              |
| `Course description` |                                                                                      |
| `Course Progress`    | 不是“Thematic advance”                                                              |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | 任何与Chamilo或代码文档、变更日志等独家相关的文档内容                               |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 不是“Quiz”                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 包括证书                                                                             |
| `Group`              | 包括课程小组、全球小组和班级                                                        |
| `Help`               |                                                                                      |
| `Hook`               | 用于内部钩子机制                                                                     |
| `Install`            | 包括升级相关内容                                                                     |
| `Internal`           | 针对主要影响代码本身或具有非常全局性质的更改和修复                                   |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | 针对LP / 学习路径                                                                   |
| `Maintenance`        | 课程维护工具：课程复制、备份、恢复等                                                |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | 针对位于`tests/scripts/`中的内容                                                    |
| `Search`             | 全文搜索                                                                             |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | 社交网络                                                                             |
| `SSO`                | 单点登录方法                                                                         |
| `Survey`             |                                                                                      |
| `System`             | 主要与服务器级别的托管和微调相关的内容                                               |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

---
## 代码审查

拉取请求将由维护团队进行审查。请准备好：

* 回应反馈并进行修订
* 保持您的分支与 `master` 同步更新
* 确保测试通过

## 报告问题

在 GitHub 问题跟踪器上报告错误和功能请求。