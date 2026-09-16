# 雲端儲存

Chamilo 3.0 透過 **Flysystem**（整合於 Symfony 的 PHP 檔案系統抽象函式庫）支援以雲端儲存後端存放使用者上傳的檔案。這讓您能將檔案儲存在雲端服務上，以取代（或搭配）本機檔案系統。

## 為何使用雲端儲存？

* **可擴充性** -- 雲端儲存可隨平台成長，無需自行管理磁碟空間。
* **多伺服器部署** -- 在負載平衡器後方執行多台網頁伺服器時，雲端儲存可確保所有伺服器存取同一批檔案。
* **耐久性** -- 雲端供應商提供內建的備援與備份。
* **成本** -- 物件儲存每 GB 的費用通常低於掛載在伺服器上的區塊儲存。

## 支援的供應商

| 供應商 | Flysystem Adapter |
|----------|-------------------|
| **Amazon S3** | `league/flysystem-aws-s3-v3` |
| **Google Cloud Storage** | `league/flysystem-google-cloud-storage` |
| **Azure Blob Storage** | `azure-oss/storage-blob-flysystem` |
| **MinIO**（相容 S3） | 使用 S3 adapter 並搭配自訂端點 |
| **DigitalOcean Spaces**（相容 S3） | 使用 S3 adapter 並搭配自訂端點 |
| **本機檔案系統** | 預設，無需額外套件 |

## 安裝

Chamilo 已預先安裝下列供應商：

```bash
# Amazon S3
league/flysystem-aws-s3-v3

# Google Cloud Storage
league/flysystem-google-cloud-storage

# Azure Blob Storage
azure-oss/storage-blob-flysystem
```

## 組態設定

Chamilo 將檔案分散於數個 Flysystem 掛載點 — **assets**、**assets cache**、**resources**、**resources cache**、**themes** 與 **plugins**。每個掛載點可指向不同的 bucket 或 container。`config/packages/oneup_flysystem.yaml` 中的雲端組態會依環境以 `when@` 條件選取，並讀取您在 `.env` 中設定的變數。

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

以與 S3 相同的方式設定 GCS，使用 GCS 專用的環境變數，且每個掛載點對應一個 bucket。確切的變數名稱請參閱發行版本隨附的 `oneup_flysystem.yaml` — 這些名稱亦記載於 `.env`。

### MinIO（相容 S3）

MinIO 透過 S3 adapter 運作，並搭配自訂端點與 path-style 定址 — 請如同 S3 設定 `AWS_S3_STORAGE_*`，並加入該 bundle 所支援的 MinIO 端點與 path-style 旗標。

### DigitalOcean Spaces（相容 S3）

DigitalOcean Spaces 是與 MinIO 不同的託管服務 — 底層並非 MinIO，但對外提供相同的 S3 相容 API，因此同樣可透過 S3 adapter 運作：請如同 S3 設定 `AWS_S3_STORAGE_*`，並將 `AWS_S3_STORAGE_ENDPOINT`（或該 bundle 對應的端點變數）指向您 Space 的區域端點，例如 `https://<region>.digitaloceanspaces.com`。

> 完整的變數名稱清單列於 Chamilo 隨附的 `.env.dist` 檔案。請僅將您實際使用之供應商的對應行複製到 `.env` 並取消註解。

## 主題

**themes** 掛載點的行為與其他掛載點不同：Chamilo 隨附的主題（`chamilo`、`chamilo3`）屬於程式碼的一部分，存放於 `var/themes`，而這正是預設本機配接器所服務的目錄。當您將 themes 掛載點指向雲端容器時，該容器一開始是空的，因此標誌、色彩與主題圖片都會缺失，介面會以未套用樣式的方式呈現。

請使用下列指令，將隨附主題上傳至已設定的儲存空間：

```bash
php bin/console chamilo:remote-storage:upload-themes
```

| 選項 | 效果 |
|--------|--------|
| `--dry-run` | 回報將會上傳的內容，但不實際寫入任何檔案 |
| `--overwrite` | 取代遠端儲存空間上已存在的檔案 |

除非指定 `--overwrite`，否則 themes 檔案系統上已存在的檔案會予以保留，因此重新執行此指令絕不會丟棄管理員透過 **管理 > 設定 > 色彩** 上傳的標誌或色彩主題。當 themes 檔案系統為本機 `var/themes` 目錄時，此指令會偵測到該情況且不執行任何動作，因此在任何安裝環境中執行都是安全的。

Chamilo 會在安裝精靈結束時自行執行此指令，並在升級時於資料庫遷移成功後再次執行，因此新的主題檔案會到達雲端儲存空間，無需任何手動步驟。

仍有兩種情況需要您手動執行：

* **將既有平台切換至雲端儲存**，因為此時不會發生安裝或升級。
* **重新整理新版本中已變更的主題檔案**，並搭配 `--overwrite`。自動執行絕不會覆寫，正是為了避免還原管理員上傳至隨附主題中的標誌；代價是新版本隨附的 `colors.css` 或 `tiny-settings.js` 不會取代容器中已有的複本。

## 遷移既有檔案

若您要在既有平台上從本機儲存切換至雲端儲存，必須遷移既有檔案：

1. 依上述說明設定新的儲存配接器。
2. 將本機 `var/upload/` 目錄中的既有檔案複製到您的雲端儲存儲存貯體，並保留目錄結構。
3. 執行 `php bin/console chamilo:remote-storage:upload-themes` 以上傳隨附主題，如上述說明。
4. 遷移後確認檔案可透過平台存取。

## 權限與存取

請確保您的雲端儲存儲存貯體**不可公開存取**，除非您明確需要公開的檔案 URL。Chamilo 透過自身的存取控制層提供檔案，因此無需直接公開存取儲存貯體，且此舉構成安全風險。

對於 S3，請使用儲存貯體政策，將存取限制為上述設定的 IAM 憑證。

## 提示

* **部署至雲端供應商前，先以本機 MinIO 進行測試**——MinIO 是免費、與 S3 相容的伺服器，可在您自己的機器上執行。
* **DigitalOcean Spaces** 是 Amazon S3 的託管式 S3 相容替代方案，已確認可與 Chamilo 的 S3 配接器搭配使用。
* **為 Chamilo 使用專用儲存貯體**，而非與其他應用程式共用同一個儲存貯體。
* **在雲端儲存貯體上設定生命週期政策**，以管理儲存成本（例如將舊檔案移至較便宜的儲存層級）。