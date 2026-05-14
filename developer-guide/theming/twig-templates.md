# Twigテンプレート

ChamiloはサーバーサイドでレンダリングされるページにTwigを使用しています。テンプレートは`src/CoreBundle/Resources/views/`に配置されており、名前空間プレフィックス`@ChamiloCore/`（例：`@ChamiloCore/Layout/base-layout.html.twig`）を使用して参照されます。

最上位の`templates/`ディレクトリは存在せず、すべてのTwigテンプレートは`src/CoreBundle/Resources/views/`の下にあります。

## TwigとVueの共存方法

ほとんどのページは以下のフローをたどります：

1. Symfonyコントローラーがレイアウトを拡張するTwigテンプレートをレンダリングします。
2. レイアウトには`vue_setup.html.twig`が含まれており、`<div id="app">`を出力し、`vue_js_setup.html.twig`を介して実行時のグローバル変数（`window.user`、`window.breadcrumb`など）を注入します。
3. Vueは`#app`にマウントされ、その要素内のすべてのユーザーインターフェースのレンダリングを管理します。
4. VueアプリケーションはREST APIを介してバックエンドと通信します。

Vueに移行されていないレガシーページの場合、SymfonyはTwigを介してページ全体のHTMLをレンダリングし、コンテンツは`#sectionMainContent`内に配置されます。Vueは依然としてマウントされます（サイドバーとトップバーを提供）が、メインコンテンツエリアはサーバーサイドでレンダリングされたHTMLです。

## レイアウトテンプレート

すべてのレイアウトは`@ChamiloCore/Layout/base-layout.html.twig`を拡張しており、`<html>`、`<head>`、`<body>`の構造を提供します。利用可能なレイアウトのバリエーション：

| テンプレート | 目的 |
|----------|---------|
| `Layout/base-layout.html.twig` | ルートテンプレート — `<html>`構造、Macrosのインポート、`<head>`と`<body>`の出力 |
| `Layout/layout.html.twig` | サイドバー、トップバー、コンテンツエリアを含む標準の完全なレイアウト |
| `Layout/layout_one_col.html.twig` | 1カラムレイアウト（サイドバーなし） |
| `Layout/layout_two_col.html.twig` | 2カラムレイアウト |
| `Layout/layout_content.html.twig` | コンテンツのみのラッパー |
| `Layout/layout_empty.html.twig` | 最小限の視覚要素を持つ空のレイアウト |
| `Layout/no_layout.html.twig` | ヘッダー/フッターなし；コンテンツが直接`<body>`内に配置される |
| `Layout/no_layout_scorm.html.twig` | SCORMコンテンツフレーム用の基本レイアウト |
| `Layout/blank.html.twig` | 完全に空白のページ |
| `Layout/skill_layout.html.twig` | スキルホイールページ用のレイアウト |

## 主要な部分

| テンプレート | 目的 |
|----------|---------|
| `Layout/head.html.twig` | `<head>`の内容：メタタグ、EncoreのすべてのCSSエントリ、テーマの`colors.css`、レガシーJSエントリ、OpenGraph/Twitterタグ |
| `Layout/foot.html.twig` | ボディの終了：VueのJSエントリポイント、`tracking.footer_extra_content`の注入 |
| `Layout/vue_setup.html.twig` | `<div id="app">`を出力し、`vue_js_setup.html.twig`を含める |
| `Layout/vue_js_setup.html.twig` | `window.user`、`window.breadcrumb`、`window.languages`などを注入 |
| `Layout/cookie_banner.html.twig` | GDPRクッキー同意バナー |
| `Layout/footer.html.twig` | ページのフッターバー |
| `Layout/course_navigation.html.twig` | コースツールのナビゲーションブレッドクラム |

## Webpack Encoreとの統合

`head.html.twig`はすべてのエントリのCSSを読み込み、`foot.html.twig`はVueのJSバンドルを読み込みます：

```twig
{# head.html.twig内 — CSSエントリ #}
{{ encore_entry_link_tags('legacy_free-jqgrid') }}
{{ encore_entry_link_tags('legacy_app') }}
{{ encore_entry_link_tags('legacy_lp') }}
{{ encore_entry_link_tags('legacy_exercise') }}
{{ encore_entry_link_tags('legacy_document') }}
{{ encore_entry_link_tags('vue') }}
{{ encore_entry_link_tags('app') }}
{{ theme_asset_link_tag('colors.css') }}

{# foot.html.twig内 — Vue JS（bodyの最後に読み込み） #}
{{ encore_entry_script_tags('vue') }}
```

レガシーJSエントリ（`legacy_app`、`legacy_lp`など）は、DOMが準備される前にレガシーPHPページがその可用性に依存するため、`<head>`内で読み込まれます。

## マクロ

再利用可能なTwigマクロは`Macros/`にあり、`base-layout.html.twig`の先頭でインポートされています：

| マクロファイル | 提供内容 |
|-----------|---------|
| `Macros/box.html.twig` | コンテンツボックスのヘルパー |
| `Macros/actions.html.twig` | アクションボタンのレンダリング |
| `Macros/buttons.html.twig` | ボタンのHTMLヘルパー |
| `Macros/headers.html.twig` | ページヘッダーのヘルパー |
| `Macros/image.html.twig` | 画像レンダリングのヘルパー |
| `Macros/modals.html.twig` | モーダルダイアログのヘルパー |

`base-layout.html.twig`を拡張する任意のテンプレート内での使用例：

```twig
{{ macro_buttons.submit('保存') }}
{{ macro_box.content_box('タイトル', コンテンツ) }}
```

---
## カスタムVueテンプレート

Chamiloは、環境変数`APP_CUSTOM_VUE_TEMPLATE`を介して、インストールごとにVueページのオーバーライドをサポートしています。この変数が設定されている場合、Webpackのビルドは`DefinePlugin`を介して定数`ENV_CUSTOM_VUE_TEMPLATE`を公開し、Vueルーターは条件付きで`var/vue_templates/`からオーバーライドコンポーネントをインポートします。

現在のオーバーライドの場所：

```
var/vue_templates/
├── pages/
│   └── AppIndex.vue   # デフォルトのエントリーページ / をオーバーライド
└── components/
    ├── layout/
    └── SidebarLogin.vue
```

`var/vue_templates/`に存在するファイルのみがオーバーライドされます。その他のすべてのページおよびコンポーネントは、コアのオリジナルが使用されます。

---
## Twig関数のリファレンス

すべてのテンプレートで利用可能な主要なTwig関数（`ChamiloExtension`に登録されています）：

| 関数 | 目的 |
|----------|---------|
| `chamilo_settings_get('ns.key')` | プラットフォームの設定を読み取る |
| `chamilo_settings_has('ns.key')` | 設定が存在するかどうかを確認する |
| `chamilo_settings_all()` | すべての設定を配列として取得する |
| `theme_asset('path')` | アクティブなテーマ内のリソースへのURL |
| `theme_asset_link_tag('path')` | テーマのCSSファイル用の`<link>`タグ |
| `theme_asset_script_tag('path')` | テーマのJSファイル用の`<script>`タグ |
| `theme_asset_base64('path')` | テーマリソース用のBase64データURI |
| `theme_logo('header'\|'email')` | 優先されるロゴへのURL |
| `is_allowed_to_edit(...)` | 権限確認用のヘルパー |