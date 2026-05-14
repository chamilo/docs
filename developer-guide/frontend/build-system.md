# ビルドシステム

Chamiloは、フロントエンドのアセットを構築するために **Symfony Webpack Encore** を介して **Webpack 5** を使用しています。ビルドの完全な設定は、プロジェクトのルートにある `webpack.config.js` に記載されています。

出力は `public/build/` に書き込まれ、公開パス `/build` から提供されます。

## エントリーポイント

### JavaScript

| エントリー | ソース | 目的 |
|---------|-------|------------|
| `vue` | `assets/vue/main.js` | メインの Vue 3 アプリケーション |
| `vue_installer` | `assets/vue/main_installer.js` | インストールウィザード |
| `legacy_app` | `assets/js/legacy/app.js` | レガシー JavaScript |
| `legacy_exercise` | `assets/js/legacy/exercise.js` | 演習プレイヤー |
| `legacy_lp` | `assets/js/legacy/lp.js` | 学習パスプレイヤー |
| `legacy_document` | `assets/js/legacy/document.js` | ドキュメントビューア |
| `legacy_free-jqgrid` | `assets/js/legacy/free-jqgrid.js` | レガシーグリッドウィジェット |
| `legacy_framereadyloader` | `assets/js/legacy/frameReadyLoader.js` | レガシー iframe 用のフレーム準備ローダー |
| `translatehtml` | `assets/js/translatehtml.js` | HTML 翻訳ヘルパー |
| `glossary_auto` | `assets/js/glossary-auto.js` | 用語集の自動ハイライト |

### CSS

| エントリー | ソース |
|---------|-------|
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

* **Vue 3 SFC** — シングルファイルコンポーネント `.vue` は `vue-loader` によってコンパイルされます。ランタイムコンパイラは無効化されています（`runtimeCompilerBuild: false`）。したがって、すべてのテンプレートは事前にコンパイルされる必要があります。
* **TypeScript** — トランスパイルのみのモード（`transpileOnly: true`）で高速ビルドを実現し、ビルド時の型チェックは行いません。
* **Sass/SCSS** — `sass-loader` を介して SCSS を完全にサポート。
* **Tailwind CSS** — PostCSS を介してインラインで処理されるユーティリティ CSS（`webpack.config.js` 内で設定されており、別個の `postcss.config.js` ファイルはありません）。
* **Babel** — ES6+ のトランスパイルを `@babel/preset-env` と `core-js@3` のポリフィル（`useBuiltIns: "usage"`）で行います。
* **jQuery auto-provision** — `autoProvidejQuery()` により、`$` および `jQuery` が明示的なインポートなしでグローバルに利用可能となり、レガシーコードをサポートします。
* **Source maps** — 開発時のみ有効化。
* **Single runtime chunk** — すべてのエントリーで共有されるランタイム。
* **Filesystem cache** — Webpack の永続的なファイルシステムキャッシュが有効化されており、増分リビルドを高速化します。
* **Chunk namespacing** — `output.uniqueName` および `output.chunkLoadingGlobal` が `"chamilo"` / `"webpackChunkChamilo"` に設定されており、複数の Webpack バンドルが同一ページに共存する際のチャンク読み込みの衝突を防ぎます。

## プロダクション専用の機能

* **バージョン管理** — すべての出力ファイル名にコンテンツハッシュの接尾辞を付加（`enableVersioning()`）。
* **サブリソースインテグリティ** — `<script>` および `<link>` タグに `integrity` 属性を付加（`enableIntegrityHashes()`）。
* **出力のクリーンアップ** — プロダクションビルドのたびに `public/build/` をクリア。

### ハッシュなしアセットのコピー (`CopyUnhashedAssetsPlugin`)

一部のレガシー PHP ページでは、固定ファイル名でアセットを参照しており、Webpack のマニフェストを使用できません。カスタムプラグイン `CopyUnhashedAssetsPlugin`（`webpack.config.js` の末尾で定義）は、ビルド後に特定のハッシュ付きプロダクションファイルをハッシュなしの追加パスにコピーします：

| ハッシュ付きファイル | ハッシュなしコピー |
|------------------|----------------|
| `legacy_document.[hash].js` | `legacy_document.js` |
| `legacy_exercise.[hash].js` | `legacy_exercise.js` |
| `legacy_framereadyloader.[hash].js` / `.css` | `legacy_framereadyloader.js` / `.css` |
| `css/document.[hash].css` | `css/document.css` |
| `css/editor_content.[hash].css` | `css/editor_content.css` |
| `glossary_auto.[hash].js` | `glossary_auto.js` |

## コピーされるライブラリアセット

`copyFiles()` は、複数の npm パッケージを直接 `public/build/libs/` にコピーし、バンドルせずにレガシーテンプレートで `<script>` / `<link>` タグを介して使用できるようにします：

* `flatpickr` (JS + CSS + ロケール)
* `chart.js`
* `mediaelement` + `mediaelement-plugins`
* `moment` ロケール
* `select2` (JS + CSS)
* `qtip2`
* `readmore-js`
* `js-cookie`
* `pwstrength-bootstrap`
* `multiselect-two-sides`

## ビルドコマンド

```bash
# 開発ビルド
yarn encore dev

# ファイル監視付きの開発ビルド
yarn encore dev --watch

# プロダクションビルド（ミニファイ、バージョン管理、インテグリティハッシュ）
yarn encore production
```

---
## Tailwindの設定

Tailwindは`tailwind.config.js`ファイルで設定されています。主なポイントは以下の通りです：

* **`important: true`** — 生成されるすべてのユーティリティには`!important`が含まれており、PrimeVueコンポーネントのスタイルを追加の特定性トリックなしで上書きすることが可能です
* **コンテンツパス** — Tailwindは`assets/**/*.{js,vue}`、`public/main/**/*.{php,twig,tpl}`、`public/plugin/**/*.{php,twig,tpl}`、および`src/CoreBundle/Resources/views/**/*.html.twig`をスキャンしてクラスの使用状況を確認します
* **CSS変数を使用したカラシステム** — 各カラートークン（プライマリ、セカンダリ、ターシャリ、成功、情報、警告、危険）は、テーマごとに`var/themes/[theme-name]/colors.css`で定義されたカスタムCSSプロパティ（例：`--color-primary-base`）によってサポートされています。値はスペースで区切られたRGBチャンネルのトリオであり、Tailwindの不透明度ユーティリティ（`bg-primary/50`）の使用を可能にします
* **カスタムフォントスケール** — サイズと行の高さのペアである`body-1`、`body-2`、`caption`、`tiny`が`theme.extend.fontSize`を介して追加されています
* **プラグイン** — `@tailwindcss/forms`および`@tailwindcss/typography`が有効になっています

PostCSS（Tailwind + Autoprefixer）は、`webpack.config.js`内で`enablePostCssLoader()`を介してインラインで設定されており、独立した`postcss.config.js`ファイルは存在しません。