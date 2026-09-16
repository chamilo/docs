# Git ワークフロー

## リポジトリ

Chamilo のソースコードは GitHub でホスティングされています：[github.com/chamilo/chamilo-lms](https://github.com/chamilo/chamilo-lms)

## ブランチング

* **`master`** — 主要な開発ブランチ
* 機能ブランチは新しい開発のために `master` から作成されます
* リリースブランチは安定版リリースのために作成されます

## 変更の貢献

1. GitHub 上でリポジトリを**フォーク**する
2. フォークをローカルに**クローン**する
3. 変更用の**ブランチを作成**する：`git checkout -b feature/my-feature`
4. コーディング規約に従って**変更を加える**
5. 明確で説明的なコミットメッセージとともに**コミット**する
6. フォークに**プッシュ**する：`git push origin feature/my-feature`
7. `master` ブランチに対して**プルリクエストを作成**する

## コミットメッセージ

**何を**、**なぜ**行ったのかを説明する明確なコミットメッセージを書いてください：

```
Glossary: AI支援による用語生成の追加

教師は設定されたAIプロバイダーを使用して用語集の用語を生成できるようになりました。
設定可能なプロンプトと用語数をサポートしています。
```

### ツールプレフィックス規約

件名行には、変更が影響する**ツールまたは領域**をプレフィックスとして付け、その後にコロンを続けます。ツールごとに変更ログや `git log --oneline` をざっと見ることができるように、短い共通の用語を使用します。プレフィックスは常にツールの正規名の**単数形**を使用します。

形式：`<Prefix>: <現在形で命令形の要約>`

例：

```
Document: 学生ビューでのリストの修正
Exercise: クイズ内での質問タイトルの重複を防止
Learnpath: ドラッグアンドドロップによる章の並べ替えを許可
Internal: API ノーマライザーでの ResourceNode ハイドレーションのリファクタリング
CI: GitHub Actions ワークフローでの Composer ダウンロードのキャッシュ
```

変更が複数のツールにまたがる場合は、最も影響を受けるものを選択してください。コード構造のみに影響し、エンドユーザーツールに影響しない真に横断的な変更は `Internal` に分類されます。ドキュメントのみの変更（このサイト、変更ログ、純粋に参照用のインラインドキュメントブロック）は `Documentation` に分類されます。

#### 許可されるプレフィックス

| プレフィックス        | 範囲 / 備考                                                                          |
|----------------------|--------------------------------------------------------------------------------------|
| `Admin`              |                                                                                      |
| `Announcement`       |                                                                                      |
| `Attendance`         |                                                                                      |
| `Authentication`     |                                                                                      |
| `Blog`               |                                                                                      |
| `Calendar`           | 「Agenda」ではなく「Calendar」                                                       |
| `Career`             |                                                                                      |
| `Catalogue`          | コースおよびセッションのカタログ、ホームページの「注目のコース」を含む                |
| `Chat`               |                                                                                      |
| `CI`                 | 継続的インテグレーション、自動テストなど                                             |
| `Course description` |                                                                                      |
| `Course Progress`    | 「Thematic advance」ではなく「Course Progress」                                      |
| `Course settings`    |                                                                                      |
| `Cron`               |                                                                                      |
| `Dashboard`          |                                                                                      |
| `Display`            |                                                                                      |
| `Document`           |                                                                                      |
| `Documentation`      | Chamiloやコードのドキュメント、変更ログなど、ドキュメント関連に限定されるもの         |
| `Dropbox`            |                                                                                      |
| `Exercise`           | 「Quiz」ではなく「Exercise」                                                         |
| `Extra Fields`       |                                                                                      |
| `Forum`              |                                                                                      |
| `Glossary`           |                                                                                      |
| `Gradebook`          | 証明書を含む                                                                         |
| `Group`              | コースグループ、グローバルグループ、クラスを含む                                     |
| `Help`               |                                                                                      |
| `Hook`               | 内部フックメカニズム用                                                               |
| `Install`            | アップグレード関連を含む                                                             |
| `Internal`           | コード自体や非常に広範な性質の変更および修正に主に関連するもの                       |
| `Language`           |                                                                                      |
| `Link`               |                                                                                      |
| `Learnpath`          | LP / 学習パス用                                                                      |
| `Maintenance`        | コースメンテナンスツール：コースのコピー、バックアップ、復元など                     |
| `Message`            |                                                                                      |
| `Notebook`           |                                                                                      |
| `Optimization`       |                                                                                      |
| `Portfolio`          |                                                                                      |
| `Privacy`            |                                                                                      |
| `Script`             | `tests/scripts/` にあるもの用                                                        |
| `Search`             | 全文検索                                                                             |
| `Security`           |                                                                                      |
| `Session`            |                                                                                      |
| `Skill`              |                                                                                      |
| `Social`             | ソーシャルネットワーク                                                               |
| `SSO`                | シングルサインオン方式                                                               |
| `Survey`             |                                                                                      |
| `System`             | ホスティングやサーバーレベルでの微調整に主に関連するもの                             |
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

プルリクエストはメンテナーチームによってレビューされます。以下の点に備えてください：

- フィードバックに対応し、修正を行う
- ブランチを`master`と最新の状態に保つ
- テストが通過することを確認する

## 問題の報告

バグや機能リクエストはGitHubのイシュートラッカーで報告してください。