# 技術スタック

以下に、Chamilo 2.0 の技術スタックについて説明します。ここで言及されているすべてのバージョンは、新しい Chamilo のバージョンがリリースされるにつれて変更される可能性があります。バージョンの表記は、[Composer のバージョン表記](https://getcomposer.org/doc/articles/versions.md) を使用しており、バージョンに関する一定の柔軟性を可能にするルールを定めています。

階層的な依存関係を含めると、Chamilo は数百のオープンソースソフトウェアライブラリを利用しています。このリストには、Chamilo 開発者が毎週の作業で頻繁に使用し、影響を受ける可能性が高いもののみを含めています。私たちの作業をより簡単で持続可能かつ安全にしてくれる、他のすべてのオープンソースソフトウェア開発者に感謝します。

## バックエンド

| 技術 | バージョン | 目的 |
|-----------|---------|---------|
| PHP | 8.2+ | 実行環境 |
| Symfony | 6.4.* | フレームワーク |
| Doctrine ORM | ^2.16 | データベース抽象化 |
| API Platform | ^3.0 | REST API フレームワーク |
| oneup/flysystem-bundle | ~4.0 | ファイルストレージ抽象化 |
| vich/uploader-bundle | ^2.8 | ファイルアップロード管理 |
| stof/doctrine-extensions-bundle | ^1.12 | Doctrine 拡張機能（ツリー、タイムスタンプ、スラッグ対応） |
| lexik/jwt-authentication-bundle | ^2.20 | JWT 認証 |
| nelmio/cors-bundle | ^2.2 | CORS ヘッダー |
| mpdf/mpdf | ~8.0 | PDF 生成 |
| phpoffice/phpspreadsheet | ~1.16 | Excel スプレッドシート操作 |
| firebase/php-jwt | ^7.0 | JWT トークン操作 |
| bigbluebutton/bigbluebutton-api-php | ^2.0 | BigBlueButton との統合 |
| packbackbooks/lti-1p3-tool | ^6.4 | LTI 1.3 の実装 |

## フロントエンド

| 技術 | バージョン | 目的 |
|-----------|---------|---------|
| Vue.js | ^3.5 | ユーザーインターフェースフレームワーク |
| PrimeVue | ^4.5 | コンポーネントライブラリ |
| Pinia | ^3.0 | 状態管理 |
| Vue Router | 5.0 | クライアントサイドルーティング |
| Vue I18n | 11.3 | 国際化 |
| Axios | ^1.13 | HTTP クライアント |
| TinyMCE | ^5.10 | リッチテキストエディタ |
| Chart.js | ^4.5 | グラフと可視化 |
| FullCalendar | ^6.1 | カレンダーコンポーネント |
| Uppy | ^4.5 | ファイルアップロードウィジェット |
| PrimeFlex | ^4.0 | CSS ユーティリティフレームワーク |

## ビルドツール

| 技術 | バージョン | 目的 |
|-----------|---------|---------|
| Composer | ^2.8 | PHP 依存関係マネージャ |
| Webpack | ^5.105 | モジュールバンドラー |
| Symfony Webpack Encore | ^5.3 | Symfony 向け Webpack ラッパー |
| Tailwind CSS | ^3.4 | ユーティリティ CSS フレームワーク |
| Sass | ^1.98 | CSS プリプロセッサ |
| TypeScript | ^5.9 | 型安全な JavaScript |
| ESLint | ^10.0 | リンター |
| Prettier | 3.8 | コードフォーマッター |

## アイコン

| ライブラリ | バージョン | 使用方法 |
|---------|---------|-------|
| @mdi/font | 7.4.47 | Material Design Icons (CSS クラス `mdi mdi-*`) |

## データベース

Chamilo がサポートするデータベース：

* MySQL 5.7+
* MariaDB 10.11.2+

## クラウドストレージ

Flysystem アダプターを介して：

* ローカルファイルシステム（デフォルト）
* AWS S3 (`league/flysystem-aws-s3-v3`)
* Azure Blob Storage (`league/flysystem-azure-blob-storage`)
* Google Cloud Storage (`league/flysystem-google-cloud-storage`)