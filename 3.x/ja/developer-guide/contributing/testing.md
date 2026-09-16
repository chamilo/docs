# テスト

## PHP テスト

Chamilo はバックエンドのテストに **PHPUnit** を使用します。

### テスト用データベースのセットアップ

テストには専用のデータベースが必要です。テスト用データベースの認証情報を記載した `.env.test.local` を作成します。

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

次にテスト用データベースを初期化します。

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

スキーマ変更後にリセットする場合:

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### テストの実行

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### テストの配置場所

テストは `tests/` ディレクトリにあります。このディレクトリはパッケージ化された Chamilo のダウンロードには含まれず、`git clone` した場合にのみ付属します。`CoreBundle/` と `CourseBundle/` は `src/CoreBundle/` および `src/CourseBundle/` のサブディレクトリ構成を反映しています。

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

`tests/` の全体構成（テストスイート以外のフォルダ `datafiller/`、`history/`、`procedures/`、`scripts/` を含む）については、[プロジェクト構成](../getting-started/project-structure.md) を参照してください。

### テストの種類

* **ユニット／統合テスト** — `CoreBundle/` および `CourseBundle/` 内の PHPUnit テスト。多くは実データベースにアクセスします（`dama/doctrine-test-bundle` 経由）
* **機能（API）テスト** — `AbstractApiTest` を継承し、HTTP エンドポイントをエンドツーエンドで検証します
* **Playwright テスト** — `tests/playwright/` 内のブラウザレベルの受け入れテスト（後述）

## Playwright（エンドツーエンド）テスト

Chamilo は [Playwright](https://playwright.dev/) を使用し、[playwright-bdd](https://vitalets.github.io/playwright-bdd/) 経由で駆動するため、シナリオは平文の Gherkin のままです。これは旧 Behat スイートの置き換えです。Behat のシナリオは git 履歴に残っており、かつてテストしていた領域のカバレッジを追加する際には参照する価値があります（`git ls-tree -r --name-only 98c77757ea6 tests/behat`）。ただし、どのフローが重要かのヒントとしてのみ扱い、セレクタは古くなっているため、実際のアプリケーションに対して検証してください。

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

初回実行の前に、ほとんどのシナリオが存在を前提とするフィクスチャを、次の順で投入します。

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

その後、スイートを実行します（シードとインストーラのシナリオは除外されます）。

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` は Web インストーラ自体を対象とします。データベースを再作成するため CI 専用です。大切なインストールに対して実行しないでください。

`.feature` ファイル、または `tests/playwright/steps/` 配下を編集したあとは、実行結果を信頼する前にコンパイル済みスペックを再生成してください。

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## フロントエンドのチェック

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP コード品質

Chamilo はコード品質のために **ECS**（Easy Coding Standard）、**PHPStan**、**Psalm** を使用します。それぞれに Composer のショートカットがあります。

```bash
# Check code style (ECS — Easy Coding Standard)
composer phpcs
# or directly:
vendor/bin/ecs check

# Auto-fix code style violations
composer phpcs-fix
# or directly:
vendor/bin/ecs check --fix

# Static analysis with PHPStan (level 5, scans src/ and tests/)
composer phpstan
# or directly:
vendor/bin/phpstan analyse

# Static analysis with Psalm
composer psalm

# または直接:
vendor/bin/psalm --show-info=false
```

注: このプロジェクトには `php-cs-fixer` はありません。コードスタイルツールは ECS（`symplify/easy-coding-standard`）です。

## Continuous Integration

プルリクエストは、4つの GitHub Actions ワークフローによって自動的にチェックされます。

| Workflow | What it runs |
|----------|-------------|
| `phpunit.yml` | PHPUnit テストスイート |
| `format_code.yml` | ECS コードスタイルチェック |
| `php_analysis.yml` | Psalm、Doctrine スキーマ検証、依存関係要件チェッカー |
| `playwright.yml` | Playwright エンドツーエンドテスト（Web インストーラーで Chamilo をインストールした後、スイートを実行） |