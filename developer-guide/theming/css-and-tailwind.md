# CSS と Tailwind

## スタイルシートの構造

Chamilo のスタイルは以下の順序で整理されています：

1. **Tailwind CSS** — レイアウト、間隔、色のためのユーティリティクラス。`important: true` で設定されており、PrimeVue コンポーネントのデフォルトをユーティリティが上書きします。
2. **SCSS** — `assets/css/scss/` 内にカスタムスタイルがあり、アトム、モレキュール、オーガニズム、レイアウト、コンポーネントの層に分かれています。
3. **PrimeVue コンポーネントのスタイル** — `assets/css/scss/atoms/` 内でコンポーネントごとに上書きされます。
4. **テーマ `colors.css`** — アクティブなカラーテーマ用のカスタム CSS プロパティ。最後に読み込まれるため、他のすべてを上書きします。

PrimeFlex は `package.json` に記載されていますが、インポートされていません — Tailwind がすべてのユーティリティニーズをカバーしています。

## メインスタイルシート (`assets/css/app.scss`)

`app.scss` はメインスタイルシートの Webpack エントリーポイントです。以下をインポートしています：

1. `_tailwind.scss` — Tailwind のディレクティブ `@tailwind base / components / utilities`
2. `scss/index.scss` — すべての SCSS パーシャルをインポートするバレルファイル
3. サードパーティ CSS (cropper, select2, daterangepicker, TinyMCE のスキン, fancybox, timepicker, qtip)
4. `editor_content.scss` — TinyMCE エディタの iframe 本体に注入されるスタイル

## Tailwind の設定 (`tailwind.config.js`)

主な設定：

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

コンテンツパスは Vue コンポーネント、レガシー PHP ページ、プラグインファイル、Twig テンプレートをスキャンし、未使用のユーティリティをプロダクションビルドで除去します。

### CSS 変数を使用したカラーシステム

すべてのカラートークンは固定値ではなく、カスタム CSS プロパティでサポートされています：

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

`colorWithOpacity` ヘルパーは `rgb(var(--color-primary-base) / <opacity>)` を出力し、`bg-primary/50` のような不透明度のバリエーションを可能にします。実際の RGB 値はテーマごとに `var/themes/{slug}/colors.css` で定義され、実行時に読み込まれます — [カラーテーマ](color-themes.md) を参照してください。

### Tailwind プラグイン

`@tailwindcss/forms` および `@tailwindcss/typography` が有効になっています。

### カスタムタイポグラフィスケール

`theme.extend.fontSize` を介して、4 つの追加のフォントサイズ/行の高さのペアが追加されています：

| クラス | サイズ / 行の高さ |
|-------|---------------------------|
| `text-body-1` | 16px / 24px |
| `text-body-2` | 14px / 16px |
| `text-caption` | 13px / 16px |
| `text-tiny` | 11px / 16px |

## PostCSS

PostCSS (Tailwind + Autoprefixer) は `webpack.config.js` 内で `enablePostCssLoader()` を介してインラインで設定されています。独立した `postcss.config.js` ファイルはありません。

## 特殊なスタイルシート

| ファイル | Webpack エントリ | 目的 |
|------|-----------------|------------|
| `assets/css/app.scss` | `app` | アプリケーションのメインスタイル |
| `assets/css/chat.scss` | `css/chat` | チャットインターフェースのスタイル |
| `assets/css/document.scss` | `css/document` | ドキュメントビューアのスタイル |
| `assets/css/editor.scss` | `css/editor` | TinyMCE エディタシェルのスタイル |
| `assets/css/editor_content.scss` | `css/editor_content` | エディタ iframe 本体に注入されるスタイル |
| `assets/css/markdown.scss` | `css/markdown` | Markdown でレンダリングされたコンテンツ |
| `assets/css/print.scss` | `css/print` | 印刷用スタイルシート |
| `assets/css/responsive.scss` | `css/responsive` | レスポンシブ上書き |
| `assets/css/scorm.scss` | `css/scorm` | SCORM プレイヤーのスタイル |

## SCSS モジュール構造 (`assets/css/scss/`)

```
scss/
├── index.scss        # バレル — 以下すべてをインポート
├── abstracts/        # 共有ミックスインと関数
├── settings/         # デザイントークン (タイポグラフィ、コンポーネントベース)
├── atoms/            # PrimeVue のコンポーネントごとの上書き
├── molecules/        # 小さな複合パターン (チップ、ツールバー、空の状態)
├── organisms/        # 大きなエリア (サイドバー、データテーブル、ダイアログ、LP パネル)
├── layout/           # ページの骨格 (トップバー、メインコンテナ、ブレッドクラム)
├── components/       # 機能固有のスタイル (ブログ、演習、ソーシャル、スキル、…)
└── libs/             # サードパーティの上書き (FullCalendar, MediaElement.js)
```

---
## VueコンポーネントでのTailwindの使用

```vue
<template>
  <div class="flex gap-2 p-4">
    <BaseButton class="bg-primary text-white" label="Save" />
  </div>
</template>
```

`tailwind.config.js`で`important: true`が設定されているため、Tailwindのユーティリティは追加の特定性なしでPrimeVueコンポーネントのスタイルを確実に上書きします。