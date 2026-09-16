# 用語集

このガイド全体で使用される開発者向けの用語。

| 用語 | 定義 |
|------|-----------|
| **API Platform** | RESTおよびGraphQL APIを構築するためのPHPフレームワークで、Symfonyと統合されています。Chamiloでは、DoctrineエンティティからAPIエンドポイントを自動生成するために使用されています。 |
| **Bundle** | Symfonyの組織単位で、プラグインやモジュールに似ています。ChamiloにはCoreBundle、CourseBundle、LtiBundleの3つがあります。 |
| **Composable** | Vue 3のパターンで、リアクティブなロジックを抽出して再利用するためのものです。`assets/vue/composables/`に保存されています。 |
| **Doctrine ORM** | Chamiloで使用されているPHPのオブジェクトリレーショナルマッパー。PHPエンティティクラスをデータベーステーブルにマッピングします。 |
| **Entity** | Doctrine属性で注釈が付けられたPHPクラスで、データベーステーブルにマッピングされます。 |
| **Encore** | Symfony Webpack Encore — Webpackをラップしたもので、フロントエンドのビルド設定を簡素化します。 |
| **Flysystem** | PHPのファイルシステム抽象化ライブラリ。Chamiloでは、ローカル、S3、Azure、GCSストレージをサポートするために使用されています。 |
| **JWT** | JSON Web Token — REST APIの認証メカニズム。 |
| **Pinia** | Vue 3の推奨状態管理ライブラリ。Chamiloの新しいストアに使用されており、従来のVuexストアと共存しています。 |
| **PrimeVue** | Chamiloで使用されているVue 3のUIコンポーネントライブラリ。ボタン、テーブル、ダイアログなどを提供します。 |
| **ResourceNode** | Chamiloのリソースシステムの中心的なエンティティ。コースコンテンツのすべてのピースにはResourceNodeがあります。 |
| **ResourceFile** | ResourceNodeに添付されたファイルを表すエンティティ。Flysystemを介して保存されます。 |
| **ResourceLink** | コース/セッション/グループのコンテキストごとに可視性とアクセスを制御するエンティティ。 |
| **SCORM** | Sharable Content Object Reference Model。コンテンツをパッケージ化するためのeラーニング標準。 |
| **Settings Schema** | プラットフォーム設定のカテゴリを定義するPHPクラス（例：SecuritySettingsSchema）。 |
| **Voter** | Symfonyのセキュリティコンポーネントで、ユーザーがリソースに対してアクションを実行できるかどうかを決定します。 |
| **Webpack** | JavaScriptモジュールバンドラーで、Vueコンポーネント、SCSS、TypeScriptをブラウザ対応のバンドルにコンパイルします。 |