# データベーススキーマ

Chamilo 2.0 は、多数の Doctrine エンティティをデータベーステーブルにマッピングしています。正確な数はリリースごとに変動します。現在の状態については、以下にリストされているエンティティディレクトリを参照してください。

## エンティティの場所

| バンドル | 場所 | プレフィックス |
|--------|-------|--------|
| CoreBundle | `src/CoreBundle/Entity/` | なし（例：`user`, `course`, `session`） |
| CourseBundle | `src/CourseBundle/Entity/` | `c_` （例：`c_document`, `c_quiz`, `c_lp`） |
| LtiBundle | `src/LtiBundle/Entity/` | `lti_` |

## 主要なテーブル

### ユーザーと認証

| テーブル | 目的 |
|-------|---------|
| `user` | ユーザーアカウント |
| `access_url` | マルチURLポータル |
| `access_url_rel_user` | ユーザーとポータルの割り当て |
| `usergroup` | プラットフォーム全体のユーザーグループ |

### コース

| テーブル | 目的 |
|-------|---------|
| `course` | コース |
| `course_category` | コースカテゴリ |
| `course_rel_user` | コースへの登録 |

### セッション

| テーブル | 目的 |
|-------|---------|
| `session` | トレーニングセッション |
| `session_rel_user` | セッションへの登録 |
| `session_rel_course` | セッション内のコース |
| `session_rel_course_rel_user` | セッションごとのコースへのユーザー登録 |

### リソースシステム

| テーブル | 目的 |
|-------|---------|
| `resource_node` | 統一されたコンテンツ抽象化 |
| `resource_file` | ファイル添付 |
| `resource_link` | コンテキストごとの表示/アクセス |
| `resource_type` | リソースタイプのレジストリ |

### コースコンテンツ（c_ プレフィックス）

| テーブル | 目的 |
|-------|---------|
| `c_document` | ドキュメント |
| `c_quiz` | 演習/テスト |
| `c_quiz_question` | クイズの質問 |
| `c_quiz_answer` | 質問の回答 |
| `c_lp` | 学習パス |
| `c_lp_item` | 学習パスアイテム |
| `c_forum_category` | フォーラムカテゴリ |
| `c_forum_forum` | フォーラム |
| `c_forum_thread` | フォーラムスレッド |
| `c_forum_post` | フォーラム投稿 |
| `c_student_publication` | 課題/提出物 |
| `c_survey` | アンケート |
| `c_glossary` | 用語集 |
| `c_calendar_event` | カレンダーイベント |
| `c_attendance` | 出欠シート |

### 追跡

| テーブル | 目的 |
|-------|---------|
| `track_e_login` | ログイント追跡 |
| `track_e_online` | オンラインユーザー追跡 |
| `track_e_default` | 一般的な活動追跡 |
| `gradebook_category` | 成績簿カテゴリ |
| `gradebook_result` | 成績 |

### 設定

| テーブル | 目的 |
|-------|---------|
| `settings` | プラットフォーム設定 |
| `settings_options` | 設定オプションの定義 |

## マイグレーション

データベーススキーマの変更は、`src/CoreBundle/Migrations/` 内の Doctrine Migrations を通じて管理されています。マイグレーションを実行するには以下を使用してください：

```bash
php bin/console doctrine:migrations:migrate
```