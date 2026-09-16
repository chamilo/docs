# 测试

## PHP 测试

Chamilo 使用 **PHPUnit** 进行后端测试。

### 测试数据库设置

测试需要专用数据库。创建 `.env.test.local` 并填入测试数据库凭据：

```ini
DATABASE_HOST='127.0.0.1'
DATABASE_PORT='3306'
DATABASE_NAME='chamilo_test'
DATABASE_USER='root'
DATABASE_PASSWORD='root'
```

然后初始化测试数据库：

```bash
php bin/console --env=test cache:clear
php bin/console --env=test doctrine:database:create
php bin/console --env=test doctrine:schema:create
php bin/console --env=test doctrine:fixtures:load --no-interaction
```

在架构变更后重置：

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### 运行测试

```bash
# Run all tests
php bin/phpunit

# Run a specific test file
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# Run tests with HTML coverage report
php bin/phpunit --coverage-html var/coverage
```

### 测试位置

测试位于 `tests/` 目录中，该目录不包含在打包的 Chamilo 下载中——仅随 `git clone` 提供。`CoreBundle/` 与 `CourseBundle/` 镜像 `src/CoreBundle/` 和 `src/CourseBundle/` 的子目录布局：

```
tests/
├── CoreBundle/           # Api/, Command/, Controller/, DataFixtures/, Entity/, Repository/, Security/, Settings/, Tool/, ...
├── CourseBundle/         # Api/, Component/CourseCopy/, Repository/, Settings/
├── playwright/           # Browser-level end-to-end tests (see below)
├── AbstractApiTest.php   # Base class for API tests
└── ChamiloTestTrait.php  # Shared test helpers
```

完整的 `tests/` 布局（包括非测试套件文件夹 `datafiller/`、`history/`、`procedures/`、`scripts/`）见 [项目结构](../getting-started/project-structure.md)。

### 测试类型

* **单元/集成测试** — 位于 `CoreBundle/` 和 `CourseBundle/` 中的 PHPUnit 测试；多数会访问真实数据库（通过 `dama/doctrine-test-bundle`）
* **功能（API）测试** — 继承 `AbstractApiTest`，端到端测试 HTTP 端点
* **Playwright 测试** — 位于 `tests/playwright/` 的浏览器级验收测试（见下文）

## Playwright（端到端）测试

Chamilo 使用 [Playwright](https://playwright.dev/)，并通过 [playwright-bdd](https://vitalets.github.io/playwright-bdd/) 驱动，以便场景保持为普通 Gherkin。这套方案取代了旧的 Behat 套件；Behat 的场景仍保留在 git 历史中，在为曾经覆盖过的区域补充测试时值得参考（`git ls-tree -r --name-only 98c77757ea6 tests/behat`），但仅应将其视为哪些流程重要的提示——选择器已失效，因此请对照正在运行的应用进行验证。

```
tests/playwright/
├── features/             # Gherkin scenarios (*.feature)
├── steps/common.steps.ts # Step definitions (TypeScript)
├── fixtures/             # Test files used by scenarios (e.g. spreadsheets)
├── scripts/              # Supporting scripts (e.g. check-results.mjs)
└── playwright.config.ts  # Base URL and browser options
```

首次运行前，按此顺序播种大多数场景假定已存在的夹具：

```bash
yarn test:playwright:seed                 # the fixed test users
yarn test:playwright:seed-course          # the TEMP course
yarn test:playwright:seed-private-course  # the TEMPPRIVATE course
yarn test:playwright:seed-settings        # settings some scenarios need enabled
```

然后运行套件（种子数据与安装程序场景已从中排除）：

```bash
yarn test:playwright                                              # everything
yarn test:playwright tests/playwright/features/toolForum.feature  # a single file
yarn test:playwright:ui                                           # interactive runner
```

`yarn test:playwright:install` 覆盖 Web 安装程序本身。它会重建数据库，因此仅用于 CI——切勿对你在意的安装运行该命令。

编辑 `.feature` 文件或 `tests/playwright/steps/` 下的任何内容后，在信任一次运行之前请重新生成已编译的规格：

```bash
node_modules/.bin/bddgen --config=tests/playwright/playwright.config.ts
```

## 前端检查

```bash
# Lint JavaScript/Vue (ESLint with Prettier)
yarn eslint assets/vue/

# Type-check TypeScript
yarn tsc --noEmit

# Build production assets (verifies the entire build compiles)
yarn build
```

## PHP 代码质量

Chamilo 使用 **ECS**（Easy Coding Standard）、**PHPStan** 和 **Psalm** 保障代码质量。各工具均提供 Composer 快捷命令：

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

# 或直接运行：
vendor/bin/psalm --show-info=false
```

注意：本项目中没有 `php-cs-fixer`。ECS（`symplify/easy-coding-standard`）是代码风格检查工具。

## 持续集成

拉取请求会由四个 GitHub Actions 工作流自动检查：

| 工作流 | 运行内容 |
|----------|-------------|
| `phpunit.yml` | PHPUnit 测试套件 |
| `format_code.yml` | ECS 代码风格检查 |
| `php_analysis.yml` | Psalm、Doctrine 模式校验、依赖要求检查器 |
| `playwright.yml` | Playwright 端到端测试（通过 Web 安装程序安装 Chamilo，然后运行测试套件） |