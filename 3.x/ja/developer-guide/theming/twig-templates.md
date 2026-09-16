# Twig テンプレート

Chamilo はサーバーサイドでレンダリングするページに Twig を使用します。テンプレートは `src/CoreBundle/Resources/views/` にあり、`@ChamiloCore/` 名前空間プレフィックスで参照します（例: `@ChamiloCore/Layout/base-layout.html.twig`）。

トップレベルの `templates/` ディレクトリはありません。すべての Twig テンプレートは `src/CoreBundle/Resources/views/` 配下にあります。

## Twig と Vue の共存

ほとんどのページは次の流れに従います。

1. Symfony コントローラーがレイアウトを継承する Twig テンプレートをレンダリングします。
2. レイアウトが `vue_setup.html.twig` をインクルードし、`<div id="app">` を出力するとともに、`vue_js_setup.html.twig` 経由でランタイムグローバル（`window.user`、`window.breadcrumb` など）を注入します。
3. Vue が `#app` にマウントし、その要素内のすべての UI レンダリングを担当します。
4. Vue アプリは REST API 経由でバックエンドと通信します。

まだ Vue に移行していないレガシーページでは、Symfony が Twig でページ全体の HTML をレンダリングし、コンテンツは `#sectionMainContent` 内に配置されます。Vue は依然としてマウントします（サイドバーとトップバーのシェルを提供します）が、メインコンテンツ領域はサーバーレンダリングされた HTML です。

## レイアウトテンプレート

すべてのレイアウトは `@ChamiloCore/Layout/base-layout.html.twig` を継承し、これが `<html>`、`<head>`、`<body>` の構造を提供します。利用可能なレイアウトのバリエーション:

| テンプレート | 用途 |
|----------|---------|
| `Layout/base-layout.html.twig` | ルートテンプレート — `<html>` シェル、Macros のインポート、`<head>` と `<body>` の出力 |
| `Layout/layout.html.twig` | サイドバー、トップバー、コンテンツ領域を備えた標準のフルレイアウト |
| `Layout/layout_one_col.html.twig` | 1 カラムレイアウト（サイドバーなし） |
| `Layout/layout_two_col.html.twig` | 2 カラムレイアウト |
| `Layout/layout_content.html.twig` | コンテンツのみのラッパー |
| `Layout/layout_empty.html.twig` | 最小限のクロムを持つ空のレイアウト |
| `Layout/no_layout.html.twig` | ヘッダー／フッターなし。コンテンツは `<body>` 内に直接配置 |
| `Layout/no_layout_scorm.html.twig` | SCORM コンテンツフレーム用の素のレイアウト |
| `Layout/blank.html.twig` | 完全に空白のページ |
| `Layout/skill_layout.html.twig` | スキルホイールページ用のレイアウト |

## 主要なパーシャル

| テンプレート | 用途 |
|----------|---------|
| `Layout/head.html.twig` | `<head>` の内容: メタタグ、すべての Encore CSS エントリ、テーマの `colors.css`、レガシー JS エントリ、OpenGraph／Twitter タグ |
| `Layout/foot.html.twig` | body 末尾: Vue JS エントリポイント、`tracking.footer_extra_content` の注入 |
| `Layout/vue_setup.html.twig` | `<div id="app">` を出力し、`vue_js_setup.html.twig` をインクルード |
| `Layout/vue_js_setup.html.twig` | `window.user`、`window.breadcrumb`、`window.languages` などを注入 |
| `Layout/cookie_banner.html.twig` | GDPR クッキー同意バナー |
| `Layout/footer.html.twig` | ページフッターバー |
| `Layout/course_navigation.html.twig` | コースツールナビゲーションのパンくず |

## Webpack Encore の統合

`head.html.twig` がすべてのエントリの CSS を読み込み、`foot.html.twig` が Vue JS バンドルを読み込みます。

```twig
{# In head.html.twig — CSS entries #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# In foot.html.twig — Vue JS (loaded at end of body) #}
{{ encore_entry_script_tags('vue') }}
```

レガシー JS エントリ（`legacy_app`、`legacy_lp` など）は `<head>` で読み込まれます。レガシー PHP ページは DOM の準備完了前にそれらが利用可能であることに依存するためです。

## マクロ

再利用可能な Twig マクロは `Macros/` にあり、`base-layout.html.twig` の先頭でインポートされます。

| マクロファイル | 提供内容 |
|-----------|---------|
| `Macros/box.html.twig` | コンテンツボックスのヘルパー |
| `Macros/actions.html.twig` | アクションボタンのレンダリング |
| `Macros/buttons.html.twig` | ボタン HTML ヘルパー |
| `Macros/headers.html.twig` | ページヘッダーのヘルパー |
| `Macros/image.html.twig` | 画像レンダリングのヘルパー |
| `Macros/modals.html.twig` | モーダルダイアログのヘルパー |

`base-layout.html.twig` を継承する任意のテンプレート内での使用例:

```twig
{{ macro_buttons.submit('Save') }}
{{ macro_box.content_box('Title', content) }}
```

## カスタム Vue テンプレート

Chamilo は環境変数 `APP_CUSTOM_VUE_TEMPLATE` により、インストール単位で Vue ページを上書きできます。設定されている場合、Webpack ビルドは `DefinePlugin` 経由で `ENV_CUSTOM_VUE_TEMPLATE` 定数を公開し、Vue ルーターは `var/vue_templates/` から上書きコンポーネントを条件付きでインポートします。

現在の上書き場所:

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # Replaces the default / entry page
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

`var/vue_templates/` に存在するファイルのみが上書きされます。その他のページとコンポーネントはコアのオリジナルを使用します。

## Twig 関数リファレンス

すべてのテンプレートで利用できる主要な Twig 関数（`ChamiloExtension` に登録）:

| Function | Purpose |
|----------|---------|
| `chamilo_settings_get('ns.key')` | プラットフォーム設定を読み取る |
| `chamilo_settings_has('ns.key')` | 設定が存在するかどうかを確認する |
| `chamilo_settings_all()` | すべての設定を配列として取得する |
| `theme_asset('path')` | アクティブなテーマ内のアセットへの URL |
| `theme_asset_link_tag('path')` | テーマの CSS ファイル用の `<link>` タグ |
| `theme_asset_script_tag('path')` | テーマの JS ファイル用の `<script>` タグ |
| `theme_asset_base64('path')` | テーマアセットの Base64 データ URI |
| `theme_logo('header'\|'email')` | 優先ロゴへの URL |
| `is_allowed_to_edit(...)` | 権限チェック用ヘルパー |