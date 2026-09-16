# エンティティと Doctrine

Chamilo 3.0 には、2 つのバンドルにまたがる 314 の Doctrine エンティティがあります。以下では主なもののみを取り上げます。

## エンティティの構成

### CoreBundle のエンティティ（213）

プラットフォームレベルのエンティティ:

| カテゴリ | 例 |
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

### CourseBundle のエンティティ（101）

コースコンテンツのエンティティ — すべて `C` で始まります:

| カテゴリ | 例 |
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

## 命名規則

* CoreBundle のエンティティ: 標準の PascalCase（例: `User`, `Course`, `Session`）
* CourseBundle のエンティティ: `C` プレフィックス付き（例: `CDocument`, `CQuiz`, `CLp`）

このプレフィックスは、コーススコープのコンテンツエンティティとプラットフォームレベルのエンティティを区別します（レガシーなデータベーステーブル命名に沿っています）。より多くのツールが特定のコースとの強い結びつきを持たないグローバルツールへ移行するにつれ、この区別は長期的にはなくなる可能性があります。

## 主要なリレーションシップ

リレーションシップは通常、`Rel` セパレータによって示されます。

### User ↔ Course

```
User --[CourseRelUser]--> Course
```

`CourseRelUser` は登録ステータスを格納します（TEACHER = 1、STUDENT = 5）。

### User ↔ Session ↔ Course

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode（コンテンツの抽象化）

すべてのコースコンテンツエンティティは、`ResourceNode` を通じてリソースシステムに接続します:

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

詳細は [リソースシステム](resource-system.md) を参照してください。

## Doctrine 拡張

Chamilo は Gedmo Doctrine Extensions（`stof/doctrine-extensions-bundle` 経由）を使用します:

* **Tree** — 階層データ（ResourceNode は materialized path を使用）
* **Timestampable** — 自動的な `createdAt`/`updatedAt` フィールド
* **Sluggable** — URL 向けスラッグ
* **Sortable** — 並べ替え可能なコレクション