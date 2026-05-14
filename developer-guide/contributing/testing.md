# 测试

## PHP 测试

Chamilo 使用 **PHPUnit** 进行后端测试。

### 测试数据库设置

测试需要一个专用的数据库。创建 `.env.test.local` 文件，并填写测试数据库的凭据：

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

在模式更改后重置数据库：

```bash
php bin/console --env=test doctrine:schema:update --force --complete
```

### 运行测试

```bash
# 运行所有测试
php bin/phpunit

# 运行特定的测试文件
php bin/phpunit tests/CoreBundle/Repository/UserRepositoryTest.php

# 运行测试并生成 HTML 覆盖率报告
php bin/phpunit --coverage-html var/coverage
```

### 测试位置

测试文件位于 `tests/` 目录下：

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
├── behat/               # Behat 端到端测试
├── fixtures/            # Alice 固定数据文件
├── AbstractApiTest.php  # API 测试的基类
└── ChamiloTestTrait.php # 共享的测试辅助工具
```

### 测试类型

* **单元/集成测试** — 位于 `CoreBundle/` 和 `CourseBundle/` 中的 PHPUnit 测试；大多数测试会连接真实的数据库（通过 `dama/doctrine-test-bundle`）
* **功能（API）测试** — 继承 `AbstractApiTest`，对 HTTP 端点进行端到端测试
* **Behat 测试** — 位于 `tests/behat/features/` 中的浏览器级验收测试（见下文）

## Behat（端到端）测试

Chamilo 拥有一套 Behat 测试套件，用于浏览器级的验收测试。运行测试需要一个正在运行的 Chamilo 实例、Chrome 浏览器以及 ChromeDriver。

```bash
# 从 tests/behat/ 目录运行：
../../vendor/behat/behat/bin/behat features/actionInstall.feature
../../vendor/behat/behat/bin/behat features/createUser.feature
../../vendor/behat/behat/bin/behat features/createCourse.feature

# 或者运行所有功能测试：
../../vendor/behat/behat/bin/behat
```

在运行之前，请在 `tests/behat/behat.yml` 中配置基础 URL。

## 前端检查

```bash
# 检查 JavaScript/Vue 代码格式（使用 Prettier 的 ESLint）
yarn eslint assets/vue/

# 类型检查 TypeScript
yarn tsc --noEmit

# 构建生产环境资源（验证整个构建是否能够编译）
yarn build
```

## PHP 代码质量

Chamilo 使用 **ECS**（Easy Coding Standard）、**PHPStan** 和 **Psalm** 来保证代码质量。Composer 提供了每个工具的快捷命令：

```bash
# 检查代码风格（ECS — Easy Coding Standard）
composer phpcs
# 或者直接运行：
vendor/bin/ecs check

# 自动修复代码风格问题
composer phpcs-fix
# 或者直接运行：
vendor/bin/ecs check --fix

# 使用 PHPStan 进行静态分析（级别 5，扫描 src/ 和 tests/）
composer phpstan
# 或者直接运行：
vendor/bin/phpstan analyse

# 使用 Psalm 进行静态分析
composer psalm
# 或者直接运行：
vendor/bin/psalm --show-info=false
```

注意：本项目中没有使用 `php-cs-fixer`。代码风格工具是 ECS（`symplify/easy-coding-standard`）。

## 持续集成

拉取请求会自动通过四个 GitHub Actions 工作流程进行检查：

| 工作流程 | 运行内容 |
|----------|-------------|
| `phpunit.yml` | PHPUnit 测试套件 |
| `format_code.yml` | ECS 代码风格检查 |
| `php_analysis.yml` | Psalm、Doctrine 模式验证、安全检查 |
| `behat.yml` | Behat 端到端测试 |