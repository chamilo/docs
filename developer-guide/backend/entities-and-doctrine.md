# エンティティとDoctrine

Chamilo 2.0には、2つのバンドルにわたって314のDoctrineエンティティがあります。以下では主なもののみを紹介します。

## エンティティの構成

### CoreBundle エンティティ (213)

プラットフォームレベルのエンティティ：

| カテゴリ | 例 |
|----------|---------|
| **ユーザー** | `User`, `UserRelUser`, `AccessUrl`, `AccessUrlRelUser` |
| **コース** | `Course`, `CourseCategory`, `CourseRelUser` |
| **セッション** | `Session`, `SessionRelUser`, `SessionRelCourse`, `SessionRelCourseRelUser` |
| **リソース** | `ResourceNode`, `ResourceFile`, `ResourceLink`, `ResourceType` |
| **設定** | `SettingsCurrent`, `SettingsOptions` |
| **メッセージ** | `Message`, `MessageRelUser`, `MessageAttachment` |
| **トラッキング** | `TrackELogin`, `TrackEOnline`, `TrackEDefault` |
| **スキル** | `Skill`, `SkillRelUser`, `SkillRelProfile` |
| **AI** | `AiRequests` |
| **プラグイン** | `Plugin`, `AccessUrlRelPlugin` |
| **ソーシャル** | `Usergroup`, `UsergroupRelUser` |
| **xAPI** | `XApiObject`, `XApiResult`, `XApiActivityState` |

### CourseBundle エンティティ (101)

コースコンテンツエンティティ — すべて「C」で始まります：

| カテゴリ | 例 |
|----------|---------|
| **ドキュメント** | `CDocument` |
| **演習** | `CQuiz`, `CQuizQuestion`, `CQuizAnswer`, `CQuizQuestionCategory` |
| **学習パス** | `CLp`, `CLpItem`, `CLpView`, `CLpItemView`, `CLpCategory` |
| **フォーラム** | `CForum`, `CForumCategory`, `CForumThread`, `CForumPost` |
| **課題** | `CStudentPublication`, `CStudentPublicationAssignment`, `CStudentPublicationComment` |
| **アンケート** | `CSurvey`, `CSurveyQuestion`, `CSurveyAnswer`, `CSurveyInvitation` |
| **出席** | `CAttendance`, `CAttendanceCalendar`, `CAttendanceResult` |
| **ブログ** | `CBlog`, `CBlogPost`, `CBlogComment`, `CBlogTask` |
| **その他** | `CCalendarEvent`, `CGlossary`, `CLink`, `CLinkCategory`, `CNotebook`, `CWiki` |

## 命名規則

* CoreBundle エンティティ：標準的なPascalCase（例：`User`, `Course`, `Session`）
* CourseBundle エンティティ：`C`で始まる（例：`CDocument`, `CQuiz`, `CLp`）

このプレフィックスは、コース範囲のコンテンツエンティティをプラットフォームレベルのエンティティと区別するために使用されます（従来のデータベーステーブルの命名に準拠）。この区別は、将来的に多くのツールが特定のコースに強く結びつかないグローバルツールに変換されるにつれて、なくなる可能性があります。

## 主要な関係性

関係性は通常、`Rel`セパレーターによって示されます。

### ユーザー ↔ コース

```
User --[CourseRelUser]--> Course
```

`CourseRelUser`には登録ステータスが保存されます（TEACHER = 1, STUDENT = 5）。

### ユーザー ↔ セッション ↔ コース

```
User --[SessionRelUser]--> Session --[SessionRelCourse]--> Course
User --[SessionRelCourseRelUser]--> (Session + Course)
```

### ResourceNode (コンテンツ抽象化)

すべてのコースコンテンツエンティティは、`ResourceNode`を通じてリソースシステムに接続されています：

```
CDocument --> ResourceNode --> ResourceFile
CQuiz ------> ResourceNode
CLp --------> ResourceNode
```

詳細については、[リソースシステム](resource-system.md)を参照してください。

## Doctrine拡張機能

ChamiloはGedmo Doctrine Extensions（`stof/doctrine-extensions-bundle`経由）を使用しています：

* **Tree** — 階層データ（ResourceNodeはマテリアライズドパスを使用）
* **Timestampable** — 自動的な`createdAt`/`updatedAt`フィールド
* **Sluggable** — URLフレンドリーなスラッグ
* **Sortable** — 順序付け可能なコレクション