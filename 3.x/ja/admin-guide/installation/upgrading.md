# アップグレード

注: このページでは、厳密なバージョン番号として 3.0.0 を、3 で始まるすべてのバージョン（3.0.0、3.0.1、3.1.0 など）を指すために 3.x を使用します。2.x についても同じ表記規則を適用します。

1.11.x からのアップグレード手順は、Chamilo のコード内にある `public/documentation/installation_guide.html` ファイルにも記載されています。
ここでの情報は大部分が重複しています。オンラインでは `https://campus.chamilo.net/documentation/installation_guide.html` で確認できます。

**2.x ではなく 3.0 へアップグレードしてください。** バージョン 3.0 が現行リリースであり、1.11.x の一部の設定は 2.0.0 にはまだ対応するものがありませんでした。したがって 1.11.x のシステムは直接 3.0 へ進みます。同様の移行は広くテスト済みですが、各プラットフォームには固有の経緯があります。まずテスト環境で試し、この作業では [公式 Chamilo プロバイダー](https://chamilo.org/providers) による専門的な支援を検討してください。

## 1.11.x から 3.0 へのアップグレード

Chamilo 1.11.x から 3.0 へのアップグレードは、単純な更新ではなく **大規模な移行** です。Chamilo 2.0 は Symfony フレームワーク上で再構築され、データベーススキーマの再構成、新しい API、異なるファイル構成を採用しており、3.0 はその流れを継承しています。この移行は慎重に計画し、本番環境へ展開する前にテスト環境で試してください。

### 開始前に

1. **リリースノートを読む** — Chamilo 3.x のリリースノートを読み、何が変わったか、何が新しいか、1.11.x のどの機能がまだ利用できないかを把握します。
2. **すべてをバックアップする**:
   - データベースの完全ダンプ（`mysqldump` または同等の手段）。
   - Chamilo 1.11.x インストールディレクトリ内のすべてのファイル。特に `app/upload/`、`app/courses/`、`main/`。
   - `configuration.php` ファイル。
3. **まずステージングサーバーでテストする。** 本番サーバーで直接移行を実行しないでください。
4. **サーバー要件を確認する。** Chamilo 3.x の要件は 1.11.x と異なります（特に PHP 8.3 以降 — インストーラーはそれより古いものを拒否します）。[サーバー要件](server-requirements.md) を参照してください。
5. **1.11.x データベースから `version` テーブルを削除する。** この手順は必須です。Chamilo 2.x 以降は同名のテーブルに Doctrine のマイグレーション履歴を別の列構成で保存します。1.11.x のテーブルを残したままにすると、アップグレードは直ちに停止します。このテーブルは Chamilo 1.11.x の動作には不要です。
6. **新しいコードを新しいディレクトリに展開する。** 1.11.x のファイルはそのまま残します。インストーラーはそれらをコースとアップロードのソースとして読み取り、結果を新しいツリーに書き込みます。

### アップグレードの実行

アップグレードは Web ウィザードまたはコマンドラインで実行できます。

#### Web ウィザード

1. 仮想ホストの `DocumentRoot` を、新しいツリーの `public/` サブディレクトリに向けます。
2. URL を開きます。新しいツリーにはまだ `.env` ファイルがないため、ウィザードが起動します。
3. ステップ 2 でアップグレードオプションを選択し、1.11.x インストールのルートパスを指定します。
4. ウィザードの最後まで進めます。

#### コマンドライン

`UPDATE_PATH` を 1.11.x インストールのルートに設定し、マイグレーションを実行します。

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

先に `memory_limit` と `max_execution_time` を引き上げてください。マイグレーションはすべてのコースファイルを読み取るため、デフォルト値では大幅に不足します。

#### 所要時間

所要時間はデータベースとコースファイルの規模に従います。参考として、238 テーブル、11 コース、63 ユーザー、1489 コースファイルを持つ 1.11.28 のプラットフォームでは **6 分**、メモリ 1.7 GB を要し、393 件のマイグレーションが実行されました。大規模な本番プラットフォームでは数時間かかります。メンテナンスウィンドウを計画し、本番で実行する前に [Chamilo フォーラム](https://chamilo.org) を読むか、[公式プロバイダー](https://chamilo.org/providers) に連絡してください。

### 手動対応が必要になる可能性があるもの

| 領域 | 備考 |
|------|-------|
| **カスタムプラグイン** | 1.11.x のプラグインは 2.x および 3.x では動作しません。書き直しまたは置き換えが必要です。公式プラグインは 2.0 以降、順次移植されています。ご利用のバージョンのプラグイン一覧で利用可能なものを確認してください。 |
| **カスタムテーマ** | 1.11.x のテーマは 2.x および 3.x では動作しません。3.x のテーマシステムを使ってブランディングを再作成してください。 |
| **カスタムのデータベース変更** | Chamilo の外で直接行ったデータベース変更は移行されない場合があります。 |
| **SCORM パッケージ** | SCORM コンテンツは移行されるはずですが、再生を確認するためパッケージごとにテストしてください。 |
| **外部連携** | 1.11.x の API または Web サービスを使用している連携は、[API Platform](https://github.com/api-platform/api-platform) を用いた 2.x の REST 専用 API を使うよう更新する必要があります。 |

## 2.x から 3.0 へのアップグレード

このアップグレードでは、既存のディレクトリと既存のデータベースを維持します。新しいコードを古いツリーの上にコピーし、その後 Web ウィザードまたはコマンドラインでマイグレーションを実行します。

### まずマイグレーション履歴をシードする

Chamilo はエンティティ定義からデータベーススキーマを直接インストールするため、インストーラーで作成したインストールは最終スキーマを持ちますが、**マイグレーション履歴は空**です。Chamilo 3.0 より前に作成されたインストールには、その履歴が一度も付与されていません。次の 2 点がこれに依存します。

* `doctrine:migrations:migrate` は、これから何を実行するかを履歴から判断します。履歴が空だと、すでに現行のスキーマに対して、最初からすべてのマイグレーションを再実行しようとします。
* Web インストーラーは、アップグレードが保留中かどうかを履歴から判断します。履歴が空だと、アップグレードが必要であることの証明がないため、リクエストを拒否します。

したがって、一度シードし、以下の順序を守ってください。

> **警告: 新しいコードをコピーする前に履歴をシードしてください。** これらのコマンドは、**デプロイ済み**のコードが持つすべてのマイグレーションを、すでに実行済みとしてマークします。3.0 のコードをコピーしたあとに実行すると、3.0 のマイグレーションもマークされ、アップグレードが実行されません。

現行バージョンをそのまま残した状態で、次を実行します。

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

最初のコマンドが履歴テーブルを作成します。2 番目が現行バージョンのマイグレーションをマークします。テーブルがまだ存在しないと `doctrine:migrations:version` は単体では失敗するため、最初のコマンドを省略しないでください。

結果を確認します。

```bash
php bin/console doctrine:migrations:status
```

`Executed` は `Available` と等しく、`New` は 0 でなければなりません。これで 3.0 のコードをコピーします。

### アップグレードを実行する

新しいコードをコピーしたあと、URL を開いてウィザードに従うか、コマンドラインからマイグレーションを実行します。

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

Web ウィザードは、マイグレーションが保留中のときだけ開きます。アップグレードが完了すると、再び `409 Conflict` を返します。これが保護の仕組みです。ウィザードには独自のログインがありません。

## Chamilo 3.0.x の更新

3.0 ブランチ内のマイナー更新は、より単純です。

### 更新手順

#### パッケージを使う場合

1. データベースとファイルを**バックアップ**します。

2. [chamilo.org](https://chamilo.org/download) から**最新の 3.0.x バージョンをダウンロード**します。

3. **ローカルで展開**します。

例（ダウンロードしたバージョンに合わせて変更してください）
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **既存の Chamilo インストールへファイルをコピー**します。
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **データベースマイグレーションを実行します。**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **キャッシュをクリアします。**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **権限を変更します。**

Web サーバーのユーザーに合わせて変更してください。
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. プラットフォームが正しく読み込まれることを**確認**し、主要な機能をスポットチェックします。

#### Git を使う場合

Git で Chamilo をインストールした場合は、代わりに次の手順に従えます。

1. データベースとファイルを**バックアップ**します。

2. **最新のコードを取得**します（または新しいリリースをダウンロードします）。
   ```bash
   git pull origin 3.0
   ```

3. **PHP の依存関係を更新します。**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **JavaScript の依存関係を更新し、アセットを再ビルドします。**
   ```bash
   yarn install && yarn build
   ```

5. **データベースマイグレーションを実行します。**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **キャッシュをクリアします。**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **権限を変更します。**

Web サーバーのユーザーに合わせて変更してください。
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. プラットフォームが正しく読み込まれることを**確認**し、主要な機能をスポットチェックします。

### 更新の自動化

複数の Chamilo インスタンスを管理する組織では、更新手順のスクリプト化を検討してください。

```bash
#!/bin/bash
set -e

# Pull code
git pull origin 3.0

# Dependencies
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# Database
php bin/console doctrine:migrations:migrate --no-interaction

# Cache
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "Update complete."
```

## ヒント

* **アップグレード前には必ずバックアップを取ってください。** データベースのマイグレーションは、Chamilo の画面からは元に戻せません。
* **まずステージング環境でテストしてください** -- 特に 1.11.x から 3.0 への移行では、大規模なデータ変換が発生します。
* **ユーザーがプラットフォームを積極的に利用していないメンテナンス時間帯にアップグレードをスケジュールしてください。**
* **[Github](https://github.com/chamilo/chamilo-lms/releases) の GitHub リリースをベルアイコンで購読し、新しいバージョンとセキュリティパッチの通知を受け取ってください。**
* **ウィザードが `Chamilo is already installed` と返す場合**、保留中のマイグレーションが見つからなかったことを意味します。`php bin/console doctrine:migrations:status` を実行して確認してください。稼働中のプラットフォームで `Executed` が 0 の場合、マイグレーション履歴が一度もシードされていません — [まずマイグレーション履歴をシードする](#seed-the-migration-history-first) を参照してください。
* **新バージョンの自動ダウンロード** は Chamilo 3.0 ではまだ提供されていませんが、近日中のリリースを目指して開発を進めています。アップグレード自体は、すでに Web ウィザードから実行できます。