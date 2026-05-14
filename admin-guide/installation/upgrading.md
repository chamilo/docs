# アップグレード

注意：このページでは、2.0.0を厳密なバージョン番号として使用し、2.xは2で始まるすべてのバージョン（2.0.0、2.0.1、2.1.0など）を指します。

1.11.xから2.xへのアップグレードプロセスは、Chamiloコード内の`public/documentation/installation_guide.html`ファイルに記載されています。ここに記載されている情報は大部分が重複しています。オンラインでは`https://campus.chamilo.net/documentation/installation_guide.html`で確認できます。類似の移行について広範なテストを行っていますが、1.11.xの一部の設定が2.0.0ではまだサポートされていないため、1.11.xシステムをアップグレードする場合はバージョン2.1を待つか、[公式Chamiloプロバイダ](https://chamilo.org/providers)による専門的なサポートを受けることをお勧めします。

## 1.11.xから2.xへのアップグレード

Chamilo 1.11.xから2.xへのアップグレードは、単なる更新ではなく**大規模な移行**です。Chamilo 2.0はSymfonyフレームワークを基盤に再構築され、データベーススキーマの再構成、新しいAPI、異なるファイル構成が導入されています。この移行を慎重に計画し、本番環境に展開する前にテスト環境で試してください。

### 開始する前に

1. **リリースノートを読む**：Chamilo 2.xのリリースノートを確認し、何が変更されたか、何が新しくなったか、1.11.xのどの機能がまだ利用できないかを理解してください。
2. **すべてをバックアップする**：
   - データベースの完全なダンプ（`mysqldump`または同等）。
   - Chamilo 1.11.xインストールディレクトリのすべてのファイル、特に`app/upload/`、`app/courses/`、`main/`。
   - `configuration.php`ファイル。
3. **最初にステージングサーバーでテストする**：本番サーバーで直接移行を実行しないでください。
4. **サーバー要件を確認する**：Chamilo 2.xは1.11.xとは異なる要件があります（特にPHP 8.2+）。[サーバー要件](server-requirements.md)を参照してください。

### 手動での対応が必要な可能性がある項目

| 領域 | 備考 |
|------|-------|
| **カスタムプラグイン** | 1.11.xのプラグインは2.xと互換性がありません。書き直すか置き換える必要があります。2.0では部分的に、2.1までには公式プラグインについて完了する予定です。 |
| **カスタムテーマ** | 1.11.xのテーマは2.xでは動作しません。2.xのテーマシステムを使用してブランディングを再作成してください。 |
| **カスタムデータベースの変更** | Chamilo外での直接的なデータベース変更は移行されない可能性があります。 |
| **SCORMパッケージ** | SCORMコンテンツは移行されるはずですが、再生を確認するために個々のパッケージをテストしてください。 |
| **外部統合** | 1.11.xのAPIやウェブサービスを使用した統合は、2.xのREST専用APIを使用するように更新する必要があります。[API Platform](https://github.com/api-platform/api-platform)を参照してください。 |

## Chamilo 2.0.xの更新

2.0ブランチ内でのマイナーアップデートはより簡単です。

### 更新プロセス

#### パッケージを使用する場合

1. **データベースとファイルをバックアップする**。

2. **最新の2.0.xバージョンをダウンロードする**：[chamilo.org](https://chamilo.org/download)から。

3. **ローカルで展開する**

例えば（ダウンロードしたバージョンに合わせて調整してください）
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **既存のChamiloインストールにファイルをコピーする**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **データベースのマイグレーションを実行する：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **キャッシュをクリアする：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **権限を変更する**

ウェブサーバーユーザーに合わせて調整してください：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **確認する**：プラットフォームが正しく読み込まれるか、主要な機能をスポットチェックしてください。

#### Gitを使用する場合

ChamiloをGitを使用してインストールした場合、以下の手順に従うことができます。

1. **データベースとファイルをバックアップする**。

2. **最新のコードを取得する**（または新しいリリースをダウンロードする）：
   ```bash
   git pull origin 2.0
   ```

3. **PHPの依存関係を更新する：**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **JavaScriptの依存関係を更新し、アセットを再構築する：**
   ```bash
   yarn install && yarn build
   ```

5. **データベースのマイグレーションを実行する：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **キャッシュをクリアする：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **権限を変更する**

ウェブサーバーユーザーに合わせて調整してください：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **確認する**：プラットフォームが正しく読み込まれるか、主要な機能をスポットチェックしてください。

### 更新の自動化

複数のChamiloインスタンスを管理する組織の場合、更新プロセスをスクリプト化することを検討してください：

```bash
#!/bin/bash
set -e

# コードを取得
git pull origin 2.0

# 依存関係
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# データベース
php bin/console doctrine:migrations:migrate --no-interaction

# キャッシュ
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "更新が完了しました。"
```

---
## ヒント

* **アップグレード前に必ずバックアップを取る。** データベースのマイグレーションはChamiloのインターフェースを通じて元に戻すことはできません。
* **最初にステージング環境でテストする** -- 特に1.11.xから2.0への移行では、大きなデータ変換が伴います。
* **メンテナンスウィンドウ中にアップグレードをスケジュールする** ユーザーがプラットフォームを積極的に使用していない時間帯を選んでください。
* **GitHubのリリースを購読する** [Github](https://github.com/chamilo/chamilo-lms/releases) のベルアイコンを使用して、新しいバージョンやセキュリティパッチの通知を受け取ることができます。
* **ウェブアップデート** はChamilo 2.0ではまだ提供されていませんが、これは現在進行中のプロジェクトであり、近いうちにリリースすることを目指しています。