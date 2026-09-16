# 技術堆疊

以下描述 Chamilo 2.0 的技術堆疊。此處列出的所有版本隨著新版 Chamilo 的發佈可能會有所變更。版本號碼使用 [Composer's versions notation](https://getcomposer.org/doc/articles/versions.md)，該註記法設定了允許版本周圍某些彈性的規則。

包含階層式依賴關係，Chamilo 使用數百個自由軟體程式庫。此清單僅包含我們最常使用且可能每週左右影響 Chamilo 開發者工作的程式庫。我們感謝所有其他自由軟體開發者，讓我們的工作更容易維護且更安全。

## 後端

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 8.2+ | Runtime |
| Symfony | 6.4.* | Framework |
| Doctrine ORM | ^2.16 | Database abstraction |
| API Platform | ^3.0 | REST API framework |
| oneup/flysystem-bundle | ~4.0 | File storage abstraction |
| vich/uploader-bundle | ^2.8 | File upload handling |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine extensions (tree, timestampable, sluggable) |
| lexik/jwt-authentication-bundle | ^2.20 | JWT authentication |
| nelmio/cors-bundle | ^2.2 | CORS headers |
| mpdf/mpdf | ~8.0 | PDF generation |
| phpoffice/phpspreadsheet | ~1.16 | Excel/spreadsheet handling |
| firebase/php-jwt | ^7.0 | JWT token handling |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton integration |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 implementation |

## 前端

| Technology | Version | Purpose |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI framework |
| PrimeVue | ^4.5 | Component library |
| Pinia | ^3.0 | State management |
| Vue Router | 5.0 | Client-side routing |
| Vue I18n | 11.3 | Internationalization |
| Axios | ^1.13 | HTTP client |
| TinyMCE | ^5.10 | Rich text editor |
| Chart.js | ^4.5 | Charts and visualizations |
| FullCalendar | ^6.1 | Calendar component |
| Uppy | ^4.5 | File upload widget |
| PrimeFlex | ^4.0 | CSS utility framework |

## 建置工具

| Technology | Version | Purpose |
|-----------|---------|---------|
| Composer | ^2.8 | PHP dependency manager |
| Webpack | ^5.105 | Module bundler |
| Symfony Webpack Encore | ^5.3 | Webpack wrapper for Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS framework |
| Sass | ^1.98 | CSS preprocessor |
| TypeScript | ^5.9 | Type-safe JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Code formatting |

## 圖示

| Library | Version | Usage |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS classes `mdi mdi-*`) |

## 資料庫

Chamilo 支援：

* MySQL 5.7+
* MariaDB 10.11.2+

## 雲端儲存

透過 Flysystem 適配器：

* 本地檔案系統 (預設)
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)