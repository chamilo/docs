# CSS と Tailwind

## スタイルシートのアーキテクチャ

Chamilo のスタイルは次の順序で重ねられています。

1. **Tailwind CSS** — レイアウト、余白、色のためのユーティリティクラス。`important: true` で設定されており、ユーティリティが PrimeVue コンポーネントのデフォルトを上書きします。
2. **SCSS** — `assets/css/scss/` 内のカスタムスタイル。atoms、molecules、organisms、layout、components の各レイヤーに整理されています。
3. **PrimeVue コンポーネントスタイル** — `assets/css/scss/atoms/` 内でコンポーネントごとに上書きされます。
4. **テーマの `colors.css`** — アクティブなカラーテーマ用の CSS カスタムプロパティ。最後に読み込まれ、他のすべてにカスケードで上書きします。

PrimeFlex は `package.json` から削除されています。ユーティリティのニーズはすべて Tailwind がカバーします。

## メインスタイルシート（`assets/css/app.scss`）

`app.scss` はメインスタイルシートの Webpack エントリーポイントです。次をインポートします。

1. `_tailwind.scss` — Tailwind の `@tailwind base / components / utilities` ディレクティブ
2. `scss/index.scss` — すべての SCSS パーシャルをインポートするバレルファイル
3. サードパーティ CSS（cropper、select2、daterangepicker、TinyMCE スキン、fancybox、timepicker、qtip）
4. `editor_content.scss` — TinyMCE エディタの iframe 本体に注入されるスタイル

## Tailwind の設定（`tailwind.config.js`）

主な設定:

```javascript
module.exports = {
  important: true,   // all utilities get !important
  content: [
    "./assets/**/*.{js,vue}",
    "./public/main/**/*.{php,twig,tpl}",
    "./public/plugin/**/*.{php,twig,tpl}",
    "./src/CoreBundle/Resources/views/**/*.html.twig",
  ],
  // ...
}
```

コンテンツパスは Vue コンポーネント、レガシー PHP ページ、プラグインファイル、Twig テンプレートをスキャンし、本番ビルド時に未使用のユーティリティをパージします。

### CSS 変数によるカラーシステム

すべてのカラートークンはハードコード値ではなく CSS カスタムプロパティに基づいています。

```javascript
theme: {
  colors: {
    primary: {
      DEFAULT: colorWithOpacity("--color-primary-base"),
      gradient: colorWithOpacity("--color-primary-gradient"),
    },
    secondary: { ... },
    // success, info, warning, danger, tertiary, form
  }
}
```

`colorWithOpacity` ヘルパーは `rgb(var(--color-primary-base) / <opacity>)` を出力し、`bg-primary/50` のような不透明度バリアントを可能にします。実際の RGB 値はテーマごとに `var/themes/{slug}/colors.css` で定義され、実行時に読み込まれます — [カラーテーマ](color-themes.md) を参照してください。

### Tailwind プラグイン

`@tailwindcss/forms` と `@tailwindcss/typography` が有効です。

### カスタムタイプスケール

`theme.extend.fontSize` により、フォントサイズ／行高のペアが 4 つ追加されます。

| クラス | サイズ / 行高 |
|-------|--------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS（Tailwind + Autoprefixer）は `webpack.config.js` 内で `enablePostCssLoader()` によりインライン設定されています。独立した `postcss.config.js` ファイルはありません。

## 専用スタイルシート

| ファイル | Webpack エントリー | 用途 |
|------|--------------|---------|
| `assets/css/app.scss` | `app` | メインアプリケーションのスタイル |
| `assets/css/chat.scss` | `css/chat` | チャットインターフェースのスタイル |
| `assets/css/document.scss` | `css/document` | ドキュメントビューアのスタイル |
| `assets/css/editor.scss` | `css/editor` | TinyMCE エディタシェルのスタイル |
| `assets/css/editor_content.scss` | `css/editor_content` | エディタ iframe 本体に注入されるスタイル |
| `assets/css/markdown.scss` | `css/markdown` | Markdown レンダリング済みコンテンツ |
| `assets/css/print.scss` | `css/print` | 印刷用スタイルシート |
| `assets/css/responsive.scss` | `css/responsive` | レスポンシブ上書き |
| `assets/css/scorm.scss` | `css/scorm` | SCORM プレーヤーのスタイル |

## SCSS モジュール構成（`assets/css/scss/`）

```
scss/
├── index.scss        # Barrel — imports everything below
├── abstracts/        # Mixins and shared functions
├── settings/         # Design tokens (typography, component base)
├── atoms/            # Per-component PrimeVue overrides
├── molecules/        # Small composed patterns (chips, toolbars, empty states)
├── organisms/        # Larger areas (sidebar, datatable, dialog, LP panel)
├── layout/           # Page skeleton (topbar, main container, breadcrumb)
├── components/       # Feature-specific styles (blog, exercise, social, skill, …)
└── libs/             # Third-party overrides (FullCalendar, MediaElement.js)
```

## Vue コンポーネントでの Tailwind の利用

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

`tailwind.config.js` で `important: true` が設定されているため、Tailwind ユーティリティは追加の詳細度なしに PrimeVue コンポーネントスタイルを確実に上書きします。