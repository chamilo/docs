# 開発のための設定

## 前提条件

* PHP 8.2+（拡張機能：intl, gd, curl, zip, mbstring, xml, json, pdo, ldap, exif, bcmath）
* Composer
* Node.js および npm（または Yarn — プロジェクトでは Yarn 4 を使用しています。固定された正確なバージョンについては `package.json` を参照してください）
* MySQL 5.7+ または MariaDB 10.11+
* Git

## インストール手順

### 1. リポジトリをクローンする

```bash
git clone https://github.com/chamilo/chamilo-lms.git chamilo
cd chamilo
```

### 2. PHP の依存関係をインストールする

```bash
composer install
```

### 3. 環境を設定する

リポジトリには参照用の `.env.dist` ファイルが含まれています。ウェブインストーラーによって入力される空の `.env` ファイルを作成してください。空にしておくことで、更新がローカル設定を上書きしないようにします：

```bash
touch .env
```

次に、ウェブインストーラーがローカル設定を書き込めるように、`.env` と `config/` をウェブサーバーから書き込み可能にします：

```bash
sudo chown -R www-data: .env config/ var/
```

### 4. フロントエンドの依存関係をインストールし、コンパイルする

```bash
# JavaScript の依存関係をインストール
yarn install

# 開発用にフロントエンドアセットをコンパイル
yarn encore dev

# または開発中に変更を監視
yarn encore dev --watch
```

### 5. 開発サーバーを起動する

```bash
symfony server:start
```

または、Apache/Nginx を使用して `public/` ディレクトリを指すように設定してください。

### 6. データベースを設定する

ブラウザで Chamilo の URL にアクセスして、ウェブベースのインストールウィザードを実行します。

### 7. JWT キーを生成する

```bash
php bin/console lexik:jwt:generate-keypair
```

### 8. システムを保護する

`.env` ファイルと `config/` ディレクトリはインストール期間中のみ書き込み可能である必要があります。インストール後に保護してください：

```bash
sudo chown -R root: .env config/
```

`var/` ディレクトリはウェブサーバーから引き続き書き込み可能である必要があります。

## ビルドコマンド

| コマンド | 目的 |
|---------|------|
| `yarn encore dev` | 開発用にフロントエンドをコンパイル |
| `yarn encore dev --watch` | コンパイルして変更を監視 |
| `yarn encore production` | 本番用に最適化してコンパイル |
| `php bin/console cache:clear` | Symfony のキャッシュをクリア |

## 開発のヒント

* 詳細なエラーメッセージを表示するには、`.env` ファイルで `APP_ENV=dev` および `APP_DEBUG=1` を設定してください
* 開発モードでは、Symfony のデバッグバーがページの下部に表示されます
* `APP_ENABLE_API_ENTRYPOINT=1` の場合、API ドキュメントは `/api` で利用可能です
* フロントエンドの変更を自動的に再コンパイルするには、`yarn encore dev --watch` を使用してください