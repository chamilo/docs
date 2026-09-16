# Git ワークフロー

## リポジトリ

Chamilo のソースコードは GitHub でホストされています: [github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## ブランチ戦略

* **`master`** — メインの開発ブランチ
* 新機能の開発は `master` からフィーチャーブランチを作成して行う
* 安定版リリース用にリリースブランチを作成する

## 変更の貢献

1. GitHub 上でリポジトリを **フォーク** する
2. フォークをローカルに **クローン** する
3. 変更用の **ブランチを作成** する: `git checkout -b feature/my-feature`
4. コーディング規約に従って **変更を加える**
5. 明確で説明的なコミットメッセージで **コミット** する
6. フォークへ **プッシュ** する: `git push origin feature/my-feature`
7. `master` ブランチに対して **プルリクエストを作成** する

## コミットメッセージ

**何を** 変更したか、**なぜ** 変更したかを説明する、明確なコミットメッセージを書いてください:

```
Glossary: Add AI-assisted term generation

Teachers can now generate glossary terms using configured AI
providers. Supports configurable prompt and term count.
```

### ツール接頭辞の規約

件名行は、変更が対象とする **ツールまたは領域** を接頭辞とし、その後にコロンを付けます。changelog と `git log --oneline` をツール単位でざっと確認できるよう、短い共通用語を用います。接頭辞は常に、そのツールの正式名称の **単数形** です。

形式: `<Prefix>: <現在形の命令形による要約>`

例:

```
Document: Fix list for student view
Exercise: Prevent duplicate question titles within a quiz
Learnpath: Allow reordering chapters via drag and drop
Internal: Refactor ResourceNode hydration in the API normalizer
CI: Cache Composer downloads in the GitHub Actions workflow
```

複数のツールにまたがる変更の場合は、最も影響の大きいものを選びます。エンドユーザー向けツールには触れず、コード構造のみを対象とする真に横断的な変更は `Internal` とします。ドキュメントのみの変更（本サイト、changelog、参照専用のインライン docblock）は `Documentation` とします。

#### 許可されるプレフィックス

| Prefix               | Scope / notes                                                                        |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 「Agenda」ではない                                                                         |
| `Career`             |                                                                                      |
| `Catalogue`          | コースおよびセッションのカタログ。ホームページ上の「hot courses」を含む              |
| `Chat`               |                                                                                      |
| `CI`                 | 継続的インテグレーション、自動テストなど                                        |
| `Course description` |                                                                                      |
| `Course Progress`    | 「Thematic advance」ではない                                                               |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Chamilo またはコード、changelog などの文書化に専ら関係するもの |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 「Quiz」ではない                                                                           |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 証明書を含む                                                                |
| `Group`              | コースグループ、グローバルグループ、クラスを含む                                   |
| `Help`               |                                                                                      |
| `Hook`               | 内部フック機構向け                                                      |
| `Install`            | アップグレード関連を含む                                                               |
| `Internal`           | 主にコード自体に影響する変更・修正、または性質上きわめて全体的なもの    |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | LP / 学習パス向け                                                              |
| `Maintenance`        | コース保守ツール：コースのコピー、バックアップ、復元など                    |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | `tests/scripts/` に置かれるもの向け                                                   |
| `Search`             | 全文検索                                                                     |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | ソーシャルネットワーク                                                                       |
| `SSO`                | シングルサインオン方式                                                               |
| `Survey`             |                                                                                      |
| `System`             | 主にホスティングおよびサーバーレベルの微調整に関するもの           |
| `Template`           |                                                                                      |
| `Ticket`             |                                                                                      |
| `Tracking`           |                                                                                      |
| `User`               |                                                                                      |
| `Webservice`         |                                                                                      |
| `Wiki`               |                                                                                      |
| `Work`               |                                                                                      |
| `WYSIWYG`            |                                                                                      |
| `XAPI`               |                                                                                      |

## コードレビュー

プルリクエストはメンテナチームによってレビューされます。次の点に備えてください。

* フィードバックに対応し、修正を行う
* ブランチを `master` と同期した状態に保つ
* テストが通ることを確認する

## 問題の報告

バグや機能リクエストは、GitHub の issue トラッカーで報告してください。