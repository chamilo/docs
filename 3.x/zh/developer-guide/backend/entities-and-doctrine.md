# 实体与 Doctrine

Chamilo 3.0 在两个 Bundle 中共有 314 个 Doctrine 实体。下文仅介绍其中主要实体。

## 实体组织

### CoreBundle 实体（213）

平台级实体：

| 类别 | 示例 |
|----------|---------|
| **用户** | `User`、`UserRelUser`、`AccessUrl`、`AccessUrlRelUser` |
| **课程** | `Course`、`CourseCategory`、`CourseRelUser` |
| **学期** | `Session`、`SessionRelUser`、`SessionRelCourse`、`SessionRelCourseRelUser` |
| **资源** | `ResourceNode`、`ResourceFile`、`ResourceLink`、`ResourceType` |
| **设置** | `SettingsCurrent`、`SettingsOptions` |
| **消息** | `Message`、`MessageRelUser`、`MessageAttachment` |
| **跟踪** | `TrackELogin`、`TrackEOnline`、`TrackEDefault` |
| **技能** | `Skill`、`SkillRelUser`、`SkillRelProfile` |
| **AI** | `AiRequests` |
| **插件** | `Plugin`、`AccessUrlRelPlugin` |
| **社交** | `Usergroup`、`UsergroupRelUser` |
| **xAPI** | `XApiObject`、`XApiResult`、`XApiActivityState` |

### CourseBundle 实体（101）

课程内容实体——均以 `C` 为前缀：

| 类别 | 示例 |
|----------|---------|
| **文档** | `CDocument` |
| **练习** | `CQuiz`、`CQuizQuestion`、`CQuizAnswer`、`CQuizQuestionCategory` |
| **学习路径** | `CLp`、`CLpItem`、`CLpView`、`CLpItemView`、`CLpCategory` |
| **论坛** | `CForum`、`CForumCategory`、`CForumThread`、`CForumPost` |
| **作业** | `CStudentPublication`、`CStudentPublicationAssignment`、`CStudentPublicationComment` |
| **调查** | `CSurvey`、`CSurveyQuestion`、`CSurveyAnswer`、`CSurveyInvitation` |
| **考勤** | `CAttendance`、`CAttendanceCalendar`、`CAttendanceResult` |
| **博客** | `CBlog`、`CBlogPost`、`CBlogComment`、`CBlogTask` |
| **其他** | `CCalendarEvent`、`CGlossary`、`CLink`、`CLinkCategory`、`CNotebook`、`CWiki` |

## 命名约定

* CoreBundle 实体：标准 PascalCase（例如 `User`、`Course`、`Session`）
* CourseBundle 实体：以 `C` 为前缀（例如 `CDocument`、`CQuiz`、`CLp`）

此前缀用于区分课程范围内的内容实体与平台级实体（与遗留数据库表命名一致）。从长远看，随着更多工具被转换为与特定课程无强绑定的全局工具，这一区分可能会消失。

## 关键关系

关系通常通过 `Rel` 分隔符体现。

### 用户 ↔ 课程

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` 存储选课状态（TEACHER = 1，STUDENT = 5）。

### 用户 ↔ 学期 ↔ 课程

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode（内容抽象）

所有课程内容实体均通过 `ResourceNode` 连接到资源系统：

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

详情参见 [资源系统](resource-system.md)。

## Doctrine 扩展

Chamilo 使用 Gedmo Doctrine Extensions（通过 `stof/doctrine-extensions-bundle`）：

* **Tree** — 层级数据（ResourceNode 使用物化路径）
* **Timestampable** — 自动 `createdAt`/`updatedAt` 字段
* **Sluggable** — 对 URL 友好的 slug
* **Sortable** — 可排序集合