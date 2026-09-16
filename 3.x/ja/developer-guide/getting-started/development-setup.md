# 開発環境のセットアップ

## 前提条件

* PHP 8.3、8.4、または 8.5（拡張: intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath）
* Composer
* Node.js および npm（または Yarn — 本プロジェクトは Yarn 4 を使用します。正確な固定バージョンは `package.json` を参照してください）
* MySQL 5.7+ または MariaDB 10.11+
* Git

## インストール手順

### 1. リポジトリのクローン

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. PHP 依存関係のインストール

```bash
composer install
```

### 3. 環境の設定

リポジトリには参照用として `.env.dist` が同梱されています。Web インストーラーが内容を書き込む空の `.env` ファイルを作成してください。空のままにしておくことで、アップグレード時にローカル設定が上書きされません。

```bash
touch .env
```

次に、インストーラーがローカル設定を書き込めるよう、`.env` と `config/` を Web サーバーから書き込み可能にします。

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. フロントエンド依存関係のインストールとビルド

```bash
# Install JavaScript dependencies
yarn install

# Build frontend assets for development
yarn encore dev

# Or watch for changes during development
yarn encore dev --watch
```

### 5. 開発サーバーの起動

```bash
symfony server:start
```

または、`public/` ディレクトリを指す Apache/Nginx を使用します。

### 6. データベースのセットアップ

ブラウザーで Chamilo の URL にアクセスし、Web ベースのインストールウィザードを実行します。

### 7. JWT キーの生成

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. システムの保護

`.env` ファイルと `config/` ディレクトリは、インストール時のみ書き込み可能であれば十分です。インストール後は次のように保護してください。

```bash
sudo chown -R root: .env config/
```

`var/` ディレクトリは、Web サーバーから書き込み可能な状態を維持する必要があります。


## ビルドコマンド

| Command | Purpose |
|---------|---------|
| `yarn encore dev` | 開発用フロントエンドのビルド |
| `yarn encore dev --watch` | ビルドし、変更を監視 |
| `yarn encore production` | 本番向けに最適化してビルド |
| `php bin/console cache:clear` | Symfony キャッシュのクリア |

## 開発のヒント

* 詳細なエラーメッセージを表示するには、`.env` で `APP_ENV=dev` および `APP_DEBUG=1` を設定します
* 開発モードでは、ページ下部に Symfony のデバッグツールバーが表示されます
* `APP_ENABLE_API_ENTRYPOINT=true` のとき、API ドキュメントは `/api` で利用できます（キャッシュクリア後 — [設定](../../admin-guide/installation/configuration.md#enable-the-api-documentation) を参照）
* フロントエンドの変更を自動的に再ビルドするには `yarn encore dev --watch` を使用します