# テスト

## PHPでのテスト

Chamiloはバックエンドテストに **PHPUnit** を使用しています。

### テストデータベースの設定

テストには専用のデータベースが必要です。テストデータベースの認証情報を含む `.env.test.local` ファイルを作成してください：

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

次に、テストデータベースを初期化します：

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

スキーマに変更を加えた後にリセットするには：

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### テストの実行

```bash
# すべてのテストを実行
php bin/phpunit

# 特定のテストファイルを実行
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# HTML形式のカバレッジレポート付きでテストを実行
php bin/phpunit --coverage-html var/coverage
```

### テストの場所

テストは `tests/` ディレクトリにあります：

```
tests/
├── CoreBundle/
│   ├── Api/
│   ├── Command/
│   ├── Controller/
│   ├── Migrations/
│   ├── Repository/
│   ├── Security/
│   ├── Serializer/
│   ├── Settings/
│   ├── Tool/
│   └── Twig/
├── CourseBundle/
│   ├── Repository/
│   └── Settings/
├── behat/               # Behatを使用したエンドツーエンドテスト
├── fixtures/            # Aliceのフィクスチャファイル
├── AbstractApiTest.php  # APIテストのベースクラス
└── ChamiloTestTrait.php # テスト用の共有ヘルパー
```

### テストの種類

* **単体テスト/統合テスト** — `CoreBundle/` および `CourseBundle/` 内のPHPUnitテスト。ほとんどが実際のデータベースにアクセスします（`dama/doctrine-test-bundle` を介して）
* **機能テスト（API）** — `AbstractApiTest` を拡張し、HTTPエンドポイントをエンドツーエンドでテストします
* **Behatテスト** — ブラウザレベルの受け入れテストで、`tests/behat/features/` にあります（以下参照）

## Behatテスト（エンドツーエンド）

Chamiloには、ブラウザレベルの受け入れテスト用のBehatテストスイートがあります。Chamiloのインスタンスが実行中であること、またChromeおよびChromeDriverが必要です。

```bash
# tests/behat/ ディレクトリから：
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# またはすべてのフィーチャを実行：
../../vendor/behat/behat/bin/behat
```

実行前に `tests/behat/behat.yml` でベースURLを設定してください。

## フロントエンドのチェック

```bash
# JavaScript/Vueのチェック（ESLintとPrettierを使用）
yarn eslint assets/vue/

# TypeScriptの型チェック
yarn tsc --noEmit

# 本番アセットのビルド（すべてのビルドが成功するか確認）
yarn build
```

## PHPコードの品質

Chamiloはコード品質のために **ECS** (Easy Coding Standard)、**PHPStan**、および **Psalm** を使用しています。それぞれにComposerのショートカットが用意されています：

```bash
# コードスタイルのチェック（ECS — Easy Coding Standard）
composer phpcs
# または直接：
vendor/bin/ecs check

# コードスタイル違反の自動修正
composer phpcs-fix
# または直接：
vendor/bin/ecs check --fix

# PHPStanによる静的解析（レベル5、src/ と tests/ をスキャン）
composer phpstan
# または直接：
vendor/bin/phpstan analyse

# Psalmによる静的解析
composer psalm
# または直接：
vendor/bin/psalm --show-info=false
```

注意：このプロジェクトには `php-cs-fixer` はありません。ECS (`symplify/easy-coding-standard`) がコードスタイルツールです。

## 継続的インテグレーション

プルリクエストは、GitHub Actionsの4つのワークフローによって自動的にチェックされます：

| ワークフロー | 実行内容 |
|--------------|----------|
| `phpunit.yml` | PHPUnitテストスイート |
| `format_code.yml` | ECSによるコードスタイルチェック |
| `php_analysis.yml` | Psalm、Doctrineスキーマ検証、セキュリティチェッカー |
| `behat.yml` | Behatによるエンドツーエンドテスト |