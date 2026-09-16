# 用語集

本ガイド全体で使用される、開発者向けの用語です。

| Term | Definition |
|------|-----------|
| **API Platform** | REST および GraphQL API を構築するための PHP フレームワークで、Symfony と統合されています。Chamilo は Doctrine エンティティから API エンドポイントを自動生成するためにこれを使用します。 |
| **Bundle** | プラグインやモジュールに類似した Symfony の構成単位です。Chamilo には CoreBundle、CourseBundle、LtiBundle の 3 つがあります。 |
| **Composable** | リアクティブなロジックを抽出して再利用するための Vue 3 のパターンです。`assets/vue/composables/` に格納されます。 |
| **Doctrine ORM** | Chamilo が使用する PHP のオブジェクトリレーショナルマッパーです。PHP のエンティティクラスをデータベーステーブルにマッピングします。 |
| **Entity** | Doctrine の属性で注釈され、データベーステーブルに対応する PHP クラスです。 |
| **Encore** | Symfony Webpack Encore — Webpack のラッパーで、フロントエンドのビルド設定を簡素化します。 |
| **Flysystem** | PHP のファイルシステム抽象化ライブラリです。Chamilo はローカル、S3、Azure、GCS ストレージをサポートするためにこれを使用します。 |
| **JWT** | JSON Web Token — REST API の認証メカニズムです。 |
| **Pinia** | Vue 3 向けに推奨される状態管理ライブラリです。Chamilo の新しいストアに使用され、レガシーの Vuex ストアも並行して残っています。 |
| **PrimeVue** | Chamilo が使用する Vue 3 の UI コンポーネントライブラリです。ボタン、テーブル、ダイアログなどを提供します。 |
| **ResourceNode** | Chamilo のリソースシステムの中核となるエンティティです。コースコンテンツのすべての要素が ResourceNode を持ちます。 |
| **ResourceFile** | ResourceNode に添付されたファイルを表すエンティティです。Flysystem 経由で保存されます。 |
| **ResourceLink** | コース／セッション／グループのコンテキストごとに可視性とアクセスを制御するエンティティです。 |
| **SCORM** | Sharable Content Object Reference Model。コンテンツをパッケージ化するための e ラーニング標準です。 |
| **Settings Schema** | プラットフォーム設定のカテゴリを定義する PHP クラスです（例: SecuritySettingsSchema）。 |
| **Voter** | ユーザーがリソースに対してある操作を実行できるかどうかを判定する Symfony のセキュリティコンポーネントです。 |
| **Webpack** | Vue コンポーネント、SCSS、TypeScript をブラウザ向けバンドルにコンパイルする JavaScript モジュールバンドラーです。 |