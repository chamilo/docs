# 技術堆疊

以下說明 Chamilo 3.0 的技術堆疊。此處所列版本很可能會隨 Chamilo 新版本釋出而變更。版本號碼採用 [Composer 的版本標記法](https://getcomposer.org/doc/articles/versions.md)，該標記法訂有規則，允許版本有一定彈性。

包含階層式相依套件在內，Chamilo 使用數百個自由軟體函式庫。本清單僅涵蓋我們最常使用、且很可能每週都會影響 Chamilo 開發者工作的項目。我們感謝所有其他自由軟體開發者，讓我們的工作更輕鬆、更易維護且更安全。

## 後端

| 技術 | 版本 | 用途 |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | 執行環境 |
| Symfony | 7.4.* | 框架 |
| Doctrine ORM | ^3.3 | 資料庫抽象層 |
| API Platform | ^4.2 | REST API 框架 |
| oneup/flysystem-bundle | ~4.0 | 檔案儲存抽象層 |
| vich/uploader-bundle | ^2.8 | 檔案上傳處理 |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine 擴充（tree、timestampable、sluggable） |
| lexik/jwt-authentication-bundle | ^2.20 | JWT 驗證 |
| nelmio/cors-bundle | ^2.2 | CORS 標頭 |
| mpdf/mpdf | ~8.0 | PDF 產生 |
| phpoffice/phpspreadsheet | ~1.16 | Excel／試算表處理 |
| firebase/php-jwt | ^7.0 | JWT 權杖處理 |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton 整合 |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 實作 |

## 前端

| 技術 | 版本 | 用途 |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI 框架 |
| PrimeVue | ^4.5 | 元件函式庫 |
| Pinia | ^3.0 | 狀態管理 |
| Vue Router | ^5.1 | 用戶端路由 |
| Vue I18n | ^11.4 | 國際化 |
| Axios | ^1.16 | HTTP 用戶端 |
| TinyMCE | ^5.10 | 富文字編輯器 |
| Chart.js | ^4.5 | 圖表與視覺化 |
| FullCalendar | ^6.1 | 行事曆元件 |
| Uppy | ^4.5 | 檔案上傳小工具 |

## 建置工具

| 技術 | 版本 | 用途 |
|-----------|---------|---------|
| Composer | ^2.8 | PHP 相依套件管理器 |
| Webpack | ^5.107 | 模組打包器 |
| Symfony Webpack Encore | ^5.3 | 適用於 Symfony 的 Webpack 包裝器 |
| Tailwind CSS | ^3.4 | 以工具類為主的 CSS 框架 |
| Sass | ^1.100 | CSS 預處理器 |
| TypeScript | ^5.9 | 具型別安全的 JavaScript |
| ESLint | ^10.0 | 程式碼檢查 |
| Prettier | 3.8 | 程式碼格式化 |

## 圖示

| 函式庫 | 版本 | 用途 |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons（CSS 類別 `mdi mdi-*`） |

## 資料庫

Chamilo 支援：

* MySQL 5.7+
* MariaDB 10.11.2+

## 雲端儲存

透過 Flysystem 轉接器：

* 本機檔案系統（預設）
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)