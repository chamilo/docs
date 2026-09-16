# 測試

## PHP 測試

Chamilo 使用 **PHPUnit** 進行後端測試。

### 測試資料庫設定

測試需要專用的資料庫。建立 `.env.test.local` 檔案，並填入您的測試資料庫認證資訊：

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

然後初始化測試資料庫：

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

在結構描述變更後重置：

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### 執行測試

```bash
# 執行所有測試
php bin/phpunit

# 執行特定測試檔案
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# 執行測試並產生 HTML 覆蓋率報告
php bin/phpunit --coverage-html var/coverage
```

### 測試位置

測試位於 `tests/` 目錄中：

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
├── behat/               # Behat 端到端測試
├── fixtures/            # Alice 固定資料檔案
├── AbstractApiTest.php  # API 測試的基底類別
└── ChamiloTestTrait.php # 共用的測試輔助工具
```

### 測試類型

* **單元/整合測試** — `CoreBundle/` 和 `CourseBundle/` 中的 PHPUnit 測試；大多數會連接到真實資料庫（透過 `dama/doctrine-test-bundle`）
* **功能（API）測試** — 繼承 `AbstractApiTest` 並端到端測試 HTTP 端點
* **Behat 測試** — `tests/behat/features/` 中的瀏覽器層級驗收測試（見下文）

## Behat（端到端）測試

Chamilo 擁有 Behat 測試套件，用於瀏覽器層級的驗收測試。它需要執行中的 Chamilo 實例、Chrome 以及 ChromeDriver。

```bash
# 從 tests/behat/ 目錄執行：
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# 或執行所有功能：
../../vendor/behat/behat/bin/behat
```

執行前，請在 `tests/behat/behat.yml` 中設定基底 URL。

## 前端檢查

```bash
# Lint JavaScript/Vue（ESLint 搭配 Prettier）
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# 建置生產環境資產（驗證整個建置流程是否能編譯）
yarn build
```

## PHP 程式碼品質

Chamilo 使用 **ECS**（Easy Coding Standard）、**PHPStan** 和 **Psalm** 來確保程式碼品質。每個工具皆有 Composer 快捷指令：

```bash
# 檢查程式碼風格（ECS — Easy Coding Standard）
composer phpcs
# 或直接執行：
vendor/bin/ecs check

# 自動修復程式碼風格違規
composer phpcs-fix
# 或直接執行：
vendor/bin/ecs check --fix

# 使用 PHPStan 進行靜態分析（等級 5，掃描 src/ 和 tests/）
composer phpstan
# 或直接執行：
vendor/bin/phpstan analyse

# 使用 Psalm 進行靜態分析
composer psalm
# 或直接執行：
vendor/bin/psalm --show-info=false
```

注意：本專案不使用 `php-cs-fixer`。ECS（`symplify/easy-coding-standard`）即為程式碼風格工具。

## 持續整合

拉取請求會由四個 GitHub Actions 工作流程自動檢查：

| Workflow | What it runs |
|----------|-------------|
| `phpunit.yml` | PHPUnit 測試套件 |
| `format_code.yml` | ECS 程式碼風格檢查 |
| `php_analysis.yml` | Psalm、Doctrine 結構描述驗證、安全檢查器 |
| `behat.yml` | Behat 端到端測試 |