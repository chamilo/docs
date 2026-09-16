# 云存储

Chamilo 3.0 通过 **Flysystem**（集成于 Symfony 的 PHP 文件系统抽象库）支持将用户上传的文件存储到云存储后端。这样您可以将文件存放在云服务上，以替代（或补充）本地文件系统。

## 为何使用云存储？

* **可扩展性** -- 云存储随平台增长而扩展，无需自行管理磁盘空间。
* **多服务器部署** -- 在负载均衡器后运行多台 Web 服务器时，云存储可确保所有服务器访问同一批文件。
* **持久性** -- 云服务商提供内置冗余与备份。
* **成本** -- 对象存储按每吉字节计费通常比挂载到服务器的块存储更便宜。

## 支持的提供商

| 提供商 | Flysystem 适配器 |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO**（S3 兼容） | 使用带自定义端点的 S3 适配器 |
| **DigitalOcean Spaces**（S3 兼容） | 使用带自定义端点的 S3 适配器 |
| **本地文件系统** | 默认，无需额外软件包 |

## 安装

Chamilo 已预装以下提供商：

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## 配置

Chamilo 将文件分散到若干 Flysystem 挂载点 — **assets**、**assets cache**、**resources**、**resources cache**、**themes** 和 **plugins**。每个挂载点可以指向不同的存储桶或容器。`config/packages/oneup_flysystem.yaml` 中的云配置通过 `when@` 条件按环境选择，并读取您在 `.env` 中设置的变量。

### Amazon S3

```bash
# .env — common credentials
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# Per-mount buckets (each mount can be a different bucket)
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# Optional path prefixes inside a bucket — useful to share buckets across portals
AWS_S3_STORAGE_ASSET_PREFIX=portal1/assets
AWS_S3_STORAGE_RESOURCE_PREFIX=portal1/resources
```

### Azure Blob Storage

```bash
# .env
AZURE_STORAGE_CONNECTION_STRING='DefaultEndpointsProtocol=https;AccountName=...;AccountKey=...'
AZURE_STORAGE_ASSET_CONTAINER=asset-container
AZURE_STORAGE_ASSET_CACHE_CONTAINER=asset-cache-container
AZURE_STORAGE_RESOURCE_CONTAINER=resources-container
AZURE_STORAGE_RESOURCE_CACHE_CONTAINER=resources-cache-container
AZURE_STORAGE_THEMES_CONTAINER=themes-container
# Optional prefixes
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

按与 S3 相同的方式配置 GCS，使用 GCS 专用环境变量，并为每个挂载点指定一个存储桶。确切的变量名请参阅随发行版提供的 `oneup_flysystem.yaml` — 它们也记录在 `.env` 中。

### MinIO（S3 兼容）

MinIO 通过带自定义端点和路径风格寻址的 S3 适配器工作 — 像 S3 一样设置 `AWS_S3_STORAGE_*`，并添加该 bundle 所支持的 MinIO 端点与路径风格标志。

### DigitalOcean Spaces（S3 兼容）

DigitalOcean Spaces 是独立于 MinIO 的托管服务 — 底层并非 MinIO，但对外提供相同的 S3 兼容 API，因此同样通过 S3 适配器工作：像 S3 一样设置 `AWS_S3_STORAGE_*`，并将 `AWS_S3_STORAGE_ENDPOINT`（或该 bundle 对应的端点变量）指向您 Space 的区域端点，例如 `https://<region>.digitaloceanspaces.com`。

> 完整变量名列表见随 Chamilo 提供的 `.env.dist` 文件。只需将您实际使用的提供商对应行复制到 `.env` 并取消注释即可。

## 主题

**themes** 挂载点的行为与其他挂载点不同：随 Chamilo 一并提供的主题（`chamilo`、`chamilo3`）属于代码的一部分，存放在 `var/themes` 中，而这正是默认本地适配器所服务的目录。当您将 themes 挂载点指向云存储容器时，该容器初始为空，因此徽标、颜色和主题图片均缺失，界面会以无样式方式呈现。

使用以下命令将捆绑主题上传到已配置的存储：

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| 选项 | 效果 |
|--------|--------|
| `--dry-run` | 报告将要上传的内容，但不实际写入任何内容 |
| `--overwrite` | 替换远程存储上已存在的文件 |

除非指定 `--overwrite`，否则主题文件系统上已有的文件会被保留，因此重复运行该命令绝不会丢弃管理员通过 **管理 > 配置 > 颜色** 上传的徽标或颜色主题。当主题文件系统为本地 `var/themes` 目录时，该命令会检测到这一点并不执行任何操作，因此在任何安装上运行都是安全的。

Chamilo 会在安装向导结束时自行运行此命令，并在升级时于数据库迁移成功后再次运行，因此新的主题文件会到达云存储，无需任何手动步骤。

以下两种情况仍需您手动运行该命令：

* **将现有平台切换到云存储**，因为此时不会发生安装或升级。
* **刷新新版本中已更改的主题文件**，并使用 `--overwrite`。自动运行绝不会覆盖，正是为了避免还原管理员上传到捆绑主题中的徽标；代价是新版本附带的 `colors.css` 或 `tiny-settings.js` 不会替换容器中已有的副本。

## 迁移现有文件

如果您要在现有平台上将本地存储切换为云存储，必须迁移现有文件：

1. 按上文所述配置新的存储适配器。
2. 将本地 `var/upload/` 目录中的现有文件复制到您的云存储存储桶，并保持目录结构不变。
3. 运行 `php bin/console chamilo:remote-storage:upload-themes` 以上传捆绑主题，如上所述。
4. 验证迁移后文件可通过平台访问。

## 权限与访问

请确保您的云存储存储桶**不可公开访问**，除非您明确需要公开的文件 URL。Chamilo 通过自身的访问控制层提供文件服务，因此对存储桶的直接公开访问既无必要，也构成安全风险。

对于 S3，请使用将访问限制为上文所配置 IAM 凭据的存储桶策略。

## 提示

* **在部署到云提供商之前，先用 MinIO 在本地测试** —— MinIO 是可在本机运行的免费、兼容 S3 的服务器。
* **DigitalOcean Spaces** 是 Amazon S3 的托管、兼容 S3 的替代方案，已确认可与 Chamilo 的 S3 适配器配合使用。
* **为 Chamilo 使用专用存储桶**，而不是与其他应用程序共享同一存储桶。
* **在云存储桶上设置生命周期策略** 以管理存储成本（例如，将旧文件移至更便宜的存储层级）。