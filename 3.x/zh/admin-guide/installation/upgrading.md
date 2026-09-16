# 升级

说明：本页以 3.0.0 作为严格版本号，并以 3.x 指代所有以数字 3 开头的版本（3.0.0、3.0.1、3.1.0 等）。2.x 采用相同约定。

从 1.11.x 升级的过程也记载于 Chamilo 代码中的 `public/documentation/installation_guide.html` 文件。此处信息大体重复。可在线查看：`https://campus.chamilo.net/documentation/installation_guide.html`。

**请升级到 3.0，而不是 2.x。** 3.0 是当前发行版，且部分 1.11.x 设置在 2.0.0 中尚无对应项。因此 1.11.x 系统应直接升级到 3.0。我们已对类似迁移做过大量测试，但每套平台都有各自的历史：请先在测试环境中尝试，并考虑由[官方 Chamilo 服务商](https://chamilo.org/providers)提供专业陪同。

## 从 1.11.x 升级到 3.0

从 Chamilo 1.11.x 升级到 3.0 是一次**重大迁移**，而非简单更新。Chamilo 2.0 基于 Symfony 框架重建，数据库结构、新 API 以及文件组织均已调整，3.0 延续这一路线。请仔细规划此次迁移，并在投入生产前先在测试环境中验证。

### 开始之前

1. **阅读发行说明**，了解 Chamilo 3.x 的变更、新增内容，以及 1.11.x 中哪些功能可能尚不可用。
2. **完整备份**：
   - 完整数据库转储（`mysqldump` 或等效工具）。
   - Chamilo 1.11.x 安装目录中的全部文件，尤其是 `app/upload/`、`app/courses/` 和 `main/`。
   - 您的 `configuration.php` 文件。
3. **务必先在预发布服务器上测试。** 切勿直接在生产服务器上执行迁移。
4. **核对服务器要求。** Chamilo 3.x 的要求与 1.11.x 不同（尤其是 PHP 8.3 或更高版本——安装程序会拒绝更旧版本）。参见[服务器要求](server-requirements.md)。
5. **从 1.11.x 数据库中删除 `version` 表。** 此步骤为强制要求。Chamilo 2.x 及更高版本将 Doctrine 迁移历史存储在同名表中，列结构不同。若保留 1.11.x 的该表，升级会立即中止。该表对 Chamilo 1.11.x 的运行并非必需。
6. **将新代码解压到新目录。** 1.11.x 文件保持原位。安装程序将其作为课程与上传文件的来源读取，并将结果写入新目录树。

### 执行升级

可通过 Web 向导或命令行执行升级。

#### Web 向导

1. 将虚拟主机的 `DocumentRoot` 指向新目录树的 `public/` 子目录。
2. 打开您的 URL。由于新目录树尚无 `.env` 文件，向导会启动。
3. 在第 2 步选择升级选项，并给出 1.11.x 安装的根路径。
4. 按向导完成全部步骤。

#### 命令行

将 `UPDATE_PATH` 设为 1.11.x 安装的根目录，然后运行迁移：

```bash
UPDATE_PATH=/path/to/chamilo-1.11 php bin/console doctrine:migrations:migrate --no-interaction
```

请先提高 `memory_limit` 和 `max_execution_time`。迁移会读取每个课程文件，所需资源远超默认值。

#### 所需时间

耗时取决于数据库规模与课程文件大小。作为参考，一套 1.11.28 平台（238 张表、11 门课程、63 名用户、1489 个课程文件）耗时 **6 分钟**、占用 1.7 GB 内存，并执行了 393 次迁移。大型生产平台可能需要数小时。请规划维护窗口，并在生产环境执行前阅读 [Chamilo 论坛](https://chamilo.org) 或联系[官方服务商](https://chamilo.org/providers)。

### 可能需要人工处理的事项

| 范围 | 说明 |
|------|-------|
| **自定义插件** | 1.11.x 插件无法在 2.x 或 3.x 中运行，必须重写或替换。官方插件自 2.0 起已逐步移植——请查看您所用版本的插件列表以确认可用性。 |
| **自定义主题** | 1.11.x 主题无法在 2.x 或 3.x 中使用。请使用 3.x 主题系统重新制作品牌样式。 |
| **自定义数据库修改** | 在 Chamilo 之外直接修改的数据库内容可能不会被迁移。 |
| **SCORM 包** | SCORM 内容应能迁移，但请逐个测试包以确认播放正常。 |
| **外部集成** | 任何使用 1.11.x API 或 Web 服务的集成，需更新为基于 [API Platform](https://github.com/api-platform/api-platform) 的 2.x 纯 REST API。 |

## 从 2.x 升级到 3.0

此次升级保留现有目录与现有数据库。将新代码覆盖到旧目录树，然后通过 Web 向导或命令行运行迁移。

### 先填充迁移历史

Chamilo 直接根据实体定义安装数据库架构，因此安装程序创建的安装拥有最终架构，但迁移历史为**空**。Chamilo 3.0 之前创建的安装从未获得该历史。有两件事依赖它：

* `doctrine:migrations:migrate` 根据它决定要运行什么。历史为空时，它会尝试从一开始重放每一条迁移，而架构已经是最新的。
* Web 安装程序根据它判断是否有待执行的升级。历史为空时它会拒绝请求，因为没有任何证据表明需要进行升级。

因此只需填充一次，并遵守下面的顺序。

> **警告：在复制新代码之前先填充历史。** 这些命令会将**已部署**代码所携带的每一条迁移标记为已执行。如果在复制 3.0 代码之后再运行它们，它们也会标记 3.0 的迁移，升级将永远不会运行。

在当前版本仍就位的情况下，运行：

```bash
php bin/console doctrine:migrations:sync-metadata-storage --no-interaction
php bin/console doctrine:migrations:version --add --all --no-interaction
```

第一条命令创建历史表。第二条标记当前版本的迁移。若表尚不存在，`doctrine:migrations:version` 会单独失败，因此不要跳过第一条。

检查结果：

```bash
php bin/console doctrine:migrations:status
```

`Executed` 必须等于 `Available`，且 `New` 必须为 0。现在再复制 3.0 代码。

### 运行升级

复制新代码，然后打开您的 URL 并按照向导操作，或从命令行运行迁移：

```bash
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

仅在迁移待执行时，Web 向导才会打开。升级完成后，它会再次返回 `409 Conflict`，这正是对它的保护：向导本身没有登录功能。

## 更新 Chamilo 3.0.x

3.0 分支内的次要更新更为直接。

### 更新流程

#### 使用软件包

1. **备份**数据库和文件。

2. 从 [chamilo.org](https://chamilo.org/download) **下载最新的 3.0.x 版本**：

3. **在本地解压**

例如（请按所下载的版本调整）
   ```bash
   unzip chamilo-3.0.1.zip
   ```

4. **将文件复制到现有的 Chamilo 安装之上**
   ```bash
   cp -r chamilo/* [your-chamilo-installation-path]/
   cp -r chamilo/.* [your-chamilo-installation-path]/
   ```

5. **运行数据库迁移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除缓存：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **更改权限**

请按您的 Web 服务器用户调整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **验证**平台能否正确加载，并抽查关键功能。

#### 使用 Git

如果您是使用 Git 安装的 Chamilo，可以改用以下说明。

1. **备份**数据库和文件。

2. **拉取最新代码**（或下载新发行版）：
   ```bash
   git pull origin 3.0
   ```

3. **更新 PHP 依赖：**
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. **更新 JavaScript 依赖并重新构建资源：**
   ```bash
   yarn install && yarn build
   ```

5. **运行数据库迁移：**
   ```bash
   php bin/console doctrine:migrations:migrate --no-interaction
   ```

6. **清除缓存：**
   ```bash
   php bin/console cache:clear --env=prod
   php bin/console cache:warmup --env=prod
   ```

7. **更改权限**

请按您的 Web 服务器用户调整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **验证**平台能否正确加载，并抽查关键功能。

### 自动化更新

对于管理多个 Chamilo 实例的组织，可考虑将更新流程脚本化：

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

## 提示

* **升级前务必备份。** 数据库迁移无法通过 Chamilo 界面回滚。
* **先在预发布环境中测试** —— 尤其是从 1.11.x 迁移到 3.0 时，涉及大量数据转换。
* **在维护窗口期间安排升级**，此时用户未在使用平台。
* **订阅 GitHub 发行版**，在 [Github](https://github.com/chamilo/chamilo-lms/releases) 上使用铃铛图标，以便获知新版本和安全补丁。
* **如果向导提示 `Chamilo is already installed`**，说明未发现待执行的迁移。请运行 `php bin/console doctrine:migrations:status` 进行检查。若平台可正常使用但 `Executed` 为 0，则迁移历史从未被初始化 —— 请参阅 [首先填充迁移历史](#seed-the-migration-history-first)。
* **自动下载新版本** 在 Chamilo 3.0 中尚未提供，但这是我们希望尽快发布的持续项目。升级本身已可通过 Web 向导运行。