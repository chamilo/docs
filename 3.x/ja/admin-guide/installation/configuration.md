# 設定

Chamilo 3.0 は、コア設定に環境変数と Symfony の設定ファイルを使用します。本ページでは、主要な設定ファイルと変数について説明します。

## 環境変数（.env）

主要な設定ファイルは、Chamilo のルートディレクトリにある `.env` です。このファイルには、バージョン管理にコミットすべきでない、環境固有の設定が含まれます。

Chamilo には、文書化されたデフォルト値を含む `.env.dist` ファイルが同梱されています。ご利用環境向けに値を上書きするには、`.env` を作成してください（インストール開始に必須です）。

### 主要な変数

| Variable | Description | Example |
|----------|-------------|---------|
| `APP_ENV` | Symfony レベルでのアプリケーション環境です。本番では `prod`、開発では `dev`、テストでは 'test' を使用します。 | `prod` |
| `APP_SECRET` | CSRF トークン、Cookie の署名、その他の暗号処理に使用するランダムな文字列です。Chamilo はインストールごとに一意の値を生成します。変更しないでください。 | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | データベースホストです。デフォルトは localhost です。 | `localhost` |
| `DATABASE_PORT` | データベースポートです。MySQL/MariaDB ではデフォルトは 3306 です。 | `3306` |
| `DATABASE_NAME` | インストールウィザードで指定したデータベース名です。 | 下記を参照。 |
| `DATABASE_USER` | インストールウィザードで指定したデータベースユーザー名です。 | 下記を参照。 |
| `DATABASE_PASSWORD` | インストールウィザードで指定したデータベースユーザーのパスワードです。 | 下記を参照。 |
| `TRUSTED_PROXIES` | （任意）リバースプロキシの背後で Chamilo をホストする場合、呼び出しを解釈し応答を正しく生成できるよう、ここにリバースプロキシの IP を指定する必要があります。 | |
| `APP_ENABLE_API_ENTRYPOINT` | （任意）対話型 API ドキュメント（Swagger/OpenAPI）を `/api` で公開します。デフォルトはオフです。反映にはキャッシュのクリアが必要です — 下記の [API ドキュメントを有効にする](#enable-the-api-documentation) を参照してください。 | `true` |

.env 内のその他の設定が変更されることは比較的まれです。

将来のバージョンでは、DATABASE_* 設定は単一の `DATABASE_URL` 変数に統合される予定です。

メール送信の設定はインストール時に提示されますが、後から管理ダッシュボードの `Platform settings` セクションで変更できます。

## Symfony の設定（config/ ディレクトリ）

Symfony レベルの設定は `config/` ディレクトリにあります。これらの YAML ファイルは、フレームワークの動作、サービス定義、パッケージ固有の設定を制御します。

`config/` ディレクトリ全体は、すべての Chamilo パッケージおよびすべてのアップデートに同梱されます。たとえば `.env` とは異なり、アップグレード時に特別に除外されたり保持されたりしません。**`config/` または `config/packages/` 配下のファイルを直接変更した場合、次回 Chamilo を更新すると、その変更は通知なく上書きされます。** 変更を失わずに設定をカスタマイズするサポートされた方法については、下記の [環境固有の上書き](#environment-specific-overrides) を参照してください。

これらのファイルを変更する必要が生じることは少なく、変更するとポータルが動作しなくなる可能性があるため、システムの可用性を確保しなければならない場合は、変更を試みないでください。

### 主要な設定ファイル

| File | Purpose |
|------|---------|
| `config/authentication.yaml` | 認証方式の設定。 |
| `config/packages/doctrine.yaml` | データベースおよび ORM の設定。 |
| `config/packages/security.yaml` | 認証、ファイアウォール、アクセス制御、ロール階層。 |
| `config/packages/cache.yaml` | キャッシュアダプターの設定（ファイルシステム、APCu、Redis）。 |
| `config/packages/framework.yaml` | Symfony フレームワーク全般の設定（セッション、CSRF、ルーター、HTTP キャッシュ）。 |
| `config/packages/twig.yaml` | テンプレートエンジンの設定。 |
| `config/services.yaml` | アプリケーションのサービス定義と依存性注入。 |

### 環境固有の上書き

Symfony は環境ごとの設定をサポートしています。`config/packages/prod/` 内のファイルは `APP_ENV=prod` のときにデフォルトを上書きし、`config/packages/dev/` は `APP_ENV=dev` のときに上書きします。

たとえば、`config/packages/prod/monolog.yaml` は通常、開発用相当よりも冗長性の低いログを設定します。

Chamilo 自体はソフトウェア内で `config/packages/prod/` に設定を定義していないため、`config/packages/*.yaml` の設定をカスタマイズしたい場合は、**ベースファイルを編集しないでください** — 上書きしたいキーのみを含む同名ファイルを `config/packages/prod/`（または影響を与えたい環境に合わせて `dev/` / `test/`）内に作成し、そこに変更を記述してください。

これは、ベースの `config/packages/*.yaml` ファイルが Chamilo パッケージの一部であるためです。アップデートのたびに再同梱され、そこにある内容は上書きされるため、直接行った編集はアップグレード後に残りません。Chamilo は `config/packages/prod/`（または `dev/` / `test/`）配下には何も同梱しないため、そのディレクトリはアップデートによる上書きから安全であり、ローカルなカスタマイズを置くサポートされた場所です。

## ファイル権限

2.0 以降では、権限が必要なディレクトリを 1 つに絞るよう努めており、3.0 でもそれは変わりません。対象は `var/` ディレクトリです。複雑な問題を避けるため、フォルダ全体を Web サーバーのシステムユーザーが書き込み可能に設定すれば十分です。

Debian 系システムでは、次のように権限を設定します。

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## よくある設定作業

### 本番モードへの切り替え

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

その後、キャッシュをクリアしてウォームアップします。

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### API ドキュメントの有効化

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

変更を反映させるため、キャッシュをクリアします。

```bash
php bin/console cache:clear
```

対話型の API ドキュメント（Swagger/OpenAPI）は `/api` で利用できます。`.env` を編集しただけでは不十分です。解決された値は Symfony のコンパイル済みキャッシュに埋め込まれるため、キャッシュをクリアするまで `/api` は以前の状態（有効／無効）のままです。管理パネルの **システム > 一時ファイルのクリーン** ではこの処理は行われません。理由は [システムツール](../system/system-tools.md#clean-temporary-files) を参照してください。この変更には、シェルから `cache:clear` を実行する必要があります。

### 信頼できるプロキシの設定

Chamilo がリバースプロキシまたはロードバランサーの背後で動作する場合、HTTPS の検出とクライアント IP の解決が正しく行われるよう、信頼できるプロキシを設定します。

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### セッションストレージの設定

デフォルトでは、セッションはファイルシステムに保存されます。複数サーバー構成では、Redis またはデータベースベースのセッションを設定します。

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## ヒント

* **`.env.dist` を直接編集しない** -- 上書きは常に `.env` で行ってください。`.env.dist` はアップグレード時に上書きされることがあります。
* **本番では `APP_DEBUG=0` を維持する** -- デバッグモードはエラーページに機密情報を露出します。
* **`.env` はコードベースとは別にバックアップする** -- 認証情報が含まれ、バージョン管理から除外されています。