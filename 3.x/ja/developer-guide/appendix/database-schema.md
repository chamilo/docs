# データベーススキーマ

Chamilo 3.0 は、多数の Doctrine エンティティをデータベーステーブルにマッピングします。正確な件数はリリース間で変動します。最新の状態は、以下に示すエンティティディレクトリを参照してください。

## エンティティの配置

| Bundle | Where | Prefix |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | なし（例: `user`、`course`、`session`） |
| CourseBundle | `src/CourseBundle/Entity/` | `c_`（例: `c_document`、`c_quiz`、`c_lp`） |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## 主要なテーブル

### ユーザーと認証

| Table | Purpose |
|-------|---------|
| `user` | ユーザーアカウント |
| `access_url` | マルチ URL ポータル |
| `access_url_rel_user` | ユーザーとポータルの割り当て |
| `usergroup` | プラットフォーム全体のユーザーグループ |

### コース

| Table | Purpose |
|-------|---------|
| `course` | コース |
| `course_category` | コースカテゴリ |
| `course_rel_user` | コースへの登録 |

### セッション

| Table | Purpose |
|-------|---------|
| `session` | トレーニングセッション |
| `session_rel_user` | セッションへの登録 |
| `session_rel_course` | セッション内のコース |
| `session_rel_course_rel_user` | セッション・コースごとのユーザー登録 |

### リソースシステム

| Table | Purpose |
|-------|---------|
| `resource_node` | 統合コンテンツ抽象化 |
| `resource_file` | ファイル添付 |
| `resource_link` | コンテキストごとの可視性／アクセス |
| `resource_type` | リソースタイプのレジストリ |

### コースコンテンツ（c_ プレフィックス）

| Table | Purpose |
|-------|---------|
| `c_document` | ドキュメント |
| `c_quiz` | 演習／テスト |
| `c_quiz_question` | クイズの設問 |
| `c_quiz_answer` | 設問の解答 |
| `c_lp` | 学習パス |
| `c_lp_item` | 学習パスの項目 |
| `c_forum_category` | フォーラムカテゴリ |
| `c_forum_forum` | フォーラム |
| `c_forum_thread` | フォーラムスレッド |
| `c_forum_post` | フォーラム投稿 |
| `c_student_publication` | 課題／提出物 |
| `c_survey` | アンケート |
| `c_glossary` | 用語集の用語 |
| `c_calendar_event` | カレンダーイベント |
| `c_attendance` | 出席表 |

### トラッキング

| Table | Purpose |
|-------|---------|
| `track_e_login` | ログインの追跡 |
| `track_e_online` | オンラインユーザーの追跡 |
| `track_e_default` | 汎用アクティビティの追跡 |
| `gradebook_category` | 成績表カテゴリ |
| `gradebook_result` | 成績 |

### 設定

| Table | Purpose |
|-------|---------|
| `settings` | プラットフォーム設定 |
| `settings_options` | 設定オプションの定義 |

## マイグレーション

データベーススキーマの変更は、`src/CoreBundle/Migrations/` 内の Doctrine Migrations で管理します。マイグレーションの実行は次のとおりです。

```bash
php bin/console doctrine:migrations:migrate
```