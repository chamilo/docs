# リソースシステム

リソースシステムは、Chamilo 2.0 における最も重要なアーキテクチャ概念の一つです。コースコンテンツ（ドキュメント、演習、学習パス、フォーラム投稿など）を統一的に抽象化する仕組みを提供します。

## コアコンセプト

コースコンテンツの各要素は **ResourceNode** によって表現されます。これにより、すべてのコンテンツタイプに共通の機能が提供されます：

- **表示制御** — 学習者に対する表示/非表示の設定
- **アクセス制御** — ResourceNode を通じてセキュリティ投票者が権限を確認
- **ファイルストレージ** — 添付ファイルは ResourceFile を介して保存
- **ツリー構造** — ResourceNode はツリー（親子関係）を形成
- **監査証跡** — 作成者、作成日、変更履歴の追跡

## 主要エンティティ

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

中心的なエンティティです。すべてのコンテンツエンティティは ResourceNode と一対一の関係を持ちます。

主要フィールド：

| フィールド | タイプ | 説明 |
|-------|------|-------------|
| `id` | integer | 主キー |
| `uuid` | UUID v4 | API 使用のためのユニーク識別子 |
| `title` | string | 表示タイトル |
| `creator` | User | このリソースを作成したユーザー |
| `resourceFile` | ResourceFile | 添付ファイル（存在する場合） |
| `resourceType` | ResourceType | リソースの種類（ドキュメント、クイズなど） |
| `parent` | ResourceNode | リソースツリー内の親 |
| `children` | Collection | 子 ResourceNode |
| `resourceLinks` | Collection | 表示およびアクセスリンク |

ツリーは Gedmo の **materialized path** 戦略を使用して、効率的な階層クエリを実現しています。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

リソースの実際のファイルデータを保存します：

| フィールド | タイプ | 説明 |
|-------|------|-------------|
| `id` | integer | 主キー |
| `title` | string | 元のファイル名 |
| `mimeType` | string | MIME タイプ |
| `originalName` | string | アップロード時の元の名前 |
| `size` | integer | ファイルサイズ（バイト単位） |
| `crop` | string | クロップデータ（画像用） |

ファイルストレージは Flysystem によって処理され、設定に応じてローカルディスク、S3、Azure、または GCS に保存されます。

### ResourceLink

コンテキストごとの表示とアクセスを制御します。主なコンテキストタイプは以下の 3 つです：

1. コース
2. セッション
3. グループ（コース内）

ResourceLink エンティティは、これら 3 つのコンテキストタイプの組み合わせを反映し、その完全なコンテキストに対して表示設定を確立します：

| フィールド | タイプ | 説明 |
|-------|------|-------------|
| `course` | Course | リソースが属するコース |
| `session` | Session | どのセッションか（ベースコースの場合は null） |
| `group` | CGroup | どのグループか（コース全体の場合は null） |
| `visibility` | integer | 表示、非表示、または削除済み |

これにより、同じ ResourceNode が異なるコンテキストで異なる表示設定を持つことができます（例：あるセッションでは表示されるが別のセッションでは非表示）。

これは、インターフェースを使用し、たとえばリソースがセッション固有のリソースであると決定した場合に自動的に設定されます。この場合、指定されたコース内の指定されたセッションのすべてのグループに対して表示されますが、ベースコースや別のセッションでは非表示になります。

デフォルトでは、ベースコースで表示可能なリソースは、そのコースのすべてのセッションでも表示されますが、コースのチューターは特定のセッションでリソースを非表示にすることを決定できます。この場合、このセッションでのこのリソースの特定の表示設定を取得し、表示設定が 0 であることを確認することで、このセッションの学習者にはアイテムが表示されないようにします。一方、他のセッションでセッション固有の表示設定がない場合、リソースはベースコースの表示設定を使用し、学習者に表示されます。

## API Platform 統合

ResourceNode はセキュリティ付きの API Platform リソースとして公開されています：

```php
#[ApiResource(
    operations: [
        new Get(security: "is_granted('VIEW', object)"),
        new Put(security: "is_granted('EDIT', object)"),
        new Delete(security: "is_granted('DELETE', object)"),
        new GetCollection(security: "is_granted('ROLE_USER')"),
    ]
)]
```

## コンテンツエンティティの接続方法

コースコンテンツエンティティ（CDocument、CQuiz、CLp など）は `AbstractResource` を拡張するか、`ResourceInterface` を実装することで、`resourceNode` 関係を取得します：

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

CDocument を作成すると、ResourceNode が自動的に一緒に作成され、統一されたリソース管理が提供されます。

## 実用的な影響

コースコンテンツを扱う際の注意点：

1. **コンテンツの作成** — コンテンツエンティティとその ResourceNode の両方を作成
2. **権限の確認** — ResourceNode のセキュリティ投票者を使用
3. **ファイルの管理** — ResourceFile を通じてファイルを添付
4. **表示の制御** — ResourceLink を作成/変更
5. **ツリーの構築** — フォルダ構造（例：ドキュメントフォルダ）のために ResourceNode の親子関係を使用