# 開発者ガイド

Chamilo 3.0 開発者ガイドへようこそ。本ガイドは、Chamilo のアーキテクチャを理解し、プラグインでプラットフォームを拡張し、API を利用し、インターフェースをカスタマイズし、あるいはプロジェクトに貢献したい開発者を対象としています。

## アーキテクチャの概要

Chamilo 3.0 は次の技術で構築されています。

* **バックエンド**: Symfony 7.4（PHP 8.3–8.5）、Doctrine ORM および API Platform 4
* **フロントエンド**: Vue 3、PrimeVue、Pinia による状態管理、Vue Router
* **ビルドシステム**: Symfony Webpack Encore 経由の Webpack 5、Tailwind CSS
* **認証**: JWT トークン（lexik/jwt-authentication-bundle）
* **ファイルストレージ**: Flysystem（ローカル、AWS S3、Azure Blob、Google Cloud に対応）

コードベースは 3 つの Symfony バンドルに整理されています。

| Bundle | Purpose |
|--------|---------|
| **CoreBundle** | プラットフォームの中核：ユーザー、設定、リソース、管理、AI プロバイダー、セキュリティ |
| **CourseBundle** | コース固有の機能：ドキュメント、演習、学習パス、フォーラムなど |
| **LtiBundle** | 外部学習ツール向けの LTI 1.3 統合 |

## 本ガイドの構成

1. **はじめに** — 技術スタック、開発環境のセットアップ、プロジェクト構成
2. **バックエンド** — Symfony アーキテクチャ、エンティティ、リソースシステム、コントローラー、設定
3. **API** — API Platform による REST API、JWT 認証、カスタムアクション
4. **フロントエンド** — Vue コンポーネント、ビュー、ルーティング、状態管理、ビルドシステム
5. **テーマ** — カラーテーマ、CSS/Tailwind、Twig テンプレート
6. **プラグイン** — プラグインアーキテクチャと開発
7. **コントリビューション** — コーディング規約、git ワークフロー、テスト