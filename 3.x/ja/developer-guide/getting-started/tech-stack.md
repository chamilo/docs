# 技術スタック

以下は Chamilo 3.0 の技術スタックです。ここに記載するバージョンは、Chamilo の新しいバージョンがリリースされるにつれて変更される可能性が高いです。バージョン番号は [Composer のバージョン表記](https://getcomposer.org/doc/articles/versions.md) を使用しており、バージョンにある程度の柔軟性を持たせるための規則が定められています。

階層的な依存関係を含めると、Chamilo は数百のフリーソフトウェアライブラリを使用しています。この一覧は、最もよく使用し、Chamilo 開発者の作業に毎週のように影響するであろうものだけを含みます。私たちの作業をより容易に、より保守しやすく、より安全にしてくれている、その他すべてのフリーソフトウェア開発者の方々に感謝します。

## Backend

| Technology | Version | Purpose |
|-----------|---------|---------|
| PHP | 8.3 – 8.5 | Runtime |
| Symfony | 7.4.* | Framework |
| Doctrine ORM | ^3.3 | Database abstraction |
| API Platform | ^4.2 | REST API framework |
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

## Frontend

| Technology | Version | Purpose |
|-----------|---------|---------|
| Vue.js | ^3.5 | UI framework |
| PrimeVue | ^4.5 | Component library |
| Pinia | ^3.0 | State management |
| Vue Router | ^5.1 | Client-side routing |
| Vue I18n | ^11.4 | Internationalization |
| Axios | ^1.16 | HTTP client |
| TinyMCE | ^5.10 | Rich text editor |
| Chart.js | ^4.5 | Charts and visualizations |
| FullCalendar | ^6.1 | Calendar component |
| Uppy | ^4.5 | File upload widget |

## Build Tools

| Technology | Version | Purpose |
|-----------|---------|---------|
| Composer | ^2.8 | PHP dependency manager |
| Webpack | ^5.107 | Module bundler |
| Symfony Webpack Encore | ^5.3 | Webpack wrapper for Symfony |
| Tailwind CSS | ^3.4 | Utility-first CSS framework |
| Sass | ^1.100 | CSS preprocessor |
| TypeScript | ^5.9 | Type-safe JavaScript |
| ESLint | ^10.0 | Linting |
| Prettier | 3.8 | Code formatting |

## Icons

| Library | Version | Usage |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS classes `mdi mdi-*`) |

## Database

Chamilo は次をサポートします。

* MySQL 5.7+
* MariaDB 10.11.2+

## Cloud Storage

Flysystem アダプター経由:

* ローカルファイルシステム（デフォルト）
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`azure-oss/storage-blob-flysystem`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)