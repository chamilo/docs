# 升级

注意：在此页面中，我们使用 2.0.0 作为严格的版本号，而 2.x 则指代所有以数字 2 开头的版本（例如 2.0.0、2.0.1、2.1.0 等）。

从 1.11.x 升级到 2.x 的过程在您的 Chamilo 代码中的 `public/documentation/installation_guide.html` 文件中有详细描述。此处的信息大部分是重复的。您可以在 `https://campus.chamilo.net/documentation/installation_guide.html` 在线查看。尽管我们已经对类似的迁移进行了广泛测试，但由于 1.11.x 的某些设置在 2.0.0 中尚未得到支持，我们建议等待 2.1 版本再升级 1.11.x 系统，或者在这一过程中寻求 [官方 Chamilo 提供商](https://chamilo.org/providers) 的专业协助。

## 从 1.11.x 升级到 2.x

从 Chamilo 1.11.x 升级到 2.x 是一次**重大迁移**，而不仅仅是简单的更新。Chamilo 2.0 基于 Symfony 框架重建，数据库结构进行了重组，引入了新的 API，并调整了文件组织结构。请仔细规划此次迁移，并在生产环境部署前先在测试环境中进行尝试。

### 开始之前

1. **阅读发布说明**：了解 Chamilo 2.x 的变化、新功能以及 1.11.x 中可能尚未提供的功能。
2. **备份所有内容**：
   - 完整数据库转储（使用 `mysqldump` 或类似工具）。
   - Chamilo 1.11.x 安装目录中的所有文件，特别是 `app/upload/`、`app/courses/` 和 `main/`。
   - 您的 `configuration.php` 文件。
3. **先在测试服务器上进行测试。** 切勿直接在生产服务器上运行迁移。
4. **验证服务器要求。** Chamilo 2.x 的要求与 1.11.x 不同（特别是需要 PHP 8.2+）。请参阅[服务器要求](server-requirements.md)。

### 可能需要手动处理的事项

| 领域 | 说明 |
|------|-------|
| **自定义插件** | 1.11.x 的插件与 2.x 不兼容。必须重写或替换插件，部分工作已在 2.0 中完成，官方插件预计将在 2.1 版本中完全适配。 |
| **自定义主题** | 1.11.x 的主题在 2.x 中无法使用。需使用 2.x 的主题系统重新创建品牌样式。 |
| **自定义数据库修改** | 任何在 Chamilo 之外直接对数据库进行的修改可能无法迁移。 |
| **SCORM 包** | SCORM 内容应能迁移，但需逐个测试包以验证播放效果。 |
| **外部集成** | 任何使用 1.11.x API 或 Web 服务的集成需更新为使用 2.x 的纯 REST API，基于 [API Platform](https://github.com/api-platform/api-platform)。 |

## 更新 Chamilo 2.0.x

在 2.0 分支内的次要更新相对简单。

### 更新流程

#### 使用安装包

1. **备份**数据库和文件。

2. **从 [chamilo.org](https://chamilo.org/download) 下载最新的 2.0.x 版本**：

3. **本地解压**

例如（根据下载的版本进行调整）：
   ```bash
   unzip chamilo-2.0.1.zip
   ```

4. **将文件复制到现有的 Chamilo 安装目录**
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

根据您的 Web 服务器用户进行调整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **验证**平台是否正常加载，并抽查关键功能。

#### 使用 Git

如果您使用 Git 安装了 Chamilo，可以按照以下说明操作。

1. **备份**数据库和文件。

2. **拉取最新代码**（或下载新版本）：
   ```bash
   git pull origin 2.0
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

根据您的 Web 服务器用户进行调整：
   ```bash
   sudo chown -R www-data: [your-chamilo-installation-path]/var
   ```

8. **验证**平台是否正常加载，并抽查关键功能。

### 自动化更新

对于管理多个 Chamilo 实例的组织，可以考虑编写脚本以自动化更新过程：

```bash
#!/bin/bash
set -e

# 拉取代码
git pull origin 2.0

# 依赖
composer install --no-dev --optimize-autoloader
yarn install && yarn build

# 数据库
php bin/console doctrine:migrations:migrate --no-interaction

# 缓存
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod

echo "更新完成。"
```

---
## 提示

* **升级前务必进行备份。** 数据库迁移无法通过 Chamilo 界面进行撤销。
* **首先在测试环境中进行测试** —— 特别是从 1.11.x 升级到 2.0 的迁移，涉及大量数据转换。
* **在维护窗口期间安排升级**，此时用户不会积极使用平台。
* **订阅 GitHub 发布版本**，在 [Github](https://github.com/chamilo/chamilo-lms/releases) 上使用铃铛图标，以便接收新版本和安全补丁的通知。
* **Web 更新** 在 Chamilo 2.0 中尚未提供，但这是一个正在进行的项目，我们希望很快能发布。