# 配置

Chamilo 3.0 使用环境变量和 Symfony 配置文件来管理核心设置。本页介绍主要配置文件与变量。

## 环境变量（.env）

主要配置文件是 Chamilo 根目录下的 `.env`。该文件包含特定于环境的设置，不应提交到版本控制。

Chamilo 随附默认的 `.env.dist` 文件，其中包含带说明的默认值。请创建 `.env`（启动安装所必需）以覆盖当前环境的取值。

### 关键变量

| 变量 | 说明 | 示例 |
|----------|-------------|---------|
| `APP_ENV` | Symfony 层面的应用程序环境。生产环境使用 `prod`，开发环境使用 `dev`，测试环境使用 'test'。 | `prod` |
| `APP_SECRET` | 用于 CSRF 令牌、Cookie 签名及其他加密操作的随机字符串。Chamilo 会为每次安装生成唯一值。请勿修改。 | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | 数据库主机。默认为 localhost | `localhost` |
| `DATABASE_PORT` | 数据库端口。MySQL/MariaDB 默认为 3306 | `3306` |
| `DATABASE_NAME` | 数据库名称，即您在安装向导中填写的名称。 | 见下文。 |
| `DATABASE_USER` | 数据库用户名，即您在安装向导中填写的用户名。 | 见下文。 |
| `DATABASE_PASSWORD` | 数据库用户密码，即您在安装向导中填写的密码。 | 见下文。 |
| `TRUSTED_PROXIES` | （可选）若 Chamilo 部署在反向代理之后，需在此提供反向代理的 IP，以便 Chamilo 正确解析请求并生成响应。 | |
| `APP_ENABLE_API_ENTRYPOINT` | （可选）在 `/api` 公开交互式 API 文档（Swagger/OpenAPI）。默认关闭。生效前需清除缓存——参见下文 [启用 API 文档](#enable-the-api-documentation)。 | `true` |

.env 中的其他设置相对较少修改。

请注意，在未来版本中，DATABASE_* 设置将合并为单一的 `DATABASE_URL` 变量。

电子邮件发送配置在安装过程中提供，之后可在管理仪表板的 `Platform settings` 部分修改。

## Symfony 配置（config/ 目录）

Symfony 层面的配置位于 `config/` 目录。这些 YAML 文件控制框架行为、服务定义以及软件包特定设置。

整个 `config/` 目录会随每个 Chamilo 软件包及每次更新一并提供——与 `.env` 不同，升级时不会被排除或特别保留。**直接对 `config/` 或 `config/packages/` 下的文件所做的任何更改，都会在下次更新 Chamilo 时被静默覆盖。** 请参阅下文 [按环境覆盖](#environment-specific-overrides)，了解在不丢失更改的前提下自定义配置的受支持方式。

通常很少需要修改这些文件，且更改可能导致门户无法运行，因此若必须保证系统可用性，请勿尝试修改。

### 关键配置文件

| 文件 | 用途 |
|------|---------|
| `config/authentication.yaml` | 身份验证方法配置。 |
| `config/packages/doctrine.yaml` | 数据库与 ORM 配置。 |
| `config/packages/security.yaml` | 身份验证、防火墙、访问控制与角色层级。 |
| `config/packages/cache.yaml` | 缓存适配器配置（文件系统、APCu、Redis）。 |
| `config/packages/framework.yaml` | 通用 Symfony 框架设置（会话、CSRF、路由器、HTTP 缓存）。 |
| `config/packages/twig.yaml` | 模板引擎配置。 |
| `config/services.yaml` | 应用程序服务定义与依赖注入。 |

### 按环境覆盖

Symfony 支持按环境配置。当 `APP_ENV=prod` 时，`config/packages/prod/` 中的文件会覆盖默认值；当 `APP_ENV=dev` 时，`config/packages/dev/` 会覆盖默认值。

例如，`config/packages/prod/monolog.yaml` 通常会配置比开发环境更少的日志详细程度。

Chamilo 软件本身并未在 `config/packages/prod/` 中定义任何配置，因此若要自定义 `config/packages/*.yaml` 中的某项设置，**请勿编辑基础文件**——在 `config/packages/prod/`（或 `dev/`/`test/`，与要影响的环境对应）中创建同名文件，仅包含需要覆盖的键，并将更改放在该处。

这一点很重要，因为基础的 `config/packages/*.yaml` 文件属于 Chamilo 软件包：每次更新都会再次随附并覆盖其中内容，因此直接编辑无法在升级后保留。由于 Chamilo 从不在 `config/packages/prod/`（或 `dev/`/`test/`）下随附任何内容，该目录不会被更新覆盖，是保存本地自定义的受支持位置。

## 文件权限

我们在 2.0+ 中已尽量保证只需为一个目录设置权限，这一点在 3.0 中仍然成立。该目录即为 `var/`。为避免复杂问题，将整个文件夹设置为可由 Web 服务器系统用户写入即可。

在基于 Debian 的系统上适当设置权限：

```bash
# For systems where the web server runs as www-data
chown -R www-data:www-data var/
chmod -R 775 var/
```

## 常见配置任务

### 切换到生产模式

```bash
# In .env
APP_ENV=prod
APP_DEBUG=0
```

然后清除并预热缓存：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### 启用 API 文档

```bash
# In .env
APP_ENABLE_API_ENTRYPOINT=true
```

然后清除缓存以使更改生效：

```bash
php bin/console cache:clear
```

交互式 API 文档（Swagger/OpenAPI）随后可在 `/api` 访问。仅编辑 `.env` 并不足够：解析后的值会写入 Symfony 的编译缓存，因此在清除缓存之前，`/api` 会一直返回先前的状态（启用或未启用）。管理面板中的 **系统 > 清理临时文件** 操作*不会*执行此操作 — 原因参见 [系统工具](../system/system-tools.md#clean-temporary-files) — 因此此项更改需要通过 shell 访问运行 `cache:clear`。

### 配置受信任代理

如果 Chamilo 运行在反向代理或负载均衡器之后，请配置受信任代理，以便 HTTPS 检测和客户端 IP 解析正常工作：

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### 配置会话存储

默认情况下，会话存储在文件系统上。对于多服务器部署，请配置 Redis 或基于数据库的会话：

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

## 提示

* **切勿直接编辑 `.env.dist`** -- 始终使用 `.env` 进行覆盖。升级过程中 `.env.dist` 文件可能会被覆盖。
* **生产环境中保持 `APP_DEBUG=0`** -- 调试模式会在错误页面中暴露敏感信息。
* **单独备份 `.env`**，使其与代码库分开，因为它包含凭据且被排除在版本控制之外。