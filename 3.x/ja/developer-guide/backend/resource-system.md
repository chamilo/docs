# リソースシステム

リソースシステムは、Chamilo 3.0 における最も重要なアーキテクチャ概念のひとつです。ドキュメント、演習、ラーニングパス、フォーラム投稿など、すべてのコースコンテンツに対する統一された抽象化を提供します。

## 中核となる概念

コースコンテンツのあらゆる要素は **ResourceNode** として表現されます。これにより、すべてのコンテンツタイプに共通の機能セットが与えられます。

* **可視性の制御** — 学習者に対して表示／非表示にする
* **アクセス制御** — セキュリティ投票者が ResourceNode 経由で権限を確認する
* **ファイルストレージ** — 添付ファイルは ResourceFile 経由で保存される
* **ツリー構造** — ResourceNode はツリー（親子関係）を形成する
* **監査証跡** — 作成者、作成日時、変更の追跡

## 主要なエンティティ

### ResourceNode (`src/CoreBundle/Entity/ResourceNode.php`)

中心となるエンティティです。すべてのコンテンツエンティティは ResourceNode と一対一の関係を持ちます。

主なフィールド:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主キー |
| `uuid` | UUID v4 | API 利用のための一意識別子 |
| `title` | string | 表示タイトル |
| `creator` | User | このリソースを作成したユーザー |
| `resourceFile` | ResourceFile | 添付ファイル（ある場合） |
| `resourceType` | ResourceType | リソースの種類（ドキュメント、クイズなど） |
| `parent` | ResourceNode | リソースツリー内の親 |
| `children` | Collection | 子 ResourceNode |
| `resourceLinks` | Collection | 可視性およびアクセスのリンク |

ツリーは、効率的な階層クエリのために Gedmo の **materialized path** 戦略を使用します。

### ResourceFile (`src/CoreBundle/Entity/ResourceFile.php`)

リソースの実際のファイルデータを保存します:

| Field | Type | Description |
|-------|------|-------------|
| `id` | integer | 主キー |
| `title` | string | 元のファイル名 |
| `mimeType` | string | MIME タイプ |
| `originalName` | string | 元のアップロード名 |
| `size` | integer | ファイルサイズ（バイト） |
| `crop` | string | クロップデータ（画像用） |

ファイルストレージは Flysystem によって処理されるため、設定に応じてファイルはローカルディスク、S3、Azure、または GCS 上に置くことができます。

### ResourceLink

コンテキストごとの可視性とアクセスを制御します。主なコンテキストタイプは 3 つあります:

1. Course
2. Session
3. Group（コース内）

したがって ResourceLink エンティティは、これら 3 つのコンテキストタイプの組み合わせを反映し、その完全なコンテキストに対する可視性を確立します:

| Field | Type | Description |
|-------|------|-------------|
| `course` | Course | リソースが属するコース |
| `session` | Session | どのセッションか（ベースコースの場合は null） |
| `group` | CGroup | どのグループか（コース全体の場合は null） |
| `visibility` | integer | 表示、非表示、または削除済み |

これにより、同じ ResourceNode が異なるコンテキストで異なる可視性を持つことができます（例: あるセッションでは表示、別のセッションでは非表示）。

これはインターフェースを使用し、例えばあるリソースをセッション固有のリソースとして、特定のコースの特定のセッション内のすべてのグループに対して表示し、ベースコースや別のセッションでは非表示にする、といった決定を行ったときに自動的に設定されます。

デフォルトでは、ベースコースで表示されているリソースは、そのコースのすべてのセッションでも表示されます。ただし、コースチューターは特定のセッションからリソースを非表示にすることができます。この場合、当該セッションにおけるこのリソースの固有の可視性を取得し、可視性が 0 であることを確認するため、このセッションの学習者には項目が表示されません。一方、他のセッションでセッション固有の可視性がない場合は、ベースコースの可視性が使用され、リソースは学習者に表示されます。

## API Platform との統合

ResourceNode はセキュリティ付きの API Platform リソースとして公開されます:

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

コースコンテンツエンティティ（CDocument、CQuiz、CLp など）は `AbstractResource` を拡張するか `ResourceInterface` を実装し、これにより `resourceNode` 関係が与えられます:

```php
// In CDocument entity:
#[ORM\OneToOne(targetEntity: ResourceNode::class)]
private ResourceNode $resourceNode;
```

CDocument を作成すると、ResourceNode が自動的に併せて作成され、統一されたリソース管理が提供されます。

## 実務上の意味

コースコンテンツを扱う際:

1. **コンテンツの作成** — コンテンツエンティティとその ResourceNode の両方を作成する
2. **権限の確認** — ResourceNode のセキュリティ投票者を使用する
3. **ファイルの管理** — ResourceFile 経由でファイルを添付する
4. **可視性の制御** — ResourceLink を作成／変更する
5. **ツリーの構築** — フォルダ構造（例: ドキュメントフォルダ）には ResourceNode の親子関係を使用する