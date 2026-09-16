# クラウドストレージ

Chamilo 3.0 は、ユーザーがアップロードしたファイル向けのクラウドストレージバックエンドを、Symfony に統合された PHP ファイルシステム抽象化ライブラリ **Flysystem** を通じてサポートします。これにより、ローカルファイルシステムの代わりに（またはそれに加えて）クラウドサービス上にファイルを保存できます。

## クラウドストレージを使う理由

* **スケーラビリティ** -- ディスク容量を管理することなく、プラットフォームの成長に合わせてクラウドストレージを拡張できます。
* **マルチサーバー構成** -- ロードバランサーの背後で複数の Web サーバーを運用する場合、クラウドストレージによりすべてのサーバーが同じファイルにアクセスできます。
* **耐久性** -- クラウドプロバイダーは組み込みの冗長化とバックアップを提供します。
* **コスト** -- オブジェクトストレージは、サーバーに接続するブロックストレージよりもギガバイトあたりのコストが低いことがよくあります。

## サポートされるプロバイダー

| Provider | Flysystem Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO** (S3-compatible) | Uses the S3 adapter with a custom endpoint |
| **DigitalOcean Spaces** (S3-compatible) | Uses the S3 adapter with a custom endpoint |
| **Local filesystem** | Default, no additional packages needed |

## インストール

Chamilo には、次のプロバイダーがあらかじめインストールされています。

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## 設定

Chamilo はファイルを複数の Flysystem マウント — **assets**、**assets cache**、**resources**、**resources cache**、**themes**、および **plugins** — に分割します。各マウントは異なるバケットまたはコンテナを対象にできます。`config/packages/oneup_flysystem.yaml` 内のクラウド設定は、`when@` 条件により環境ごとに選択され、`.env` で設定した変数を読み取ります。

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

GCS は S3 と同様の方法で設定します。GCS 固有の環境変数を使用し、マウントごとに 1 つのバケットを指定します。正確な変数名については、リリースに同梱されている `oneup_flysystem.yaml` を参照してください。これらは `.env` にも記載されています。

### MinIO（S3 互換）

MinIO は、カスタムエンドポイントとパススタイルアドレッシングを用いた S3 アダプター経由で動作します。S3 と同様に `AWS_S3_STORAGE_*` を設定し、バンドルがサポートする MinIO のエンドポイントおよびパススタイル用フラグを追加してください。

### DigitalOcean Spaces（S3 互換）

DigitalOcean Spaces は MinIO とは別のホスト型サービスです。内部的に MinIO ではありませんが、同じ S3 互換 API を公開するため、同じく S3 アダプター経由で動作します。S3 と同様に `AWS_S3_STORAGE_*` を設定し、`AWS_S3_STORAGE_ENDPOINT`（またはバンドル相当のエンドポイント変数）を Space のリージョンエンドポイント、例: `https://<region>.digitaloceanspaces.com` に向けてください。

> 変数名の完全な一覧は、Chamilo に同梱されている `.env.dist` ファイルに記載されています。実際に使用するプロバイダーの行だけを `.env` にコピーし、コメントを解除してください。

## テーマ

**themes** マウントの動作は他と異なります。Chamilo に同梱されているテーマ（`chamilo`、`chamilo3`）はコードの一部であり、`var/themes` に置かれます。これはデフォルトのローカルアダプターが提供するディレクトリそのものです。themes マウントをクラウドコンテナに向けると、そのコンテナは空の状態から始まるため、ロゴ、色、テーマ画像がなく、インターフェースがスタイルなしで描画されます。

同梱テーマを設定済みストレージへアップロードするには、次を実行します。

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| オプション | 効果 |
|--------|--------|
| `--dry-run` | 何がアップロードされるかを報告し、実際には何も書き込まない |
| `--overwrite` | リモートストレージ上に既に存在するファイルを置き換える |

themes ファイルシステム上に既にあるファイルは、`--overwrite` を指定しない限り保持されます。そのためコマンドを再実行しても、管理者が **管理 > 設定 > 色** からアップロードしたロゴやカラーテーマは破棄されません。themes ファイルシステムがローカルの `var/themes` ディレクトリである場合、コマンドはそれを検出して何もしないため、どのインストールでも安全に実行できます。

Chamilo はインストールウィザードの最後、およびアップグレード時のデータベース移行成功後にこのコマンドを自動実行するため、新しいテーマファイルは手動操作なしでクラウドストレージに届きます。

次の 2 つの場合は、手動で実行する必要があります。

* **既存プラットフォームをクラウドストレージへ切り替えるとき**。その時点ではインストールもアップグレードも行われないためです。
* **新リリースで変更されたテーマファイルを更新するとき**。`--overwrite` を付けます。自動実行は上書きしないため、管理者が同梱テーマへアップロードしたロゴを戻してしまうことがありません。その代償として、新リリース同梱の `colors.css` や `tiny-settings.js` は、コンテナ内の既存コピーを置き換えません。

## 既存ファイルの移行

既存プラットフォームでローカルストレージからクラウドストレージへ切り替える場合、既存ファイルを移行する必要があります。

1. 上記のとおり新しいストレージアダプターを設定します。
2. ローカルの `var/upload/` ディレクトリからクラウドストレージバケットへ、ディレクトリ構造を保ったまま既存ファイルをコピーします。
3. 上記のとおり `php bin/console chamilo:remote-storage:upload-themes` を実行し、同梱テーマをアップロードします。
4. 移行後、プラットフォーム経由でファイルにアクセスできることを確認します。

## 権限とアクセス

明示的に公開ファイル URL が必要な場合を除き、クラウドストレージバケットを **公開アクセス可能にしない** でください。Chamilo は独自のアクセス制御層を通じてファイルを提供するため、バケットへの直接公開アクセスは不要であり、セキュリティリスクです。

S3 では、上記で設定した IAM 認証情報へのアクセスのみを許可するバケットポリシーを使用してください。

## ヒント

* クラウドプロバイダーへデプロイする前に、**ローカルで MinIO を使ってテスト**してください。MinIO は自マシンで実行できる無料の S3 互換サーバーです。
* **DigitalOcean Spaces** は Amazon S3 のホスト型 S3 互換代替であり、Chamilo の S3 アダプターで動作することが確認されています。
* 他アプリケーションとバケットを共有せず、**Chamilo 専用バケット**を使用してください。
* ストレージコストを管理するため、クラウドバケットに **ライフサイクルポリシー** を設定してください（例: 古いファイルをより安価なストレージ階層へ移動する）。