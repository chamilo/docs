# ビルドシステム

Chamilo はフロントエンドアセットのビルドに **Symfony Webpack Encore** 経由で **Webpack 5** を使用します。ビルド設定の全体はプロジェクトルートの `webpack.config.js` にあります。

出力は `public/build/` に書き出され、公開パス `/build` 配下で配信されます。

## エントリーポイント

### JavaScript

| Entry | Source | Purpose |
|-------|--------|---------|
| `vue` | `assets/vue/main.js` | メインの Vue 3 アプリケーション |
| `vue_installer` | `assets/vue/main_installer.js` | インストールウィザード |
| `legacy_app` | `assets/js/legacy/app.js` | レガシー JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 演習プレーヤー |
| `legacy_lp` | `assets/js/legacy/lp.js` | 学習パスプレーヤー |
| `legacy_document` | `assets/js/legacy/document.js` | ドキュメントビューアー |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | レガシーグリッドウィジェット |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | レガシー iframe 用のフレーム準備完了ローダー |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻訳ヘルパー |
| `glossary_auto` | `assets/js/glossary-auto.js` | 用語集用語の自動ハイライト |

### CSS

| Entry | Source |
|-------|--------|
| `app` | `assets/css/app.scss` |
| `css/chat` | `assets/css/chat.scss` |
| `css/document` | `assets/css/document.scss` |
| `css/editor` | `assets/css/editor.scss` |
| `css/editor_content` | `assets/css/editor_content.scss` |
| `css/markdown` | `assets/css/markdown.scss` |
| `css/print` | `assets/css/print.scss` |
| `css/responsive` | `assets/css/responsive.scss` |
| `css/scorm` | `assets/css/scorm.scss` |

## ビルド機能

* **Vue 3 SFC** — `.vue` 単一ファイルコンポーネントを `vue-loader` でコンパイル。ランタイムコンパイラは無効（`runtimeCompilerBuild: false`）のため、すべてのテンプレートは事前コンパイルが必要です
* **TypeScript** — 高速ビルドのためのトランスパイル専用モード（`transpileOnly: true`）。ビルド時の型チェックは行いません
* **Sass/SCSS** — `sass-loader` による完全な SCSS サポート
* **Tailwind CSS** — PostCSS 経由でインライン処理されるユーティリティファースト CSS（`webpack.config.js` 内で設定。独立した `postcss.config.js` はありません）
* **Babel** — `@babel/preset-env` と `core-js@3` ポリフィル（`useBuiltIns: "usage"`）による ES6+ のトランスパイル
* **jQuery の自動提供** — `autoProvidejQuery()` により、明示的な import なしで `$` と `jQuery` をグローバルに利用でき、レガシーコードをサポートします
* **ソースマップ** — 開発時のみ有効
* **単一ランタイムチャンク** — すべてのエントリーで共有するランタイム
* **ファイルシステムキャッシュ** — 増分リビルドを高速化するため、Webpack の永続ファイルシステムキャッシュを有効化
* **チャンクの名前空間** — 同一ページ上で複数の Webpack バンドルが共存する場合のチャンクロード衝突を避けるため、`output.uniqueName` と `output.chunkLoadingGlobal` を `"chamilo"` / `"webpackChunkChamilo"` に設定

## 本番専用の機能

* **バージョニング** — すべての出力ファイル名にコンテンツハッシュのサフィックス（`enableVersioning()`）
* **サブリソース完全性** — `<script>` および `<link>` タグの `integrity` 属性（`enableIntegrityHashes()`）
* **出力のクリーンアップ** — 本番ビルドのたびに `public/build/` を消去

### ハッシュなしアセットのコピー（`CopyUnhashedAssetsPlugin`）

一部のレガシー PHP ページは固定ファイル名でアセットを参照するため、Webpack マニフェストを使えません。カスタムの `CopyUnhashedAssetsPlugin`（`webpack.config.js` の末尾で定義）は、各ビルド後に特定のハッシュ付き本番ファイルを追加のハッシュなしパスへコピーします。

| ハッシュ付きファイル | ハッシュなしコピー |
|-------------|--------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## コピーされるライブラリアセット

`copyFiles()` は、レガシーテンプレート内の `<script>` / `<link>` タグから利用するため、いくつかの npm パッケージをバンドルせず `public/build/libs/` へ直接コピーします。

* `flatpickr`（JS + CSS + ロケール）
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` ロケール
* `select2`（JS + CSS）
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## ビルドコマンド

```bash
# Development build
yarn encore dev

# Development build with file watching
yarn encore dev --watch

# Production build (minified, versioned, integrity hashes)
yarn encore production
```

## Tailwind の設定

Tailwind は `tailwind.config.js` で設定されています。主なポイントは次のとおりです。

* **`important: true`** — 生成されるすべてのユーティリティに `!important` が付与され、追加の詳細度の工夫なしに PrimeVue コンポーネントのスタイルを上書きできます
* **コンテンツパス** — Tailwind はクラスの使用箇所を `assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}`、および `src/CoreBundle/Resources/views/**/*.html.twig` からスキャンします
* **CSS 変数によるカラーシステム** — すべてのカラートークン（primary、secondary、tertiary、success、info、warning、danger）は、`var/themes/[theme-name]/colors.css` でテーマごとに定義された CSS カスタムプロパティ（例: `--color-primary-base`）に裏打ちされています。値はスペース区切りの RGB チャネルの三連であり、Tailwind の不透明度ユーティリティ（`bg-primary/50`）を利用できます
* **カスタムフォントスケール** — `body-1`、`body-2`、`caption`、`tiny` のサイズ／行高のペアは `theme.extend.fontSize` 経由で追加されます
* **プラグイン** — `@tailwindcss/forms` と `@tailwindcss/typography` が有効化されています

PostCSS（Tailwind + Autoprefixer）は `webpack.config.js` 内で `enablePostCssLoader()` によりインライン設定されており、独立した `postcss.config.js` ファイルはありません。