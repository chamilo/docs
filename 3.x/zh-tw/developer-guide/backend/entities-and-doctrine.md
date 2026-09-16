# 實體與 Doctrine

Chamilo 3.0 在兩個 bundle 中共有 314 個 Doctrine 實體。以下僅列出主要實體。

## 實體組織

### CoreBundle 實體（213）

平台層級實體：

| 類別 | 範例 |
|----------|---------|
| **使用者** | `User`、`UserRelUser`、`AccessUrl`、`AccessUrlRelUser` |
| **課程** | `Course`、`CourseCategory`、`CourseRelUser` |
| **學期** | `Session`、`SessionRelUser`、`SessionRelCourse`、`SessionRelCourseRelUser` |
| **資源** | `ResourceNode`、`ResourceFile`、`ResourceLink`、`ResourceType` |
| **設定** | `SettingsCurrent`、`SettingsOptions` |
| **訊息** | `Message`、`MessageRelUser`、`MessageAttachment` |
| **追蹤** | `TrackELogin`、`TrackEOnline`、`TrackEDefault` |
| **技能** | `Skill`、`SkillRelUser`、`SkillRelProfile` |
| **AI** | `AiRequests` |
| **外掛** | `Plugin`、`AccessUrlRelPlugin` |
| **社群** | `Usergroup`、`UsergroupRelUser` |
| **xAPI** | `XApiObject`、`XApiResult`、`XApiActivityState` |

### CourseBundle 實體（101）

課程內容實體——皆以 `C` 為前綴：

| 類別 | 範例 |
|----------|---------|
| **文件** | `CDocument` |
| **測驗** | `CQuiz`、`CQuizQuestion`、`CQuizAnswer`、`CQuizQuestionCategory` |
| **學習路徑** | `CLp`、`CLpItem`、`CLpView`、`CLpItemView`、`CLpCategory` |
| **論壇** | `CForum`、`CForumCategory`、`CForumThread`、`CForumPost` |
| **作業** | `CStudentPublication`、`CStudentPublicationAssignment`、`CStudentPublicationComment` |
| **問卷** | `CSurvey`、`CSurveyQuestion`、`CSurveyAnswer`、`CSurveyInvitation` |
| **出席** | `CAttendance`、`CAttendanceCalendar`、`CAttendanceResult` |
| **部落格** | `CBlog`、`CBlogPost`、`CBlogComment`、`CBlogTask` |
| **其他** | `CCalendarEvent`、`CGlossary`、`CLink`、`CLinkCategory`、`CNotebook`、`CWiki` |

## 命名慣例

* CoreBundle 實體：標準 PascalCase（例如 `User`、`Course`、`Session`）
* CourseBundle 實體：以 `C` 為前綴（例如 `CDocument`、`CQuiz`、`CLp`）

此前綴用以區分課程範圍的內容實體與平台層級實體（與舊版資料庫資料表命名一致）。長期而言，隨著更多工具轉為與特定課程無強連結的全域工具，此區分可能會消失。

## 主要關聯

關聯通常以 `Rel` 分隔符表示。

### 使用者 ↔ 課程

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` 儲存註冊狀態（TEACHER = 1、STUDENT = 5）。

### 使用者 ↔ 學期 ↔ 課程

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode（內容抽象）

所有課程內容實體皆透過 `ResourceNode` 連接至資源系統：

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

詳見 [資源系統](resource-system.md)。

## Doctrine 擴充

Chamilo 使用 Gedmo Doctrine Extensions（透過 `stof/doctrine-extensions-bundle`）：

* **Tree** — 階層式資料（ResourceNode 使用 materialized path）
* **Timestampable** — 自動 `createdAt`／`updatedAt` 欄位
* **Sluggable** — 適合 URL 的 slug
* **Sortable** — 可排序的集合