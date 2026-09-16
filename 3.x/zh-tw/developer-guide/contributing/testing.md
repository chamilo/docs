# 測試

## PHP 測試

Chamilo 使用 **PHPUnit** 進行後端測試。

### 測試資料庫設定

測試需要專用資料庫。請建立 `.env.test.local` 並填入測試資料庫憑證：

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

接著初始化測試資料庫：

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

結構變更後若要重設：

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### 執行測試

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### 測試位置

測試位於 `tests/` 目錄，該目錄不會包含在已封裝的 Chamilo 下載檔中——僅能透過 `git clone` 取得。`CoreBundle/` 與 `CourseBundle/` 對應 `src/CoreBundle/` 與 `src/CourseBundle/` 的子目錄結構：

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

完整的 `tests/` 配置（含非測試套件資料夾 `datafiller/`、`history/`、`procedures/`、`scripts/`）請參閱 [專案結構](../getting-started/project-structure.md)。

### 測試類型

* **單元／整合測試** — 位於 `CoreBundle/` 與 `CourseBundle/` 的 PHPUnit 測試；多數會連線真實資料庫（透過 `dama/doctrine-test-bundle`）
* **功能（API）測試** — 繼承 `AbstractApiTest`，端對端測試 HTTP 端點
* **Playwright 測試** — 位於 `tests/playwright/` 的瀏覽器層級驗收測試（見下文）

## Playwright（端對端）測試

Chamilo 使用 [Playwright](https://playwright.dev/)，並透過 [playwright-bdd](https://vitalets.github.io/playwright-bdd/) 驅動，使情境維持純 Gherkin。此套件取代了舊的 Behat 套件；Behat 的情境仍保留在 git 歷史中，為曾測試過的區域補齊覆蓋時值得參考（`git ls-tree -r --name-only 98c77757ea6 tests/behat`），但僅能視為哪些流程重要的提示——選擇器已過時，務必對照實際應用程式驗證。

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

首次執行前，請依下列順序植入多數情境假設存在的 fixtures：

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

接著執行套件（種子資料與安裝程式情境已排除在外）：

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` 涵蓋網頁安裝程式本身。它會重建資料庫，因此僅供 CI 使用——切勿對您在意的安裝環境執行。

編輯 `.feature` 檔或 `tests/playwright/steps/` 下任何內容後，請先重新產生編譯後的 specs，再信賴執行結果：

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## 前端檢查

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP 程式碼品質

Chamilo 使用 **ECS**（Easy Coding Standard）、**PHPStan** 與 **Psalm** 把關程式碼品質。各項皆有 Composer 捷徑：

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

# 或直接執行：
vendor/bin/psalm --show-info=false
```

注意：本專案沒有 `php-cs-fixer`。ECS（`symplify/easy-coding-standard`）才是程式碼風格工具。

## Continuous Integration

Pull requests 會由四個 GitHub Actions workflows 自動檢查：

| Workflow | What it runs |
|----------|-------------|
| `phpunit.yml` | PHPUnit test suite |
| `format_code.yml` | ECS code style check |
| `php_analysis.yml` | Psalm, Doctrine schema validation, dependency requirements checker |
| `playwright.yml` | Playwright end-to-end tests（透過網頁安裝程式安裝 Chamilo，然後執行測試套件） |