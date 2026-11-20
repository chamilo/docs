# 服务器要求

在安装 Chamilo 3.0 之前，请确认您的服务器满足以下要求。

## 软件要求

### PHP

| Requirement | Minimum | Recommended |
|-------------|---------|-------------|
| **PHP version** | 8.3 | 8.5 |

### 必需的 PHP 扩展

| Extension | Purpose |
|-----------|---------|
| **bcmath** | 任意精度数学运算 |
| **ctype** | 字符类型检查 |
| **curl** | HTTP 请求（API 集成、外部服务） |
| **dom**, **libxml**, **simplexml**, **xml**, **xmlreader** | XML 解析与 DOM 处理（SCORM、RSS、SOAP、LTI） |
| **exif** | 读取图像元数据（例如自动校正上传照片的方向） |
| **fileinfo** | 上传文件的 MIME 类型检测 |
| **gd** | 图像处理（缩略图、CAPTCHA） |
| **iconv** | 字符集转换 |
| **intl** | 国际化（日期、数字与字符串格式化） |
| **json** | JSON 编码/解码 |
| **ldap** | LDAP 连接器。尽管您可能不会使用 LDAP，但 Chamilo 仍要求安装该扩展 |
| **mbstring** | 多字节字符串处理（UTF-8 支持） |
| **openssl** | 加密操作（HTTPS、密码哈希、JWT 令牌） |
| **pdo**, plus **pdo_mysql** or **pdo_pgsql** | 数据库连接（请安装与您的数据库相匹配的驱动） |
| **soap** | SOAP Web 服务处理 |
| **zip** | 处理 ZIP 归档（SCORM 包、批量导入/导出） |
| **zlib** | 若干依赖内部使用的压缩功能 |
| **apcu** | 用户级缓存（推荐；安装程序会检查但不强制要求） |
| **opcache** | 操作码缓存（强烈建议用于提升性能；安装程序会检查但不强制要求） |
| **xapian** | 全文搜索（可选，仅在使用搜索功能时需要） |

### 数据库

| Database | Minimum Version | Recommended |
|----------|-----------------|-------------|
| **MariaDB** | 10.0 | 10.4 或更高 |
| **MySQL** | 5.7 | 8.0 或更高 |

低于 10.2.2 的 MariaDB 版本（以及低于 5.7 的 MySQL 版本）需要在安装 Chamilo 之前，在服务器配置中手动启用大索引/前缀支持。

### Web 服务器

| Server | Notes |
|--------|-------|
| **Apache** | 需要启用 `mod_rewrite`（以及 `ssl`、`headers`、`expires`）。Chamilo 在 `public/main/install/apache.dist.conf` 提供示例虚拟主机配置。 |
| **Nginx** | 需要手动配置 URL 重写——Chamilo 不附带 Nginx 示例配置。请参阅 Symfony Nginx 文档以获取参考配置。 |

### 构建工具

| Tool | Purpose |
|------|---------|
| **Composer** (^2.8) | PHP 依赖管理。安装 Chamilo 的 PHP 库所必需。 |
| **Node.js** (20+ LTS) | JavaScript 运行时。构建前端资源所必需。 |
| **Yarn** (^4, via Corepack) | 用于构建前端资源的 JavaScript 包管理器（`yarn install`、`yarn encore production`）。 |

## 硬件要求

| Resource | Minimum | Recommended |
|----------|---------|-------------|
| **RAM** | 4 GB | 8 GB 或更多（从源码构建前端资源本身至少需要 4 GB） |
| **CPU** | 2 vCPUs | 2+ 核 |
| **Disk space** | 4 GB（仅应用程序） | 20+ GB（含上传内容）；从源码构建期间约需 10 GB 可用空间 |
| **Disk type** | HDD | SSD（可显著提升数据库与缓存性能） |

以上为 Chamilo 自身安装指南中的基准数值。实际需求取决于并发用户数量以及所托管内容的规模。

## 操作系统

| OS | Notes |
|----|-------|
| **Linux** | 推荐。Ubuntu 24.04 LTS+、Debian 12+、AlmaLinux 9+ 或同等发行版。 |
| **Windows** | 可行但未经充分测试。开发环境请使用 WSL2。 |
| **macOS** | 仅用于开发 / 未经测试。 |

## 网络要求

* 指向您服务器的域名。
* 用于 HTTPS 的 SSL/TLS 证书（Let's Encrypt 提供免费证书）。
* 若直接发送邮件，需出站 SMTP 访问（或使用第三方邮件服务）。
* 端口 443（HTTPS），以及可选的端口 80（HTTP，用于重定向到 HTTPS）。

## 检查要求

将 Chamilo 源码放到服务器后，可直接检查 PHP 配置：

```bash
php -m          # List installed extensions
php -i          # Full PHP info
```

## 提示

* **使用 PHP-FPM** 配合 Apache 或 Nginx，性能优于 mod_php。
* **将数据库分离**到专用服务器，适用于预期超过 500 名并发用户的平台。
* **使用 SSD 存储**——像 Chamilo 这类数据库密集型应用可从快速磁盘 I/O 中显著受益。