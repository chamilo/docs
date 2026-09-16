# エンドポイントリファレンス

API Platform は、`#[ApiResource]` でアノテーションされたエンティティに対して REST エンドポイントを自動生成します。Chamilo は 100 以上のリソースを公開しています。

## 標準操作

各 API リソースでは、通常次の操作が利用できます。

| Method | Path | Description |
|--------|------|-------------|
| `GET` | `/api/{resources}` | 一覧（コレクション） |
| `POST` | `/api/{resources}` | 作成 |
| `GET` | `/api/{resources}/{id}` | 読み取り（単一アイテム） |
| `PUT` | `/api/{resources}/{id}` | 全体更新 |
| `PATCH` | `/api/{resources}/{id}` | 部分更新 |
| `DELETE` | `/api/{resources}/{id}` | 削除 |

すべての操作がすべてのリソースで有効になっているわけではありません。セキュリティ上の制約が適用されます。

## 主要な API リソース

### プラットフォームリソース

| Resource | Path | Description |
|----------|------|-------------|
| Users | `/api/users` | ユーザーアカウント |
| Courses | `/api/courses` | コース |
| Sessions | `/api/sessions` | トレーニングセッション |
| Resource Nodes | `/api/resource_nodes` | 統合コンテンツノード |
| Access URLs | `/api/access_urls` | マルチ URL ポータル |
| Messages | `/api/messages` | プラットフォームメッセージ |

### コースコンテンツリソース

| Resource | Path | Description |
|----------|------|-------------|
| Documents | `/api/documents` | コースドキュメント |
| Learning Paths | `/api/learning_paths` | ラーニングパス |
| Glossaries | `/api/glossaries` | 用語集の用語 |
| Links | `/api/links` | 外部リンク |
| Calendar Events | `/api/c_calendar_events` | 予定イベント |
| Student Publications | `/api/c_student_publications` | 課題 |
| Blogs | `/api/c_blogs` | コースブログ |
| Groups | `/api/c_groups` | コースグループ |

### トラッキングリソース

| Resource | Path | Description |
|----------|------|-------------|
| Gradebook Categories | `/api/gradebook_categories` | 成績表の設定 |
| Gradebook Results | `/api/gradebook_results` | 成績 |

## フィルタリングとページネーション

API Platform は次をサポートします。

* **ページネーション**: `?page=2&itemsPerPage=30`
* **フィルタリング**: `?title=Introduction`（設定されたフィルターに依存）
* **並び替え**: `?order[title]=asc`
* **検索**: 設定されたフィールドに対する全文検索

## コンテンツネゴシエーション

API は複数のフォーマットをサポートします。

* `application/ld+json`（デフォルト — JSON-LD）
* `application/json`
* `text/html`（API ドキュメント）

応答フォーマットを選択するには `Accept` ヘッダーを設定します。

## セキュリティ

各エンドポイントは次によってセキュリティを強制します。

* JWT 認証（ほとんどのエンドポイントで必須）
* Symfony セキュリティボーター（リソースレベルの権限）
* ロールベースアクセス制御（例: 管理者専用エンドポイント）