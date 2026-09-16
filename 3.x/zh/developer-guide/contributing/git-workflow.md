# Git 工作流

## 代码仓库

Chamilo 源代码托管于 GitHub：[github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## 分支策略

* **`master`** — 主开发分支
* 功能分支从 `master` 创建，用于新功能开发
* 发布分支用于稳定版本发布

## 提交变更

1. 在 GitHub 上 **Fork** 仓库
2. 将你的 fork **Clone** 到本地
3. 为本次变更 **创建分支**：`git checkout -b feature/my-feature`
4. 遵循编码规范 **进行修改**
5. 使用清晰、描述性的提交说明进行 **Commit**
6. **Push** 到你的 fork：`git push origin feature/my-feature`
7. 针对 `master` 分支 **创建 pull request**

## 提交说明

撰写清晰的提交说明，说明 **做了什么** 以及 **为什么**：

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### 工具前缀约定

主题行以本次变更所涉及的 **工具或模块** 为前缀，后接冒号。我们使用一套简短、统一的术语，以便按工具浏览 changelog 和 `git log --oneline`。前缀始终使用该工具规范名称的 **单数** 形式。

格式：`<Prefix>: <Imperative summary in the present tense>`

示例：

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

若一次变更涉及多个工具，选择受影响最大的那个；真正横切、仅触及代码结构（不涉及面向最终用户的工具）的变更归入 `Internal`。仅文档类变更（本站点、changelog、纯作参考的行内 docblock）归入 `Documentation`。

#### 允许的前缀

| 前缀                 | 范围 / 说明                                                                          |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 不是 “Agenda”                                                                        |
| `Career`             |                                                                                      |
| `Catalogue`          | 课程与学期目录，包括首页上的“热门课程”                                               |
| `Chat`               |                                                                                      |
| `CI`                 | 持续集成、自动化测试等                                                               |
| `Course description` |                                                                                      |
| `Course Progress`    | 不是 “Thematic advance”                                                              |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | 专指与 Chamilo 或代码文档、changelog 等相关的内容                                    |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 不是 “Quiz”                                                                          |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 包括证书                                                                             |
| `Group`              | 包括课程小组、全局小组以及班级                                                       |
| `Help`               |                                                                                      |
| `Hook`               | 用于内部 hook 机制                                                                   |
| `Install`            | 包括升级相关内容                                                                     |
| `Internal`           | 主要用于影响代码本身或性质上非常全局的变更与修复                                     |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | 用于 LP / 学习路径                                                                   |
| `Maintenance`        | 课程维护工具：课程复制、备份、还原等                                                 |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | 用于位于 `tests/scripts/` 中的内容                                                   |
| `Search`             | 全文搜索                                                                             |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | 社交网络                                                                             |
| `SSO`                | 单点登录方法                                                                         |
| `Survey`             |                                                                                      |
| `System`             | 主要与托管及服务器级微调相关的事项                                                   |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## 代码审查

拉取请求由维护者团队进行审查。请做好以下准备：

* 回应反馈并进行修改
* 使你的分支与 `master` 保持同步
* 确保测试通过

## 报告问题

请在 GitHub 问题跟踪器上报告缺陷和功能请求。