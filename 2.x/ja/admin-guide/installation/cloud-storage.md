# クラウドストレージ

Chamilo 2.0 は、Symfony に統合された PHP ファイルシステム抽象化ライブラリである **Flysystem** を通じて、ユーザーがアップロードしたファイルのクラウドストレージバックエンドをサポートしています。これにより、ファイルをローカルファイルシステムの代わりに（またはそれに加えて）クラウドサービスに保存することができます。

## クラウドストレージを使用する理由

* **スケーラビリティ** -- クラウドストレージはディスク容量を管理することなく、プラットフォームの成長に合わせて拡張します。
* **マルチサーバー展開** -- ロードバランサーの背後で複数のウェブサーバーを運用する場合、クラウドストレージはすべてのサーバーが同じファイルにアクセスできるようにします。
* **耐久性** -- クラウドプロバイダーは組み込みの冗長性とバックアップを提供します。
* **コスト** -- オブジェクトストレージは、サーバーに接続されたブロックストレージよりもギガバイトあたりのコストが安いことが多いです。

## サポートされているプロバイダー

| プロバイダー | Flysystem アダプター |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3互換) | カスタムエンドポイントで S3 アダプターを使用 |
| **ローカルファイルシステム** | デフォルト、追加パッケージ不要 |

## インストール

Chamilo には以下のプロバイダーがあらかじめインストールされています：

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## 設定

Chamilo はファイルをいくつかの Flysystem マウント（**assets**、**assets cache**、**resources**、**resources cache**、**themes**、**plugins**）に分割しています。各マウントは異なるバケットまたはコンテナを対象にすることができます。`config/packages/oneup_flysystem.yaml` 内のクラウド設定は、環境に応じて `when@` 条件で選択され、`.env` で設定した変数を読み取ります。

### Amazon S3

```bash
# .env — 共通の認証情報
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# マウントごとのバケット（各マウントは異なるバケットに設定可能）
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# バケット内のオプションのパスプレフィックス — ポータル間でバケットを共有する際に便利
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
# オプションのプレフィックス
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

GCS は S3 と同様に設定しますが、GCS 固有の環境変数を使用し、マウントごとに 1 つのバケットを設定します。使用しているリリースに付属する `oneup_flysystem.yaml` を参照して正確な変数名を確認してください。これらは `.env` にも記載されています。

### MinIO (S3互換)

MinIO はカスタムエンドポイントとパススタイルアドレス指定を伴う S3 アダプターを通じて動作します。S3 と同様に `AWS_S3_STORAGE_*` を設定し、バンドルがサポートする MinIO エンドポイントとパススタイルフラグを追加します。

> 変数名の完全なリストは、Chamilo に付属する `.env.dist` ファイルに記載されています。実際に使用するプロバイダーの行のみを `.env` にコピーし、コメントを解除してください。

## 既存ファイルの移行

既存のプラットフォームでローカルストレージからクラウドストレージに切り替える場合、既存のファイルを移行する必要があります：

1. 上記のように新しいストレージアダプターを設定します。
2. ローカルの `var/upload/` ディレクトリからクラウドストレージバケットに既存のファイルをコピーし、ディレクトリ構造を保持します。
3. 移行後にプラットフォームを通じてファイルにアクセスできることを確認します。

## 権限とアクセス

クラウドストレージバケットが公開アクセス可能になっていないことを確認してください。公開ファイル URL を明示的に必要とする場合を除き、Chamilo は独自のアクセス制御層を通じてファイルを配信するため、バケットへの直接公開アクセスは不要であり、セキュリティリスクとなります。

S3 の場合は、上記で設定した IAM 認証情報にアクセスを制限するバケットポリシーを使用してください。

## ヒント

* **ローカルで MinIO をテストする** — クラウドプロバイダーにデプロイする前に、無料の S3 互換サーバーである MinIO を自分のマシンで実行してテストしてください。
* **専用バケットを使用する** — Chamilo 専用のバケットを使用し、他のアプリケーションとバケットを共有しないようにしてください。
* **ライフサイクルポリシーを設定する** — ストレージコストを管理するためにクラウドバケットにライフサイクルポリシーを設定します（例：古いファイルを安価なストレージ階層に移動する）。