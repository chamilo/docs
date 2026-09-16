# 雲端儲存

Chamilo 2.0 支援透過 **Flysystem**（一個整合於 Symfony 的 PHP 檔案系統抽象庫）將使用者上傳的檔案儲存於雲端儲存後端。這讓您可以將檔案儲存在雲端服務上，而不僅限於（或除了）本地檔案系統之外。

## 為什麼使用雲端儲存？

* **可擴展性** -- 雲端儲存能隨著您的平台成長，而無需管理磁碟空間。
* **多伺服器部署** -- 當在負載平衡器後運行多個網頁伺服器時，雲端儲存確保所有伺服器都能存取相同的檔案。
* **耐久性** -- 雲端服務提供商提供內建的冗餘和備份。
* **成本** -- 物件儲存通常比附加到伺服器的區塊儲存每 GB 更便宜。

## 支援的提供商

| 提供商 | Flysystem 適配器 |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `league/flysystem-azure-blob-storage` |
| **MinIO** (S3 相容) | 使用 S3 適配器並設定自訂端點 |
| **本地檔案系統** | 預設，無需額外套件 |

## 安裝

Chamilo 已預裝以下提供商：

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
league/flysystem-azure-blob-storage
```

## 設定

Chamilo 將其檔案分散在多個 Flysystem 掛載點中 — **assets**、**assets cache**、**resources**、**resources cache**、**themes** 和 **plugins**。每個掛載點可以指向不同的儲存桶或容器。雲端設定位於 `config/packages/oneup_flysystem.yaml` 中，會根據環境使用 `when@` 條件選擇，並讀取您在 `.env` 中設定的變數。

### Amazon S3

```bash
# .env — 通用憑證
AWS_S3_STORAGE_VERSION=latest
AWS_S3_STORAGE_REGION=eu-central-1
AWS_S3_STORAGE_ACCESS_KEY=your-access-key
AWS_S3_STORAGE_ACCESS_SECRET=your-secret-key

# 每個掛載點的儲存桶（每個掛載點可以是不同的儲存桶）
AWS_S3_STORAGE_ASSET_BUCKET=chamilo-assets
AWS_S3_STORAGE_ASSET_CACHE_BUCKET=chamilo-asset-cache
AWS_S3_STORAGE_RESOURCE_BUCKET=chamilo-resources
AWS_S3_STORAGE_RESOURCE_CACHE_BUCKET=chamilo-resource-cache
AWS_S3_STORAGE_THEMES_BUCKET=chamilo-themes
AWS_S3_STORAGE_PLUGINS_BUCKET=chamilo-plugins

# 儲存桶內的可選路徑前綴 — 適用於跨入口網站共享儲存桶
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
# 可選前綴
AZURE_STORAGE_ASSET_PREFIX=optional/prefix
```

### Google Cloud Storage

以與 S3 相同的方式設定 GCS，使用 GCS 專屬的環境變數，並為每個掛載點設定一個儲存桶。請參考您版本中提供的 `oneup_flysystem.yaml` 以獲取確切的變數名稱 — 這些變數也在 `.env` 中有記載。

### MinIO (S3 相容)

MinIO 透過 S3 適配器運作，並使用自訂端點和路徑樣式定址 — 如同設定 S3 一樣設定 `AWS_S3_STORAGE_*`，並新增 MinIO 端點和套件支援的路徑樣式標誌。

> 完整的變數名稱列表可在 Chamilo 提供的 `.env.dist` 檔案中找到。僅將您實際使用的提供商相關行複製到您的 `.env` 中並取消註釋。

## 遷移現有檔案

如果您在現有平台上從本地儲存切換到雲端儲存，必須遷移現有檔案：

1. 如上所述設定新的儲存適配器。
2. 將現有檔案從本地 `var/upload/` 目錄複製到您的雲端儲存桶，保留目錄結構。
3. 確認遷移後檔案可透過平台存取。

## 權限與存取

確保您的雲端儲存桶**不公開存取**，除非您明確需要公開檔案 URL。Chamilo 透過自身的存取控制層提供檔案，因此直接公開存取儲存桶是不必要的，且存在安全風險。

對於 S3，使用限制存取至上述設定的 IAM 憑證的儲存桶政策。

## 小貼士

* **在部署到雲端提供商之前，先在本地使用 MinIO 測試** -- MinIO 是一個免費的、S3 相容的伺服器，您可以在自己的機器上運行。
* **為 Chamilo 使用專用儲存桶**，而非與其他應用程式共享儲存桶。
* **在雲端儲存桶上設定生命週期政策**，以管理儲存成本（例如，將舊檔案移至更便宜的儲存層級）。