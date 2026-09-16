# 配置

Chamilo 2.0 使用环境变量和 Symfony 配置文件来进行核心设置。本页面涵盖了关键的配置文件和变量。

## 环境变量 (.env)

主要的配置文件是位于 Chamilo 根目录下的 `.env` 文件。该文件包含特定于环境的设置，不应提交到版本控制中。

Chamilo 提供了一个默认的 `.env.dist` 文件，其中包含了有文档记录的默认值。创建 `.env` 文件（启动安装所必需）以覆盖适用于您环境的值。

### 关键变量

| 变量 | 描述 | 示例 |
|----------|-------------|---------|
| `APP_ENV` | 应用程序环境，在 Symfony 级别上。生产环境使用 `prod`，开发环境使用 `dev`，测试环境使用 `test`。 | `prod` |
| `APP_SECRET` | 用于 CSRF 令牌、cookie 签名和其他加密操作的随机字符串。Chamilo 为每次安装生成唯一值，请勿修改。 | `a1b2c3d4e5f6...` |
| `DATABASE_HOST` | 数据库主机。默认为 localhost | `localhost` |
| `DATABASE_PORT` | 数据库端口。MySQL/MariaDB 默认为 3306 | `3306` |
| `DATABASE_NAME` | 数据库名称，由您在安装向导中提供。 | 见下文。 |
| `DATABASE_USER` | 数据库用户名，由您在安装向导中提供。 | 见下文。 |
| `DATABASE_PASSWORD` | 数据库用户密码，由您在安装向导中提供。 | 见下文。 |
| `TRUSTED_PROXIES` | （可选）如果您在反向代理后托管 Chamilo，则需要在此提供反向代理的 IP 地址，以便 Chamilo 能够正确解释请求并生成响应。 | |

.env 文件中的其他设置相对较少被修改。

请注意，在未来版本中，DATABASE_* 设置将合并为一个单一的 `DATABASE_URL` 变量。

电子邮件发送配置会在安装过程中显示，但随后可以在管理仪表板的“平台设置”部分进行修改。

## Symfony 配置 (config/ 目录)

Symfony 级别的配置位于 `config/` 目录中。这些 YAML 文件控制框架行为、服务定义和特定于软件包的设置。

修改这些文件并不常见，且更改它们可能会导致您的门户无法运行，因此如果您必须确保系统的可用性，请勿尝试修改这些文件。

### 关键配置文件

| 文件 | 用途 |
|------|---------|
| `config/authentication.yaml` | 身份验证方法配置。 |
| `config/packages/doctrine.yaml` | 数据库和 ORM 配置。 |
| `config/packages/security.yaml` | 身份验证、防火墙、访问控制和角色层次结构。 |
| `config/packages/cache.yaml` | 缓存适配器配置（文件系统、APCu、Redis）。 |
| `config/packages/framework.yaml` | 通用 Symfony 框架设置（会话、CSRF、路由器、HTTP 缓存）。 |
| `config/packages/twig.yaml` | 模板引擎配置。 |
| `config/services.yaml` | 应用程序服务定义和依赖注入。 |

### 特定环境覆盖

Symfony 支持按环境进行配置。当 `APP_ENV=prod` 时，`config/packages/prod/` 中的文件会覆盖默认值；当 `APP_ENV=dev` 时，`config/packages/dev/` 中的文件会覆盖默认值。

例如，`config/packages/prod/monolog.yaml` 通常配置的日志记录比开发环境中的等效文件要简洁。

Chamilo 本身在软件中未定义 `config/packages/prod/` 中的任何配置，因此如果您想自定义 `config/packages/*.yaml` 中的设置，只需在该目录内创建 yaml 文件的副本并更改其中的设置即可。

## 文件权限

我们在 2.0+ 版本中努力确保只需要一个目录具有权限。这个目录是 `var/`，为了避免复杂问题，只需将整个文件夹设置为 Web 服务器系统用户可写即可。

在基于 Debian 的系统上适当设置权限：

```bash
# 对于 Web 服务器以 www-data 身份运行的系统
chown -R www-data:www-data var/
chmod -R 775 var/
```

## 常见配置任务

### 切换到生产模式

```bash
# 在 .env 中
APP_ENV=prod
APP_DEBUG=0
```

然后清除并预热缓存：

```bash
php bin/console cache:clear --env=prod
php bin/console cache:warmup --env=prod
```

### 配置受信任的代理

如果 Chamilo 在反向代理或负载均衡器后运行，配置受信任的代理以便 HTTPS 检测和客户端 IP 解析正常工作：

```yaml
# .env
TRUSTED_PROXIES='127.0.0.1,PROXY_IP'
```

### 配置会话存储

默认情况下，会话存储在文件系统中。对于多服务器部署，配置 Redis 或数据库支持的会话：

```yaml
# config/packages/framework.yaml
framework:
    session:
        handler_id: 'redis://localhost:6379'
```

---
## 提示

* **切勿直接编辑 `.env.dist`** ——始终使用 `.env` 文件进行自定义设置。`.env.dist` 文件在升级过程中可能会被覆盖。
* **在生产环境中保持 `APP_DEBUG=0`** ——调试模式会在错误页面中暴露敏感信息。
* **单独备份 `.env` 文件**，因为它包含凭据信息且被排除在版本控制之外。