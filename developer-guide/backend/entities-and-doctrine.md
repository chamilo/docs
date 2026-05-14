# 實體與 Doctrine

Chamilo 2.0 擁有橫跨兩個 bundle 的 314 個 Doctrine 實體。以下僅提及主要實體。

## 實體組織

### CoreBundle 實體 (213)

平台層級實體：

| 分類 | 範例 |
|----------|---------|
| **Users** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **Courses** | `Course`, `CourseCategory`, `CourseRelUser` |
| **Sessions** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **Resources** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **Settings** | `SettingsCurrent`, `SettingsOptions` |
| **Messages** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **Tracking** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **Skills** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **Plugins** | `Plugin`, `AccessUrlRelPlugin` |
| **Social** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle 實體 (101)

課程內容實體 — 皆以 `C` 開頭：

| 分類 | 範例 |
|----------|---------|
| **Documents** | `CDocument` |
| **Exercises** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **Learning paths** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **Forums** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **Assignments** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **Surveys** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **Attendance** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **Blogs** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **Other** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## 命名慣例

* CoreBundle 實體：標準 PascalCase（例如 `User`、`Course`、`Session`）
* CourseBundle 實體：以 `C` 開頭（例如 `CDocument`、`CQuiz`、`CLp`）

此前綴用以區分課程範圍內容實體與平台層級實體（符合舊有資料庫表格命名方式）。隨著更多工具轉換為無特定課程強連結的全球工具，此區分可能在未來消失。

## 主要關聯關係

關聯關係通常以 `Rel` 分隔符顯示。

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` 儲存註冊狀態（TEACHER = 1, STUDENT = 5）。

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (內容抽象)

所有課程內容實體透過 `ResourceNode` 連接到資源系統：

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

詳見 [資源系統](resource-system.md)。

## Doctrine 擴充套件

Chamilo 使用 Gedmo Doctrine Extensions（透過 `stof/doctrine-extensions-bundle`）：

* **Tree** — 階層式資料（ResourceNode 使用實體化路徑）
* **Timestampable** — 自動 `createdAt`/`updatedAt` 欄位
* **Sluggable** — URL 友善的 slug
* **Sortable** — 可排序集合