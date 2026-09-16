# 云存储

Chamilo 2.0 通过 **Flysystem** 支持用户上传文件的云存储后端，Flysystem 是一个集成到 Symfony 的 PHP 文件系统抽象库。这允许您将文件存储在云服务上，而不是（或除了）本地文件系统之外。

## 为什么使用云存储？

* **可扩展性** —— 云存储可以随着您的平台增长而扩展，无需管理磁盘空间。
* **多服务器部署** —— 在负载均衡器后面运行多个 Web 服务器时，云存储确保所有服务器都能访问相同的文件。
* **耐久性** —— 云提供商提供内置的冗余和备份。
* **成本** —— 对象存储通常比附加到服务器的块存储每 GB 更便宜。

## 支持的提供商

| 提供商 | Flysystem 适配器 |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3 兼容) | 使用带有自定义端点的 S3 适配器 |
| **本地文件系统** | 默认，无需额外包 |

## 安装

Chamilo 已经预装了以下提供商：

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## 配置

Chamilo 将其文件分布在多个 Flysystem 挂载点上 —— **assets**、**assets cache**、**resources**、**resources cache**、**themes** 和 **plugins**。每个挂载点可以指向不同的存储桶或容器。`config/packages/oneup_flysystem.yaml` 中的云配置通过使用 `when@` 条件根据环境选择，并读取您在 `.env` 中设置的变量。

### Amazon S3

```bash
# .env — 通用凭据
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# 每个挂载点的存储桶（每个挂载点可以是不同的存储桶）
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# 存储桶内的可选路径前缀 —— 在跨门户共享存储桶时很有用
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
# 可选前缀
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

以与 S3 相同的方式配置 GCS，使用 GCS 特定的环境变量，每个挂载点一个存储桶。有关确切的变量名称，请参考随您的版本一起提供的 `oneup_flysystem.yaml`，这些变量也在 `.env` 中有文档记录。

### MinIO (S3 兼容)

MinIO 通过 S3 适配器工作，使用自定义端点和路径样式寻址 —— 设置 `AWS_S3_STORAGE_*` 如 S3，并添加 MinIO 端点和 bundle 支持的路径样式标志。

> 完整的变量名称列表在 Chamilo 随附的 `.env.dist` 文件中列出。仅将您实际使用的提供商的行复制到您的 `.env` 中并取消注释。

## 迁移现有文件

如果您在现有平台上从本地存储切换到云存储，必须迁移现有文件：

1. 如上所述配置新的存储适配器。
2. 将现有文件从本地 `var/upload/` 目录复制到您的云存储桶，保留目录结构。
3. 验证迁移后文件是否可以通过平台访问。

## 权限和访问

确保您的云存储桶**不是公开访问的**，除非您明确需要公共文件 URL。Chamilo 通过自己的访问控制层提供文件，因此直接公开访问存储桶是不必要的，也是安全风险。

对于 S3，使用存储桶策略限制访问，仅允许上面配置的 IAM 凭据访问。

## 小贴士

* **在部署到云提供商之前，先在本地使用 MinIO 测试** —— MinIO 是一个免费的、S3 兼容的服务器，您可以在自己的机器上运行。
* **为 Chamilo 使用专用存储桶**，而不是与其他应用程序共享存储桶。
* **在云存储桶上设置生命周期策略**，以管理存储成本（例如，将旧文件移动到更便宜的存储层）。